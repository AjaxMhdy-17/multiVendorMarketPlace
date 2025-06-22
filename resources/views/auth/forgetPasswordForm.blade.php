 <section class="wsus__login padding-y-120">
     <div class="container">
         <div class="row">
             <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                 <div class="wsus__login_area">
                     <h2> {{ __('Forgot Password!') }}</h2>
                     <!-- Session Status -->
                     <x-auth-session-status class="mb-4" :status="session('status')" />
                     <form method="POST" action="{{ route('password.email') }}" class="mt-4">
                         @csrf
                         <div class="row">
                             <div class="col-xl-12">
                                 <div class="wsus__login_imput">
                                     <label>{{ __('Email') }}</label>
                                     <input type="email" placeholder="Email" id="email" name="email"
                                         value="{{ old('email') }}" required autofocus />
                                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                 </div>
                             </div>
                             <div class="col-xl-12">
                                 <div class="wsus__login_imput mb-0">
                                     <button type="submit" class="btn btn-main btn-lg"> {{ __('Sent') }}</button>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>
