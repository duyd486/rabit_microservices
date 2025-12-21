<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'=>'Sổ tay scrapbook A5 dot 130gsm The Reverie Diary - Thỏ Nơ',
                'price'=>100000,
                'detail'=>'Sổ được thiết kế xen kẽ các trang hoạ tiết nền',
                'category_id'=>'6',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở chấm dot 120 trang Crabit x SGT - The Furry Friends - Xanh tím',
                'price'=>18000,
                'detail'=>'Vở ghi chép 120 trang (chấm dot, grid, kẻ ngang)',
                'category_id'=>'11',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Set Mini Post Card A Few Notes',
                'price'=>9000,
                'detail'=>'Set gồm 6 mẫu post card decor, trang trí sổ tay bàn học',
                'category_id'=>'18',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Box làm đất sét tự khô - Be Happier Clay Craft Box - Box dành cho 1 người (500g)',
                'price'=>189000,
                'detail'=>'Đúng như tên gọi của set này, đây là một chiếc hộp chứa đựng không chỉ niềm vui khi bạn tự tay nhào nặn ra những thành quả mà còn là chiếc hộp chứa đựng đầy đủ các dụng cụ cần thiết để bạn thỏa sức sáng tạo với đất sét tự khô',
                'category_id'=>'19',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ tay A5 kẻ ngang 130gsm 110 trang A Few Notes - We Should Grab A Matcha',
                'price'=>60000,
                'detail'=>'Màu sắc có thể khác biệt hơn thực tế do ánh sáng lúc chụp hoặc ánh sáng hiển thị trên màn hình.',
                'category_id'=>'5',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ tay bỏ túi Dot The Furry Friends Crabit x SGT - Cu Lỳ',
                'price'=>60000,
                'detail'=>'Sổ tay bỏ túi nhỏ gọn kích thước: 130 x 190 mm',
                'category_id'=>'6',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ trơn khổ vuông Ribbon Collection Quote Trắng (Tặng kèm nơ)',
                'price'=>80000,
                'detail'=>'Ribbon Notebook Collection - Bộ sưu tập sổ vở đến từ Crabit. Là cái chạm nhẹ của sự lãng mạnh và nữ tính cho những ghi chép hàng ngày của bạn.',
                'category_id'=>'7',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sổ tay scrapbook A5 grid 130gsm The Reverie Diary - Nhũ Sọc Xanh',
                'price'=>90000,
                'detail'=>'Tiếp nối cảm hứng từ BST Ribbon 1, bộ sưu tập lần này vẫn mang sự điệu đà, nữ tính của phong cách lãng mạn Toile de jouy, Cottagecore đầy thanh lịch và quý tộc',
                'category_id'=>'8',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
              [
                'name'=>'Sketchbook Khổ Vuông 190gsm The Reverie Diary - Nhũ Nơ Hồng',
                'price'=>90000,
                'detail'=>'KHÔNG PHẢI GIẤY CHUYÊN DỤNG CHO MÀU NƯỚC. KHÔNG NÊN DÙNG MÀU NƯỚC',
                'category_id'=>'9',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
             [
                'name'=>'Vở kẻ ngang chấm 80 trang B5 giấy Nhật Crabit x Kokuyo Land of Too-Shy 2 - Bananeet Picnic',
                'price'=>22000,
                'detail'=>'GIẤY NHẬP KHẨU TỪ NHẬT BẢN CAO CẤP',
                'category_id'=>'10',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở grid caro 80gsm 100 trang The Reverie Diary - Nơ Hồng To',
                'price'=>19000,
                'detail'=>'Tiếp nối cảm hứng từ BST Ribbon 1, bộ sưu tập lần này vẫn mang sự điệu đà, nữ tính của phong cách lãng mạn Toile de jouy, Cottagecore đầy thanh lịch và quý tộc',
                'category_id'=>'12',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở kẻ ngang 500 trang tặng kèm sticker Composition Collection - Xanh Teal',
                'price'=>80000,
                'detail'=>'Dòng vở siêu dày Crabit Composition số trang 200 - 500 trang đã cập bến Crabit thoả mãn đúng nhu cầu dân chuyên.',
                'category_id'=>'13',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
             [
                'name'=>'Vở cornel grid 120 trang Composition Collection - Tím',
                'price'=>22000,
                'detail'=>'Phương pháp Cornell ghi chép kiến thức rõ ràng, logic giúp bạn nhớ lại nhanh chóng kiến thức đặc biệt là trước lúc chuẩn bị cho các bài kiểm tra trắc nghiệm hoặc tự luận.',
                'category_id'=>'14',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Hộp 5 bút gel Kaco Pure - Morandi 2',
                'price'=>84000,
                'detail'=>'Kaco Gel Pen là dòng bút đã có tiếng về chất lượng và thiết kế đến từ Nhật Bản.',
                'category_id'=>'15',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
             [
                'name'=>'Sticker Dính Vía Siêu to dán Vali',
                'price'=>59000,
                'detail'=>'Sticker chống 100% nước thoải mái decor các bề mặt ngoài trời',
                'category_id'=>'16',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
             [
                'name'=>'Masking Tape cuộn vintage',
                'price'=>35000,
                'detail'=>'-',
                'category_id'=>'17',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
             [
                'name'=>'Combo 2 bút luyện viết chữ Calligraphy chuyên dụng',
                'price'=>74000,
                'detail'=>'Bút lông đầu cứng dễ dàng viết nét thanh nét đậm của Calligraphy, có thể vẽ sketch, viền và overlay cho tranh màu nước.',
                'category_id'=>'20',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
             [
                'name'=>'Bộ sách luyện viết Modern Calligraphy & Handwriting',
                'price'=>256000,
                'detail'=>'Sổ luyện viết chữ Modern Calligraphy được thiết kế để dành cho người mới tập viết chữ Calligraphy có thể tự luyện chữ, dễ dàng sử dụng.',
                'category_id'=>'21',
                'quantity'=>random_int(1,100),
                'total_sold'=>random_int(1,100),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            
        ]);
    }
}
