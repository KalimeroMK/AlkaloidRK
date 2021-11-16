<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\Email\SendRequest;
    use App\Mail\ContactMail;
    use App\Models\Slider;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Mail;

    class HomeController extends Controller
    {
        /**
         * @return Application|Factory|View
         */
        public function index()
        {
            $sliders = Slider::all()->take(3);
            return view('theme.index', compact('sliders'));
        }

        /**
         * @return Application|Factory|View
         */
        public function contact()
        {
            return view('theme.contact');
        }

        /**
         * @param  SendRequest  $request
         * @return RedirectResponse
         */
        public function contactPost(SendRequest $request): RedirectResponse
        {
            $data = $request->all();
            Mail::to('test@test.com')->send(new ContactMail($data));

            return redirect('contact')
                ->with('success_msg', 'Thanks for your message. We\'ll be in touch.');
        }

        /**
         * @return Application|Factory|View
         */
        public function aboutUs()
        {
            return view('theme.about');
        }

    }

