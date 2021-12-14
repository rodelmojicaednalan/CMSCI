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
                      src="assets/images/boomity-white-logo.png"
                      alt="Boomity Logo"
                      height="18"
                  /></span>
                </a>
              </div>
              <div class="card-body p-4">
                <div class="text-center m-auto">
                  <img
                    src="assets/images/mail_sent.svg"
                    alt="mail sent image"
                    height="64"
                  />
                  <h4
                    class="text-dark-50 text-center mt-4 font-weight-bold"
                  ></h4>
                  <p class="text-muted mb-4">
                    A email has been send to
			<b><?php echo $email; ?></b>
                    . Please check for an email from Boomity and click on the
                    included link to reset your password.
                  </p>
                </div>

                <form action="/admin" title="Admin Dashboard">
                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit">
                      <i class="mdi mdi-home mr-1"></i> Back to Home
                    </button>
                  </div>
                </form>
              </div>
              <!-- end card-body-->
            </div>
            <!-- end card-->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end page -->
