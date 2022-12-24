
    <div class="form-group">
        <label for="title_1" class="control-label">Title 1<span class="required-star"> *</span></label>
        <input id="title_1" type="text" value="{{ isset($ourMission) ? $ourMission->title_1 : old('title_1')}}"
               name="title_1" class="form-control" autofocus>

        @error('title_1')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label id="description_1" class="control-label">Description 1</label>
        <textarea class="form-control TextEditor" name="description_1"  id="description_1">
            {{ isset($ourMission->description_1) && $ourMission->description_1 ? $ourMission->description_1 : old('description_1')}}
        </textarea>
        @error('description_1')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="title_2" class="control-label">Title 2<span class="required-star"> *</span></label>
        <input id="title_2" type="text" value="{{ isset($ourMission) ? $ourMission->title_2 : old('title_2')}}"
               name="title_2" class="form-control" autofocus>

        @error('title_2')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>


    <div class="form-group">
        <label id="description_2" class="control-label">Description 2</label>
        <textarea class="form-control TextEditor" name="description_2"  id="description_2">
            {{ isset($ourMission->description_2) && $ourMission->description_2 ? $ourMission->description_2 : old('description_2')}}
        </textarea>
        @error('description_2')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div>
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="status"
                       {{ isset($ourMission) && $ourMission->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>


