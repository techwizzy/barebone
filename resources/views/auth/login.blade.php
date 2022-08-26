<x-guest-layout>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />


        <form method="POST" action="{{ route('login') }}"  class="p-2">
            @csrf

            <div class="form-group">
                <label for="emailaddress">Email address</label>
                <input class="form-control" type="email" id="emailaddress" name="email" placeholder="john@deo.com" value="{{old('email')}}">
            </div>
            <div class="form-group">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"  class="text-muted float-right">Forgot your password?</a>
                @endif
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
            </div>

            <div class="form-group mb-4 pb-3">
                <div class="custom-control custom-checkbox checkbox-primary">
                    <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin">
                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
            </div>
        </form>
</x-guest-layout>
