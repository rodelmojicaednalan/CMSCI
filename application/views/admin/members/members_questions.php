
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Member Questions</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Member Questions</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
        </div> <!-- container -->
    </div> <!-- content -->
    <!--begin page content here-->
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">
                            Community Marketing Questions
                            </h4>
                            
                                <p>
                                    Use this page to create questionnaires, polls and gather marketing information from site Members. To add a question choose the type of question, then hit the Add a Question button. To see a report of previous questionnaires, click the View Report Button. To edit your questions, click the edit button, click the delete button to delete the question. To save your questionnaire, click the Save button at the bottom of the page. 
                                </p>
                                <p>
                                Click the Question mark in the circle for further explanation on how to use a feature.
                                </p>
                                <span class="button-list mb-2">
                                    <!-- Custom width modal -->
                                    <button type="button" class="btn btn-lg btn-primary" id="btn_view_report" data-toggle="modal" data-target="#viewreports-modal" <?= (count($user_answer_count) == 0) ?"disabled" : "" ?>>View Reports</button>
                                </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin modal content -->
        <!--View Reports Modal Here-->
        <!--end View reports modal-->
        <!--VIEW REPORTS Modal-->

        <!-- php function counts -->
        <?php
        $user_count = count($user_answer_count);
       
        $user_complete = 0;
    
        foreach ($user_answer_count as $user_answer) {
            if ($user_answer->answered_questions >= $question_count)
              $user_complete++;
          }
          if($user_count != 0){
            $user_complete_percent = floor($user_complete/$user_count * 100);
          } else {
             $user_complete_percent = 0;
          }
       
        $user_incomplete = $user_count - $user_complete;
        $user_incomplete_percent = 100 - $user_complete_percent;
   
        ?>
        <input type="hidden" value="<?=$user_complete_percent?>,<?= $user_incomplete_percent?>" id="chart-value">
        <div id="viewreports-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Marketing Question Reports</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form class="pl-3 pr-3" action="#"><!--add your PHP magic for this form submit-->
                                    <h4>View Your Question Reports</h4>
                                    <div class="row">
                                <div class="col-sm">
                                        <h4 class="header-title mb-4">Question Responses</h4><!--replace the header after you add the real content-->
                        <div class="donut-container text-center" style="width: 100%;"></div>
                        <div class="legend-chart-container text-center">
                            <canvas id="answer-question"></canvas>
                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <h4 class="header-title mb-4">Summary</h4>
                                        <p class="text-muted"><!--YOU NEED TO ADD PHP IN HERE TO GET THE REAL DATA-->
                                            <span id="took_count"><b><?= $user_count ?></b></span> people took the  <?= ucfirst(getSubDomain()) ?>  Marketing Report.
                                            </p>
                                            <p class="text-muted"><!--YOU NEED TO ADD PHP IN HERE TO GET THE REAL DATA-->
                                            <?= $user_complete?> (<?= $user_complete_percent ?> %) people completed the online Questionarrie.
                                                </p>
                                                <p class="text-muted"><!--YOU NEED TO ADD PHP IN HERE TO GET THE REAL DATA-->
                                                <?= $user_incomplete?> (<?= $user_incomplete_percent ?> %) did not complete it.
                                                    </p>
                                                        <!--this link should take them to the questionarrie's page on their site-->
                                                        <p> <a href="#">View the Questionarrie</a></p>
                                    </div>
                                </div>
                                <h5 class="header-title mb-2">View Other Reports</h5>
                                <div class="row">
                                    <div class="col">
                                        <form id=""><!--this form allows the user to see the reports for their questionarries - add the necessary php here-->
                                            <form class="form-inline text-center">
                                                    <div class="form-group mb-2">
                                                            <label for="example-select">Choose a Question</label>
                                                            <select class="form-control" id="select-question-option"><!--replace with real content PHP-->
                                                                <option value=""></option>
                                                            </select>
                                                    </div>
                                                    
                                                </div>
                                                <!--after the uses chooses one of their questions this button should be used to submit their choice. the user's data will overwrite the data in this modal and display this data.-->
                                                <div class="col mt-3">
                                                    <button type="submit" id="btn_view_qdetails" class="btn btn-primary mb-2">View Reports</button>
                                                </div>
                                                    </form>
                               
                                    </div>
                                <div id="question_details_box" class="col pr-3 pl-3">

                                </div>
                                <div class="modal-footer">    
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-outline-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Close&nbsp;</button>
                                </div>
                            </div><!--end row-->
                            
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <!--Single Answer Modal-->
        <div id="singleanswer-modal" class="modal fade select-modal" tabindex="-1" data-id="4" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Marketing Questions</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <!-- <form class="pl-3 pr-3" action="#">add your PHP magic for this form submit -->
                           <?= form_open('/admin/create_questions', array('id' => 'singleanswer_form', 'class' => 'pl-3 pr-3')) ?> 
                            <div class="col-sm">
                                <h4>Single Answer Question</h4>
                                <p class="text-muted">
                                    User can select only one answer. To add another question to your questionnaire hit the Save and Add New button. When your Questionnaire is finished hit the Finish Button.
                                </p>
                                <div class="button-list mb-2">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#singleanswer-example-modal">See Example</button>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="singleanswer">Single Answer Question</label>
                                    <input class="form-control" type="text" id="singleanswer" name="group_question_title" placeholder="Type Your Question" required>
                                </div>
                            </div> <!-- end col -->
                            <div class="single-ans-box">
                                <div class="col-sm" >
                                    <div class="input-group mb-2">
                                        <!--<label for="multiple-answer1">Answer 1</label>-->
                                        <input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="btn_remove"  type="button">X</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm" >
                                    <div class="input-group mb-2">
                                        <!--<label for="multiple-answer1">Answer 1</label>-->
                                        <input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="btn_remove"  type="button">X</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm" >
                                    <div class="input-group mb-2">
                                        <!--<label for="multiple-answer1">Answer 1</label>-->
                                        <input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="btn_remove"  type="button">X</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="group_question_is_required" id="requiredCheck1">
                                <label class="custom-control-label" for="requiredCheck1">Require this question to be answered.</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="group_question_has_other" class="custom-control-input" id="moreCheck2">
                                <label class="custom-control-label" for="moreCheck2">Add more room for additional information to be added. </label>
                                <div class="additional-info2">

                                </div>
                            </div>
                        </div>
                            <div class="form-group text-right"><!--this adds another line for another question-->
                                <button id="add-single-answer" class="btn btn-lg btn-secondary mb-3" type="button">Add Another Answer</button>&nbsp;&nbsp;
                            
                            </div>
                            <div class="modal-footer">
                            <div class="form-group text-center">
                                <input type="hidden" name="group_question_id" value="">
                                <input type="hidden" name="answer_type_id" value="4">
                                <button id="cancel" class="btn btn-lg btn-secondary mb-3" type="reset">Cancel</button>&nbsp;&nbsp;
                                <button id="save_single_answer" class="btn btn-lg btn-info mb-3" type="submit">&nbsp;Save &amp; Add New</button>&nbsp;&nbsp;&nbsp;
                                <button id="finish_single_answer" class="btn btn-lg btn-primary mb-3" type="submit">&nbsp;Finish&nbsp;</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                        <!-- </form> -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
         <!--Single Edit Answer Modal-->
         
            <!-- Single Answer Example Modal -->
            <div id="singleanswer-example-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="singleanswer-exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modal-filled bg-secondary">
                        <div class="modal-header">
                            <h4 class="modal-title" id="singleanswer-exampleModalLabel">Single Answer Example</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="col-md-6">
                                <h4 class="header-title mt-5 mt-sm-0">Do you like pie?</h4>
                                <div class="mt-3">
                                    <form id="example">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">No</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio3">Sometimes</label>
                                    </div>
                                    
                                    <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" aria-label="Other">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Other">
                                            </div>
                                        
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                        </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--Multiple Answer Modal-->
            <div id="multipleanswer-modal" class="modal fade select-modal" data-id="3" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Marketing Questions</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"> 
                            <!-- <form class="pl-3 pr-3" action="#">add your PHP magic for this form submit -->
                                <?= form_open('/admin/create_questions', array('class' => 'pl-3 pr-3', 'id' => 'multipleanswer_form')) ?>
                                <div class="col-sm">
                                    <h4>Multiple Answer Question</h4>
                                    <p class="text-muted">
                                        User can select mulitple answers. To add another question to your questionnaire hit the Save and Add New button. When your Questionnaire is finished hit the Finish Button.
                                    </p>
                                    <div class="button-list mb-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#multipleanswer-example-modal">See Example</button>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="multipleanswer">Multiple Answer Question</label>
                                        <input class="form-control" type="text" name="group_question_title" id="multipleanswer" placeholder="Type Your Question" required>
                                    </div>
                                </div> <!-- end col -->
                                <div class="multiple-ans-box">
                                    <div class="col-sm" >
                                        <div class="input-group mb-2">
                                            <!--<label for="multiple-answer1">Answer 1</label>-->
                                            <input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="btn_remove"  type="button">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm" >
                                        <div class="input-group mb-2">
                                            <!--<label for="multiple-answer1">Answer 1</label>-->
                                            <input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="btn_remove"  type="button">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm" >
                                        <div class="input-group mb-2">
                                            <!--<label for="multiple-answer1">Answer 1</label>-->
                                            <input class="form-control" name="answer[]" type="text" id="multiple-answer1" placeholder="Type Your Answer">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="btn_remove"  type="button">X</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="group_question_is_required" id="multiple-requiredCheck1">
                                    <label class="custom-control-label"  for="multiple-requiredCheck1">Require this question to be answered.</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="group_question_has_other" id="multiple-moreCheck2">
                                    <label class="custom-control-label"  for="multiple-moreCheck2">Add more room for additional information to be added. </label>
                                    <div class="additional-info">
                                    </div>
                                </div>
                            </div>
                                <div class="form-group text-right"><!--this adds another line for another question-->
                                    <button id="add-multiple-answer" class="btn btn-lg btn-secondary mb-3" type="button">Add Another Answer</button>&nbsp;&nbsp;
                                
                                </div>
                                <div class="modal-footer">
                                <div class="form-group text-center">
                                    <input type="hidden" name="group_question_id" value="">
                                    <input type="hidden" name="answer_type_id" value="3">
                                    <button id="cancel" class="btn btn-lg btn-secondary mb-3" type="reset">Cancel</button>&nbsp;&nbsp;
                                    <button id="save_multiple_answer" class="btn btn-lg btn-info mb-3" type="submit">&nbsp;Save &amp; Add New</button>&nbsp;&nbsp;&nbsp;
                                    <button id="finish_multiple_answer" class="btn btn-lg btn-primary mb-3" type="submit">&nbsp;Finish&nbsp;</button>
                                </div>
                            </div>
                            <?= form_close(); ?>
                            <!-- </form> -->
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                <!-- Multiple Answer Example Modal -->
                <div id="multipleanswer-example-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="singleanswer-exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-filled bg-secondary">
                            <div class="modal-header">
                                <h4 class="modal-title" id="singleanswer-exampleModalLabel">Multiple Answer Example</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="col-md-6">
                                    <h4 class="header-title mt-5 mt-sm-0">What are your favorite colors?</h4>
                                    <div class="mt-3">
                                        <form id="example">
                                                <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Red</label>
                                                    </div>
                                                <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">Blue</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                        <label class="custom-control-label" for="customCheck3">Green</label>
                                                    </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="customRadio4" name="customCheckbox" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio4">Other</label>
                                            <div class="form-group">
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Type your response.">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                            </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                        <!--Single Line Modal-->
            <div id="singleline-modal" class="modal fade select-modal" data-id="1" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Marketing Questions</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <!-- <form class="pl-3 pr-3" action="#">add your PHP magic for this form submit -->
                                <?= form_open('/admin/create_questions', array('class' => 'pl-3 pr-3', 'id' => 'singleline_form')) ?>
                                <div class="col-sm">
                                    <h4>Single Line Answer Question</h4>
                                    <p class="text-muted">
                                        User can answer with one line for a shorter answer. To add another question to your questionnaire hit the Save and Add New button. When your Questionnaire is finished hit the Finish Button.
                                    </p>
                                    <div class="button-list mb-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#singleline-example-modal">See Example</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="singleline">Single Line Answer Question</label>
                                        <input name="group_question_title" class="form-control" type="text" id="multipleanswer" placeholder="Type Your Question" required>
                                    </div>
                                </div> <!-- end col -->
                            
                                <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="group_question_is_required" class="custom-control-input" id="singleline-requiredCheck1">
                                    <label class="custom-control-label" for="singleline-requiredCheck1">Require this question to be answered.</label>
                                </div>
                            </div>
                                <div class="modal-footer">
                                <div class="form-group text-center">
                                    <input type="hidden" name="group_question_id" value="">
                                    <input type="hidden" name="answer_type_id" value="1">
                                    <button id="cancel" class="btn btn-lg btn-secondary mb-3" type="reset">Cancel</button>&nbsp;&nbsp;
                                    <button id="save_singleline" class="btn btn-lg btn-info mb-3" type="button">&nbsp;Save &amp; Add New</button>&nbsp;&nbsp;&nbsp;
                                    <button id="finish_singleline" class="btn btn-lg btn-primary mb-3" type="submit">&nbsp;Finish&nbsp;</button>
                                </div>
                            </div>
                            <?= form_open('singleline_form') ?>
                            <!-- </form> -->
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                <!-- SINGLE LINE Answer Example Modal -->
                <div id="singleline-example-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="singleline-exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-filled bg-secondary">
                            <div class="modal-header">
                                <h4 class="modal-title" id="singleline-exampleModalLabel">Single Line Answer Example</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="col-md">
                                    <h4 class="header-title mt-5 mt-sm-0">What is your favorite type of music?</h4>
                                    <div class="mt-3">
                                        <form id="example">
                                                <div class="form-group mb-3">
                                                        <label for="simpleinput">Type Your Answer Here</label>
                                                        <input type="text" id="simpleinput" class="form-control">
                                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                            </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                                    <!--Mulitple Line Modal-->
            <div id="multipleline-modal" class="modal fade select-modal" data-id="2" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Marketing Questions</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <!-- <form class="pl-3 pr-3" action="#">add your PHP magic for this form submit -->
                            <?= form_open('/admin/create_questions', array('class' => 'pl-3 pr-3', 'id' => 'multipleline_form')) ?>    
                                <div class="col-sm">
                                    <h4>Multiple Line Answer Question</h4>
                                    <p class="text-muted">
                                        User can answer with more than one line for a longer answer. To add another question to your questionnaire hit the Save and Add New button. When your Questionnaire is finished hit the Finish Button.
                                    </p>
                                    <div class="button-list mb-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#multipleline-example-modal">See Example</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="singleline">Multiple Line Answer Question</label>
                                        <input name="group_question_title" class="form-control" type="text" id="multipleanswer" placeholder="Type Your Question" required>
                                        
                                    </div>
                                </div> <!-- end col -->
                            
                                <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="group_question_is_required" id="multipleline-requiredCheck1">
                                    <label class="custom-control-label" for="multipleline-requiredCheck1">Require this question to be answered.</label>
                                </div>
                            </div>
                                <div class="modal-footer">
                                <div class="form-group text-center">
                                    <input type="hidden" name="group_question_id" value="">
                                    <input type="hidden" name="answer_type_id" value="2">
                                    <button id="cancel" class="btn btn-lg btn-secondary mb-3" type="reset">Cancel</button>&nbsp;&nbsp;
                                    <button id="save_multipleline" class="btn btn-lg btn-info mb-3" type="submit">&nbsp;Save &amp; Add New</button>&nbsp;&nbsp;&nbsp;
                                    <button id="finish_multipleline" class="btn btn-lg btn-primary mb-3" type="submit">&nbsp;Finish&nbsp;</button>
                                </div>
                            </div>
                            <?= form_close(); ?>
                            <!-- </form> -->
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                <!-- Multiple LINE Answer Example Modal -->
                <div id="multipleline-example-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multipleline-exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-filled bg-secondary">
                            <div class="modal-header">
                                <h4 class="modal-title" id="multipleline-exampleModalLabel">Multiple Line Answer Example</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="col-md">
                                    <h4 class="header-title mt-5 mt-sm-0">How does music make you feel?</h4>
                                    <div class="mt-3">
                                        <form id="example">
                                                <div class="form-group mb-3">
                                                        <label for="example-textarea">Type your answer here</label>
                                                        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                            </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            <!--End Modals begin Page Content-->
         <!-- Warning Alert Modal -->
        <div id="question-warning-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-warning">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <a href="#" data-dismiss="modal"><i class="dripicons-warning h1"></i></a>
                            <h4 class="mt-2">Please Select Question Type</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
          <!-- Danger Alert Modal -->
          <div id="question-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-danger">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <a href="#" data-dismiss="modal"><i class="dripicons-wrong h1"></i></a>
                            <h4 class="mt-2">Are you Certain?</h4>
                            <p class="mt-3">This will delete this question. Are you sure you want to do this?</p>
                            <button type="button" class="btn btn-light my-2" id="delete_question" data-dismiss="modal">Delete Question</button><!--change so that it deletes the widget-->
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div><!--end container-->
    <div class="container"><!--begin new container-->
        <div class="row"><!--begin new row-->
            <div class="col-10">
                    <!--define the form action below-->
                    <!--begin page form-->
                    <div class="row">
                        <div class="col-md">
                            <div class="card border">
                                <div class="card-body">
                                    <form action=""><!--this should launch the modals above-->
                                            <span class="form-group col">
                                                <!--ATTENTION MELVIN - THESE CHOICES SHOULD LAUNCH THE MODALS ABOVE-->
                                                    <label for="questionnaire-select">To create a Questionarrie, Choose the type of questionnaire to create from the options below.<a href="#" data-toggle="tooltip" title="" data-original-title="JORDAN Replace Me"><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>     
                                                </span>
                                                <span class="form-check">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="singleanswer-modal" value="option1">
                                                    <label class="form-check-label" for="singleanswer">Single Answer</label><!--this should launch the singleanswer-modal-->
                                                </span>
                                                    <span class="form-check">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="multipleanswer-modal" value="option2">
                                                    <label class="form-check-label" for="multipleanswer">Multiple Answer</label><!--this should launch the multiple answer modal-->
                                                    </span>
                                                    <span class="form-check">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="singleline-modal" value="option3">
                                                    <label class="form-check-label" for="singleline">Single Line</label><!--this should launch the single line modal-->
                                                    </span>
                                                    <span class="form-check">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="multipleline-modal" value="option2">
                                                        <label class="form-check-label" for="multipleline">Multiple Line</label><!--this should launch the multiple lines modal-->
                                                        </span>
                                                        <button type="submit" id="btn_qmodal" class="btn btn-info btn-block mt-3">Launch Modal</button>
                                                    </form>
                                </div>
                            </div>
                            </div>
                            </div><!--end row-->
                            </form>
                            <div class="row">
                                <div class="col-lg-12" id="questions-container">
                                    <?php $count = 1; 
                                        foreach($question_obj as $question): ?>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <label><?= $count++ .'. '. $question->group_question_title ?></label>
                                                    <?php if($question->answer_type_id == 1):  ?>
                                                        <input type="text" class="form-control mb-1">
                                                    <?php elseif($question->answer_type_id == 2): ?>
                                                        <textarea class="form-control mb-1" id="example-textarea" rows="5"></textarea>
                                                    <?php elseif($question->answer_type_id == 3): ?>
                                                        <?php if($question->answer_options != ""): //$answers = explode(",",$question->group_question_answer_options) ?>
                                                            <?php foreach($question->answer_options as $answer): ?>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <input type="checkbox">&nbsp<label for=""><?= $answer ?>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                        <?php elseif($question->answer_type_id == 4): ?>
                                                        <?php if($question->answer_options != ""): //$answers = explode(",",$question->group_question_answer_options) ?>
                                                            <?php foreach($question->answer_options as $answer): ?>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <input type="radio" name="radio">&nbsp<label for=""><?= $answer ?>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <button type="button" class="btn btn-sm btn-primary" id="edit_question" data-activityid ="<?= $question->answer_type_id ?>" data-id="<?= $question->group_question_id ?>">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-danger" id="confirm_delete"  data-id="<?= $question->group_question_id ?>">Delete</button>
                                                </div>
                                            </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
    
            </div><!--end col 10 div-->
        </div> <!--end row-->
    </div> <!--end container-->
    <!--end page content-->
    <script>

</script>