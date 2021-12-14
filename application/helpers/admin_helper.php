<?php

function sendForgotPasswordEmail($email, $sender=""){

    $CI =& get_instance();
    $CI->load->library('email');
    $CI->load->helper('utility');
    $CI->load->helper('url');

    $randomkey = randomString(64);

    $CI->load->model('usermodel');
    $CI->usermodel->setPasswordResetKey($email, $randomkey);

    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => AMAZON_SES_HOST,
        'smtp_user' => AMAZON_SES_USER,
        'smtp_pass' => AMAZON_SES_PASS,
        'smtp_port' => AMAZON_SES_PORT,
        'mailtype' => 'html',
        'newline' => "\r\n",
        'smtp_crypto' => 'tls'
    );

    $CI->email->initialize($config);
    $CI->email->print_debugger();
    $CI->email->set_newline("\r\n");

    $CI->email->from(($sender=="" ? AMAZON_SES_DEFAULT_SENDER : $sender));
    $CI->email->to($email);
    $CI->email->subject('Reset your password');
    $CI->email->message("There was recently a request to change the password for your account. If you requested this change, please click on the link below \r\n\r\n <br/><br/> ".site_url('/resetpassword?r='.$randomkey)."\r\n\r\n <br/><br/>This link will expire after 24 hours. If you did not make this request, you can ignore this email and your password will remain the same.");

    $CI->email->send();

}


function time_since($date_time){

    $diff  = abs(strtotime("now") - strtotime($date_time));
    $days  = floor($diff / (60*60*24));
    $hours = floor($diff / (60*60));
    $mins  = floor($diff / 60);

    if($days > 0)
        $lastlogin =  $days." days ago";

    else if($hours > 0)
        $lastlogin =  $hours." hours ago";

    else
        $lastlogin = "Just Now";

        return  $lastlogin;
    }

function createUrlAlias($title, $id = 0, $type = ''){
  $CI =& get_instance();
  $CI->load->model('Urlaliasmodel');

	$cnt_obj = 0;
	$init_alias = str_replace(' ', '-', trim($title));

	$regex = "![^a-z0-9.\-]+!i";
	$init_alias = preg_replace($regex, '', $init_alias);
	$init_alias = strtolower($init_alias);

	$cnt = count(explode('-', $init_alias));

	if($id != 0){
		//check if exist
		$exist_rec = $CI->Urlaliasmodel->get(array('id' => $id, 'url_alias_type' => $type, 'url_alias_value' => $init_alias));

		if(count($exist_rec) > 0){
			return strtolower($init_alias);
		}
	}

	$rec = $CI->Urlaliasmodel->getlastalias(array('url_alias_type' => $type, 'url_alias_value' => $init_alias));
	//die(var_dump($rec));
	$arr = array();
	foreach($rec as $obj){
		$pos = strpos($obj->url_alias_value, $init_alias);
		$objarr = explode('-', $obj->url_alias_value);
		$objcnt = count($objarr);
		if($pos !== false && $pos == 0 && ($objcnt == $cnt || $objcnt == $cnt + 1) && (!isset($objarr[$cnt]) || is_numeric($objarr[$cnt]))){
			$arr[] = $obj->url_alias_value;
			$cnt_obj = $cnt_obj + 1;
		}
	}

	if($cnt_obj > 0){
		$init_alias = $init_alias . '-' . (String)$cnt_obj;
	}

  while(substr($init_alias, -1) == '-'){
    $init_alias = substr($init_alias, 0, -1);
  }

	return strtolower($init_alias);
}

