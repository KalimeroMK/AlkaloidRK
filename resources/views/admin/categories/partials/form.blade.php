@if($category->exists)
    <form class="form-horizontal" method="POST" action="{{ route('categories.update',$category) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                @if ($categories)
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Lang:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        @foreach($languages as $key => $language)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $key === 0 ? 'active' : '' }}"
                                                   href="#{{$language->name}}"
                                                   data-toggle="tab">
                                                    <i class="material-icons">cloud</i>{{$language->name}}
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                @foreach($languages as $key => $language)
                                    <div class="tab-pane {{ $key === 0 ? 'active' : '' }}" id="{{$language->name}}">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="title"
                                                   name="title[]"
                                                   value="@foreach($category->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("title", $lang->pivot->title ?? null)!!} @endif @endforeach">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control"
                                           placeholder="language_id"
                                           name="language_id[]" value="{{$language->id}}">
                                @endforeach
                            </div>
                        </div>
                        <label for="cars">@lang('messages.parent_category')</label>
                        <select name="parent_id" class="form-control">
                            @foreach($categories as $categoryList)
                                <option value="{{$categoryList['id']}}">{{ $categoryList['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Lang:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        @foreach($languages as $key => $language)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $key === 0 ? 'active' : '' }}"
                                                   href="#{{$language->name}}"
                                                   data-toggle="tab">
                                                    <i class="material-icons">cloud</i>{{$language->name}}
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                @foreach($languages as $key => $language)
                                    <div class="tab-pane {{ $key === 0 ? 'active' : '' }}" id="{{$language->name}}">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="title"
                                                   name="title[]"
                                                   value="@foreach($category->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("title", $lang->pivot->title ?? null)!!} @endif @endforeach">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control"
                                           placeholder="language_id"
                                           name="language_id[]" value="{{$language->id}}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn purple" type="submit">@lang('messages.save')</button>
                        </div>
                    </div>
                </div>
            </form>
    </form>
