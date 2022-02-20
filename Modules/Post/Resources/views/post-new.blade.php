@extends('dashboard::layout.master')
@section('title')
    <title>افزودن نوشته > {{config('app.name')}}</title>
@endsection
@section('css')
    <script src="{{asset('CDN/admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('CDN/admin/assets/plugins/ckeditor/ckeditor-teamara.js')}}"></script>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-22 mg-b-5"> نوشتهٔ تازه </h2>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-9 grid-margin">
            <div class="card custom-card">

                <livewire:post::new-post />

                <div class="card-body">
                    <div id="editor"></div>
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
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
