@extends('dashboard::layout.master')
@section('title')
    <title>مدیریت نوشته ها > {{config('app.name')}}</title>
@endsection
@section('css')
    <link href=" {{asset('CDN/admin/assets/plugins/toast/jquery.toast.min.css')}} " rel="stylesheet"/>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">لیست نوشته ها</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">مدیریت نوشته ها</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if(Request::get('search'))
                        <h6 class="main-content-label mb-1">نتایج جستجو برای عبارت: "{{Request::get('search')}}" <small>
                                <a href="{{route('posts')}}">نمایش همه</a></small></h6>
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
                        <a href="{{route('post.new')}}" type="button" class="btn btn-primary my-2 btn-icon-text"
                           title="افزودن نوشته جدید">
                            افزودن نوشته<i class="ti-write mr-2"></i></a>
                        <div class="mr-auto float-right mt-2">
                            <form method="get">
                                <div class="input-group">
                                    <input class="form-control" placeholder="جستجو ..." type="text" name="search"
                                           id="search"
                                           value="@if(Request::get('search')) {{Request::get('search')}} @endif">
                                    <span class="input-group-btn">
                                    <button class="btn ripple btn-primary" type="submit" title="جستجوی نوشته ها ...">
													<span class="input-group-btn">
                                                        <i class="fa fa-search"></i></span></button></span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="pagination mt-2 mb-4 float-left">
                        {{$posts->links('pagination::bootstrap-4')}}
                    </ul>
                    <div class="table-responsive border userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-8p"><span>نوشته</span></th>
                                <th class="wd-lg-20p"><span></span></th>
                                <th class="wd-lg-20p"><span>نویسنده</span></th>
                                <th class="wd-lg-20p"><span>دسته ها</span></th>
                                <th class="wd-lg-20p"><span>برچسب ها</span></th>
                                <th class="wd-lg-20p"><span>نظرات</span></th>
                                <th class="wd-lg-20p"><span>تاریخ</span></th>
                                <th class="wd-lg-20p">مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <img alt="تصویر" class="rounded-circle avatar-md mr-2"
                                             src="#">
                                    </td>
                                    <td><a href="#">{{$post->title}}</a></td>

                                    <td>
                                        <a href="#">نویسنده</a>
                                    </td>
                                    <td>
                                        <a href="#">دسته ها</a>
                                    </td>
                                    <td>
                                        <a href="#">برچسب ها</a>
                                    </td>
                                    <td>
                                        <a href="#">[1]</a>
                                    </td>

                                    <td class="text-center">
                                        @if($post->status == 'published')
                                            <span class="label text-success d-flex"><span
                                                    class="dot-label bg-danger mr-1"></span>منتشر شده</span>
                                        @elseif($post->status == 'draft')
                                            <span class="label text-muted d-flex"><span
                                                    class="dot-label bg-success mr-1"></span>پیش نویس</span>
                                        @else
                                            <span class="label text-warning d-flex"><span
                                                    class="dot-label bg-warning mr-1"></span>نا مشخص</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-info"
                                           title="ویرایش">
                                            <i class="fe fe-edit-2"></i>
                                        </a>
                                        <a href="" title="حذف"
                                           onclick="event.preventDefault(); deleteItem(event,'{{ route('post.delete', $post->id) }}')"
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
                        {{$posts->links('pagination::bootstrap-4')}}
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
            if (confirm('آیا از حذف این نوشته مطمئن هستید؟')) {
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
                            text: 'شما نمی توانید این نوشته را پاک کنید',
                            showHideTransition: 'slide',
                            icon: 'warning'
                        })
                    })
            }
        };

    </script>
@endsection
