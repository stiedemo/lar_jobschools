<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return $student = Student::firstOrCreate([
            'hovaten' => $row['ho_va_ten'],
            'gioitinh' => $row['gioi_tinh'],
            'ngaysinh' => $row['ngay_sinh'],
            'sodienthoai' => $row['so_dien_thoai'],
            'sodienthoaiphuhuynh' => $row['so_dien_thoai_phu_huynh'],
            'chucvu' => $row['chuc_vu'],
            'id_user' => Auth::user()->id
        ]);
    }
}
