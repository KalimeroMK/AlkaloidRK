@extends('dashboard::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.manage_posts')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.settings')}}</a> -> <a
                                href="{{route('settings.index')}}">{{trans('messages.settings')}}</a></p>
                </div>
                <div class="card-body">
                    @include('setting::partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection