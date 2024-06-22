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

            $sql = "SELECT * FROM Steward";
            $result = mysqli_query($connect, $sql);
            while($Steward = mysqli_fetch_array($result)) {
                if ($Steward['StewardID'] == $UserID && $Steward["password"] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $Steward['StewardID'];
                    $_SESSION['name'] = $Steward['steward'];
                    $_SESSION['status'] = 'Steward';

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

            $sql = "SELECT * FROM Supervisor";
            $result = mysqli_query($connect, $sql);
            while($Supervisor = mysqli_fetch_array($result)) {
                if ($Supervisor['SupervisorID'] == $UserID && $Supervisor['password'] == $password) {
                    $meet = TRUE;
                    $_SESSION['UserID'] = $Supervisor['SupervisorID'];
                    $_SESSION['Name'] = $Supervisor['supervisor'];
                    $_SESSION['status'] = 'Supervisor';

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

            if ($_SESSION['status'] == 'Player')
                header("Location: player_home.php");
            else if ($_SESSION['status'] == 'Steward')
                header("Location: steward_home.php");
            else if ($_SESSION['status'] == 'Supervisor')

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


            alert('username and password error'); 
            window.location='login.php'</script>";
    }
?>

<html>
   <head>
   <title>Log In</title>
    <link rel="stylesheet" href="styles3.css">
    </head>
   
<body>
        <div class="wrapper">
        <form action="" method="post">
    <h1>Login</h1>
    <div class="input-box">
        <input type="text" class="input-field" placeholder="ID" name="UserID" required>
        <i class="bx bxs-user"></i>
    </div>
    <div class="input-box">
        <input type="password" class="input-field" placeholder="password" required name="password">
        <i class="bx bxs-user"></i>
    </div>
    <button type="submit" class="btn" name="submit">Login</button>
    <div class="register-link">
        <p>Don't Have An Account? <a href="signup.php">Register</a></p>
    </div>
</form>

    </div>
</body>
</html>
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
