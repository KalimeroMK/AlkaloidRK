@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{ trans('messages.youtube_channel_url') }}</h4>
                    <p class="card-category"><a href="{{ route('dashboard') }}">{{ trans('messages.home') }}</a><a
                                href="{{ route('youtube.index') }}">->{{ trans('messages.youtube_channel_url') }}</a>
                    </p>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>@lang('partials.title')</th>
                                <th>@lang('partials.url')</th>
                                <th>@lang('messages.edit')</th>
                                <th>@lang('messages.delete')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="{{ route('youtube.create') }}">
                                        <i class="fa fa-cog fa-2x"> </i>
                                    </a>
                                </div>
                            </div>
                            @foreach ($youtubes as $youtube)
                                <tr>

                                    <td>{{ $youtube->title }}</td>
                                    <td>{{ $youtube->url }}</td>

                                    <td><span class="time"><a href="{{ route('youtube.edit', $youtube->id) }}"
                                                              class="btn btn-info">@lang('partials.edit')</a></span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('youtube.destroy',$youtube)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger "
                                                    data-id={{$youtube['id']}} data-placement="bottom"
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
