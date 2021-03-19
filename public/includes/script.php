<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
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
	<?php endif ?>
</script>