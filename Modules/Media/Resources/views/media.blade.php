@extends('dashboard::layout.master')
@section('title')
    <title>مدیریت رسانه ها > {{config('app.name')}}</title>
@endsection
@section('css')
    <link href=" {{asset('CDN/admin/assets/plugins/toast/jquery.toast.min.css')}} " rel="stylesheet"/>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">مدیریت رسانه ها</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">مدیریت رسانه ها</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if(Request::get('search'))
                        <h6 class="main-content-label mb-1">نتایج جستجو برای عبارت: "{{Request::get('search')}}" <small>
                                <a href="{{route('media')}}">نمایش همه</a></small></h6>
                    @endif
                    @if (Session::has('added'))
                        <div class="alert alert-success" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert"
                                    type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('added') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{route('media.new')}}" type="button" class="btn btn-primary my-2 btn-icon-text"
                           title="افزودن رسانه جدید">
                            افزودن رسانه جدید<i class="ti-write mr-2"></i></a>
                        <div class="mr-auto float-right mt-2">
                            <form method="get">
                                <div class="input-group">
                                    <input class="form-control" placeholder="جستجو ..." type="text" name="search"
                                           id="search"
                                           value="@if(Request::get('search')) {{Request::get('search')}} @endif">
                                    <span class="input-group-btn">
                                    <button class="btn ripple btn-primary" type="submit" title="جستجوی رسانه ...">
													<span class="input-group-btn">
                                                        <i class="fa fa-search"></i></span></button></span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="pagination mt-2 mb-4 float-left">
                        {{$medias->links('pagination::bootstrap-4')}}
                    </ul>
                    <div class="table-responsive border userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-8p"><span>رسانه</span></th>
                                <th class="wd-lg-20p"><span></span></th>
                                <th class="wd-lg-20p"><span>آپلود توسط</span></th>
                                <th class="wd-lg-20p"><span>مورد استفاده</span></th>
                                <th class="wd-lg-20p"><span>تاریخ</span></th>
                                <th class="wd-lg-20p">مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medias as $media)
                                <tr>
                                    <td>
                                        <img alt="آواتار" class="rounded-circle avatar-md mr-2"
                                             src="{{url('')}}\{{$media->files[150]}}">
                                    </td>
                                    <td><a href="#">{{$media->path}}</a></td>

                                    <td class="">
                                        <a href="#">{{$media->user->display_name}}</a>
                                    </td>
                                    <td>
                                        <a href="#">تست</a>
                                    </td>
                                    <td>
                                        {{$media->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit', $media->id) }}" class="btn btn-sm btn-info"
                                           title="ویرایش">
                                            <i class="fe fe-edit-2"></i>
                                        </a>
                                        <a href="" title="حذف"
                                           onclick="event.preventDefault(); deleteItem(event,'{{ route('media.delete', $media->id) }}')"
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
                        {{$medias->links('pagination::bootstrap-4')}}
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
                            text: 'شما نمی توانید این فایل را پاک کنید',
                            showHideTransition: 'slide',
                            icon: 'warning'
                        })
                    })
            }
        };

    </script>
@endsection
