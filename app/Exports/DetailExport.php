<?php

namespace App\Exports;

use App\Models\Detail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetailExport implements FromArray, WithHeadings
{
    public $points;

    public function __construct(array $points)
    {
        $this->points = $points;
    }


    public function headings(): array
    {
        return [
            '#',
            'Danh mục',
            'Điểm vào',
            'Điểm ra',
            'Điểm lời mới',
            'Điểm lời cũ',
            'TC Thành Tiền',
            'Giờ KM + Ten',
        ];
    }

    public function array(): array
    {
        return $this->points;
    }
}
