@extends('dashboard::layout.master')
@section('title')
    <title>افزودن نوشته > {{config('app.name')}}</title>
@endsection
@section('css')

@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">افزودن نوشته</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">افزودن نوشته</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">


                </div>
                <div class="card-body">

                </div>
            </div>
        </div><!-- COL END -->
    </div>
@endsection
@section('javaScript')

@endsection
