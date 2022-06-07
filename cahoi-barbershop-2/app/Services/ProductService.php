<?php

namespace App\Services;

use App\Models\Product;
use App\Models\TypeProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class ProductService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Product();
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]"])]
    public function getViaTypeProductId(Request $request, $typeId): array
    {
        return [
            "data" => $this->model
                ->where("type_product_id", $typeId)
                ->get()
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]"])]
    public function getProduct(): array
    {
        return [
            "data" => (new TypeProductService())->model::query()
                                                       ->with("products")
                                                       ->get()
        ];
    }

    /**
     * @throws Exception
     */
    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model"])]
    public function createProduct(Request $request): array
    {
        $rule = [
            "name"             => 'required',
            "duration"         => 'required',
            "price"            => 'required',
            "sort_description" => 'required',
            "description"      => 'required',
            "image"            => 'required',
            "type_product_id"  => 'required|exists:type_products,id'
        ];

        $this->doValidate($request, $rule);

        $typeProduct = TypeProduct::query()->find($request->type_product_id);

        try {
            DB::beginTransaction();
            $image = $request->file('image');

            $nameImageOriginal = $image->getClientOriginalName();
            $arrayNameImage    = explode('.', $nameImageOriginal);
            $fileExt           = end($arrayNameImage);
            $destinationPath   = './upload/products/' . Str::replace(' ', '_', $typeProduct->name);
            $nameImage         = Str::replace(' ', '_', $request->name) . '.' . $fileExt;
            $image->move($destinationPath, $nameImage);


            $product = $this->model::query()->create([
                                                         "name"             => $request->name,
                                                         "duration"         => $request->duration,
                                                         "price"            => $request->price,
                                                         "sort_description" => $request->sort_description,
                                                         "description"      => $request->description,
                                                         "image"            => '/upload/products/' .
                                                             Str::replace(' ',
                                                                          '_',
                                                                          $typeProduct->name,
                                                             ) . "/" . $nameImage,
                                                         "type_product_id"  => $request->type_product_id,
                                                     ]);

            DB::commit();

            return [
                "data" => $product
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

    }

    /**
     * @throws Exception
     */
    public function updateViaProductId(Request $request, $productId)
    {
        $rule = [
            "name"             => '',
            "duration"         => '',
            "price"            => '',
            "sort_description" => '',
            "description"      => '',
            "image"            => '',
            "type_product_id"  => 'required|exists:type_products,id'
        ];

        self::doValidate($request, $rule);

        try {
            DB::beginTransaction();

            $image = $request->file('image');

            $product = $this->model::query()->where("id", $productId)->first();

            $typeProduct = TypeProduct::query()->find($request->type_product_id);

            if ($image != null) {
                File::delete(ltrim($product->image, "/"));

                $nameImageOriginal = $image->getClientOriginalName();
                $arrayNameImage    = explode('.', $nameImageOriginal);
                $fileExt           = end($arrayNameImage);
                $destinationPath   = './upload/products/' . Str::replace(' ', '_', $typeProduct->name);
                $nameImage         = Str::replace(' ', '_', $request->name ?? $product->name) . '.' . $fileExt;
                $product->image    = '/upload/products/' .
                    Str::replace(' ',
                                 '_',
                                 $typeProduct->name,
                    ) . "/" . $nameImage;
                $image->move($destinationPath, $nameImage);
            }

            $product->update([
                                 "name"             => $request->name ?? $product->name,
                                 "duration"         => $request->duration ?? $product->duration,
                                 "price"            => $request->price ?? $product->price,
                                 "sort_description" => $request->sort_description ?? $product->sort_description,
                                 "description"      => $request->description ?? $product->description,
                                 "image"            => $product->image,
                                 "type_product_id"  => $request->type_product_id ?? $product->type_product_id,
                             ]);

            DB::commit();

            return [
                "data" => $product
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    #[ArrayShape(["data" => "bool|mixed|null"])]
    public function deleteViaProductId(Request $request, $productId): array
    {
        try {
            DB::beginTransaction();

            $product = $this->model::query()->where("id", $productId)->first();

            File::delete(ltrim($product->image, "/"));

            DB::commit();

            return [
                "data" => $product->delete()
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
