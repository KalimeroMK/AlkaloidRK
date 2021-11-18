@extends('layouts.master')
@section('content')
    <div id="PlaceToPutTable">

        <iframe id="iframe" src="https://macedoniahandball.com.mk/tabelirezultati/" style="display:hidden;"></iframe>
    </div>

    <script>
        const iframe = document.getElementById("iframe");
        const div = document.getElementById("PlaceToPutTable");
        div.innerHTML = iframe.contentWindow.document.getElementById("elementor-tab-title-635").innerHTML;
    </script>
@endsection