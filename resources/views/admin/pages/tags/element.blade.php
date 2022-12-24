
    <div class="form-group">
        <label for="name" class="control-label">Name<span class="required-star"> *</span></label>
        <input id="name" type="text" value="{{ isset($tag) ? $tag->name : old('name')}}"
               name="name" class="form-control" autofocus>

        @error('name')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label id="description" class="control-label">Description</label>
        <textarea class="form-control TextEditor" name="description"  id="description">
            {{ isset($tag->description) && $tag->description ? $tag->description : old('description')}}
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
                       {{ isset($tag) && $tag->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>

