    <div class="account-pages mt-5 mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card border">
              <!-- Logo -->
                <div class="card-header pt-4 pb-4 text-center bg-primary">
                <a href="index.html" class="text-success">
                  <span
                    ><img
                      src="assets/images/boomity-white-logo.png"
                      alt="Boomity Logo"
                      height="18"
                  /></span>
                </a>
              </div>
              <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                    <div class="text-center mt-2 mb-4">
                      </div>
                  <h4 class="text-dark-50 text-center mt-0 font-weight-bold">
                    Password Reset
                  </h4>
                  <p class="text-muted mb-4">
                      Enter your new password below. Your password
                      must be 8-20 characters long, contain letters, numbers, one special character, and no spaces.
                  </p>
                </div>

                <form action="" method="post" class="needs-validation" novalidate>
                  <div class="form-group">
                    <div class="form-group">
                      <label for="password">New Password</label>
                      <input
                        class="form-control"
                        type="password"
                        required="yes"
                        id="password"
                        placeholder="Enter your new password"
			name="newpassword"
                      />
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">
                        <ul>
                          <li id="letter" class="invalid">
                            You need <strong>one letter</strong>
                          </li>
                          <li id="capital" class="invalid">
                            You Need <strong>one capital letter</strong>
                          </li>
                          <li id="number" class="invalid">
                            You need <strong>one number</strong>
                          </li>
                          <li id="length" class="invalid">
                            You need <strong>8 characters</strong>
                          </li>
                          <li id="space" class="invalid">
                            <strong>
                              Use a special character
                              [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong
                            >
                          </li>
                        </ul>
                        Please enter a password.
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password">New Password Again</label>
                      <input
                        class="form-control"
                        type="password"
                        required="yes"
                        id="password"
                        placeholder="Retype your new password"
                      />
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">
                        Your passwords do not match.
                      </div>
                    </div>
                  </div>
                  <!--**THIS IS WHERE THE GOOGLE RECAPTCHA WILL NEED TO GO-->
                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
              <div class="row mt-3">
                <div class="col-12 text-center">
                  <p class="text-muted">
                    <a href="admin-login.html" class="text-dark ml-1"
                      ><b>Log In</b></a
                    >
                  </p>
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


