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
                @if (!empty($categories))
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ trans('messages.title') }}</label>
                        <div class="col-sm-8">
                            <input id="name" class="form-control" type="text" name="title"
                                   placeholder="{{ trans('messages.enter_category_title') }}"
                                   value="{{ old('title', $category->title ?? null) }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ trans('messages.sub_category') }}</label>
                        <div class="col-sm-8">
                            <select name="parent_id" id="parent_id" class="form-control">
                                @if (!empty($category->getParentsNames()))
                                    <option value="" selected>{{ $category->getParentsNames()}}</option>
                                @else
                                    <option value="">Select category</option>
                                @endif
                                @if ($categories)
                                    @foreach ($categories as $categoryList)
                                        <option value="{{ $categoryList['id'] }}">{{ $categoryList['title'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">{{ trans('messages.title') }}</label>

                        <div class="col-sm-8">
                            <input id="title" class="form-control" type="text" name="title"
                                   placeholder="{{ trans('messages.enter_category_title') }}"
                                   value="{{ old('title', $category->title ?? null) }}"/>
                        </div>
                    </div>
                @endif
                <button style="margin-top: 3%" type="submit" class="btn btn-labeled shiny btn-warning btn-large"><i
                            class="btn-label fa fa-plus"></i>
                    Create
                </button>
            </form>
    </form>
