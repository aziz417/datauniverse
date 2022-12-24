const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


// Start =>  frontend sections

mix.scripts(
    [
        "resources/theme/frontend/jquery/jquery.min.js",
        "resources/theme/frontend/bootstrap/js/bootstrap.min.js",
        "resources/theme/frontend/swiper/js/swiper.min.js",
        "resources/theme/frontend/jquery.appear/jquery.appear.js",
        "resources/theme/frontend/wow/js/wow.min.js",
        "resources/theme/frontend/countUp.js/countUp.min.js",
        "resources/theme/frontend/isotope-layout/isotope.pkgd.min.js",
        "resources/theme/frontend/imagesloaded/imagesloaded.pkgd.min.js",
        "resources/theme/frontend/jquery.parallax-scroll/js/jquery.parallax-scroll.js",
        "resources/theme/frontend/magnific-popup/js/jquery.magnific-popup.min.js",
        "resources/theme/frontend/gmap3/js/gmap3.min.js",

        "resources/theme/frontend/assets/js/header.js",
        "resources/theme/frontend/assets/js/circletype.min.js",
        "resources/theme/frontend/assets/js/app.js",

        "resources/theme/frontend/sweetalert2/sweetalert2.min.js",
        "resources/theme/frontend/toastr/toastr.min.js",


        "resources/theme/frontend/assets/js/custom.js",
    ],
    "public/frontend/js/application.js"
);


// here you can import bootstrap related css
mix.styles(
    [
        "resources/theme/frontend/bootstrap/css/bootstrap.min.css",
    ],
    "public/frontend/css/app.css"
);

mix.styles(
    [
        "resources/theme/frontend/swiper/css/swiper.min.css",
        "resources/theme/frontend/wow/css/animate.css",
        "resources/theme/frontend/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css",
        "resources/theme/frontend/toastr/toastr.min.css",
        "resources/theme/frontend/magnific-popup/css/magnific-popup.css",
        "resources/theme/frontend/app.css",
        "resources/theme/frontend/custom.css",
        "resources/theme/frontend/navbar/bootstrap-4-hover-navbar.css"
    ],
    "public/frontend/css/application.css"
);

// End =>  frontend sections
