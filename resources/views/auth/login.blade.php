<x-guest-layout>
    <!-- Start authentication ================================================ -->
    <main class="authentication">
        <div class="widget">
            <div class="widget-head">
                <div class="logo">
                    <img src="{{ Vite::image('users/user.jpg') }}" alt="">
                </div>
            </div>
{{--            <x-alert :message="session('status')" type="success"></x-alert>--}}
            <div class="widget-body">
                <div class="text-center mb-3">
                    <h4>Login</h4>
                </div>
                <form method="POST" action="#">
                    @csrf
                    <div class="row g-3">

                        <!-- Start user ID -->
                        <div class="col-12">
                            <label for="email" class="form-label required">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="email" value="{{ old('email') }}" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Ex: osman@mail.com" id="email" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- End user ID -->

                        <!-- Start Password -->
                        <div class="mb-12">
                            <label for="password" class="form-label required">Password</label>
                            <div class="input-group toggle-password-fill">
                                <span class="input-group-text"><i class="bi bi-unlock"></i></span>
                                <input type="password" value=""
                                       class="form-control @error('password') is-invalid @enderror" placeholder="password"
                                       name="password" id="password" required onkeydown="capsLock(event)">
                                <button type="button" class="pass-eye" onclick="show(event, password)"><i
                                        class="bi bi-eye-fill"></i></button>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <small id="capsLockText" class="d-none text-danger">Caps lock is on</small>
                        </div>
                        <!-- End Password -->


                        <!-- Start Remember checkbox -->
                        <div class="col-12">
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember"
                                       value="">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <!-- End Remember checkbox -->

                        <!-- Start Login button -->
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit"><i
                                    class="bi bi-box-arrow-in-right"></i>
                                Login</button>
                        </div>
                        <!-- End Login button -->
                    </div>

                </form>
            </div>


            <div class="widget-foot">
                <div class="text-center mt-3">
                    {{-- <p class="mb-1"><a href="auth_forgot_pass.html">I forgot my user Password</a></p>
                    <p>New to the system? <a href="auth_register.html">Sign up</a></p> --}}
                    <small class="border-top d-block mt-3 pt-2">
                        <span> © 2022 -
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </span>
                    </small>
                </div>

            </div>




        </div>
    </main>
    <!-- End authentication ================================================ -->
    @push('guestScript')
        <script>
            // Show password ===================================>
            function show(event, password) {
                let type = password.getAttribute("type");
                let eye = event.currentTarget.childNodes[0];
                if (type === "password") {
                    password.type = "text";
                    eye.classList.add("bi-eye-slash-fill");
                    eye.classList.remove("bi-eye-fill");
                } else {
                    password.type = "password";
                    eye.classList.remove("bi-eye-slash-fill");
                    eye.classList.add("bi-eye-fill");
                }
            }



            // CapsLock ===================================>
            function capsLock(event) {
                if (event.getModifierState("CapsLock")) {
                    document.getElementById("capsLockText").classList.add("d-block")
                    document.getElementById("capsLockText").classList.remove("d-none")
                } else {
                    document.getElementById("capsLockText").classList.add("d-none")
                    document.getElementById("capsLockText").classList.remove("d-block")
                }
            }
        </script>
    @endpush
</x-guest-layout>
