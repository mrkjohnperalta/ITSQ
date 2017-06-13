<div class="container-fluid">
  <div class="page-content">
    <div class="breadcrumbs">
      <h1>User Profile </h1>
        <div class = "pull-right">
          <a href = "<?php echo base_url(); ?>User/user_dashboard/editorginfo/<?php echo $org['org_id']?>">       
              <button class="btn pull-right green btn-outline"><i class="fa fa-pencil "></i>&nbsp;Edit</button>
          </a>
        </div>
    </div>
    <H3><?php echo $org['organization_name']. " " . "(" .$org['organization_abbreviation'].")" ?></H3>
    <p><?= $org['org_description'] ?></p>
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12"> 
          <h3> MISSION </h3> 
          <p> <?php echo $org['org_mission']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12">
          <h3>VISION</h3> 
            <p><?php echo $org['org_vision']?> </p>
        </div>
    </div>                             
  </div> 
</div>
                                                
                                        