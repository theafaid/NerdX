@extends('layouts.app')
@section('title')
Welcome to nerdx
@endsection

@section('content')
<!-- main -->
<div class="background-wrap">
    <video id="video-bg-element" preload="auto" autoplay="autoplay" loop="loop" muted="muted">
        <source src="{{asset('design/site/videos/vid-background.mp4')}}" type="video/mp4">
    </video>
</div>


<!-- /main -->
@endsection