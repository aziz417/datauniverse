@extends('layouts.app')

@section('title', 'Portfolio page of '.config('app.name'))
@section('meta_keywords', 'Portfolio, gallery, photo, working prove')
@section('meta_description', 'A portfolio is a collection of financial investments like stocks, bonds, commodities')

@section('content')

    @php($data_placeholder_bg = "linear-gradient(100deg,#fa7070,#fa9770)")

    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <h1 class="page-title">Our Portfolios</h1>
                <ul class="bradcurmed">
                    <li><a href="{{ route('home') }}" rel="noopener noreferrer">Home</a></li>
                    <li>Our Portfolios</li>
                </ul>
            </div>
        </div>
        <svg
            class="circle"
            data-parallax='{"x" : -200}'
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            width="950px"
            height="950px"
        >
            <path
                fill-rule="evenodd"
                stroke="rgb(250, 112, 112)"
                stroke-width="100px"
                stroke-linecap="butt"
                stroke-linejoin="miter"
                opacity="0.051"
                fill="none"
                d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z"
            />
        </svg>
        <ul class="animate-ball">
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </ul>
    </section>
    <section class="portfolios-three">
        <div class="container">
            <div class="portfolio-inner">
                <ul class="pixsass-isotope-filter">
                    <li class="current"><a href="#" data-filter="*" id="all-work">All Works</a></li>
                    <li><a href="#" data-filter=".uiux">UI/UX & Graphics Design</a></li>
                    <li><a href="#" data-filter=".webapp">Web Application</a></li>
                    <li><a href="#" data-filter=".mobileapp">Mobile Application</a></li>
                    <li><a href="#" data-filter=".devops">DevOps</a></li>
                    <li><a href="#" data-filter=".amination">3D Animation</a></li>
                </ul>
                <div class="pixsass-isotope wow fadeIn" data-wow-delay="0.3s">
                    <div class="pixsass-portfolio-items portfolio-three column-3 port-gutters">
                        <div class="grid-sizer"></div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad"
                                     data-src="{{ asset('frontend/media/portfolio/UniversityOfMaat.png') }}"
                                     alt="University of Maat thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>School management system</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://universityofmaat.org/">University of Maat</a>
                                    </h3>
                                    <p class="meta">April 10, 2019</p>
                                </div>
                            </div>
                        </div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad" data-src="{{ asset('frontend/media/portfolio/PoloStore.png') }}"
                                     alt="Polo Store thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>Ecommerce System</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://polo-store.devxhub.com/">Polo Store</a>
                                    </h3>

                                </div>
                            </div>
                        </div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad" data-src="{{ asset('frontend/media/portfolio/LiveCX.png') }}"
                                     alt="LiveCX thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>Social System</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://livecx.com/">LiveCX</a>
                                    </h3>

                                </div>
                            </div>
                        </div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad" data-src="{{ asset('frontend/media/portfolio/L9ve.png') }}"
                                     alt="L9vebaked thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>Ecommerce System</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://l9vebaked.com/delivery">L9vebaked</a>
                                    </h3>

                                </div>
                            </div>
                        </div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad" data-src="{{ asset('frontend/media/portfolio/supply.png') }}"
                                     alt="Supply thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>Ecommerce System</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://supply.mv">Supply</a>
                                    </h3>

                                </div>
                            </div>
                        </div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad" data-src="{{ asset('frontend/media/portfolio/Your_Master.png') }}"
                                     alt="Your Master thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>Company Website</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://yourmaster.co.uk">Your Master</a>
                                    </h3>

                                </div>
                            </div>
                        </div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad" data-src="{{ asset('frontend/media/portfolio/fiverr.png') }}"
                                     alt="Fiverr Outsourcing Institute thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>Company Website</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://fiverroutsourcinginstitute.com/">Fiverr Outsourcing
                                            Institute</a>
                                    </h3>

                                </div>
                            </div>
                        </div>

                        <div class="pixsass-portfolio-item width-large grid-item shadow webapp">
                            <div class="pixsass-isotope-grid__img">
                                <img class="lozad"
                                     data-src="{{ asset('frontend/media/portfolio/Trucker_Hangout.png') }}"
                                     alt="Trucker Hangout thumb"
                                     data-placeholder-background="{{ $data_placeholder_bg }}"/>
                                <div class="portfolio-info">
                                    <span>Social Networking Platform</span>
                                    <h3 class="portfolio-title">
                                        <a href="https://truckerhangout.com">Trucker Hangout</a>
                                    </h3>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="button-container mt-40 text-center">
                <a href="#" class="pix-btn btn-outline plus-icon"
                >Load More <i class="ei ei-plus"></i></a>
            </div>
        </div>
    </section>

@endsection
