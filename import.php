<?php
    include('connect.php');
    include("supervisor_menu.php");
        
if (isset($_POST["submit"])) {
    $tablename = $_POST['tablename'];
    $filename = $_FILES['filename']['name'];
    
    $while = $_FILES['filename']['tmp_name'];
    move_uploaded_file($while, $filename);
    
    $file = fopen($filename, "r");
    while (!feof($file)) {
        $field = explode(",", fgets($file));
        
        $success = false;
        
        if (strtolower($tablename) === "player") {
            $IcNumber = $field[0];
            $player = $field[1];
            $StewardID = $field[2];
            $SupervisorID = $field[3];
            $password = trim($field[4]);
            
            $sql = "insert into player values('$IcNumber',
            '$player', '$StewardID', '$SupervisorID', '$password')";
            if (mysqli_query($connect, $sql))
                $success = true;
            else
                echo "<br><center>Error :
                $sql<br>".mysqli_error($connect)."</center>";
        }
        
        if (strtolower($tablename) === "steward") {
            
            $StewardID = $field[0];
            $steward = $field[1];
            $password = trim($field[2]);
            $sql = "insert into steward values('$StewardID', '$steward', '$password')";
            
            if (mysqli_query($connect, $sql))
                $success = true;
            else
                echo "<br><center>Error :
                $sql<br>".mysqli_error($connect)."</center>";
        }
    }
    if ($success == true)
            echo "<script>alert('Record is successfully imported');
            </script>";
    else
        echo "<script>alert('Failed to import record');</script>";
    mysqli_close($connect);
}

?>


<html>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="button.css">
    
    <body>
        <h3 class="import">IMPORT DATA</h3>
        <form class="import" action="import.php" method="post"
            enctype = "multipart/form-data" class="import">
                
            <table>
                <tr>
                    <td>Table</td>
                    <td>
                        <select name="tablename">
                            <option>player</option>
                            <option>steward</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>File Name</td>
                    <td><input type="file" name="filename" accept=".txt"></td>
                </tr>
            </table>
            <button class="import" type="submit" name="submit">Import</button>
            </form>
    </body>
</html>