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
                    <li class="uk-parent "
                        data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true"
                        aria-expanded="false"><a href="/">Home</a></li>
                    <li class="{{ Route::currentRouteNamed('about_us') ? 'uk-active' : '' }}"
                        data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a
                                href="{{ route('about_us') }}">@lang('partials.team')</a></li>
                    <li class="{{ Route::currentRouteNamed('/') ? 'uk-active' : '' }}"><a
                                href="{{ route('galleries', 'galleries') }}">@lang('messages.gallery')</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('contact') ? 'uk-active' : '' }}"><a
                                href="{{ route('contact') }}">@lang('partials.recruiter')</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('/') ? 'uk-active' : '' }}"><a
                                href="category.html">@lang('partials.tv')</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('kl7') ? 'uk-active' : '' }}"><a
                                href="{{ route('kl7','kl7') }}">@lang('partials.KL7')</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/en') }}"><img
                                    src="{{ asset('images/en-flag-hover.jpg') }}" alt="image">
                        </a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/mk') }}"><img
                                    src="{{ asset('images/mk-flag-hover.jpg') }}" alt="image">
                        </a></li>
                </ul>
                <a href="/#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
            </div>
        </nav>
    </div>

</div>