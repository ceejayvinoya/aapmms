    $(document).ready(function(){
    	$('#refresh').on('click', function(){
            $("#statupdate").html("");
    		$.ajax({
    			type: 'GET',
    			url: 'stattable.php',
    			success: function(data){
    				$('#statupdate').append(data);
                        //alert(status);
    				},
                error: function() {
                        	alert('Not OKay');
                   	}
    		});
    	});
    });
