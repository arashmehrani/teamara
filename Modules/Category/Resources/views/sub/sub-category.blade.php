@if(isset($parentId))
    @foreach($category_parents as $sub_category)
        <option value="{{$sub_category->id}}"
                data-select2-id="0{{$sub_category->id}}"
                @if($parentId == $sub_category->id) selected @endif
                @if($thisId == $sub_category->id) disabled hidden @endif>
            {{str_repeat('---', $level)}} {{$sub_category->title}}
        </option>
        @if(count($sub_category->childrenRecursive))
            @include('category::sub.sub-category', ['category_parents' => $sub_category->childrenRecursive,
            'parentId' => $parentId,
             'thisId' => $thisId,
             'level' => $level+1])
        @endif
    @endforeach
@else
    @foreach($category_parents as $sub_category)
        <option value="{{$sub_category->id}}"
                data-select2-id="0{{$sub_category->id}}">
            {{str_repeat('---', $level)}} {{$sub_category->title}}
        </option>
        @if(count($sub_category->childrenRecursive))
            @include('category::sub.sub-category', ['category_parents' => $sub_category->childrenRecursive, 'level' => $level+1])
        @endif
    @endforeach
@endif
