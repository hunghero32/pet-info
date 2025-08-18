@extends('layouts.guest')
@section('title', 'Đăng Nhập')
@section('content')
<div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
        <div class="w-100 d-flex justify-content-center">
            <img src="../../assets/img/illustrations/boy-with-rocket-light.png" class="img-fluid" alt="Login image" width="700" data-app-dark-img="illustrations/boy-with-rocket-dark.png" data-app-light-img="illustrations/boy-with-rocket-light.png" />
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-sm-12 mt-8">
            <h4 class="mb-1">Chào mừng đến với TDZ! 👋</h4>
            <p class="mb-6">Vui lòng đăng nhập vào tài khoản của bạn để bắt đầu</p>

            <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-6 form-control-validation">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}"
                           placeholder="Nhập email" autofocus />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-password-toggle form-control-validation">
                    <label class="form-label" for="password">Mật khẩu</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" 
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="my-7">
                    <div class="d-flex justify-content-between">
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember" 
                                   {{ old('remember') ? 'checked' : '' }}/>
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <a href="{{ route('password.request') }}">
                            <p class="mb-0">Quên mật khẩu?</p>
                        </a>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Đăng nhập</button>
            </form>

            <p class="text-center">
                <span>Chưa có tài khoản?</span>
                <a href="{{ route('register') }}">
                    <span>Tạo tài khoản</span>
                </a>
            </p>

            <div class="divider my-6">
                <div class="divider-text">hoặc</div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-facebook me-1_5">
                    <i class="icon-base bx bxl-facebook-circle icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-twitter me-1_5">
                    <i class="icon-base bx bxl-twitter icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-github me-1_5">
                    <i class="icon-base bx bxl-github icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-google-plus">
                    <i class="icon-base bx bxl-google icon-20px"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Login -->
</div>
@endsection