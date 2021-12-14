<?php
   // $widget_blog_count = $fields && isset($fields['Blogs']) ? $fields['Blogs'] : '';
    $CI = & get_instance();
    $CI->load->model('Blogmodel');
    $blogs = (isset($_POST['Blogs']) && $_POST['Blogs'] != "") ? $CI->Blogmodel->get(array('sortBy' => 'blog.blog_id', 'sortDirection' => 'desc', 'limit' => $_POST['Blogs'], 'published_date' => '1')) : $CI->Blogmodel->get(array('sortBy' => 'blog.blog_id', 'sortDirection' => 'desc', 'published_date' => '1'));
    //dd($blog);
    $body = '';

    foreach ($blogs as $blog)  {
        $blog_url   = base_url().'blog/'.$blog->url_alias_value ;
        $blog_date  = $blog->blog_published_date == "0000-00-00 00:00:00" ? date( 'F d,Y', strtotime($blog->blog_created_on)) : date('F d,Y', strtotime($blog->blog_published_date));

        $body .= '<div class="align-items-start">
                    <a href="'.$blog_url.'"><h4>'.$blog->blog_title.'</h4></a>
                    <p>'.htmlspecialchars_decode($blog->blog_preview_text).'</p>
                    <p>'.$blog_date.' | <a href="#">comments</a></p>
                    <a href="'.$blog_url.'"><p>Read More >>></p></a>
                 </div>';
    }

    print $body;
?>
