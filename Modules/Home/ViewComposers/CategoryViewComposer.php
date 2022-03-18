<?php

    namespace Modules\Home\ViewComposers;

    use Illuminate\View\View;
    use Modules\Category\Models\Category;

    class CategoryViewComposer
    {
        public function compose(View $view)
        {
            $view->with('categories', Category::nested());
        }
    }