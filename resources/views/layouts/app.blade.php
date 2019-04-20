@include('layouts.partials._header')
@include('layouts.partials._nav')
@include('layouts.partials._messages')
<div id="app">
    @yield('content')
</div>
@if(! request()->segment(1) == null)
@include('layouts.partials._footer')
@endif