
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>SCC Other Navigations
                        <small>Student Coordinating Council</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-list font-green"></i>
                                <span class="caption-subject font-green sbold uppercase">List of Activity Proposal</span>
                                <small>Student Coordinating Council</small>
                            </div>
                                <a href="javascript:window.history.go(-1);" class="btn green pull-right">Go Back</a>
                        </div>
                        <style type="text/css">
                                #box-content
                                {
                                    margin: auto;
                                    margin-bottom: 20px;
                                    margin-top: 20px;
                                    width: 90%;
                                }
                            </style>
                        <div class="portlet-body">
                            <div class="mt-element-list">
                                <!--<div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                    <div class="list-head-title-container">
                                        <div class="list-date">Nov 8, 2015</div>
                                        <h3 class="list-title">Simple List</h3>
                                    </div>
                                </div>-->
                            <?php
                                foreach($details as $list)
                                {
                                    // var_dump($details);
                                    echo"
                                        <script>
                                            function getvalue".$list['prop_id']."(value)
                                            {
                                                $('#content".$list['prop_id']."').empty();
                                                var value = document.getElementById('status".$list['prop_id']."').value;
                                                if(value == 1)
                                                {
                                                    var content = \"<div class='mt-step-number bg-white'>\"+
                                                                        \"<i class='fa fa-commenting-o'></i>\"+
                                                                \"</div>\";
                                                
                                                    $(\"#icon_status".$list['prop_id']."\").removeClass(\"done\");
                                                    $(\"#icon_status".$list['prop_id']."\").removeClass(\"error\");

                                                    var d = document.getElementById(\"icon_status".$list['prop_id']."\");
                                                    d.className += \" active\";
                                                    
                                                    document.getElementById('comments".$list['prop_id']."').style.display       = \"none\";
                                                    document.getElementById('savebtn".$list['prop_id']."').style.display        = \"block\";

                                                    document.getElementById('dynamic_icons".$list['prop_id']."').style.display  = \"block\";
                                                    document.getElementById('initial_icons".$list['prop_id']."').style.display  = \"none\";
                                                    $('#content".$list['prop_id']."').append(content);
                                                    
                                                }
                                                else if(value == 2)
                                                {
                                                    var content = \"<div class='mt-step-number bg-white'>\"+
                                                                        \"<i class='fa fa-exclamation-triangle'></i>\"+
                                                                \"</div>\";

                                                    $(\"#icon_status".$list['prop_id']."\").removeClass(\"done\");
                                                    $(\"#icon_status".$list['prop_id']."\").removeClass(\"active\");

                                                    var d = document.getElementById(\"icon_status".$list['prop_id']."\");
                                                    d.className += \" error\";

                                                    document.getElementById('comments".$list['prop_id']."').style.display       = \"block\";
                                                    document.getElementById('savebtn".$list['prop_id']."').style.display        = \"none\";

                                                    document.getElementById('dynamic_icons".$list['prop_id']."').style.display  = \"block\";
                                                    document.getElementById('initial_icons".$list['prop_id']."').style.display  = \"none\";
                                                    $('#content".$list['prop_id']."').append(content);
                                                }
                                                else
                                                {
                                                    var content = \"<div class='mt-step-number bg-white'>\"+
                                                                        \"<i class='fa fa-check'></i>\"+
                                                                \"</div>\";
                                                                
                                                    $(\"#icon_status".$list['prop_id']."\").removeClass(\"error\");
                                                    $(\"#icon_status".$list['prop_id']."\").removeClass(\"active\");

                                                    var d = document.getElementById(\"icon_status".$list['prop_id']."\");
                                                    d.className += \" done\";

                                                    document.getElementById('comments".$list['prop_id']."').style.display       = \"none\";
                                                    document.getElementById('savebtn".$list['prop_id']."').style.display        = \"block\";
                                                    
                                                    document.getElementById('dynamic_icons".$list['prop_id']."').style.display  = \"block\";
                                                    document.getElementById('initial_icons".$list['prop_id']."').style.display  = \"none\";
                                                    $('#content".$list['prop_id']."').append(content);
                                                }
                                            }

                                            function comment_func".$list['prop_id']."(event)
                                            {
                                                var comment_text = document.getElementById('comment_section".$list['prop_id']."').value;
                                                if( comment_text != \"\")
                                                {
                                                    document.getElementById('comment_btn".$list['prop_id']."').disabled = false;
                                                }
                                                else
                                                {
                                                    document.getElementById('comment_btn".$list['prop_id']."').disabled = true;
                                                }
                                            }

                                            function save_button_comment".$list['prop_id']."()
                                            {
                                                var author  = document.getElementById('hidden_user_id').value;
                                                var comment = document.getElementById('comment_section".$list['prop_id']."').value;
                                                var date    = document.getElementById('date_submission".$list['prop_id']."').value;
                                                var prop_id = document.getElementById('proposal_id".$list['prop_id']."').value;
                                                $.ajax({
                                                    url:\"\Save_Proposal_Comment\",
                                                    dataType:'json',
                                                    data: '&proposal_id='+prop_id+'&author='+author+'&activity_comment='+comment+'&date='+date,
                                                    type:\"POST\",
                                                    success: function(result)    
                                                    {
                                                        console.log(result);
                                                        if(result == true)
                                                        {
                                                            toastr.success('Changes has been successfully saved');
                                                        }
                                                        else
                                                        {
                                                            toastr.error('Oopss! Something went wrong. Your comment has already been saved.');
                                                        }
                                                    }
                                                });
                                            }

                                            function save_button".$list['prop_id']."()
                                            {
                                                var value   = document.getElementById('status".$list['prop_id']."').value;
                                                var prop_id = document.getElementById('proposal_id".$list['prop_id']."').value;
                                                $.ajax({
                                                    url:\"\Save_Proposal_Status\",
                                                    dataType:'json',
                                                    data: '&selected_status='+value+'&proposal_id='+prop_id,
                                                    type:\"POST\",
                                                    success: function(result)
                                                    {
                                                        console.log(result);

                                                        if(result == true)
                                                        {
                                                            toastr.success('Changes has been successfully saved');
                                                        }
                                                        else
                                                        {
                                                            toastr.error('Oopss! Something went wrong.');
                                                        }
                                                    }
                                                });
                                            }
                                        </script>
                                    ";
                                    // SDAS STEPS
                                        if($list['scc_approve'] == 0)
                                        {
                                            $scc_icon   = "fa fa-spinner";
                                            $scc_text   = "...";

                                            $btn_status  = "";               
                                        }
                                        if($list['scc_approve'] == 1)
                                        {
                                            $scc_status = "active";
                                            $scc_icon   = "fa fa-commenting-o";
                                            $scc_text   = "FOR REVIEW";  

                                            $btn_status  = "";          
                                        }
                                        if($list['scc_approve'] == 2)
                                        {
                                            $scc_status = "error";
                                            $scc_icon   = "fa fa-exclamation-triangle";
                                            $scc_text   = "WITH COMMENT";    

                                            $btn_status  = "<button class='btn red' id='commentbtn' onclick='getcomments(".$list['prop_id'].")'> View Comments </button>";
                                        }
                                        if($list['scc_approve'] == 3)
                                        {
                                            $scc_status = "done";
                                            $scc_icon   = "fa fa-check";
                                            $scc_text   = "APPROVED"; 

                                            $btn_status  = "";
                                        }
                                    
                                    if($list['scc_approve'] == 1 || $list['scc_approve'] == 2)
                                    {
                            ?>
                                        <div class="mt-list-container list-simple ext-1 group">
                                            <a class="list-toggle-container" data-toggle="collapse" href="#<?php echo $list['prop_id'] ?>" aria-expanded="false">
                                                <div class="list-toggle done uppercase"> <?= $list['proposal_title'] ?>
                                                    <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                                </div>
                                            </a>
                                            <div class="panel-collapse collapse " id="<?php echo $list['prop_id'] ?>">
                                                <div class='portlet-body'>
                                                    <div class='tabbable-line'>
                                                        <div id='box-content'>
                                                            <div class='tab-content'>
                                                                <div class='row'>
                                                                    <div class='col-lg-8 col-xs-12 col-sm-12'>
                                                                        <div class='caption'>
                                                                            <i class='fa fa-quote-right font-black'></i>
                                                                            <span class='caption-subject font-black bold uppercase'> General Objective</span>
                                                                        </div>
                                                                        <p> <?= $list['general_objective'] ?> </p>
                                                                        <br>
                                                                        <div class='caption'>
                                                                            <i class='fa fa-quote-right font-black'></i>
                                                                            <span class='caption-subject font-black bold uppercase'> Specific Objective</span>
                                                                        </div>
                                                                        <p> <?= $list['specific_objective'] ?> </p>
                                                                        <br>
                                                                        <div class='caption'>
                                                                            <i class='fa fa-money font-black'></i>
                                                                            <span class='caption-subject font-black bold uppercase'> Proposed Budget </span>
                                                                        </div>
                                                                        <p> P <?= $list['proposed_budget'] ?> </p>
                                                                    </div>
                                                                    <div class='col-lg-4 col-xs-12 col-sm-12'>
                                                                        <p> <b> UPLOADED ACTIVITY PROPOSAL </b> </p>
                                                                        <?php
                                                                            $proposals = explode(",",$list['proposal']);
                                                                            for($x = 0 ; $x < sizeof($proposals) ; $x++)
                                                                            {
                                                                                echo "
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a href='".base_url()."files/activity_proposal/".$list['proposal']."'><div class='caption-desc font-grey-cascade'>". $proposals[$x] ."</div></a>
                                                                                        </li>
                                                                                    </ul>";
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class='mt-element-step'>
                                                                    <div class='row step-line'>
                                                                        <div id="icon_status<?php echo $list['prop_id'] ?>" class='col-md-2 mt-step-col first <?= $scc_status ?>'>
                                                                            <div id='initial_icons<?php echo $list['prop_id'] ?>' style='display: block;'> 
                                                                                <div class='mt-step-number bg-white'>
                                                                                    <i class='<?= $scc_icon ?>'></i>
                                                                                </div>
                                                                            </div>
                                                                            <div id='dynamic_icons<?php echo $list['prop_id'] ?>' style='display: none;'>
                                                                                <div id='content<?php echo $list['prop_id'] ?>'></div>
                                                                            </div>
                                                                            <div class='mt-step-title uppercase font-grey-cascade'>SCC</div>
                                                                            <select class='form-control input-sm' id='status<?php echo $list['prop_id'] ?>' style='text-align-last:center;' onchange='getvalue<?php echo $list['prop_id'] ?>(this);'>"+
                                                                                <option value='<?=$list['scc_approve']?>'><?= $scc_text ?></option>
                                                                                <option value='1'>FOR REVIEW</option>
                                                                                <option value='2'>WITH COMMENTS</option>
                                                                                <option value='3'>APPROVE</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class='col-md-2 mt-step-col'>
                                                                            <div class='mt-step-number bg-white'>
                                                                                <i class='fa fa-spinner'></i>
                                                                            </div>
                                                                            <div class='mt-step-title uppercase font-grey-cascade'>SADU</div>
                                                                            <div class='mt-step-content font-grey-cascade uppercase'>...</div>
                                                                        </div>
                                                                        <div class='col-md-2 mt-step-col'>
                                                                            <div class='mt-step-number bg-white'>
                                                                                <i class='fa fa-spinner'></i>
                                                                            </div>
                                                                            <div class='mt-step-title uppercase font-grey-cascade'>SDAS</div>
                                                                            <div class='mt-step-content font-grey-cascade uppercase'>...</div>
                                                                        </div>
                                                                        <div class='col-md-2 mt-step-col'>
                                                                            <div class='mt-step-number bg-white'>
                                                                                <i class='fa fa-spinner'></i>
                                                                            </div>
                                                                            <div class='mt-step-title uppercase font-grey-cascade'>ACCOUNTING</div>
                                                                            <div class='mt-step-content font-grey-cascade'>...</div>
                                                                        </div>
                                                                        <div class='col-md-2 mt-step-col'>
                                                                            <div class='mt-step-number bg-white'>
                                                                                <i class='fa fa-spinner'></i>
                                                                            </div>
                                                                            <div class='mt-step-title uppercase font-grey-cascade'>EDO</div>
                                                                            <div class='mt-step-content font-grey-cascade'>...</div>
                                                                        </div>
                                                                        <div class='col-md-2 mt-step-col last'>
                                                                            <div class='mt-step-number bg-white'>
                                                                                <i class='fa fa-spinner'></i>
                                                                            </div>
                                                                            <div class='mt-step-title uppercase font-grey-cascade'>RO</div>
                                                                            <div class='mt-step-content font-grey-cascade'>...</div>
                                                                        </div>
                                                                </div>
                                                                <input type="hidden" id="proposal_id<?php echo $list['prop_id'] ?>" value="<?=$list['prop_id']?>">
                                                                <div id='comments<?php echo $list['prop_id']?>' style='display: none;'>
                                                                    <div class='row'>
                                                                        <div class='col-lg-8 col-xs-12 col-sm-12'>
                                                                            <p><b>Enter your comment below:</b></p>
                                                                            <textarea class='form-control' rows='3' id='comment_section<?php echo $list['prop_id'] ?>' onkeyup='comment_func<?php echo $list['prop_id'] ?>()'></textarea>
                                                                            <input type='hidden' id='hidden_user_id' value='<?php echo $_SESSION['logged_in']['id']?>'>
                                                                        </div>
                                                                        <div class='col-lg-4 col-xs-12 col-sm-12'>
                                                                            <p><b>Resubmission Date:</b></p>
                                                                            <div class="form-group" id="data_1">
                                                                                <div class="input-group date">
                                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="date_submission<?php echo $list['prop_id'] ?>" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <center><button type='button' class='btn green' style='margin-right:5px;' id='comment_btn<?php echo $list['prop_id'] ?>' onclick='save_button_comment<?php echo $list['prop_id'] ?>()' disabled>SAVE</button><?= $btn_status ?></center>
                                                                </div>
                                                                <div id='savebtn<?php echo $list['prop_id']?>' style='display: block'>
                                                                    
                                                                    <center><button type='button' class='btn green' style='margin-right:5px;' onclick='save_button<?php echo $list['prop_id'] ?>()'>SAVE</button><?= $btn_status ?></center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php  } 
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
<!-- END CONTENT -->

<script>
    function getcomments(proposalID)
    {
        $('#display_comment').empty();
        $('#author').empty();
        $.ajax({
            url:"<?php echo base_url() . 'SCC/scc_proposal/get_Org_Porposals_Comment'?>",
            dataType:'json',
            data: '&proposal_id='+proposalID,
            type:"POST",
            success: function(result)
            {
                console.log(result);
                var result_length = Object.keys(result['comments']).length;
                for(var i = 0 ; i < result_length ; i++)
                {
                    var content = "<ul><li>"+result['comments'][i].comment + "</li></ul>";
                    var author  = result['comments'][i].office_name +" ("+result['comments'][i].office_abbreviation+")";
                    $('#display_comment').append(content);
                }
                $('#author').append(author);
            }
        })
        $('#view_comment').modal('show');
    }

</script>


<!-- Modal for activity proposal comment -->
<div class="modal fade" id="view_comment" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="caption-subject font-red sbold"> Read Comment</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tbody>
                        <tr>
                            <td><p><b>Comment from: &nbsp;</b></p></td>
                            <td><div id="author"></div> </td>
                        </tr>
                    </tbody>
                </table>
                
                <table>
                    <tbody>
                        <tr>
                            <td><div id="display_comment"></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>