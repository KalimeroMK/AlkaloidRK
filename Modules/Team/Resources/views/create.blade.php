@extends('dashboard::layouts.master')
@section('content')
    <div class="content" style="margin-top: 7%">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.team')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('teams.index')}}">{{trans('messages.team')}}</a></p>
                </div>
                <div style="padding: 2%">
                    @include('team::partials.form')
                </div>
            </div>
        </div>
@stop