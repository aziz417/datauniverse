@extends('layouts.app')

@section('title', 'Privacy & Policy '.config('app.name'))
@section('meta_keywords', 'Privacy & Policy')
@section('meta_description', 'A Privacy Policy is a statement or a
legal document that states how a company or
website collects,
 handles and processes data of its
  customers and visitors')

@push('style')
    <style>
        h5 {
            color: #fa7070 !important;
        }
    </style>
@endpush

@section('content')

    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <h1 class="page-title">Privacy & Policy</h1>
                <ul class="bradcurmed">
                    <li>Developer eXperience Hub</li>
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

    <section class="about">
        <div id="page-content-wrap">
            <div class="container">
                <div class="content">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12">
                            <h5 class="mt-2 text-theme h5">Collected of Customer Information</h5>
                            <p>When you start up for the service with DevXHub, we collect personal information from you including your name, phone / mobile number, e-mail address, billing address etc. We may also collect the URL from which you linked into our site, your IP address, and your browser type and version, all of which are collected in an anonymous manner without being linked to any of your personal information.</p>
                            <h5 class="mt-5 text-theme h5">Use of Customer Information</h5>
                            <p>Customer privacy is something we take very seriously at DevXHub. We do not sell or disseminate (except in cases where required to by law enforcement agencies) the personal information of our customers to any parties outside of DevXHub or its subsidiary companies, for any purpose other than communicating messages provided by DevXHub. We use customer information for the purposes of creating and maintaining individual customer accounts, contacting customers in case of problems with their account(s), sending personal information, for statistical purposes, to administer our systems, to conduct surveys, to administer drawings or contests, to provide product and marketing updates, and to provide technical support.</p>
                            <p>DevXHub may engage with companies or agencies that may come in contact with some customer data only in cases where that access is required to support DevXHub’s own goals and initiatives. Some optional partner offers and services may require customer information to be provided to third parties as a necessary part of establishing service with them. Please note that the contact information that you provide to us is used to register your domain name and is, by the very nature of the domain registration system, available for public viewing in many places on the Internet via the use of the ‘whois’ tool.</p>
                            <h5 class="mt-5 text-theme h5">Whois Privacy Services</h5>
                            <p>Whois Privacy as offered by DevXHub does not act as a shield from legal liability in conjunction with Domain Registration. In order to preserve neutrality in disputes between 3rd parties and domain registrants, DevXHub will act in accordance with ICANN Registrar Accreditation agreement section 3.7.7.3 upon receipt of actionable evidence of illegal activity. This means that identifying information will be provided to law enforcement and officials of the court including attorneys as situations require in order preserving DevXHub’s neutrality in any litigation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
