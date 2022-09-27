<?php

//action.php

session_start();
include 'function.php';
print_r($_SESSION);
//include 'add_select_ajax.php';



//ADD 	
	
		$ip= get_ip();
		$word_name= $_POST["word_english"];
		$word_id= $_POST["word_id"];

		// select fron table saved_words

		$get_cart = $con->prepare(" SELECT * FROM saved_words where word_id = '$word_id' AND ip_add = '$ip' ");
		$get_cart->execute(array());
		$run_cart = $get_cart-> fetch();

		if($run_cart>0){
			echo '';
		
		}
		else{
			$run_insert_cart= $con->prepare("INSERT INTO saved_words (word_id,ip_add,word_english) values ('$word_id','$ip','$word_name')");
			$run_insert_cart->execute(array());
		}
	
	



?>