<?php
	
	session_start();
	$pageTitle = 'addword';
	$noNavbar='';
	include 'function.php';
	$noNavbar='';


//index.php
?>

	<div id="display_item">
	</div>

<script>  
$(document).ready(function(){

	load_product();

	
    
	function load_product()
	{
		$.ajax({
			url:"add_select_ajax.php",
			method:"POST",
			success:function(data)
			{
				$('#display_item').html(data);
			}
		});
	}



	

	$(document).on('click', '.add_to_cart', function(){
		var word_id = $(this).attr("id");
		var word_english = $('#name'+word_id+'').val();
		var word_example = $('#example'+word_id+'').val();
		
		var action = "add";
		$(this).val("saved");
		
	
			$.ajax({
				url:"addword_action.php",
				method:"POST",
				data:{word_id:word_id, word_english:word_english, word_example:word_example, action:action},
				success:function()
				{
					
					
					
				}
			});
		
	
	});

	

	
    
});

</script>