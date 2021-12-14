<?php echo form_open('#', array('id' => 'frm_sendEmail', 'class' => 'form-horizontal')); ?> 
    <h4 class="header-title mb-3">Share Posts</h4>
        <ul class="nav nav-pills nav-justified mb-3 bg-light">
            <li class="nav-item">
                <a href="#share1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Social Share</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#embed1" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Embed</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#email1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Email</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane  show active" id="share1">
            
                <p>Share this post to your Social Media Accounts by clicking the logo for your account below.</p>
                <p class="mb-0">&nbsp; <!--Please place the inline SocialS Javascript into the site JS file Do not leave on this page.-->
                    </p>
                    <div id="admin-share"></div>
                    <!-- <div class="button-list">
                            <button type="button" class="btn btn-icon btn-info"> <i class="fab fa-facebook-square"></i></button>
                            <button type="button" class="btn btn-icon btn-info"><i class="fab fa-twitter-square"></i></button>
                            <button type="button" class="btn btn-icon btn-info"><i class="fab fa-linkedin"></i></button>
                            <button type="button" class="btn btn-icon btn-warning"><i class="fab fa-pinterest-square"></i></button>
                            <button type="button" class="btn btn-icon btn-primary"> <i class="fab fa-tumblr-square"></i></button>   
                            <button type="button" class="btn btn-icon btn-success"><i class="fab fa-whatsapp-square"></i></button>
                    </div> -->
                  
                    <!--end inline script to remove-->
                    <h4><?= $blog_object->blog_title ?><!--Add Dynamic Title of Post here--></h4>
                    <!--This should be the Dynamic Image from their Blog Post-->
                    <?php if(!empty($blog_object->blog_images)): ?>
                                <?php if($blog_object->blog_images[0]->file_upload_name != ""): ?>
                                    <img src="<?= base_url().$blog_object->blog_images[0]->file_upload_path ?>" alt="<?= ($blog_object->blog_images[0]->caption) ? $blog_object->blog_images[0]->caption : $blog_object->blog_images[0]->file_upload_name ?>" height="50%" width="50%">
                                <?php endif; ?>
                    <?php endif; ?>
                    <p class="mt-2"><!--replace with Dynamic first paragraph of the blog post <selected - Remove the Lorem text when PHP is added--><?= $blog_object->blog_preview_text ?></selected--></p>
            </div>
            <div class="tab-pane" id="embed1">
                <p>Copy and Paste the URL below to embed the URL for your blog post on a page or in a social media post.</p>
                <!--The blogpost URL should be dynamically injected.-->
                <div class="form-group mb-3 text-center">
                        <label for="example-palaceholder">Blog Post URL</label>
                        <input type="text" id="example-palaceholder" value="<?= base_url().'blog/'.$blog_object->url_alias_value?>" class="form-control" placeholder="https://yoursite.com/blogpost.php">
                    </div>
            </div>`
            <div class="tab-pane" id="email1">
                <h4>Share this Post via Email</h4>
               <!-- <form class="form-horizontal"> -->
                        <div class="form-group row mb-3">
                            <label for="inputEmail3" class="col-3 col-form-label">To: Email Address:</label>
                            <div class="col-9">
                                <input type="email" name="email_to" class="form-control" id="inputEmail3" placeholder="to@email.com" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                                <label for="inputEmail4" class="col-3 col-form-label">From: Email Address:</label>
                                <div class="col-9">
                                    <input type="email" name="email_from"  class="form-control" id="inputEmail4" placeholder="from@email.com" required>
                                </div>
                            </div>
                        <div class="form-group row mb-3">
                            <label for="inputSubject" class="col-3 col-form-label">Subject</label>
                            <div class="col-9">
                                <input type="text" name="email_subj"  class="form-control" id="inputSubject" placeholder="Email Subject" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                                <label for="content-textarea" class="col-3 col-form-label">Email Message:</label>
                            <div class="col-9">
                                <textarea class="form-control" name="email_message" id="content-textarea" rows="5" placeholder="Write some text here." required><?= base_url().'blog/'.$blog_object->url_alias_value?></textarea>
                            </div>
                        </div>
                        <!--<div class="form-group mb-3 justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Send</button>
                            </div>
                        </div>-->
                    <!-- </form> -->
                
            </div>
        </div>

<div class="modal-footer">
    <div class="form-group text-center"><!--Can you add a Javascript Plugin so that the modal will open the print dialog onClick?-->
            <button type="button" class="btn btn-lg btn-secondary mb-3" data-dismiss="modal" aria-hidden="true">Close</button>&nbsp;
            <button id="print" class="btn btn-lg btn-primary mb-3" type="submit">&nbsp;Share&nbsp;</button>
    </div>

</div> 
<?php echo form_close(); ?><!--end modal footer-->