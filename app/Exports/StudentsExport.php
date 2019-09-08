<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Student::all();
        $order = [];
        $stt = 0;
        foreach ($orders as $row) {
            $stt++;
            $gioitinh = $row->gioitinh == Student::_IS_BOY ? 'Nam' : 'Nữ';
            $order[] = array(
                '1' => $row->id,
                '2' => $stt,
                '3' => $row->hovaten,
                '4' => $gioitinh,
                '5' => $row->ngaysinh,
                '6' => $row->sodienthoai,
                '7' => $row->sodienthoaiphuhuynh,
                '8' => $row->chucvu,
                '9' => '=IF(D'. ($stt + 1) .' = "Nam",'.Student::_IS_BOY.',1)'
            );
        }

        return (collect($order));
    }
    public function headings(): array
    {
        return [
            'Mã Định Danh',
            'STT',
            'Họ Và Tên',
            'Giới Tính',
            'Ngày Sinh',
            'Số Điện Thoại',
            'Số Điện Thoại Phụ Huynh',
            'Chức Vụ',
        ];
    }
}
