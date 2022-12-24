<div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input id="title" type="text" value="{{ isset($post) ? $post->title : old('title')}}"
           name="title" class="form-control" autofocus required>

    @error('title')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>


<div class="form-group">
    <label for="categories_id" class="control-label">Select Categories</label>
    <select data-placeholder="Categories" style="width: 100%;" id="categories_id" name="categories[]"
            class="categorySelect2"
            multiple="multiple" required autofocus>
        @foreach($categories as $category)
            @if(isset($post))
                <option
                    {{ isset($post) ? in_array($category->id, $existingCategoriesId) ? 'selected' : '' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
            @else
                <option
                    {{ (collect(old('categories'))->contains($category->id)) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
        @endforeach
    </select>

    @error('categories')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="tags_id" class="control-label">Select Tags</label>
    <select data-placeholder="Tags" style="width: 100%;" id="tags_id" name="tags[]" class="tagSelect2" multiple="multiple"
            required autofocus>
        @foreach($tags as $tag)
            @if(isset($post))
                <option
                    {{ isset($post) ? in_array($tag->id, $existingTagsId) ? 'selected' : '' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
            @else
                <option
                    {{ (collect(old('tags'))->contains($tag->id)) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endif
        @endforeach
    </select>

    @error('tags')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label id="short_description" class="control-label">Short Description (less then 500 characters)</label>
    <textarea class="form-control short_descriptions TextEditor" name="short_description" id="short_description">
            {{ isset($post->short_description) && $post->short_description ? $post->short_description : old('short_description')}}
        </textarea>
    <p class="m-0 text-right" id="maxContentPost">500</p>
    @error('short_description')
    <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label id="description" class="control-label">Description</label>
    <textarea class="form-control TextEditor" name="description" id="description" autofocus required>
            {{ isset($post->description) && $post->description ? $post->description : old('description')}}
        </textarea>
    @error('description')
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


@if(isset($post))
    <img class="mb-3" id="old_img" src="{{ $post->image->url }}" width="100px" height="100px" >
@endif
    <img id="preview_image" class="mb-3 display_none" width="100px" height="100px">

<div class="form-group">
    <label for="file">File</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="data_file" class="custom-file-input" id="file">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>
    @error('data_file')
    <span class="help-block m-b-none text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="row">
    <div class="col-sm-2">
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="status"
                       {{ isset($post) && $post->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group mb-0">
            <label class="mb-0">
                <input name="featured"
                       {{ isset($post) && $post->featured ? 'checked':old('featured')}} type="checkbox"
                       class="i-checks">
                Featured Post
            </label>
        </div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function () {
            var $eventSelectOfCategory = $(".categorySelect2");
            $eventSelectOfCategory.select2()

            var $eventSelectOfTag = $(".tagSelect2");
            $eventSelectOfTag.select2()
        });
    </script>
@endpush


