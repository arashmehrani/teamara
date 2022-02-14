@extends('dashboard::layout.master')
@section('title')
    <title>افزودن نوشته > {{config('app.name')}}</title>
@endsection
@section('css')
    <script src="{{asset('CDN/admin/assets/plugins/ckeditor/ckeditor.js')}}" ></script>
    <script src="{{asset('CDN/admin/assets/plugins/ckeditor/ckeditor-teamara.js')}}" ></script>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-22 mg-b-5"> نوشتهٔ تازه </h2>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-9 grid-margin">
            <div class="card custom-card">
                <form>
                    <div class="card-header border-bottom-0 pb-0">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder="عنوان مطلب">
                        </div>
                    </div>
                    <div class="card-body">
                            <div id="editor"></div>
                    </div>
                </form>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-3 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    انتشار
                </div>
                <div class="card-body">
                    محتوا
                </div>
            </div>
        </div><!-- COL END -->

    </div>

@endsection
@section('javaScript')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
