<?php
    $list_of_org = $this->admin_model->get_ListOfOrg();

    $user_id     = $_SESSION['logged_in']['id'];
?>

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
                    <span class="active">Pending</span>
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
                                <i class=" icon-doc font-green"></i>
                                <span class="caption-subject font-green bold uppercase">RSO's PENDING ACTIVITY PROPOSAL</span>
                                <div class="caption-desc font-grey-cascade"> Select Organization to view their <pre class="mt-code">"Activity Proposal"</pre></div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control input-sm" id="listoforg" onchange="get_organization(this)">
                                        <option value="0">Select Organization</option>
                                        <?php
                                        foreach($list_of_org as $org_list)
                                        {
                                                echo "<option value='". $org_list['org_id'] ."'>". $org_list['organization_name'] ."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /input-group -->
                            </div>
                            <br /><br />
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
                                <!-- /.col-md-6 -->
                                <div id="tab_hidden" style="display:none;">
                                    <div class="mt-element-list">
                                        <div id="org_name_div" style="display: none;">
                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                <div class="list-head-title-container">
                                                    <div class="list-date"></div>
                                                    <h3 class="list-title" id="Orgnization_Name"></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="SampleID"></div>
                                    </div>
                                </div>
                                <div id="tab_init" style="display:block;">
                                    <center>
                                        <div class='caption-desc font-grey-cascade'> <h3>Select an Organization to View their Proposal</h3> </div>
                                    </center>
                                </div>
                                <div id="result_div" style="display:none;">
                                    <center>
                                        <div class='caption-desc font-grey-cascade'> <h3>No Results Found</h3> </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END : LISTS -->
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
<!-- END CONTENT -->

<script type="text/javascript">
    function get_organization(value)
    {
        // var content = "";
        $('#SampleID').empty();
        var value = document.getElementById('listoforg').value;
        if(value != 0)
        {
            document.getElementById('tab_hidden').style.display = "block";
            document.getElementById('tab_init').style.display = "none";
            
            // alert(value);
            console.log(value);
            $.ajax({
                url:"<?php echo base_url() . 'SADU/Proposal/get_Org_Porposals'?>",
                dataType:'json',
                data: '&selected_value='+value,
                type:"POST",
                success: function(result){
                    // var obj = $.parseJSON(result);
                    console.log(result);
                    // var length = result.length();
                    // console.log(length);
                    var result_length = Object.keys(result['details']).length;
                    console.log(result_length);
                    if(result_length != 0)
                    {
                        document.getElementById('result_div').style.display = "none";
                        for(var i = 0 ; i < result_length ; i++)
                        {
                            document.getElementById('org_name_div').style.display = "block"
                            document.getElementById('Orgnization_Name').innerHTML = "";
                            document.getElementById('Orgnization_Name').innerHTML = result['details'][i].organization_name;
                        }

                        for(var i = 0 ; i < result_length ; i++)
                        {
                            if(result['details'][i].scc_approve == 2 || result['details'][i].edo_status == 2 ||
                                result['details'][i].sadu_status == 2 || result['details'][i].sdas_status == 2 || result['details'][i].accounting_status == 2)
                            {
                                var btn_status = "<button class='btn red' id='commentbtn' onclick='getcomments("+result['details'][i].prop_id+")'> View Comment </button>";
                            }
                            else
                            {
                                 var btn_status = "";
                            }

                            if(result['details'][i].proposal != "")
                            {
                                var filesbtn = "<button class='btn dark' id='proposals' value='"+result['details'][i].proposal+"' onclick='displayproposal()'> View Proposal </button>";
                            }
                            else
                            {
                                var filesbtn = "";
                            }
                            

                            // for(var x = 0 ; x < 2 ; x++)
                            // {
                            //     // document.getElementById('uploaded_files').innerHTML = "prop";
                            //     // $('#uploaded_files')append(prop);
                            //     var testing = "<button class='btn red' id='commentbtn' onclick='getcomments("+result['details'][i].prop_id+")'> View Comment </button>";
                            // }

                            // SCC STEPS
                                if(result['details'][i].scc_approve == 0)
                                {
                                    var scc_icon   = "fa fa-spinner";
                                    var scc_text   = "...";
                                }
                                if(result['details'][i].scc_approve == 1)
                                {
                                    var scc_status = "active";
                                    var scc_icon   = "fa fa-commenting-o";
                                    var scc_text   = "FOR REVIEW";
                                }
                                if(result['details'][i].scc_approve == 2)
                                {
                                    var scc_status = "error";
                                    var scc_icon   = "fa fa-exclamation-triangle";
                                    var scc_text   = "WITH COMMENT";             
                                }
                                if(result['details'][i].scc_approve == 3)
                                {
                                    var scc_status = "done";
                                    var scc_icon   = "fa fa-check";
                                    var scc_text   = "APPROVED";                
                                }
                            
                            // SADU STEPS
                                if(result['details'][i].sadu_status == 0)
                                {
                                    var sadu_icon   = "fa fa-spinner";
                                    var sadu_text   = "...";                    
                                }
                                if(result['details'][i].sadu_status == 1)
                                {
                                    var sadu_status = "active";
                                    var sadu_icon   = "fa fa-commenting-o";
                                    var sadu_text   = "FOR REVIEW";
                                    var sadu_val    = "1";
                                }
                                if(result['details'][i].sadu_status == 2)
                                {
                                    var sadu_status = "error";
                                    var sadu_icon    = "fa fa-exclamation-triangle";
                                    var sadu_text   = "WITH COMMENT";
                                    var sadu_val    = "2";  
                                }
                                if(result['details'][i].sadu_status == 3)
                                {
                                    var sadu_status = "done";
                                    var sadu_icon    = "fa fa-check";
                                    var sadu_text   = "APPROVED";
                                    var sadu_val    = "3";                
                                }
                            
                            // SDAS STEPS
                                if(result['details'][i].sdas_status == 0)
                                {
                                    var sdas_icon   = "fa fa-spinner";
                                    var sdas_text   = "...";                    
                                }
                                if(result['details'][i].sdas_status == 1)
                                {
                                    var sdas_status = "active";
                                    var sdas_icon   = "fa fa-commenting-o";
                                    var sdas_text   = "FOR REVIEW";            
                                }
                                if(result['details'][i].sdas_status == 2)
                                {
                                    var sdas_status = "error";
                                    var sdas_icon   = "fa fa-exclamation-triangle";
                                    var sdas_text   = "WITH COMMENT";           
                                }
                                if(result['details'][i].sdas_status == 3)
                                {
                                    var sdas_status = "done";
                                    var sdas_icon   = "fa fa-check";
                                    var sdas_text   = "APPROVED";               
                                }

                            // AO STEPS
                                if(result['details'][i].accounting_status == 0)
                                {
                                    var ao_icon   = "fa fa-spinner";
                                    var ao_text   = "...";                      
                                }
                                if(result['details'][i].accounting_status == 1)
                                {
                                    var ao_status = "active";
                                    var ao_icon   = "fa fa-commenting-o";
                                    var ao_text   = "FOR REVIEW";              
                                }
                                if(result['details'][i].accounting_status == 2)
                                {
                                    var ao_status = "error";
                                    var ao_icon   = "fa fa-exclamation-triangle";
                                    var ao_text   = "WITH COMMENT";             
                                }
                                if(result['details'][i].accounting_status == 3)
                                {
                                    var ao_status = "done";
                                    var ao_icon   = "fa fa-check";
                                    var ao_text   = "APPROVED";                 
                                }

                            // EDO STEPS
                                if(result['details'][i].edo_status == 0)
                                {
                                    var edo_icon   = "fa fa-spinner";
                                    var edo_text   = "...";                     
                                }
                                if(result['details'][i].edo_status == 1)
                                {
                                    var edo_status = "active";
                                    var edo_icon   = "fa fa-commenting-o";
                                    var edo_text   = "FOR REVIEW";              
                                }
                                if(result['details'][i].edo_status == 2)
                                {
                                    var edo_status = "error";
                                    var edo_icon   = "fa fa-exclamation-triangle";
                                    var edo_text   = "WITH COMMENT";            
                                }
                                if(result['details'][i].edo_status == 3)
                                {
                                    var edo_status = "done";
                                    var edo_icon   = "fa fa-check";
                                    var edo_text   = "APPROVED";                
                                }
                            var content = "";
                            var content = 
                            "<div class='mt-list-container list-simple ext-1 group'>" +
                                    "<a class='list-toggle-container' data-toggle='collapse' href='#completed-simple"+ result['details'][i].prop_id +"' aria-expanded='false'>" +
                                        "<div class='list-toggle done uppercase'>" + result['details'][i].proposal_title +
                                            "<span class='badge badge-default pull-right bg-white font-green bold'>Pending</span>" +
                                        "</div>" +
                                    "</a>"+
                                    "<div class='panel-collapse collapse' id='completed-simple"+ result['details'][i].prop_id +"'>" +
                                        "<div class='portlet-body'>" +
                                            "<div class='tabbable-line'>" +
                                                "<div id='box-content'>" +
                                                    "<div class='tab-content'>" +
                                                        "<div class='row'>"+
                                                            "<div class='col-lg-8 col-xs-12 col-sm-12'>"+
                                                                "<div class='caption'>"+
                                                                    "<i class='fa fa-quote-right font-black'></i>"+
                                                                    "<span class='caption-subject font-black bold uppercase'> General Objective</span>"+
                                                                "</div>"+
                                                                "<p>" + result['details'][i].general_objective + "</p>" +
                                                                "<br>"+
                                                                "<div class='caption'>"+
                                                                    "<i class='fa fa-quote-right font-black'></i>"+
                                                                    "<span class='caption-subject font-black bold uppercase'> Specific Objective</span>"+
                                                                "</div>"+
                                                                "<p>" + result['details'][i].specific_objective + "</p>"+
                                                                "<br>"+
                                                                "<div class='caption'>"+
                                                                    "<i class='fa fa-money font-black'></i>"+
                                                                    "<span class='caption-subject font-black bold uppercase'> Proposed Budget </span>"+
                                                                "</div>"+
                                                                "<p> P " + result['details'][i].proposed_budget + " </p>"+
                                                            "</div>"+
                                                            "<div class='col-lg-4 col-xs-12 col-sm-12'>"+
                                                                "<p> <b> UPLOADED ACTIVITY PROPOSAL </b> </p>"+
                                                                "<div class='caption-desc font-grey-cascade'>"+filesbtn+"</div>"+
                                                            "</div>"+
                                                        "</div>"+
                                                        "<div class='mt-element-step'>"+
                                                            "<div class='row step-line'>"+
                                                                "<div class='col-md-3 mt-step-col first "+ scc_status +"'>"+
                                                                    "<div class='mt-step-number bg-white'>"+
                                                                        "<i class='"+ scc_icon +"'></i>"+
                                                                    "</div>"+
                                                                    "<div class='mt-step-title uppercase font-grey-cascade'>SCC</div>"+
                                                                    "<div class='mt-step-content font-grey-cascade uppercase'>"+ scc_text +"</div>"+
                                                                "</div>"+
                                                                "<div id='icon_status' class='col-md-2 mt-step-col "+sadu_status+" '>"+
                                                                    "<div id='initial_icons' style='display: block;'> "+
                                                                        "<div class='mt-step-number bg-white'>"+
                                                                            "<i class='"+ sadu_icon +"'></i>"+
                                                                        "</div>"+
                                                                    "</div>"+
                                                                    "<div id='dynamic_icons' style='display: none;'> "+
                                                                        "<div id='content'></div>"+
                                                                    "</div>"+
                                                                    "<div class='mt-step-title uppercase font-grey-cascade'>SADU</div>"+
                                                                    "<select class='form-control input-sm' id='status' style='text-align-last:center;' onchange='getvalue(this);'>"+
                                                                        "<option value='"+sadu_val+"'>"+sadu_text+"</option>"+
                                                                        "<option value='1'>FOR REVIEW</option>"+
                                                                        "<option value='2'>WITH COMMENTS</option>"+
                                                                        "<option value='3'>APPROVE</option>"+
                                                                    "</select>"+
                                                                "</div>"+
                                                                "<input type='hidden' value='"+ result['details'][i].prop_id +"' id='proposal_id'>"+
                                                                "<div class='col-md-2 mt-step-col "+ sdas_status +"'>"+
                                                                    "<div class='mt-step-number bg-white'>"+
                                                                        "<i class='"+ sdas_icon +"'></i>"+
                                                                    "</div>"+
                                                                    "<div class='mt-step-title uppercase font-grey-cascade'>SDAS</div>"+
                                                                    "<div class='mt-step-content font-grey-cascade'>...</div>"+
                                                                "</div>"+
                                                                "<div class='col-md-2 mt-step-col  "+ ao_status +"''>"+
                                                                    "<div class='mt-step-number bg-white'>"+
                                                                        "<i class='"+ ao_icon +"'></i>"+
                                                                    "</div>"+
                                                                    "<div class='mt-step-title uppercase font-grey-cascade'>ACCOUNTING</div>"+
                                                                    "<div class='mt-step-content font-grey-cascade'>...</div>"+
                                                                "</div>"+
                                                                "<div class='col-md-3 mt-step-col last "+ edo_status +"''>"+
                                                                    "<div class='mt-step-number bg-white'>"+
                                                                        "<i class='"+ edo_icon +"'></i>"+
                                                                    "</div>"+
                                                                    "<div class='mt-step-title uppercase font-grey-cascade'>EDO</div>"+
                                                                    "<div class='mt-step-content font-grey-cascade'>...</div>"+
                                                                "</div>"+
                                                        " </div>"+
                                                    "</div>"+
                                                    "<div id='comments' style='display: none;'>"+
                                                        "<p><b>Enter your comment below:</b></p>"+
                                                        "<textarea class='form-control' rows='3' id='comment_section' onkeyup='comment_func()'></textarea>"+
                                                        "<input type='hidden' id='hidden_user_id' value='"+ <?php echo $user_id?> +"'>"+
                                                        "<br>"+
                                                        "<center><button type='button' class='btn green' style='margin-right:5px;' id='comment_btn' onclick='save_button_comment()' disabled>SAVE</button>"+btn_status+"</center>"+
                                                    "</div>"+
                                                    "<div id='savebtn' style='display: block'>"+
                                                        
                                                        "<center><button type='button' class='btn green' style='margin-right:5px;' onclick='save_button()'>SAVE</button>"+btn_status+"</center>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                            "</div>";
                            
                            $('#SampleID').append(content);
                        }
                    }
                    else
                    {        
                        document.getElementById('org_name_div').style.display = "none";
                        document.getElementById('result_div').style.display = "block";
                    } 
                }
            })
            $('#div_list').toggle(900)
        }
        else
        {
            document.getElementById('tab_hidden').style.display = "none";
            document.getElementById('tab_init').style.display   = "block";
            document.getElementById('result_div').style.display = "none";
        }
    }

    function getvalue(value)
    {
        $('#content').empty();
        var value = document.getElementById('status').value;
        

        if(value == 1)
        {
            var content = "<div class='mt-step-number bg-white'>"+
                                "<i class='fa fa-commenting-o'></i>"+
                          "</div>";
        
            var d = document.getElementById("icon_status");
            d.className += " active";
            $("#icon_status").removeClass("done");
            $("#icon_status").removeClass("error");
            
            document.getElementById('dynamic_icons').style.display  = "block";
            document.getElementById('initial_icons').style.display  = "none";
            $('#content').append(content);
            
        }
        else if(value == 2)
        {
            var content = "<div class='mt-step-number bg-white'>"+
                                "<i class='fa fa-exclamation-triangle'></i>"+
                          "</div>";

            var d = document.getElementById("icon_status");
            d.className += " error";
            $("#icon_status").removeClass("done");
            $("#icon_status").removeClass("active");

            document.getElementById('comments').style.display       = "block";
            document.getElementById('savebtn').style.display        = "none";

            document.getElementById('dynamic_icons').style.display  = "block";
            document.getElementById('initial_icons').style.display  = "none";
            $('#content').append(content);
        }
        else
        {
            var content = "<div class='mt-step-number bg-white'>"+
                                "<i class='fa fa-check'></i>"+
                          "</div>";

            var d = document.getElementById("icon_status");
            d.className += " done";
            $("#icon_status").removeClass("error");
            $("#icon_status").removeClass("active");

            document.getElementById('comments').style.display       = "none";
            document.getElementById('savebtn').style.display        = "block";
            
            document.getElementById('dynamic_icons').style.display  = "block";
            document.getElementById('initial_icons').style.display  = "none";
            $('#content').append(content);
        }
    }

    function comment_func(event)
    {
        $comment_text = document.getElementById('comment_section').value;
        if($comment_text != "")
        {
            document.getElementById('comment_btn').disabled = false;
        }
        else
        {
            document.getElementById('comment_btn').disabled = true;
        }
    }

    function save_button_comment()
    {
        var author  = document.getElementById('hidden_user_id').value;
        var comment = document.getElementById('comment_section').value;
        var prop_id = document.getElementById('proposal_id').value;
        $.ajax({
            url:"<?php echo base_url() . 'SADU/Proposal/Save_Proposal_Comment'?>",
            dataType:'json',
            data: '&proposal_id='+prop_id+'&author='+author+'&activity_comment='+comment,
            type:"POST",
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

    function save_button()
    {
        var value   = document.getElementById('status').value;
        var prop_id = document.getElementById('proposal_id').value;
        $.ajax({
            url:"<?php echo base_url() . 'SADU/Proposal/Save_Proposal_Status'?>",
            dataType:'json',
            data: '&selected_status='+value+'&proposal_id='+prop_id,
            type:"POST",
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

    function displayproposal()
    {
        $('#list_proposals').empty();
        // var proposals = document.getElementById('proposals').value;
        var prop      = document.getElementById('proposals').value;;
        var all_prop  = prop.split(',');
        // console.log(all_prop);
        // console.log(all_prop.length);
        for(var x = 0 ; x < all_prop.length ; x++)
        {
            // alert(all_prop[x]);
            var content = "<div class='col-lg-6 col-md-4 col-sm-6 col-xs-12'>"+
                              "<div class='caption'>"+
                                  "<font size='5px'><i class='fa fa-file-word-o'></i></font>&nbsp;"+
                                  "<a href=<?=base_url(). 'files/proposals/"+all_prop[x]+"'?> target='_blank'><span class='caption-subject font-dark bold uppercase'>"+all_prop[x]+"</span></a>"+
                              "</div>"+
                          "</div>";
            $('#list_proposals').append(content);
        }
        $('#view_proposals').modal('show');
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

<!-- Modal for activity proposal files -->
<div class="modal fade" id="view_proposals" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="caption-subject font-dark sbold"> Uploaded Activity Proposals</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div id='list_proposals'></div>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

