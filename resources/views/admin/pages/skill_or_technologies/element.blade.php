
    <div class="form-group">
        <label for="title" class="control-label">Title<span class="required-star"> *</span></label>
        <input id="title" type="text" value="{{ isset($skillOrTechnology) ? $skillOrTechnology->title : old('title')}}"
               name="title" class="form-control {{--{{ isset($skillOrTechnology) ? 'custom-disable' : '' }}--}}" autofocus>
        @error('title')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="serial" class="control-label">Serial<span class="required-star"> *</span></label>
        <input id="serial" type="number" value="{{ isset($skillOrTechnology) ? $skillOrTechnology->serial : old('title')}}"
               name="serial" class="form-control {{--{{ isset($skillOrTechnology) ? 'custom-disable' : '' }}--}}" autofocus>
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
                <input onchange="previewImage(this);"  accept="image/*" type="file" name="image" class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>

        @error('image')
        <span class="help-block m-b-none text-danger">{{ $message }}</span>
        @enderror
    </div>

    @if(isset($skillOrTechnology))
        <img class="mb-3" id="old_img" src="{{ @$skillOrTechnology->images()->where('type', 'lg')->first()->url }}" width="100px" height="100px" >
    @endif
    <img id="preview_image" class="mb-3 display_none" width="100px" height="100px">

    <div class="form-group">
        <label for="image">Set Under Construction Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input onchange="previewImage2(this);"  accept="image/*" type="file" name="image2" class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>

        @error('image2')
        <span class="help-block m-b-none text-danger">{{ $message }}</span>
        @enderror
    </div>

    @if(isset($skillOrTechnology))
        <img class="mb-3" id="old_img2" src="{{ @$skillOrTechnology->images()->where('type', 'construction')->first()->url }}" width="100px" height="100px" >
    @endif
    <img id="preview_image2" class="mb-3 display_none2" width="100px" height="100px">

    <div class="form-group">
        <label id="description" class="control-label">Description</label>
        <textarea class="form-control TextEditor" name="description"  id="description">
            {{ isset($skillOrTechnology->description) && $skillOrTechnology->description ? $skillOrTechnology->description : old('description')}}
        </textarea>
        @error('description')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div>
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="status"
                       {{ isset($skillOrTechnology) && $skillOrTechnology->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>


