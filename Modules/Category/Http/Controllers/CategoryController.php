<?php

    namespace Modules\Category\Http\Controllers;

    use Exception;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Session;
    use Illuminate\View\View;
    use Modules\Category\Http\Requests\Store;
    use Modules\Category\Http\Requests\Update;
    use Modules\Category\Models\Category;
    use Modules\Language\Models\Language;

    class CategoryController extends Controller
    {
        /**
         * CategoryController constructor.
         */
        public function __construct()
        {
            $this->middleware('permission:categories-list');
            $this->middleware('permission:categories-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:categories-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:categories-delete', ['only' => ['destroy']]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
         */
        public function index()
        {
            $categories = Category::getTree();
            if (is_null($categories)) {
                return redirect()->route('categories.create');
            }

            return view('category::index', compact('categories'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create()
        {
            $categories = Category::getTree();
            $category   = new Category();
            $languages  = Language::all();

            return view('Category::edit', compact('categories', 'category', 'languages'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  Store  $request
         *
         * @return RedirectResponse
         */
        public function store(Store $request): RedirectResponse
        {
            $title     = $request['title'];
            $parent_id = $request['parent_id'];
            if ( ! is_null($parent_id)) {
                $category = Category::create(["title" => $title, "parent_id" => $parent_id]);
                Session::flash('flash_message', 'Category successfully created!');

                return redirect()->route('categories.edit', $category);
            }
            $category = Category::create(["title" => $title]);
            Session::flash('flash_message', 'Category successfully created!');

            return redirect()->route('categories.edit', $category);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Category  $category
         *
         * @return Application|Factory|View
         */
        public function edit(Category $category)
        {
            $languages  = Language::all();
            $categories = Category::getTree();

            return view('category::edit', compact('category', 'categories', 'languages'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  Update  $request
         * @param  Category  $category
         *
         * @return RedirectResponse
         */
        public function update(Update $request, Category $category): RedirectResponse
        {
            $category->update($request->all());
            Session::flash('flash_message', 'Category successfully created!');

            return redirect()->back();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  Category  $category
         *
         * @return RedirectResponse
         * @throws Exception
         */
        public function destroy(Category $category): RedirectResponse
        {
            $category->delete();
            Session::flash('flash_message', 'Category successfully deleted!');

            return redirect()->route('categories.index');
        }

    }
