<?php
    include9"connect.php");
    include("supervisor_menu.php");

    if (isset($POST["submit"])) {
        $AspectID = $_POST["AspectID"];
        $aspect = $_POST["aspect"];
        $TotalMarks = $POST["TotalMarks"];
        
        $sql = "insert into aspect values('$AspectID', '$aspect', '$TotalMarks')";
        $result = mysqli_query($connect, $sql);
        
        if ($result == true)
            echo "<script>alert('successfully added');
            window.location='aspect_list.php'</script>";
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
    }
?>
   
<link rel="stylesheet" href="form.css">
<link rel="stylsheet" href="button.css">
   
<h3 class="long">ADD ASPECT</h3>
   
<form class="long" action="aspect_insert.php" method="post">
    <table>
        <tr>
            <td>ID</td>
        </tr>
        <tr>
            <td>Aspect</td>
            <td><input type="text" name="aspect"></td>
        </tr>
        <tr>
            <td>Total Marks</td>
            <td><input type="text" name="TotalMarks"></td>
        </tr>
    </table>
<button class="add" type="submit" name="submit">Add</button>
</form>