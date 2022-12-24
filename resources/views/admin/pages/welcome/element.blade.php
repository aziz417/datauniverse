
    <div class="form-group">
        <label for="title" class="control-label">Title<span class="required-star"> *</span></label>
        <input id="title" type="text" value="{{ isset($welcome) ? $welcome->title : old('title')}}"
               name="title" class="form-control" autofocus>

        @error('title')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label id="description" class="control-label">Description</label>
        <textarea class="form-control TextEditor" name="description"  id="description">
            {{ isset($welcome->description) && $welcome->description ? $welcome->description : old('description')}}
        </textarea>
        @error('description')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="link" class="control-label">Link<span class="required-star"> *</span></label>
        <input id="link" type="text" value="{{ isset($welcome) ? $welcome->link : old('link')}}"
               name="link" class="form-control" autofocus>

        @error('link')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Image</label>
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

    @if(isset($welcome))
        <img class="mb-3" id="old_img" src="{{ $welcome->image->url }}" width="100px" height="100px" >
    @endif
    <img id="preview_image" class="mb-3 display_none" width="100px" height="100px">

    <div>
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="status"
                       {{ isset($welcome) && $welcome->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>

