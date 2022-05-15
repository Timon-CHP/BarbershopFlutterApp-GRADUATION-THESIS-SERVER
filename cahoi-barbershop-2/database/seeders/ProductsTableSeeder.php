<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        /*
         * Cắt gội massage
         * */
        $data = [
            [
                "name" => "ShineCombo cắt gội 10 bước",
                "duration" => "45",
                "sort_description" => "Đặc sắc nổi tiếng",
                "description" => "Combo “đặc sản” của 30Shine, bạn sẽ cùng chúng tôi trải nghiệm chuyến hành trình tỏa sáng đầy thú vị - nơi mỗi người đàn ông không chỉ cắt tóc mà còn tìm thấy nhiều hơn như thế",
                "price" => "120",
                'type_product_id' => 1,
            ],
            [
                "name" => "Combo Super Vip - Paradise Siêu Cấp",
                "duration" => "60",
                "sort_description" => "Cắt gội massage đẳng cấp - phục vụ chỉ 15 khách/ngày",
                "description" => "Trải nghiệm đẳng cấp xuyên suốt từ đội ngũ tuyển chọn chuyên phục vụ khách VIP, quy trình thiết kế đặc biệt 16 bước chuyên nghiệp",
                "price" => "300",
                'type_product_id' => 1,
            ],
            [
                "name" => "Gội massage dưỡng sinh",
                "duration" => "20",
                "sort_description" => "Gội sấy vuốt sáp - Siêu thư giãn",
                "description" => "Thư giãn, giải tỏa mệt mỏi ư! Đơn giản, các bạn skinner với bài gội đầu massage dưỡng sinh sẽ giúp anh. Sau cùng stylist sẽ vuốt sáp tạo kiểu để đẹp trai cả ngày",
                "price" => "40",
                'type_product_id' => 1,
            ],
            [
                "name" => "Kid combo",
                "duration" => "30",
                "sort_description" => "Mĩ phẩm dịu nhẹ - thợ chiều trẻ em",
                "description" => "Đẹp trai không phân biệt tuổi tác! Gói dịch vụ thiết kế dành riêng cho các bé trai, mĩ phẩm dịu nhẹ phù hợp với làn da và phải nói nhỏ thợ tại 30Shine siêu chiều các bé!",
                "price" => "70",
                'type_product_id' => 1,
            ],
            [
                "name" => "Cắt xả tạo kiểu nhanh (Không gội massage)",
                "sort_description" => "Stylist cắt - xả - vuốt sáp tạo kiểu (Không gội massage)",
                "price" => "80",
                "duration" => "30",
                "description" => "Quá bận! Eo hẹp về thời gian, phải đi công chuyện gấp thì đây là gói dịch vụ anh nên chọn! Thợ cắt sẽ xả và cắt tóc tạo kiểu cho anh luôn!",
                'type_product_id' => 1,
            ],
            [
                "name" => "Gội massage bấm huyệt VIP",
                "sort_description" => "Kết hợp đai rung bụng và cao dán nhân sâm giảm đau nhức",
                "price" => "80",
                "duration" => "35",
                "description" => "Giải tỏa căng thẳng mệt mỏi nhanh chóng với gói dịch vụ massage bấm huyệt tuyệt vời này",
                'type_product_id' => 1,
            ],
            [
                "name" => "Combo Gội SuperVip Paradise",
                "sort_description" => "Trải nghiệm dịch vụ GỘI VIP nhất từ trước đến giờ!!!!",
                "price" => "220",
                "duration" => "50",
                "description" => "Không gian nội thất thư giãn, thoáng đãng, nội thất sang trọng cùng dàn Skinner chuyên nghiệp, hứa hẹn đem lại cho khách trải nghiệm tuyệt nhất.",
                'type_product_id' => 1,
            ],
        ];

        Product::query()->insert($data);

        /*
         * Chăm sóc da
         * */
        $data = [
            [
                "name" => "Tẩy da chết sủi bọt, Đắp mặt nạ",
                "sort_description" => "Trắng tức thì chỉ sau 1 lần",
                "price" => "40",
                "duration" => "8",
                "description" => "Máy tẩy tế bào chết xịn nhất thị trường, sử dụng công nghệ Ultra Sonic kết hợp cùng gel tẩy da chết sủi bọt giúp da sạch mịn không ngờ. Loại bỏ độc tố dầu nhờn, làm sạch lỗ chân lông, bổ sung tinh chất trắng da. Mặt nạ đá lạnh tươi mát bổ sung dưỡng chất sản sinh collagen, tái tạo tế bào da mới",
                'type_product_id' => 2,
            ],
            [
                "name" => "Massage cổ, vai, gáy bạc hà cam ngọt - Massage tai sảng khoái 9 tầng mây",
                "sort_description" => "Siêu thư giãn",
                "price" => "45",
                "duration" => "8",
                "description" => "Là thần dược giảm đau nhức cơ, xơ cứng, tinh dầu bạc hà mát lạnh kết hợp cùng đôi bàn tay uyển chuyển của skinner với bài massage cổ truyền tác động 12 huyệt đạo điệu nghệ cơn đau mỏi của anh sẽ nhanh chóng tan biến",
                'type_product_id' => 2,
            ],
            [
                "name" => "Xóa sổ mụn cám 6 bước an toàn - phục hồi trắng mịn",
                "sort_description" => "Sạch mụn, không to lỗ chân lông",
                "price" => "65",
                "duration" => "20",
                "description" => "Mụn đầu đen, mụn cám khiến da trở nên sạm màu, kém sắc có thể biến thành các loại mụn viêm, tàn nhang. Sử dụng các loại máy công nghệ cao, an toàn để lấy mụn, hút mụn cùng tinh chất tinh than tre và lô hội dịu nhẹ làn da sẽ giúp anh xua đi nỗi lo lấy mụn không an toàn tại nhà",
                'type_product_id' => 2,
            ],
            [
                "name" => "Detox thải độc da đầu - Massage đánh cắp linh hồn",
                "sort_description" => "Trị gầu ngứa - Dứt cơn đau đầu",
                "price" => "68",
                "duration" => "10",
                "description" => "Gói dịch vụ tuyệt vời sẽ giúp trị tận gốc các tác nhân gây gàu ngứa, loại bỏ tạp chất và bổ sung màng bảo vệ nang tóc kết hợp với kỹ thuật massage con kiến sảng khoái, dứt cơn đau đầu",
                'type_product_id' => 2,
            ],
            [
                "name" => "Combo lấy ráy tai VIP",
                "sort_description" => "Combo lấy ráy tai thư giãn đỉnh cao, kết hợp cạo mặt khăn nóng sạch hết lông tơ sẽ tút lại vẻ bảnh bao vốn có của anh",
                "price" => "70",
                "duration" => "15",
                "description" => "Quy trình lấy chuyên nghiệp hiện đại, dụng cụ vệ sinh an toàn. Thăng hoa cùng giai điệu âm thoa vàng kết hợp tinh dầu tràm trà mát dịu",
                'type_product_id' => 2,
            ],
            [
                "name" => "Lấy ráy tai Hoàng Cung",
                "sort_description" => "",
                "price" => "50",
                "duration" => "20",
                "description" => "Quy trình lấy chuyên nghiệp hiện đại, dụng cụ vệ sinh an toàn. Thăng hoa cùng giai điệu âm thoa vàng kết hợp lông công Hoàng Cung giải ngứa.",
                'type_product_id' => 2,
            ],
            [
                "name" => "Cắt tỉa móng tay",
                "sort_description" => "",
                "price" => "0",
                "duration" => "10",
                "description" => "Cắt móng tay bởi bàn tay mềm mại của skinner và dũa móng để móng không bị sắc làm xước da và quần áo",
                'type_product_id' => 2,
            ],
        ];

        Product::query()->insert($data);

        /*
         * Uốn hàn quốc
         * */
        $data = [
            [
                "name" => "Uốn cao cấp Hàn Quốc",
                "sort_description" => "Uốn cao cấp Hàn Quốc",
                "price" => "399",
                "duration" => "30",
                "description" => "Thuốc uốn đầu tiên trên thế giới loại bỏ thành phần Hydrochloride khỏi Cysteamine tuyệt đối không tổn hại da đầu, cam kết không gây rụng tóc, không chứa hoá chất gây hại",
                'type_product_id' => 3,
            ],
            [
                "name" => "Uốn tiêu chuẩn",
                "sort_description" => "Thuốc uốn số 1 Hàn Quốc, căng bóng tự nhiên",
                "price" => "319",
                "duration" => "30",
                "description" => "Thuốc uốn đầu tiên trên thế giới loại bỏ thành phần Hydrochloride khỏi Cysteamine tuyệt đối không tổn hại da đầu, cam kết không gây rụng tóc, không chứa hoá chất gây hại",
                'type_product_id' => 3,
            ],
            [
                "name" => "Uốn siêu cấp phục hồi Keratin Smooth",
                "sort_description" => "2 năm nghiên cứu, chỉ bán trong Tết",
                "price" => "469",
                "duration" => "30",
                "description" => "Thuốc uốn đầu tiên trên thế giới loại bỏ thành phần Hydrochloride khỏi Cysteamine tuyệt đối không tổn hại da đầu, cam kết không gây rụng tóc, không chứa hoá chất gây hại",
                'type_product_id' => 3,
            ],
            [
                "name" => "Uốn con sâu",
                "sort_description" => "Cool bao ngầu",
                "price" => "499",
                "duration" => "30",
                "description" => "Định nghĩa mới về biểu tượng thời trang tóc mạnh mẽ, nổi bật & cuốn hút. Là kiểu uốn hoàn toàn mới đang tạo trend khắp châu Á, khiến giới trẻ điên đảo về kiểu tóc chất chơi thời thượng với kĩ thuật uốn cũng vô cùng ngầu",
                'type_product_id' => 3,
            ],
            [
                "name" => "Premlock",
                "sort_description" => "Kiểu tóc nhà vô địch",
                "price" => "899",
                "duration" => "30",
                "description" => "Là kiểu uốn tóc làm mưa làm gió trên khắp thế giới, đậm vẻ mạnh mẽ nam tính Á Phi. Từ tiền vệ Paul Pogba nổi tiếng thế giới đến Văn Thanh U23 Việt Nam cũng phải lựa chọn kiểu đầu Premlock độc đáo, cá tính này",
                'type_product_id' => 3,
            ],
            [
                "name" => "Hấp Dưỡng Tinh Chất Oliu",
                "sort_description" => "Tóc bóng mượt - hay được dùng cùng Uốn",
                "price" => "119",
                "duration" => "20",
                "description" => "Giúp phục hồi tóc hư tổn, khô xơ, đem lại mái tóc bóng mượt, chắc khỏe bằng phương pháp hấp nhiệt bơ dầu oliu tự nhiên",
                'type_product_id' => 3,
            ],
            [
                "name" => "Phục Hồi Animo Matrix 6 bước",
                "sort_description" => "Công nghệ Nano hiện đại nhất - tóc chắc khỏe, suôn mượt",
                "price" => "159",
                "duration" => "30",
                "description" => "Chuyên trị tóc khô cứng, tóc hư tổn sau uốn nhuộm bằng công nghệ phục hồi Nano hiện đại nhất thị trường kết hợp cùng mạng tinh thể Amino",
                'type_product_id' => 3,
            ],
        ];

        Product::query()->insert($data);

        /*
         * NHUỘM CAO CẤP
         * */
        $data = [
            [
                "name" => "Nhuộm cao cấp Davines",
                "sort_description" => "Mở bán giới hạn chỉ 10 chi nhánh xuất sắc nhất",
                "price" => "339",
                "duration" => "60",
                "description" => "MÀU NHUỘM CHÍNH HÃNG - NHÃN HIỆU DAVINES Ý TỪ NĂM 1983 với Công nghệ Vibrachrom độc quyền, thay đổi hoàn toàn ngành màu nhuộm thế giới nhờ công thức tự nhiên",
                'type_product_id' => 4,
            ],
            [
                "name" => "Hấp Dưỡng Tinh Chất Oliu",
                "sort_description" => "Tóc bóng mượt chắc khỏe",
                "price" => "119",
                "duration" => "20",
                "description" => "Giúp phục hồi tóc hư tổn, khô xơ, đem lại mái tóc bóng mượt, chắc khỏe bằng phương pháp hấp nhiệt bơ dầu oliu tự nhiên",
                'type_product_id' => 4,
            ],
            [
                "name" => "Phục Hồi Animo Matrix 6 bước",
                "sort_description" => "Dưỡng tóc công nghệ Nano hiện đại nhất - 80% khách nhuộm dùng cùng",
                "price" => "159",
                "duration" => "30",
                "description" => "Chuyên trị tóc khô cứng, tóc hư tổn sau uốn nhuộm bằng công nghệ phục hồi Nano hiện đại nhất thị trường kết hợp cùng mạng tinh thể Amino",
                'type_product_id' => 4,
            ],
        ];

        Product::query()->insert($data);
    }
}
