@extends('dashboard::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{ trans('messages.score') }}</h4>
                    <p class="card-category"><a href="{{ route('dashboard') }}">{{ trans('messages.home') }}</a><a
                                href="{{ route('sliders.index') }}">->{{ trans('messages.score') }}</a></p>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>@lang('messages.team1')</th>
                                <th>@lang('messages.team2')</th>
                                <th>@lang('messages.score')</th>
                                <th>@lang('messages.edit')</th>
                                <th>@lang('messages.delete')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="{{ route('scores.create') }}">
                                        <i class="fa fa-cog fa-2x"> </i>
                                    </a>
                                </div>
                            </div>
                            @foreach ($scores as $score)
                                <tr>
                                    <td>
                                        @foreach($score->language as $type)
                                            {{ $type->pivot->team1 }}
                                        @endforeach
                                    </td>
                                    <td> @foreach($score->language as $type)
                                            {{ $type->pivot->team2 }}
                                        @endforeach</td>
                                    <td>{{ $score->team1goals }} - {{ $score->team2goals }}</td>

                                    <td><span class="time"><a href="{{ route('scores.edit', $score->id) }}"
                                                              class="btn btn-info">@lang('messages.edit')</a></span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('scores.destroy',$score)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger "
                                                    data-id={{$score['id']}} data-placement="bottom"
                                                    title="Delete">@lang('messages.delete')
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
