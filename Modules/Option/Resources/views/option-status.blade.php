@extends('dashboard::layout.master')
@section('title')
    <title>وضعیت سرور > {{config('app.name')}}</title>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">وضعیت سیستم</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">وضعیت سیستم</li>
    </ol>
@endsection
@section('content')
    <!--Row-->

    <div class="row row-sm">
        <div class="col-xxl-6 col-xl-6 col-md-12 col-lg-6">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-1">
                    <label class="main-content-label mb-2 pt-1">وضعیت سرور</label>
                    <p class="tx-12 mb-0 text-muted">مشخصات و ورژن زیرساخت های سرور در ادامه مشخص شده است</p>
                </div>
                <div class="product-timeline card-body pt-3 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0"><i class="ti-harddrives product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">PHP Version </span> <a href=""
                                                                                                class="float-left tx-14 text-muted"><span
                                    class="tag tag-dark mt-1 mb-1">{{ PHP_VERSION }}</span></a>
                            <p class="mb-0 text-muted tx-12">نسخه PHP</p>
                        </li>
                        <li class="mt-0"><i class="ti-server product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">Laravel Version </span> <a href=""
                                                                                                    class="float-left tx-14 text-muted"><span
                                    class="tag tag-dark mt-1 mb-1">{{ Illuminate\Foundation\Application::VERSION }}</span></a>
                            <p class="mb-0 text-muted tx-12">هسته لاراول</p>
                        </li>
                        <li class="mt-0"><i class="ti-server product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">OS Type </span> <a href=""
                                                                                            class="float-left tx-14 text-muted"><span
                                    class="tag tag-dark mt-1 mb-1">{{ $os_type }}</span></a>
                            <p class="mb-0 text-muted tx-12">سیستم عامل</p>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <!-- col end -->

        <div class="col-xxl-6 col-xl-6 col-md-12 col-lg-6">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-1">
                    <label class="main-content-label mb-2 pt-1">وضعیت پایگاه داده</label>
                    <p class="tx-12 mb-0 text-muted">مشخصات و ورژن زیرساخت های پایگاه داده در ادامه مشخص شده است</p>
                </div>
                <div class="product-timeline card-body pt-3 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0"><i class="ti-harddrives product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">Mysql Version </span> <a href=""
                                                                                                  class="float-left tx-14 text-muted"><span
                                    class="tag tag-dark mt-1 mb-1">{{$mysql_version}}</span></a>
                            <p class="mb-0 text-muted tx-12">نسخه Mysql</p>
                        </li>
                        <li class="mt-0"><i class="ti-server product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">TLS Version </span> <a href=""
                                                                                                class="float-left tx-14 text-muted"><span
                                    class="tag tag-dark mt-1 mb-1">{{ $tls_version }}</span></a>
                            <p class="mb-0 text-muted tx-12">نسخه TLS</p>
                        </li>
                        <li class="mt-0"><i class="ti-server product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">Mysql Type </span> <a href=""
                                                                                               class="float-left tx-14 text-muted"><span
                                    class="tag tag-dark mt-1 mb-1">{{ $mysql_type }}</span></a>
                            <p class="mb-0 text-muted tx-12">نوع Mysql</p>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <!-- col end -->

    </div>

    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">محدودیت های PHP</h6>
                        <p class="text-muted card-sub-title">جهت افزایش پرفورمنس و کارایی از طریق سرور خود می توانید
                            اقدام به افزایش مقادیر زیر کنید.</p>
                    </div>
                    <div class="table-responsive border">
                        <table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>نام</th>
                                <th>مقدار</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th scope="row">memory_limit</th>
                                <td>PHP Memory Limit</td>
                                <td><span class="tag tag-dark mt-1 mb-1">{{$memory_limit}}</span></td>
                            </tr>
                            <tr>
                                <th scope="row">post_max_size</th>
                                <td>PHP Post Max Size</td>
                                <td><span class="tag tag-dark mt-1 mb-1">{{$post_max_size}}</span></td>
                            </tr>
                            <tr>
                                <th scope="row">upload_max_filesize</th>
                                <td>PHP Max Upload Size</td>
                                <td><span class="tag tag-dark mt-1 mb-1">{{$upload_max_filesize}}</span></td>
                            </tr>
                            <tr>
                                <th scope="row">max_execution_time</th>
                                <td>PHP Max Execution Time</td>
                                <td><span class="tag tag-dark mt-1 mb-1">{{$max_execution_time}}</span></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row end -->
@endsection
