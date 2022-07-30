<x-master-auth>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader" style="display: none;">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="
            auth-wrapper
            d-flex
            no-block
            justify-content-center
            align-items-center
            bg-dark
          ">

            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <a href="/">
                            <span class="db"><img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo"></span>
                        </a>
                    </div>
                    @if(isset($notification))
                    <section id="" class="mt-2">
                        @include("inc.message-validation")
                    </section>
                    @endif
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <!-- Form -->
                    <form class="form-horizontal mt-3" id="loginform" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>

                                    <x-input id="email" class="form-control form-control-lg" type="email" name="email"
                                        :value="old('email')" required autofocus placeholder="Email" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                                                class="mdi mdi-lock fs-4"></i></span>
                                    </div>
                                    <x-input id="password" class="form-control form-control-lg" type="password" name="password"
                                        required autocomplete="current-password" />
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                        <button class="btn btn-success float-end text-white" type="submit">
                                            Login
                                        </button>
                                        @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            <i class="mdi mdi-lock fs-4 me-1"></i>
                                            {{ __('Mot de passe oublié?') }}
                                        </a>
                                        <a class="nav-link underline text-sm text-warning" href="{{ route('register') }}">
                                            <i class="mdi mdi-account-plus fs-3 me-1"></i>Pas
                                            de compte?</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
</x-master-auth>