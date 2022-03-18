<?php

    namespace Modules\Dashboard\Http\Controllers;

    use Illuminate\Contracts\View\Factory;
    use Illuminate\Routing\Controller;
    use Illuminate\View\View;
    use Modules\Category\Models\Category;
    use Modules\Post\Models\Post;
    use Modules\User\Models\User;

    class DashboardController extends Controller
    {
        /**
         * @return Factory|View
         */
        public function index()
        {
            $posts_count = Post::count();
            $users_count = User::count();
            $categories  = Category::count();
            $posts       = Post::whereStatus(1)->limit(5)->get();

            return view('dashboard::index', compact('posts_count', 'users_count', 'categories', 'posts'));
        }
    }