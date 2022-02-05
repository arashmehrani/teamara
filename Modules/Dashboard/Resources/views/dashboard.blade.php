@extends('dashboard::layout.master')
@section('title')
    <title>پیشخوان > {{config('app.name')}}</title>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">داشبورد مدیریت</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">پنل مدیریت</li>
    </ol>
@endsection

@section('content')
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-lg-12 col-xl-8">

        </div>
        <!-- col end -->
    </div>
    <!-- Row end -->
@endsection
