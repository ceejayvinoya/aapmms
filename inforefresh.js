  $(document).ready(function(){
    	$('#refresh').on('click', function(){
            $("#result").html("");
    		$.ajax({
    			type: 'GET',
    			url: 'inforefresh.php',
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
