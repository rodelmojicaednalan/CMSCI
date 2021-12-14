<div class="left-side-menu left-side-menu-light">
     <div class="slimscroll-menu">
         <!-- LOGO -->
         <a href="/admin" class="logo text-center">
             <span class="logo-lg">
                <!--Boomity logo-->
                <img src="/assets/images/boomity-logo-new150x23.gif" alt="Boomity logo" height="16">
             </span>
             <span class="logo-sm">
                 <img src="/assets/images/boomity-sq-infinity.png" alt="Boomity Logo" height="16">
             </span>
         </a>
         <!--- Sidemenu -->
         <ul class="metismenu side-nav side-nav-light">

             <li class="side-nav-title side-nav-item"></li>

             <li class="side-nav-item">
                 <a href="/admin" class="side-nav-link selected">
                     <i class="mdi mdi-speedometer mdi-18px"></i>
                     <span> Dashboard </span>
                 </a>
             </li>
             <li class="side-nav-item <?php print $this->uri->segment(2) == 'widget' ? 'active' : ''; ?> ">
                 <a href="javascript: void(0);" class="side-nav-link">
                     <i class="dripicons dripicons-briefcase dripicons-18px"></i>
                     <span> Site Build </span>
                     <span class="menu-arrow"></span>
                 </a>
                 <!--begin site build-->
                 <ul class="side-nav-second-level" aria-expanded="false">
                     <li class="side-nav-item">
                             <a href="javascript: void(0);" aria-expanded="false">Site Design
                                 <span class="menu-arrow"></span>
                             </a>
                             <ul class="side-nav-third-level" aria-expanded="false">
                                     <li>
                                         <a href="/admin/site_colors" title="General Settings" class="selected">Site Colors</a>
                                     </li>
                                     <li>
                                         <a href="/admin/custom_design" title="Communication">Custom Design Style</a>
                                     </li>
                                 </ul>
                         </li>
                 <!-- </ul>
                 <ul class="side-nav-second-level" aria-expanded="false"> -->
                     <li>
                         <a href="/admin/navigation" title="Navigation">Navigation</a>
                     </li>
                     <li>
                         <a href="/admin/pages" title="Pages">Pages</a>
                     </li>
                     <!--BEGIN WIDGETS-->
                     <li class="side-nav-item">
                         <a href="javascript: void(0);" aria-expanded="false">Widgets
                             <span class="menu-arrow"></span>
                         </a>
                         <ul class="side-nav-third-level" aria-expanded="false">
                             <li class="side-nav-item">
                                 <a href="/admin/widgets" aria-expanded="false">Edit Widgets</a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="javascript: void(0);" aria-expanded="false">Blogs
                                     <span class="menu-arrow"></span>
                                 </a>
                                 <ul class="side-nav-fourth-level" aria-expanded="false">
                                     <li>
                                         <a href="/admin/widget/blog_category/0" title="Blog Category">Blog Category</a>
                                     </li>
                                     <li>
                                         <a href="/admin/widget/blog_category_slider/0" title="Blog Category Slider">Blog Category Slider</a>
                                     </li>
                                     <li>
                                         <a href="/admin/widget/blog_preview/0" title="Blog Preview">Blog Preview</a>
                                     </li>
                                     <li>
                                         <a href="/admin/widget/blog_title/0" title="Blog Title">Blog Title</a>
                                     </li>
                                     <li>
                                         <a href="/admin/widget/blog/0" title="Blog Widget">Blog Widget</a>
                                     </li>
                                     <li>
                                         <a href="/admin/widget/blogger_list/0" title="Blogger List">Blogger List</a>
                                     </li>
                                 </ul>
                             </li>
                                 <li class="side-nav-item">
                                     <a href="javascript: void(0);" aria-expanded="false">Calls to Action
                                         <span class="menu-arrow"></span>
                                     </a>
                                     <ul class="side-nav-fourth-level" aria-expanded="false">
                                         <li>
                                             <a href="/admin/widget/call_to_action/0" title="Call to Action">Call to Action</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/newsletter/0" title="Newsletter Sign-up">Newsletter Sign-up</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/paypal_donation/0" title="Paypal Donation">Paypal Donation</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/poll/0" title="Poll">Poll</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/pre_landing/0" title="Prelanding Page">PreLanding Page</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/rss/0" title="RSS">RSS</a>
                                         </li>
                                     </ul>
                                 </li>
                                 <li class="side-nav-item">
                                         <a href="javascript: void(0);" aria-expanded="false">E-Commerce
                                             <span class="menu-arrow"></span>
                                         </a>
                                     <ul class="side-nav-fourth-level" aria-expanded="false">
                                         <li>
                                             <a href="/admin/widget/products/0" title="Products">Products</a>
                                         </li>
                                     </ul>
                                 </li>
                                 <li class="side-nav-item">
                                         <a href="javascript: void(0);" aria-expanded="false">Content
                                             <span class="menu-arrow"></span>
                                         </a>
                                     <ul class="side-nav-fourth-level" aria-expanded="false">
                                         <li>
                                             <a href="/admin/widget/event_list/0" title="Event List">Event List</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/external/0" title="External Script">External Script</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/text/0" title="Text">Text</a>
                                         </li>
                                     </ul>
                                 </li>
                                 <li class="side-nav-item">
                                         <a href="javascript: void(0);" aria-expanded="false">Photo/Video
                                             <span class="menu-arrow"></span>
                                         </a>
                                     <ul class="side-nav-fourth-level" aria-expanded="false">
                                         <li>
                                             <a href="cwidgets-bkgd-video.html" title="Background Video">Background Video</a>
                                         </li>
                                         <li>
                                             <a href="widgets-feature.html" title="Feature Images">Feature Images</a>
                                         </li>
                                         <li>
                                             <a href="widgets-gallery.html" title="Gallery">Gallery</a>
                                         </li>
                                         <li>
                                             <a href="widgets-lightbox.html" title="Lightbox">Lightbox </a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/slider/0" title="Slider">Slider</a>
                                         </li>
                                     </ul>
                                 </li>
                                 <li class="side-nav-item">
                                         <a href="javascript: void(0);" aria-expanded="false">Social Media
                                             <span class="menu-arrow"></span>
                                         </a>
                                     <ul class="side-nav-fourth-level" aria-expanded="false">
                                         <li>
                                             <a href="/admin/widget/instagram/0" title="Instagram Feed">Instagram Feed</a>
                                         </li>
                                         <li>
                                             <a href="/admin/widget/fb_like_box/0" title="Facebook Like">Facebook Like</a>
                                         </li>
                                         <li>
                                             <a href="widgets-pinterest.html" title="Pinterest Feed">Pinterest Feed</a>
                                         </li>
                                         <li>
                                             <a href="widgets-twitter.html" title="Twitter Feed">Twitter Feed</a>
                                         </li>
                                         <li>
                                             <a href="widgets-socialshare.html" title="Social Share">Social Share</a>
                                         </li>
                                     </ul>
                                 </li>
                             </ul>
                             <!--END WIDGETS-->
                             <li>
                                 <a href="./admin/footer_content" title="Footer">Footer</a>
                             </li>
                     </li>
                 </ul>
             </li>
             <!--END SITE BUILD-->
                 <!--BEGIN ADMIN SECTION-->
             <li class="side-nav-item">
                 <a href="javascript: void(0);" class="side-nav-link">
                     <i class="dripicons dripicons-toggles dripicons-18px"></i>
                     <span> Admin </span>
                     <span class="menu-arrow"></span>
                 </a>
                     <ul class="side-nav-second-level" aria-expanded="false">
                         <li class="side-nav-item">
                                 <a href="javascript: void(0);" aria-expanded="false">Settings
                                     <span class="menu-arrow"></span>
                                 </a>
                             <ul class="side-nav-third-level" aria-expanded="false">
                                 <li>
                                     <a href="/admin/general_settings" title="General Settings">General Settings</a>
                                 </li>
                                 <li>
                                     <a href="/admin/communication" title="Communication">Communication</a>
                                 </li>
                                 <li>
                                     <a href="/admin/clear_cache" title="Clear Cache">Clear Cache</a>
                                 </li>
                             </ul>
                         </li>
                         <li class="side-nav-item">
                                 <a href="javascript: void(0);" aria-expanded="false">Members
                                     <span class="menu-arrow"></span>
                                 </a>
                             <ul class="side-nav-third-level" aria-expanded="false">
                                 <li>
                                     <a href="/admin/manage_members" title="Manage Members">Manage Members</a>
                                 </li>
                                 <li>
                                     <a href="/admin/member_request_list" title="Member Requests">Member Requests</a>
                                 </li>
                                 <li>
                                     <a href="/admin/member_privileges" title="Member Privileges">Member Privileges</a>
                                 </li>
                                 <li>
                                     <a href="/admin/member_questions" title="Questions">Questions</a>
                                 </li>
                             </ul>
                         </li>
                         <li class="side-nav-item">
                                 <a href="javascript: void(0);" aria-expanded="false">Tracking Codes
                                     <span class="menu-arrow"></span>
                                 </a>
                             <ul class="side-nav-third-level" aria-expanded="false">
                                 <li>
                                     <a href="/admin/tracking_code_fbpixel" title="Facebook Pixel">Facebook Pixel</a>
                                 </li>
                                 <li>
                                     <a href="/admin/tracking_code_googleanalytics" title="Google Analytics">Google Analytics</a>
                                 </li>
                                 <li>
                                     <a href="/admin/tracking_code_googletagmanager" title="Google Tag Mnanger">Google Tag Mgr</a>
                                 </li>
                                 <li>
                                     <a href="/admin/tracking_code_pinterest" title="Pinterest">Pinterest</a>
                                 </li>
                                 <li>
                                     <a href="/admin/tracking_code_twitter" title="Twitter">Twitter</a>
                                 </li>
                             </ul>
                         </li>
                     <li>
                             <a href="/admin/navigation_categories" title="Nav Categories">Nav Categories</a>
                         </li>
                     <li>
                         <a href="/admin/custom_template" title="Custom Template">Custom Template</a>
                     </li>
                 </ul>
             </li>
             <!--END AMIN-->
             <!--BEGIN CONTENT-->
             <?php
                $is_active      = "";
                $doc_isactive   = "";
                $blog_isactive  = "";
                $e_isactive     = "";
                $event_isactive = "";
                $media_isactive = "";

                $e_url = ['event_categories', 'events_manage'];

                $urls = ['docs_manage_categories', 'docs_newcat', 'docs_editcat', 'document_new', 'document_edit', 'blog_manage_categories', 'blog_newcat', 'blog_editcat', 'blog_newpost', 'blog_editpost', 'media_manage_categories', 'media_new_category', 'media_edit_category', 'add_media', 'media_edit_media'];

                $doc_url = ['docs_manage_categories', 'docs_newcat', 'docs_editcat', 'document_new', 'document_edit'];

                $blog_url = ['blog_manage_categories', 'blog_newcat', 'blog_editcat', 'blog_newpost', 'blog_editpost'];

                $media_url = ['media_manage_categories', 'media_new_category', 'media_edit_category', 'add_media', 'media_edit_media'];

                if($this->uri->segment(2) && in_array($this->uri->segment(2), $urls)) {
                    $is_active = 'active';
                    if(in_array($this->uri->segment(2), $doc_url)){
                        $doc_isactive  = "active";
                    } else if(in_array($this->uri->segment(2), $blog_url)){
                        $blog_isactive = "active";
                    } else if(in_array($this->uri->segment(2), $media_url)){
                        $media_isactive = "active";
                    }

                }

                if($this->uri->segment(2) && in_array($this->uri->segment(2), $e_url)) {
                    $e_isactive = 'active';

                    if(in_array($this->uri->segment(2), $e_url)){
                        $event_isactive  = "active";
                    }

                }

             ?>
             <li class="side-nav-item <?= $is_active ?>">
                 <a href="javascript: void(0);" class="side-nav-link <?= $is_active ?>">
                     <i class="dripicons dripicons-pin dripicons-18px"></i>
                     <span>Manage Content</span>
                     <span class="menu-arrow"></span>
                 </a>
                 <ul class="side-nav-second-level " aria-expanded="false">
                     <li class="side-nav-item <?= $blog_isactive ?>">
                         <a href="javascript: void(0);">Manage Posts<span class="menu-arrow"></span>
                         </a>
                            <ul class="side-nav-third-level" aria-expanded="false">
                                 <li class="<?= $blog_isactive ?>">
                                     <a href="/admin/content_blogs" title="Blog Posts">Blog Posts</a>
                                 </li>
                                 <li>
                                     <a href="content-jobs.html" title="Job Listings">Job Listings</a>
                                 </li>
                                 <li>
                                     <a href="content-recipes.html" title="Recipes">Recipes</a>
                                 </li>
                                 <li>
                                     <a href="content-reviews.html" title="Reviews">Reviews</a>
                                 </li>
                            </ul>
                     </li>
                     <li class="<?= $doc_isactive ?>">
                         <a href="/admin/content_document" title="Documents">Documents
                         </a>
                     </li>
                     <li>
                         <a href="/admin/content_discussion" title="Discussions">Discussions</a>
                     </li>
                     <li class="<?= $media_isactive ?>">
                         <a href="/admin/media" title="Media">Media</a>
                     </li>
                 </ul>
             </li>
             <!--END CONTENT SECTION-->
             <!--BEGIN CONTENT LIBRARY-->
             <li class="side-nav-item">
                 <a href="content-library.html" class="side-nav-link">
                     <i class="dripicons dripicons-archive dripicons-18px"></i>
                     <!--<span class="badge badge-light float-right">New</span>-->
                     <span>Content Library</span>
                 </a>
             </li>
             <!--END CONTENT LIBRARY-->
             <!--begin manage events-->
             <li class="side-nav-item <?= $e_isactive ?> ">
                     <a href="javascript: void(0);" class="side-nav-link">
                         <i class="dripicons dripicons-calendar dripicons-18px"></i>
                         <span>Manage Events</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <ul class="side-nav-second-level" aria-expanded="false">
                         <li class="side-nav-item <?= $e_isactive ?>">
                             <a href="javascript: void(0);">Events<span class="menu-arrow"></span>
                             </a>
                             <ul class="side-nav-third-level" aria-expanded="false">
                                     <li class="">
                                         <a href="/admin/events" title="Manage Events">Manage Events</a>
                                     </li>
                                     <li>
                                         <a href="/admin/add_event_content" title="Add New Event">Add New Event</a>
                                     </li>
                                     <li>
                                         <a href="/admin/event_categories" title="Manage Event Categories">Manage Event Categories</a>
                                     </li>
                               </ul>
                         </li>

                         <li>
                             <a href="online-meetings.html" title="Online Meetings">Online Meetings</a>
                         </li>
                     </ul>
                 </li>
             <!--BEGIN MARKETING-->
             <li class="side-nav-item">
                   <a href="javascript: void(0);" class="side-nav-link">
                           <i class="dripicons dripicons-broadcast dripicons-18px"></i>
                           <span> Marketing</span>
                           <span class="menu-arrow"></span>
                 </a>
                 <ul class="side-nav-second-level" aria-expanded="false">
                   <li>
                       <a href="marketing-campaigns.html" title="Marketing-Campaigns">Campaigns
                       </a>
                   </li>
                   <li><!--This should open the Mautic Window-->
                       <a href="/admin/email_marketing" title="Email Marketing">Email Marketing
                       </a>
                   </li>
                   <li>
                       <a href="marketing-goals.html" title="Goals and Funnels">Goals and Funnels</a>
                   </li>
                   <li>
                       <a href="marketing-landing.html" title="Landing Pages">Landing Pages</a>
                   </li>
               </ul>
             </li>
             <!--BEGIN Ecommerce-->
             <li class="side-nav-item">
                     <a href="magento-shop.html" class="side-nav-link">
                     <i class="dripicons dripicons-cart dripicons-18px"></i>
                     <span>E-commerce</span>
                 </a>
             </li>
             <!--BEGIN Analtycis-->
               <li class="side-nav-item">
                   <a href="javascript: void(0);" class="side-nav-link">
                           <i class="dripicons dripicons-graph-bar dripicons-18px"></i>
                           <span>Analytics </span>
                           <span class="menu-arrow"></span>
                   </a>
                   <ul class="side-nav-second-level" aria-expanded="false">
                       <li>
                           <a href="/admin/web_analytics" title="Web Analytics">Web Analytics</a>
                       </li>
                       <li>
                           <a href="analytics-site-reports.html" title="Site Reports">Site Reports</a>
                       </li>
                   </ul>
               </li>
               <!--BEGIN Knowledgebase-->
             <li class="side-nav-item">
                 <a href="javascript: void(0);" class="side-nav-link">
                     <i class="dripicons dripicons-help dripicons-18px"></i>
                     <span> Knowledgebase </span>
                     <span class="menu-arrow"></span>
                 </a>
                 <ul class="side-nav-second-level" aria-expanded="false">
                     <li>
                         <a href="/admin/faq" title="Frequently Asked questions">F.A.Q.</a>
                     </li>
                     <li>
                         <a href="kb-instructions.html" title="Instructions">Instructions</a>
                     </li>
                     <li>
                         <a href="kb-videos.html" title="Videos">Videos</a>
                     </li>
                 </ul>
             </li>
             <!--BEGIN SUPPORT-->
             <!--<li class="side-nav-item">
                     <a href="javascript: void(0);" class="side-nav-link">
                         <i class="mdi mdi mdi-lifebuoy mdi-18px"></i>
                         <span> Support </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <ul class="side-nav-second-level" aria-expanded="false">
                         <li>
                             <a href="support-ticket.html" title="Submit Ticket">Submit Ticket</a>
                         </li>
                         <li>
                             <a href="support-responses.html" title="Support Responses">Support Responses</a>
                         </li>
                     </ul>
                 </li>-->
                 <!--THIS IS THE SIDEBAR COLLAPSE BUTTON-->
             <li class="side-nav-item">
                     <button id="myExpand" style="display:none;" class="button-menu-mobile open-right disable-btn" data-toggle="collapse">
                         <i class="mdi mdi-arrow-collapse-right"></i>
                     </button>
                     <button id="myCollapse" class="button-menu-mobile open-right disable-btn" title="Collapse or Open Sidebar">
                             <i class="mdi mdi-arrow-collapse-horizontal mdi-18px"></i>
                     </button>
                 </li>
         </ul>
         <!--End Menu-->
         <!-- Help Box -->
         <!--
         <div class="help-box text-white text-center">
             <a href="javascript: void(0);" class="float-right close-btn text-white">
                 <i class="mdi mdi-close"></i>
             </a>
             <img src="/assets/images/help-icon.svg" height="90" alt="Helper Icon Image" />
             <h5 class="mt-3">New Feature!</h5>
             <p class="mb-3">This is optional for us to add</p>
             <a href="javascript: void(0);" class="btn btn-outline-light btn-sm">Upgrade</a>
         </div>
          -->
         <!-- end Help Box -->
         <!-- End Sidebar -->
         <div class="clearfix"></div>
     </div>
     <!-- Sidebar -left -->
 </div>
<!-- Left Sidebar End -->
