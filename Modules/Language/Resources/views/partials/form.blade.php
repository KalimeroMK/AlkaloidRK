@if($language->exists)
    <form class="form-horizontal" method="POST" action="{{ route('languages.update',$language) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('languages.create') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                <label for="title">@lang('partials.title')</label>
                <input id="name" class="form-control" type="number" name="team1goals"
                       placeholder="{{ trans('messages.name') }}"
                       value="{{ old('name', $language->name ?? null) }}"/>

                <label for="title">@lang('partials.code')</label>

                <input id="name" class="form-control" type="number" name="team1goals"
                       placeholder="{{ trans('messages.country') }}"
                       value="{{ old('country', $language->country ?? null) }}"/>

                <label for="title">@lang('partials.iso')</label>
                <input id="name" class="form-control" type="number" name="team1goals"
                       placeholder="{{ trans('messages.iso') }}"
                       value="{{ old('iso', $language->iso ?? null) }}"/>
                <!-- Hidden inputs -->
            </form>
    </form>