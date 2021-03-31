<?php
/*//include "config.php";
if (isset($_POST['uploadImageBtn'])) {
    $uploadFolder = 'uploads/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        $query = "INSERT INTO bird_multiple_images SET imgName='$imageName' " ;
        $run = $connection->query($query) or die("Error in saving image".$connection->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
        echo '<script>window.location.href="index.php";</script>';
    }
}

$dd ="2689";
echo intval($dd)+78965;*/


$to_email = "filika23@gmail.com";
$subject = "Test from local";
$body = "Hi, This is test email from local";
$headers = "From: ---";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

var selection = document.getElementById('file');
for (var i=0; i<selection.files.length; i++) {
    var ext = selection.files[i].name.substr(-3);
    if(ext!== "mp4" && ext!== "m4v" && ext!== "fv4")  {
        alert('not an accepted file extension');
        return false;
    }
} 

?>



  <!--<form action="upload-script.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
               <div class="col-md-4">
                   <div class="form-group">
                       <input type="file" name="imageFile[]" required multiple class="form-control">
                   </div>
               </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload Images" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
    </form>-!>

