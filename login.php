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
<head>
    <title>Log in Title</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>

    <video autoplay loop muted>
        <source src="202406072335.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

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