@if ($slider->exists)
    <form class="form-horizontal" method="POST" action="{{ route('sliders.update', $slider) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('sliders.store') }}"
                  enctype="multipart/form-data">
                @method('post')
                @csrf
                @endif
                <div class="form-group row">
                    <label for="code" class="col-sm-3 control-label">{{ trans('messages.title') }}</label>
                    <div class="col-8">
                        <input id="name" class="form-control" type="text" name="title"
                               placeholder="{{ trans('messages.title') }}"
                               value="{{ old('title', $slider->title ?? null) }}"/>
                        <input id="name" class="form-control" type="text" name="url"
                               placeholder="{{ trans('messages.url') }}"
                               value="{{ old('title', $slider->url ?? null) }}"/>
                    </div>
                    <div class="fileinput text-center fileinput-new col-4" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-circle">
                            <img src="@if(empty($slider->featured_image)){{ asset('images/image_placeholder.jpg')}}@else {{ old('featured_image', $slider->imageUrl ?? null) }}@endif"
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
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9" style="margin-top: 2%">
                                <button class="btn purple" type="submit" style="margin-top: 5%">@lang('partials.create')
                            </div>
                        </div>
                    </div>
                </div>
            </form>
