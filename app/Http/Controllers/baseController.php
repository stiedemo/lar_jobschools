<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class baseController extends Controller
{
    public function actionLogout() {
        Auth::logout();
        return redirect()->route('login')->with('thongbao', 'Đăng xuất thành công')->with('type', 'success');
    }
    public function actionHome() {
        if(Auth::check()) {
            return redirect()->route('Manager.index');
        }else {
            return 'Đang cập nhật';
        }
    }
    public function actionHomeManager() {
        return view('manager.index');
    }
    public function actionLogin() {
        return view('base.login');
    }
    public function runLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required',
        ],
        [
          'email.required'=>'Tài khoản email không được để trống!',
          'email.email'=>'Email không đúng định dạng!',
          'pass.required'=>'Mật khẩu không được để trống!',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->pass], $request->remember)){
            return redirect()->route('Manager.index')->with('thongbao', 'Đăng nhập vào hệ thông thành công')->with('type', 'success');
        }else{
            return redirect()->back()->withErrors(['Tài khoản hoặc mật khẩu không chính xác'])->withInput();
        }
    }
    public function actionRegister() {
        return view('base.register');
    }
    public function runRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'pass' => 'required',
            'name' => 'required',
            'gioitinh' => 'required',
            'chucvu' => 'required',
            'ngaysinh' => 'required|date',
            'donvi' => 'required',
            're_add' => 'required',
            'check' => 'required',
        ],
        [
          'email.unique'=>'Email đã tồn tại!',
          'email.required'=>'Email không được để trống!',
          'email.email'=>'Email không đúng định dạng!',
          'name.required'=>'Tên không được để trống!',
          'gioitinh.required'=>'Giới tính không được để trống!',
          'pass.required'=>'Mật khẩu không được để trống!',
          'chucvu.required'=>'Chức vụ không được để trống!',
          'ngaysinh.date'=>'Ngày sinh không hợp lệ!',
          'ngaysinh.required'=>'Ngày sinh không được để trống!',
          'donvi.required'=>'Đơn vị không được để trống!',
          're_add.required'=>'Vị trí không được để trống!',
          'check.required'=>'Hãy tick vào ô đồng ý!',
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->hovaten = $request->name;
        $user->gioitinh = $request->gioitinh;
        $user->ngaysinh = $request->ngaysinh;
        $user->class = $request->chidoan;
        $user->id_chucvu = $request->chucvu;
        $user->school = $request->donvi;
        $user->id_address = $request->re_add;
        $user->password = bcrypt($request->pass);
        $user->save();

        if(Auth::attempt(['email' => $request->email, 'password' => $request->pass], true)){
            return redirect()->route('Manager.index')->with('thongbao', 'Đăng nhập vào hệ thông thành công')->with('type', 'success');
        }else{
            return redirect()->back()->withErrors(['Quá trình đăng ký thành viên gặp lỗi không mong muốn'])->withInput();
        }
    }
}
