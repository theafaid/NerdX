@include('layouts.partials._header')

@include('layouts.partials._nav')

@include('layouts.partials._breadcrumbs')

@include('layouts.partials._messages')

<div id="app">
    <create-channel></create-channel>
    @yield('content')
</div>

@include('layouts.partials._footer')