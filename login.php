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

ajsd