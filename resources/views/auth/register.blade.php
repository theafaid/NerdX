@component('layouts.components.auth')
    @slot('pageTitle')
        Register
    @endslot

    @slot('title')
        <i class="fa fa-user-plus"></i> Register a new account
    @endslot

    @slot('body')
        <registeration-form></registeration-form>
    @endslot
@endcomponent
