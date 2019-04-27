@routes

<script>
    Ziggy.defaultParameters = {
        locale: "en"
    }
</script>

<script>
    window.App = {!! json_encode([
            'signedIn' => $authUser ? true : false,
            'user'     => $authUser,
        ]) !!}
</script>

<script src="{{asset('js/app.js')}}"></script>
