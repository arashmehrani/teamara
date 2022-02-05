@extends('dashboard::layout.master')
@section('title')
    <title>ویرایش برچسب > {{$tag->title}}</title>
@endsection
@section('css')
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
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if (Session::has('saved'))
                        <div class="alert alert-success" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert"
                                    type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('saved') }}
                            <p class="pt-2">
                                <a href="{{route('tags')}}"> ← بازگشت به لیست برچسب ها</a>
                            </p>
                        </div>
                    @endif
                    <div>
                        <h6 class="main-content-label mb-1">ویرایش برچسب "{{$tag->title}}"</h6>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('tags.update')}}">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$tag->id}}">
                        <div class="form-group">
                            <label for="title">نام :</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="نام برچسب"
                                   value="{{old('title',$tag->title)}}">
                            @if ($errors->has('title'))
                                <p class="text-danger">
                                    <small>{{ $errors->first('title') }}</small>
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slug">نامک :</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="نامک"
                                   value="{{old('slug',$tag->slug)}}">
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
                                      placeholder="توضیح مختصر ... ">{{old('meta_desc',$tag->meta_desc)}}</textarea>
                            @if ($errors->has('meta_desc'))
                                <p class="text-danger">
                                    <small>{{ $errors->first('meta_desc') }}</small>
                                </p>
                            @else
                                <small class="text-muted">توضیحات به صورت پیش فرض مهم نیستند، با این حال برخی از قالب‌ها
                                    ممکن است آنها را نمایش دهند.</small>
                            @endif
                        </div>

                        <input type="submit" value="ویرایش برچسب" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div><!-- COL END -->

    </div>
@endsection
@section('javaScript')
@endsection
