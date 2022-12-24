
    <div class="form-group">
        <label id="social_name" class="control-label">Social Name<span
                    class="required-star"> *</span></label>
        <input id="social_name" type="text"
               value="{{ isset($social->name) ? $social->name : old('name')}}"
               name="name" class="form-control">
        @error('name')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
         </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="icon">Social Icon</label>
        <input id="icon" type="text"
               value="{{ isset($social->icon) ? $social->icon : old('icon')}}"
               name="icon" class="form-control">

        @error('icon')
        <span class="help-block m-b-none text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="icon">Color Code</label> <p>Color code max 8 characters</p>
        <input id="color_code" type="text" placeholder="ffffffff"
               value="{{ isset($social->color_code) ? $social->color_code : old('color_code')}}"
               name="color_code" class="form-control">

        @error('color_code')
        <span class="help-block m-b-none text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label id="link" class="control-label">Social Link
            <span class="required-star"> *</span>
        </label>
        <input id="link" type="text"
               value="{{ isset($social->link) ? $social->link : old('link')}}"
               name="link" class="form-control">
        @error('link')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div>
        <div class="form-group mb-0">
            <label class="mb-0"><input name="status"
              {{ isset($social) && $social->status ? 'checked':old('status')}} type="checkbox"
              class="i-checks"> Publication Status </label>
        </div>
    </div>
