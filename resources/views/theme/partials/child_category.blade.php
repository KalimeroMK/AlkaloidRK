<li class="dropdown-item dropdown ">
    <a href="{{ route('categories', $child_category->slug) }}" class="dropdown-link js-stoppropag"
       data-toggle="dropdown">{{ $child_category->title }}</a>
    @if ($child_category->categories)
        @foreach ($child_category->categories as $childCategory)
            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">

                @include('theme.partials.child_category', ['child_category' => $childCategory])
            </ul>

        @endforeach
    @endif
</li>
