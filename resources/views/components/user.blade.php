<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="rounded-circle" />
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="pages-account-settings-account.html">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <small class="text-body-secondary">{{ Auth::user()->role }}</small><br>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <div class="dropdown-divider my-1"></div>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="icon-base bx bx-star icon-md me-3"></i><span>Điểm: </span><span class="text-danger">{{number_format( Auth::user()->points) }}</span></a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('profile.edit')}}"> <i class="icon-base bx bx-user icon-md me-3"></i><span>Tài khoản</span> </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('profile.edit')}}"> <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span> </a>
        </li>
        <li>
            <a class="dropdown-item" href="pages-account-settings-billing.html">
                <span class="d-flex align-items-center align-middle">
                    <i class="flex-shrink-0 icon-base bx bx-credit-card icon-md me-3"></i><span class="flex-grow-1 align-middle">Billing Plan</span>
                    <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                </span>
            </a>
        </li>
        <li>
            <div class="dropdown-divider my-1"></div>
        </li>
        <li>
            <a class="dropdown-item" href="pages-pricing.html"> <i class="icon-base bx bx-dollar icon-md me-3"></i><span>Pricing</span> </a>
        </li>
        <li>
            <a class="dropdown-item" href="pages-faq.html"> <i class="icon-base bx bx-help-circle icon-md me-3"></i><span>FAQ</span> </a>
        </li>
        <li>
            <div class="dropdown-divider my-1"></div>
        </li>
        <li>
            <!-- Form đăng xuất với xác minh -->
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
            <a class="dropdown-item" href="javascript:void(0);" onclick="confirmLogout()">
                <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Đăng xuất</span>
            </a>
        </li>
    </ul>
</li>
<script>
    function confirmLogout() {
        // Hiển thị hộp thoại xác nhận trước khi thực hiện logout
        if (confirm('Bạn chắc chắn muốn đăng xuất?')) {
            // Nếu người dùng chọn "OK", gửi form đăng xuất
            document.getElementById('logout-form').submit();
        }
    }
</script>