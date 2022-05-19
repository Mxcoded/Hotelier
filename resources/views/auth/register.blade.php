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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div>
                    <div class="text-center pt-3 pb-3">
                        <span class="db"><img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo"></span>
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <!-- Form -->
                    <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <x-input id="name" class="form-control form-control-lg" type="text" name="name"
                                        :value="old('name')" required autofocus placeholder="Username" />
                                </div>
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-email fs-4"></i></span>
                                    </div>
                                    <x-input id="email" class="form-control form-control-lg" type="email" name="email"
                                        :value="old('email')" required placeholder="Email" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                                                class="mdi mdi-lock fs-4"></i></span>
                                    </div>
                                    <x-input id="password" class="form-control form-control-lg" type="password" name="password"
                                        required autocomplete="new-password" placeholder="Password" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white h-100" id="basic-addon2"><i
                                                class="mdi mdi-lock fs-4"></i></span>
                                    </div>
                                    <x-input id="password_confirmation" class="form-control form-control-lg" type="password"
                                        name="password_confirmation" required placeholder="Confirm Password" />
                                </div>
                            </div>
                        </div>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3 d-grid">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">
                                            Sign Up
                                        </button>
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