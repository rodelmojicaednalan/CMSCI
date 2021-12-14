<section>
  <div class="container mt-3">
    <!-- start page title -->
    <div class="row justify-content-center">
      <div class="col-12">
        <h1><?=(isset($user_obj) ? 'Member Profile Settings' : 'Member Registration')?></h1>
        <div class="page-title-box">
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <a href="/">Home</a>
              </li>
              <li class="breadcrumb-item active"><?=(isset($user_obj) ? 'Edit ' : '')?>Member Profile Settings</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end page title -->
  </div>
  <!--Begin Change Avatar Modal-->
  <div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="avatarModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload your Avatar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Upload an image in the area below. For best results, choose an image that is web compressed and is at least 350px x 350px in size. Square works best.</p>
            <form>
                <div class="form-group">
                  <label for="avatarUpload">Upload Avatar Image</label>
                  <input type="file" class="form-control-file" id="avatarUpload">
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="submit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  <!--end Modal-->
  <!-- container -->
  <div class="container mt-3 mb-3">
    <?php if(isset($user_obj)) { ?>
    <div class="row justify-content-center align-items-end mb-5">
      <div class="col col-md-10 col-lg-8">
        <div class="row align-items-center">
          <div class="col-4 col-lg-3">
            <!--Member Avatar-->
            <img
              class="mr-3 avatar avatar-xl rounded"
              src="assets/images/demo/user-2.jpg"
              alt="Member Avatar image"
            />
          </div>
          <div class="col">
            <div class="row align-items-center">
              <div class="col-md-8">
                <h2 class="mb-0"><b><?=$user_obj->user_firstname?></b> <?=$user_obj->user_lastname?></h2>
                <!--Member Name-->
                <h3>@<?=$user_obj->user_name?></h3>
                <!--Member User Name-->
                <span class="text-muted"><?=trim($user_obj->title) != '' ? $user_obj->title : ''?></span
                ><!--Member Title--><br />
                <span class="text-muted"><?=trim($user_obj->organization) != '' ? $user_obj->organization : ''?></span
                ><!--Member Organization--><br />
                <span>Skype: </span
                ><span class="text-muted"><?=trim($user_obj->skype) != '' ? '@'.$user_obj->skype : ''?></span
                ><!--Skype Organization-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
          <?php if(isset($user_obj)) { ?>
            <p>To change your public Member Profile, please make your changes below and hit save.</p>
          <?php }else{ ?>
            <p>To register for a site Member Profile, please fill out the form below and hit save.</p>
          <?php } ?>
        <!-- stats -->
              <div class="row mb-4">
                <div class="col">
                  <div class="boxed">
                    <div
                      class="row align-items-center justify-content-between p-3"
                    >
                      <div class="col-md-5 text-center text-md-left">
                        <?php if(isset($user_obj)) { ?>
                          <h4 class="mb-0"><b>Edit</b> Member Settings</h4>
                        <?php }else{ ?>
                          <h4 class="mb-0"><b>Member</b> Registration Settings</h4>
                        <?php } ?>
                      </div>

                      <?php if(isset($user_obj)) { ?>
                      <div
												class="col-md-4 text-center text-md-right mt-1 mt-md-0"
											>
											<p>
													<button type="button" class="btn btn-sm btn-primary btn-with-ico btn-rounded" data-toggle="modal" data-target="#avatarModal">
															<i class="icon-plus2"></i>Change Avatar
														</button>
													</p>
											</div>
                      <?php } ?>

                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h5 class="mb-2 fs-20 font-weight-normal">
                    General Information
                  </h5>
                  <form id="frmRegistration" action="/register" method="POST"><!--make this form work. this is setting up a new Member Profile for the first time-->
                      <?php if(isset($user_obj)){ ?>
                          <input type="hidden" name="id" value="<?=$user_obj->user_id?>" />
                      <?php } ?>

                      <div class="form-row">
                          <div class="col mb-2">
                              <div class="form-check">
                                  <input <?=isset($user_obj) && $user_obj->hide_profile == 1 ? 'checked' : ''?> class="form-check-input" type="checkbox" value="1" id="hide_profile" name="hide_profile">
                                  <label class="form-check-label" for="profileCheck1">
                                   Hide Member Profile? (Will not allow Users to see your profile if checked.)
                                  </label>
                                </div>
                          </div>
                        </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="firstName">First Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="firstName"
                            required
                            aria-describedby="firstName"
                            placeholder="Enter your Name"
                            name="user_firstname"
                            value="<?=isset($user_obj) ? $user_obj->user_firstname : ''?>"
                          />
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="lastName">Last Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="lastName"
                            required
                            aria-describedby="lastName"
                            placeholder="Enter your Last Name"
                            name="user_lastname"
                            value="<?=isset($user_obj) ? $user_obj->user_lastname : ''?>"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-2">
                            <div class="form-check">
                                <input <?=isset($user_obj) && $user_obj->hide_name == 1 ? 'checked' : ''?> class="form-check-input" type="checkbox" value="1" id="hide_name" name="hide_name">
                                <label class="form-check-label" for="nameCheck1">
                                  Hide Name?
                                </label>
                              </div>
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="col">
                          <div class="form-group">
                            <label for="lastName">Title (Optional Job or Occupation Title)</label>
                            <input
                              type="text"
                              class="form-control"
                              id="title"
                              name="title"
                              aria-describedby="title"
                              placeholder="Enter your Title"
                              value="<?=isset($user_obj) ? $user_obj->title : ''?>"
                            />
                          </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                              <label for="organization">Organization</label>
                              <input
                                type="text"
                                class="form-control"
                                id="organization"
                                name="organization"
                                aria-describedby="Organization"
                                placeholder="Organization"
                                value="<?=isset($user_obj) ? $user_obj->organization : ''?>"
                              />
                            </div>
                          </div>
                      </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="userMail">Email address</label>
                          <input
                            type="email"
                            class="form-control"
                            id="userMail"
                            name="user_email"
                            required
                            aria-describedby="userMail"
                            placeholder="somebody@example.com"
                            value="<?=isset($user_obj) ? $user_obj->user_email : ''?>"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="userskype">Skype Username</label>
                            <input
                              type="text"
                              class="form-control"
                              id="userskype"
                              name="skype"
                              aria-describedby="userskype"
                              placeholder="Optional"
                              value="<?=isset($user_obj) ? $user_obj->skype : ''?>"
                            />
                          </div>
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="col mb-2">
                          <div class="form-check">
                              <input <?=isset($user_obj) && $user_obj->disable_email_icon == 1 ? 'checked' : ''?> class="form-check-input" type="checkbox" value="1" id="disable_email_icon" name="disable_email_icon">
                              <label class="form-check-label" for="emailCheck1">
                                Disable Email Icon? (Will not allow Users to email you if checked.)
                              </label>
                            </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-2">
                            <div class="form-check">
                                <input <?=isset($user_obj) && $user_obj->subscribe_newsletter == 1 ? 'checked' : ''?> class="form-check-input" type="checkbox" value="1" id="subscribe_newsletter" name="subscribe_newsletter">
                                <label class="form-check-label" for="newsletterCheck1">
                                  Subscribe to Newsletter?
                                </label>
                              </div>
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="col">
                          <label for="username">Username on this Website</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="username">@</span>
                              </div>
                              <input
                                type="text"
                                class="form-control"
                                placeholder="MyUsername"
                                aria-label="Username"
                                name="user_name"
                                required
                                aria-describedby="username"
                                value="<?=isset($user_obj) ? $user_obj->user_name : ''?>"
                              />
                            </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                          <div class="form-group">
                              <label for="password1"><?=isset($user_obj)?'Change ':''?>Password</label>
                              <input
                        type="password"
                        id="password1"
                        name="user_password"
                        <?=isset($user_obj)?'':'required'?>
                        class="form-control"
                        value=""
                        placeholder="Enter your <?=isset($user_obj)?'Change ':''?>password"
                      />
                            </div>
                      </div>
                    </div>
                    <!--Add password match validation here-->
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Password2">Confirm Password</label>
                                <input type="password" <?=isset($user_obj)?'':'required'?> class="form-control" id="confirm-password" placeholder="Enter the same Password as above.">
                              </div>
                        </div>
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h5 class="mb-2 fs-20 font-weight-normal">
                    Optional Profile Details
                  </h5>
                  <!--Make this a Froala Editor-->
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="aboutTextarea1"
                            >About / Member Bio</label
                          >
                          <textarea
                            class="form-control"
                            id="aboutTextarea1"
                            name="user_about_me"
                            rows="10"
                            placeholder="Enter a short public bio or something about yourself. (This is optional.) "
                          ><?=isset($user_obj) ? $user_obj->user_about_me : ''?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="quoteTextarea2"
                              >Favorite Quote / Statement</label
                            >
                            <textarea
                              class="form-control"
                              id="quoteTextarea2"
                              name="favorite_quote"
                              rows="5"
                              placeholder="Enter your favorite quote, saying, or life philosophy here. (This is optional.) "
                            ><?=isset($user_obj) ? $user_obj->favorite_quote : ''?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-row mb-2">
                          <div class="col">
                            <div class="form-group">
                              <label for="userCity">Quote Attribution</label>
                              <input
                                type="text"
                                class="form-control"
                                id="quote2"
                                name="quote_attr"
                                aria-describedby="quote2"
                                placeholder="Who said the quote above?"
                                value="<?=isset($user_obj) ? $user_obj->quote_attr : ''?>"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="form-row mb-3">
                          <div class="col">
                        <div class="form-group">
                          <label for="inputAddress">Address</label>
                          <input type="text" class="form-control" name="address_line1" id="inputAddress" placeholder="1234 Main Street" value="<?=isset($user_obj) ? $user_obj->address_line1 : ''?>">
                        </div>
                        <div class="form-group">
                          <label for="inputAddress2">Address 2</label>
                          <input type="text" class="form-control" id="inputAddress2" name="address_line2" placeholder="Apartment, Suite or PO Box" value="<?=isset($user_obj) ? $user_obj->address_line2 : ''?>">
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city" placeholder="City" value="<?=isset($user_obj) ? $user_obj->city : ''?>">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <input type="hidden" id="hidstate" value="<?=isset($user_obj) ? $user_obj->state : ''?>">
                            <select id="inputState" name="state" class="form-control">
                              <option selected>Choose your State</option>
                              <optgroup label="US States">
                              <option value="AL">AL</option>
                              <option value="AK">AK</option>
                              <option value="AR">AR</option>
                              <option value="AZ">AZ</option>
                              <option value="CA">CA</option>
                              <option value="CO">CO</option>
                              <option value="CT">CT</option>
                              <option value="DC">DC</option>
                              <option value="DE">DE</option>
                              <option value="FL">FL</option>
                              <option value="GA">GA</option>
                              <option value="HI">HI</option>
                              <option value="IA">IA</option>
                              <option value="ID">ID</option>
                              <option value="IL">IL</option>
                              <option value="IN">IN</option>
                              <option value="KS">KS</option>
                              <option value="KY">KY</option>
                              <option value="LA">LA</option>
                              <option value="MA">MA</option>
                              <option value="MD">MD</option>
                              <option value="ME">ME</option>
                              <option value="MI">MI</option>
                              <option value="MN">MN</option>
                              <option value="MO">MO</option>
                              <option value="MS">MS</option>
                              <option value="MT">MT</option>
                              <option value="NC">NC</option>
                              <option value="NE">NE</option>
                              <option value="NH">NH</option>
                              <option value="NJ">NJ</option>
                              <option value="NM">NM</option>
                              <option value="NV">NV</option>
                              <option value="NY">NY</option>
                              <option value="ND">ND</option>
                              <option value="OH">OH</option>
                              <option value="OK">OK</option>
                              <option value="OR">OR</option>
                              <option value="PA">PA</option>
                              <option value="RI">RI</option>
                              <option value="SC">SC</option>
                              <option value="SD">SD</option>
                              <option value="TN">TN</option>
                              <option value="TX">TX</option>
                              <option value="UT">UT</option>
                              <option value="VT">VT</option>
                              <option value="VA">VA</option>
                              <option value="WA">WA</option>
                              <option value="WI">WI</option>
                              <option value="WV">WV</option>
                              <option value="WY">WY</option>
                              </optgroup>
                              <optgroup label="US Outlying Territories">
                              <option value="AS">AS</option>
                              <option value="GU">GU</option>
                              <option value="MP">MP</option>
                              <option value="PR">PR</option>
                              <option value="UM">UM</option>
                              <option value="VI">VI</option>
                              </optgroup>
                              <optgroup label="US Armed Forces">
                              <option value="AA">AA</option>
                              <option value="AP">AP</option>
                              <option value="AE">AE</option>
                              </optgroup>

                            </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip" name="user_zip" value="<?=isset($user_obj) ? $user_obj->user_zip : ''?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row mb-4">
                      <!--this is where the Google Recaptcha should go-->
                      <div class="col-6 btn-demo mt-10">
                          <button type="button" class="btn btn-secondary btn-cancel" id="cancel_registration">
                              Cancel
                            </button>
                        <button class="btn btn-primary" id="submit">
                          Save
                        </button>
                      </div>
                    </div>
                  </form>
                </div><!--end col-->
              </div><!--end row-->
            </div><!--end col-->
          </div><!--end row-->
        </div><!--end container-->
        <!-- / tab -->
        <!-- / post -->
      </div>
    </div><!--end row-->
  </div>
  <!--end container-->
</section>
