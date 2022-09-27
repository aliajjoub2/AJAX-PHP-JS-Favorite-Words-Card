<?php
	session_start();
    

    include 'connect.php';
    $noNavbar='';

    $query = "SELECT * FROM words ORDER BY word_id DESC";

    $statement = $con->prepare($query);
    
    if($statement->execute())
    {
        $result = $statement->fetchAll();
        $output = '';
        foreach($result as $row)
        {
            $output .= '
            <div class="col-md-3" style="margin-top:12px;">  
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
                    
                    <h4 class="text-info">'.$row["word_english"].'</h4>
                    <h4 class="text-info">'.$row["word_example"].'</h4>
                    <h4 class="text-danger">'.$row["word_definition"] .'</h4>

                    
                    <input type="hidden" name="word_english" id="name'.$row["word_id"].'" value="'.$row["word_english"].'" />
                    <input type="hidden" name="word_id" id="'.$row["word_id"].'" value="'.$row["word_id"].'" />
                    <input type="hidden" name="example" id="word_example'.$row["word_id"].'" value="'.$row["word_example"].'" />
                    <input type="button" name="add_to_cart" id="'.$row["word_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="save" />
                </div>
            </div>
            ';
        }
        echo $output;
    }
    
    
    ?>