<!-- Admin -->
@if (Auth::guard('admin')->user()->role == 0)
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('ad.dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Route::is('ad.dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ad.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            News
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('ad.category.index') || Route::is('ad.category.create') || Route::is('ad.category.edit') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-table"></i>
                <span>Categories</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('ad.category.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('ad.category.create') }}">Create</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('ad.news.index') || Route::is('ad.news.create') || Route::is('ad.news.edit') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-fw fa-table"></i>
                <span>News</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('ad.news.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('ad.news.create') }}">Create</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('ad.staff.index') || Route::is('ad.staff.create') || Route::is('ad.staff.edit') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-fw fa-table"></i>
                <span>Staff</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('ad.staff.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('ad.staff.create') }}">Create</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('ad.user.index') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                <i class="fas fa-fw fa-table"></i>
                <span>User</span>
            </a>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('ad.user.index') }}">List</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Other
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Route::is('ad.comment.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ad.comment.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Comments</span></a>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Route::is('ad.setting.create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ad.setting.create') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Setting</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
<!-- Staff -->
@else
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            News
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('ad.news.index') || Route::is('ad.news.create') || Route::is('ad.news.edit') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-fw fa-table"></i>
                <span>News</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('ad.news.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('ad.news.create') }}">Create</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Other
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Route::is('ad.comment.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ad.comment.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Comments</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
@endif
