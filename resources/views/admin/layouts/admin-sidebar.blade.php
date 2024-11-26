<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <h3>ADMIN</h3>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <!-- Dashboard -->
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ Request::routeIs('adminDashboard') ? 'active' : '' }}">
                    <a href="{{ route('adminDashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Quản lý Sản phẩm -->
                <li class="sidebar-item has-sub {{ Request::routeIs('products.*') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-box"></i>
                        <span>Quản lý Sản phẩm</span>
                    </a>
                    <ul class="submenu text-nowrap" style="{{ Request::routeIs('products.*') ? 'display: block;' : '' }}">
                        <li class="submenu-item {{ Request::routeIs('products.index') ? 'active' : '' }}">
                            <a href="{{ route('products.index') }}">Danh sách sản phẩm</a>
                        </li>
                        <li class="submenu-item {{ Request::routeIs('products.create') ? 'active' : '' }}">
                            <a href="{{route('products.create')}}">Thêm sản phẩm</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('categories.html') ? 'active' : '' }}">
                            <a href="categories.html">Danh mục</a>
                        </li>
                    </ul>
                </li>

                <!-- Quản lý Nhân Viên -->
                <li class="sidebar-item has-sub {{ Request::url() == url('employees.html') ? 'active' : '' }}">
                    <a href="employees.html" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Quản lý Nhân Viên</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item text-nowrap {{ Request::url() == url('employee-list.html') ? 'active' : '' }}">
                            <a href="employee-list.html">Danh sách nhân viên</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('employee-create.html') ? 'active' : '' }}">
                            <a href="employee-create.html">Thêm nhân viên</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('employee-edit.html') ? 'active' : '' }}">
                            <a href="employee-edit.html">Cập nhật thông tin</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('employee-delete.html') ? 'active' : '' }}">
                            <a href="employee-delete.html">Chỉnh sửa trạng thái nhân viên</a>
                        </li>
                    </ul>
                </li>

                <!-- Quản lý Khách Hàng -->
                <li class="sidebar-item has-sub {{ Request::url() == url('user-list.html') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Quản lý Khách hàng</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::url() == url('user-list.html') ? 'active' : '' }}">
                            <a href="user-list.html">Danh sách</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('user-edit.html') ? 'active' : '' }}">
                            <a href="user-edit.html">Cập nhật trạng thái</a>
                        </li>
                    </ul>
                </li>

                <!-- Quản lý Khuyến mãi -->
                <li class="sidebar-item has-sub {{ Request::url() == url('promotion-list.html') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-percent"></i>
                        <span>Quản lý Khuyến mãi</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::url() == url('promotion-list.html') ? 'active' : '' }}">
                            <a href="promotion-list.html">Danh sách khuyến mãi</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('promotion-create.html') ? 'active' : '' }}">
                            <a href="promotion-create.html">Thêm khuyến mãi</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('promotion-edit.html') ? 'active' : '' }}">
                            <a href="promotion-edit.html">Chỉnh sửa khuyến mãi</a>
                        </li>
                        <li class="submenu-item {{ Request::url() == url('promotion-delete.html') ? 'active' : '' }}">
                            <a href="promotion-delete.html">Cập nhật trạng thái khuyến mãi</a>
                        </li>
                    </ul>
                </li>

                <!-- Báo cáo -->
                <li class="sidebar-item {{ Request::url() == url('reports.html') ? 'active' : '' }}">
                    <a href="reports.html" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Thống kê</span>
                    </a>
                </li>

                <!-- Authentication -->
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="auth-login.html">Login</a>
                        </li>
                        <li class="submenu-item">
                            <a href="auth-register.html">Register</a>
                        </li>
                        <li class="submenu-item">
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
