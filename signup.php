<?php
        include('sambungan.php');
        if (isset($_POST['IcNumber'])) {
        $IcNumber = $_POST["IcNumber"];
        $ContestantName = $_POST["ContestantName"];
        $JudgeID = $_POST["JudgeID"];
        $ManagerID = $_POST["ManagerID"];
        $Passcode = $_POST["Passcode"];

    
        $sql = "insert into contestant values('$IcNumber', '$ContestantName', '$JudgeID', 
        '$ManagerID', '$Passcode')";
        $result = mysqli_query($sambungan, $sql);
        if ($result)
            echo "<script>alert('Successfully Signed Up')</script>";
        else
            echo "<script>alert('Sign Up Was Unsuccessful')</script>";
        echo "<script>window.location='login.php'</script>";
    }
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">
<body>
    <center>
        <img src='TEXT1.png.png'><br>
        <img src='TEXT2.png.png'>
    </center>
    
    <h3 class="long">SIGN UP</h3>
    <form class="long" action="signup.php" method="post">
        <table>
        <tr> 
        <td class="colour">IcNumber</td> 
        <td><input required type = "text" name = "IcNumber" placeholder = "666666224444" 
                   pattern = "[0-9]{12}" oninvalid = "this.setCustomValidity('Please insert 12 numbers')" oninput = "this.setCustomValidity('')"></td> 
        </tr>
           
        <tr>
            <td>ContestantName</td>
            <td><input type="text" name="ContestantName" required></td>
        </tr>
        <tr>
                <td>Passcode</td>
                <td><input type="text" name="Passcode" required></td>
            </tr>
            <tr>
             <td>JudgeName</td>
             <td>
                    <select name="JudgeID">
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
                <td class="colour">ManagerName</td>
                <td>
                    <select name="ManagerID">
                    <?php
                        $sql = "select * from manager";
                        $data = mysqli_query($sambungan, $sql);
                        while ($manager = mysqli_fetch_array($data)) {
                            echo "<option 
value='$manager[ManagerID]'>$manager[ManagerName]</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
        </table>
        <button class="add" type="submit">Register</button>
        <button class="delete" type="button" onclick="window.location='login.php'">Cancel</button>
    </form>
    </body>