

<?php 
    include('connect.php'); 
    include("supervisor_menu.php"); 
     
    if(isset($_POST['IcNumber'])){ 
        $IcNumber = $_POST['IcNumber']; 
         
        $sql = "select * from player where IcNumber = '$IcNumber'"; 
        $result = mysqli_query($connect, $sql); 
         
        if(mysqli_num_rows($result) > 0){ 
            $player = mysqli_fetch_array($result); 
             
            $playerName = $player['player']; 
            $StewardID = $player['StewardID']; 
            $SupervisorID = $player['SupervisorID']; 
            $password = $player['password']; 
        } else { 
            echo "No player found with IC Number $IcNumber"; 
            exit; 
        } 
    } else { 
        echo "IC Number is required"; 
        exit; 
    } 
?> 
 
<link rel="stylesheet" href="list.css"> 
<table> 
    <caption >PLAYER INFORMATION</caption> 
    <tr> 
        <th>Information</th> 
        <th>Data</th> 
    </tr> 
    <tr> 
        <td class="result">Ic Number</td> 
        <td class="result"><?php echo $IcNumber; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Player Name</td> 
        <td class="result"><?php echo $playerName; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Steward ID</td> 
        <td class="result"><?php echo $StewardID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Supervisor ID</td> 
        <td class="result"><?php echo $SupervisorID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Password</td> 
        <td class="result"><?php echo $password; ?></td> 
    </tr> 



<?php
include('connect.php');
include("supervisor_menu.php");

if (isset($_POST['IcNumber'])) {
    $IcNumber = $_POST['IcNumber'];

    $stmt = $connect->prepare("SELECT * FROM player WHERE IcNumber = ?");
    $stmt->bind_param("s", $IcNumber);
    $stmt->execute();
    $result = $stmt->get_result();
    $playerData = $result->fetch_assoc();

    if ($playerData) {
        $playerName = $playerData['player'];
        $StewardID = $playerData['StewardID'];
        $SupervisorID = $playerData['SupervisorID'];
        $password = $playerData['password']; // Note: you should not store passwords in plain text
    } else {
        echo "Player not found";
        exit;
    }
} else {
    echo "IcNumber is required";
    exit;
}
?>

<link rel="stylesheet" href="list.css">
<table>
    <tr>
        <th>Information</th>
        <th>Data</th>
    </tr>
    <tr>
        <td class="result">Ic Number</td>
        <td class="result"><?php echo $IcNumber; ?></td>
    </tr>
    <tr>
        <td class="result">Name</td>
        <td class="result"><?php echo $playerName; ?></td>
    </tr>
    <tr>
        <td class="result">Steward ID</td>
        <td class="result"><?php echo $StewardID; ?></td>
    </tr>
    <tr>
        <td class="result">Supervisor ID</td>
        <td class="result"><?php echo $SupervisorID; ?></td>
    </tr>
    <tr>
        <td class="result">Password</td>
        <td class="password"><?php echo $password; ?></td>
    </tr>



<?php 
    include('connect.php'); 
    include("supervisor_menu.php"); 
     
    if(isset($_POST['IcNumber'])){ 
        $IcNumber = $_POST['IcNumber']; 
         
        $sql = "select * from player where IcNumber = '$IcNumber'"; 
        $result = mysqli_query($connect, $sql); 
         
        if(mysqli_num_rows($result) > 0){ 
            $player = mysqli_fetch_array($result); 
             
            $playerName = $player['player']; 
            $StewardID = $player['StewardID']; 
            $SupervisorID = $player['SupervisorID']; 
            $password = $player['password']; 
        } else { 
            echo "No player found with IC Number $IcNumber"; 
            exit; 
        } 
    } else { 
        echo "IC Number is required"; 
        exit; 
    } 
?> 
 
<link rel="stylesheet" href="list.css"> 
<table> 
    <caption >PLAYER INFORMATION</caption> 
    <tr> 
        <th>Information</th> 
        <th>Data</th> 
    </tr> 
    <tr> 
        <td class="result">Ic Number</td> 
        <td class="result"><?php echo $IcNumber; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Player Name</td> 
        <td class="result"><?php echo $playerName; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Steward ID</td> 
        <td class="result"><?php echo $StewardID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Supervisor ID</td> 
        <td class="result"><?php echo $SupervisorID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Password</td> 
        <td class="result"><?php echo $password; ?></td> 
    </tr> 


</table>