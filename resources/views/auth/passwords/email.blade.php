@component('layouts.components.auth')
    @slot('pageTitle')
        Register
    @endslot

    @slot('title')
        <i class="fa fa-sign-in-alt"></i> {{ __('Reset Password') }}
    @endslot

    @slot('body')
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter you email address" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                    @endif
                </div>
            </div>

            <div class="form-group row text-center">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    @endslot
@endcomponent