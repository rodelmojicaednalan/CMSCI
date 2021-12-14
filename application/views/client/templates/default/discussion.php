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
            <h1 class="mb-3">Discussions</h1>
          </div>
        </div>
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
          <div class="accordion-group" data-accordion-group>
            <div class="accordion" data-accordion>
              <div class="accordion-control" data-control>
                <h3>Discussion Board Guidelines</h3>
              </div>
              <div class="accordion-content" data-content>
                <div class="accordion-content-wrapper">
                  <span class="froala-container">
                    <p>
                      We ask that all Members use these lists with care
                      and—because we do not actively moderate these lists—we
                      rely on discussion group subscribers/posters to
                      exercise good judgment and common sense when deciding
                      what types of messages are appropriate. If you are
                      unsure whether your message is appropriate, or need
                      advice regarding what list is best-suited for your
                      message, contact us via e-mail at
                      <a href="mailto:support@aea.com">support@aea.com</a>
                      or call 312-704-0815.
                    </p>
                    <h6>NETIQUETTE DISCUSSION TIPS: “T.R.U.S.T.”</h6>
                    <ul class="text-muted small">
                      <li>
                        TOPIC - Stay on TOPIC in your posts and in your
                        responses. Never attack the person, focus on the
                        subject and why they may have differing views.
                      </li>
                      <li>
                        REVIEW - Always REVIEW before you post. Like
                        in-person conversations, you should always think
                        before you speak.
                      </li>
                      <li>
                        UNDERSTAND - that everyone in the AEA will have
                        different perspectives and approaches. Respect other
                        opinions and beliefs.
                      </li>
                      <li>
                        SOURCES - Your thoughts and conclusions should
                        always be backed by verified SOURCES.
                      </li>
                      <li>
                        TONE - Make sure your TONE is appropriate to the
                        discussion at hand. Be cautious with stylistic
                        choices such as sarcasm, humor, and colloquialisms,
                        as they are not universal and may not always be
                        interpreted as intended.
                      </li>
                    </ul>
                  </span>
                </div>
              </div>
              <!--end accordion content-->
            </div>
            <!--end accordion-->
          </div>
          <!--end accordion group-->
        </div>

        <div class="col-md-8">
          <div
            class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary shadow-sm"
          >
            <span style="font-size: 3rem;" class="mr-2">
              <i class="far fa-comment-alt text-white"></i
            ></span>
            <div class="lh-100">
              <h4 class="mb-0  text-white">Newest Discussions</h4>
              <p class="text-white">
                Most Recent Entry: <?= !empty($discussion_topic) ? date( "m/d/Y h:i:a", strtotime($discussion_topic[0]->discussion_categories_topic_created_on) ) : "" ; ?>
              </p>
            </div>
          </div>

          <div class="my-3 p-3 bg-white shadow-sm">
            <!-- <div class="text-right">
              <a
                href="#"
                class="btn btn-sm btn-outline-primary"
                role="button"
                aria-pressed="true"
                >Start a Discussion</a
              >
            </div> -->
            <h6 class="border-bottom border-gray pb-2 mb-0">
              Newest updates
            </h6>

            <!--begin discussion topic-->
            <?php if(!empty($discussion_topic)): ?>
            <?php foreach($discussion_topic as $topic): ?>
            <div class="media text-muted pt-3">
              <div class="media align-items-center">
                <img
                  src=" <?= $topic->user_picture != "" ? $topic->user_picture : "/assets/images/users/no_picture.jpg"; ?>"
                  alt="Avatar"
                  class="avatar avatar-sm rounded mr-3"
                />
                <p>&nbsp;</p>
              </div>

              <div
                class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"
              >
                <div
                  class="d-flex justify-content-between align-items-center w-100"
                >
                  <strong class="text-gray-dark"
                    ><a href="/discussion/topic/<?= $topic->url_alias_value ?>"
                      ><?= $topic->discussion_categories_topic_title ?></a
                    >
                  </strong>
                  <span
                    ><i class="far fa-comment-alt"></i>&nbsp;<?= $topic->comment_count != "" ?  $topic->comment_count  : "0" ?>
                    comments</span
                  >
                  <a href="/discussion/topic/<?= $topic->url_alias_value ?>">Read More...</a>
                </div>
                <span class="d-block"><a href="/member-profile/<?= $topic->user_id ?>" title="Member Profile">@<?= $topic->user_name ?></a> - <?= date( "m/d/Y h:i:a", strtotime($topic->discussion_categories_topic_created_on) ); ?></span>
              </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <!--end dicussion topic-->

            <small class="d-block text-right mt-3">
              <a href="#">All newest updates</a>
            </small>
          </div>
          
          <?php foreach($discussions as $discussion): ?>
          <!--begin marketing discussion topic-->
          <div class="my-3 p-3 bg-white shadow-sm">
            <?php if(isset($this->session->userdata['logged_in'])): ?>
              <div class="text-right">
                <a
                  href="/discussion/new_discussion/<?= $discussion->url_alias_value ?>"
                  class="btn btn-sm btn-outline-primary"
                  role="button"
                  aria-pressed="true"
                  >Start a Discussion</a
                >
              </div>
            <?php endif;?>

            <div class="accordion-group mt-2" data-accordion-group>
              <div class="accordion" data-accordion>
                <div class="accordion-control" data-control>
            <h6 class="border-bottom border-gray pb-2 mb-0">
              <?= $discussion->discussion_categories_title ?>
            </h6>
              </div><!--end accordion control-->
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">

            <!--begin discussion topic-->
            <?php if(!empty($discussion->topic)): ?>
            <?php foreach($discussion->topic as $discussion_topic): ?>
            <div class="media text-muted pt-3">
              <div class="media align-items-center">
                <img
                  src="<?= $discussion_topic->user_picture != "" ? $discussion_topic->user_picture : "/assets/images/users/no_picture.jpg" ?>"
                  alt="Avatar"
                  class="avatar avatar-sm rounded mr-3"
                />
                <p>&nbsp;</p>
              </div>

              <div
                class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"
              >
                <div
                  class="d-flex justify-content-between align-items-center w-100"
                >
                  <strong class="text-gray-dark"
                    ><a href="/discussion/topic/<?= $discussion_topic->url_alias_value ?>"><?= $discussion_topic->discussion_categories_topic_title ?></a>
                  </strong>
                  <span
                    ><i class="far fa-comment-alt"></i>&nbsp;<?= $discussion_topic->comment_count != "" ?  $discussion_topic->comment_count  : "0" ?>
                    comments</span
                  >
                  <a href="/discussion/topic/<?= $discussion_topic->url_alias_value ?>">Read More...</a>
                </div>
                <span class="d-block">@<?= $discussion_topic->user_name ?> - <?= date( "m/d/Y h:i:a", strtotime($discussion_topic->discussion_categories_topic_created_on) ); ?></span>
              </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <!--end dicussion topic-->
            

            <small class="d-block text-right mt-3">
              <a href="/discussion/categories/<?= $discussion->url_alias_value ?>">All <?= $discussion->discussion_categories_title ?> Topics</a>
            </small>
          </div><!--end accordion content wrapper. -->
        </div>
              <!--end accordion content-->
            </div>
            <!--end accordion-->
          </div>
          <!--end accordion group-->
      </div><!--end marketing discussion topic.-->
      <?php endforeach; ?>
      </div>
      
        <!--end col 8-->
        <!-- project card -->
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
        <!-- project card -->

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
  <section>
    <div class="container">
      <div class="row justify-content-left"></div>
    </div>
  </section>
  <!--end section-->
