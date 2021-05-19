<?php

namespace Thotam\ThotamPlus\Database\Seeders;

use Illuminate\Database\Seeder;
use Thotam\ThotamPlus\Models\ChiNhanh;
use Thotam\ThotamPlus\Models\NhomSanPham;
use Thotam\ThotamPlus\Models\KenhKinhDoanh;

class ThoTamPlus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ChiNhanh Seed
        ChiNhanh::updateOrCreate(
            ['id' => 1],
            [
                'name' => "Hội sở Hà Bình Phương",
                'tag' => "HBP",
                'diachi' => "Cụm Công nghiệp Hà Bình Phương, Xã Văn Bình, Huyện Thường Tín, Hà Nội",
                'order' => 1,
                'active' => true
            ]
        );
        ChiNhanh::updateOrCreate(
            ['id' => 2],
            [
                'name' => "Chi nhánh Hà Nội",
                'tag' => "CNHN",
                'diachi' => "Số 356A đường Giải Phóng, Phường Phương Liệt, Quận Thanh Xuân, Hà Nội",
                'order' => 2,
                'active' => true
            ]
        );
        ChiNhanh::updateOrCreate(
            ['id' => 3],
            [
                'name' => "Chi nhánh Hồ Chí Minh",
                'tag' => "CNHCM",
                'diachi' => "Số 26-28 đường Hàn Mạc Tử, Phường Tân Thành, Quận Tân Phú, Thành phố Hồ Chí Minh",
                'order' => 3,
                'active' => true
            ]
        );
        ChiNhanh::updateOrCreate(
            ['id' => 4],
            [
                'name' => "Chi nhánh Đà Nẵng",
                'tag' => "CNĐN",
                'diachi' => "Lô 144-B2-2 đường Hoàng Thị Loan, Phường Hoà Minh, Quận Liên Chiểu, Thành phố Đà Nẵng, Việt Nam",
                'order' => 4,
                'active' => true
            ]
        );
        ChiNhanh::updateOrCreate(
            ['id' => 5],
            [
                'name' => "Văn phòng Thanh Hóa",
                'tag' => "VPTH",
                'diachi' => "Lô 07 BT08 Khu ĐTM Đông Sơn, Phường An Hưng, Thành phố Thanh Hóa, Tỉnh Thanh Hóa",
                'order' => 5,
                'active' => true
            ]
        );
        ChiNhanh::updateOrCreate(
            ['id' => 6],
            [
                'name' => "Văn phòng Nghệ An",
                'tag' => "VPNA",
                'diachi' => "Số nhà TT02, Đại lộ Lê Nin, Xã Nghi Phú, Thành phố Vinh, Tỉnh Nghệ An",
                'order' => 6,
                'active' => true
            ]
        );
        ChiNhanh::updateOrCreate(
            ['id' => 7],
            [
                'name' => "Văn phòng Tây Nguyên",
                'tag' => "VPTN",
                'diachi' => "Số 4 đường Lý Tự Trọng, Phường Tân An, Thành phố Buôn Ma Thuột, Tỉnh Đắk Lắk",
                'order' => 7,
                'active' => true
            ]
        );
        ChiNhanh::updateOrCreate(
            ['id' => 8],
            [
                'name' => "Văn phòng Khánh Hòa",
                'tag' => "VPKH",
                'diachi' => "Số 12 Thoại Ngọc Hầu, Phường Vĩnh Hòa, Thành phố Nha Trang, tỉnh Khánh Hòa ",
                'order' => 8,
                'active' => true
            ]
        );

        //KenhKinhDoanh Seed
        KenhKinhDoanh::updateOrCreate(
            ['id' => 1],
            [
                'name' => "ETC",
                'tag' => "ETC",
                'order' => 1,
                'active' => true
            ]
        );
        KenhKinhDoanh::updateOrCreate(
            ['id' => 2],
            [
                'name' => "OTC",
                'tag' => "OTC",
                'order' => 2,
                'active' => true
            ]
        );
        KenhKinhDoanh::updateOrCreate(
            ['id' => 3],
            [
                'name' => "PS",
                'tag' => "PS",
                'order' => 3,
                'active' => true
            ]
        );
        KenhKinhDoanh::updateOrCreate(
            ['id' => 4],
            [
                'name' => "GP",
                'tag' => "GP",
                'order' => 4,
                'active' => true
            ]
        );

        //NhomSanPham Seed
        NhomSanPham::updateOrCreate(
            ['id' => 1],
            [
                'name' => "Mắt",
                'tag' => "Mắt",
                'kenh_kinh_doanh_id' => 1,
                'order' => 1,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 2],
            [
                'name' => "Hô hấp",
                'tag' => "Hô hấp",
                'kenh_kinh_doanh_id' => 1,
                'order' => 2,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 3],
            [
                'name' => "DT Plus",
                'tag' => "DT Plus",
                'kenh_kinh_doanh_id' => 1,
                'order' => 3,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 4],
            [
                'name' => "Thần kinh",
                'tag' => "Thần kinh",
                'kenh_kinh_doanh_id' => 1,
                'order' => 4,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 5],
            [
                'name' => "Cơ xương khớp",
                'tag' => "Cơ xương khớp",
                'kenh_kinh_doanh_id' => 1,
                'order' => 5,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 6],
            [
                'name' => "Hỗn hợp",
                'tag' => "Hỗn hợp",
                'kenh_kinh_doanh_id' => 1,
                'order' => 999,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 7],
            [
                'name' => "Nhóm 1",
                'tag' => "Nhóm 1",
                'kenh_kinh_doanh_id' => 2,
                'order' => 1,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 8],
            [
                'name' => "Nhóm 2",
                'tag' => "Nhóm 2",
                'kenh_kinh_doanh_id' => 2,
                'order' => 2,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 9],
            [
                'name' => "Gây mê hồi sức",
                'tag' => "GMHS",
                'kenh_kinh_doanh_id' => 3,
                'order' => 1,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 10],
            [
                'name' => "Sản",
                'tag' => "Sản",
                'kenh_kinh_doanh_id' => 3,
                'order' => 2,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 11],
            [
                'name' => "Hỗn hợp",
                'tag' => "Hỗn hợp",
                'kenh_kinh_doanh_id' => 3,
                'order' => 999,
                'active' => true
            ]
        );
        NhomSanPham::updateOrCreate(
            ['id' => 12],
            [
                'name' => "Hỗn hợp",
                'tag' => "Hỗn hợp",
                'kenh_kinh_doanh_id' => 4,
                'order' => 999,
                'active' => true
            ]
        );
    }
}
