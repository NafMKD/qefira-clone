<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/select2/js//select2.full.min.js"></script>
<?php if(isset($errSession)): ?>
<script>
  $(function(){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'error',
        title: 'You are not authorized!, please login to continue'
      })
  });
</script>
<?php endif ?>
<script>
	<?php if(isset($msj_register)):?>
		$('#modal-signup').modal('show');
	<?php endif ?>
	<?php if(isset($msj_login)):?>
		$('#modal-signin').modal('show');
	<?php endif ?>
	<?php if(isset($_GET['i'])):?>
		$('.product-image-thumb').on('click', function() {
			const image_element = $(this).find('img');
			$('.product-image').prop('src', $(image_element).attr('src'))
			$('.product-image-thumb.active').removeClass('active');
			$(this).addClass('active');
		});
		$('#detailBack').on('click', function(){
			window.history.back();
		});
	<?php endif ?>
	$('.select2').select2({
		theme: 'bootstrap4'
	});
	$('.sibtn').on('click', function(){
        $('.sibtn').html("Loading ...");
    });
    $('#forgetModal').on('click', function(){
    	$('#modal-signin').modal('hide');
    	$('#modal-forgetpassword').modal('show');
    });
    $('#singupModal').on('click', function(){
    	$('#modal-signin').modal('hide');
    	$('#modal-signup').modal('show');
    });
    $('#singinModal').on('click', function(){
    	$('#modal-signup').modal('hide');
    	$('#modal-signin').modal('show');
    });

    <?php if(isset($final_pass_reset)):?>
		$('#modal-resetpassword').modal('show');
   		$('#userEmailReset').val('<?php echo $final_pass_reset_modal_dis; ?>');
	<?php endif ?>

	<?php if(isset($_GET['passwdresetmodal']) && !isset($final_pass_change_modal_dis)):?>
		$('#modal-resetpassword').modal('show');
   		$('#userEmailReset').val('<?php echo $_GET['passwdresetmodal']; ?>');
	<?php endif ?>

	<?php if(isset($final_pass_forget)):?>
		$('#modal-forgetpassword').modal('show');
	<?php endif ?>

	<?php if(isset($final_pass_change_modal_dis)):?>
		$('#modal-changepassword').modal('show');
   		$('#userEmailChange').val('<?php echo $final_pass_change_modal_dis; ?>');
	<?php endif ?>

	window.onscroll = function() {scrollfunction()};

	var navbar = document.getElementById("navbarsearch");
	var sticky = navbar.offsetTop;

	function scrollfunction() {
	  if (window.pageYOffset >= sticky) {
	    navbar.classList.add("sticky")
	  } else {
	    navbar.classList.remove("sticky");
	  }
	}
</script>