@foreach($categories as $sub_category)
    <tr>
        <td><a href="#">{{str_repeat('---', $level)}} {{$sub_category->title}}</a></td>
        <td><a href="#">{{$sub_category->slug}}</a></td>
        <td><a href="#">0</a></td>
        <td>
            <a href="{{ route('category.edit', $sub_category->id) }}" class="btn btn-sm btn-info"
               title="ویرایش">
                <i class="fe fe-edit-2"></i>
            </a>
            <a href="" title="حذف"
               onclick="event.preventDefault(); deleteItem(event,'{{ route('category.delete', $sub_category->id) }}')"
               class="btn btn-sm btn-danger">
                <i class="fe fe-trash"></i>
            </a>
        </td>
    </tr>
    @if(count($sub_category->childrenRecursive))
        @include('category::sub.sub-category-list', ['categories' => $sub_category->childrenRecursive, 'level' => $level+1])
    @endif
@endforeach
