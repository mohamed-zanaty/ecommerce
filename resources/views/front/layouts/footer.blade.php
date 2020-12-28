<!-- ========== FOOTER ========== -->
<footer>
    <!-- Footer-top-widget -->
    <div class="container d-none d-lg-block mb-3">
        <div class="row">
            <div class="col-wd-6 col-lg-6">
                <div class="widget-column">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Featured Products</h3>
                    </div>
                    <ul class="list-unstyled products-group">
                    @foreach(featured() as $feature)
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href=""
                                   class="d-block width-75 text-center"><img class="img-fluid"
                                                                             src="{{asset('storage/').'/'.$feature->photo}}"
                                                                             alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                                                        class="text-blue font-weight-bold">{{$feature->title}}</a></h5>
                                <div class="prodcut-price mt-auto">
                                    <div class="font-size-15"> {{$feature->price}}</div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>


            <div class="col-wd-6 col-lg-6">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Onsale Products</h3>
                </div>
                <ul class="list-unstyled products-group">
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('design/front/')}}/assets/img/75X75/img4.jpg"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                                                    class="text-blue font-weight-bold">Yellow Earphones
                                    Waterproof with Bluetooth</a></h5>
                            <div class="prodcut-price mt-auto flex-horizontal-center">
                                <ins class="font-size-15 text-decoration-none">$110.00</ins>
                                <del class="font-size-12 text-gray-9 ml-2">$250.00</del>
                            </div>
                        </div>
                    </li>
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('design/front/')}}/assets/img/75X75/img5.jpg"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                                                    class="text-blue font-weight-bold">Camera C430W 4k
                                    Waterproof</a></h5>
                            <div class="prodcut-price mt-auto flex-horizontal-center">
                                <ins class="font-size-15 text-decoration-none">$899.00</ins>
                                <del class="font-size-12 text-gray-9 ml-2">$1200.00</del>
                            </div>
                        </div>
                    </li>
                    <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                        <div class="col-auto">
                            <a href="../shop/single-product-fullwidth.html" class="d-block width-75 text-center"><img
                                    class="img-fluid" src="{{asset('design/front/')}}/assets/img/75X75/img6.jpg"
                                    alt="Image Description"></a>
                        </div>
                        <div class="col pl-4 d-flex flex-column">
                            <h5 class="product-item__title mb-0"><a href="../shop/single-product-fullwidth.html"
                                                                    class="text-blue font-weight-bold">Smartphone 6S
                                    32GB LTE</a></h5>
                            <div class="prodcut-price mt-auto flex-horizontal-center">
                                <ins class="font-size-15 text-decoration-none">$2100.00</ins>
                                <del class="font-size-12 text-gray-9 ml-2">$3299.00</del>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-wd-3 d-none d-wd-block">
                <a href="../shop/shop.html" class="d-block"><img class="img-fluid"
                                                                 src="{{asset('design/front/')}}/assets/img/330X360/img1.jpg"
                                                                 alt="Image Description"></a>
            </div>
        </div>
    </div>
    <!-- End Footer-top-widget -->
    <!-- Footer-newsletter -->
    <div class="bg-primary py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-auto flex-horizontal-center">
                            <i class="ec ec-newsletter font-size-40"></i>
                            <h2 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h2>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Footer-newsletter -->




    <!-- Footer-bottom-widgets -->
    <div class="pt-8 pb-4 bg-gray-13">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-6">
                        <a class="d-inline-block">
                            <img width="156px" height="37px" viewBox="0 0 175.748 42.52"
                                 src="{{asset('uploads/setting'.'/'.setting()->logo)}}"
                                 enable-background="new 0 0 175.748 42.52">


                        </a>
                    </div>
                    <div class="mb-4">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <i class="ec ec-support text-primary font-size-56"></i>
                            </div>
                            <div class="col pl-3">
                                <div class="font-size-13 font-weight-light">Got questions? Call us 24/7!</div>
                                <a href="tel:+{{setting()->telefont}}"
                                   class="font-size-20 text-gray-90">{{setting()->telefont}} </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="mb-1 font-weight-bold">Contact info</h6>
                        <address class="">
                            {{setting()->address}}
                        </address>
                    </div>
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                   href="{{setting()->facebook}}">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                   href="{{setting()->google}}">
                                    <span class="fab fa-google btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                   href="{{setting()->twitter}}">
                                    <span class="fab fa-twitter btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                   href="{{setting()->github}}">
                                    <span class="fab fa-github btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Find it Fast</h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                @foreach(parent_category() as $category)
                                    <li><a class="list-group-item list-group-item-action" href="#">{{app()->getLocale() == 'ar' ? $category->dep_name_ar:$category->dep_name_en}}</a></li>
                                @endforeach
                            </ul>

                            <!-- End List Group -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-bottom-widgets -->




    <!-- Footer-copy-right -->

    <div class="bg-gray-14 py-2">
        <div class="container">
            <div class="flex-center-between d-block d-md-flex">
                <div class="mb-3 mb-md-0">© <a href="#" class="font-weight-bold text-gray-90">{{websiteName()}}</a> -
                    All rights Reserved
                </div>

            </div>
        </div>
    </div>
    <!-- End Footer-copy-right -->
</footer>
<!-- ========== END FOOTER ========== -->


<!-- ========== SECONDARY CONTENTS ========== -->


