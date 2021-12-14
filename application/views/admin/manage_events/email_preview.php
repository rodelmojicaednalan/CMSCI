<?php
    $user_firstname = isset($event->user_firstname) ? $event->user_firstname : 'EVENT OWNER';
    $invitation = $user_firstname.' has invited you to the following event:';
    $event_title = isset($event->event_title) ? $event->event_title : 'Event title here...';
    $event_location = isset($event->event_location) ? $event->event_location : '';

    $start_seconds = isset($event->event_start_time) ? strtotime($event->event_start_time) : '';
    $end_seconds = isset($event->event_end_time) ? strtotime($event->event_end_time) : '';

    $event_date = '';
    if(isset($event->event_start_time) && isset($event->event_end_time)){
        if(date('l, F j, Y', $start_seconds) == date('l, F j, Y', $end_seconds)){ //same date
            $event_date = date('l, F j, Y', $start_seconds).', '.date('h:ia', $start_seconds) .'-'. date('h:ia', $end_seconds);
        }else{
            $event_date = date('l, F j, Y', $start_seconds).' - '.date('l, F j, Y', $end_seconds).', '.date('h:ia', $start_seconds) .'-'. date('h:ia', $end_seconds);
        }
    }


    $email_message = isset($event->event_email_message) ? $event->event_email_message : 'Email message here....';
?>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#ffffff">
  <tr>
    <td align="center" valign="top">
      <table width="757" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top">
            <table width="757" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="25"></td>
                <td class="text" style="color:#55524c; font-family:Arial; font-size:14px; line-height:18px; text-align:left">
                  <?php echo $invitation ?>

                  <div class="h3" style="color:#55524c; font-family:Arial; font-size:18px; line-height:22px; text-align:left; font-weight:bold"><?php echo $event_title?></div>

                  <?php print $event_date.(trim($event_location) != '' ? ' at '.$event_location : ''); ?>

                  <br />
                  <br />
                  Personal message from <?php echo $user_firstname?>:
                  <br />

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="27"></td>
                      <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="1" bgcolor="#dedede"></td>
                      <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="8"></td>
                      <td class="text" style="color:#55524c; font-family:Arial; font-size:14px; line-height:18px; text-align:left">

                        <em class="preview-event-text"><?php echo $email_message ?></em>

                      </td>
                    </tr>
                  </table>
                  <br />
                  <br />


                  For support or technical questions, please contact: <a href="mailto:support@<?php echo getSubDomain() ?>.com" target="_blank" class="link-2" style="color:#003663; text-decoration:underline">support@<?php echo getSubDomain() ?>.com</a>
                  <br />
                  <br />
                  <span style="font-size:12px">You received this email invitation because the event organizer personally provided your email address. If you have questions, please contact the organizer directly by replying to this email.</span>

                </td>
                <td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="25"></td>
              </tr>
            </table>

          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
