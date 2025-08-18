@extends('layouts.guest')
@section('title', 'Quên mật khẩu')
@section('content')
<div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="../../assets/img/illustrations/girl-unlock-password-light.png" class="img-fluid scaleX-n1-rtl" alt="Login image" width="700" data-app-dark-img="illustrations/girl-unlock-password-dark.png" data-app-light-img="illustrations/girl-unlock-password-light.png"
                    />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Forgot Password -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
                <div class="w-px-400 mx-auto mt-sm-12 mt-8">
                    <h4 class="mb-1">Quên mật khẩu? 🔒</h4>
                    <p class="mb-6">Nhập email của bạn và chúng tôi sẽ gửi hướng dẫn đặt lại mật khẩu</p>
                    <form id="formAuthentication" class="mb-6" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-6 form-control-validation">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}"
                                   placeholder="Nhập email của bạn" autofocus />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary d-grid w-100">Gửi liên kết đặt lại</button>
                    </form>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left icon-20px scaleX-n1-rtl me-1_5 align-top"></i>
              Quay lại đăng nhập
            </a>
                    </div>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
        @endsection