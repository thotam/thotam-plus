<?php

namespace Thotam\ThotamPlus\Database\Seeders;

use Illuminate\Database\Seeder;
use Thotam\ThotamPlus\Models\NhaMang;
use Thotam\ThotamPlus\Models\ChiNhanh;
use Thotam\ThotamPlus\Models\NganHang;
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
        ChiNhanh::updateOrCreate(
            ['id' => 9],
            [
                'name' => "Văn phòng Hải Phòng",
                'tag' => "VPHP",
                'diachi' => "Số 14/139 Phố Tô Vũ, Lô BT 14 Kiều sơn, Phường Đằng Lâm, Quận Hải An, Thành phố Hải Phòng",
                'order' => 9,
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

        //NhaMang Seed
        NhaMang::updateOrCreate(
            ['id' => 1],
            ['nhamang_name' => "Viettel", 'active' => true]
        );
        NhaMang::updateOrCreate(
            ['id' => 2],
            ['nhamang_name' => "Mobifone", 'active' => true]
        );
        NhaMang::updateOrCreate(
            ['id' => 3],
            ['nhamang_name' => "Vinaphone", 'active' => true]
        );
        NhaMang::updateOrCreate(
            ['id' => 4],
            ['nhamang_name' => "Vietnamobile", 'active' => true]
        );
        NhaMang::updateOrCreate(
            ['id' => 5],
            ['nhamang_name' => "Gmobile", 'active' => true]
        );
        NhaMang::updateOrCreate(
            ['id' => 6],
            ['nhamang_name' => "iTelecom ", 'active' => true]
        );

        //NganHang Seed
        NganHang::updateOrCreate(
            ['id' => 1],
            ['bank_name' => "Vietcombank_TMCP Ngoại thương Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 2],
            ['bank_name' => "Vietinbank_TMCP Công Thương Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 3],
            ['bank_name' => "BIDV_TMCP Đầu tư và Phát triển Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 4],
            ['bank_name' => "Agribank_Nông nghiệp và Phát triển Nông thôn Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 5],
            ['bank_name' => "VPBank_TMCP Việt Nam Thịnh Vượng", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 6],
            ['bank_name' => "Sacombank _TMCP Sài Gòn Thương Tín", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 7],
            ['bank_name' => "ACB_TMCP Á Châu", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 8],
            ['bank_name' => "HSBC_TNHH Một Thành Viên HSBC Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 9],
            ['bank_name' => "DongA Bank_TMCP Đông Á", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 10],
            ['bank_name' => "TPBank_TMCP Tiên Phong", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 11],
            ['bank_name' => "EximBank_TMCP Xuất Nhập Khẩu Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 12],
            ['bank_name' => "VIB_TMCP Quốc Tế Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 13],
            ['bank_name' => "SHB_TMCP Sài Gòn - Hà Nội", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 14],
            ['bank_name' => "OCB_TMCP Phương Đông", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 15],
            ['bank_name' => "Shinhan Bank_TNHH MTV Shinhan Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 16],
            ['bank_name' => "Vietbank_Việt Nam Thương Tín", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 17],
            ['bank_name' => "PG Bank_TMCP Xăng dầu Petrolimex Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 18],
            ['bank_name' => "SCB_TMCP Sài Gòn", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 19],
            ['bank_name' => "Maritime Bank_TMCP Hàng Hải Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 20],
            ['bank_name' => "ABBank_TMCP An Bình", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 21],
            ['bank_name' => "Techcombank_TMCP Kỹ Thương Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 22],
            ['bank_name' => "MBBank_TMCP Quân Đội", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 23],
            ['bank_name' => "LienVietPostBank_TMCP Bưu Điện Liên Việt", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 24],
            ['bank_name' => "SeABank_TMCP Đông Nam Á", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 25],
            ['bank_name' => "Standard Chartered_TNHH MTV Standard Chartered Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 26],
            ['bank_name' => "PVcomBank_TMCP Đại Chúng Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 27],
            ['bank_name' => "ANZ_TNHH MTV ANZ", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 28],
            ['bank_name' => "UOB_TNHH MTV United Overseas Bank (Việt Nam)", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 29],
            ['bank_name' => "First Bank_First Commercial Bank", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 30],
            ['bank_name' => "Woori Bank_TNHH MTV Woori Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 31],
            ['bank_name' => "Nam A Bank_TMCP Nam Á", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 32],
            ['bank_name' => "Saigonbank_TMCP Sài Gòn Công Thương", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 33],
            ['bank_name' => "Bac A Bank_TMCP Bắc Á", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 34],
            ['bank_name' => "HDBank_TMCP Phát triển Nhà TP.HCM", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 35],
            ['bank_name' => "Viet Capital Bank_TMCP Bản Việt", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 36],
            ['bank_name' => "VietABank_TMCP Việt Á", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 37],
            ['bank_name' => "GPBank_TM TNHH MTV Dầu Khí Toàn Cầu", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 38],
            ['bank_name' => "NCB_TMCP Quốc Dân", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 39],
            ['bank_name' => "KienLong Bank_TMCP Kiên Long", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 40],
            ['bank_name' => "OceanBank_TM TNHH MTV Đại Dương", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 41],
            ['bank_name' => "CBBank_TM TNHH MTV Xây dựng Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 42],
            ['bank_name' => "BAOVIET Bank_TMCP Bảo Việt", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 43],
            ['bank_name' => "VBSP_Chính sách Xã hội Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 44],
            ['bank_name' => "VDB_Phát Triển Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 45],
            ['bank_name' => "Public Bank Việt Nam_TNHH MTV Public Việt Nam", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 46],
            ['bank_name' => "Indovina Bank_TNHH Indovina", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 47],
            ['bank_name' => "VRB_Liên doanh Việt - Nga", 'active' => true]
        );
         NganHang::updateOrCreate(
            ['id' => 48],
            ['bank_name' => "HongLeong Bank_Hong Leong Việt Nam (HongLeong)", 'active' => true]
        );
    }
}
