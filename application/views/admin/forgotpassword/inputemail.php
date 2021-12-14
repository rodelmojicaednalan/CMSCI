    <div class="account-pages mt-5 mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card border">
              <!-- Boomity Logo -->
              <div class="card-header pt-4 pb-4 text-center bg-primary">
                <a href="/" class="text-success">
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
                  <h4 class="text-dark-50 text-center mt-0 font-weight-bold">
                    Forgot Password
                  </h4>
                  <p class="text-muted mb-4">
                    Type in the email that you use for your Administrator
                    priviledges. You will receive an email with a link to reset
                    your password. If you do not receive this email, please
                    <a
                      href="http://boomity.com/request-demo"
                      title="Boomity: Contact Us"
                      >contact us.</a
                    >
                  </p>
                </div>
                <!--ADD PHP FORM VALIDATION HERE-ACTION SHOULD SEND AN EMAIL-->
                <form method="post" class="needs-validation" novalidate>
                  <div class="form-group mb-3">
                    <label for="emailaddress">Email address</label>
                    <input
                      class="form-control"
                      type="email"
                      name="emailaddress"
                      id="emailaddress"
                      required=""
                      placeholder="Enter your email"
                    />
                  </div>
                  <!--THIS IS WHERE THE GOOGLE RECAPTCHA WILL NEED TO GO-->
                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit">
                      Reset Password
                    </button>
                    <!--UPON SUBMIT THE PAGE admin-confirm-mail.html should appear next-->
                  </div>
                </form>
              </div>
              <!-- end card-body-->
            </div>
            <!-- end card -->
            <div class="row mt-3">
              <div class="col-12 text-center">
                <p class="text-muted">
                  Back to
                  <a href="/admin" class="text-dark ml-1"
                    ><b>Log In</b></a
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
