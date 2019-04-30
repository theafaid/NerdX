@extends('layouts.app')

@section('title')
Edit {{$channel->name}}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <edit-channel :data="{{$channel}}"></edit-channel>
                </div>
            </div>
        </div>
    </section>
    <!-- /main -->
@endsection