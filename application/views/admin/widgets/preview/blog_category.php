<?php
    $CI = & get_instance();
    $CI->load->model('Blogcategorymodel');
    $blog_categories = $CI->Blogcategorymodel->get();
    $body = '';

    foreach ($blog_categories as $key => $bc) {
        $caturl = base_url().'blog/categories/'.$bc->url_alias_value ;
        $body .= '<p><a href="'.$caturl.'">'.$bc->blog_category_title. ' (' . (trim($bc->blog_count) == '' || $bc->blog_count == null ? '0' : (String)$bc->blog_count) . ')'.'</a></p>';
    }

    print $body;
?>
