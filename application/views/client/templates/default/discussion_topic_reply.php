    <section>
      <div class="container">
        <div class="row">
          <div class="col"></div>
          <!--end col-->
        </div>
        <!--end Row-->
      </div>
      <!--end container-->
    </section>
    <!--end section-->
    <!-- / works -->
    <!--divider-->
    <section>
      <div class="container mb-3">
        <div class="row mt-3 justify-content-left">
          <div class="col-md-8 text-center">
            <!--add search field here-->
            <div class="app-search">
              <form action="/discussion/search" method="GET">
                <!--Make this an active search for the Discussions-->
                <div class="input-group-prepend">
                    <button class="btn btn-sm btn-outline-dark dropdown-toggle" id="btn-search" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">All Discussions</button>
                    <div class="dropdown-menu dropdown-search">
                      <a class="dropdown-item" href="#">All Discussions</a>
                      <a class="dropdown-item" href="#">This Category</a>
                      <div role="separator" class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Users</a>
                    </div>
                  <input
                    type="text"
                    class="form-control"
                    name="search_val"
                    placeholder="Search discussions..."
                  />
                  <input
                    type="hidden"
                    class="form-control"
                    name="search_option"
                    value="All Discussions"
                  />
                  <!--Results displayed on Discussions Search Results page-->
                  <div class="input-group-append">
                    <button class="btn btn-sm btn-dark" type="submit">
                      <i class="fas fa-search"></i>
                      Search
                    </button>
                  </div>
                </div>
                </div><!--end search div-->
              </form>
            </div><!--end col-->
            </div><!--end row-->
          </div>
      <!--end container-->
    </section>
    <!--begin discussion board section-->
    <section>
        <div class="container">
            <!-- start page title -->
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/discussion">Discussions</a></li>
                                <li class="breadcrumb-item"><a href="/discussion/categories/<?= !empty($discussion_topic->category) ? $discussion_topic->category[0]->url_alias_value  : "" ?>"><?= !empty($discussion_topic->category) ? $discussion_topic->category[0]->discussion_categories_title  : "" ?></a></li>
                                <li class="breadcrumb-item active"><?= $discussion_topic->discussion_categories_topic_title ?></li>
                            </ol>
                        </div>
                      
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
        </div> <!-- container -->
      <div class="container">
        <div class="row">
          <div class="col-md-8">
              <dl class="row">
                  <dt class="col-sm-3">    
                      <img
                        src="<?= $discussion_topic->user_picture != "" ?  $discussion_topic->user_picture : "/assets/images/users/no_picture.jpg"; ?> "
                        alt="Avatar"
                        class="avatar avatar-md rounded mr-3"
                      />
                      <br>
                      <p><?= $discussion_topic->user_name ?></p>
                    </dt>
                  <dd class="col-sm-9"><h3><?= $discussion_topic->discussion_categories_topic_title ?></h3>
                    </dd>
                    <dt class="col-sm-3"><h6>Registered Member</h6></dt>
                    <dd class="col-sm-9"> 
                      <h6>by: <?= $discussion_topic->user_name ?> &bullet; Registered Member &bullet; <?= time_since($discussion_topic->discussion_categories_topic_created_on) ?></h6>
                      <p>
                      <?= $discussion_topic->discussion_categories_topic_description ?>
                  </p></dd>
                  </dl>
                  <!-- <div class="row justify-content-end">
                    <div class="button-list">
                      <button type="button" class="btn btn-sm btn-outline-primary">Share</button>
                      <button type="button" class="btn btn-sm btn-dark">Reply</button>
                    </div>
                  </div> -->
                  <!--begin replies-->
                  <h6 class="separator-bottom"><?= ($discussion_topic->comment_count != "") ? $discussion_topic->comment_count  : "0" ?> Comments</h6>
                  <?php if(!empty($topic_comment)): ?>
                  <?php 
                    $commentCount = count($topic_comment) ;
                    $i = 1;
                    foreach($topic_comment as $comment):
                  ?>
                  <dl class="row mt-5">
                      <dt class="col-sm-3">    
                          <img
                            src=" <?= $comment->user_picture != "" ? $comment->user_picture : "/assets/images/users/no_picture.jpg" ?>"
                            alt="Avatar"
                            class="avatar avatar-md rounded mr-3"
                          />
                          <br>
                          <p><?= $comment->user_name ?></p>
                        </dt>
                      <dd class="col-sm-9"><h3></h3>
                        </dd>
                        <dt class="col-sm-3"><h6>Registered Member</h6></dt>
                        <dd class="col-sm-9"> 
                          <h6>by: <?= $comment->user_name ?> &bullet; Registered Member &bullet; <?= time_since($comment->topic_comment_created_on) ?></h6>
                          <div id="comment"><?= $comment->topic_comment_comment ?></div>
                      </dd>
                      </dl>
                      <!-- <div class="row justify-content-end">
                          <div class="button-list">
                            <button type="button" class="btn btn-sm btn-outline-primary">Share</button>
                            <button type="button" class="btn btn-sm btn-dark">Reply</button>
                          </div>
                        </div> -->
                      <?= ($i == $commentCount) ? '' : '<h6 class="separator-bottom">&nbsp;</h6>' ?>
                      <?php $i++ ;?> 
                      <?php endforeach; ?>
                      <?php endif; ?>
                      <div class="container"><!--begin Reply container-->
                        <hr>
                      <div class="row justify-content-center">
                        <div class="col-md-12 text-md-right">
                        <?php echo form_open('#', array('id' => 'frm-discussion-reply')) ?>
                          <div class="button-list">
                            <button type="button" id="btn-quote" class="btn btn-sm btn-outline-dark">Quote</button>
                          </div>
                        </div>
                          
                            <div class="col-md-12">
                            <!-- <div class="froala-container"> -->
                              <div class="form-group"><!--This should be a Froala Container-->
                                  <label for="exampleFormControlTextarea1">Type your Reply Below.</label>
                                  <textarea name="topic_coment_coment" class="form-control topic_coment_coment" id="froala-editor" rows="5" required></textarea>
                                </div>
                            <!--  </div> end froala-->
                            </div>
                          
                          <div class="col-md-12 text-right">
                                <div class="button-list">
                                  <button onclick="window.location='/discussion'"  type="button" href="/discussion" class="btn btn-sm btn-outline-dark">Cancel</button>
                                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                          </div>
                          <input type="hidden" name="topic_subject" value="<?= $discussion_topic->discussion_categories_topic_title?>">
                          <input type="hidden" name="topic_id" value="<?= $discussion_topic->discussion_categories_topic_id?>">
                          <input type="hidden" name="topic_parent_id" value="<?= $parent_id ?>">
                        <?php echo form_close(); ?>
                        </div><!--end row-->
                      </div><!--end reply container-->
          </div><!--end col-->
          <!-- project card -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-3">Options</h5>
                <div class="mt-3 chartjs-chart">
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-primary dropdown-toggle"
                      type="button"
                      id="dropdownMenuButton"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Options
                    </button>
                    <div
                      class="dropdown-menu bg-light"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <a class="dropdown-item" href="#">Mark All as New</a>
                      <a class="dropdown-item" href="#">Mark All as Read</a>
                      <a class="dropdown-item" href="#">Subscribe</a>
                      <a class="dropdown-item" id="btn_bookmark" data-topic-id="<?= $discussion_topic->discussion_categories_topic_id ?>" href="#">Bookmark</a>
                      <a class="dropdown-item" href="/edit-profile"
                        >Edit Profile Preferences</a
                      >
                    </div>
                  </div>
                </div>
                <!--end dropdown-->
              </div>

              <!--end card body-->
            </div>
            <!-- end card-->
                <!-- project card -->
          
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-3">Categories</h5>
                  <div class="mt-3 chartjs-chart">
                  <p><a href="/discussion" title="Newest">Newest</a></p>
                  <?php if(!empty($discussions)): ?>
                    <?php foreach($discussions as $discussion): ?>
                      <p><a href="/discussion/categories/<?= $discussion->url_alias_value ?>" title="<?= $discussion->discussion_categories_title ?>"><?= $discussion->discussion_categories_title ?></a></p>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
              <!-- end card-->
            </div>
          
          <!--end right hand col-->
          <div class="col-md-8 mt-10">
              
          </div>
        
          <!--end col 8-->
      
          <!--end right hand col-->
        </div>
        <!--end row-->
      </div>
      <!--end container-->
    </section>
    <!--end section-->