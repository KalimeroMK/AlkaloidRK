<!DOCTYPE html>
<html lang="en-gb">
<head>
    @include('feed::links')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alkaloid RK</title>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="{{ asset('theme/css/akslider.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('theme/css/donate.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('theme/css/theme.css') }}" rel="stylesheet" type="text/css"/>
    @yield('style')
    <script type='text/javascript'
            src='http://ajax.googleapis.com/ajax/libs/mootools/1.3.1/mootools-yui-compressed.js'></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
</head>
<body class="tm-isblog">
<div class="preloader">
    <div class="loader"></div>
</div>
<div class="over-wrap">
    @include('theme.header')
    @yield('content')
    @include('theme.footer')
</div>
<script type="text/javascript" src="{{ asset('theme/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/uikit.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/SimpleCounter.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/components/grid.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/components/slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/components/slideshow.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/components/slideset.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/components/sticky.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/components/lightbox.js') }}"></script>
<script type="text/javascript" src="public/theme/js/isotope.pkgd.min.js"></script>

<script src="{{ asset('theme/js/theme.js') }}"></script>
<script type="text/javascript">
    new SimpleCounter("countdown4", 1447448400, {
        'continue': 0,
        format: '{D} {H} {M} {S}',
        lang: {
            d: {
                single: 'day',
                plural: 'days'
            }, //days
            h: {
                single: 'hr',
                plural: 'hrs'
            }, //hours
            m: {
                single: 'min',
                plural: 'min'
            }, //minutes
            s: {
                single: 'sec',
                plural: 'sec'
            } //seconds
        },
        formats: {
            full: "<span class='countdown_number' style='color:  '>{number} </span> <span class='countdown_word' style='color:  '>{word}</span> <span class='countdown_separator'>:</span>", //Format for full units representation
            shrt: "<span class='countdown_number' style='color:  '>{number} </span>" //Format for short unit representation
        }
    });
</script>

</body>

</html>