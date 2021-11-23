@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.scores')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('scores.index')}}">{{trans('messages.scores')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.score.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop