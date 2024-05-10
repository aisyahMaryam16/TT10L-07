<?php
    include("sambungan.php"); 
    include("manager_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $IcNumber = $_POST["IcNumber"]; 
        $Passcode = $_POST["Passcode"]; 
        $ContestantName = $_POST["ContestantName"]; 
        $JudgeID = $_POST["JudgeID"]; 
        $ManagerID = $_POST["ManagerID"]; 
        $sql = "insert into contestant values('$IcNumber', '$ContestantName', '$JudgeID', '$ManagerID',  
         '$Passcode')"; 
        $result = mysqli_query($sambungan, $sql); 
        if ($result == true) 
            echo "<script>alert('Successfully added'); 
            window.location='contestant_list.php'</script>"; 
        else 
            echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>"; 
    } 
?> 
 
<link rel="stylesheet" href="form.css"> 
<link rel="stylesheet" href="button.css"> 
<h3 class="long">Add Contestant</h3> 
<form class="long" action="contestant_insert.php" method="post"> 
    <table> 
        <tr> 
            <td class="colour">Ic Number</td> 
            <td><input required type = "text" name = "IcNumber" placeholder = "666666224444" pattern = "[0-9]{12}"  
            oninvalid = "this.setCustomValidity('Please insert 12 numbers')" oninput = "this.setCustomValidity('')"> 
            </td> 
        </tr> 
        <tr> 
            <td class="colour">Contestant Name</td> 
            <td><input type="text" name="ContestantName"></td> 
        </tr> 
        <tr> 
            <td class="colour">Passcode</td> 
            <td><input type="text" name="Passcode"></td> 
        </tr> 
        <tr> 
            <td class="colour">Judge Name</td> 
            <td><select name="JudgeID"> 
            <?php 
                $sql = "select * from judge"; 
                $data = mysqli_query($sambungan, $sql); 
                while ($judge = mysqli_fetch_array($data)) { 
                    echo "<option value='$judge[JudgeID]'>$judge[JudgeName]</option>"; 
                    } 
            ?> 
            </select> 
        </td> 
    </tr> 
    <tr> 
        <td class="colour">Manager Name</td> 
        <td> <select name="ManagerID"> 
            <?php 
                $sql = "select * from manager"; 
                $data = mysqli_query($sambungan, $sql); 
                while ($manager = mysqli_fetch_array($data)) { 
                echo "<option value='$manager[ManagerID]'>$manager[ManagerName]</option>"; 
                } 
            ?> 
            </select> 
        </td> 
    </tr> 
</table> 
    <button class="add" type="submit" name="submit"> 
        Add 
    </button> 
</form> 
<br> 
 
     
     
<center> 
    <button class="blue" onclick="change_colour(0)">Blue</button> 
    <button class="green" onclick="change_colour(1)">Green</button> 
    <button class="red" onclick="change_colour(2)">Red</button> 
    <button class="black" onclick="change_colour(3)">Black</button> 
</center> 
     
<script> 
    function change_colour(n){ 
     
        var colour = ["Blue", "Green", "Red", "Black"]; 
        var texts = document.getElementsByClassName("colour"); 
        for(var i=0; i<texts.length; i++) 
            teks[i].style.colour=warna[n]; 
    }
</script>
    }
                   