@extends('dashboard::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.home')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('users.index')}}">{{trans('messages.pages')}}</a></p>
                </div>
                <div class="card-body">
                    @include('user::user.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection