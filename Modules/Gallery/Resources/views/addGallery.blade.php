@extends('dashboard::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{ trans('messages.manage_posts') }}</h4>
                    <p class="card-category"><a href="{{ route('dashboard') }}">{{ trans('messages.home') }}</a><a
                                href="{{ route('posts.index') }}">{{ trans('messages.product') }}</a></p>
                </div>
                <form method="POST" action="{{route('gallery.store')}}" enctype="multipart/form-data">
                    @csrf
                    <span class=" input-group-btn
                ">
                <span class="btn btn-info shiny btn-file">
                                Избери... <input type="file" multiple name="image[]">
                            </span>
                </span>

                    <br/>
                    <!-- Hidden inputs -->
                    <input type="hidden" id="product_id" class="form-control" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="btn btn-labeled shiny btn-warning btn-large"><i
                                class="btn-label fa fa-plus"></i>
                        Create
                    </button>
                </form>
                <div class="col-12">
                    @foreach ($gallery as $galleries)
                        <form method="POST" action="{{route('gallery.destroy',$galleries->id)}}">
                            @csrf
                            @method('delete')
                            <img src="{{ $galleries->galleryUrl }}" class="rounded col-3"
                                 style="margin: 2%">
                            <button class="btn btn-danger "
                                    data-id={{$galleries['id']}} data-placement="bottom"
                                    title="Delete">@lang('partials.delete')
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
