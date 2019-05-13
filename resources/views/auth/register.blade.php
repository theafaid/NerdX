@component('layouts.components.auth')
    @slot('pageTitle')
        Register
    @endslot

    @slot('title')
        <i class="fa fa-user-plus"></i> Register a new account
    @endslot

    @slot('body')
        <registration-form></registration-form>
    @endslot
@endcomponent
