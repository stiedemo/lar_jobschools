@extends('manager.layouts.main')
@section('title', 'Quản Lý Học Sinh Sinh Viên')
@section('content-page')
<div class="col-xl-12">
        <div class="table-responsive">
            <div>
                <table class="table align-items-center table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                STT
                            </th>
                            <th scope="col">
                                Họ Và Tên
                            </th>
                            <th scope="col">
                                Giới Tính
                            </th>
                            <th scope="col">
                                Số Điện Thoại
                            </th>
                            <th scope="col">
                                SĐT Phụ Huynh
                            </th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">
                                Chức Vụ
                            </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach (Auth::user()->Student as $stt => $student )
                        <tr>
                            <th>
                                <span class="mb-0 text-sm">{{  ++ $stt }}</span>
                            </th>
                            <th>
                                <span class="mb-0 text-sm">{{ $student->hovaten }}</span>
                            </th>
                            <td>
                                    <span class="mb-0 text-sm"><i class="fas fa-{{ StudentHelper::getGioiTinh($student->gioitinh, 'icon') }}"></i> {{ StudentHelper::getGioiTinh($student->gioitinh, 'name') }}</span>
                            </td>
                            <td>
                                    <span class="mb-0 text-sm">{{ $student->sodienthoai }}</span>
                            </td>
                            <td>
                                    <span class="mb-0 text-sm">{{ $student->sodienthoaiphuhuynh }}</span>
                            </td>
                            <td>
                                    <span class="mb-0 text-sm"> </span>
                            </td>
                            <td>
                                    <span class="mb-0 text-sm">{{ $student->chucvu }}</span>
                            </td>
                            {{-- <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">Chỉnh Sửa</a>
                                        <a class="dropdown-item" href="#">Xóa Bỏ</a>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
    
                    </tbody>
                </table>
            </div>
    
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nhận danh sách chỉnh sửa thông tin học sinh</h5>
                <p class="card-text">Hệ thống hỗ trợ chỉnh sửa thông tin học sinh sinh viên của mình một cách dễ dàng bằng file Excel. Bấm vào nút bên dưới để nhận file chỉnh sửa, thêm mới hay là xóa bỏ học sinh, sinh viên mà bạn đang quản lý.</p>
                <p class="card-text"><strong>Lưu ý</strong>: Bạn chỉ có thể thay đổi thông tin của học sinh sinh viên. Không thể thay đổi cấu trúc của file excel.</p>
                <div class="text-center">
                        <a href="{{ route('Manager.Student.export') }}" class="btn btn-primary">Nhận File</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <form method="POST" action="{{ route('Manager.Student.import') }}" class="card-body" enctype="multipart/form-data">
                @csrf
                <h5 class="card-title">Cập nhật thông tin học sinh sinh viên bằng file Excel</h5>
                <p class="card-text"> Cập nhật thông tin học sinh sinh viên bằng cách tải lên file excel đã chỉnh sửa mà hệ thống đã cung cấp trước đó</p>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Chọn File Cần Cập Nhật</label>
                </div>
                </div>
                <div class="text-center">
                        <button type="submit" class="btn btn-success">Update File</button>
                </div>
            </form>
        </div>
    </div>
@endsection