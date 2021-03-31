//this is coustom
$('#btnAddInput').click(function(){
    var valCounter = $('#counter').val();
    if(valCounter === "" || parseInt(valCounter) === 1){
        valCounter = 1;
        $('#one').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);
    }else if(parseInt(valCounter) === 2){
        $('#two').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);
    }else if(parseInt(valCounter) === 3){
        $('#three').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);
    }else if(parseInt(valCounter) === 4){
        $('#four').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);
    }else if(parseInt(valCounter) === 5){
        $('#five').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);	
    }
    else if(parseInt(valCounter) === 6){
        $('#six').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);	
    }else if(parseInt(valCounter) === 7){
        $('#seven').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);
    }else if(parseInt(valCounter) === 8){
        $('#eight').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);
    }else if(parseInt(valCounter) === 9){
        $('#nine').attr('hidden', false);
        $('#counter').val(parseInt(valCounter)+1);
        $('#btnAddInput').html('');	
    }
    $('#btnCancleInput').html('<i class="fas fa-minus"></i>');			
});

$('#btnCancleInput').click(function(){
    $('#btnAddInput').html('<i class="fas fa-plus"></i>');	
    var valCounter1 = $('#counter').val();
    if(parseInt(valCounter1) === 2){
        $('#one').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#btnCancleInput').html('');	
        $('#one').val('');
    }else if(parseInt(valCounter1) === 3){
        $('#two').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#two').val('');
    }else if(parseInt(valCounter1) === 4){
        $('#three').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#three').val('');
    }else if(parseInt(valCounter1) === 5){
        $('#four').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#four').val('');
    }else if(parseInt(valCounter1) === 6){
        $('#five').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#five').val('');
    }else if(parseInt(valCounter1) === 7){
        $('#six').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#six').val('');
    }else if(parseInt(valCounter1) === 8){
        $('#seven').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#seven').val('');
    }else if(parseInt(valCounter1) === 9){
        $('#eight').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#eight').val('');
    }else if(parseInt(valCounter1) === 10){
        $('#nine').attr('hidden', true);
        $('#counter').val(parseInt(valCounter1)-1);
        $('#nine').val('');
    }				
});