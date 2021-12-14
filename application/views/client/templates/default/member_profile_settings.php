<section>
	<div class="container mt-3">
		<!-- start page title -->
		<div class="row justify-content-center">
			<div class="col-12">
				<h1>Member Profile Settings</h1>
				<div class="page-title-box">
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item">
								<a href="index.html">Home</a>
							</li>
							<li class="breadcrumb-item active">Edit Member Profile Settings</li>
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
						<h5 class="modal-title">Change your Avatar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Upload a new image in the area below. For best results, choose an image that is web compressed and is at least 350px x 350px in size. Square works best.</p>
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
								<h2 class="mb-0"><b>Michael</b> Doe</h2>
								<!--Member Name-->
								<h3>@MikeDoe</h3>
								<!--Member User Name-->
								<span class="text-muted">Senior Visual Designer</span
								><!--Member Title-->
								<br />
								<span class="text-muted">Case Western University</span
								><!--Member Organization--><br />
								<span>Skype: </span
								><span class="text-muted">@MikeyDoe</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-8">
					<p>To change your public Member Profile, please make your changes below and hit save.</p>
				<!-- stats -->
							<div class="row mb-4">
								<div class="col">
										<a class="btn btn-primary btn-sm mb-2" href="discussions-bookmarked.html" role="button">
												View Bookmarked Discussions
										</a>

									<div class="boxed">
										<div
											class="row align-items-center justify-content-between p-3"
										>
											<div class="col-md-5 text-center text-md-left">
												<h4 class="mb-0"><b>Edit</b> Member Settings</h4>
											</div>
											<div
												class="col-md-4 text-center text-md-right mt-1 mt-md-0"
											>
											<p>
													<button type="button" class="btn btn-sm btn-primary btn-with-ico btn-rounded" data-toggle="modal" data-target="#avatarModal">
															<i class="icon-plus2"></i>Change Avatar
														</button>
													</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<h5 class="mb-2 fs-20 font-weight-normal">
										General Information
									</h5>
									<form><!--the information in this form should be prefilled with the User's existing information. If they have none for a field, then the field should be blank.-->
											<div class="form-row">
													<div class="col mb-2">
															<div class="form-check">
																	<input class="form-check-input" type="checkbox" value="" id="profileCheck1">
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
														type="email"
														class="form-control"
														id="firstName"
														aria-describedby="firstName"
														placeholder=""
													/>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label for="lastName">Last Name</label>
													<input
														type="email"
														class="form-control"
														id="lastName"
														aria-describedby="lastName"
														placeholder=""
													/>
												</div>
											</div>
										</div>
										<div class="form-row">
												<div class="col mb-2">
														<div class="form-check">
																<input class="form-check-input" type="checkbox" value="" id="nameCheck1">
																<label class="form-check-label" for="nameCheck1">
																	Hide Name?
																</label>
															</div>
												</div>
											</div>
										<div class="form-row">
											<div class="col">
													<div class="form-group">
														<label for="title">Title (Optional Job or Occupation Title)</label>
														<input
															type="text"
															class="form-control"
															id="title"
															aria-describedby="title"
															placeholder="Title"
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
																aria-describedby="Organization"
																placeholder="Organization"
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
														aria-describedby="userMail"
														placeholder=""
													/>
												</div>
											</div>
										</div>
										<div class="form-row">
												<div class="col">
													<div class="form-group">
														<label for="userskype">Skype Username</label>
														<input
															type="email"
															class="form-control"
															id="userskype"
															aria-describedby="userskype"
															placeholder="Optional"
														/>
													</div>
												</div>
											</div>
										<div class="form-row">
											<div class="col mb-2">
													<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="emailCheck1">
															<label class="form-check-label" for="emailCheck1">
																Disable Email Icon? (Will not allow Users to email you if checked.)
															</label>
														</div>
											</div>
										</div>
										<div class="form-row">
												<div class="col mb-2">
														<div class="form-check">
																<input class="form-check-input" type="checkbox" value="" id="newsletterCheck1">
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
																placeholder=""
																aria-label="Username"
																aria-describedby="username"
															/>
														</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col">
													<div class="form-group">
															<label for="password1">Change Password</label>
															<input
												type="password"
												id="password1"
												class="form-control"
												value="password"
											/>
														</div>
											</div>
										</div>
										<!--Add password match validation here-->
										<div class="form-row">
												<div class="col">
														<div class="form-group">
																<label for="Password2">Confirm New Password</label>
																<input type="password" class="form-control" id="confirm-password" placeholder="">
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
														rows="10"
													></textarea>
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
															rows="5"
														></textarea>
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
																aria-describedby="quote2"
																placeholder=""
															/>
														</div>
													</div>
												</div>
												<div class="form-row mb-3">
													<div class="col">
												<div class="form-group">
													<label for="inputAddress">Address</label>
													<input type="text" class="form-control" id="inputAddress" placeholder="">
												</div>
												<div class="form-group">
													<label for="inputAddress2">Address 2</label>
													<input type="text" class="form-control" id="inputAddress2" placeholder="">
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="inputCity">City</label>
														<input type="text" class="form-control" id="inputCity">
													</div>
													<div class="form-group col-md-4">
														<label for="inputState">State</label>
														<select id="inputState" class="form-control">
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
														<input type="text" class="form-control" id="inputZip">
													</div>
												</div>
											</div>
										</div>
										<div class="form-row mb-4">
											<!--this is where the GOogle recaptcha will go-->
											<div class="col-8 btn-demo mt-10">
													<button class="btn btn-secondary" id="cancel">
															Cancel
														</button>
												<button class="btn btn-primary" id="submit">
													Save Changes
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

<!--end section-->
<section>
	<div class="container">
		<div class="row justify-content-left"></div>
	</div>
</section>
<!--end section-->
