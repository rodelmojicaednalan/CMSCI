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
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="froala-container">
              <h1 class="mb-3">Discussions - <?=  $discussion_category->discussion_categories_title ?></h1><!--this should be dynamic - make it the category name-->
            </div>
          </div>
          <!--end col for headline-->
          <!--end col for headline-->
        <div class="col-md-8 text-center">
          <!--add search field here-->
          <div class="app-search">
            <form action="/discussion/search" method="GET">
                <!--Make this an active search for the Discussions-->
                <div class="input-group-prepend">
                  <input
                    type="text"
                    name="search_val"
                    class="form-control"
                    placeholder="Search all content"
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
        </div>
        <!--end row-->
      </div>
      <!--end container-->
    </section>
    <!--begin discussion board section-->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div
              class="d-flex align-items-center p-1 text-white-50 bg-primary shadow-sm"
            >
              <span style="font-size: 3rem;" class="mr-2">
                <i class="far fa-comment-alt text-white"></i
              ></span>
              <div class="lh-100">
                <h4 class="mb-0  text-white">Discussions - <?=  $discussion_category->discussion_categories_title ?></h4><!--this is Dyanmic - the name of the category-->
              </div>
            </div>
            <div class="my-0 p-3 bg-white shadow-sm">
            <?php if(isset($this->session->userdata['logged_in'])): ?>
                <div class="text-right mb-2">
                    <a
                      href="/discussion/new_discussion/<?= $discussion_category->url_alias_value ?>"
                      class="btn btn-sm btn-outline-primary"
                      role="button"
                      aria-pressed="true"
                      >Start a Discussion</a
                    >
                  </div>
              <?php endif; ?>
              <h6 class="border-bottom border-gray pb-2 mb-0">
                <?=  $discussion_category->discussion_categories_title ?>:<!--dynamic replace with actual category name-->
                <nav class="float-right">
                    <?= $pagination; ?>
                </nav>
              </h6>
              <!--begin discussion search results-->
              <?php if(!empty($discussion_category->topic)): ?>
              <?php foreach($discussion_category->topic as $topic): ?>
              <div class="media text-muted pt-3">
                <div class="media align-items-center">
                  <img
                    src="<?= $topic->user_picture != "" ? $topic->user_picture : "/assets/images/users/no_picture.jpg"; ?>"
                    alt="<?= $topic->user_name  ?>"
                    class="avatar avatar-sm rounded mr-3"
                  />
                  <p>&nbsp;</p>
                </div>
                <!--begin discussions search result-->
                <div
                  class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"
                >
                  <div
                    class="d-flex justify-content-between align-items-center w-100"
                  >
                    <strong class="text-gray-dark"
                      ><a href="/discussion/topic/<?= $topic->url_alias_value?>"
                        ><?= $topic->discussion_categories_topic_title ?></a
                      >
                    </strong>
                    <span
                      ><i class="far fa-comment-alt"></i>&nbsp;<?= $topic->comment_count != "" ?  $topic->comment_count  : "0" ?>
                      comments</span
                    >
                    <a href="/discussion/topic/<?= $topic->url_alias_value?>">Read More...</a>
                  </div>
                  <span class="d-block"><a href="/member-profile/<?= $topic->user_id ?>" title="Member Profile">@<?=  $topic->user_name ?></a> - <?= date( "m/d/Y h:i:a", strtotime($topic->discussion_categories_topic_created_on) ); ?></span>
                  <!--The Paragraph below should be the 25 words from the Discussion topic body text. -->
                  <p><?= word_limiter($topic->discussion_categories_topic_description, 25); ?></p>
                </div>
              </div>
              <?php endforeach; ?>
              <?php endif; ?>
              <!--end dicussion topic-->
            </div>
              <!--end dicussion search results-->
        </div>
          <!--end col 8-->
          <!-- begin right hand column search-->
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <!-- <h5 class="card-title">Search Discussions</h5>
                <div class="app-search mb-3">
                  <form>
                    <s!--Make this an active search for the Discussions--s>
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Search..."
                      />
                      <s!--Results displayed on Discussions Search Results page--s>
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-dark" type="submit">
                          <i class="fas fa-search"></i>
                          Submit
                        </button>
                      </div>
                    </div>
                  </form>
                </div> -->
                <h5 class="card-title mb-3">Options</h5>
                <div class="mt-3 chartjs-chart">
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-dark dropdown-toggle"
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
                      <a class="dropdown-item" href="#"
                        >Sort By: Topic Start Date</a
                      ><div class="dropdown-divider"></div>
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
          <!--end right hand col-->
          <div class="card mt-3">
            <div class="card-body">
              <h5 class="card-title mb-3">Categories</h5>
              <!--should be dynamic with the discussion board categories-->
              <div class="mt-3 chartjs-chart">
              <!--link to the categories - link Title should be the category title-->
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
          <!--end right hand col-->
        </div>
        <!--end row-->
      </div>
      <!--end container-->
    </section>
    <!--end section-->