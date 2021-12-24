@if($team->exists)
    <form class="form-horizontal" method="POST" action="{{ route('teams.update',$team) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('teams.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                @include('admin.layouts.notify')
                <div class="row">
                    <div class="col-md-8">
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
                                            <table class="table">
                                                <tbody>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="name"
                                                           name="name[]"
                                                           value="@foreach($team->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("name", $lang->pivot->name ?? null)!!} @endif @endforeach">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="lastname"
                                                           name="lastname[]"
                                                           value="@foreach($team->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("lastname", $lang->pivot->lastname ?? null)!!} @endif @endforeach">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="nationality"
                                                           name="nationality[]"
                                                           value="@foreach($team->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("nationality", $lang->pivot->nationality ?? null)!!} @endif @endforeach">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="position"
                                                           name="position[]"
                                                           value="@foreach($team->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("position", $lang->pivot->position ?? null)!!} @endif @endforeach">
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" placeholder="date"
                                                           name="birthday"
                                                           value="{!!old("birthday", $team->birthday ?? null)!!}">
                                                </div>
                                                <textarea class="ckeditor" id="{{$language->name}}"
                                                          name="bio[]">@foreach($team->language as $lang)
                                                        @if($lang->pivot->language_id == $language->id) {{old("bio", $lang->pivot->bio ?? null)}} @endif @endforeach
                          </textarea>
                                                </tbody>
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
                    <div class="form-group col-4">

                        <h4 class="title"></h4>
                        <div class="fileinput text-center fileinput-new col-12" data-provides="fileinput">
                            <div class="fileinput-new thumbnail img-circle">
                                <img src="@if(empty($team->imageUrl)){{ asset('theme/images/team/FLP_1848.png')}}@else {{ old('featured_image', $team->imageUrl ?? null) }}@endif"
                                     alt="image">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
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
                </div>{{--row--}}
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            {{ Form::submit(trans('messages.save'), ['name' => 'submit', 'class'=>'btn purple' ]) }}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                @section('scripts')
                    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('editor', options);
                    </script>
    @endsection
