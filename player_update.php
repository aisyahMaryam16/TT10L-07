<?php
include("connect.php");
include("supervisor_menu.php");

if (isset($_POST["submit"])) {
    $IcNumber = $_POST["IcNumber"];
    $player = $_POST["player"];
    $password = $_POST["password"];
    $StewardID = $_POST["StewardID"];
    $SupervisorID = $_POST["SupervisorID"];

    // Escape the input to prevent SQL injection
    $IcNumber = mysqli_real_escape_string($connect, $IcNumber);
    $player = mysqli_real_escape_string($connect, $player);
    $password = mysqli_real_escape_string($connect, $password);
    $StewardID = mysqli_real_escape_string($connect, $StewardID);
    $SupervisorID = mysqli_real_escape_string($connect, $SupervisorID);

    $sql = "UPDATE player SET password = '$password', player = '$player', StewardID = '$StewardID', SupervisorID = '$SupervisorID' WHERE IcNumber = '$IcNumber'";

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('Successfully updated'); window.location='player_list.php'</script>";
    } else {
        echo "<br><center>Error: " . $sql . "<br>" . mysqli_error($connect) . "</center>";
    }
}

if (isset($_GET['IcNumber'])) {
    $IcNumber = $_GET['IcNumber'];
} else {
    echo "<br><center>Error: IcNumber not set</center>";
    exit();
}

$sql = "SELECT * FROM player WHERE IcNumber = '$IcNumber'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "<br><center>Error: Player not found</center>";
    exit();
}

$value = mysqli_fetch_array($result);
$player = $value['player'];
$password = $value['password'];
$StewardID = $value['StewardID'];
$SupervisorID = $value['SupervisorID'];
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">

<h3 class="long">UPDATE PLAYER</h3>

<form class="long" action="player_update.php" method="post">
    <table>
        <tr>
            <td>IcNumber</td>
            <td><input type="text" name="IcNumber" value="<?php echo $IcNumber; ?>" readonly></td>
        </tr>
        <tr>
            <td>PlayerName</td>
            <td><input type="text" name="player" value="<?php echo $player; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="<?php echo $password; ?>"></td>
        </tr>
        <tr>
            <td>StewardID</td>
            <td><input type="text" name="StewardID" value="<?php echo $StewardID; ?>"></td>
        </tr>
        <tr>
            <td>SupervisorID</td>
            <td><input type="text" name="SupervisorID" value="<?php echo $SupervisorID; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>