
    <div class="form-group">
        <label for="title" class="control-label">Title<span class="required-star"> *</span></label>
        <input id="title" type="text" value="{{ isset($userExpectation) ? $userExpectation->title : old('title')}}"
               name="title" class="form-control" autofocus required>

        @error('title')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="quantity" class="control-label">Quantity<span class="required-star"> *</span></label>
        <input id="quantity" type="text" value="{{ isset($userExpectation) ? $userExpectation->quantity : old('quantity')}}"
               name="quantity" class="form-control" autofocus required>

        @error('quantity')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="small_text" class="control-label">Small Text<span class="required-star"> *</span></label>
        <input id="small_text" type="text" value="{{ isset($userExpectation) ? $userExpectation->small_text : old('small_text')}}"
               name="small_text" class="form-control" autofocus required>

        @error('small_text')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div>
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="status"
                       {{ isset($userExpectation) && $userExpectation->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>
