@extends('layouts.app')

@section('title')
    {{$channel->name}}
@endsection

@section('content')
    <channel :data="{{$channel}}"></channel>
@endsection