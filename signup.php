<?php
        include('connect.php');
        if (isset($_POST['IcNumber'])) {
        $IcNumber = $_POST["IcNumber"];
        $player = $_POST["player"];
        $StewardID = $_POST["StewardID"];
        $SupervisorID = $_POST["SupervisorID"];
        $password = $_POST["password"];

    
        $sql = "insert into player values('$IcNumber', '$player', '$StewardID', 
        '$SupervisorID', '$password')";
        $result = mysqli_query($connect, $sql);
        if ($result)
            echo "<script>alert('successfully signed up')</script>";
        else
            echo "<script>alert('sign up was unsuccessful')</script>";
        echo "<script>window.location='login.php'</script>";
    }
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">
<body>
    <center>
        <img src=''><br>
        <img src=''>
    </center>
    
    <h3 class="long">SIGN UP</h3>
    <form class="long" action="signup.php" method="post">
        <table>
        <tr> 
        <td class="colour">Ic Number</td> 
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
                        $sql = "select * from steward";
                        $data = mysqli_query($connect, $sql);
                        while ($steward = mysqli_fetch_array($data)) {
                            echo "<option value='$steward[StewardID]'>$steward[steward]</option>";
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
                        $sql = "select * from supervisor";
                        $data = mysqli_query($connect, $sql);
                        while ($supervisor = mysqli_fetch_array($data)) {
                            echo "<option 
value='$supervisor[SupervisorID]'>$supervisor[supervisor]</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
        </table>
        <button class="add" type="submit">register</button>
        <button class="delete" type="button" onclick="window.location='login.php'">cancel</button>
    </form>
    </body>