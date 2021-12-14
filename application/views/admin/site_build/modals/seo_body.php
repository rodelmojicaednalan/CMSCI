<?php
$inx = arraySearchMetaValue('title', $metadata);
if(isset($inx) && trim($metadata[$inx]['value']) != '')
  $titleobj = $metadata[$inx];

$inx = arraySearchMetaValue('description', $metadata);
if(isset($inx) && trim($metadata[$inx]['value']) != '')
  $descobj = $metadata[$inx];

$inx = arraySearchMetaValue('keywords', $metadata);
$stated_keywords = array();
if(isset($inx) && trim($metadata[$inx]['value']) != ''){
  $keywordsobj = $metadata[$inx];
  $tmp_keywords = explode(',', $keywordsobj['value']);

  foreach ($tmp_keywords as $kword) {
      $stated_keywords[] = trim($kword);
  }
}


//get keywords
$stop_words = unserialize(STOP_WORDS);

//append title and description
$body .= isset($titleobj) ? ' '.$titleobj['value'] : '';
$body .= isset($descobj) ? ' '.$descobj['value'] : '';

$bodytitledesc = $body;

$body = strip_html_tags($body);
$body = html_entity_decode( $body, ENT_QUOTES, "utf-8" );
$body = strip_punctuation( $body );
$body = strip_symbols( $body );
$body = strip_numbers( $body );
$body = mb_strtolower( $body, "utf-8" );
mb_regex_encoding( "utf-8" );
$words = mb_split( ' +', $body );

$words = array_diff( $words, $stop_words );
$words = remove_unwanted_words($words);

$keywordCounts = array_count_values( $words );

foreach ($stated_keywords as $skval) {
    if(array_search($skval, array_keys( $keywordCounts )) == false){
        $keywordCounts[$skval] = 0;
    }
}

arsort( $keywordCounts, SORT_NUMERIC );
$uniqueKeywords = array_keys( $keywordCounts );
//end get keywords

//extract images
$all_images = extract_images_html($whole);
//end extract images

$headings = extract_headings($whole);
?>

<h4>Your Page SEO</h4>
<!--You will need to add some PHP to make this be dynamic-->
  <div class="col-sm">
      <div class="form-group">
          <label for="page-url">Page URL&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is this page's URL"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
          <!--Replace with dynamic information for real page URL--><p class="text-muted"><?=$url?></p>
      </div>
  </div>
  <div class="col-sm">
        <div class="form-group">
            <label for="title">Title</label>
            <!--Change to dynamic page title--><p class="text-muted"><?=isset($titleobj['value']) ? $titleobj['value'] : 'Title tag is not set.'?></p>
        </div>
    </div>
             <div class="col-lg">
                <div class="form-group mb-2">
                      <label for="page-description">Page Description&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="This is the page description that you wrote in your page's Metadata. This is why search engines will see."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                     <!--Change to dynamic page description--> <p class="text-muted"><?=isset($descobj['value']) ? $descobj['value'] : 'Meta Description is not set.'?></p>
                    </div>
                </div>
           <div class="col">
              <div class="form-group">
            <label for="keywords">Keywords&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="These are the keywords that have been searched for on your page and the yield frequency."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
            <div class="table-responsive-sm">
              <table class="table table-sm table-centered mb-0">
                  <thead>
                      <tr>
                          <th>Keywords</th>
                          <th>Frequency</th>
                      </tr>
                  </thead>

                  <?php if(count($keywordCounts) > 0){ ?>
                            <tbody class="table-hover">
                              <?php foreach ($keywordCounts as $key => $value) {
                                        if(trim($key) == '')
                                            continue;
                              ?>
                                          <tr><!--Should be dynamic keywords from the page-->
                                              <td><?=$key?></td>
                                              <td><?=(String)$value?></td><!--should be dynamic frequency from the page-->
                                          </tr>
                              <?php } ?>
                            </tbody>
                  <?php }else{ ?>
                            <tbody class="table-hover">
                                <tr><!--Should be dynamic keywords from the page-->
                                    <td>Keywords not set.</td>
                                    <td> </td><!--should be dynamic frequency from the page-->
                                </tr>
                            </tbody>
                  <?php } ?>

              </table>
          </div> <!-- end table-responsive-->
        </div><!--end form group-->
      </div><!--end table col-->

      <?php
          $imagecnt = count($all_images);
          $imagetblstr = '';
          $noaltcnt = 0;

          foreach ($all_images as $key => $value) {
              if(trim($value['alt']) == '')
                $noaltcnt++;

              $imagetblstr .= '<tr>';
              $imagetblstr .= '<td>'.$value['filename'].'</td>';
              $imagetblstr .= '<td>'.$value['alt'].'</td>';
              $imagetblstr .= '<td>'.($value['filesize'] == 'NaN b' ? '0' : $value['filesize']).'</td>';
              $imagetblstr .= '</tr>';
          }
      ?>

      <div class="col-sm mt-3">
         <div class="form-group">
             <label for="images">Images</label>
             <div class="table-responsive-sm">
                   <table class="table table-striped table-sm table-centered mb-0">
                     <thead class="thead-dark">
                      <th>File Name</th>
                      <th>Alt</th>
                       <th>Filesize</th>
                     </thead>
                     <tbody>
                        <?=$imagetblstr?>
                     </tbody>
                   </table>
                 </div>
         </div>
      </div>
      <div class="col-sm mt-2">
         <div class="form-group">
             <label for="headings">Headings</label>
             <div class="table-responsive-sm">
                   <table class="table table-striped table-sm table-centered mb-0">
                     <thead class="thead-dark">
                       <th>h1</th>
                       <th>h2</th>
                       <th>h3</th>
                       <th>h4</th>
                       <th>h5</th>
                       <th>h6</th>
                     </thead>
                     <tbody>
                       <tr>
                           <td><?=isset($headings['h1']) ? (String)$headings['h1']['count'] : '<i class="fa fa-times" aria-hidden="true"></i>'?></td>
                           <td><?=isset($headings['h2']) ? (String)$headings['h2']['count'] : '<i class="fa fa-times" aria-hidden="true"></i>'?></td>
                           <td><?=isset($headings['h3']) ? (String)$headings['h3']['count'] : '<i class="fa fa-times" aria-hidden="true"></i>'?></td>
                           <td><?=isset($headings['h4']) ? (String)$headings['h4']['count'] : '<i class="fa fa-times" aria-hidden="true"></i>'?></td>
                           <td><?=isset($headings['h5']) ? (String)$headings['h5']['count'] : '<i class="fa fa-times" aria-hidden="true"></i>'?></td>
                           <td><?=isset($headings['h6']) ? (String)$headings['h6']['count'] : '<i class="fa fa-times" aria-hidden="true"></i>'?></td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
         </div>
      </div>

    <!--end column-->
    <div class="modal-footer">
    <div class="form-group text-center"><!--Can you add a Javascript Plugin so that the modal will open the print dialog onClick?-->
        <button id="print" class="btn btn-lg btn-primary mb-3" type="print">&nbsp;Print&nbsp;</button>
    </div>
</div><!--end modal footer-->
