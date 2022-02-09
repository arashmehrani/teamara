@extends('dashboard::layout.master')
@section('title')
    <title>افزودن رسانه جدید > {{config('app.name')}}</title>
@endsection
@section('css')
    <!-- InternalFileupload css-->
    <link href="{{asset('CDN/admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!-- InternalFancy uploader css-->
    <link href="{{asset('CDN/admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">افزودن رسانه جدید</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{route('media')}}">رسانه ها</a></li>
        <li class="breadcrumb-item active" aria-current="page">افزودن رسانه جدید</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">افزودن رسانه جدید</h6>
                        <p class="text-muted card-sub-title">
                            رسانه جدیدی مانند فیلم، عکس و یا سند را به آرشیو سایت اضافه کنید.
                        </p>
                    </div>

                    <form method="post" action="{{route('media.add')}}" enctype="multipart/form-data">
                        <div class="row row-sm">

                            <div class="col-md-5">

                                <input type="file" name="file" id="file" class="dropify" data-height="210">

                            </div>
                            <div class="col-md-7">
                                @csrf
                                <div class="form-group">
                                    <label for="name">نام فایل :</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="نام فایل ..." value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('name') }}</small>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">توضیحات :</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                           placeholder="توضیحات ..." value="{{old('description')}}">
                                    @if ($errors->has('description'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('description') }}</small>
                                        </p>
                                    @endif
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary my-2">افزودن فایل جدید</button>
                                </div>


                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div><!-- COL END -->
    </div>
@endsection
@section('javaScript')


    <!-- Internal Fileuploads js-->
    <script src="{{asset('CDN/admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('CDN/admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

    <script src="{{asset('CDN/admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('CDN/admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
@endsection
