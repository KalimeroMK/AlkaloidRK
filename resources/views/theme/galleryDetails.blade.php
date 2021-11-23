@extends('layouts.master')
@section('content')
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse"
                     data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <div class="uk-cover-background uk-position-relative head-wrap"
                             style="height: 290px; background-image: url('{{asset('theme/images/head-bg.jpg')}}');">
                            <img class="uk-invisible" src="{{asset('theme/images/head-bg.jpg')}}" alt="image"
                                 height="290" width="1920">
                            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                <h1>
                                    {{ $post->title }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="uk-container uk-container-center alt">
        <ul class="uk-breadcrumb">
            <li><a href="/">Home</a></li>
            {{--            <li><a href="#news.html">News</a></li>--}}
            <li class="uk-active"><span>{{ $post->title }}</span></li>
        </ul>
    </div>
    <div class="uk-container uk-container-center">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

        <div class="container">
            <div class="portfolio-item row">
                @foreach($sliders as $slider)
                    <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                        <a href="{{ $slider->image }}"
                           class="fancylight popup-btn" data-fancybox-group="light">
                            <img class="img-fluid"
                                 src="{{ $slider->image }}"
                                 alt="image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('style')
    <style>
        .portfolio-menu {
            text-align: center;
        }

        .portfolio-menu ul li {
            display: inline-block;
            margin: 0;
            list-style: none;
            padding: 10px 15px;
            cursor: pointer;
            -webkit-transition: all 05s ease;
            -moz-transition: all 05s ease;
            -ms-transition: all 05s ease;
            -o-transition: all 05s ease;
            transition: all .5s ease;
        }

        .portfolio-item {
            /*width:100%;*/
        }

        .portfolio-item .item {
            /*width:303px;*/
            float: left;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $('.portfolio-menu ul li').click(function () {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');

            const selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
                filter: selector
            });
            return false;
        });
        $(document).ready(function () {
            const popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endsection