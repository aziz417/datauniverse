<div class="form-group">
    <label id="header_top_title" class="control-label">Site Name</label>
    <input id="header_top_title" type="text"
           value="{{isset($setting->header_top_title) ? $setting->header_top_title : old('header_top_title')}}"
           name="header_top_title" class="form-control">
    @error('header_top_title')
    <span class="help-block m-b-none text-danger">
                                            {{ $message }}
                                         </span>
    @enderror
</div>

<div class="form-group">
    <label for="logo">Logo</label>
    <div class="input-group">
        <div class="custom-file">
            <input onchange="previewImage(this);" accept="image/*" type="file" name="logo"
                   class="custom-file-input" id="logo">
            <label class="custom-file-label" for="logo">Choose file</label>
        </div>
    </div>

    @error('logo')
    <span class="help-block m-b-none text-danger">{{ $message }}</span>
    @enderror
</div>

@if(isset($setting))
    <img class="mb-3" id="old_img" src="{{ @$setting->image()->where('type', 'logo')->first()->url }}" width="100px" height="100px" >
@endif
<img id="preview_image" class="mb-3 display_none" width="100px" height="100px">



<div class="form-group">
    <label for="logo">Parallax Image</label>
    <div class="input-group">
        <div class="custom-file">
            <input onchange="previewImage2(this);" accept="image/*" type="file" name="parallax_image"
                   class="custom-file-input" id="logo">
            <label class="custom-file-label" for="logo">Choose file</label>
        </div>
    </div>

    @error('parallax_image')
    <span class="help-block m-b-none text-danger">{{ $message }}</span>
    @enderror
</div>


@if(isset($setting))
    <img class="mb-3" id="old_img2" src="{{ @$setting->image()->where('type', 'parallax_image')->first()->url }}" width="100px" height="100px" >
@endif
<img id="preview_image2" class="mb-3 display_none2" width="100px" height="100px">

<div class="form-group">
    <label id="description_one" class="control-label">Description</label>
    <textarea class="form-control TextEditor" name="description"  id="description">
        {{ isset($setting->description) && $setting->description ? $setting->description : old('description')}}
    </textarea>
    @error('description')
    <span class="help-block m-b-none text-danger">
        {{ $message }}
    </span>
    @enderror
</div>


<div class="form-group mb-0">
    <label class="mb-0"><input name="status"
                               {{ isset($setting) && $setting->status ? 'checked':old('status')}} type="checkbox"
                               class="i-checks"> Publication Status </label>
</div>

@push('script')
    <script src="{{ asset('backend/js/plugins/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.settingTextEditor').summernote();
        });
    </script>
@endpush