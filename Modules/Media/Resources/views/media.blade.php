@extends('dashboard::layout.master')
@section('title')
    <title>رسانه ها > {{config('app.name')}}</title>
@endsection
@section('css')

@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">رسانه ها</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">رسانه ها</li>
    </ol>
@endsection

@section('content')

@endsection
@section('javaScript')

@endsection
