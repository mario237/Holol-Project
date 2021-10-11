<div class="form-group col-md-6 col-lg-3">
    <label for="{{$name}}" class="col-sm-12 col-form-label">{{$title}}</label>
    <div class="col-sm-12">
        <input type="file" class="form-control" id="{{$name}}" name="{{$name}}" wire:model="files" multiple>
    </div>
    <ul>
        @foreach($files as $file)
        @if($file)
        <ol>
            تم رفع الملف
            <a class="d-inline-block" target="_blank" href="{{ $file->temporaryUrl() }}">اضغط هنا
                لفتح الملف</a>
            @endif
        </ol>
        @endforeach
    </ul>
</div>
