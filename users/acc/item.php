<?php 
session_start();
include 'autoloader.php';
$itemactive = "active";
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
$user_file = $obj_fetch->fetchUsersFile("INDIVIDUAL", "usr_id/".$_SESSION['userid']);
if(isset($_POST['nextstepitemreg'])){
  $itemName = $_POST['itemName'];
  $itemPrice = $_POST['itemPrice'];
  $itemAddress = $_POST['itemAddress'];
  $itemCity = $_POST['itemCity'];
  $itemCatagory = $_POST['itemCatagory'];
  $itemRegion = $_POST['itemRegion'];
  $itemNegtype = $_POST['itemNegtype'];
  header("location: ?addNewItem&nextStep&itemName=".$itemName."&itemPrice=".$itemPrice."&itemAddress=".$itemAddress."&itemCity=".$itemCity."&itemCatagory=".$itemCatagory."&itemRegion=".$itemRegion."&itemNegtype=".$itemNegtype);
}

if(isset($_POST['btnuploadalldataitem'])){
  $itemName = $_POST['itemName2'];
  $itemPrice = $_POST['itemPrice2'];
  $itemAddress = $_POST['itemAddress2'];
  $itemCity = $_POST['itemCity2'];
  $itemCatagory = $_POST['itemCatagory2'];
  $itemRegion = $_POST['itemRegion2'];
  $itemNegtype = $_POST['itemNegtype2'];
  $itemDescr = $_POST['itemDescr'];
  $catagoryKeys = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$itemCatagory);
  $cat_key_arr = array();
  for ($i=0; $i<count($catagoryKeys) ; $i++) { 
    $cat_key_arr[]=array($catagoryKeys[$i]['cat_key_id'], $_POST[$catagoryKeys[$i]['cat_key_id']]);
  }
  $item_reg_ret = $obj_register->registerItems($itemCatagory, $_SESSION['userid'], $itemName, $itemPrice, $itemDescr, $itemRegion, $itemAddress, $itemCity,$itemNegtype);
  if($item_reg_ret == "errUnk"){
    $reg_return_msg = array("alert-danger","Something went wrong, please try again!");
  }else{
    for ($i=0; $i<count($cat_key_arr) ; $i++) { 
      $item_cat_reg_ret = $obj_register->registerItemsKeyDetail($item_reg_ret, $cat_key_arr[$i][0], $cat_key_arr[$i][1]);
    }
    if(!isset($item_cat_reg_ret)){
      $item_cat_reg_ret=-1;
    }
    if($item_cat_reg_ret  == "errUnk"){
      $reg_return_msg = array("alert-danger","Something went wrong, please try again!");
    }else{
      if (!empty($_FILES['itemImage']['name'])) {
        foreach ($_FILES['itemImage']['tmp_name'] as $key => $image) {
            $folderpath ='../../files/items/';
            $item_file_reg_ret=$obj_register->uploadItemFile($item_reg_ret,'itemImage',$key,$folderpath);
        }
        if($item_file_reg_ret=="success"){
         $reg_return_msg = array("alert-success","Item successfuly posted!");
        }else{
          $reg_return_msg = array("alert-danger","Something went wrong, please try again!");
        } 
      }else{
        $reg_return_msg = array("alert-danger","Something went wrong, please try again!");
      } 
    }
  }
}

if(isset($_POST['btnupdatedataitem'])){
  $item_id = $_POST['item_id'];
  $itemName = $_POST['itemName'];
  $itemPrice = $_POST['itemPrice'];
  $itemAddress = $_POST['itemAddress'];
  $itemCity = $_POST['itemCity'];
  $itemCatagory = $_POST['itemCatagory'];
  $itemRegion = $_POST['itemRegion'];
  $itemNegtype = $_POST['itemNegtype'];
  $itemDescr = $_POST['itemDescr'];
  $catagoryKeys = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$itemCatagory);
  $cat_key_arr = array();
  for ($i=0; $i<count($catagoryKeys) ; $i++) { 
    $cat_key_arr[]=array($catagoryKeys[$i]['cat_key_id'], $_POST[$catagoryKeys[$i]['cat_key_id']]);
  }
  $item_reg_ret = $obj_fetch->updateItems($item_id, $itemCatagory, $itemName, $itemPrice, $itemDescr, $itemRegion, $itemAddress, $itemCity,$itemNegtype);
  if($item_reg_ret == "errUnk"){
    $upd_return_msg = array("alert-danger","Something went wrong, please try again!");
  }else{
    for ($i=0; $i<count($cat_key_arr) ; $i++) { 
      $item_cat_reg_ret = $obj_fetch->updatedItemKeyDetail($item_id, $cat_key_arr[$i][0], $cat_key_arr[$i][1]);
    }
    if(!isset($item_cat_reg_ret)){
      $item_cat_reg_ret=-1;
    }
    if($item_cat_reg_ret  == "errUnk"){
      $upd_return_msg = array("alert-danger","Something went wrong, please try again!");
    }else{
      $upd_return_msg = array("alert-success","Item successfuly Updated!"); 
    }
  }
}

if(isset($_GET['status'])){
  $status_update_return=$obj_fetch->updateItemStatus($_GET['status'], "user");
  if($status_update_return=="success"){
    $status_update_return_msg = array("alert-success","Item successfuly Updated!"); 
  }elseif($status_update_return=="errUnk"){
    $status_update_return_msg = array("alert-danger","Something went wrong, please try again!");
  }elseif($status_update_return=="errAuth"){
    $status_update_return_msg = array("alert-danger","You are banned from this action!");
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
            <h1 class="m-0 text-dark">Items</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <?php if(!isset($_GET['addNewItem']) && isset($_GET['listItem'])):?>
          <?php include 'includes/item/listview.php';?>
        <?php elseif(isset($_GET['addNewItem']) && !isset($_GET['listItem'])):?>
          <?php include 'includes/item/addnew.php';?>
        <?php endif?>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
</body>
</html>
