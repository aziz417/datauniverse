
    <div class="form-group">
        <label for="title" class="control-label">Title</label>
        <input id="title" type="text" value="{{ isset($slider) ? $slider->title : old('title')}}"
               name="title" class="form-control" autofocus>

        @error('title')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="serial" class="control-label">Serial</label>
        <input id="serial" type="number" value="{{ isset($slider) ? $slider->serial : old('serial')}}"
               name="serial" class="form-control" autofocus>

        @error('serial')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label class="control-label">Short Description</label>
        <textarea class="form-control TextEditor" name="desc" id="desc">
        {{ isset($slider->desc) && $slider->desc ? $slider->desc : old('desc')}}
    </textarea>
        @error('desc')
        <span class="help-block m-b-none text-danger">
        {{ $message }}
    </span>
        @enderror
    </div>

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

{{--    @if(isset($slider))--}}
{{--        <div class="d-flex">--}}
{{--            <img class="mb-3" id="old_img" src="{{ @$slider->image->url }}" width="100px" height="100px" >--}}
{{--            <a onclick="deleteImage('{{ @$slider->image->base_path }}')" class="text-danger image-delete ml-2" href="javascript:void(0)">--}}
{{--                <i class="fa fa-trash-alt image_preview_delete_icon"></i></a>--}}

{{--            <a onclick="chancelImage()" class="text-danger ml-2" href="#">--}}
{{--                Chancel</a>--}}
{{--        </div>--}}
{{--    @endif--}}

    @if(isset($slider))
        <img class="mb-3" id="old_img" src="{{ @$slider->image->url }}" width="100px" height="100px" >
    @endif
    <img id="preview_image" class="mb-3 display_none" width="100px" height="100px">

    <div class="form-group">
        <label for="btn_link" class="control-label">Button Link</label>
        <input id="btn_link" type="text" value="{{ isset($slider) ? $slider->btn_link : old('btn_link')}}"
               name="btn_link" class="form-control" autofocus>

        @error('btn_link')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div>
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="status"
                       {{ isset($slider) && $slider->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>

