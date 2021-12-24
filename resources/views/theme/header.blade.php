<div class="toolbar-wrap">
    <div class="uk-container uk-container-center">
        <div class="tm-toolbar uk-clearfix uk-hidden-small">


            <div class="uk-float-right">
                <div class="uk-panel">
                    <div class="social-top">
                        <a href="index.html#"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                        <a href="index.html#"><span class="uk-icon-small uk-icon-hover uk-icon-twitter"></span></a>
                        <a href="index.html#"><span class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="tm-menu-box">

    <div style="height: 70px;" class="uk-sticky-placeholder">
        <nav style="margin: 0px;" class="tm-navbar uk-navbar" data-uk-sticky="">
            <div class="uk-container uk-container-center">
                <a class="tm-logo uk-float-left" href="{{ route('indexFront') }}">
                    <img src="{{ asset('theme/images/logo-img.png') }}" alt="logo" title="logo" class="logoBall">
                </a>
                <ul class="uk-navbar-nav uk-hidden-small">
                    @foreach ($categories as $category)
                        <li class="nav-item dropdown ">
                            <a href="{{ route('categories', $category->slug) }}" id="mainNavHome"
                               class="nav-link dropdown-toggle js-stoppropag" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ $category->title }}
                            </a>
                            @foreach ($category->childrenCategories as $childCategory)
                                <div aria-labelledby="mainNavHome"
                                     class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
                                    <ul class="list-unstyled m-0 p-0">
                                        @include('theme.partials.child_category', ['child_category' =>
                                        $childCategory])
                                    </ul>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('en') }}"><img
                                    src="{{ asset('images/en-flag-hover.jpg') }}" alt="image">
                        </a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('mk') }}"><img
                                    src="{{ asset('images/mk-flag-hover.jpg') }}" alt="image">
                        </a>
                    </li>
                    {{--                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
                    {{--                        <li>--}}
                    {{--                            <a rel="alternate" hreflang="{{ $localeCode }}"--}}
                    {{--                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
                    {{--                                {{ $properties['native'] }}--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                    @endforeach--}}
                </ul>
                </ul>
                <a href="/#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
            </div>
        </nav>
    </div>

</div>