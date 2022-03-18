@if ($tag->exists)
    <form class="form-horizontal" method="POST" action="{{ route('tags.update', $tag) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('tags.store') }}"
                  enctype="multipart/form-data">
                @method('post')
                @csrf
                @endif
                <div class="form-group row">
                    <label for="code" class="col-sm-3 control-label">{{ trans('messages.title') }}</label>
                    <div class="col-8">
                        <input id="name" class="form-control" type="text" name="title"
                               placeholder="{{ trans('messages.title') }}"
                               value="{{ old('title', $tag->title ?? null) }}"/>

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
    </form>
