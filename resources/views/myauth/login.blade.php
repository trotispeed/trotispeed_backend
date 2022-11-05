
@include('css')
<body>
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pe-md-0">
                                <div class="auth-side-wrapper"  style="background-image: url({{asset('images/login/scooter.png')}}; ) !important;">

                                </div>
                            </div>
                            <div class="col-md-8 ps-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a class="noble-ui-logo d-block mb-2">TrotiSpeed<span>Dashboard</span></a>
                                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                    @if (session('user_found'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('user_found') }}
                                        </div>
                                    @endif
                                    <form class="forms-sample" action="dashboard-login" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email address</label>
                                            <input name="email" type="email" class="form-control" id="userEmail" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control" id="userPassword"
                                                   autocomplete="current-password" placeholder="Password">
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="authCheck">
                                            <label class="form-check-label" for="authCheck">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>

                                        </div>
                                        <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('js')
</body>
</html>
