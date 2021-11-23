@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>{{trans('messages.id')}}</th>
                                <th>{{trans('messages.featured_image')}}</th>
                                <th>{{trans('messages.name')}}</th>
                                <th>{{trans('messages.lastname')}}</th>
                                <th>{{trans('messages.position')}}</th>
                                <th>{{trans('messages.nationality')}}</th>
                                <th>{{trans('messages.edit')}}</th>
                                <th>{{trans('messages.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="{{ route('teams.create') }}">
                                        <i class="fa fa-cog fa-2x"> </i>
                                    </a>
                                </div>
                            </div>
                            @foreach($teams as $team)
                                <tr>
                                    <td> {{$team->id}} </td>
                                    <td>
                                        <img src="{{ $team->imageUrl }}" style="width:100px;"/>
                                    </td>
                                    <td><a href="/{{$team->slug}}" target="_blank">
                                            @foreach($team->language as $type)
                                                {{ $type->pivot->name }}
                                            @endforeach
                                        </a></td>
                                    </td>
                                    <td><a href="/{{$team->slug}}" target="_blank">
                                            @foreach($team->language as $type)
                                                {{ $type->pivot->lastname }}
                                            @endforeach
                                        </a></td>
                                    </td>
                                    <td><a href="/{{$team->slug}}" target="_blank">
                                            @foreach($team->language as $type)
                                                {{ $type->pivot->position }}
                                            @endforeach
                                        </a></td>
                                    </td>
                                    <td><a href="/{{$team->slug}}" target="_blank">
                                            @foreach($team->language as $type)
                                                {{ $type->pivot->nationality }}
                                            @endforeach
                                        </a></td>
                                    </td>
                                    <td><a href="{{ route('teams.edit', $team) }}"
                                           class="btn btn-warning btn-sm">{{trans('messages.edit')}}</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('teams.destroy',$team)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger "
                                                    data-id={{$team['id']}} data-placement="bottom"
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
                {{$teams->links()}}

            </div>
        </div>
    </div>
@stop
