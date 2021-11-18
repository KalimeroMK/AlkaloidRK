@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{ trans('messages.brands') }}</h4>
                    <p class="card-category"><a href="{{ route('dashboard') }}">{{ trans('messages.home') }}</a><a
                                href="{{ route('sliders.index') }}">->{{ trans('messages.brands') }}</a></p>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>@lang('messages.image')</th>
                                <th>@lang('messages.title')</th>
                                <th>@lang('messages.url')</th>
                                <th>@lang('messages.edit')</th>
                                <th>@lang('messages.delete')</th>
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
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>
                                        <img src="{{ $slider->imageUrl }}" style="width:100px;"/>
                                    </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->url }}</td>

                                    <td><span class="time"><a href="{{ route('sliders.edit', $slider->id) }}"
                                                              class="btn btn-info">@lang('partials.edit')</a></span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('sliders.destroy',$slider)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger "
                                                    data-id={{$slider['id']}} data-placement="bottom"
                                                    title="Delete">@lang('partials.delete')
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
