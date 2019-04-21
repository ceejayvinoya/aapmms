    $(document).ready(function(){
    	$('#submit').on('click', function(){
            $("#result").html("");
    		if($('#time').val() == ""){			
    			var warning = $("<div>Please complete the required field!</div>");
    			$('#result').append(warning);
    			setTimeout(function(){
    				warning.fadeOut(1000);
    			}, 2000);
    		}else{
    			$.ajax({
                    
    				type: 'POST',
    				url: 'outfotable.php',
    				data: {
    					//age:$('#age').val(),
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
