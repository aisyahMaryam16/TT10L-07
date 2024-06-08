<?php
ob_start();
    session_start();
    include ('connect.php');
    if (isset($_POST['submit'])) {
        $UserID = $_POST['UserID'];
        $password = $_POST['password'];
        $meet = FALSE;
        if ($meet == FALSE) {
            $sql = "SELECT * FROM player";
            $result = mysqli_query($connect, $sql);
            while($player = mysqli_fetch_array($result)) {
                if ($player['IcNumber'] == $UserID && $player["password"] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $player['IcNumber'];
                    $_SESSION['name'] = $player['player'];
                    $_SESSION['status'] = 'player';
                    break;
                }
            }
        }
        
        if ($meet == FALSE) {
            $sql = "SELECT * FROM steward";
            $result = mysqli_query($connect, $sql);
            while($steward = mysqli_fetch_array($result)) {
                if ($steward['StewardID'] == $UserID && $steward["password"] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $steward['StewardID'];
                    $_SESSION['name'] = $steward['steward'];
                    $_SESSION['status'] = 'steward';
                    break;
                }
            }
        }

        if ($meet == FALSE)
{
            $sql = "SELECT * FROM supervisor";
            $result = mysqli_query($connect, $sql);
            while($supervisor = mysqli_fetch_array($result)) {
                if ($supervisor['SupervisorID'] == $UserID && $supervisor['password'] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $supervisor['SupervisorID'];
                    $_SESSION['Name'] = $supervisor['supervisor'];
                    $_SESSION['status'] = 'supervisor';
                    break;
                }
            }
        }

        if ($meet == TRUE) {
            if ($_SESSION['status'] == 'player')
                header("Location: player_home.php");
            else if ($_SESSION['status'] == 'steward')
                header("Location: steward_home.php");
            else if ($_SESSION['status'] == 'supervisor')
                header("Location: supervisor_home.php");
        }
        else
            echo " <script>
            alert('username and password error'); 
            window.location='login.php'</script>";
    }
?>

<html>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="button.css">
    
    <body>
        <center>
            <img src=''><br>
            <img src=''>
        </center>
        <h3 class="short">LOG IN</h3>
        <form class="short" action="login.php" method="post">
            <table>
            <tr>
                <td><img src="user.png"></td>
            <td>
        <input type="text" name="UserID" placeholder="UserID" required>
            </td>
            </tr>
            <tr>
                <td><img src="lock.png"></td>
            <td>
        <input type="password" name="password" placeholder="Passcode" required>
            </td>
            </tr>
            </table>
                <button class="login" type="submit" name="submit">Login</button>
                <button class="signup" type="button" onclick="window.location='signup.php'">Sign Up</button>
            </form>
        </body>
    </html>
