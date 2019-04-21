@component('layouts.components.auth')
    @slot('pageTitle')
        Login
    @endslot

    @slot('title')
        <i class="fa fa-sign-in-alt"></i> Login to your account
    @endslot

    @slot('body')
        <login-form></login-form>
        <div class="divider">
            <span>Don't have an account?</span>
        </div>
        <a class="btn btn-secondary btn-block" href="{{route('register')}}" role="button">Register</a>
        <a class="btn btn-link btn-block" href="{{route('password.request')}}">Forgot your password ?</a>
    @endslot
@endcomponent
