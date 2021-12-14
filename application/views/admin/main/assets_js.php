<!--THESE INLINE SCRIPTS SHOULD BE MOVED TO AN OUTSIDE JS FILE-->
<script>
$('#myCollapse').on('shown.bs.collapse', function (e) {
   // Action to execute once the collapsible area is expanded
   })
 </script>
<script>
   //Get the current year for the copyright
   $("#year").text(new Date().getFullYear());
 </script>

<script>
    var base_url    = "<?= base_url('') ?>";
    var session_uid = "<?= $this->session->userdata['logged_in']['user_obj']->user_id ?>";
</script>
<!--THE APEX CHARTS SCRIPTS ARE OPTIONAL FOR THE ADMIN ONLY IF YOU CAN MAKE IT WORK-->
<!-- bundle -->
<script src="/assets/js/app.js?v=<?=ASSETS_VERSION?>"></script>

<script src="/vendor/needim/noty/lib/noty.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/functions.js?v=<?=ASSETS_VERSION?>"></script>

<script src="/assets/js/pages/demo.form-wizard.js"></script>
<!-- third party js -->
<script src="/assets/js/vendor/Chart.bundle.min.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/jquery-jvectormap-1.2.2.min.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/jquery-jvectormap-world-mill-en.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/jquery.dataTables.js?v=<?=ASSETS_VERSION?>"></script>

    <!--This is the Table Sorting and Responsive Table JS-->
<script src="/assets/js/vendor/dataTables.bootstrap4.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/dataTables.responsive.min.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/responsive.bootstrap4.min.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/dataTables.buttons.min.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/buttons.bootstrap4.min.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/dataTables.keyTable.min.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/vendor/dataTables.select.min.js?v=<?=ASSETS_VERSION?>"></script>
    <!--end Table Sorting and REsponsive Table Js-->
<!-- third party js ends -->

<!-- third party:js -->
<script src="/assets/js/vendor/apexcharts.min.js?v=<?=ASSETS_VERSION?>"></script>
<!-- third party end -->

<script src="/assets/js/vendor/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js?v=<?=ASSETS_VERSION?>"></script>
<script>
$('[data-toggle="datetimepicker"]').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy-mm-dd hh:ii:00'
        // format: 'dd/mm/yyyy hh:ii'
});
</script>



<!-- third party, froala js -->
<script src="/assets/js/vendor/froala_editor.pkgd.min.js"></script>
<!-- end froala js -->
<!-- Dragula js -->
<script src="/assets/js/vendor/dragula.min.js"></script>
<script src="/assets/js/ui/component.dragula.js"></script>
<!-- FullCalendar js -->
<script src="/assets/js/vendor/fullcalendar.min.js"></script>
<script src="/assets/js/pages/demo.calendar.js"></script>
<script src="/assets/js/vendor/jquery-ui.min.js"></script>
<!-- jquery validation  -->
<script src="/assets/js/vendor/jquery-validation.js"></script>
<!-- demo:js -->
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/github-data.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="/assets/js/pages/demo.apex-area.js?v=<?=ASSETS_VERSION?>"></script>
<script src="/assets/js/pages/demo.apex-mixed.js?v=<?=ASSETS_VERSION?>"></script>
<!-- demo end -->
<!-- demo app -->
<script src="/assets/js/pages/demo.dashboard.js?v=<?=ASSETS_VERSION?>"></script>

<!-- Dropzone js -->
<!-- <script src="/assets/js/vendor/dropzone.min.js?v=<?=ASSETS_VERSION?>"></script> -->
    <!-- File upload js -->
<!-- <script src="/assets/js/ui/component.fileupload.js?v=<?=ASSETS_VERSION?>"></script> -->
<!--end image uploader-->
<script src="/assets/js/vendor/dropzone.js"></script>

<script type="text/javascript">
    var myDropzone = new Dropzone("div#media1Dropzone", { 
        url: "<?php echo base_url("admin/upload_media") ?>", 
        paramName: "file",  
        maxFilesize: 5, 
        thumbnailWidth: null,
        thumbnailHeight: null,
        maxFiles: 1,  
        success: function(file, response) {
            
            var res = JSON.parse(response);
            console.log(res.data);
            if( res.fileupload_id > 0 ) {
                $('input#file_upload_id').val(res.fileupload_id);
               /* $('#edit_img_preview').hide();
                $('#video-content').hide();
                $('#img-content').hide();

                if( file.type == "video/mp4" ){
                    var phtml = '<video controls width="435" itemprop="video"><source src="'+res.data.full_path+'" type="video/mp4">Sorry, your browser doesn\'t support embedded videos.</video>';
                    $("#video-content").html(phtml);
                    $("#video-content").show();
                } else {
                    
                    var $clone = $('.dz-image :first').attr({width: '435',class: 'img-fluid'});
                    $clone.clone().html("#edit_media_preview");
                    var phtml = '<img class="img-fluid" id="edit_img_preview" src="'+res.data.full_path+'">';
                    $("#edit_media_preview").html(phtml);
                    $("#edit_media_preview").show();
                }*/
            }
           
            
        } 
    });
</script>
<script type="text/javascript">
    var myDropzone = new Dropzone("div#eventAddDropzone", { 
        url: "<?php echo base_url("admin/upload_media") ?>", 
        paramName: "file",  
        maxFilesize: 5, 
        maxFiles: 1,  
        addRemoveLinks: true,
        success: function(file, response) {
            var res = JSON.parse(response);
            console.log(response);
            $('input#file_upload_id').val(res.fileupload_id);
            $('#delete_img').show();
        } 
    });
</script>
<!-- end demo js-->

<script src="/assets/js/admin.js?v=<?=ASSETS_VERSION?>"></script>


  <!--JS Socials for the Social Share-->
<!--JS SOCIAL CODE-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
