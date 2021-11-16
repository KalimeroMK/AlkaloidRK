<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white"
         data-image="{{ asset('images/sidebar-1.jpg') }}">
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{trans('messages.dashboard')}}</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('categories.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('categories.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>{{trans('messages.categories')}}</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('posts.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('posts.index')}}">
                        <i class="material-icons">subject</i>
                        <span class="title">{{trans('messages.posts')}}</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed('tags.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tags.index') }}">
                        <i class="material-icons">label</i>
                        <span class="title">{{trans('messages.tags')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('users.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="material-icons">person</i>
                        <span class="title">{{trans('messages.users')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('sliders.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('sliders.index')}}">
                        <i class="material-icons">image</i>
                        <span class="title">Slider</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('youtube.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('youtube.index')}}">
                        <i class="material-icons">image</i>
                        <span class="title">YOUTUBE</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
