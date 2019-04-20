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

                <form class="tab-content p-t-20" method="POST" action="{{route('channels.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-pane active" id="forum" role="tabpanel">
                        <!-- form -->
                        <div class="form-group">
                            <label for="title">Channel Name</label>
                            <input type="text" class="form-control" name="name" id="title" placeholder="Enter a unique channel name">
                        </div>
                        <div class="form-group">
                            <label for="description">Describe your channel</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="logo">Channel Logo</label>
                            <input class="form-control" type="file" name="logo">
                        </div>
                    </div>

                    <div class="m-t-30">
                        <button class="btn btn-primary btn-rounded btn-shadow float-right" type="submit" name="save">Create my channel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /main -->
@endsection