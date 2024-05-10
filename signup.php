<?php
        include('connect.php');
        if (isset($_POST['IcNumber'])) {
        $IcNumber = $_POST["IcNumber"];
        $player = $_POST["player"];
        $StewardID = $_POST["StewardID"];
        $SupervisorID = $_POST["SupervisorID"];
        $password = $_POST["password"];

    
        $sql = "insert into Player values('$IcNumber', '$player', '$StewardID', 
        '$SupervisorID', '$password')";
        $result = mysqli_query($connect, $sql);
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
        <td><input required type = "text" name = "IcNumber" placeholder = "xxxxxxxxxxxx" 
                   pattern = "[0-9]{12}" oninvalid = "this.setCustomValidity('Please insert 12 numbers')" oninput = "this.setCustomValidity('')"></td> 
        </tr>
           
        <tr>
            <td>player</td>
            <td><input type="text" name="player" required></td>
        </tr>
        <tr>
                <td>password</td>
                <td><input type="text" name="password" required></td>
            </tr>
            <tr>
             <td>steward</td>
             <td>
                    <select name="StewardID">
                    <?php 
                        $sql = "select * from Steward";
                        $data = mysqli_query($connect, $sql);
                        while ($Steward = mysqli_fetch_array($data)) {
                            echo "<option value='$Steward[StewardID]'>$Steward[steward]</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="colour">supervisor</td>
                <td>
                    <select name="SupervisorID">
                    <?php
                        $sql = "select * from Supervisor";
                        $data = mysqli_query($connect, $sql);
                        while ($Supervisor = mysqli_fetch_array($data)) {
                            echo "<option 
value='$Supervisor[SupervisorID]'>$Supervisor[supervisor]</option>";
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