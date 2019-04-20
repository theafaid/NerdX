@extends('layouts.app')

@section('title')
    Add new channel
@endsection

@section('content')
    <!-- main -->
    <section class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="forums.html">Forums</a></li>
                <li class="active">Forum Create</li>
            </ol>
        </div>
    </section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <create-channel></create-channel>
            </div>
        </div>
    </div>
</section>
<!-- /main -->
@endsection