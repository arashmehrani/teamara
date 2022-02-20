<div>
    <div class="card-header border-bottom-0 pb-0">

        <div class="form-group">
            <input type="text" class="form-control" name="title" id="title"
                   wire:model.debounce.1000ms="title" placeholder="عنوان مطلب">
        </div>

        <div class="form-group">
            <p><a href="#">{{$slug}}</a></p>
        </div>

    </div>

</div>
