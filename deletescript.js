$(document).ready(function(){
    	$('#delete').on('click', function(){
            $("#result").html("");
    		$.ajax({
    			type: 'GET',
    			url: 'delete.php',
    			success: function(data){
    				$('#result').append(data);
                        //alert(status);
    				},
                error: function() {
                        	alert('Not OKay');
                   	}
    		});
    	});
});
