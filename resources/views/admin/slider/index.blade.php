@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.ads_section')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('sliders.index')}}">{{trans('messages.ads_section')}}</a></p>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>{{trans('messages.id')}}</th>
                                <th>{{trans('messages.title')}}</th>
                                <th>{{trans('messages.edit')}}</th>
                                <th>{{trans('messages.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="{{ route('sliders.create') }}">
                                        <i class="fa fa-cog fa-2x"> </i>
                                    </a>
                                </div>
                            </div>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td> {{$slider->id}} </td>
                                    <td> {{$slider->title}} </td>
                                    <td><a href="{{ route('sliders.edit', $slider) }}"
                                           class="btn btn-warning btn-sm">{{trans('messages.edit')}}</a>
                                    </td>
                                    <td><a data-href="{{ route('sliders.destroy', $slider) }}" data-toggle="modal"
                                           data-target="#confirm-delete"
                                           class="btn btn-danger btn-sm">{{trans('messages.delete')}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
