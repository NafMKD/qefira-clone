$(document).ready(function(){
	$('.fileDiv').on('dragover', function(){
		$(this).addClass('fileDivDrag');
		return false;
	});
	$('.fileDiv').on('dragleave', function(){
		$(this).removeClass('fileDivDrag');
		return false;
	});
	$('.fileDiv').on('drop', function(e){
		e.preventDefault();
		$(this).removeClass('fileDivDrag');
		var formData = new FormData();
		var fileList = e.originalEvent.dataTransfer.files;
		console.log(fileList.length);

	});
});