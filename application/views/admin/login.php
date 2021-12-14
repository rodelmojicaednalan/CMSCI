
    <div class="account-pages mt-5 mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card border">
              <!-- Logo -->
              <div class="card-header pt-4 pb-4 text-center bg-primary">
                <a href="/" class="text-success">
                  <span
                    ><img
                      src="/assets/images/boomity-white-logo.png"
                      alt="Boomity Logo"
                      height="18"
                  /></span>
                </a>
              </div>
              <div class="card-body p-4">
                <div class="text-center mt-2 mb-4"></div>
                <div class="text-center w-75 m-auto">
                  <h4 class="text-dark-50 text-center mt-0 font-weight-bold">
                    Login
                  </h4>
                  <p class="text-muted mb-4">
                    Enter your email address and password to access your site's
                    admin panel.
                  </p>
                </div>

               <form id="frmlogin" action="/admin/login" method="POST" class="needs-validation" novalidate>
                  <div class="form-group">
                    <label for="emailaddress">Email address</label>
                    <input
                      class="form-control"
                      type="email"
                      id="emailaddress"
                      name="emailaddress"
                      required="yes"
                      placeholder="Enter your email"
                    />
                    <div class="invalid-feedback">
                      Please enter your email address.
                    </div>
                  </div>


                  <div class="form-group">
                    <a
                      href="/forgotpassword"
                      class="text-muted float-right"
                      ><small>Forgot your password?</small></a
                    >
                    <label for="password">Password</label>
                    <input
                      class="form-control"
                      type="password"
                      required="yes"
                      id="password"
                      name="password"
                      placeholder="Enter your password"
                    />
                    <div class="invalid-feedback">
                      Please enter your password.
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="checkbox-signin"
                        checked
                      />
                      <label class="custom-control-label" for="checkbox-signin"
                        >Remember me</label
                      >
                    </div>
                  </div>
                  <!--THIS IS WHERE THE GOOGLE RECAPTCHA WILL NEED TO GO-->
                  <div class="form-group mb-0 text-center">
                    <button id="btnlogin" class="btn btn-primary" type="submit">
                      Log In
                    </button>
                  </div>
                </form>
              </div>
              <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
              <div class="col-12 text-center">
                <p class="text-muted">
                  Don't have an account?
                  <a
                    href="http://boomity.com/request-demo"
                    title="Contact Us"
                    class="text-dark ml-1"
                    ><b>Contact Us</b></a
                  >
                </p>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end page -->
