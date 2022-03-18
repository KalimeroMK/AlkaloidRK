@if ($score->exists)
    <form class="form-horizontal" method="POST" action="{{ route('scores.update', $score) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('scores.store') }}"
                  enctype="multipart/form-data">
                @method('post')
                @csrf
                @endif
                <div class="form-group">
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
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            @foreach($languages as $key => $language)
                                <div class="tab-pane {{ $key === 0 ? 'active' : '' }}" id="{{$language->name}}">
                                    <table class="table">
                                        <tbody>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="title time 1"
                                                   name="team1[]"
                                                   value="@foreach($score->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("team1", $lang->pivot->team1 ?? null)!!} @endif @endforeach">
                                            <input type="text" class="form-control" placeholder="title time 2"
                                                   name="team2[]"
                                                   value="@foreach($score->language as $lang) @if($lang->pivot->language_id == $language->id) {!!old("team2", $lang->pivot->team2 ?? null)!!} @endif @endforeach">

                                        </div>
                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" class="form-control"
                                       placeholder="language_id"
                                       name="language_id[]" value="{{$language->id}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input id="name" class="form-control" type="number" name="team1goals"
                                   placeholder="{{ trans('messages.team1score') }}"
                                   value="{{ old('team1goals', $score->team1goals ?? null) }}"/>

                            <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle">
                                    <img src="@if(empty($score->team1logo)){{ asset('images/image_placeholder.jpg')}}@else {{ old('team1logo', $score->imageUrl1 ?? null) }}@endif"
                                         alt="image">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                                <div>
                <span class="btn btn-round btn-rose btn-file">
                    <span class="fileinput-new">Add Photo</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="hidden" value="" name="team1logo"><input type="file"
                                                                          name="team1logo">
                    <div class="ripple-container">
                    </div>
                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <input id="name" class="form-control" type="number" name="team2goals"
                                   placeholder="{{ trans('messages.team2score') }}"
                                   value="{{ old('team2goals', $score->team2goals ?? null) }}"/>
                            <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle">
                                    <img src="@if(empty($score->team2logo)){{ asset('images/image_placeholder.jpg')}}@else {{ old('team12ogo', $score->imageUrl1 ?? null) }}@endif"

                                         alt="image">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                                <div>
                <span class="btn btn-round btn-rose btn-file">
                    <span class="fileinput-new">Add Photo</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="hidden" value="" name="team2logo"><input type="file"
                                                                          name="team2logo">
                    <div class="ripple-container">
                    </div>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="name" class="form-control" type="date" name="date"
                           placeholder="{{ trans('messages.date') }}"
                           value="{{ old('date', $score->date ?? null) }}"/>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9" style="margin-top: 2%">
                            <button class="btn purple" type="submit"
                                    style="margin-top: 5%">@lang('partials.create')
                        </div>
                    </div>
                </div>
            </form>

    </form>
