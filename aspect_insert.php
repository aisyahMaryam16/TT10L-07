<?php
    include("connect.php");
    include("supervisor_menu.php");

// Generate the new AspectID before form submission
$sql = "SELECT AspectID FROM aspect ORDER BY AspectID DESC LIMIT 1";
$result = mysqli_query($connect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastID = $row['AspectID'];
    
        // Extract the numeric part of the lastID and increment it
        $num = intval(substr($lastID, 1)) + 1;
        $newAspectID = 'A' . $num;
} else {
    // If no records found, start with A1
    $newAspectID = 'A1';
}

if (isset($_POST["submit"])) {
    $AspectID = $newAspectID; // Use the generated ID
    $aspect = $_POST["aspect"];
    $TotalMarks = $_POST["TotalMarks"];
    
    // Escape the input to prevent SQL injection
    $aspect = mysqli_real_escape_string($connect, $aspect);
    $TotalMarks = mysqli_real_escape_string($connect, $TotalMarks);
    
    $sql = "insert into aspect (AspectID, aspect, TotalMarks) values ('$AspectID', '$aspect', '$TotalMarks')";
    $result = mysqli_query($connect, $sql);
    if ($result == true)
        echo "<script>alert('successfully added');
        window.location='aspect_list.php'</script>";
    else
        echo "<br><center>Error: $sql<br>".mysqli_error($connect)."</center>";
    }
?>
   
<link rel="stylesheet" href="form.css">
<link rel="stylsheet" href="button.css">
   
<h3 class="medium">ADD ASPECT</h3>
   
<form class="medium" action="aspect_insert.php" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="AspectID" value="<?php echo $newAspectID; ?>" readonly></td>
        </tr>
        <tr>
            <td>Aspect</td>
            <td><input type="text" name="aspect" required></td>
        </tr>
        <tr>
            <td>Total Marks</td>
            <td><input type="text" name="TotalMarks" required></td>
        </tr>
    </table>
<button class="add" type="submit" name="submit">Add</button>
</form>