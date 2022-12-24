@extends('layouts.app')

@section('title', 'Contact Us page of '.config('app.name'))
@section('meta_keywords', 'contact, about, contact us, about us')
@section('meta_description', 'contact us page of '.config('app.name'))
@section('content')

    <section class="page-banner-contact contact_page_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-title-wrapper">
                        <div class="page-title-inner">
                            <h1 class="page-title text-center contact_page_margin_top_none">
                                @if(@$siteTitles->contact_title_1)
                                    {!! @$siteTitles->contact_title_1 !!}
                                @else
                                    Get in touch with <span class="about_text-theme">Us</span>
                                @endif
                            </h1>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="animate-element-contact">
{{--                        <img--}}
{{--                            loading="lazy"--}}
{{--                            src="{{ asset('frontend/media/animated/001.png') }}"--}}
{{--                            alt="Get in touch with Us"--}}
{{--                            class="wow pixFadeDown"--}}
{{--                            data-wow-duration="1s"--}}
{{--                        />--}}
{{--                        <img--}}
{{--                            loading="lazy"--}}
{{--                            src="{{ asset('frontend/media/animated/002.png') }}"--}}
{{--                            alt="contact-table"--}}
{{--                            class="wow pixFadeUp"--}}
{{--                            data-wow-duration="2s"--}}
{{--                        />--}}
{{--                        <img--}}
{{--                            loading="lazy"--}}
{{--                            src="{{ asset('frontend/media/animated/003.png') }}"--}}
{{--                            alt="contact-man"--}}
{{--                            class="wow pixFadeLeft"--}}
{{--                            data-wow-delay="0.3s"--}}
{{--                            data-wow-duration="2s"--}}
{{--                        />--}}
{{--                        <img--}}
{{--                            loading="lazy"--}}
{{--                            src="{{ asset('frontend/media/animated/004.png') }}"--}}
{{--                            alt="table-laptop"--}}
{{--                            class="wow pixFadeUp"--}}
{{--                            data-wow-duration="2s"--}}
{{--                        />--}}

                        <img
                                loading="lazy"
                                src="{{ asset('frontend/assets/img/DevXhub-Contact-Us.png') }}"
                                alt="table-laptop"
                                class="contact_page_image"
                        />
                    </div>
                </div>
            </div>
        </div>
        <svg
            class="circle"
            data-parallax='{"y" : 250}'
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

    <section class="contactus pb-5 contact_page_full_display" id="form">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-infos">
                        <div class="contact-info">
                            <h3 class="title">Our Location</h3>
                            <p class="description">
                                {{ @$globalContactInfo->address }}.
                            </p>
                        </div>
                        <div class="contact-info">
                            <div class="info mb-3">
                                <a href="mailto:{{ @$globalContactInfo->email }}">
                                    <i class="ei ei-icon_mail_alt"></i>
                                    <span>{{ @$globalContactInfo->email }}</span>
                                </a>
                            </div>
                            <div class="info mb-3">
                                <a href="mailto:support@devxhub.com">
                                    <i class="ei ei-icon_mail_alt"></i>
                                    <span>support@devxhub.com</span>
                                </a>
                            </div>
                            <div class="info mb-3">
                                <a href="mailto:sales@devxhub.com">
                                    <i class="ei ei-icon_mail_alt"></i>
                                    <span>sales@devxhub.com</span>
                                </a>
                            </div>
                            <div class="info phone">
                                <a href="tel:{{ @$globalContactInfo->phone_1 }}">
                                    <i class="ei ei-icon_phone"></i>
                                    <span>{{ @$globalContactInfo->phone_1 }}</span>
                                </a>
                            </div>
                            <div class="info phone">
                                <a href="https://api.whatsapp.com/send?phone=8801745969697">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>{{ @$globalContactInfo->phone_1 }}</span>
                                </a>
                            </div>
                            <div class="info phone">
                                <a href="skype:hadisur_rahman?chat">
                                    <i class="fab fa-skype"></i>
                                    <span>Skype</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-froms">
                        <form
                            action="{{ route('contact.message.store') }}" method="post"
                            class="contact-form"
                        >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="Name"
                                        required
                                    />
                                </div>
                                <div class="col-md-6">
                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="Email"
                                        required
                                    />
                                </div>
                            </div>
                            <input type="text" name="subject" placeholder="Subject"/>
                            <textarea
                                name="message"
                                placeholder="Your Comment"
                                required
                            ></textarea>
                            <div class="text-lg-left text-center">
                                <button type="submit" class="pix-btn submit-btn">
                                    <span class="btn-text">Send Your Massage</span>
                                    <i class="fas fa-spinner fa-spin"></i>
                                </button>
                            </div>
                            <div class="row">
                                <div class="form-result alert">
                                    <div class="content"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contactus pb-5 contact_page_mobile_display" id="form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-froms">
                        <form
                                action="{{ route('contact.message.store') }}" method="post"
                                class="contact-form"
                        >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input
                                            type="text"
                                            name="name"
                                            placeholder="Name"
                                            required
                                    />
                                </div>
                                <div class="col-md-6">
                                    <input
                                            type="email"
                                            name="email"
                                            placeholder="Email"
                                            required
                                    />
                                </div>
                            </div>
                            <input type="text" name="subject" placeholder="Subject"/>
                            <textarea
                                    name="message"
                                    placeholder="Your Comment"
                                    required
                            ></textarea>
                            <div class="text-lg-left text-center">
                                <button type="submit" class="pix-btn submit-btn">
                                    <span class="btn-text">Send Your Massage</span>
                                    <i class="fas fa-spinner fa-spin"></i>
                                </button>
                            </div>
                            <div class="row">
                                <div class="form-result alert">
                                    <div class="content"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-infos mt-5">
                        <div class="contact-info text-center">
                            <div class="info mb-3">
                                <a href="mailto:{{ @$globalContactInfo->email }}">
                                    <i class="ei ei-icon_mail_alt"></i>
                                    <span>{{ @$globalContactInfo->email }}</span>
                                </a>
                            </div>
                            <div class="info mb-3">
                                <a href="mailto:support@devxhub.com">
                                    <i class="ei ei-icon_mail_alt"></i>
                                    <span>support@devxhub.com</span>
                                </a>
                            </div>
                            <div class="info mb-3">
                                <a href="mailto:sales@devxhub.com">
                                    <i class="ei ei-icon_mail_alt"></i>
                                    <span>sales@devxhub.com</span>
                                </a>
                            </div>
                            <div class="info phone">
                                <a href="tel:{{ @$globalContactInfo->phone_1 }}">
                                    <i class="ei ei-icon_phone"></i>
                                    <span>{{ @$globalContactInfo->phone_1 }}</span>
                                </a>
                            </div>
                            <div class="info phone">
                                <a href="https://api.whatsapp.com/send?phone=8801745969697">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>{{ @$globalContactInfo->phone_1 }}</span>
                                </a>
                            </div>
                            <div class="info phone">
                                <a href="skype:hadisur_rahman?chat">
                                    <i class="fab fa-skype"></i>
                                    <span>Skype</span>
                                </a>
                            </div>
                        </div>
{{--                        <div class="contact-info">--}}
{{--                            <h3 class="title">Our Location</h3>--}}
{{--                            <p class="description">--}}
{{--                                {{ @$globalContactInfo->address }}.--}}
{{--                            </p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Subscribtion   --}}
    <section class="subscribe_section_custom_py pt-0" id="newsletter">
        <div class="container">
            <div class="newsletter-content-two text-center wow pixFadeUp">
                <h2 class="title subscribe_custom_color">
                    Subscribe for our Newsletter
                </h2>
            </div>
            <form
                    action="{{ route('user.subscribe') }}"
                    method="post"
                    class="newsletter-form-two wow pixFadeUp"
            >
                @csrf
                <div class="newsletter-inner text-center">
                    <input
                            type="email"
                            name="email"
                            class="form-control text-center"
                            id="newsletter-form-email"
                            placeholder="Enter your email address"
                            required
                    />
                    <button
                            type="submit"
                            name="submit"
                            id="newsletter-submit"
                            class="newsletter-submit"
                    >
                        <span class="btn-text">Subscribe</span>
                        <i class="fas fa-spinner fa-spin"></i>
                    </button>
                </div>
                <div class="clearfix"></div>
                <div class="form-result alert"><div class="content"></div></div>
                @error('email')
                <span class="help-block m-b-none text-warning">
                            {{ $message }}
                         </span>
                @enderror
            </form>
        </div>
<!--        <div class="scroll-circle wow pixFadeUp">
            <img
                    loading="lazy"
                    src=" {{ asset('frontend/media/background/circle12.png') }}"
                    data-parallax='{"y" : -230}'
                    alt="circle6"
            />
        </div>-->
    </section>
    <h2 class="title subscribe_custom_color text-center py-4 our_location_title_full_display_hide">
        <strong>Our Location On Map</strong>
    </h2>
    <section id="google-maps">
        <div class="google-map">
            <div
                class="gmap3-area"
                data-lat="23.780160"
                data-lng="90.396245"
                data-mrkr="{{ asset('frontend/assets/img/map-marker.png') }}"
            ></div>
        </div>
    </section>

@endsection

@push('script')


@endpush
