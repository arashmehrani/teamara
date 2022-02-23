@extends('dashboard::layout.master')
@section('title')
    <title>افزودن نوشته > {{config('app.name')}}</title>
@endsection
@section('css')
    <link href="{{asset('CDN/admin/assets/plugins/summernote/summernote-bs4.min.css')}}" rel="stylesheet"/>

@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-22 mg-b-5"> نوشتهٔ تازه </h2>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-9 grid-margin">
            <div class="card custom-card">

                <div class="card-body">

                    <livewire:post::new-post/>

                    <textarea id="summernote" name="content"></textarea>
                </div>

            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-3 grid-margin">
            <div class="card custom-card">
                <div class="card-body">

                    <div class="d-flex mb-3">
                        <div class="">
                            <a href="#" class="btn btn-sm btn-outline-dark">ذخیره پیش‌نویس</a>
                        </div>
                        <div class="mr-auto my-auto">
                            <a href="#" class="btn btn-sm btn-outline-dark">پیش ‌نمایش</a>
                        </div>
                    </div>

                    <div>
                        <span>وضعیت: </span><a href="#">پیش نویس</a>
                    </div>
                    <div class="mt-2">
                        <span>قابلیت مشاهده: </span><a href="#">عمومی</a>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="mr-auto my-auto">
                            <input type="submit" class="btn btn-primary" value="ثبت و انتشار">
                        </div>
                    </div>

                </div>
            </div>


            <div class="card custom-card">
                <div class="card-body">
                    دسته بندی ها
                </div>
            </div>

            <div class="card custom-card">
                <div class="card-body">
                    برچسب ها
                </div>
            </div>

            <div class="card custom-card">
                <div class="card-body">
                    تصویر اصلی
                </div>
            </div>


        </div><!-- COL END -->


    </div>

@endsection
@section('javaScript')
    <script src="{{asset('CDN/admin/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('CDN/admin/assets/plugins/summernote/lang/summernote-fa-IR.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'محتوای مطلب ...',
                tabsize: 2,
                height: 300,
                lang: 'fa-IR',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['height', ['height']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endsection
