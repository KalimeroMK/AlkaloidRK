@extends('dashboard::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.tag')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.source')}}</a> -> <a
                                href="{{route('tags.index')}}">{{trans('messages.tag')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('tag::partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection