<?php 


function addConference($group_id, $memberlist, $functionid) {
    $CI =& get_instance();
    $CI->load->model('BoomityConferencemodel');
    
        $countconfnumbers = $CI->BoomityConferencemodel->get(array('count' => 1, 'free_conf_num' => 1));
        $count = $countconfnumbers;

        if($count < 1){
            //mailConfCount($count);
        } else {

            if($count > 0 && $count < 11){
               // mailConfCount($count);
               }

            $getFreeConfNum = $CI->BoomityConferencemodel->get(array('limit' => 1, 'free_conf_num' => 1));
            $confNum = $getFreeConfNum;

            foreach($confNum as $conf){
                $confNumberId = $conf->conference_number_id;
              }

            $params = [
                'groupId'   => $group_id,
                'confNumId' => $confNumberId,
                'userId'    => $memberlist,
                'functionid'=> $functionid
            ];

            $updategroupconfnum = $CI->BoomityConferencemodel->update($params);

            if($updategroupconfnum){
                return $updategroupconfnum[0];
            }else{
                  return false;
            }
          }
}


/* not finished yet 
    for park 
*/
// function mailConfCount($count){
//     $to          = 'humberto@boomity.com';
//     $subject  = 'Conference Numbers on boomity.org';
//     $message  = 'Please add more conference call numbers for the domain boomity.org, currently there are '.$count.' left.';
//     //$to        = 'humberto@boomity.com';
//     // $subject  = 'Conference Numbers on ' . MAIN_DOMAIN_NAME;
//     // $message  = 'Please add more conference call numbers for the domain '.MAIN_DOMAIN_NAME.', currently there are '.$count.' left.';
//     $headers  = 'MIME-Version: 1.0' . "\r\n";
//     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//     $headers .= 'From: Boomity <admin@boomity.com>' . "\r\n";
//     mail($to, $subject, $message, $headers);
// }

?>