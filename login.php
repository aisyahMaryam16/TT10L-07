<?php
ob_start();
    session_start();
    include ('connect.php');
    if (isset($_POST['submit'])) {
        $UserID = $_POST['UserID'];
        $password = $_POST['password'];
        $meet = FALSE;
        if ($meet == FALSE) {
            $sql = "SELECT * FROM Player";
            $result = mysqli_query($connect, $sql);
            while($Player = mysqli_fetch_array($result)) {
                if ($Player['IcNumber'] == $UserID && $Player["password"] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $contestant['IcNumber'];
                    $_SESSION['name'] = $Player['player'];
                    $_SESSION['status'] = 'Player';
                    break;
                }
            }
        }
        
        if ($meet == FALSE) {
            $sql = "SELECT * FROM Steward";
            $result = mysqli_query($connect, $sql);
            while($Steward = mysqli_fetch_array($result)) {
                if ($Steward['StewardID'] == $UserID && $Steward["password"] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $Steward['StewardID'];
                    $_SESSION['name'] = $Steward['steward'];
                    $_SESSION['status'] = 'Steward';
                    break;
                }
            }
        }

        if ($meet == FALSE)
{
            $sql = "SELECT * FROM Supervisor";
            $result = mysqli_query($connect, $sql);
            while($Supervisor = mysqli_fetch_array($result)) {
                if ($Supervisor['SupervisorID'] == $UserID && $Supervisor['password'] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $Supervisor['SupervisorID'];
                    $_SESSION['Name'] = $Supervisor['supervisor'];
                    $_SESSION['status'] = 'Supervisor';
                    break;
                }
            }
        }

        if ($meet == TRUE) {
            if ($_SESSION['status'] == 'Player')
                header("Location: player_home.php");
            else if ($_SESSION['status'] == 'Steward')
                header("Location: steward_home.php");
            else if ($_SESSION['status'] == 'Supervisor')
                header("Location: supervisor_home.php");
        }
        else
            echo " <script>
alert('username and password error'); 
                    window.location='login.php'</script>";
    }
?>

<html>
    <link rel="stylesheet" href="button.css">
    <link rel="stylesheet" href="form.css">
    
    <body>
        <center>
            <img src='TEXT1.png.png'><br>
            <img src='TEXT2.png.png'>
        </center>
        <h3 class="short">LOG IN</h3>
        <form class="short" action="login.php" method="post">
            <table>
            <tr>
                <td><img src="user.png.png"></td>
                <td>
<input type="text" name="UserID" placeholder="UserID" required>
</td>
            </tr>
            <tr>
                    <td><img src="lock.png.png"></td>
                    <td>
<input type="password" name="password" placeholder="Passcode" required>
</td>
                </tr>
                </table>
                <button class="login" type="submit" name="submit">Login</button>
                <button class="signup" type="button" onclick="window.location='signup.php'">
Sign Up</button>
            </form>
        </body>
    </html>
