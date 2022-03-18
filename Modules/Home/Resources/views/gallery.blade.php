@extends('home::layouts.master')
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
                                    {{ $category->title }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <ul class="uk-breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="uk-active"><span>Gallery</span></li>
    </ul>
    <div class="uk-container uk-container-center">
        <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="tm-main uk-width-medium-1-1 uk-row-first">
                <main id="tm-content" class="tm-content">
                    <div id="system-message-container"></div>
                    <div class="jshop" id="comjshop">
                        <div class="jshop_list_product">
                            <div class="jshop list_product" id="comjshop_list_product">
                                <div class="row">
                                    @foreach($posts as $post)
                                        <div class="product col-3">
                                            <div class="image">
                                                <div class="image_block">
                                                    <a href="{{ route('galleriesDetails', $post->slug) }}">
                                                        <img class="jshop_img" src="{{ $post->imageUrl }}"
                                                             alt="Fashionable Mens Hoodie"
                                                             title="Fashionable Mens Hoodie">
                                                    </a>
                                                    <div class="name">
                                                        <h2 class="product_title"><a
                                                                    href="{{ route('galleriesDetails', $post->slug) }}">{{ $post->title }}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mainblock">
                                                <div class="price-wrap">
                                                    <div class="old_price"><span>
                                                            $200</span>
                                                    </div>
                                                    <div class="jshop_price">
                                                        <span>$120</span>
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <a class="button_buy"
                                                       href="{{ route('galleriesDetails', $post->slug) }}">More</a>
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="nvg_clear"></div>
                                <div class="jshop_pagination">
                                    <div class="pagination">
                                        <ul>
                                            <li class="pagination-start"><span class="pagenav">Start</span></li>
                                            <li class="pagination-prev"><span class="pagenav">Prev</span></li>
                                            <li><span class="pagenav">1</span></li>
                                            <li><a href="category.html#" class="pagenav">2</a></li>
                                            <li class="pagination-next"><a data-original-title="Next" title=""
                                                                           href="category.html#"
                                                                           class="hasTooltip pagenav">Next</a>
                                            </li>
                                            <li class="pagination-end"><a data-original-title="End" title=""
                                                                          href="category.html#"
                                                                          class="hasTooltip pagenav">End</a>
                                            </li>
                                        </ul>
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