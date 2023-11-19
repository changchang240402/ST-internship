<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('admin_resources/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold">Hệ thống quản lý</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::is("customers.*") ? 'active' : ''}}" href="{{ route("customers.index") }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Khách hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is("suppliers.*") ? 'active' : '' }}" href="{{route("suppliers.index") }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Nhà cung cấp</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is("categories.*") ? 'active' : '' }}" href="{{ route("categories.index") }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Danh mục sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}"> 
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Nhân viên</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
