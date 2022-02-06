@extends('dashboard::layout.master')
@section('title')
    <title>ویرایش دسته "{{$category->title}}"</title>
@endsection
@section('css')
    <link href="{{asset('CDN/admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/>
@endsection

@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">ویرایش دسته "{{$category->title}}"</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{route('categories')}}">دسته بندی ها</a></li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش دسته "{{$category->title}}"</li>
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
                                <a href="{{route('categories')}}"> ← بازگشت به لیست دسته ها</a>
                            </p>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('category.update')}}">
                        @csrf
                        <input type="hidden" value="{{$category->id}}" name="id" id="id">
                        <div class="form-group">
                            <label for="title">نام :</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="نام دسته"
                                   value="{{old('title',$category->title)}}">
                            @if ($errors->has('title'))
                                <p class="text-danger">
                                    <small>{{ $errors->first('title') }}</small>
                                </p>
                            @else
                                <small class="text-muted">نام نمایشی دسته در سایت.</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slug">نامک :</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="نامک"
                                   value="{{old('slug',$category->slug)}}">
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

                        <div class="row row-sm">
                            <div class="col-sm-6">
                                <p class="mg-b-10">دسته مادر</p>
                                <select class="form-control select2 select2-hidden-accessible" data-select2-id="00"
                                        tabindex="-1" aria-hidden="true" name="parent_id" id="parent_id">
                                    <option @if($category->parent_id == null) selected @endif value="0"
                                            data-select2-id="0">
                                        بدون دسته مادر
                                    </option>
                                    @foreach($category_parents as $subCategory_parent)
                                        <option @if($category->parent_id == $subCategory_parent->id) selected
                                                @endif value="{{$subCategory_parent->id}}"
                                                data-select2-id="0{{$subCategory_parent->id}}">
                                            {{$subCategory_parent->title}}
                                        </option>
                                        @if(count($subCategory_parent->childrenRecursive))
                                            @include('category::sub.sub-category',
                                            ['category_parents' => $subCategory_parent->childrenRecursive,
                                            'parentId' => $category->parent_id,
                                             'thisId' => $category->id,
                                             'level' => 1])
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="meta_desc" class="mg-b-10">توضیح</label>
                            <textarea class="form-control" name="meta_desc" id="meta_desc" rows="3"
                                      placeholder="توضیح مختصر دسته ... ">
                                {{old('meta_desc',$category->meta_desc)}}
                            </textarea>
                            @if ($errors->has('meta_desc'))
                                <p class="text-danger">
                                    <small>{{ $errors->first('meta_desc') }}</small>
                                </p>
                            @else
                                <small class="text-muted">توضیحات به صورت پیش فرض مهم نیستند، با این حال برخی از قالب‌ها
                                    ممکن است آنها را نمایش دهند.</small>
                            @endif
                        </div>
                        <input type="submit" value="ویرایش دسته" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
@endsection
@section('javaScript')
    <script src="{{asset('CDN/admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('CDN/admin/assets/js/select2.js')}}"></script>
@endsection
