<?php 
    include('sambungan.php'); 
    include("manager_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $tablename = $_POST['tablename']; 
        $filename = $_FILES['filename']['name']; 
         
        //ambil data dari mana pun boleh 
        $sementara = $_FILES['filename']['tmp_name']; 
        move_uploaded_file($sementara, $filename); 
         
        $file = fopen($filename, "r"); 
        while (!feof($file)) { 
         
                $medan = explode(",", fgets($file)); 
                 
                $Success = false; 
                 
                if (strtolower($tablename) === "contestant") { 
                     $IcNumber = $medan[0]; 
                     $ContestantName = $medan[1]; 
                     $JudgeID = $medan[2]; 
                     $ManagerID = $medan[3]; 
                     $Passcode = trim($medan[4]); 
                     
                     $sql = "insert into contestant values('$IcNumber', '$ContestantName', '$JudgeID', 
                            '$ManagerID', '$Passcode')"; 
                     if (mysqli_query($sambungan, $sql)) 
                          $success = true; 
                     else 
                          echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>"; 
                } // tamat if 
                     
                if (strtolower($tablename) === "Judge") { 
                     
                     $JudgeID = $medan[0]; 
                     $JudgeName = $medan[1]; 
                     $Passcode = trim($medan[2]); 
                     $sql = "insert into judge values('$JudgeID', '$JudgeName', '$Passcode')"; 
                         
                     if (mysqli_query($sambungan, $sql)) 
                          $success = true; 
                     else 
                         echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>"; 
                 }  
            } 
                         
            if ($success == true) 
                    echo "<script>alert('Record is successfully imported');</script>"; 
            else 
                echo "<script>alert('Failed to import record');</script>"; 
            mysqli_close($sambungan); 
        } 
    ?> 
     
<html>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="button.css">
    
    <body>
        <h3 class="long">IMPORT DATA</h3>
        <form class="long" action="import.php" method="post"
                enctype = "multipart/form-data" class="import">
                
            <table>
                <tr>
                    <td>Table</td>
                    <td>
                        <select name="tablename">
                            <option>contestant</option>
                            <option>judge</option>
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
                