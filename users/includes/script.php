<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/summernote/summernote-bs4.min.js"></script> 
<script>
	$('#compose-textarea').summernote({
	 	height: 70
	});
	<?php if(isset($msj_register)):?>
		$('#modal-signup').modal('show');
	<?php endif ?>
	<?php if(isset($msj_login)):?>
		$('#modal-signin').modal('show');
	<?php endif ?>
	<?php if(isset($retrn_message_msg)): ?>
		$('#modal-send-message').modal('show');
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