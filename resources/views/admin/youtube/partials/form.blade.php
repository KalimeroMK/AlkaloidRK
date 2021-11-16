@if ($youtube->exists)
    <form class="form-horizontal" method="POST" action="{{ route('youtube.update', $youtube) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('youtube.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                <div class="container-fluid">
                    @include('admin.partials.notify')
                    <div class="row">
                        <div class="col-8">
                            <label for="title">@lang('messages.title')</label>
                            <div class="form-group">
                                <input id="title" class="form-control" type="text" name="title"
                                       placeholder="{{ trans('messages.title') }}"
                                       value="{{ old('title', $youtube->title ?? null) }}"/>
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="title">@lang('messages.url')</label>
                            <div class="form-group">
                                <input id="title" class="form-control" type="text" name="url"
                                       placeholder="{{ trans('messages.url') }}"
                                       value="{{ old('url', $youtube->url ?? null) }}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hidden inputs -->
                <button class="btn purple" type="submit" style="margin-top: 5%">@lang('partials.create')
            </form>
