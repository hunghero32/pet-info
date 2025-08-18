@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Left Column - Profile Management -->
        <div class="col-md-7">
            <!-- Profile Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Thông tin cá nhân</h5>
                </div>
                <div class="card-body">
                    @include('components.alerts')
                    <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Tên</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', auth()->user()->phone) }}">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    </form>
                </div>
            </div>

            <!-- Password Update -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Đổi mật khẩu</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST" id="passwordForm" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu hiện tại</label>
                            <div class="input-group">
                                <input type="password" name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu mới</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                    required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Phần kiểm tra yêu cầu mật khẩu, ẩn ban đầu -->
                            <div id="password-checks" class="mt-2 d-none">
                                <div class="d-flex justify-content-between">
                                    <span class="me-3">
                                        <i class="fas fa-check text-success check-length" style="display: none;"></i>
                                        <i class="fas fa-times text-danger cross-length" style="display: inline;"></i>
                                        8+ ký tự
                                    </span>
                                    <span class="me-3">
                                        <i class="fas fa-check text-success check-uppercase" style="display: none;"></i>
                                        <i class="fas fa-times text-danger cross-uppercase" style="display: inline;"></i>
                                        Chữ hoa
                                    </span>
                                    <span class="me-3">
                                        <i class="fas fa-check text-success check-number" style="display: none;"></i>
                                        <i class="fas fa-times text-danger cross-number" style="display: inline;"></i>
                                        Số
                                    </span>
                                    <span>
                                        <i class="fas fa-check text-success check-special" style="display: none;"></i>
                                        <i class="fas fa-times text-danger cross-special" style="display: inline;"></i>
                                        Ký tự đặc biệt
                                    </span>
                                </div>
                            </div>
                            <div class="invalid-feedback" id="password-requirements" style="display: none;">
                                Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, số và ký tự đặc biệt
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Xác nhận mật khẩu mới</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" class="form-control" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column - Login History -->
        <div class="col-md-5">
            <br>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Lịch sử đăng nhập</h5>
                </div>
                <div class="card-body p-0"> <!-- Removed padding for better table look -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Thiết bị</th>
                                    <th>Trình duyệt</th>
                                    <th>Hoạt động cuối</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sessions as $session)
                                <tr class="{{ $session['current'] ? 'table-primary' : '' }}">
                                    <td>
                                        {{ $session['device'] ?? 'Unknown' }}
                                        <div class="small text-muted">{{ $session['platform'] }}</div>
                                    </td>
                                    <td>
                                        {{ $session['browser'] }}
                                        <div class="small text-muted">{{ $session['ip_address'] }}</div>
                                    </td>
                                    <td>{{ $session['last_active'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });

    // Password validation
    const passwordInput = document.getElementById('password');
    const passwordForm = document.getElementById('passwordForm');
    const passwordChecks = document.getElementById('password-checks');
    const checkLength = document.querySelector('.check-length');
    const crossLength = document.querySelector('.cross-length');
    const checkUppercase = document.querySelector('.check-uppercase');
    const crossUppercase = document.querySelector('.cross-uppercase');
    const checkNumber = document.querySelector('.check-number');
    const crossNumber = document.querySelector('.cross-number');
    const checkSpecial = document.querySelector('.check-special');
    const crossSpecial = document.querySelector('.cross-special');
    const passwordRequirements = document.getElementById('password-requirements');

    function updatePasswordChecks() {
        const password = passwordInput.value;
        const lengthValid = password.length >= 8;
        const uppercaseValid = /[A-Z]/.test(password);
        const numberValid = /\d/.test(password);
        const specialValid = /[@$!%*?&]/.test(password);

        // Hiển thị password-checks nếu có input
        if (password.length > 0) {
            passwordChecks.classList.remove('d-none');
        } else {
            passwordChecks.classList.add('d-none');
        }

        // Cập nhật trạng thái icon
        if (lengthValid) {
            checkLength.style.display = 'inline';
            crossLength.style.display = 'none';
        } else {
            checkLength.style.display = 'none';
            crossLength.style.display = 'inline';
        }

        if (uppercaseValid) {
            checkUppercase.style.display = 'inline';
            crossUppercase.style.display = 'none';
        } else {
            checkUppercase.style.display = 'none';
            crossUppercase.style.display = 'inline';
        }

        if (numberValid) {
            checkNumber.style.display = 'inline';
            crossNumber.style.display = 'none';
        } else {
            checkNumber.style.display = 'none';
            crossNumber.style.display = 'inline';
        }

        if (specialValid) {
            checkSpecial.style.display = 'inline';
            crossSpecial.style.display = 'none';
        } else {
            checkSpecial.style.display = 'none';
            crossSpecial.style.display = 'inline';
        }

        // Hiển thị hoặc ẩn thông báo yêu cầu
        if (password && ![lengthValid, uppercaseValid, numberValid, specialValid].every(Boolean)) {
            passwordRequirements.style.display = 'block';
        } else {
            passwordRequirements.style.display = 'none';
        }
    }

    // Validate khi nhập liệu
    passwordInput.addEventListener('input', updatePasswordChecks);

    // Validate khi submit form
    passwordForm.addEventListener('submit', function(event) {
        updatePasswordChecks();
        const allValid = [passwordInput.value.length >= 8, /[A-Z]/.test(passwordInput.value),
                         /\d/.test(passwordInput.value), /[@$!%*?&]/.test(passwordInput.value)]
                         .every(Boolean);

        if (passwordInput.value && !allValid) {
            event.preventDefault();
            passwordInput.classList.add('is-invalid');
            return false;
        }
        passwordInput.classList.remove('is-invalid');
    });

    // Auto trim whitespace from email and phone
    const profileForm = document.getElementById('profileForm');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');

    profileForm.addEventListener('submit', function(e) {
        if (emailInput) emailInput.value = emailInput.value.trim();
        if (phoneInput) phoneInput.value = phoneInput.value.trim();
    });
});
</script>
@endpush
@endsection