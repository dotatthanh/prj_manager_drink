@extends('layouts.default')

@section('title') Đổi mật khẩu @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Đổi mật khẩu</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Đổi mật khẩu</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Thông tin cơ bản</h4>
                                <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>

                                <form method="POST" action="{{ route('users.change-password', auth()->id()) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-sm-3">
                                            <label for="name">Mật khẩu hiện tại <span class="text-danger">*</span> :</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input name="password_old" type="password" class="form-control" placeholder="Nhập mật khẩu hiện tại">
                                                {!! $errors->first('password_old', '<span class="error">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-3">
                                            <label for="name">Mật khẩu mới <span class="text-danger">*</span> :</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu hiện tại">
                                                {!! $errors->first('password', '<span class="error">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-sm-3">
                                            <label for="name">Nhập lại mật khẩu mới <span class="text-danger">*</span> :</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input name="password_confirmation" type="password" class="form-control" placeholder="Nhập mật khẩu hiện tại">
                                                {!! $errors->first('password_confirmation', '<span class="error">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
                                        <a href="/dashboard" class="btn btn-secondary waves-effect">Quay lại</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection