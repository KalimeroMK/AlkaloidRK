@extends('layouts.master')
@section('content')
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse"
                     data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <div class="uk-cover-background uk-position-relative head-wrap"
                             style="height: 290px; background-image: url('images/head-bg.jpg');">
                            <img class="uk-invisible" src="{{ asset('theme/images/head-bg.jpg') }}" alt="image"
                                 height="290" width="1920">
                            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                <h1>Players</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="uk-container uk-container-center alt">
        <ul class="uk-breadcrumb">
            <li><a href="i/">Home</a>
            </li>
            <li><a href="">Players</a>
            </li>
            <li class="uk-active">
                <span>@foreach($team->language as $lang)  {!!$lang->pivot->name ?? null!!}  {!!$lang->pivot->lastname ?? null!!}@endforeach</span>
            </li>
        </ul>
    </div>


    <div class="uk-container uk-container-center">
        <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="tm-main uk-width-medium-1-1 uk-row-first">
                <main id="tm-content" class="tm-content">
                    <div id="system-message-container"></div>
                    <div class="contentpaneopen">
                        <article class="player-single tt-players-page">
                            <div class="uk-container uk-container-center alt">
                                <div class="uk-gfid">
                                </div>
                            </div>
                            <div class="player-top">
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-grid">
                                        <div class="uk-width-5-12">
                                            <div class="avatar">
                                                <img src="{{ $team->imageUrl }}"
                                                     class="img-polaroid" alt="Christopher Herrera"
                                                     title="image">
                                            </div>
                                        </div>
                                        <div class="uk-width-1-12">
                                            <div class="number">
                                                36
                                            </div>
                                        </div>
                                        <div class="uk-width-6-12">
                                            <div class="name">
                                                <h2>
                                                    @foreach($team->language as $lang)  {!!$lang->pivot->name ?? null!!}  {!!$lang->pivot->lastname ?? null!!}@endforeach
                                                </h2>
                                            </div>
                                            <div class="wrap">
                                                <ul class="info">
                                                    <li>
                                                        <span>POSITION</span><span>@foreach($team->language as $lang)  {!!$lang->pivot->position ?? null!!} @endforeach</span>
                                                    </li>
                                                    <li>
                                                        <span>D.O.B</span><span>@foreach($team->language as $lang)  {!!$lang->pivot->birday ?? null!!} @endforeach</span>
                                                    </li>
                                                    <li>
                                                        <span>NATIONALITY</span><span>@foreach($team->language as $lang)  {!!$lang->pivot->nationality ?? null!!} @endforeach</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-container uk-container-center alt">
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-container uk-container-center alt">
                                <div class="uk-grid">
                                    <div class="uk-width-9-10 uk-push-1-10">
                                        <div class="player-total-info">
                                            <p>@foreach($team->language as $lang)  {!! $lang->pivot->bio ?? null !!} @endforeach</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div>
                            <div class="other-players-wrap">
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <h3 class="other-post-title">Other <span>Players</span></h3>
                                            <div dir="ltr" class="uk-slidenav-position player-slider" data-uk-slider="">
                                                <div class="uk-slider-container">
                                                    <div class="player-slider-btn">
                                                        <a draggable="false" href="#"
                                                           class="uk-slidenav uk-slidenav-previous"
                                                           data-uk-slider-item="previous"></a>
                                                        <a draggable="false" href="#"
                                                           class="uk-slidenav uk-slidenav-next"
                                                           data-uk-slider-item="next"></a>
                                                    </div>
                                                    <ul class="uk-slider uk-grid uk-grid-width-1-4">
                                                        <li class="player-item">
                                                            <div class="player-article">
                                                                <div class="wrapper">
                                                                    <div class="img-wrap">
                                                                        <div class="player-number">
                                                                            <span>47</span>
                                                                        </div>
                                                                        <div class="bio"><span><a draggable="false"
                                                                                                  href="player.html">bio</a></span>
                                                                        </div>
                                                                        <a draggable="false" href="player.html">
                                                                            <img draggable="false"
                                                                                 src="images/70d6fcd7a5ed8edc8acc6b52c76d7ff4.jpg"
                                                                                 class="img-polaroid" alt="Joe Perez"
                                                                                 title="Joe Perez"></a>
                                                                        <ul class="socials">
                                                                            <li class="twitter"><a draggable="false"
                                                                                                   href="http://twitter.com/"
                                                                                                   target="_blank"
                                                                                                   rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="facebook"><a draggable="false"
                                                                                                    href="http://facebook.com/"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="google-plus"><a draggable="false"
                                                                                                       href="https://plus.google.com/"
                                                                                                       target="_blank"
                                                                                                       rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="pinterest"><a draggable="false"
                                                                                                     href="https://www.pinterest.com"
                                                                                                     target="_blank"
                                                                                                     rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="linkedin"><a draggable="false"
                                                                                                    href="https://www.linkedin.com"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="info">
                                                                        <div class="name">
                                                                            <h3>
                                                                                <a draggable="false" href="player.html">Joe
                                                                                    Perez</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="position">STRIKER</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="player-item">
                                                            <div class="player-article">
                                                                <div class="wrapper">
                                                                    <div class="img-wrap">
                                                                        <div class="player-number">
                                                                            <span>21</span>
                                                                        </div>
                                                                        <div class="bio"><span><a draggable="false"
                                                                                                  href="player.html">bio</a></span>
                                                                        </div>
                                                                        <a draggable="false" href="player.html">
                                                                            <img draggable="false"
                                                                                 src="images/494a6c4fd56d9d2af64b92b6337db693.jpg"
                                                                                 class="img-polaroid" alt="Steven Webb"
                                                                                 title="Steven Webb"></a>
                                                                        <ul class="socials">
                                                                            <li class="twitter"><a draggable="false"
                                                                                                   href="http://twitter.com/"
                                                                                                   target="_blank"
                                                                                                   rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="facebook"><a draggable="false"
                                                                                                    href="http://facebook.com/"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="google-plus"><a draggable="false"
                                                                                                       href="https://plus.google.com/"
                                                                                                       target="_blank"
                                                                                                       rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="pinterest"><a draggable="false"
                                                                                                     href="https://www.pinterest.com"
                                                                                                     target="_blank"
                                                                                                     rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="linkedin"><a draggable="false"
                                                                                                    href="https://www.linkedin.com"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="info">
                                                                        <div class="name">
                                                                            <h3>
                                                                                <a draggable="false" href="player.html">Steven
                                                                                    Webb</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="position">DEFENDER</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="player-item">
                                                            <div class="player-article">
                                                                <div class="wrapper">
                                                                    <div class="img-wrap">
                                                                        <div class="player-number">
                                                                            <span>07</span>
                                                                        </div>
                                                                        <div class="bio"><span><a draggable="false"
                                                                                                  href="player.html">bio</a></span>
                                                                        </div>
                                                                        <a draggable="false" href="player.html">
                                                                            <img draggable="false"
                                                                                 src="images/f9bfc5bc85499506c9e18e5afb2eaf2d.jpg"
                                                                                 class="img-polaroid"
                                                                                 alt="Benjamin Mendoza"
                                                                                 title="Benjamin Mendoza"></a>
                                                                        <ul class="socials">
                                                                            <li class="twitter"><a draggable="false"
                                                                                                   href="http://twitter.com/"
                                                                                                   target="_blank"
                                                                                                   rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="facebook"><a draggable="false"
                                                                                                    href="http://facebook.com/"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="google-plus"><a draggable="false"
                                                                                                       href="https://plus.google.com/"
                                                                                                       target="_blank"
                                                                                                       rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="pinterest"><a draggable="false"
                                                                                                     href="https://www.pinterest.com"
                                                                                                     target="_blank"
                                                                                                     rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="linkedin"><a draggable="false"
                                                                                                    href="https://www.linkedin.com"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="info">
                                                                        <div class="name">
                                                                            <h3>
                                                                                <a draggable="false" href="player.html">Benjamin
                                                                                    Mendoza</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="position">DEFENDER</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="player-item">
                                                            <div class="player-article">
                                                                <div class="wrapper">
                                                                    <div class="img-wrap">
                                                                        <div class="player-number">
                                                                            <span>36</span>
                                                                        </div>
                                                                        <div class="bio"><span><a draggable="false"
                                                                                                  href="player.html">bio</a></span>
                                                                        </div>
                                                                        <a draggable="false" href="player.html">
                                                                            <img draggable="false"
                                                                                 src="images/8a3d3554567e4859f88a93ac59e1eadc.jpg"
                                                                                 class="img-polaroid"
                                                                                 alt="Christopher Herrera"
                                                                                 title="Christopher Herrera"></a>
                                                                        <ul class="socials">
                                                                            <li class="twitter"><a draggable="false"
                                                                                                   href="http://twitter.com/"
                                                                                                   target="_blank"
                                                                                                   rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="facebook"><a draggable="false"
                                                                                                    href="http://facebook.com/"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="google-plus"><a draggable="false"
                                                                                                       href="https://plus.google.com/"
                                                                                                       target="_blank"
                                                                                                       rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="pinterest"><a draggable="false"
                                                                                                     href="https://www.pinterest.com"
                                                                                                     target="_blank"
                                                                                                     rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="linkedin"><a draggable="false"
                                                                                                    href="https://www.linkedin.com"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="info">
                                                                        <div class="name">
                                                                            <h3>
                                                                                <a draggable="false" href="player.html">Christopher
                                                                                    Herrera</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="position">STRIKER</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="player-item">
                                                            <div class="player-article">
                                                                <div class="wrapper">
                                                                    <div class="img-wrap">
                                                                        <div class="player-number">
                                                                            <span>23</span>
                                                                        </div>
                                                                        <div class="bio"><span><a draggable="false"
                                                                                                  href="player.html">bio</a></span>
                                                                        </div>
                                                                        <a draggable="false" href="player.html">
                                                                            <img draggable="false"
                                                                                 src="images/450032a6f795065465ebb3d698d74294.jpg"
                                                                                 class="img-polaroid"
                                                                                 alt="Bobby Guerrero"
                                                                                 title="Bobby Guerrero"></a>
                                                                        <ul class="socials">
                                                                            <li class="twitter"><a draggable="false"
                                                                                                   href="http://twitter.com/"
                                                                                                   target="_blank"
                                                                                                   rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="facebook"><a draggable="false"
                                                                                                    href="http://facebook.com/"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="google-plus"><a draggable="false"
                                                                                                       href="https://plus.google.com/"
                                                                                                       target="_blank"
                                                                                                       rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="pinterest"><a draggable="false"
                                                                                                     href="https://www.pinterest.com"
                                                                                                     target="_blank"
                                                                                                     rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="linkedin"><a draggable="false"
                                                                                                    href="https://www.linkedin.com"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="info">
                                                                        <div class="name">
                                                                            <h3>
                                                                                <a draggable="false" href="player.html">Bobby
                                                                                    Guerrero</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="position">MIDFIELDER</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="player-item">
                                                            <div class="player-article">
                                                                <div class="wrapper">
                                                                    <div class="img-wrap">
                                                                        <div class="player-number">
                                                                            <span>14</span>
                                                                        </div>
                                                                        <div class="bio"><span><a draggable="false"
                                                                                                  href="player.html">bio</a></span>
                                                                        </div>
                                                                        <a draggable="false" href="player.html">
                                                                            <img draggable="false"
                                                                                 src="images/a0cd8e2687c86ec4810f4adec5724bba.jpg"
                                                                                 class="img-polaroid" alt="Douglas Pain"
                                                                                 title="Douglas Pain"></a>
                                                                        <ul class="socials">
                                                                            <li class="twitter"><a draggable="false"
                                                                                                   href="http://twitter.com/"
                                                                                                   target="_blank"
                                                                                                   rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="facebook"><a draggable="false"
                                                                                                    href="http://facebook.com/"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="info">
                                                                        <div class="name">
                                                                            <h3>
                                                                                <a draggable="false" href="player.html">Douglas
                                                                                    Pain</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="position">DEFENDER</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="player-item">
                                                            <div class="player-article">
                                                                <div class="wrapper">
                                                                    <div class="img-wrap">
                                                                        <div class="player-number">
                                                                            <span>35</span>
                                                                        </div>
                                                                        <div class="bio"><span><a draggable="false"
                                                                                                  href="player.html">bio</a></span>
                                                                        </div>
                                                                        <a draggable="false" href="player.html">
                                                                            <img draggable="false"
                                                                                 src="images/bd84c3b0e76d2dd99a75ac9ca2f6ec06.jpg"
                                                                                 class="img-polaroid"
                                                                                 alt="Johnny Thompson"
                                                                                 title="Johnny Thompson"></a>
                                                                        <ul class="socials">
                                                                            <li class="twitter"><a draggable="false"
                                                                                                   href="http://twitter.com/"
                                                                                                   target="_blank"
                                                                                                   rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="facebook"><a draggable="false"
                                                                                                    href="http://facebook.com/"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="google-plus"><a draggable="false"
                                                                                                       href="https://plus.google.com/"
                                                                                                       target="_blank"
                                                                                                       rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="pinterest"><a draggable="false"
                                                                                                     href="https://www.pinterest.com"
                                                                                                     target="_blank"
                                                                                                     rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                            <li class="linkedin"><a draggable="false"
                                                                                                    href="https://www.linkedin.com"
                                                                                                    target="_blank"
                                                                                                    rel="nofollow">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="info">
                                                                        <div class="name">
                                                                            <h3>
                                                                                <a draggable="false" href="player.html">Johnny
                                                                                    Thompson</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="position">goalkeeper</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

