<script src="../../assets/jquery/jquery.min.js"></script>
<script src="../../assets/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/select2/js/select2.full.min.js"></script>
<script src="../../assets/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../../assets/dist/js/adminlte.js"></script>
<script src="../../assets/summernote/summernote-bs4.min.js"></script> 
<script src="../../assets/sweetalert2/sweetalert2.min.js"></script>
<?php if(isset($_GET['unread']) && isset($_GET['delsuc'])): ?>
<script>
  $(function(){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'success',
        title: 'Message successfuly deleted!'
      })
  });
</script>
<?php endif ?>
<?php if(isset($_GET['unread']) && isset($_GET['delerr'])): ?>
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
        title: 'Someting went wrong, pleasse try again!'
      })
  });
</script>
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
	    });
		$('#detailBack').on('click', function(){
			window.history.back();
		});
		$(".msgTextTimp").each(function() {
	        $(this).text($(this).text().substr(0, 17));
	        $(this).append('...');
	    });
	});
	<?php if(isset($_GET['listItem']) && isset($_GET['view']) ):?>
		$('.product-image-thumb').on('click', function() {
			const image_element = $(this).find('img');
			$('.product-image').prop('src', $(image_element).attr('src'))
			$('.product-image-thumb.active').removeClass('active');
			$(this).addClass('active');
		});
	<?php endif ?>
</script>