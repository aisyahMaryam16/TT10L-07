<?php 
    include("connect.php"); 
    include("supervisor_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $AspectID = $_POST["AspectID"]; 
        $aspect = $_POST["aspect"]; 
        $TotalMarks = $_POST["TotalMarks"]; 
         
        $sql = "update Aspect set aspect = '$aspect', TotalMarks = '$TotalMarks' 
                where AspectID = '$AspectID' 
"; 
                 
                $result = mysqli_query($xonnect, $sql); 
                if ($result == true) 
                    echo "<script>alert('Successfully update'); 
                    window.location='aspect_list.php'</script>"; 
else 
echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>"; 
    } 
     
    if (isset($_GET['AspectID'])) 
    $AspectID = $_GET['AspectID']; 
     
$sql = "select * from Aspect where AspectID = '$AspectID' "; 
$result = mysqli_query($connect, $sql); 
while($value = mysqli_fetch_array($result)) { 
    $aspect = $value['aspect']; 
    $TotalMarks = $value['TotalMarks']; 
}  
?> 
 
<link rel="stylesheet" href="form.css"> 
<link rel="stylesheet" href="button.css"> 
 
<h3 class="long">CRITERIA UPDATE</h3> 
<form class="long" action="aspect_update.php" method="post"> 
<table> 
    <tr> 
        <td>ID</td> 
        <td><input type="text" name="AspectID" value= "<?php echo $AspectID; ?>"></td> 
    </tr> 
    <tr> 
        <td>Aspect</td> 
        <td><input type="text" name="aspect" value= "<?php echo $aspect; ?>"></td> 
    </tr> 
    <tr> 
        <td>TotalMarks</td> 
        <td><input type="text" name="TotalMarks" value= "<?php echo $TotalMarks; ?>"></td> 
    </tr> 
    </table> 
<button class="update" type="submit" name="submit">Update</button> 
</form>