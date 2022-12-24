@extends('layouts.app')
@section('title', 'A Top-Tier Software Development Company in the world | '.config('app.name'))
@section('meta_keywords','software company in bangladesh, web design and development company, best web development company in bangladesh, top web development company in bangladesh,best ecommerce website development company in bangladesh')
@section('meta_description', 'A top-tier web design, and development company in the world, choice for outsourcing and BPO. DevXHub informatics is one of the best outsourcing companies too having a full-service of software engineers, designers, and developers. Web, Mobile, UI/UX, Graphics design, and custom software solutions etc.')

@push('style')
    <style>

    </style>
@endpush

@section('content')
    <div class="layout-content transparent-header">


        <div class="business-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="customFadeInUp">
                            <div class="changing-phrase-container">
                                Buy, sell, and share
                                <span class="changing-phrase" data-phrases="data, datasets, spreadsheets, databases" style="opacity: 0;">databases</span>
                            </div>
                        </h2>
                        <p class="customFadeInUp">
                            Data is the world's most valuable resource.
                            <br>
                            Now you can trade data on our<br>revolutionary marketplace.
                        </p>

                        <div class="actions customFadeInUp">
                            <a href="/data-market/categories" class="btn-pill btn-pill-primary btn-pill-lg">View Datasets</a>
                        </div>
                        <div style="max-width: 500px">
                            <img class="img-fluid mt-5" src="{{ asset("frontend/assets/image/home/as-seen-on.png") }}">
                        </div>
                    </div>
                    <div class="col-md-5 pt-5 mt-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="agency-intro how-it-works">
            <div class="container">
                <h1 class="text-center">The Best Place to Buy and Sell Datasets</h1>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 item">
                        <div class="img-container">
                            <img src="{{ asset("frontend/assets/image/home/buy_data.png") }}" alt="Your data set is listed">
                        </div>
                        <h3>Shop and Buy Datasets</h3>
                        <p>
                            Your dataset is then listed on the Data &amp; Sons market. Buyers can easily find your dataset and buy it in one click.
                        </p>
                        <div class="text-center action-wrapper">
                            <a href="/buy-datasets" class="btn-pill btn-pill-primary btn-pill-lg">Buy Datasets</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 item">
                        <div class="img-container">
                            <img src="{{ asset("frontend/assets/image/home/sell_data.png") }}" alt="Sell your data">
                        </div>
                        <h3>Sell Datasets</h3>
                        <p>
                            Once your dataset sells, we transfer your money to you instantly. Best of all, you can sell your dataset multiple times to any interested buyer.
                        </p>
                        <div class="text-center action-wrapper">
                            <a href="/sell-datasets" class="btn-pill btn-pill-primary btn-pill-lg">Sell Datasets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-about-us">
            <div class="business-hero text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="customFadeInUp text-left">
                                The World’s First Open Dataset Marketplace
                            </h2>
                            <p class="customFadeInUp text-left" style="font-size: 26px">
                                We’re democratizing the exchange of data by enabling everyone to buy, sell, and share data.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="vimeo-embed-container">
                                <iframe src="https://player.vimeo.com/video/283748219?byline=0&amp;portrait=0" width="500" height="500" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="featured-datasets agency-intro mt-3">
            <div class="container">
                <h3>Featured Datasets</h3>
                <hr>
            </div>
            <div class="index-slider-header">
                <div id="spacial-slider" class="slider-component fxSideSwing">
                    <ul class="itemwrap">
                        <li class="slide slide--center current">
                            <div class="container">
                                <h2>
                                    Mailing List of All Public Companies                                </h2>
                                <p>
                                    Mailing address of every public company in the U.S....                                </p>
                                <a href="/data-market/lead-generation/mailing-list-of-all-public-companies" class="btn-pill btn-pill-primary">
                                    <i class="fa fa-shopping-cart"></i> Purchase
                                </a>
                            </div>

                            <div class="pic" style="background-image: url('https://s3-external-1.amazonaws.com/data-and-sons-assets/uploads/datasets/59-1494435106.jpg');">
                            </div>
                        </li>
                        <li class="slide slide--center ">
                            <div class="container">
                                <h2>
                                    Whiskeys of the World                                </h2>
                                <p>
                                    Comprehensive list of every whiskey produced in the world. Great data for populating whiskey related databases or conducting market research in the distilling industry....                                </p>
                                <a href="/data-market/product-lists/whiskeys-of-the-world" class="btn-pill btn-pill-primary">
                                    <i class="fa fa-shopping-cart"></i> Purchase
                                </a>
                            </div>

                            <div class="pic" style="background-image: url('https://s3-external-1.amazonaws.com/data-and-sons-assets/uploads/datasets/74-1498162396.png');">
                            </div>
                        </li>
                        <li class="slide slide--center ">
                            <div class="container">
                                <h2>
                                    Accountant, New York (NY)                                </h2>
                                <p>

                                    Looking for a list of Accountant in New York (NY)? All contacts verified as of 01/04/19. Dataset containing contact information of over 700+&nbsp; New York (NY), Accountant. Firm name, website, phone, email, address, FB Page, LinkedIn, Instagram Page etc provided. The type of Accountant primarily ...                                </p>
                                <a href="/data-market/accountants-and-financial-professionals/accountant-new-york-ny" class="btn-pill btn-pill-primary">
                                    <i class="fa fa-shopping-cart"></i> Purchase
                                </a>
                            </div>

                            <div class="pic" style="background-image: url('https://s3-external-1.amazonaws.com/data-and-sons-assets/uploads/featured/HoqEPgPG-1579419310291.jpg');">
                            </div>
                        </li>
                        <li class="slide slide--center ">
                            <div class="container">
                                <h2>
                                    Datasets on Communal Perspectives of Violence and Safety                                </h2>
                                <p>
                                    This dataset illustrates civilian perspectives of security, safety, trust and reliance on state versus non-state security actors in hotspot and fragile areas within Kenya. This dataset covers four counties (Mombasa, Lamu, Wajir, and Garissa), and is a vast data that captures underlying issues such a...                                </p>
                                <a href="/data-market/social-sciences/datasets-on-communal-perspectives-of-violence-and-safety" class="btn-pill btn-pill-primary">
                                    <i class="fa fa-shopping-cart"></i> Purchase
                                </a>
                            </div>

                            <div class="pic" style="background-image: url('https://s3-external-1.amazonaws.com/data-and-sons-assets/uploads/featured/JZ5DoCwv-1656085686870.jpg');">
                            </div>
                        </li>
                    </ul>
                    <nav>
                        <a class="prev" href="#">
                            <span class="icon-wrap"></span>
                        </a>
                        <a class="next" href="#">
                            <span class="icon-wrap"></span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="agency-intro section-pledge">
            <div class="container">
                <h3>PERSONAL PRIVACY POLICY</h3>
                <hr>
                <p>
                    At Data &amp; Sons believe all people are entitled to their privacy and respect individual rights to protect personal information. We pledge not to allow the sale of personal information on our data marketplace. We safeguard personal privacy by reviewing all data before it is listed for sale on Data &amp; Sons.
                </p>
                <p class="mt-3">
                    <a href="/privacy-policy" class="btn-pill btn-pill-lg btn-pill-primary">Policy</a>
                </p>
            </div>
        </div>

        <div class="page-blogs index-blog-section">
            <div class="blog-posts-list">
                <div class="blog-cols-header agency-intro pt-5">
                    <div class="container">
                        <h3>
                            RECENT BLOG &amp; NEWS
                        </h3>
                        <hr>
                    </div>
                </div>
                <div class="blog-cols-wrapper">
                    <div class="container">
                        <a href="blog/Hacking-the-Startup-PR-Process" class="post">
                            <div class="post-wrapper">
                                <div class="post-bg" style="background-image: url('https://s3-external-1.amazonaws.com/data-and-sons-assets/uploads/blog/16/acKmsG7l-1560368551474.jpg');">
                                </div>
                                <div class="post-intro">
                                    <div class="post-title" title="Hacking the Startup PR Process">
                                        Hacking the Startup PR Process                                </div>
                                    <div class="post-author">
                                        By <span>Sean Lux</span><br>
                                        Jun 12, 2019                                </div>
                                    <p class="post-description">
                                        With an email list of media professionals, you can place content about your business on their Facebook and Linkedin news feeds.                                </p>
                                </div>
                            </div>
                        </a>
                        <a href="blog/Build Facebook Custom Audience from an Email List" class="post">
                            <div class="post-wrapper">
                                <div class="post-bg" style="background-image: url('https://s3-external-1.amazonaws.com/data-and-sons-assets/uploads/blog/15/96nmf0sz-1548891289969.png');">
                                </div>
                                <div class="post-intro">
                                    <div class="post-title" title="How to Create a Facebook Custom Audience from an Email List">
                                        How to Create a Facebook Custom Audience from an Email List                                </div>
                                    <div class="post-author">
                                        By <span>Sean Lux</span><br>
                                        Jan 30, 2019                                </div>
                                    <p class="post-description">
                                        Advertising on Facebook is one of the most effective ways to find new customers and maintain existing ones. A Custom Audience is essential for any successful Facebook advertising campaign. A Custom Audience is a group of people that will see your ads in their
                                        Facebook News Feed. An email list is perhaps one of the easiest and most effective ways to build a Custom Audience. This blog post details how build a Facebook Custom Audience from an email list step by step.                                </p>
                                </div>
                            </div>
                        </a>
                        <a href="news/Google-Launches-Dataset-Search" class="post">
                            <div class="post-wrapper">
                                <div class="post-bg" style="background-image: url('https://s3-external-1.amazonaws.com/data-and-sons-assets/uploads/blog/14/wrN4PE2x-1536183295598.png');">
                                </div>
                                <div class="post-intro">
                                    <div class="post-title" title="Google Launches Dataset Search">
                                        Google Launches Dataset Search                                </div>
                                    <div class="post-author">
                                        By <span>Sean Lux</span><br>
                                        Sep 5, 2018                                </div>
                                    <p class="post-description">
                                        Google released Dataset Search today.                                </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>

    </script>
@endpush
