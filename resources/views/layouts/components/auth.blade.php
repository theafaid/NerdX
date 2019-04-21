@extends('layouts.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('content')
    <!-- main -->
    <section class="bg-image bg-image-sm" style="background-image: url('{{asset('design/site/img/bg1.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-4 mx-auto">
                    <div class="card m-b-0">
                        <div class="card-header">
                            <h4 class="card-title">{{$title}}</h4>
                        </div>
                        <div class="card-block">
                            {{$body}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /main -->
@endsection