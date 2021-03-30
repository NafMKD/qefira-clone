<?php 
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$item_detail['usr_id'])[0];
$user_file = $obj_fetch->fetchUsersFile("INDIVIDUAL", "usr_id/".$item_detail['usr_id']);
?>
<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <div class="text-center">
      <?php if(count($user_file)==0):?>
        <img src="../assets/dist/img/user.png" class="profile-user-img img-fluid img-circle" alt="User Image">
                <?php else: ?>
                    <img src="../files/users/<?php echo $user_file[0]['filePath']; ?>" class="profile-user-img img-fluid img-circle" alt="User Image">
                <?php endif?>
    </div>

    <h3 class="profile-username text-center"><?php echo ucwords($user_info['name']) ?></h3>

    <p class="text-muted text-center">Member Since <?php echo $obj_const->dateFormater($user_info['datereg']) ?></p>

    <ul class="list-group list-group-unbordered mb-3">
      <li class="list-group-item">
        <b>Email</b> 
        <a class="float-right">
          <?php if($user_info['isEmail'] == 1): ?>
            <i class="fas fa-check text-green"></i>
          <?php else: ?>
            <i class="fas fa-times text-red"></i>
          <?php endif?>
        </a>
      </li>
      <li class="list-group-item">
        <b>Phone</b> 
        <a class="float-right">
          <?php if($user_info['isPhone'] == 1): ?>
            <i class="fas fa-check text-green"></i>
          <?php else: ?>
            <i class="fas fa-times text-red"></i>
          <?php endif?>
        </a>
      </li>
      <li class="list-group-item">
        <b>Telegram</b> 
        <a class="float-right">
          <?php if($user_info['isTelegram'] == 1): ?>
            <i class="fas fa-check text-green"></i>
          <?php else: ?>
            <i class="fas fa-times text-red"></i>
          <?php endif?>
        </a>
      </li>
      <li class="list-group-item">
        <b>Whatsapp</b> 
        <a class="float-right">
          <?php if($user_info['isWhatsapp'] == 1): ?>
            <i class="fas fa-check text-green"></i>
          <?php else: ?>
            <i class="fas fa-times text-red"></i>
          <?php endif?>
        </a>
      </li>
    </ul>
  </div>
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Contact Seller</h3>
  </div>
  <div class="card-body">
    <ul class="list-unstyled" style="font-size: 15px;">
      <?php if($user_info['whatsapp'] != ""): ?>
        <li>
        <a href="whatsapp://send?phone=<?php echo $user_info['whatsapp']; ?>&text=Hi%2C%20I%27m%20interested%20in%20your%20Qefira-Clone%20Ad%3A%20https%3A%2F%2localhost/qefira-clone/public/detail.php?i=<?php echo $_GET['i']; ?>" target="_blank">
          <button class="btn btn-success btn-flat" style="width: 100%;">Whatsapp</button>
        </a>
        </li>
        <hr>
      <?php endif?>
       <?php if($user_info['telegram'] !=""): ?>
       <li>
         <a href="https://t.me/<?php echo $user_info['telegram']; ?>"  target="_blank">
          <button class="btn btn-info btn-flat" style="width: 100%;">Telegram</button>
        </a>
       </li>
       <hr>
       <?php endif?>
       <?php if($user_info['phone'] !=""): ?>
       <li>
         <button data-toggle="modal" data-target="#modal-shownumber" class="btn btn-danger btn-flat" style="width: 100%;">Show Number</button>
       </li>
       <hr>
       <?php endif?>
       <center>or</center>	
       <hr>
       <li>
         <button data-toggle="modal" data-target="#modal-signup" class="btn btn-danger btn-flat" style="width: 100%;">Chat</button>
       </li>
   </ul>
 </div>
</div>

<div class="modal fade" id="modal-shownumber">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Seller Information:</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <dl class="row">
                <dt class="col-sm-4">Seller Name:</dt>
                <dd class="col-sm-8"><?php echo ucwords($user_info['name']); ?></dd>
                <dt class="col-sm-4">Phone Number:</dt>
                <dd class="col-sm-8"><?php echo $user_info['phone']; ?></dd>
              </dl> 
            </div>
          </div>
        </div>
      </div>
