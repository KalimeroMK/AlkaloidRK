<?php

    namespace App\Http\ViewComposers;

    use App\Models\Category;
    use Illuminate\View\View;

    class CategoryViewComposer
    {
        public function compose(View $view)
        {
            $view->with('categories', Category::nested());
        }
    }