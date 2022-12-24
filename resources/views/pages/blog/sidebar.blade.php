<style>
    .categoryList{
        font-size: 20px;
    }
</style>

<div class="sidebar">
    <div id="categories" class="widget widget_categories">
        <h3>
            Categories
        </h3>
        <ul>
            @foreach(@$post->categories as $category)
{{--                <div class="dropdown-menu" role="menu">--}}
{{--                    <a class="dropdown-item" href="welcome/buy_data">Email Marketing</a>--}}
{{--                    <a class="dropdown-item" href="welcome/b2b">B2B</a>--}}
{{--                </div>--}}
                <div class="" role="menu">
                    <a class="categoryList" href="{{ route('category.blogs', @$category->slug) }}">{{ ucfirst(@$category->name) }}</a>
                </div>

            @endforeach
        </ul>
    </div>
{{--    <aside id="tags" class="widget widget_tag">--}}
{{--        <h3 class="widget-title">--}}
{{--            @if(@$siteTitles->b_title_3)--}}
{{--                {!! @$siteTitles->b_title_3 !!}--}}
{{--            @else--}}
{{--                Popular Tags--}}
{{--            @endif--}}
{{--        </h3>--}}
{{--        <div class="tagcloud">--}}
{{--            @foreach(@$post->tags as $tag)--}}
{{--                <a href="{{ route('tag.blogs', @$tag->slug) }}">{{ ucfirst(@$tag->name) }}</a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </aside>--}}
</div>
