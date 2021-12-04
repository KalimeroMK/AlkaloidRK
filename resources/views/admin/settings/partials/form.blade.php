@if($setting->exists)
    <form class="form-horizontal" method="POST" action="{{ route('settings.update',$setting) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('settings.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-offset-1 col-sm-offset-1 col-lg-10 col-sm-12 col-xs-12">

                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                            <div class="widget">
                                <div class="widget-header bordered-bottom bordered-warning">
                                    <span class="widget-caption">Подесувања</span>
                                </div>
                                <div class="widget-body">
                                    <div class="col-12">
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
                                                        <div class="tab-pane {{ $key === 0 ? 'active' : '' }}"
                                                             id="{{$language->name}}">
                                                            <table class="table">
                                                                <tbody>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Title"
                                                                           name="title[]"
                                                                           value="@foreach($setting->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("title", $lang->pivot->title ?? null)!!} @endif @endforeach">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Title"
                                                                           name="address[]"
                                                                           value="@foreach($setting->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("address", $lang->pivot->address ?? null)!!} @endif @endforeach">
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea class="ckeditor" id="{{$language->name}}"
                                                                              name="description[]">@foreach($setting->language as $lang)
                                                                            @if($lang->pivot->language_id == $language->id) {{old("description", $lang->pivot->description ?? null)}} @endif @endforeach
                          </textarea>
                                                                </div>
                                                            </table>
                                                        </div>
                                                        <input type="hidden" class="form-control"
                                                               placeholder="language_id"
                                                               name="language_id[]" value="{{$language->id}}">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img-refferal">
                                        @if(!!$setting->logo)
                                            <img class="img-responsive"
                                                 src="/assets/img/logo/thumbnails/{{ $setting->logo }}"
                                                 alt="{{ $setting->title }}"/>
                                        @endif
                                    </div>
                                    <br/>
                                    <div id="horizontal-form">
                                        <div class="fileinput text-center fileinput-new col-12"
                                             data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-circle">
                                                <img src="@if(empty($setting->featured_image)){{ asset('images/image_placeholder.jpg')}}@else {{ old('featured_image', $setting->imageUrl ?? null) }}@endif"
                                                     alt="image">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle"
                                                 style=""></div>
                                            <div>
                                        <span class="btn btn-round btn-rose btn-file">
                <span class="fileinput-new">Add Photo</span>
                <span class="fileinput-exists">Change</span>
                <input type="hidden" value="" name="featured_image"><input type="file"
                                                                           name="featured_image">
                <div class="ripple-container">
                </div>
            </span>
                                                <br>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    <i class="fa fa-times"></i> Remove
                                                    <div class="ripple-container">
                                                        <div class="ripple-decorator ripple-on ripple-out"
                                                             style="left: 62px; top: 25.6719px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Главна адреса: </label>
                                        <input name="mainurl" type="text" class="form-control"
                                               value="{{ $setting->mainurl }}">
                                    </div>
                                    @if ($errors->has('mainurl')) <p
                                            class="alert alert-danger">{{ $errors->first('mainurl') }}</p> @endif


                                    <div class="form-group">
                                        <label>Email адреса: </label>
                                        <input name="email" type="email" class="form-control"
                                               value="{{ $setting->email }}">
                                    </div>
                                    @if ($errors->has('email')) <p
                                            class="alert alert-danger">{{ $errors->first('email') }}</p> @endif
                                    <div class="form-group">
                                        <label>Телефон: </label>
                                        <input name="phone" type="text" class="form-control"
                                               value="{{ $setting->phone }}">
                                    </div>
                                    @if ($errors->has('phone')) <p
                                            class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif

                                    <div class="form-group">
                                        <label>Twitter: </label>
                                        <input name="twitter" type="text" class="form-control"
                                               value="{{ $setting->twitter }}">
                                    </div>
                                    @if ($errors->has('twitter')) <p
                                            class="alert alert-danger">{{ $errors->first('twitter') }}</p> @endif

                                    <div class="form-group">
                                        <label>Facebook: </label>
                                        <input name="facebook" type="text" class="form-control"
                                               value="{{ $setting->facebook }}">
                                    </div>
                                    @if ($errors->has('facebook')) <p
                                            class="alert alert-danger">{{ $errors->first('facebook') }}</p> @endif

                                    <div class="form-group">
                                        <label>Skype: </label>
                                        <input name="skype" type="text" class="form-control"
                                               value="{{ $setting->skype }}">
                                    </div>
                                    @if ($errors->has('skype')) <p
                                            class="alert alert-danger">{{ $errors->first('skype') }}</p> @endif

                                    <div class="form-group">
                                        <label>LinkedIn: </label>
                                        <input name="linkedin" type="text" class="form-control"
                                               value="{{ $setting->linkedin }}">
                                    </div>
                                    @if ($errors->has('linkedin')) <p
                                            class="alert alert-danger">{{ $errors->first('linkedin') }}</p> @endif

                                    <div class="form-group">
                                        <label>Google Plus: </label>
                                        <input name="gplus" type="text" class="form-control"
                                               value="{{ $setting->gplus }}">
                                    </div>
                                    @if ($errors->has('gplus')) <p
                                            class="alert alert-danger">{{ $errors->first('gplus') }}</p> @endif

                                    <div class="form-group">
                                        <label>Youtube: </label>
                                        <input name="youtube" type="text" class="form-control"
                                               value="{{ $setting->youtube }}">
                                    </div>
                                    @if ($errors->has('youtube')) <p
                                            class="alert alert-danger">{{ $errors->first('youtube') }}</p> @endif

                                    <div class="form-group">
                                        <label>Flickr: </label>
                                        <input name="flickr" type="text" class="form-control"
                                               value="{{ $setting->flickr }}">
                                    </div>
                                    @if ($errors->has('flickr')) <p
                                            class="alert alert-danger">{{ $errors->first('flickr') }}</p> @endif
                                    <div class="form-group">
                                        <label>Pinterest: </label>
                                        <input name="pinterest" type="text" class="form-control"
                                               value="{{ $setting->pinterest }}">
                                    </div>
                                    @if ($errors->has('pinterest')) <p
                                            class="alert alert-danger">{{ $errors->first('pinterest') }}</p> @endif
                                </div>
                                <button type="submit" class="btn btn-labeled shiny btn-warning btn-large"><i
                                            class="btn-label fa fa-plus"></i> Обнови
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </form>
    </form>

@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor', options);
    </script>

@endsection