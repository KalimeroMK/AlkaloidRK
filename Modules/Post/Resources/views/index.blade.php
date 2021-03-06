@extends('dashboard::layouts.master')
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
                                <th>{{trans('messages.title')}}</th>
                                <th>{{trans('messages.gallery')}}</th>
                                <th>{{trans('messages.category')}}</th>
                                <th>{{trans('messages.views')}}</th>
                                <th>{{trans('messages.published_on')}}</th>
                                <th>{{trans('messages.status')}}</th>
                                <th>{{trans('messages.edit')}}</th>
                                <th>{{trans('messages.delete')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="{{ route('posts.create') }}">
                                        <i class="fa fa-cog fa-2x"> </i>
                                    </a>
                                </div>
                            </div>
                            @foreach($posts as $post)
                                <tr>
                                    <td> {{$post->id}} </td>
                                    <td>
                                        <img src="{{ $post->imageUrl }}" style="width:100px;"/>
                                    </td>
                                    <td><a href="/{{$post->slug}}" target="_blank">
                                            @foreach($post->language as $type)
                                                {{ $type->pivot->title }}
                                            @endforeach
                                        </a></td>
                                    <td><span class="time"><a href="{{ route('addGallery', $post->id) }}"
                                                              class="btn btn-info">{{trans('messages.image_gallery')}}</a></span>
                                    </td>
                                    <td> @foreach($post->categories as $category)
                                            {{$category->title}}
                                        @endforeach </td>
                                    <td> {{$post->views}} </td>
                                    <td> {{$post->created_at}} </td>

                                    @if($post->status == config('constants.STATUS_PUBLISHED'))
                                        <td>
                                            <label class="label label-success label-sm">{{trans('messages.published')}}</label>
                                        </td>
                                    @endif

                                    @if($post->status == config('constants.STATUS_HIDDEN'))
                                        <td>
                                            <label class="label label-warning label-sm">{{trans('messages.hidden')}}</label>
                                        </td>
                                    @endif

                                    <td><a href="{{ route('posts.edit', $post) }}"
                                           class="btn btn-warning btn-sm">{{trans('messages.edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" data-toggle="modal"
                                                    data-target="#confirm-delete"
                                                    class="btn btn-danger btn-sm">{{trans('messages.delete')}}</button>
                                        </form>
                                    </td>
                                </tr>


                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                {{$posts->links('vendor.pagination.bootstrap-4')}}

            </div>
        </div>
    </div>
@stop
