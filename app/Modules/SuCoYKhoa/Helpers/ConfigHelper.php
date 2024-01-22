<?php

namespace App\Modules\SuCoYKhoa\Helpers;

class ConfigHelper
{
    const NHOM_SU_CO = [
        1 => '1. Thực hiện quy trình kỹ thuật, thủ thuật chuyên môn',
        2 => '2. Nhiễm khuẩn bệnh viện',
        3 => '3. Thuốc và dịch truyền',
        4 => '4. Máu và các chế phẩm máu',
        5 => '5. Thiết bị y tế',
        6 => '6. Hành vi',
        7 => '7. Té ngã',
        8 => '8. Hạ tầng cơ sở',
        9 => '9. Quản lý nguồn lực, tổ chức',
        10 => '10. Hồ sơ, tài liệu, thủ tục hành chính',
        11 => '11. Khác'
    ];

    const MUC_DO_TON_THUONG = [
        'A' => 'Tình huống có nguy cơ gây ra sự cố (near miss) - NC0',
        'B' => 'Sự cố đã xảy ra, chưa tác động trực tiếp đến người bệnh - NC1',
        'C' => 'Sự cố đã xảy ra tác động trực tiếp đến người bệnh, chưa gây nguy hại. - NC1',
        'D' => 'Sự cố đã xảy ra tác động trực tiếp đến người bệnh, cần phải theo dõi hoặc đã can thiệp điều trị kịp thời nên không gây nguy hại - NC1',
        'E' => 'Sự cố đã xảy ra gây nguy hại tạm thời và cần phải can thiệp điều trị - NC2',
        'F' => 'Sự cố đã xảy ra, gây nguy hại tạm thời, cần phải can thiệp điều trị và kéo dài thời gian nằm viện - NC2',
        'G' => 'Sự cố đã xảy ra gây nguy hại kéo dài, để lại di chứng - NC3',
        'H' => 'Sự cố đã xảy ra gây nguy hại cần phải hồi sức tích cực - NC3',
        'I' => 'Sự cố đã xảy ra có ảnh hưởng hoặc trực tiếp gây tử vong - NC3',
    ];
}
