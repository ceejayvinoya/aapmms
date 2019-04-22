    $(document).ready(function(){
    	$('#submit').on('click', function(){
            $("#result").html("");
    		if($('#time').val() == "" || $('#date').val() == ""){			
    			var warning = $("<div>Please complete the required field!</div>");
    			$('#result').append(warning);
    			setTimeout(function(){
    				warning.fadeOut(1000);
    			}, 2000);
    		}else{
    			$.ajax({
                    
    				type: 'POST',
    				url: 'infotable.php',
    				data: {
    					date:$('#date').val(),
    					time:$('#time').val()
    				},
                    dataType: 'text',
    				success: function(data){
    					$('#result').append(data);
                        //alert(data);
    					
    					
    				},
                    error: function() {
                        alert('Not OKay');
                    }
    			});
    		}
    	});
    });
