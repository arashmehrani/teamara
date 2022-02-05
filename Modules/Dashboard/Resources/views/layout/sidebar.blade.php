<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{url('/dashboard')}}">
            <img src="{{asset('CDN/admin/assets/img/logo/logo-light.png')}}" class="header-brand-img desktop-logo"
                 alt="لوگو">
            <img src="{{asset('CDN/admin/assets/img/logo/icon-light.png')}}" class="header-brand-img icon-logo"
                 alt="لوگو">
            <img src="{{asset('CDN/admin/assets/img/logo/logo.png')}}" class="header-brand-img desktop-logo theme-logo"
                 alt="لوگو">
            <img src="{{asset('CDN/admin/assets/img/logo/icon.png')}}" class="header-brand-img icon-logo theme-logo"
                 alt="لوگو">
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">

            <li class="nav-item @if( route('dashboard') == request()->url()) active @endif">
                <a class="nav-link" href="{{route('dashboard')}}"><span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">داشبورد</span>
                </a>
            </li>

            @if(Route::has('categories'))
                <li class="nav-item @if( route('categories') == request()->url()) active @endif">
                    <a class="nav-link" href="{{route('categories')}}"><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="si si-layers sidemenu-icon"></i><span class="sidemenu-label">دسته بندی ها</span>
                    </a>
                </li>
            @endif

            @if(Route::has('tags'))
                <li class="nav-item @if( route('tags') == request()->url()) active @endif">
                    <a class="nav-link" href="{{route('tags')}}"><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="si si-layers sidemenu-icon"></i><span class="sidemenu-label">برچسب ها</span>
                    </a>
                </li>
            @endif

            @if(Route::has('users'))
                <li class="nav-item
                @if( route('users') == request()->url()) active show @endif
                @if( route('user.new') == request()->url()) active show @endif
                @if( route('profile.edit') == request()->url()) active show @endif
                    ">
                    <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                        <i class="si si-people sidemenu-icon"></i><span class="sidemenu-label">کاربران</span>
                        <i class="angle fe fe-chevron-left"></i></a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item @if( route('users') == request()->url()) active @endif">
                            <a class="nav-sub-link" href="{{route('users')}}">مدیریت کاربران</a>
                        </li>
                    </ul>
                    <ul class="nav-sub">
                        <li class="nav-sub-item @if( route('user.new') == request()->url()) active @endif">
                            <a class="nav-sub-link" href="{{route('user.new')}}">افزودن کاربر</a>
                        </li>
                    </ul>
                    <ul class="nav-sub">
                        <li class="nav-sub-item @if( route('profile.edit') == request()->url()) active @endif">
                            <a class="nav-sub-link" href="{{route('profile.edit')}}">ویرایش حساب</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Route::has('options'))
                <li class="nav-item
                @if( route('options') == request()->url()) active show @endif
                @if( route('options.email') == request()->url()) active show @endif
                @if( route('options.status') == request()->url()) active show @endif
                    ">
                    <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                        <i class="ti-settings sidemenu-icon"></i><span class="sidemenu-label">تنظیمات</span>
                        <i class="angle fe fe-chevron-left"></i></a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item @if( route('options') == request()->url()) active @endif">
                            <a class="nav-sub-link" href="{{route('options')}}">تنظیمات عمومی</a>
                        </li>
                    </ul>
                    <ul class="nav-sub">
                        <li class="nav-sub-item @if( route('options.email') == request()->url()) active @endif">
                            <a class="nav-sub-link" href="{{route('options.email')}}">تنظیمات ایمیل</a>
                        </li>
                    </ul>
                    <ul class="nav-sub">
                        <li class="nav-sub-item @if( route('options.status') == request()->url()) active @endif">
                            <a class="nav-sub-link" href="{{route('options.status')}}">مشخصات سیستم</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- End Sidemenu -->
