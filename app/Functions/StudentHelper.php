<?php 
    use App\Student;
    class StudentHelper
    {
        public static function getGioiTinh($gioitinh, $request)
        {
            switch ($request) {
                case 'name':
                    return $gioitinh == Student::_IS_BOY ? 'Nam' : 'Nữ';
                    break;
                
                case 'icon':
                return $gioitinh == Student::_IS_BOY ? 'mars' : 'venus';
                break;
            
            }
        }
    }
    
?>