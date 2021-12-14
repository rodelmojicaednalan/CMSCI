<!--divider-->
<section>
	<div class="container mb-3">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="">
					<h1 class="mb-3">Member Messages</h1>
				</div>
			</div>
			<!--end col for headline-->
		</div>
		<!--end row-->
	</div>
	<!--end container-->
</section>
<!--New Message Modal-->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
					<div class="modal-header justify-content-end">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="icon-x"></span>
							</button>
						</div>
				<div class="modal-body">
						<h5 class="modal-title text-md-left" id="messageModalLabel">New message <i class="far fa-comment"></i></h5>
					<form>
						<div class="form-group">
								<label for="Username" class="col-form-label">To Member Username:</label>
								<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="Username">@</span>
										</div>
										<input
											type="text"
											class="form-control"
											placeholder="Username"
											aria-label="Username"
											aria-describedby="basic-addon1"
										/>
									</div>
						</div>
						<div class="form-group">
								<label for="subjectInput">Subject:</label>
								<input type="text" class="form-control" id="subjectInput" placeholder="Subject">
							</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Message:</label>
							<textarea class="form-control" id="message-text" rows="10"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-sm btn-primary">Send message</button>
				</div>
			</div>
		</div>
	</div>
	<!--End New Message Modal-->
	<!--Reply Message Modal-->
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
					<div class="modal-header justify-content-end">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="icon-x"></span>
							</button>
						</div>
				<div class="modal-body">
						<h5 class="modal-title text-md-left" id="messageModalLabel">Reply to Message: <i class="far fa-comment"></i></h5>
					<form>
						<div class="form-group">
								<label for="Username" class="col-form-label">To Member Username:</label>
								<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="Username">@</span>
										</div>
										<!--Make this dynamic so that the Member User name that is being replied to is in the Username Field.-->
										<input
											type="text"
											class="form-control"
											placeholder="@MikeDoe"
											aria-label="Username"
											aria-describedby="basic-addon1"
										/>
									</div>
						</div>
						<div class="form-group">
								<label for="subjectInput">Subject:</label><!--this should be dynamic and should be the subject of the Message they are replying to after the RE: -->
								<input type="text" class="form-control" id="subjectInput" placeholder="RE: Did You Get the Results of the Member Survey?">
							</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Message:</label>
							<textarea class="form-control" id="message-text" rows="10"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-sm btn-primary">Send message</button>
				</div>
			</div>
		</div>
	</div>
	<!--End Reply Message Modal-->
