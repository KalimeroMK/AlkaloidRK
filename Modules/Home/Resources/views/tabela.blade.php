@extends('home::layouts.master')
@section('content')
    @foreach ($crawler as $href)
        {{ $href }}
    @endforeach
@endsection

@section('scripts')

@endsection