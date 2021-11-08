<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Quản lý</li>

                <li>
                    <a href="/dashboard" class=" waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('types.index') }}" class=" waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Loại đồ uống</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('drinks.index') }}" class=" waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Đồ uống</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>