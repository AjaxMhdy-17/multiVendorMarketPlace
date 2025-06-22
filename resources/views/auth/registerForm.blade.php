{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<section class="wsus__login padding-y-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                <div class="wsus__login_area">
                    <h2>{{ __('Welcome back!') }}</h2>
                    <p>{{ __('Sign up to continue ') }}</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                                        required autofocus autocomplete="name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" placeholder="Email" type="email" name="email"
                                        value="{{ old('email') }}" required autocomplete="username">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label>{{ __('Password') }}</label>
                                    <input type="password" placeholder="Password" type="password" name="password"
                                        required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <input type="password" placeholder="Confirm Password" id="password_confirmation"
                                        type="password" name="password_confirmation" required
                                        autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <button type="submit" class="btn btn-main btn-lg">{{ __('Sign Up') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="create_account mt-2">{{ __('have an account ?') }} <a
                            href="{{ route('login') }}">{{ __('Sign In') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
