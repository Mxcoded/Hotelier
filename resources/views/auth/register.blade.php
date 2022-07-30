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
                        <a class="icon" href="/">
                            <img class="img-fluid" width="100" height="80" src="{{ asset('frontend/medico/img/logo_esi.jpg') }}"
                                alt="logo">
                            {{-- <span class="db"><img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo"></span>
                            --}}
                        </a>
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <!-- Form -->
                    <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row pb-4">
                            <div class="col-6">
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
                                <!-- telephone -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-phone fs-4"></i></span>
                                    </div>
                                    <x-input id="telephone" class="form-control form-control-lg" type="number" name="telephone"
                                        :value="old('telephone')" required placeholder="Téléphone" />
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

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <x-input id="nom" class="form-control form-control-lg" type="text" name="nom"
                                        :value="old('nom')" required autofocus placeholder="Nom de famille" />
                                </div>
                                <!-- nom -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <x-input id="prenom" class="form-control form-control-lg" type="text" name="prenom"
                                        :value="old('prenom')" required autofocus placeholder="prenom" />
                                </div>
                                <!-- prenom -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <input class="form-control form-control-lg" list="sexes" name="sexe" value="{{old('sexe') }}"
                                        placeholder="Choix du sexe">
                                    <datalist id="sexes" name="sexe">
                                        <option value="masculin"></option>
                                        <option value="feminin"></option>
                                    </datalist>
                                </div>
                                <!-- sexe -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <input class="form-control form-control-lg" list="profiles" name="profile" value="{{old('profile') }}"
                                        placeholder="étudiant ou professeur ?">
                                    <datalist id="profiles" name="profile">
                                        <option value="étudiant"></option>
                                        <option value="professeur"></option>
                                    </datalist>
                                </div>
                                <!-- profile -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <x-input id="specialite" class="form-control form-control-lg" type="text" name="specialite"
                                        :value="old('specialite')" autofocus placeholder="Spécialité :ne rien remplire si vous etes étudiant" />
                                </div>
                                <!-- specialite -->
                            </div>
                        </div>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Déjà en enregistré?') }}
                        </a>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3 d-grid">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">
                                            Enregistrer
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