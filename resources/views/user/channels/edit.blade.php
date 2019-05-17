@extends('layouts.app')

@section('title')
Edit {{$channel->name}}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @if(count($errors))
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    @endif
                    <form method="POST" action="{{route('channels.update', $channel->slug)}}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PATCH')}}
                        <input type="text" name="name" value="{{$channel->name}}">
                        <input type="text" name="slug" value="{{$channel->slug}}">
                        <input type="text" name="description" value="{{$channel->description}}">
                        <input type="file" name="logo">
                        <input type="file" name="background">
                        <input type="submit" value="Edit">
                    </form>
                    {{--<edit-channel :data="{{$channel}}"></edit-channel>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- /main -->
@endsection