@extends('dashboard::layout.master')
@section('title')
    <title>ویرایش رسانه {{$media->name}} > {{config('app.name')}}</title>
@endsection
@section('css')

    <link href="{{asset('CDN/admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet"/>

    <link href="{{asset('CDN/admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">ویرایش رسانه {{$media->name}}</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{route('media')}}">رسانه ها</a></li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if (Session::has('updated'))
                        <div class="alert alert-success" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert"
                                    type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('updated') }}
                            <p class="pt-2">
                                <a href="{{route('media')}}"> ← بازگشت به لیست رسانه ها</a>
                            </p>
                        </div>
                    @endif
                </div>
                <div class="card-body">

                    <form method="post" action="{{route('media.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$media->id}}" name="id" id="id">
                        <div class="row row-sm">
                            <div class="col-md-12">

                                <input type="file" name="file" id="file" class="dropify" data-height="200"
                                       data-default-file="{{url('')}}\{{$media->files['original']}}"
                                       data-max-file-size="10M"
                                       data-allowed-file-extensions="jpg png jpeg gif zip rar tar 7z doc docx pdf xlsx mp4 mkv mov wmv avi mp3 flac wav txt">

                                @if ($errors->has('file'))
                                    <p class="text-danger">
                                        <small>{{ $errors->first('file') }}</small>
                                    </p>
                                @endif

                                <div class="form-group mt-3">
                                    <label for="title">عنوان فایل :</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           placeholder="عنوان فایل ..." value="{{old('title',$media->title)}}">
                                    @if ($errors->has('title'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('title') }}</small>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">توضیحات :</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                           placeholder="توضیحات ..." value="{{old('description',$media->description)}}">
                                    @if ($errors->has('description'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('description') }}</small>
                                        </p>
                                    @endif
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary my-2">بروز رسانی</button>
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