function addUrlAlias($id, $type, $urlAlias, $custom_url = ''){

    $CI =& get_instance();
    $CI->load->model('Urlaliasmodel');

		if($type != 'media' && ($urlAlias == null || $urlAlias == '')) {
			return false;
		}

		$urlAlias = createUrlAlias($urlAlias, $id, $type);

		$params = array();
		$params['id'] = $id;
		$params['url_alias_type'] = $type;
		$resp = $CI->Urlaliasmodel->get($params);
		//error_log(print_r($params, true));
		//error_log(print_r($resp, true));
		if(count($resp) == 0){
			//error_log('not exist');
			$params = array();
			$params['id'] = $id;
			$params['url_alias_type'] = $type;
			$params['url_alias_value'] = $urlAlias;
			$params['custom_url'] = $custom_url;
			$id = $CI->Urlaliasmodel->add($params);
			//error_log('the id: '.(String)$id);

		}else{
			//error_log('exist');
			//print_r($resp);
			$temp = $resp[0];
			$aliasId = $temp->url_alias_id;
			$params = array();
			$params['id'] = $id;
			$params['url_alias_type'] = $type;
			$params['url_alias_value'] = $urlAlias;
			$params['url_alias_id'] = $aliasId;
			$params['custom_url'] = $custom_url;
			$CI->Urlaliasmodel->update($params);
		}
		return $urlAlias;
	}

  function get_all_meta_data($url) {
      $data = get_meta_tags($url); // get the meta data in an array
      $inx = 0;
      $retarr = array();
      foreach($data as $key => $value) {
          // check whether the content is UTF-8 or ISO-8859-1
          if(mb_detect_encoding($value, 'UTF-8, ISO-8859-1', true) != 'ISO-8859-1') {
              $value = utf8_decode($value); // if UTF-8 decode it
          }
          $value = strtr($value, get_html_translation_table(HTML_ENTITIES));    // mask the content
          $pattern = '/ |,/i';    // ' ' or ','

          // split it in an array, so we have the count of words
          $array = preg_split($pattern, $value, -1, PREG_SPLIT_NO_EMPTY);            // format data with count of words and chars

          $retarr[$inx]['key'] = $key;
          $retarr[$inx]['words'] = count($array);
          $retarr[$inx]['chars'] = strlen($value);
          $retarr[$inx]['value'] = $value;

          $inx++;
      }
      return $retarr;
  }

  function arraySearchMetaValue($keyword, $array) {
     foreach ($array as $key => $val) {
         if ($val['key'] === $keyword) {
             return $key;
         }
     }
     return null;
  }

  function getAbsoluteImageUrl($pageUrl,$imgSrc)
  {
      $imgInfo = parse_url($imgSrc);
      if (! empty($imgInfo['host'])) {
          //img src is already an absolute URL
          return $imgSrc;
      }
      else {
          $urlInfo = parse_url($pageUrl);
          $base = $urlInfo['scheme'].'//'.$urlInfo['host'];
          if (substr($imgSrc,0,1) == '/') {
              //img src is relative from the root URL
              return $base . $imgSrc;
          }
          else {
              //img src is relative from the current directory
                 return
                      $base
                      . substr($urlInfo['path'],0,strrpos($urlInfo['path'],'/'))
                      . '/' . $imgSrc;
          }
      }
  }

  function extract_images_html($html){
  	// Parse the HTML with 'DOMDocument()'
  	$dom = new DOMDocument();
  	@$dom->loadHTML($html);

  	// Get all the image tags.
  	$imgs = $dom->getElementsByTagName('img')->item(0);

  	$alt_title_src_array = array();
  	$inx = 0;
  	foreach ($dom->getElementsByTagName('img') as $values) {

  	  // Get the image 'src' value.
  	  $imgsrc = $values->attributes->getNamedItem("src")->value;

  	  // Get the image 'alt' value.
  	  $altimg = isset($values->attributes->getNamedItem("alt")->value) ? $values->attributes->getNamedItem("alt")->value : '';

  	  // Get the image 'title' value.
  	  $titleimg = isset($values->attributes->getNamedItem("title")->value) ? $values->attributes->getNamedItem("title")->value : '';

  	  $alt_title_src_array[$inx]['src'] = $imgsrc;
  	  $alt_title_src_array[$inx]['alt'] = $altimg;
  	  $alt_title_src_array[$inx]['title'] = $titleimg;

  	  $absimg = getAbsoluteImageUrl(base_url(), $imgsrc);

      if(filter_var($absimg, FILTER_VALIDATE_URL)){
          $i = get_headers($absimg, 1);
          $filesize = $i["Content-Length"];

      }else {
          $filesize = 0;
      }

      $alt_title_src_array[$inx]['filesize'] = getReadableFileSize($filesize);
      $alt_title_src_array[$inx]['filename'] = basename($absimg);

  	  $inx++;

  	}

  	return $alt_title_src_array;
  }

  function extract_headings($html){
  	$dom = new DOMDocument();
  	@$dom->loadHTML($html);

  	$xpath = new DOMXPath($dom);
  	$heads = $xpath->query('//h1|//h2|//h3|//h4|//h5|//h6');

  	$tags = array();
  	$inx = 0;
  	foreach ($heads as $tag) {
        //echo $doc->saveHTML($tag), "\n";
       if(isset($tags[$tag->nodeName]['value']))
          $tags[$tag->nodeName]['value'] .= (trim($tags[$tag->nodeName]['value']) == '' ? $tag->nodeValue : "~|~".$tag->nodeValue);
       else
          $tags[$tag->nodeName]['value'] = (!isset($tags[$tag->nodeName]['value']) || trim($tags[$tag->nodeName]['value']) == '' ? $tag->nodeValue : "~|~".$tag->nodeValue);

       if(isset($tags[$tag->nodeName]['count']))
          $tags[$tag->nodeName]['count'] = $tags[$tag->nodeName]['count'] + 1;
       else
          $tags[$tag->nodeName]['count'] = 1;
       $inx++;
  	}


  	return $tags;
  }

  function sanitize_output( $buffer ) {

    //return $buffer;
    // JavaScript compressor by John Elliot <jj5@jj5.net>

    $replace = array(
      '#\'([^\n\']*?)/\*([^\n\']*)\'#' => "'\1/'+\'\'+'*\2'", // remove comments from ' strings
      '#\"([^\n\"]*?)/\*([^\n\"]*)\"#' => '"\1/"+\'\'+"*\2"', // remove comments from " strings
      '#/\*.*?\*/#s'            => "",      // strip C style comments
      '#[\r\n]+#'               => "\n",    // remove blank lines and \r's
      '#\n([ \t]*//.*?\n)*#s'   => "\n",    // strip line comments (whole line only)
      '#([^\\])//([^\'"\n]*)\n#s' => "\\1\n",
                                            // strip line comments
                                            // (that aren't possibly in strings or regex's)
      '#\n\s+#'                 => "\n",    // strip excess whitespace
      '#\s+\n#'                 => "\n",    // strip excess whitespace
      '#(//[^\n]*\n)#s'         => "\\1\n", // extra line feed after any comments left
                                            // (important given later replacements)
      '#/([\'"])\+\'\'\+([\'"])\*#' => "/*" // restore comments in strings
    );

    $search = array_keys( $replace );
    $script = preg_replace( $search, $replace, $buffer );

    $replace = array(
      "&&\n" => "&&",
      "||\n" => "||",
      "(\n"  => "(",
      ")\n"  => ")",
      "[\n"  => "[",
      "]\n"  => "]",
      "+\n"  => "+",
      ",\n"  => ",",
      "?\n"  => "?",
      ":\n"  => ":",
      ";\n"  => ";",
      "{\n"  => "{",
  //  "}\n"  => "}", (because I forget to put semicolons after function assignments)
      "\n]"  => "]",
      "\n)"  => ")",
      "\n}"  => "}",
      "\n\n" => "\n"
    );

    $search = array_keys( $replace );
    $script = str_replace( $search, $replace, $script );

    return trim( $script );

  }



  function strip_html_tags( $text )
  {
      $text = preg_replace(
          array(
            // Remove invisible content
              '@<head[^>]*?>.*?</head>@siu',
              '@<style[^>]*?>.*?</style>@siu',
              '@<script[^>]*?.*?</script>@siu',
              '@<object[^>]*?.*?</object>@siu',
              '@<embed[^>]*?.*?</embed>@siu',
              '@<applet[^>]*?.*?</applet>@siu',
              '@<noframes[^>]*?.*?</noframes>@siu',
              '@<noscript[^>]*?.*?</noscript>@siu',
              '@<noembed[^>]*?.*?</noembed>@siu',
            // Add line breaks before and after blocks
              '@</?((address)|(blockquote)|(center)|(del))@iu',
              '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
              '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
              '@</?((table)|(th)|(td)|(caption))@iu',
              '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
              '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
              '@</?((frameset)|(frame)|(iframe))@iu',
          ),
          array(
              ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
              "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
              "\n\$0", "\n\$0",
          ),
          $text );
      return strip_tags( $text );
  }

  function strip_punctuation( $text )
  {
      $urlbrackets    = '\[\]\(\)';
      $urlspacebefore = ':;\'_\*%@&?!' . $urlbrackets;
      $urlspaceafter  = '\.,:;\'\-_\*@&\/\\\\\?!#' . $urlbrackets;
      $urlall         = '\.,:;\'\-_\*%@&\/\\\\\?!#' . $urlbrackets;

      $specialquotes  = '\'"\*<>';

      $fullstop       = '\x{002E}\x{FE52}\x{FF0E}';
      $comma          = '\x{002C}\x{FE50}\x{FF0C}';
      $arabsep        = '\x{066B}\x{066C}';
      $numseparators  = $fullstop . $comma . $arabsep;

      $numbersign     = '\x{0023}\x{FE5F}\x{FF03}';
      $percent        = '\x{066A}\x{0025}\x{066A}\x{FE6A}\x{FF05}\x{2030}\x{2031}';
      $prime          = '\x{2032}\x{2033}\x{2034}\x{2057}';
      $nummodifiers   = $numbersign . $percent . $prime;

      return preg_replace(
          array(
          // Remove separator, control, formatting, surrogate,
          // open/close quotes.
              '/[\p{Z}\p{Cc}\p{Cf}\p{Cs}\p{Pi}\p{Pf}]/u',
          // Remove other punctuation except special cases
              '/\p{Po}(?<![' . $specialquotes .
                  $numseparators . $urlall . $nummodifiers . '])/u',
          // Remove non-URL open/close brackets, except URL brackets.
              '/[\p{Ps}\p{Pe}](?<![' . $urlbrackets . '])/u',
          // Remove special quotes, dashes, connectors, number
          // separators, and URL characters followed by a space
              '/[' . $specialquotes . $numseparators . $urlspaceafter .
                  '\p{Pd}\p{Pc}]+((?= )|$)/u',
          // Remove special quotes, connectors, and URL characters
          // preceded by a space
              '/((?<= )|^)[' . $specialquotes . $urlspacebefore . '\p{Pc}]+/u',
          // Remove dashes preceded by a space, but not followed by a number
              '/((?<= )|^)\p{Pd}+(?![\p{N}\p{Sc}])/u',
          // Remove consecutive spaces
              '/ +/',
          ),
          ' ',
          $text );
  }

  function strip_symbols( $text )
  {
      $plus   = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
      $minus  = '\x{2012}\x{208B}\x{207B}';

      $units  = '\\x{00B0}\x{2103}\x{2109}\\x{23CD}';
      $units .= '\\x{32CC}-\\x{32CE}';
      $units .= '\\x{3300}-\\x{3357}';
      $units .= '\\x{3371}-\\x{33DF}';
      $units .= '\\x{33FF}';

      $ideo   = '\\x{2E80}-\\x{2EF3}';
      $ideo  .= '\\x{2F00}-\\x{2FD5}';
      $ideo  .= '\\x{2FF0}-\\x{2FFB}';
      $ideo  .= '\\x{3037}-\\x{303F}';
      $ideo  .= '\\x{3190}-\\x{319F}';
      $ideo  .= '\\x{31C0}-\\x{31CF}';
      $ideo  .= '\\x{32C0}-\\x{32CB}';
      $ideo  .= '\\x{3358}-\\x{3370}';
      $ideo  .= '\\x{33E0}-\\x{33FE}';
      $ideo  .= '\\x{A490}-\\x{A4C6}';

      return preg_replace(
          array(
          // Remove modifier and private use symbols.
              '/[\p{Sk}\p{Co}]/u',
          // Remove mathematics symbols except + - = ~ and fraction slash
              '/\p{Sm}(?<![' . $plus . $minus . '=~\x{2044}])/u',
          // Remove + - if space before, no number or currency after
              '/((?<= )|^)[' . $plus . $minus . ']+((?![\p{N}\p{Sc}])|$)/u',
          // Remove = if space before
              '/((?<= )|^)=+/u',
          // Remove + - = ~ if space after
              '/[' . $plus . $minus . '=~]+((?= )|$)/u',
          // Remove other symbols except units and ideograph parts
              '/\p{So}(?<![' . $units . $ideo . '])/u',
          // Remove consecutive white space
              '/ +/',
          ),
          ' ',
          $text );
  }

  function strip_numbers( $text )
  {
      $urlchars      = '\.,:;\'=+\-_\*%@&\/\\\\?!#~\[\]\(\)';
      $notdelim      = '\p{L}\p{M}\p{N}\p{Pc}\p{Pd}' . $urlchars;
      $predelim      = '((?<=[^' . $notdelim . '])|^)';
      $postdelim     = '((?=[^'  . $notdelim . '])|$)';

      $fullstop      = '\x{002E}\x{FE52}\x{FF0E}';
      $comma         = '\x{002C}\x{FE50}\x{FF0C}';
      $arabsep       = '\x{066B}\x{066C}';
      $numseparators = $fullstop . $comma . $arabsep;
      $plus          = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
      $minus         = '\x{2212}\x{208B}\x{207B}\p{Pd}';
      $slash         = '[\/\x{2044}]';
      $colon         = ':\x{FE55}\x{FF1A}\x{2236}';
      $units         = '%\x{FF05}\x{FE64}\x{2030}\x{2031}';
      $units        .= '\x{00B0}\x{2103}\x{2109}\x{23CD}';
      $units        .= '\x{32CC}-\x{32CE}';
      $units        .= '\x{3300}-\x{3357}';
      $units        .= '\x{3371}-\x{33DF}';
      $units        .= '\x{33FF}';
      $percents      = '%\x{FE64}\x{FF05}\x{2030}\x{2031}';
      $ampm          = '([aApP][mM])';

      $digits        = '[\p{N}' . $numseparators . ']+';
      $sign          = '[' . $plus . $minus . ']?';
      $exponent      = '([eE]' . $sign . $digits . ')?';
      $prenum        = $sign . '[\p{Sc}#]?' . $sign;
      $postnum       = '([\p{Sc}' . $units . $percents . ']|' . $ampm . ')?';
      $number        = $prenum . $digits . $exponent . $postnum;
      $fraction      = $number . '(' . $slash . $number . ')?';
      $numpair       = $fraction . '([' . $minus . $colon . $fullstop . ']' .
          $fraction . ')*';

      return preg_replace(
          array(
          // Match delimited numbers
              '/' . $predelim . $numpair . $postdelim . '/u',
          // Match consecutive white space
              '/ +/u',
          ),
          ' ',
          $text );
  }

  function remove_unwanted_words($str_arr){
  	$new_arr = array();
  	foreach ($str_arr as $word) {
  		if(strpos($word, '\u0') === false && strpos($word, 'featurecopy') === false && strpos($word, '-') === false && strpos($word, '_') === false){
  			$new_arr[] = $word;
  		}
  	}

  	return $new_arr;
  }

  function getReadableFileSize($bytes) {
    $units = array("b", "kb", "mb", "gb", "tb", "pb", "eb", "zb", "yb");
    $e = floor(log($bytes)/log(1024));

    $size = 0;
    if($bytes > 0)
        $size = sprintf('%.0f '.$units[$e], ($bytes/pow(1024, floor($e))));

    return $size;
  }

  function getReaderHTML($path, $is_embed = true, $width = '100%', $height = '500')
{
    $CI = get_instance();

    $host = $CI->config->item('base_url');
    
    $reader = '';

    $src = $host.'/'.$path;

    $alternate_reader = 'google';

    $embed_param = "&embedded=true";

    $reader = 'https://docs.google.com/viewer?url='.urlencode($src).$embed_param;

    $reader_HTML = "<div style='width: ".$width."px; height: ".$height."px'><iframe id='iframeID' src='".$reader."' frameborder=0 width='".$width."' height='".$height."'></iframe></div>";
    
    return $reader_HTML;
}
function dd($data)
{
    echo '<pre>';
        print_r($data);
    echo '</pre>';
    die();
}
?>
