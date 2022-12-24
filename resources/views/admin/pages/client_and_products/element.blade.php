<div class="form-group">
    <label for="type" class="control-label">Select type<span class="required-star"> *</span></label>
    <select data-placeholder="type" style="width: 100%;" id="type" name="type"
            class="form-control"
            required autofocus>
        <option {{ isset($clientAndProduct) && $clientAndProduct->type === 'client' ? 'selected' : old('type')}} value="client">Client</option>
        <option {{ isset($clientAndProduct) && $clientAndProduct->type === 'product' ? 'selected' : old('type')}} value="product">Product</option>
    </select>

    @error('type')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="title" class="control-label">Title<span class="required-star"> *</span></label>
    <input id="title" type="text" value="{{ isset($clientAndProduct) ? $clientAndProduct->title : old('title')}}"
           name="title" class="form-control" autofocus>

    @error('title')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="serial" class="control-label">Serial</label>
    <input id="serial" type="number" value="{{ isset($clientAndProduct) ? $clientAndProduct->serial : old('serial')}}"
           name="serial" class="form-control" autofocus>

    @error('serial')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <div class="input-group">
        <div class="custom-file">
            <input onchange="previewImage(this);"  type="file" name="image" class="custom-file-input" id="image">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>

    @error('image')
    <span class="help-block m-b-none text-danger">{{ $message }}</span>
    @enderror

    @if(isset($clientAndProduct))
        <img class="mb-3 mt-3" id="old_img" src="{{ @$clientAndProduct->image()->where('type', 'image')->first()->url }}" width="100px" height="100px" >
    @endif
    <img id="preview_image" class="mb-3 display_none" width="100px" height="100px">
</div>


<div class="form-group">
    <label class="control-label">Description</label>
    <textarea class="form-control TextEditor" name="description" id="description">
        {{ isset($clientAndProduct->description) && $clientAndProduct->description ? $clientAndProduct->description : old('description')}}
    </textarea>
    @error('description')
    <span class="help-block m-b-none text-danger">
        {{ $message }}
    </span>
    @enderror
</div>

{{--<div class="form-group">--}}
{{--    <label for="pdf">PDF</label>--}}
{{--    <div class="input-group">--}}
{{--        <div class="custom-file">--}}
{{--            <input accept="application/pdf" type="file" name="upload_file" class="custom-file-input" id="pdf">--}}
{{--            <label class="custom-file-label" for="pdf">Choose file</label>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @error('upload_file')--}}
{{--    <span class="help-block m-b-none text-danger">{{ $message }}</span>--}}
{{--    @enderror--}}

{{--    @if(isset($clientAndProduct))--}}
{{--        <div class="mt-2">--}}
{{--            <a class="text-white h5" target="_blank" href="{{ @$clientAndProduct->image()->where('type', 'pdf')->first()->url }}">--}}
{{--                <u><i>See file</i></u>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    <label for="link" class="control-label">Link</label>--}}
{{--    <input id="link" type="text" value="{{ isset($clientAndProduct) ? $clientAndProduct->link : old('link')}}"--}}
{{--           name="link" class="form-control" autofocus>--}}

{{--    @error('link')--}}
{{--    <span class="help-block m-b-none text-danger">--}}
{{--            {{ $message }}--}}
{{--        </span>--}}
{{--    @enderror--}}
{{--</div>--}}

<div class="form-group mb-0">
    <label class="mb-0">
        <input name="status"
               {{ isset($clientAndProduct) && $clientAndProduct->status ? 'checked':old('status')}} type="checkbox"
               class="i-checks">
        Publication Status
    </label>
</div>


