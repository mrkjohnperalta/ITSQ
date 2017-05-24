<!--BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>SADU Other Navigations
                        <small>Student Affairs and Development Unit</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Other Navigations</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Proposals</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Proposal Template </span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- BEGIN : LISTS -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-doc font-green"></i>
                                <span class="caption-subject font-green bold uppercase">ACTIVITY PROPOSAL TEMPLATE</span>
                                
                                <div class="caption-desc font-grey-cascade"> Upload Activity Proposal</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="fa fa-files-o font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase"> Activity Proposal Template</span>
                            </div>
                            <div class="actions">
                                <button type="button" class="btn btn blue-madison pull-right btn-xs" id="managebtn" style="display:block;" onclick="edit_files()" >Manage Files</button>
                            </div>
                        </div>
                        <div class="portlet-body">
                            

                            <?php 
                                if($this->session->flashdata('uploaded'))
                                {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                                          <strong>Congratulations!</strong> ". $this->session->flashdata('uploaded') ." </div>";
                                }
                                else
                                {
                                    echo "";
                                }
                            ?>
                            <div id="initial_div" style="display: block;">
                                <div class='row'>
                                    <?php $template = $this->sadu_model->get_templates();?>
                                
                                    <?php 
                                        if($template != NULL)
                                        {

                                        
                                        foreach( $template as $template_details)
                                        {
                                            $array_details = explode('.', $template_details['file_name'] );

                                            if($array_details[1] == "docx" || $array_details[1] == "doc")
                                            {
                                                    $icon = "fa fa-file-word-o";
                                            }
                                            else if($array_details[1] == "pdf")
                                            {
                                                    $icon = "fa fa-file-pdf-o";
                                            }
                                            else
                                            {
                                                    $icon = "fa fa-file-image-o";
                                            }
                                            
                                            echo "<div class='col-lg-6 col-md-4 col-sm-6 col-xs-12'>
                                                        <div class='caption'>
                                                            <font size='5px'><i class='".$icon."'></i></font>
                                                            <a href='".base_url()."files/activity_proposal/".$template_details['file_name']."' target='_blank'><span class='caption-subject font-dark bold uppercase'>".$template_details['file_name']."</span></a>
                                                        </div>
                                                    </div>";
                                    ?>
                                    <?php }
                                        }
                                        else
                                        {
                                    ?>
                                            <div class="caption-desc font-grey-cascade"><center><h3>No Templates Available. </h3></center></div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div id="edit_div" style="display: none;">
                                <div class='row'>
                                    <?php 
                                    $template = $this->sadu_model->get_templates();
                                    echo form_open('SADU/proposal_template/delete_template');
                                    ?>
                                    <div class='col-lg-12 col-md-4 col-sm-6 col-xs-12'>
                                        <div class="caption-desc font-grey-cascade"> <h5>Select proposal you want to delete</h5> </div>
                                    </div>
                                    <?php foreach( $template as $template_details)
                                        {
                                            $array_details = explode('.', $template_details['file_name'] );

                                            if($array_details[1] == "docx" || $array_details[1] == "doc")
                                            {
                                                    $icon = "fa fa-file-word-o";
                                            }
                                            else if($array_details[1] == "pdf")
                                            {
                                                    $icon = "fa fa-file-pdf-o";
                                            }
                                            else
                                            {
                                                    $icon = "fa fa-file-image-o";
                                            }
                                    ?>
                                           <div class='col-lg-6 col-md-4 col-sm-6 col-xs-12'>
                                                <div class="mt-checkbox-list">
                                                    <label class="mt-checkbox mt-checkbox-outline uppercase"><b> <?=$template_details['file_name']?> </b>
                                                        <input type="checkbox" value=<?=$template_details['template_id']?> name="activity_file[]" id="activity_file" />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                    <?php } ?>
                                    <center>
                                        <button type="submit" class="btn btn red center">Delete</button>
                                        <button type="button" class="btn btn default center" onclick="save_files()">Back</button>
                                    </center>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
                <?php 
                
                ?>
                <div class="col-md-4">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <form enctype="multipart/form-data" action="<?php echo base_url() .'SADU/Proposal_template/upload_template'?>" method="POST">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-green">
                                    <i class="fa fa-upload font-dark"></i>
                                    <span class="caption-subject font-dark bold uppercase"> Upload Template</span>
                                </div>
                                <div class="actions">
                                    <button type="submit" class="btn btn blue-madison pull-right btn-xs " style="margin-left:5px;" >Upload</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <center>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn green btn-file">
                                        <span class="fileinput-new"> Select file </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="uploaded_file"> </span>
                                        <br>
                                    <span class="fileinput-filename"> </span> &nbsp;
                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                </div>
                                </center>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </form>
                </div>
            </div>
            <!-- END : LISTS -->
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
<!-- END CONTENT -->

<script type="text/javascript">
    function edit_files()
    {
        // alert('a');
        document.getElementById('initial_div').style.display = "none";
        document.getElementById('managebtn').style.display = "none";
        document.getElementById('edit_div').style.display = "block";
        document.getElementById('editbtn').style.display = "block";
    }
    
    function save_files()
    {
        document.getElementById('initial_div').style.display = "block";
        document.getElementById('managebtn').style.display = "block";
        document.getElementById('edit_div').style.display = "none";
        document.getElementById('editbtn').style.display = "none";
    }

</script>