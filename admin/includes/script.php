<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/select2/js/select2.full.min.js"></script>
<script src="../assets/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../assets/dist/js/adminlte.js"></script>
<script src="../assets/summernote/summernote-bs4.min.js"></script> 
<?php if(isset($_GET['addNewCat'])):?>
<script src="includes/catagory/add.js"></script> 
<?php endif ?>
<?php if(isset($_GET['listCat']) && isset($_GET['edit'])):?>
<script src="includes/catagory/add.js"></script> 
<?php endif ?>
<script>
	$(function(){
		$("#dataTable").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('.select2').select2({
			theme: 'bootstrap4'
		});
		$('#compose-textarea').summernote({
	    	height: 70
	    })
	    $('#detailBack').on('click', function(){
			window.history.back();
		});
	});
	<?php if(isset($_GET['view']) ):?>
		$('.product-image-thumb').on('click', function() {
			const image_element = $(this).find('img');
			$('.product-image').prop('src', $(image_element).attr('src'))
			$('.product-image-thumb.active').removeClass('active');
			$(this).addClass('active');
		});
	<?php endif ?>
</script>