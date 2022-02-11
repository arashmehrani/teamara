@extends('dashboard::layout.master')
@section('title')
    <title>تنظیمات عمومی > {{config('app.name')}}</title>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">تنظیمات عمومی سایت</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">تنظیمات</li>
    </ol>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if (Session::has('saved'))
                        <div class="alert alert-success" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert"
                                    type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('saved') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">تنظیمات عمومی</h6>
                        <p class="text-muted card-sub-title">از این بخش می توانید تنظیمات عمومی سایت را انجام دهید.</p>
                    </div>

                    <div class="row row-sm">
                        <div class="col-md-6">

                            <form method="post" action="{{route('options.update')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="site_name">عنوان سایت :</label>
                                    <input type="text" class="form-control" name="site_name" id="site_name"
                                           placeholder="عنوان سایت"
                                           value="{{ old('site_name',$app_general->meta['site_name']) }}">
                                    @if ($errors->has('site_name'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('site_name') }}</small>
                                        </p>
                                    @else
                                        <small class="text-muted">نام اصلی سایت.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="site_description">معرفی کوتاه :</label>
                                    <input type="text" class="form-control" name="site_description"
                                           id="site_description"
                                           placeholder="معرفی کوتاه"
                                           value="{{old('site_description',$app_general->meta['site_description'])}}">
                                    @if ($errors->has('site_description'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('site_description') }}</small>
                                        </p>
                                    @else
                                        <small class="text-muted">توضیح کوتاه که زیر عنوان سایت نمایش داده می
                                            شود.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="post_permalink">پیشوند آدرس مطالب :</label>
                                    <input type="text" class="form-control" name="post_permalink" id="post_permalink"
                                           placeholder="پیشوند آدرس مطالب"
                                           value="{{ old('post_permalink',$app_permalink->meta['post_permalink']) }}">
                                    @if ($errors->has('post_permalink'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('post_permalink') }}</small>
                                                    </span>
                                    @else
                                        <small class="text-muted">این عبارت قبل از آدرس مطالب سایت شما قرار
                                            میگیرد.</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="category_permalink">پیشوند آدرس دسته بندی ها :</label>
                                    <input type="text" class="form-control" name="category_permalink"
                                           id="category_permalink"
                                           placeholder="پیشوند آدرس دسته بندی ها"
                                           value="{{ old('category_permalink',$app_permalink->meta['category_permalink']) }}">
                                    @if ($errors->has('category_permalink'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('category_permalink') }}</small>
                                                    </span>
                                    @else
                                        <small class="text-muted">این عبارت قبل از آدرس مطالب سایت شما قرار
                                            میگیرد. پیش فرض {{config('app.url')}}/category</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="posts_per_page">تعداد پست ها در هر صفحه :</label>
                                    <input type="number" class="form-control" name="posts_per_page" id="posts_per_page"
                                           placeholder="تعداد پست ها در هر صفحه"
                                           value="{{ old('posts_per_page',$app_option->meta['posts_per_page']) }}">
                                    @if ($errors->has('posts_per_page'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('posts_per_page') }}</small>
                                                    </span>
                                    @else
                                        <small class="text-muted">تعداد پست ها در هر صفحه وبلاگ.</small>
                                    @endif
                                </div>

                                <div class="row row-sm" data-select2-id="21">
                                    <div class="col-sm-4" data-select2-id="20">
                                        <label for="timezone">منطقه زمانی :</label>
                                        <select class="form-control select" name="timezone" id="timezone">
                                            <option value="Asia/Tehran" selected>ایران</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="users_can_register">ثبت نام :</label>
                                    <label class="ckbox">
                                        <input type="checkbox" name="users_can_register" id="users_can_register"
                                               @if($app_option->meta['users_can_register'] == '1') checked @endif>
                                        <span class="tx-13">هر کسی می تواند ثبت نام کند</span>
                                    </label>
                                </div>

                                <div class="form-group mt-4">
                                    <label>ثبت نظر :</label>
                                    <label class="ckbox">
                                        <input type="checkbox" name="users_can_comment" id="users_can_comment"
                                               @if($app_option->meta['users_can_comment'] == '1') checked @endif>
                                        <span class="tx-13">قسمت نظرات فعال باشد</span>
                                    </label>
                                </div>
                                <div class="form-group mt-4">
                                    <label class="ckbox">
                                        <input type="checkbox" name="comment_registration" id="comment_registration"
                                               @if($app_option->meta['comment_registration'] == '1') checked @endif>
                                        <span class="tx-13">تنها کاربران ثبت نام شده امکان ثبت نظر داشته باشند</span>
                                    </label>
                                    @if ($errors->has('comment_registration'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('comment_registration') }}</small>
                                                    </span>
                                    @else
                                        <small class="text-muted">برای استفاده از این قابلیت باید ابتدا قسمت نظرات را
                                            فعال کنید.</small>
                                    @endif
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary my-2">ذخیره تغییرات</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- COL END -->
    </div>
@endsection
