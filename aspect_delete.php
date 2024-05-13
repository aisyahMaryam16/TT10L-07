<?php
    include("connect.php");
    include("supervisor_menu.php");
    
    if(isset($_POST["submit"])) {
        $AspectID = $_POST["AspectID"];
        $sql = "delete from aspect where AspectID = '$AspectID'";
        $result  = mysqli_query($connect, $sql);
        if ($result == true) {
            $NO = mysqli_affected_rows($connect);
            if ($NO > 0)
                echo "<script>alert('successfully deleted');
                window.location='aspect_list.php</script>";
            else
                echo "<script>alert('unable to delete. No record was found.');
                window.location='aspect_list.php'</script>";
        }
    else
        echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
        }
        
        if (isset($_GET['AspectID']))
            $AspectID = $_GET['AspectID'];
?>
   
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">
   
<h3 class="long">DELETE ASPECT</h3>
   <form class="long" action="aspect_delete.php" method="post">
       <table>
        <tr>
            <td>Aspect</td>
            <td><input type="text" name="AspectID" value = "<?php echo $AspectID; ?>" ></td>
        </tr>
       </table>
       <button class="delete" type="submit" name="submit">Delete</button>
   </form>>>