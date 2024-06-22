<?php
include("connect.php");
include("supervisor_menu.php");

// Generate the new StewardID before form submission
$sql = "SELECT StewardID FROM steward ORDER BY StewardID DESC LIMIT 1";
$result = mysqli_query($connect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $lastID = $row['StewardID'];
    
    // Extract the numeric part of the lastID and increment it
    $num = intval(substr($lastID, 1)) + 1;
    $newStewardID = 'S' . $num;
} else {
    // If no records found, start with A1
    $newStewardID = 'S1';
}

if (isset($_POST["submit"])) {
    $StewardID = $newStewardID; // Use the generated ID
    $steward = $_POST["steward"];
    $password = $_POST["password"];
    
    // Escape the input to prevent SQL injection
    $steward = mysqli_real_escape_string($connect, $steward);
    $password = mysqli_real_escape_string($connect, $password);
    
    $sql = "INSERT INTO steward (StewardID, steward, password) VALUES ('$StewardID', '$steward', '$password')";
    
    $result = mysqli_query($connect, $sql);
    if ($result == true)
        echo "<script>alert('Successfully Added'); window.location='steward_list.php'</script>";
    else
        echo "<br><center>Error : $sql<br>" . mysqli_error($connect) . "</center>";
}
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="medium">ADD STEWARD</h3>
<form class="medium" action="steward_insert.php" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="StewardID"></td>
        </tr>
        <tr>
            <td>Steward Name</td>
            <td><input type="text" name="StewardName"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password"></td>
        </tr>
    </table>
    <button class="add" type="submit" name="submit" >Add</button>
</form>
        