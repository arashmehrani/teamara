<div>

    <div class="form-group">
        <input type="text" class="form-control" name="title" id="title"
               wire:model.debounce.1000ms="title" placeholder="عنوان مطلب">
    </div>
    @if($ChangeSlug == true)

        <div class="form-group">
            <input class="form-control" placeholder="نامک" type="text" name="newSlug" id="newSlug"
                   value="{{$slug}}"><span class="input-group-btn"></span>
        </div>
    @else
        <p><a wire:click="ChangeSlug" href="#">{{$slug}}</a></p>
    @endif

</div>
