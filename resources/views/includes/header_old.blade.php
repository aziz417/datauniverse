<header class="site-header header_trans-fixed" data-top="992">
    <div class="container">
        <div class="header-inner">
            <div class="toggle-menu">
                <span class="bar"></span> <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <div class="site-mobile-logo">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ @$globalSettingInfo->image->url }}" alt="site logo" class="main-logo"/>
                    <img src="{{ @$globalSettingInfo->image->url }}" alt="site logo" class="sticky-logo"/>
                </a>
            </div>
            <nav class="site-nav">
                <div class="close-menu">
                    <span>Close</span> <i class="ei ei-icon_close"></i>
                </div>
                <div class="site-logo">
                    <a href="{{ route('home') }}" class="logo"
                    ><img src="{{ @$globalSettingInfo->image->url }}" alt="site logo" class="main-logo"/>
                        <img src="{{ @$globalSettingInfo->image->url }}" alt="site logo" class="sticky-logo"/>
                    </a>
                </div>

                <!-- Static navbar -->
                <nav class="navbar navbar-expand-md navbar-light bg-transparent btco-hover-menu yamm">
                    <div class="mb-2 pb-1 collapse navbar-collapse show" id="navbarNavDropdown">
                        <ul class="navbar-nav text-left" style="padding: 15px 15px">
                            <li class="nav-item">
                                <a class="{{ getActiveClassByUrl('/') }} nav-link text-light pb-0"
                                   href="{{ route('home') }}">
                                    <span class="menu-link"> Home</span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="{{ getActiveClassByUrl('about-us') }} {{ getActiveClassByUrl('blogs') }} {{ getActiveClassByUrl('career') }} nav-link dropdown-toggle text-light pb-0"
                                   href="{{ route('home') }}" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="menu-link"> Company</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('about') }}">
                                            <span class="menu-link">About Us</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('career') }}">
                                            <span class="menu-link">Career</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('blog.index') }}">
                                            <span class="menu-link">Blog</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('faqs') }}">
                                            <span class="menu-link">Service Provider FAQs</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class=" nav-link dropdown-toggle text-light pb-0" href="{{ route('service') }}"
                                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="menu-link"> Services</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach(@$ourServices as $service)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('under.construction', @$service->slug ) }}">
                                                <span class="menu-link">{{ @$service->title }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="{{ getActiveClassByUrl('how-we-work') }} nav-link text-light pb-0"
                                   href="{{ route('how.we.work') }}">
                                    <div class="sign">
                                        <span class="fast-flicker">H</span>ow<span class="flicker">We</span>Wor<span
                                                class="fast-flicker">k</span>
                                    </div>
                                    How We Work
                                </a>
                            </li>
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="{{ getActiveClassByUrl('portfolio') }} nav-link text-light pb-0"--}}
                            {{--                                   href="{{ route('portfolio') }}">--}}
                            {{--                                    Portfolio--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                            <li class="nav-item">
                                <a class="{{ getActiveClassByUrl('contact-us') }} nav-link text-light pb-0"
                                   href="{{ route('contact') }}">
                                    <div class="sign">
                                        <span class="fast-flicker">C</span>on<span class="flicker">t</span>ac<span
                                            class="fast-flicker">t</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </nav>
        </div>
    </div>
</header>

@push('script')
    <script src="{{ asset('frontend/dependencies/navbar/bootstrap-4-hover-navbar.js') }}"></script>
    <script>
        $(".menu-link").click(function (e) {
            e.preventDefault();
            e.stopPropagation();

            location.href = $(this).parent('a').attr('href');
        });
    </script>
@endpush
