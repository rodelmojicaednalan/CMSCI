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
        <div class="col-md-12 text-center">
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
          <!-- start page Breadcrumbs -->
          <div class="row justify-content-center">
              <div class="col-12">
                  <div class="page-title-box">
                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="/discussion" title="Discussions">Discussions</a></li>
                              <li class="breadcrumb-item"><a href="/discussion/categories/<?= $discussion_category->url_alias_value ?>" title="<?= $discussion_category->discussion_categories_title ?>"><?= $discussion_category->discussion_categories_title ?></a></li><!--dynamic Category Name here--><!--Insert Category Name in the title field above.-->
                              <li class="breadcrumb-item active">New Topic</li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>     
          <!-- end page title --> 
      </div> <!-- container -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h1>Add a New Topic</h1>
            <!--<form> -->
            <?php echo form_open('discussion/save_topic', array('id' => 'frm-discussion')); ?>
            <input type="hidden" name="discussion_category_id" value="<?= $discussion_category->discussion_categories_id ?>">
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="topic-subject">Topic Subject</label>
                    <input
                      type="text"
                      class="form-control"
                      name="discussion_topic_title"
                      id="topic-subject"
                      aria-describedby="topic-subject"
                      placeholder="Enter your subject here."
                      required
                    />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="topicBody">Topic Details</label><!--this should be a Froala Editor-->
                    <textarea class="form-control" name="discussion_topic_description" id="froala-editor" rows="5" placeholder="Enter your Details here" required></textarea>
                  </div>
                  <div class="form-group form-check mt-3">
                      <input type="checkbox" class="form-check-input" name="discussion_categories_topic_notify_group" id="emailnotifyCheck1" value="1">
                      <label class="form-check-label" for="emailnotifyCheck1">Notify me by email if someone replies.</label>
                  </div>
                </div>
              
              </div>
              <div class="form-row mt-1 align-items-center mt-5 mb-3">
                <div class="col-8">
                  <div class="button-list">
                    <a href="/discussion" class="btn btn-secondary mr-2">
                        Cancel
                      </a>
                  <button class="btn btn-primary" type="submit" value="submit">
                    Save
                  </button>
                </div>
                </div>
              </div>
            <!-- </form> -->
            <?php echo form_close(); ?>
          
        </div><!--end col-->
      </div>
      <!--end row-->
    </div>
    <!--end container-->
  </section>