@extends('dashboard::layout.master')
@section('title')
    <title>برچسب ها > {{config('app.name')}}</title>
@endsection
@section('css')
    <link href="{{asset('CDN/admin/assets/plugins/toast/jquery.toast.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('CDN/admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/>
@endsection

@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">برچسب ها</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">برچسب ها</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 grid-margin">
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
                    <div>
                        <h6 class="main-content-label mb-1">افزودن برچسب</h6>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('tags.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">نام :</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="نام برچسب"
                                   value="{{old('title')}}">
                            @if ($errors->has('title'))
                                <p class="text-danger">
                                    <small>{{ $errors->first('title') }}</small>
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slug">نامک :</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="نامک"
                                   value="{{old('slug')}}">
                            @if ($errors->has('slug'))
                                <p class="text-danger">
                                    <small>{{ $errors->first('slug') }}</small>
                                </p>
                            @else
                                <small class="text-muted">نامک نسخه لاتین واژه است که در نشانی‌ها (URLs) استفاده می‌شود.
                                    برای نامگذاری فقط از حروف،‌ ارقام و خط تیره استفاده کنید. نمایش فقط با حروف کوچک
                                    خواهد
                                    بود. و در صورت خالی گذاشتن این فیلد محتوای آن به صورت خودکار از نام دسته ساخته می
                                    شود.</small>
                            @endif
                        </div>

                        <div class="form-group mt-3">
                            <label for="meta_desc" class="mg-b-10">توضیح</label>
                            <textarea class="form-control" name="meta_desc" id="meta_desc" rows="3"
                                      placeholder="توضیح مختصر ... ">{{old('meta_desc')}}</textarea>
                            @if ($errors->has('meta_desc'))
                                <p class="text-danger">
                                    <small>{{ $errors->first('meta_desc') }}</small>
                                </p>
                            @else
                                <small class="text-muted">توضیحات به صورت پیش فرض مهم نیستند، با این حال برخی از قالب‌ها
                                    ممکن است آنها را نمایش دهند.</small>
                            @endif
                        </div>

                        <input type="submit" value="افزودن برچسب" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if(Request::get('search'))
                        <h6 class="main-content-label mb-1">نتایج جستجو برای عبارت: "{{Request::get('search')}}" <small><a
                                    href="{{route('tags')}}">نمایش همه</a></small></h6>
                    @endif
                    <div class="d-flex justify-content-between">
                        <div class="mr-auto float-right mt-2">
                            <form method="get">
                                <div class="input-group">
                                    <input class="form-control" placeholder="جستجو ..." type="text" name="search"
                                           id="search"
                                           value="@if(Request::get('search')) {{Request::get('search')}} @endif">
                                    <span class="input-group-btn">
                                    <button class="btn ripple btn-primary" type="submit" title="جستجو ...">
													<span class="input-group-btn">
                                                        <i class="fa fa-search"></i></span></button></span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="pagination mt-2 mb-4 float-left">
                        {{$tags->links('pagination::bootstrap-4')}}
                    </ul>
                    <div class="table-responsive border userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-20p"><span>نام</span></th>
                                <th class="wd-lg-20p"><span>نامک</span></th>
                                <th class="wd-lg-20p"><span>تعداد</span></th>
                                <th class="wd-lg-20p">مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td><a href="#">{{$tag->title}}</a></td>
                                    <td><a href="#">{{$tag->slug}}</a></td>
                                    <td><a href="#">0</a></td>
                                    <td>
                                        <a href="{{ route('tags.edit', $tag->id) }}"
                                           class="btn btn-sm btn-info"
                                           title="ویرایش">
                                            <i class="fe fe-edit-2"></i>
                                        </a>
                                        <a href="" title="حذف"
                                           onclick="event.preventDefault(); deleteItem(event,'{{ route('tags.delete', $tag->id) }}')"
                                           class="btn btn-sm btn-danger">
                                            <i class="fe fe-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination mt-4 mb-0 float-left">
                        {{$tags->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
@endsection
@section('javaScript')
    <script src="{{asset('CDN/admin/assets/plugins/toast/jquery.toast.min.js')}}"></script>
    <script>
        function deleteItem(event, route) {
            if (confirm('آیا از حذف این آیتم مطمئن هستید؟')) {
                $.post(route, {_method: "delete", _token: "{{csrf_token()}}"})

                    .done(function (response) {
                        event.target.closest('tr').remove();
                        $.toast({
                            heading: 'انجام شد',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                    })

                    .fail(function (response) {
                        $.toast({
                            heading: 'خطا',
                            text: 'نمی توانید این دسته را حذف کنید',
                            showHideTransition: 'slide',
                            icon: 'warning'
                        })
                    })
            }
        };

    </script>

    <script src="{{asset('CDN/admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('CDN/admin/assets/js/select2.js')}}"></script>
@endsection
