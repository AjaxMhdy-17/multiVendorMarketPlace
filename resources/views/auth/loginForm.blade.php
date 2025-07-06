<section class="wsus__login padding-y-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                <div class="wsus__login_area">
                    <h2> {{ __('Welcome back!') }} </h2>
                    <p> {{ __('Sign in to Continue!') }} </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" id="email" placeholder="Email" name="email"
                                        value="{{ old('email') }}" required autofocus autocomplete="username">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label> {{ __('Password') }} </label>
                                    <input type="password" id="password" type="password" name="password" required
                                        autocomplete="current-password" placeholder="Password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput wsus__login_check_area">
                                    <div class="form-check">
                                        <input id="remember_me" class="form-check-input" type="checkbox"
                                            name="remember">
                                        <label class="form-check-label" for="remember_me">
                                            {{ __('Remeber Me') }}
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}">{{ __('Forget Password ?') }}</a>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <button type="submit" class="btn btn-main btn-lg">{{ __('Sign in') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="or"><span>or</span></p>
                    <ul class="d-flex">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                    <p class="create_account">{{ __('Dont’t have an aceount ?') }} <a href="{{ route('register') }}">
                            {{ __('Sign Up') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
