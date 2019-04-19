@include('layouts.partials.header')
@include('layouts.partials.nav')
@include('layouts.partials.messages')
<div id="app">
    @yield('content')
</div>
@if(! request()->segment(1) == null)
@include('layouts.partials.footer')
@endif