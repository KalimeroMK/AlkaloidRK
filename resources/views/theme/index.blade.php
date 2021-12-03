@extends('layouts.master')
@section('content')

    <div class="tm-top-a-box tm-full-width  ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse"
                     data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="akslider-module ">
                            <div class="uk-slidenav-position"
                                 data-uk-slideshow="{height: 'auto', animation: 'swipe', duration: '500', autoplay: false, autoplayInterval: '7000', videoautoplay: true, videomute: true, kenburns: false}">
                                <ul class="uk-slideshow uk-overlay-active">
                                    @foreach($sliders as $slider)
                                        <li aria-hidden="false" class="uk-height-viewport uk-active">
                                            <div style="background-image: url($slider->imageUrl);"
                                                 class="uk-cover-background uk-position-cover"></div>
                                            <img style="width: 100%; height: auto; opacity: 0;" class="uk-invisible"
                                                 src="{{ $slider->imageUrl }}" alt="image">
                                            <div class="uk-position-cover uk-flex-middle">
                                                <div class="uk-container uk-container-center uk-position-cover">
                                                    <div class="va-promo-text uk-width-6-10 uk-push-4-10">
                                                        <h3>Life is <span>about timing</span></h3>
                                                        <div class="promo-sub">Just play. <span>Have fun.</span> Enjoy
                                                            the
                                                            game
                                                        </div>
                                                        @if(!empty($slider->url))
                                                            <a href="{{ $slider->url }}" class="read-more">Read More<i
                                                                        class="uk-icon-chevron-right"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
                                   data-uk-slideshow-item="previous"></a>
                                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next"
                                   data-uk-slideshow-item="next"></a>
                                <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-text-center">
                                    @foreach($sliders as $key => $slider)
                                        <li class="{{ $key == 0 ? 'uk-active' : '' }}"
                                            data-uk-slideshow-item="{{$key == 0 ? 0 : $key+1}}"><a
                                                    href="#">{{$key == 0 ? 0 : $key+1}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <div class="tm-top-b-box tm-full-width  ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-b" class="tm-top-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                     data-uk-grid-margin="">

                <div class="uk-width-1-1">
                    <div class="uk-panel">

                        <div class="va-latest-wrap">
                            <div class="uk-container uk-container-center">
                                <div class="va-latest-top">
                                    <h3>Latest <span>Results</span></h3>
                                    <div class="tournament">
                                        <address>Cambridgeshire UK<br><br></address>
                                    </div>
                                    <div class="date">
                                        November 29, 2015 | 12:00 am
                                    </div>
                                </div>
                            </div>
                            <div class="va-latest-middle uk-flex uk-flex-middle">
                                <div class="uk-container uk-container-center">
                                    <div class="uk-grid uk-flex uk-flex-middle">
                                        <div class="uk-width-2-12 center">
                                            <a href="results.html">
                                                <img src="{{ asset('theme/images/club-logo.jpg') }}"
                                                     class="img-polaroid" alt="image"
                                                     title="">
                                            </a>
                                        </div>
                                        <div class="uk-width-3-12 name uk-vertical-align">
                                            <div class="wrap uk-vertical-align-middle">
                                                Team 1
                                            </div>
                                        </div>
                                        <div class="uk-width-2-12 score">
                                            <div class="title">score</div>
                                            <div class="table">
                                                <div class="left"> 25</div>
                                                <div class="right"> 24</div>
                                                <div class="uk-clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="uk-width-3-12 name alt uk-vertical-align">
                                            <div class="wrap uk-vertical-align-middle">
                                                team2
                                            </div>
                                        </div>
                                        <div class="uk-width-2-12 center">
                                            <a href="results.html">
                                                <img src="{{ asset('theme/images/club-logo1.webp') }}"
                                                     class="img-polaroid" alt="image"
                                                     title="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-container uk-container-center">
                                <div class="va-latest-bottom">
                                    <div class="uk-grid">
                                        <div class="uk-width-8-12 uk-container-center text">
                                            <p>Vivamus hendrerit, tortor sed luctus maximus, nunc urna hendrerit nibh,
                                                sit amet efficitur libero lorem quis mauris. Nunc a pulvinar lectus.
                                                Pellentesque aliquam justo ut rhoncus lobortis. In sed venenatis massa.
                                                Sed sodales faucibus odio, eget tempus nibh accumsan ut. Fusce tincidunt
                                                semper finibus. Nullam consequat non leo interdum pulvinar.</p>
                                        </div>
                                    </div>

                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <div class="btn-wrap uk-container-center">
                                                <a class="read-more" href="results.html">More Info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
        </div>
    </div>


    <div class="tm-top-c-box tm-full-width  home-about">
        <div class="uk-container uk-container-center">
            <section id="tm-top-c" class="tm-top-c uk-grid uk-grid-collapse"
                     data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                <div class="uk-width-1-1 uk-width-large-1-2">
                    <div class="uk-panel">
                        <div class="va-about-wrap clearfix uk-cover-background uk-position-relative">
                            <div class="va-about-text">
                                <div class="title">About <span>Team</span>
                                </div>
                                <p style="color: white;">Nam quis purus sed est interdum sagittis sed in leo. Nunc
                                    feugiat enim nunc, sit amet placerat erat consectetur in. Cras consequat enim nunc,
                                    sit amet venenatis massa volutpat ut. Cras vitae facilisis nulla. </p>
                                <p style="color: white;">Nulla pharetra lobortis nisl, vitae pretium nunc congue eget.
                                    Nunc imperdiet consequat nibh pharetra venenatis. Duis vitae lacinia nibh, et
                                    egestas leo. Proin sed mi sit amet dolor rhoncus tristique. Maecenas rhoncus felis
                                    vel congue commodo.</p>
                                <a class="read-more" href="about.html">read more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-1 uk-width-large-1-2">
                    <div style="min-height: 497px;" class="uk-panel">
                        <div class="trainers-module tm-trainers-slider ">
                            <div class="trainer-wrapper">
                                <div data-uk-slideset="{default: 1, animation: 'fade', duration: 400}">
                                    <div class="trainer-top">
                                        <div class="trainers-btn">
                                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
                                               data-uk-slideset-item="previous"></a>
                                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next"
                                               data-uk-slideset-item="next"></a>
                                        </div>
                                        <h3>Trainers</h3>
                                    </div>
                                    <ul class="uk-grid uk-slideset uk-grid-width-1-1">
                                        <li class="uk-active" style="">
                                            <div class="img-wrap"><img src="images/placeholder-male.png" alt="image">
                                            </div>
                                            <div class="name">Bernard <span>Fernandez</span>
                                            </div>
                                        </li>
                                        <li style="display: none;">
                                            <div class="img-wrap"><img src="images/placeholder-male.png" alt="image">
                                            </div>
                                            <div class="name">Fernand <span>Bernardez</span>
                                            </div>
                                        </li>
                                        <li style="display: none;">
                                            <div class="img-wrap"><img src="images/placeholder-male.png" alt="image">
                                            </div>
                                            <div class="name">Martin <span>Huanez</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="tm-top-e-box tm-full-width  va-main-next-match">
        <div class="uk-container uk-container-center">
            <section id="tm-top-e" class="tm-top-e uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                     data-uk-grid-margin="">

                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="uk-container uk-container-center">
                            <div class="uk-grid uk-grid-collapse">
                                <div class="uk-width-medium-1-2 uk-width-small-1-1 va-single-next-match">
                                    <div class="va-main-next-wrap">
                                        <div class="main-next-match-title"><em>Next <span>Match</span></em>
                                        </div>
                                        <div class="match-list-single">
                                            <div class="match-list-item">
                                                <div class="count">

                                                    <div id="countdown4">
                                                        <div class="counter_container">
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                </div>
                                                <div class="clear"></div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava.png" class="img-polaroid"
                                                             alt="England VS Amsterdam (2015-11-14)"
                                                             title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div>
                                                <div class="team-name">England</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">Amsterdam</div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava1.png" class="img-polaroid"
                                                             alt="England VS Amsterdam (2015-11-14)"
                                                             title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="date">November 14, 2015 | 12:00 am</div>
                                                <div class="clear"></div>
                                                <div class="location">
                                                    <address>Cambridgeshire UK<br><br></address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2 uk-width-small-1-1 va-list-next-match">
                                    <div class="match-list-wrap">

                                        <div class="match-list-item alt">
                                            <div class="date">November 29, 2015</div>
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-29)"
                                                             title="Cambridgehire VS china (2015-11-29)">
                                                    </a>
                                                </div>
                                                <div class="team-name">Cambridgehire</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">china</div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava1.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-29)"
                                                             title="Cambridgehire VS china (2015-11-29)">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="match-list-item alt">
                                            <div class="date">November 20, 2015</div>
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava2.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-20)"
                                                             title="Cambridgehire VS china (2015-11-20)">
                                                    </a>
                                                </div>
                                                <div class="team-name">Cambridgehire</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">
                                                    china
                                                </div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava3.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-20)"
                                                             title="Cambridgehire VS china (2015-11-20)">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="match-list-item alt">
                                            <div class="date">November 14, 2015</div>
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava4.png" class="img-polaroid"
                                                             alt="England VS Amsterdam (2015-11-14)"
                                                             title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div>
                                                <div class="team-name">England</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">Amsterdam</div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava5.png" class="img-polaroid"
                                                             alt="England VS Amsterdam (2015-11-14)"
                                                             title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="match-list-item alt">
                                            <div class="date">November 29, 2015</div>
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-29)"
                                                             title="Cambridgehire VS china (2015-11-29)">
                                                    </a>
                                                </div>
                                                <div class="team-name">Cambridgehire</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">
                                                    china
                                                </div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava1.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-29)"
                                                             title="Cambridgehire VS china (2015-11-29)">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="match-list-item alt">
                                            <div class="date">November 20, 2015</div>
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava2.png" class="img-polaroid"
                                                             alt="King VS china (2015-11-20)"
                                                             title="King VS china (2015-11-20)">
                                                    </a>
                                                </div>
                                                <div class="team-name">King</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">china</div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava3.png" class="img-polaroid"
                                                             alt="King VS china (2015-11-20)"
                                                             title="King VS china (2015-11-20)">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="match-list-item alt">
                                            <div class="date">November 14, 2015</div>
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava4.png" class="img-polaroid"
                                                             alt="England VS Amsterdam (2015-11-14)"
                                                             title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div>
                                                <div class="team-name">England</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">Amsterdam</div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava5.png" class="img-polaroid"
                                                             alt="England VS Amsterdam (2015-11-14)"
                                                             title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="match-list-item alt">
                                            <div class="date">November 29, 2015</div>
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-29)"
                                                             title="Cambridgehire VS china (2015-11-29)">
                                                    </a>
                                                </div>
                                                <div class="team-name">Cambridgehire</div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">china</div>
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="images/team-ava.png" class="img-polaroid"
                                                             alt="Cambridgehire VS china (2015-11-29)"
                                                             title="Cambridgehire VS china (2015-11-29)">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="tm-top-f-box tm-full-width  va-main-our-news">
        <div class="uk-container uk-container-center">
            <section id="tm-top-f" class="tm-top-f uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                     data-uk-grid-margin="">
                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="uk-container uk-container-center">
                            <div class="uk-grid uk-grid-collapse" data-uk-grid-match="">
                                <div class="uk-width-1-1">
                                    <div class="our-news-title">
                                        <h3>Our <span>News</span></h3>
                                    </div>
                                    <div class="our-news-text">Nullam quis eros tellus. Duis sit amet neque nec orci
                                        feugiat tincidunt. Lorem ipsum dolor sit amet,
                                        <br> consectetur adipiscing elit. Nulla sed turpis aliquet, pharetra enim sit
                                        amet, congue erat.
                                    </div>
                                </div>
                                @foreach($news as $new)
                                    <article
                                            class="uk-width-large-1-2 uk-width-medium-1-1 uk-width-small-1-1 our-news-article"
                                            data-uk-grid-match="">
                                        <div class="img-wrap uk-cover-background uk-position-relative"
                                             style="min-height: 280px; background-image: url({{ $new->imageUrl }});">
                                            <a href="#"></a>
                                            <img class="uk-invisible"
                                                 src="{{$new->imageUrl }}" style="min-height: 280px !important;"
                                                 alt="image">

                                        </div>
                                        <div style="min-height: 280px;" class="info">
                                            <div class="date">
                                                Nov 20, 2015
                                            </div>
                                            <div class="name">
                                                <h4>
                                                    <a href="{{ route('postDetails', $new->slug) }}"> @foreach($new->language as $type)
                                                            {{ $type->pivot->title }}
                                                        @endforeach</a>
                                                </h4>
                                            </div>
                                            <div class="text">
                                                <p>@foreach($new->language as $type)
                                                        {{ $type->pivot->description }}
                                                    @endforeach</p>
                                                <div class="read-more"><a href="{{ route('postDetails', $new->slug) }}">Read
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>

                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
        </div>
        </section>
    </div>
    </div>

    <div class="tm-bottom-b-box tm-full-width  ">
        <div class="uk-container uk-container-center">
            <section id="tm-bottom-b" class="tm-bottom-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                     data-uk-grid-margin="">
                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="our-team-main-wrap">
                            <div class="uk-container uk-container-center">
                                <div class="uk-grid" data-uk-grid-match="">
                                    <div class="uk-width-medium-8-10 uk-width-small-1-1 uk-push-1-10">
                                        <div class="our-team-wrap">
                                            <div class="our-team-title">
                                                <h3>Our <span>Team</span></h3>
                                            </div>
                                            <div class="our-team-text">
                                                <p>Nullam quis eros tellus. Duis sit amet neque nec orci feugiat
                                                    tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    Nulla sed turpis aliquet, pharetra enim sit amet, congue erat.</p>
                                            </div>
                                            <div class="our-team-text additional">
                                                <p>Cras convallis feugiat felis eget venenatis. Sed leo tellus, luctus
                                                    eget ante quis, rutrum dignissim enim. Morbi efficitur tellus non
                                                    mauris tincidunt feugiat. Vestibulum quis nunc in nibh eleifend
                                                    convallis. Vestibulum nec viverra dui. Suspendisse vel neque eros.
                                                    Donec tincidunt tempus massa sed vehicula. Integer ullamcorper at
                                                    elit eu commodo.</p>
                                            </div>
                                            <div class="team-read-wrap"><a class="team-read-more" href="index.html#">Read
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($teams as $team)
                                        <div class=" uk-width-large-1-4 uk-width-medium-1-3 uk-width-small-1-2 player-item tt_2a195f12da9f3f36da06e6097be7e451">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number"><span>
                                                                {{ $diff = Carbon\Carbon::parse($team->birthday)->diffForHumans(Carbon\Carbon::now()) }}
                                                                </span>
                                                        </div>
                                                        <div class="bio"><span><a
                                                                        href="{{ route('player', $team->slug) }}">bio</a></span>
                                                        </div>
                                                        <a href="{{ route('player', $team->slug) }}">
                                                            <img src="{{ $team->imageUrl }}" class="img-polaroid"
                                                                 alt="Steven Webb" title="Steven Webb">
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="{{ route('player', $team->slug) }}">@foreach($team->language as $type)
                                                                        {{ $type->pivot->name }}@foreach($team->language as $type)
                                                                            {{ $type->pivot->lastname }}
                                                                        @endforeach
                                                                    @endforeach </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position"> @foreach($team->language as $type)
                                                                {{ $type->pivot->position }}
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="our-team-btn"><a href="players.html"><span>More Info</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="tm-bottom-c-box tm-full-width  ">
        <div class="uk-container uk-container-center">
            <section id="tm-bottom-c" class="tm-bottom-c uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                     data-uk-grid-margin="">

            </section>
        </div>
    </div>

    <div class="tm-bottom-d-box tm-full-width  ">
        <div class="uk-container uk-container-center">
            <section id="tm-bottom-d" class="tm-bottom-d uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                     data-uk-grid-margin="">
                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="last-video-wrap">
                            <div class="uk-container uk-container-center">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1">
                                        <div class="last-video-title">
                                            <h2>Last <span>Video</span></h2>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-8-10 uk-width-small-1-1 uk-push-1-10">
                                        <div class="last-video-text">
                                            Nullam quis eros tellus. Duis sit amet neque nec orci feugiat tincidunt.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed turpis
                                            aliquet, pharetra enim sit amet, congue erat.
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-8-10 uk-width-small-1-1 uk-push-1-10">
                                        {!! $youtube->video_html ?? ''!!}
                                    </div>
                                    <div class="uk-width-medium-1-1 uk-width-small-1-1 partners-slider">
                                        <div data-uk-slideset="{small: 2, medium: 5, large: 5}">
                                            <div class="uk-slidenav-position">
                                                <ul class="uk-grid uk-slideset uk-grid-width-1-1 uk-grid-width-large-1-5 uk-grid-width-medium-1-5 uk-grid-width-small-1-2">
                                                    <li><img src="images/partners-img.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img1.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img2.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img3.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img4.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img1.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img2.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img3.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img4.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img1.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img2.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img3.png" alt="image">
                                                    </li>
                                                    <li><img src="images/partners-img4.png" alt="image">
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="uk-slideset-nav uk-dotnav uk-flex-center">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="tm-bottom-e-box tm-full-width  ">
        <div class="uk-container uk-container-center">
            <section id="tm-bottom-e" class="tm-bottom-e uk-grid uk-grid-collapse"
                     data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="map-wrap">

                            <div class="contact-form-wrap uk-flex">
                                <div class="uk-container uk-container-center uk-flex-item-1">
                                    <div class="uk-grid  uk-grid-collapse uk-flex-item-1 uk-height-1-1 uk-nbfc">
                                        <div class="uk-width-5-10 contact-left uk-vertical-align contact-left-wrap">
                                            <div class="contact-info-lines uk-vertical-align-middle">
                                                <div class="item phone"><span class="icon"><i class="uk-icon-phone"></i></span>(846)-356-9322
                                                </div>
                                                <div class="item mail"><span class="icon"><i
                                                                class="uk-icon-envelope"></i></span><a
                                                            href="mailto:support@domain.comtorbara.com">support@domain.comtorbara.com</a>

                                                </div>
                                                <div class="item location"><span class="icon"><i
                                                                class="uk-icon-map-marker"></i></span>9478 Chestnut
                                                    Street, Woodstock, GA 30188
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-5-10 uk-width-small-1-1 contact-right-wrap">
                                            <div class="contact-form uk-height-1-1">
                                                <div class="uk-position-cover uk-flex uk-flex-column uk-flex-center">
                                                    <div class="contact-form-title">
                                                        <h2>Get in touch</h2>
                                                    </div>
                                                    <div id="aiContactSafe_form_1">
                                                        <div class="aiContactSafe" id="aiContactSafe_mainbody_1">
                                                            <div class="contentpaneopen">
                                                                <div id="aiContactSafeForm">
                                                                    <form method="post" id="adminForm_1"
                                                                          name="adminForm_1">
                                                                        <div id="displayAiContactSafeForm_1">
                                                                            <div class="aiContactSafe"
                                                                                 id="aiContactSafe_contact_form">
                                                                                <div class="aiContactSafe"
                                                                                     id="aiContactSafe_info"></div>
                                                                                <div class="aiContactSafe_row"
                                                                                     id="aiContactSafe_row_aics_name">
                                                                                    <div class="aiContactSafe_contact_form_field_label_left">
                                                                                        <span class="aiContactSafe_label"
                                                                                              id="aiContactSafe_label_aics_name"><label
                                                                                                    for="aics_name">Name</label></span>&nbsp;
                                                                                        <label class="required_field">*</label>
                                                                                    </div>
                                                                                    <div class="aiContactSafe_contact_form_field_right">
                                                                                        <input name="aics_name"
                                                                                               id="aics_name"
                                                                                               class="textbox"
                                                                                               placeholder="Name"
                                                                                               value="" type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="aiContactSafe_row"
                                                                                     id="aiContactSafe_row_aics_email">
                                                                                    <div class="aiContactSafe_contact_form_field_label_left">
                                                                                        <span class="aiContactSafe_label"
                                                                                              id="aiContactSafe_label_aics_email"><label
                                                                                                    for="aics_email">E-mail</label></span>&nbsp;
                                                                                        <label class="required_field">*</label>
                                                                                    </div>
                                                                                    <div class="aiContactSafe_contact_form_field_right">
                                                                                        <input name="aics_email"
                                                                                               id="aics_email"
                                                                                               class="email"
                                                                                               placeholder="Email"
                                                                                               value="" type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="aiContactSafe_row"
                                                                                     id="aiContactSafe_row_aics_message">
                                                                                    <div class="aiContactSafe_contact_form_field_label_left">
                                                                                        <span class="aiContactSafe_label"
                                                                                              id="aiContactSafe_label_aics_message"><label
                                                                                                    for="aics_message">Message</label></span>&nbsp;
                                                                                        <label class="required_field">*</label>
                                                                                    </div>
                                                                                    <div class="aiContactSafe_contact_form_field_right">
                                                                                        <textarea name="aics_message"
                                                                                                  id="aics_message"
                                                                                                  cols="40" rows="10"
                                                                                                  class="editbox"
                                                                                                  placeholder="Message"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                        <div id="aiContactSafeBtns">
                                                                            <div id="aiContactSafeButtons_center"
                                                                                 style="clear:both; display:block; text-align:center;">
                                                                                <table style="margin-left:auto; margin-right:auto;">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div id="aiContactSafeSend_loading_1">
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </td>
                                                                                        <td id="td_aiContactSafeSendButton">
                                                                                            <input id="aiContactSafeSendButton"
                                                                                                   value="Send"
                                                                                                   type="submit">
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <script>
                                window.map = false;


                                function initialize() {
                                    var myLatlng = new google.maps.LatLng(50.3915097, -4.1306689);

                                    var mapOptions = {
                                        zoom: 16,
                                        center: myLatlng,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                                        scrollwheel: false,

                                        streetViewControl: false,
                                        overviewMapControl: false,
                                        mapTypeControl: false

                                    };

                                    window.map = new google.maps.Map(document.getElementById('map'), mapOptions);

                                }

                                google.maps.event.addDomListener(window, 'load', initialize);
                            </script>
                            <div id="map"></div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection