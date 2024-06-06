<?php 
    include("connect.php"); 
    include("supervisor_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $IcNumber = $_POST["IcNumber"]; 
         
        $sql = "delete from player where IcNumber = '$IcNumber'"; 
        $result = mysqli_query($connect, $sql); 
        if ($result == true) { 
            $total = mysqli_affected_rows($connect); 
            if($total > 0) 
                echo "<script>alert('successfully deleted'); 
                window.location='player_list.php'</script>"; 
            else 
                echo "Unable to delete. No record was found."; 
        } 
        else 
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>"; 
        } 
         
         
        If (isset($_GET['IcNumber'])) 
            $NoIc = $_GET['IcNumber']; 
    ?> 
     
     
    <link rel="stylesheet" href="form.css"> 
    <link rel="stylesheet" href="button.css"> 
     
    <h3 class="long">Delete player</h3> 
    <form class="long" action="player_delete.php" method="post"> 
        <table> 
            <tr> 
                <td>IcNumber</td> 
                <td><input type="text" name="IcNumber" value = "<?php echo $IcNumber; ?>" ></td> 
            </tr> 
        </table> 
        <button class="delete" type="submit" name="submit">Delete</button> 
    </form>