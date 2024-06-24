<?php

    include("connect.php");
    include("supervisor_menu.php");

// Generate the new SupervisorID before form submission
$sql = "select SupervisorID from supervisor order by SupervisorID desc limit 1";
$result = mysqli_query($connect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $lastID = $row['SuppervisorID'];
    
    // Extract the numeric part of the lastID and increment it
    $num = intval(substr($lastID, 2)) + 1;
    $newSupervisorID = 'SP' . $num;
} else {
    // If no records found start with SP1
    $newSupervisorID = 'SP1';

    if (isset($_POST{"submit"})) {
        $SupervisorID = $newSupervisorID; //Use the generated ID
        $paswword = $_POST["password"];
        $supervisor = $_POST["supervisor"];
        
        //Escape the input to prevent SQL injection
        $password = mysqli_real_escape_string($connect, $password);
        $supervisor = mysqli_real_escape_string($connect, $supervisor);
        
        $sql = "INSERT INTO supervisor (SupervisorID, supervisor, password) VALUES
        ('$SupervisorID', '$supervisor', '$password')";
        $result = mysqli_query($connect, $sql);
        if ($result == true)
            echo "<script>alert('successfully added');
            window.location='supervisor_list.php'</sccript>";
        else
            echo "Error; $sql<br>".mysqli_error($connect);
        }
?>


<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="medium">ADD SUPERVISOR</h3>
<form class="medium" action="supervisor_insert.php" method="post">
    <table>
    
    <tr>
        <td>ID</td>
        <td><input type="text" name="SupervisorID" value="<?php echo
        $newSupervisorID; ?>" readonly></td>
    </tr>
    
    <tr>
        <td>Name</td>
        <td><input type="text" name="supervisor" required ></td>
    </tr>
    
    <tr>
        <td>Password</td>
        <td><input type="text" name="password" required></td>
    </tr>
    
</table>
<button class="Add" type="submit" name="submit">Add</button>
</form>
    