<!--begin discussion board section-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-10 mb-2">
				<div class="row justify-content-between">
				<div class="col-md-5 text-md-left">
						<h3>Inbox</h3>
						<span class="">
							<p>Use this page to view and send messages to other Members.&nbsp;</p>
						</span>
				</div>
				<div class="col-md-5 text-md-right">
													<h5 class="card-title">Search Messages</h5>
													<div class="app-search mb-3">
														<form>
															<!--Make this an active search for the Discussions-->
															<div class="input-group">
																<input
																	type="text"
																	class="form-control"
																	placeholder="Search..."
																/>
																<!--Results displayed on Discussions Search Results page-->
																<div class="input-group-append">
																	<button class="btn btn-sm btn-dark" type="submit">
																		<i class="fas fa-search"></i>
																		Submit
																	</button>
																</div>
															</div>
														</form>
													</div>
												</div>
				 </div>
				 <a href="#"
				 class="btn btn-sm btn-outline-primary"
				 role="button"
				 aria-pressed="true"
				 data-toggle="modal" data-target="#messageModal"
				 >Send a Message&nbsp;<i class="far fa-comment"></i
					></a
			 >
			<div class="p-3 bg-white shadow-sm">
					<div class="text-right">
							<div class="chartjs-chart">
								<div class="dropdown">
									<button
										class="btn btn-outline-dark btn-sm dropdown-toggle"
										type="button"
										id="dropdownMenuButton"
										data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false"
									>
									Viewing Options
									</button>
									<div
										class="dropdown-menu bg-light"
										aria-labelledby="dropdownMenuButton"
									>
										<a class="dropdown-item" href="#">View 15 Per Page</a>
										<a class="dropdown-item" href="#">View 25 Per Page</a>
										<a class="dropdown-item" href="#"
											>View 35 Per Page</a
										>
									</div>
								</div>
							</div>
							<!--end dropdown-->
					</div>
					<h4 class="border-bottom border-gray pb-2 mb-0">
							Messages From Members
					</h4>

					<!--begin member messages -->
					<div class="accordion-group accordion-group-highlight" data-accordion-group>
							<div class="accordion" data-accordion>
								<div class="accordion-control" data-control>
										<div class="media text-muted pt-1">
												<div class="media align-items-center">
													<img
														src="assets/images/demo/user-2.jpg"
														alt="Avatar"
														class="avatar avatar-sm rounded mr-3"
													/>
													<p>&nbsp;</p>
												</div>

												<div
													class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray"
												>
													<div
														class="d-flex justify-content-between align-items-center w-100"
													>
														<h6>Did you get the results of the latest Member Survey?&nbsp;<i class="far fa-comment"></i></h6>
													</div>
													<span class="d-block"
														>From:<a href="member-profile.html" title="Member Profile Page">@MikeDoe</a> &bullet; Received: 05/15/2019 2:00 pm</span
													>
													<span class="d-block"> <a href="#" title="Delete"><i class="fas fa-trash-alt"></i> Delete </a> | <a href="" aria-pressed="true"
														data-toggle="modal" data-target="#replyModal" title="Reply"> Reply <i class="fas fa-reply"></i></a></span>
												</div>
											</div>

								</div>
								<div class="accordion-content" data-content>
									<div class="accordion-content-wrapper"><!--dynamically put the Message Content here-->
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
									</div>
								</div>
							</div><!--end accordion 1-->
							<div class="accordion" data-accordion>
									<div class="accordion-control" data-control>
											<div class="media text-muted">
													<div class="media align-items-center">
														<img
															src="assets/images/demo/user-10.jpg"
															alt="Avatar"
															class="avatar avatar-sm rounded mr-3"
														/>
														<p>&nbsp;</p>
													</div>

													<div
														class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray"
													>
														<div
															class="d-flex justify-content-between align-items-center w-100"
														>
															<h6>Are you planning on attending the Summer Institute?&nbsp;<i class="far fa-comment"></i></h6>
														</div>
														<span class="d-block"
															>From:<a href="member-profile.html" title="Member Profile Page">@RJMcAllister</a> &bullet; Received: 05/14/2019 10:00 am</span
														>
														<span class="d-block"> <a href="#" title="Delete"><i class="fas fa-trash-alt"></i> Delete </a> | <a href="" aria-pressed="true"
															data-toggle="modal" data-target="#replyModal" title="Reply"> Reply <i class="fas fa-reply"></i></a></span>
													</div>
												</div>

									</div>
									<div class="accordion-content" data-content>
										<div class="accordion-content-wrapper"><!--dynamically put the Message Content here-->
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nihil iure doloribus at alias neque, corporis non obcaecati! Cumque impedit cupiditate tempore optio alias quo provident. Optio, repudiandae ut inventore quam ipsa quas fugiat iste architecto deleniti amet commodi dolorum ea, possimus autem totam accusantium provident natus eveniet. Eligendi, libero sunt. Eos ab ullam nam possimus aperiam consequuntur aliquam.</p>
										</div>
									</div>
								</div><!--end accordion 2-->
								<div class="accordion" data-accordion>
										<div class="accordion-control" data-control>
												<div class="media text-muted">
														<div class="media align-items-center">
															<img
																src="assets/images/demo/user-5.jpg"
																alt="Avatar"
																class="avatar avatar-sm rounded mr-3"
															/>
															<p>&nbsp;</p>
														</div>

														<div
															class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray"
														>
															<div
																class="d-flex justify-content-between align-items-center w-100"
															>
																<h6>Alumni Commencement Events&nbsp;<i class="far fa-comment"></i></h6>
															</div>
															<span class="d-block"
																>From:<a href="member-profile.html" title="Member Profile Page">@SWheeler</a> &bullet; Received: 05/13/2019 3:25 pm</span
															>
															<span class="d-block"> <a href="#" title="Delete"><i class="fas fa-trash-alt"></i> Delete </a> | <a href="" aria-pressed="true"
																data-toggle="modal" data-target="#replyModal" title="Reply"> Reply <i class="fas fa-reply"></i></a></span>
														</div>
													</div>

										</div>
										<div class="accordion-content" data-content>
											<div class="accordion-content-wrapper"><!--dynamically put the Message Content here-->
												<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur quae dolorum, nihil est ut iure cumque quos? Aut perspiciatis accusamus libero. Repellat temporibus repudiandae ullam. Nam error, consectetur ducimus fuga corrupti assumenda, eligendi, autem corporis culpa provident sed dolorem dignissimos.</p>
											</div>
										</div>
									</div><!--end accordion 3-->
									<div class="accordion" data-accordion>
											<div class="accordion-control" data-control>
													<div class="media text-muted pt-1">
															<div class="media align-items-center">
																<img
																	src="assets/images/demo/user-1.jpg"
																	alt="Avatar"
																	class="avatar avatar-sm rounded mr-3"
																/>
																<p>&nbsp;</p>
															</div>

															<div
																class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray"
															>
																<div
																	class="d-flex justify-content-between align-items-center w-100"
																>
																	<h6>The latest trends on Alumni Gifting.&nbsp;<i class="far fa-comment"></i></h6>
																</div>
																<span class="d-block"
																	>From:<a href="member-profile.html" title="Member Profile Page">@SGarcia</a> &bullet; Received: 05/06/2019 11:15 am</span
																>
																<span class="d-block"> <a href="#" title="Delete"><i class="fas fa-trash-alt"></i> Delete </a> | <a href="" aria-pressed="true"
																	data-toggle="modal" data-target="#replyModal" title="Reply"> Reply <i class="fas fa-reply"></i></a></span>
															</div>
														</div>

											</div>
											<div class="accordion-content" data-content>
												<div class="accordion-content-wrapper"><!--dynamically put the Message Content here-->
													<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur quae dolorum, nihil est ut iure cumque quos? Aut perspiciatis accusamus libero. Repellat temporibus repudiandae ullam. Nam error, consectetur ducimus fuga corrupti assumenda, eligendi, autem corporis culpa provident sed dolorem dignissimos.</p>
												</div>
											</div>
										</div><!--end accordion 4-->
						</div>
								<!--end accordion group-->
								<!--begin pagination-->

					</div>
					<!--end dicussion topic-->

			</div>
			<!--end col-->
			<!--end row-->
		</div><!--end row-->
		<div class="row justify-content-between">
				<div class="col-md-10 mb-5">
						<div class="d-flex justify-content-end">
						<nav>
								<ul class="pagination">
									<li class="page-item">
										<a
											class="page-link"
											href="javascript: void(0);"
											aria-label="Previous"
										>
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">Previous</span>
										</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="javascript: void(0);"
											>1</a
										>
									</li>
									<li class="page-item">
										<a class="page-link" href="javascript: void(0);"
											>2</a
										>
									</li>
									<li class="page-item active">
										<a class="page-link" href="javascript: void(0);"
											>3</a
										>
									</li>
									<li class="page-item">
										<a
											class="page-link"
											href="javascript: void(0);"
											aria-label="Next"
										>
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
										</a>
									</li>
								</ul>
							</nav>
						</div><!--end pagination-->
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
