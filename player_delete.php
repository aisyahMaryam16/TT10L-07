<?php 
    include("sambungan.php"); 
    include("manager_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $IcNumber = $_POST["IcNumber"]; 
         
        $sql = "delete from contestant where IcNumber = '$IcNumber'"; 
        $result = mysqli_query($sambungan, $sql); 
        if ($result == true) { 
            $bilrekod = mysqli_affected_rows($sambungan); 
            if($bilrekod > 0) 
                echo "<script>alert('successfully deleted'); 
                window.location='contestant_list.php'</script>"; 
            else 
                echo "Unable to delete. No record was found."; 
        } 
        else 
            echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>"; 
        } 
         
         
        If (isset($_GET['IcNumber'])) 
            $NoIc = $_GET['IcNumber']; 
    ?> 
     
     
    <link rel="stylesheet" href="form.css"> 
    <link rel="stylesheet" href="button.css"> 
     
    <h3 class="long">Delete contestant</h3> 
    <form class="long" action="contestant_delete.php" method="post"> 
        <table> 
            <tr> 
                <td>IcNumber</td> 
                <td><input type="text" name="IcNumber" value = "<?php echo $IcNumber; ?>" ></td> 
            </tr> 
        </table> 
        <button class="delete" type="submit" name="submit">Delete</button> 
    </form>