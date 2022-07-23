<?php

 require('connectDB.php');
 $harwai_id=$_GET['harwai_id'];
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT number,harwai_status FROM qabar_info WHERE status=0 and number LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%'.$_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
               
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $harwai_status=$row['harwai_status'];
                    $qabar_no=$row['number'];
                    if($harwai_status==1)
                    {
                        $s1="SELECT COUNT(*) as c from harwai_qabar where harwai_id=$harwai_id and status=0 and qabar_no='$qabar_no'";
                        $run1=$conn->query($s1);
                        $row1=$run1->fetch_assoc();
                        $c=$row1['c'];
                        if($c>0)
                        {
                            echo "<p>" . $row["number"] ." (AVAILABLE)</p>";
                        }
                        else
                        {
                            echo "<p>NOT AVAILABLE</p>";
                        }


                    }
                    else
                    {
                        echo "<p>" . $row["number"] ." (AVAILABLE)</p>";
                    }
                    
                }
            } else{
                echo "<p>NOT AVAILABLE</p>";
                
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($conn);
?>