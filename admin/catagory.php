<?php 
session_start();
include 'autoloader.php';
$catactive = "active";
$obj_fetch = new fetch;
$obj_register = new register;
$obj_const = new constant;
$admin_info = $obj_fetch->fetchAdmin("INDIVIDUAL", "admin_id/".$_SESSION['adminid'])[0];

if(isset($_POST['btnRegisterCatagory'])){
  $counter = $_POST['input_counter'];
  if ($counter=="") {
    $counter=1;
  }
  $cat_arr = array();
  for($i=0;$i<10;$i++){
    $cat_arr[]=$_POST['catagoryName'.$i];
  }
  $catagoryNameEnter = $_POST['catagoryNameEnter'];
  $cat_return = $obj_register->registerCatagories($catagoryNameEnter);
  if($cat_return=="errUnk"){
    $cat_reg_ret = array("alert-danger","Someting went wrong, please try again!");
  }else{
    for ($i=0; $i<$counter ; $i++) { 
      $cat_key_return = $obj_register->registerCatKey($cat_return,$cat_arr[$i]);
    }
    if(!isset($cat_key_return)){
      $cat_key_return=-1;
    }
    if($cat_key_return == "errUnk"){
      $cat_reg_ret = array("alert-danger","Someting went wrong, please try again!");
    }else{
      $cat_reg_ret = array("alert-success","Category successfuly registered!");
    }
  }
}

if(isset($_POST['btnUpdateCatagory'])){
  $catagory_id = $_POST['catagoryid'];
  $counter = $_POST['input_counter'];
  $cat_key_id = $_POST['catkeyid'];
  $cat_key_val = $_POST['catkeyval'];
  $new_cat_arr = array();
  for($i=0;$i<10;$i++){
    $new_cat_arr[]=$_POST['catagoryName'.$i];
  }
  $catagoryNameEnter = $_POST['catagoryNameEnter'];

  $catkey_id =explode("/", $cat_key_id);
  $catkey_val =explode("/", $cat_key_val);
  array_pop($catkey_id);
  array_pop($catkey_val);

  $err=0;

  $cat_key_return=$obj_fetch->updateCatagory($catagory_id, $catagoryNameEnter);
  if($cat_key_return=="errUnk"){
    $err++;
  }
  for ($i=0; $i < count($catkey_val); $i++) { 
    if($new_cat_arr[$i]!=$catkey_val[$i]){
      if($new_cat_arr[$i]==""){
        $cat_key_return = $obj_fetch->delectCatagoryKey($catkey_id[$i],$new_cat_arr[$i]);
        if($cat_key_return=="errUnk"){
          $err++;
        }
      }else{
        $cat_key_return = $obj_fetch->updateCatagoryKey($catkey_id[$i],$new_cat_arr[$i]);
        if($cat_key_return=="errUnk"){
          $err++;
        }
      }
    }
  } 

  if($counter>count($catkey_val)){
    for ($i=count($catkey_val); $i < $counter; $i++) { 
      $cat_key_return = $obj_register->registerCatKey($catagory_id,$new_cat_arr[$i]);
    }
    if($cat_key_return=="errUnk"){
      $err++;
    }
  }
  if($err==0){
    $final_update_return = array("alert-success","Category successfuly updated!");
  }else{
    $final_update_return = array("alert-danger","Someting went wrong, please try again!");
  }
}

if(isset($_GET['delete'])){
  $cat_id = $_GET['delete'];

  $delete_return = $obj_fetch->deleteCatagory($cat_id);

  if($delete_return=="success"){
    $final_delete_return=array("alert-success","Category successfuly deleted!");
  }else{
    $final_delete_return=array("alert-danger","Someting went wrong, please try again!");
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/header.php'?>
</head>
<body class="sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">
	<?php include 'includes/navbar.php'?>
	<?php include 'includes/aside.php'?>

  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Catagories</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <?php if(isset($_GET['addNewCat']) && !isset($_GET['listCat'])):?>
          <?php include 'includes/catagory/addnew.php';?>
        <?php elseif(!isset($_GET['addNewCat']) && isset($_GET['listCat'])):?>
          <?php include 'includes/catagory/listview.php';?>
        <?php endif?>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
</body>
</html>
