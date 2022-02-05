<div class="main-header side-header sticky">
    <div class="container-fluid">
        <div class="main-header-right">
            <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
        </div>
        <div class="main-header-center">
            <div class="responsive-logo">
                <a href="{{url('/dashboard')}}"><img src="{{asset('CDN/admin/assets/img/logo/logo.png')}}"
                                                     class="mobile-logo" alt="Teamara"></a>
                <a href="{{url('/dashboard')}}"><img src="{{asset('CDN/admin/assets/img/logo/logo-light.png')}}"
                                                     class="mobile-logo-dark" alt="Teamara"></a>
            </div>

        </div>
        <div class="main-header-right">

            <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link" href="#">
                    <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                    <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                </a>
            </div>
            <div class="dropdown main-header-notification">
                <a class="nav-link icon" href="#">
                    <i class="fe fe-bell header-icons"></i>
                    <span class="badge badge-danger nav-link-badge">4</span>
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <p class="main-notification-text">شما 1 اعلان خوانده نشده <span
                                class="badge badge-pill badge-primary mr-3">مشاهده همه</span></p>
                    </div>
                    <div class="main-notification-list">
                        <div class="media new">
                            <div class="main-img-user online"><img alt="آواتار"
                                                                   src="{{asset('CDN/admin/assets/img/users/5.jpg')}}">
                            </div>
                            <div class="media-body">
                                <p>به <strong>اولیویا جیمز</strong> برای شروع الگوی جدید تبریک می گوییم</p>
                                <span>15 بهمن  12:32 بعد از ظهر</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="main-img-user"><img alt="آواتار"
                                                            src="{{asset('CDN/admin/assets/img/users/2.jpg')}}"></div>
                            <div class="media-body">
                                <p><strong></strong>پیام جدید <strong>جوشوا گری</strong> دریافت شد</p>
                                <span>13 بهمن   02:56 صبح</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="main-img-user online"><img alt="آواتار"
                                                                   src="{{asset('CDN/admin/assets/img/users/3.jpg')}}">
                            </div>
                            <div class="media-body">
                                <p><strong>الیزابت لوئیس</strong> برنامه جدیدی را به فروش مجدد اضافه کرد</p>
                                <span>12 بهمن  10:40 بعد از ظهر</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-footer">
                        <a href="#">مشاهده همه اعلان ها</a>
                    </div>
                </div>
            </div>

            <div class="dropdown main-profile-menu">
                <a class="d-flex" href="#">
                    <span class="main-img-user"><img alt="آواتار"
                                                     src="{{asset('CDN/admin/assets/img/users')}}/{{ \Illuminate\Support\Facades\Auth::user()->pic }}"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <h6 class="main-notification-title">{{ \Illuminate\Support\Facades\Auth::user()->display_name }}</h6>
                        <p class="main-notification-text">طراح وب</p>
                    </div>
                    <a class="dropdown-item border-top" href="#">
                        <i class="fe fe-user"></i> پروفایل من
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fe fe-edit"></i> ویرایش نمایه
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fe fe-settings"></i> تنظیمات حساب
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fe fe-settings"></i> پشتیبانی
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fe fe-compass"></i> فعالیت
                    </a>
                    <a class="dropdown-item" href="{{route('logout')}}">
                        <i class="fe fe-power"></i> خروج از سیستم
                    </a>
                </div>
            </div>

            <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="false" aria-label="تغییر پیمایش">
                <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
            </button><!-- Navresponsive closed -->
        </div>
    </div>
</div>
