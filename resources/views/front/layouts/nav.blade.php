<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        <div class="u-header-topbar py-2 d-none d-xl-block">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="topbar-left">
                        <a href="#"
                           class="text-gray-110 font-size-13 u-header-topbar__nav-link">{{__('front.welcome')}}  {{websiteName()}} </a>
                    </div>
                    <div class="topbar-right ml-auto">
                        <ul class="list-inline mb-0">


                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                <a class="nav-link" data-toggle="dropdown" c href="#">
                                    <i class="fas fa-language" style="font-size: 25px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                                    <a href="{{route('lang','en')}}" class="dropdown-item">
                                        <i class="fas fa-american-sign-language-interpreting mr-2"></i> en
                                    </a>

                                    <a href="{{route('lang','ar')}}" class="dropdown-item">
                                        <i class="fas fa-fast-backward mr-2"></i> العربيه
                                    </a>

                                </div>
                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                <a class="nav-link" data-toggle="dropdown" c href="#">
                                    <i class="ec ec-dollar	" style="font-size: 25px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                                    @foreach(countries() as $country)
                                        <a href="{{route('currency',$country->currency)}}" class="dropdown-item">
                                            <i class=""></i> {{app()->getLocale() == 'ar'? $country->country_name_ar : $country->country_name_en }}
                                            ({{$country->currency}})
                                        </a>
                                    @endforeach


                                </div>
                            </li>
                            @if(Auth::check() == false)
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <!-- Account Sidebar Toggle Button -->
                                <a id="sidebarNavToggler" href="javascript:;" role="button"
                                   class="u-header-topbar__nav-link"
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
                                    <i class="ec ec-user mr-1"></i> {{__('front.Register')}} <span
                                        class="text-gray-50">{{__('front.or')}}</span>{{__('front.Sign_in')}}
                                </a>
                                <!-- End Account Sidebar Toggle Button -->
                            </li>
                            @else
                                ddd
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Logo-Search-header-icons -->
        <div class="py-2 py-xl-5 bg-primary-down-lg">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav
                            class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
                               aria-label="Electro">
                                <img src="{{asset('uploads/setting'.'/'.setting()->logo)}}" width="175.748px"
                                     height="42.52px">
                            </a>
                            <!-- End Logo -->


                    </div>
                    <!-- End Logo-offcanvas-menu -->


                    <!-- Search Bar -->
                    <div class="col d-none d-xl-block">
                        <form class="js-focus-state">
                            <label class="sr-only" for="searchproduct">{{__('front.search')}}</label>
                            <div class="input-group">
                                <input type="email"
                                       class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary"
                                       name="email" id="searchproduct-item"
                                       placeholder="{{__('front.search_products')}}"
                                       aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">

                                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="button"
                                            id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Search Bar -->


                    <!-- Header Icons -->
                    <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                        <div class="d-inline-flex">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <!-- Search -->
                                <li class="col d-xl-none px-2 px-sm-3 position-static">
                                    <a id="searchClassicInvoker"
                                       class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary"
                                       href="javascript:;" role="button"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Search"
                                       aria-controls="searchClassic"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       data-unfold-target="#searchClassic"
                                       data-unfold-type="css-animation"
                                       data-unfold-duration="300"
                                       data-unfold-delay="300"
                                       data-unfold-hide-on-scroll="true"
                                       data-unfold-animation-in="slideInUp"
                                       data-unfold-animation-out="fadeOut">
                                        <span class="ec ec-search"></span>
                                    </a>

                                    <!-- Input -->
                                    <div id="searchClassic"
                                         class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2"
                                         aria-labelledby="searchClassicInvoker">
                                        <form class="js-focus-state input-group px-3">
                                            <input class="form-control" type="search" placeholder="Search Product">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-3" type="button"><i
                                                        class="font-size-18 ec ec-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Input -->
                                </li>
                                <!-- End Search -->
                                <li class="col d-none d-xl-block"><a href="../shop/compare.html" class="text-gray-90"
                                                                     data-toggle="tooltip" data-placement="top"
                                                                     title="Compare"><i
                                            class="font-size-22 ec ec-compare"></i></a></li>
                                <li class="col d-none d-xl-block"><a href="../shop/wishlist.html" class="text-gray-90"
                                                                     data-toggle="tooltip" data-placement="top"
                                                                     title="Favorites"><i
                                            class="font-size-22 ec ec-favorites"></i></a></li>
                                <li class="col d-xl-none px-2 px-sm-3"><a href="../shop/my-account.html"
                                                                          class="text-gray-90" data-toggle="tooltip"
                                                                          data-placement="top" title="My Account"><i
                                            class="font-size-22 ec ec-user"></i></a></li>
                                <li class="col pr-xl-0 px-2 px-sm-3">
                                    <a href="../shop/cart.html" class="text-gray-90 position-relative d-flex "
                                       data-toggle="tooltip" data-placement="top" title="Cart">
                                        <i class="font-size-22 ec ec-shopping-bag"></i>
                                        <span
                                            class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">2</span>
                                        <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">$1785.00</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>
        <!-- End Logo-Search-header-icons -->

        <!-- Primary-menu-wide -->
        <div class="d-none d-xl-block bg-primary">
            <div class="container">
                <div class="min-height-45">
                    <!-- Nav -->
                    <nav
                        class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space">
                        <!-- Navigation -->
                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                            <ul class="navbar-nav u-header__navbar-nav">
                                <!-- Home -->

                                @foreach(parent_category() as $category)
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                        data-event="hover"
                                        data-animation-in="slideInUp"
                                        data-animation-out="fadeOut"
                                        data-position="left">
                                        <a id="homeMegaMenu"
                                           class="nav-link u-header__nav-link u-header__nav-link-toggle"
                                           href="javascript:;" aria-haspopup="true"
                                           aria-expanded="false">{{app()->getLocale() == 'ar' ? $category->dep_name_ar:$category->dep_name_en}}</a>

                                        <!-- Home - Mega Menu -->
                                        <div class="hs-mega-menu w-100 u-header__sub-menu"
                                             aria-labelledby="homeMegaMenu">
                                            <div class="row u-header__mega-menu-wrapper">
                                                @foreach(App\Models\Department::where('parent',$category->id)->get() as $child)
                                                    <div class="col-md-3">
                                                        <span
                                                            class="u-header__sub-menu-title">{{app()->getLocale() == 'ar' ? $child->dep_name_ar:$child->dep_name_en}}</span>

                                                        <ul class="u-header__sub-menu-nav-group">
                                                            @foreach(App\Models\Department::where('parent',$child->id)->get() as $baby)
                                                            <li><a
                                                                   class="nav-link u-header__sub-menu-nav-link">{{app()->getLocale() == 'ar' ? $baby->dep_name_ar:$baby->dep_name_en}}
                                                                    v1</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                        <!-- End Home - Mega Menu -->
                                    </li>
                            @endforeach
                            <!-- End Home -->


                            </ul>
                        </div>
                        <!-- End Navigation -->
                    </nav>
                    <!-- End Nav -->
                </div>
            </div>
        </div>
        <!-- End Primary-menu-wide -->
    </div>
</header>
<!-- ========== END HEADER ========== -->
