<div class="portfolio-item row">
    @php
        $count = 0;
    @endphp
    @foreach($items as $key => $item)
        @foreach($item['images'] as $key => $image)
            @php
                $count++
            @endphp
            <div class="col-lg-2 col-md-3 col-6 col-sm-6 custom_padding">
                <div class="custom_animation border d-flex align-items-center per_item custom_margin">
                    <div class="align-self-center m-auto">
                        <div
                                class="fancylight popup-btn animation_in" data-fancybox-group="light">
                            <img width="80" loading="lazy" class="img-fluid" src="{{ $image }}"
                                 alt="fancylight">
                        </div>
                    </div>
                </div>
            </div>
                @if($type !== 'all' && $count >= $itemCount)
                    <div class="col-md-12 text-right justify-content-end display_all_show">
                        <div class="text-right">
                            <a onclick="getItems( 'all' )" class="slide_down about_text-theme text-underline" href="javascript:void(0)">see more</a>
                        </div>
                    </div>
                    @break
                @endif

        @endforeach

            @if($type !== 'all' && $count >= $itemCount)
                @break
            @endif
    @endforeach
    @if($count > 18)
        <div class="col-md-12 text-right justify-content-end">
            <div class="text-right">
                <a onclick="getItems( 'limit-all' )" class="slide_up about_text-theme text-underline" href="javascript:void(0)">less more</a>
            </div>
        </div>
    @endif
</div>