<!-- Account Sidebar Navigation -->
<aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="js-scrollbar u-header-sidebar__footer-offset pb-3">
                <!-- Toggle Button -->
                <div class="d-flex align-items-center pt-4 px-7">
                    <button type="button" class="close ml-auto"
                            aria-controls="sidebarContent"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-unfold-event="click"
                            data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent"
                            data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight"
                            data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                        <i class="ec ec-close-remove"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="js-scrollbar u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">
                        <form class="js-validate">
                            <!-- Login -->
                            <div id="login" data-target-group="idForm">
                                <!-- Title -->
                                <header class="text-center mb-7">
                                    <h2 class="h4 mb-0">Welcome Back!</h2>
                                    <p>Login to manage your account.</p>
                                </header>
                                <!-- End Title -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signinEmail">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signinEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="signinEmail"
                                                   placeholder="Email" aria-label="Email"
                                                   aria-describedby="signinEmailLabel" required
                                                   data-msg="Please enter a valid email address."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signinPassword">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                            </div>
                                            <input type="password" class="form-control" name="password"
                                                   id="signinPassword" placeholder="Password" aria-label="Password"
                                                   aria-describedby="signinPasswordLabel" required
                                                   data-msg="Your password is invalid. Please try again."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->


                                <div class="mb-2">
                                    <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">
                                        Login
                                    </button>
                                </div>

                                <div class="text-center mb-4">
                                    <span class="small text-muted">Do not have an account?</span>
                                    <a class="js-animation-link small text-dark" href="javascript:;"
                                       data-target="#signup"
                                       data-link-group="idForm"
                                       data-animation-in="slideInUp">Signup
                                    </a>
                                </div>


                            </div>

                            <!-- Signup -->
                            <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
                                <!-- Title -->
                                <header class="text-center mb-7">
                                    <h2 class="h4 mb-0">Welcome to {{websiteName()}}</h2>
                                    <p>Fill out the form to get started.</p>
                                </header>
                                <!-- End Title -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signupEmail">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signupEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="signupEmail"
                                                   placeholder="Email" aria-label="Email"
                                                   aria-describedby="signupEmailLabel" required
                                                   data-msg="Please enter a valid email address."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signupPassword">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signupPasswordLabel">
                                                            <span class="fas fa-lock"></span>
                                                        </span>
                                            </div>
                                            <input type="password" class="form-control" name="password"
                                                   id="signupPassword" placeholder="Password" aria-label="Password"
                                                   aria-describedby="signupPasswordLabel" required
                                                   data-msg="Your password is invalid. Please try again."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signupConfirmPassword">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupConfirmPasswordLabel">
                                                        <span class="fas fa-key"></span>
                                                    </span>
                                            </div>
                                            <input type="password" class="form-control" name="confirmPassword"
                                                   id="signupConfirmPassword" placeholder="Confirm Password"
                                                   aria-label="Confirm Password"
                                                   aria-describedby="signupConfirmPasswordLabel" required
                                                   data-msg="Password does not match the confirm password."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <div class="mb-2">
                                    <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">
                                        Get Started
                                    </button>
                                </div>

                                <div class="text-center mb-4">
                                    <span class="small text-muted">Already have an account?</span>
                                    <a class="js-animation-link small text-dark" href="javascript:;"
                                       data-target="#login"
                                       data-link-group="idForm"
                                       data-animation-in="slideInUp">Login
                                    </a>
                                </div>

                            </div>
                            <!-- End Signup -->


                        </form>
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
<!-- End Account Sidebar Navigation -->
<!-- ========== END SECONDARY CONTENTS ========== -->


<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
   data-position='{"bottom": 15, "right": 15 }'
   data-type="fixed"
   data-offset-top="400"
   data-compensation="#header"
   data-show-effect="slideInUp"
   data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->

<!-- JS Global Compulsory -->
<script src="{{asset('design/front/')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="{{asset('design/front/')}}/assets/vendor/appear.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/jquery.countdown.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
<script
    src="{{asset('design/front/')}}/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/typed.js/lib/typed.min.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="{{asset('design/front/')}}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- JS Electro -->
<script src="{{asset('design/front/')}}/assets/js/hs.core.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.countdown.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.header.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.hamburgers.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.unfold.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.focus-state.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.malihu-scrollbar.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.validation.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.fancybox.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.onscroll-animation.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.slick-carousel.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.show-animation.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.svg-injector.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.go-to.js"></script>
<script src="{{asset('design/front/')}}/assets/js/components/hs.selectpicker.js"></script>

<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function () {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            direction: 'horizontal',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
        });
    });

    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            afterOpen: function () {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
            yearsElSelector: '.js-cd-years',
            monthsElSelector: '.js-cd-months',
            daysElSelector: '.js-cd-days',
            hoursElSelector: '.js-cd-hours',
            minutesElSelector: '.js-cd-minutes',
            secondsElSelector: '.js-cd-seconds'
        });

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of forms
        $.HSCore.components.HSFocusState.init();

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate', {
            rules: {
                confirmPassword: {
                    equalTo: '#signupPassword'
                }
            }
        });

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of hamburgers
        $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            beforeClose: function () {
                $('#hamburgerTrigger').removeClass('is-active');
            },
            afterClose: function () {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            if ($(this).attr('aria-expanded') === "true") {
                $(target).collapse('hide');
            } else {
                $(target).collapse('show');
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');
    });
</script>
</body>
</html>
