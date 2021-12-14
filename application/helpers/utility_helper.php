<?php

function randomString($length=10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $length; $i++) {
        $randstring .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}

function getSubDomain(){
    $host = str_replace('www.', '', $_SERVER['HTTP_HOST']);
    $subdomain_arr = explode('.', $host, 2);
    $subdomain = $subdomain_arr[0];
    return $subdomain;

}

function getTemplate($tpl, $subdomain = ''){
    if(trim($subdomain) == '')
        $subdomain = getSubDomain();

    $default = 'default';
    if (is_file(APPPATH.'views/'.CLIENT_TEMPLATES_FOLDER.'/'. $subdomain . '/'.$tpl.'.php'))
        $default = $subdomain;

    $view = CLIENT_TEMPLATES_FOLDER.'/'.$default.'/'.$tpl;

    return $view;
}

function sanitize_filename($string)
{
    return preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), html_entity_decode(preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8'));
}

function accessEmailMarketingMautic($groups_id, $subdomain, $groups_name){
    //check if existing
    $CI =& get_instance();

    $params = array('username' => $CI->config->item('MAUTIC_USERNAME'.'_'.strtoupper(ENV)),
                    'password' => $CI->config->item('MAUTIC_PASSWORD'.'_'.strtoupper(ENV)),
                    'hostname' => $CI->config->item('MAUTIC_DATABASE_URL'.'_'.strtoupper(ENV)),
                    'dbname' => $CI->config->item('MAUTIC_DB'.'_'.strtoupper(ENV)).'_'.(String)$groups_id,
                    'admin_group_id' => $groups_id,
                    'admin_group_title' => $subdomain,
                    'admin_group_name' => $groups_name);
    $CI->load->library('Mautic', $params);
    $exist = $CI->mautic->is_existing($groups_id);

    if($exist == false){
  			//create database
        $db_created = $CI->mautic->create_new_database($groups_id, $subdomain);
        //end create database
		}

    return true;
}


function resizeImagesHTML($html, $set_width) {
    $pattern = '/<img\s(.*?src.*?=.*?(?:\'|")(.*?)(?:\'|").*?)>/s';
    preg_match_all($pattern, $html, $matches);
    $img_elements = $matches[0];
    $img_srcs = $matches[2];

    foreach($img_elements as $key => $img_element) {
      if(file_exists($img_srcs[$key])){

          list($width, $height) = getimagesize($img_srcs[$key]);
          if ($width > $set_width) {
            $new_img_element = preg_replace($pattern, '<img width="'.$set_width.'px" $1>', $img_element);
            $html = str_replace($img_element, $new_img_element, $html);
          }

      }
    }
    return $html;
}

function getImgStr($page_content){
    $img_str = '';
    preg_match_all('/<img[^>]+>/i',htmlspecialchars_decode($page_content), $imgtags);
    foreach( $imgtags[0] as $img_tag)
    {
        $img_str = $img_tag;

        $img_str = resizeImagesHTML($img_str, 354);

        $xpath = new DOMXPath(@DOMDocument::loadHTML($img_str));
        $img_str = $xpath->evaluate("string(//img/@src)");

        $url = parse_url($img_str);
        if(!isset($url['scheme'])){
            if(file_exists(getcwd().'/'.$img_str)){
                //$img_str = base_url().$img_str;
                $img_str = ( ($img_str[0] == '/') ? $img_str : '/'.$img_str );
                break;
            }else
                $img_str = '';
        }else{
            $ch = curl_init($img_str);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_exec($ch);
            $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // $retcode >= 400 -> not found, $retcode = 200, found.
            curl_close($ch);

            if($retcode != 200)
                $img_str = '';
            else
                break;
        }
    }

    return $img_str;
}
