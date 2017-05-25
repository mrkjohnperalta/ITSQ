
<div class="container-fluid">
    <div class="page-content">
        <table class = "table"> 
            <thead> <h1> List of Activity Proposals </h1><thead>
                <th width = "35%">Date Submited</th>
                <th width = "35%">Title</th>
                <th width = "35%">Status </th>
              
                <?php 
                foreach($proposals as $proposal){

                    echo "<tr>";
                    echo "<td>".$proposal['date_sent']."<td>";
                   

                    
                ?>
                          <a href="<?=base_url()?>User/user_dashboard/singleproposal/<?=$proposal['prop_id']?>"><?=$proposal['proposal_title']?> </a>
                <?php
                 
                    echo "<td>".$proposal['edo_status']."</td>";
                    echo "</tr>";
                }
                ?>
           
            </thead>
        </table>
        <div class = "pull-right">
            <a class="btn btn-success" href="<?php echo base_url()?>User/user_dashboard/newproposal"> Submit New Proposal </a>
        </div>
    </div>
</div>

