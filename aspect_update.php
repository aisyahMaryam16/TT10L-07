<?php 
    include("connect.php"); 
    include("supervisor_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $AspectID = $_POST["AspectID"]; 
        $aspect = $_POST["aspect"]; 
        $TotalMarks = $_POST["TotalMarks"];
        
        $AspectID = mysqli_real_escape_string($connect, $AspectID);
        $aspect = mysqli_real_escape_string($connect, $aspect);
        $TotalMarks = mysqli_real_escape_string($connect, $TotalMarks);
        
        $sql = "update aspect set aspect = '$aspect', TotalMarks = '$TotalMarks' 
                where AspectID = '$AspectID' "; 
                 
        if (mysqli_query($connect, $sql)) { 
        echo "<script>alert('successfully updated'); 
             window.location='aspect_list.php'</script>"; 
    }   else {
        echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>"; 
    } 
}
     
        if (isset($_GET['AspectID'])) {
        $AspectID = $_GET['AspectID']; 
    } else {
    echo "<br><center>Error: AspectID not set</center>";
exit();
}
     
        $sql = "select * from aspect where AspectID = '$AspectID' "; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "<br><center>Error: aspect not found</center>";
            exit();
        }

        $value = mysqli_fetch_array($result))  
        
        $aspect = $value['aspect']; 
        $TotalMarks = $value['TotalMarks'];   
?> 
 
<link rel="stylesheet" href="form.css"> 
<link rel="stylesheet" href="button.css"> 
 
<h3 class="medium">ASPECT UPDATE</h3> 
<form class="medium" action="aspect_update.php" method="post"> 
<table> 
    <tr> 
        <td>ID</td> 
        <td><input type="text" name="AspectID" value= "<?php echo $AspectID; ?>" readonly></td> 
    </tr> 
    <tr> 
        <td>Aspect</td> 
        <td><input type="text" name="aspect" value= "<?php echo $aspect; ?>"></td> 
    </tr> 
    <tr> 
        <td>Total Marks</td> 
        <td><input type="text" name="TotalMarks" value= "<?php echo $TotalMarks; ?>"></td> 
    </tr> 
    </table> 
<button class="update" type="submit" name="submit">Update</button> 
</form>