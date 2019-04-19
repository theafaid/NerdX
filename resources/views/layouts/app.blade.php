@include('layouts.partials.header')
@include('layouts.partials.nav')
@include('layouts.partials.messages')
<div id="app">
    @yield('content')
</div>
@include('layouts.partials.footer')