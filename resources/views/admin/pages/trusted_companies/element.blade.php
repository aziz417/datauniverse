
    <div class="form-group">
        <label for="title" class="control-label">Title<span class="required-star"> *</span></label>
        <input id="title" type="text" value="{{ isset($trustedCompany) ? $trustedCompany->title : old('title')}}"
               name="title" class="form-control" autofocus>

        @error('title')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="title" class="control-label">Website Link {{--<span class="required-star"> *</span>--}}</label><span class="text-warning">Optional</span>
        <input id="title" type="text" value="{{ isset($trustedCompany) ? $trustedCompany->website_link : old('website_link')}}"
               name="website_link" class="form-control" autofocus>

        @error('website_link')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

{{--    <div class="form-group">--}}
{{--        <label for="image_width" class="control-label">Image Width</label> <span style="font-size: 12px">( Give as image width px )</span>--}}
{{--        <input id="image_width" type="number" placeholder="250"--}}
{{--               name="image_width" class="form-control" autofocus>--}}
{{--    </div>--}}

{{--    <div class="form-group">--}}
{{--        <label for="image_height" class="control-label">Image Height</label> <span style="font-size: 12px">( Give as image height px )</span>--}}
{{--        <input id="image_height" type="number" placeholder="300"--}}
{{--               name="image_height" class="form-control" autofocus>--}}
{{--    </div>--}}

    <div class="form-group">
        <label for="image">Image<span class="required-star"> *</span></label>
        <div class="input-group">
            <div class="custom-file">
                <input onchange="previewImage(this);" accept="image/*" type="file" name="image" class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>

        @error('image')
        <span class="help-block m-b-none text-danger">{{ $message }}</span>
        @enderror
    </div>

    @if(isset($trustedCompany))
        <img class="mb-3" id="old_img" src="{{ @$trustedCompany->image->url }}" width="100px" height="100px" >
    @endif
    <img id="preview_image" class="mb-3 display_none" width="100px" height="100px">

    <div>
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="status"
                       {{ isset($trustedCompany) && $trustedCompany->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>

