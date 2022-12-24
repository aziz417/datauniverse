<div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input id="title" type="text" value="{{ isset($career) ? $career->title : old('title')}}"
           name="title" class="form-control" autofocus>

    @error('title')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="vacancy" class="control-label">Vacancy</label>
    <input id="vacancy" type="number" value="{{ isset($career) ? @$career->vacancy : old('vacancy')}}"
           name="vacancy" class="form-control" autofocus>

    @error('vacancy')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="control-label">Description</label>
    <textarea class="form-control TextEditor" name="desc" id="desc">
        {{ isset($career->desc) && $career->desc ? $career->desc : old('desc')}}
    </textarea>
    @error('desc')
    <span class="help-block m-b-none text-danger">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group mb-0">
    <label class="mb-0">
        <input name="status"
               {{ isset($career) && $career->status ? 'checked':old('status')}} type="checkbox"
               class="i-checks">
        Publication Status
    </label>
</div>

@push('script')
    <script src="{{ asset('backend/js/plugins/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.settingTextEditor').summernote();
        });
    </script>
@endpush

