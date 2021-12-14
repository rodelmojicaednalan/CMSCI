<div
	class="modal fade"
	id="messageModal"
	tabindex="-1"
	role="dialog"
	aria-labelledby="messageModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-end">
				<button
					type="button"
					class="close"
					data-dismiss="modal"
					aria-label="Close"
				>
					<span aria-hidden="true" class="icon-x"></span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="modal-title text-md-left" id="messageModalLabel">
					New message
				</h5>
				<form>
					<div class="form-group">
						<label for="Username" class="col-form-label"
							>To Member Username:</label
						>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="Username">@</span>
							</div>
							<!--This should autofill with THIS Members Username-->
							<input
								type="text"
								class="form-control"
								placeholder="MikeDoe"
								aria-label="Username"
								aria-describedby="basic-addon1"
							/>
						</div>
					</div>
					<div class="form-group">
						<label for="subjectInput">Subject:</label>
						<input
							type="text"
							class="form-control"
							id="subjectInput"
							placeholder="Subject"
						/>
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label"
							>Message:</label
						>
						<textarea
							class="form-control"
							id="message-text"
							rows="10"
						></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button
					type="button"
					class="btn btn-sm btn-secondary"
					data-dismiss="modal"
				>
					Close
				</button>
				<button type="button" class="btn btn-sm btn-primary">
					Send message
				</button>
			</div>
		</div>
	</div>
</div>
<!--End New Message Modal-->
<main role="main">
	<!--divider-->
	<section>
		<div class="container mt-3">
			<!-- start page title -->
			<div class="row justify-content-center">
				<div class="col-12">
					<h1>Member Profile</h1>
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item">
									<a href="/">Home</a>
								</li>
								<li class="breadcrumb-item active">Member Profile</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- end page title -->
		</div>
		<!-- container -->
		<div class="container mb-3">
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
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<!-- stats -->
					<div class="row gutter-1 mb-2">
						<div class="col-6 col-md-4 col-lg-3">
							<div class="equal">
								<div class="boxed bg-primary text-white">
									<div class="equal-header">
										<b class="h2">9</b>
									</div>
									<div class="equal-footer">
										<span class="text-muted">topics added</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-md-4 col-lg-3">
							<div class="equal">
								<div class="boxed">
									<div class="equal-header">
										<b class="h2">14</b>
									</div>
									<div class="equal-footer">
										<span class="text-muted">topic comments</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-md-4 col-lg-3">
							<div class="equal">
								<div class="boxed">
									<div class="equal-header">
										<b class="h2">9</b>
									</div>
									<div class="equal-footer">
										<span class="text-muted">blog posts</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-md-4 col-lg-3">
							<div class="equal">
								<div class="boxed">
									<div class="equal-header">
										<b class="h2">
											<!--This should be the Member's email address IF they have opted in to be contacted.-->
											<a
												href="mailto:<?=$user_obj->user_email?>"
												class="btn btn-ico btn-sm rounded btn-outline-light text-primary"
												title="Email Me"
												><i class="icon-envelope fs-28"></i></a
										></b>
										<a
											href="#"
											class="btn btn-sm btn-outline-primary"
											role="button"
											aria-pressed="true"
											data-toggle="modal"
											data-target="#messageModal"
											><i class="fas fa-comment fs-28"></i
										></a>
									</div>
									<div class="equal-footer">
										<span class="text-muted">contact</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- / stats -->

					<!-- post -->
					<div class="row mb-1">
						<div class="col">
							<article class="card">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-md-12 text-right">
											<small class="text-mute"
												>Last Edited:
												<!--Make this dynamic for when this profile was last edited.--><?=date("m/d/Y", strtotime($user_obj->user_lastactivity))?></small
											>
										</div>
									</div>
								</div>
								<div class="card-body overflow-hidden">
									<h4 class="card-title">About Me</h4>
									<p class="card-text">
										<?=$user_obj->user_about_me?>
									</p>
									
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col text-right"></div>
									</div>
								</div>
							</article>
						</div>
					</div>
					<!-- / post -->

					<!-- post -->
					<div class="row">
						<div class="col">
							<article class="card">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-6">
											<div class="media align-items-center">
												<img
													class="avatar rounded mr-1"
													src="assets/images/demo/user-2.jpg"
													alt="Image"
												/>
												<div class="media-body">
													<span class="mt-0">Favorite Quote</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body overflow-hidden">
									<blockquote class="blockquote">
										<p class="mb-0">
											<?=$user_obj->favorite_quote?>
										</p>
										<footer class="blockquote-footer">
											<cite title="Source Title"><?=$user_obj->quote_attr?></cite>
										</footer>
									</blockquote>
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col">
											<a
												href="mailto:<?=$user_obj->user_email?>"
												class="btn btn-ico btn-sm rounded btn-outline-light text-primary"
												><i class="icon-envelope fs-22"></i
											></a>
										</div>
									</div>
								</div>
							</article>
						</div>
					</div>
					<!-- / post -->
				</div>
			</div>
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
