
    <div class="form-group">
        <label for="name" class="control-label">Name<span class="required-star">*</span></label>
        <input required id="name" type="text"
               value="{{ isset($user->name) ? @$user->name : old('name')}}"
               name="name" class="form-control">
        @error('name')
            <span class="help-block m-b-none text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>



    <div class="form-group">
        <label for="email">Email<span class="required-star">*</span></label>
        <input required id="email" type="email"
               value="{{ isset($user->email) ? @$user->email : old('email')}}"
               name="email" class="form-control">

        @error('email')
         <span class="help-block m-b-none text-danger">{{ $message }}</span>
        @enderror
    </div>

@if(!isset($user))

    <div class="form-group">
        <label for="password" class="control-label">Password<span class="required-star">*</span></label>
        <input required id="password" type="password"
               name="password" class="form-control">

        @error('password')
            <span class="help-block m-b-none text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

@endif

    @php
        $check_user_roles = isset($user) ? $user->roles()->pluck('id')->toArray() : [];
    @endphp


        <div class="form-group">
            <label for="type" class="control-label">Role<span class="required-star">*</span></label><br>
            @foreach($roles as $role)
                <span class="ml-sm-3">{{ ucfirst($role->name) }}</span>
                <input value="{{ $role->id }}" {{ isset($user) && in_array($role->id, $check_user_roles) ? "checked" : ''}} type="checkbox" name="type[]"  class="i-checks">
            @endforeach

            @error('type')
            <span class="help-block m-b-none text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>


    <div class="form-group">
        <label for="image">Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input onchange="previewImage(this);" accept="image/*" type="file" name="image"
                       class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>

        @error('image')
        <span class="help-block m-b-none text-danger">{{ $message }}</span>
        @enderror
    </div>

    @if(isset($user))
        <img class="mb-3" id="old_img" src="{{ @$user->image->url }}" width="100px" height="100px" >
    @endif
    <img id="preview_image" class="mb-3 display_none" width="100px" height="100px">
    <br>
    <br>


