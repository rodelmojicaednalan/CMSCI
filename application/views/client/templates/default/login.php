<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="auth-fluid">
          <!--Auth fluid left content -->
          <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
              <div class="card-body">
                <!-- Logo -->
                <!--
                <div class="auth-brand text-center text-lg-left">
                  <a href="index.html">
                    <span
                      ><img
                        src="assets/images/logo-dark.png"
                        alt=""
                        height="18"
                    /></span>
                  </a>
                </div>
                -->
                <!-- title-->
                <h4 class="mt-0">Member Sign In</h4>
                <p class="text-muted mb-4">
                  Enter your email address and password to access your
                  account.
                </p>

                <div class="text-center mt-2 mb-4"><p class="text-danger"><?=$invalid == 1 ? 'Invalid Email or Password.' : '' ?></p></div>
                <!-- form -->
                <form id="frmlogin" action="/login" method="POST" class="needs-validation" novalidate>
                  <div class="form-group">
                    <label for="member-email">Email address</label>
                    <input
                      class="form-control"
                      type="email"
                      id="member-email"
                      required="yes"
                      name="user_email"
                      placeholder="Enter your email"
                      value="<?=isset($_GET['email']) ? $_GET['email'] : '' ?>"
                    />
                  </div>
                  <div class="form-group">
                    <a
                      href="/forgot-password"
                      class="text-muted float-right"
                      ><small>Forgot your password?</small></a
                    >
                    <label for="password">Password</label>
                    <input
                      class="form-control"
                      type="password"
                      name="user_password"
                      required="yes"
                      id="password"
                      placeholder="Enter your password"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="checkbox-signin"
                      />
                      <label
                        class="custom-control-label"
                        for="checkbox-signin"
                        >Remember me</label
                      >
                    </div>
                  </div>
                  <div class="form-group mb-0 text-center">
                    <!--Add Google Recaptcha here-->
                    <button
                      class="btn btn-primary btn-block mt-10"
                      type="submit"
                    >
                      <i class="fas fa-sign-in-alt"></i> Log In
                    </button>
                  </div>
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt mt-4">
                  <p class="text-muted">
                    Don't have an account?
                    <a
                      href="/register"
                      class="text-dark ml-1"
                      ><b>Sign Up</b></a
                    ><br />
                    <small
                      >Site Membership is dependent upon approval.</small
                    >
                  </p>
                </footer>
              </div>
              <!-- end .card-body -->
            </div>
            <!-- end .align-items-center.d-flex.h-100-->
          </div>
          <!-- end auth-fluid-form-box-->
        </div>
        <!-- end auth-fluid-->
      </div>
      <!--end col-->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
  <!--end container-->
</section>
