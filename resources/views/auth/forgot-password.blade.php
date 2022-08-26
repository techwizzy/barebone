<x-guest-layout>


        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="emailaddress">Email address</label>
                <input class="form-control" type="email" id="emailaddress" name="email" placeholder="john@deo.com" value="{{old('email')}}">
            </div>


            <div class="mt-4 text-center">
                <button class="btn btn-primary btn-block" type="submit">  {{ __('Email Password Reset Link') }} </button>
            </div>
        </form>

</x-guest-layout>
