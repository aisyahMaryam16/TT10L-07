<?php
        include('connect.php');

        if (isset($_POST['IcNumber'])) {
        $IcNumber = $_POST["IcNumber"];
        $player = $_POST["player"];
        $StewardID = $_POST["StewardID"];
        $SupervisorID = $_POST["SupervisorID"];
        $password = $_POST["password"];

    
    $sql = "INSERT INTO player (IcNumber, player, StewardID, SupervisorID, password) VALUES ('$IcNumber', '$player', '$StewardID', '$SupervisorID', '$password')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "<script>alert('Successfully signed up.')</script>";
        echo "<script>window.location='login.php'</script>";
    } else {
        echo "<script>alert('Sign up was unsuccessful.')</script>";
        echo "<script>window.location='login.php'</script>";
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="form_su.css">
</head>
<body>
    <video autoplay loop muted>
        <source src="202406072335.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <div class="wrapper">
    <form class="long" action="signup.php" method="post">
        <h1>Sign Up</h1>

        <div class="input-box">
            <input required type="text" name="IcNumber" placeholder="xxxxxxxxxxxx" 
                           pattern="[0-9]{12}" oninvalid="this.setCustomValidity('Please insert 12 numbers')" 
                           oninput="this.setCustomValidity('')">
           
        <div class="input-box">
             <input type="text" name="player" placeholder="player">
           
         <div class="input-box">
                <input type="password" name="password" placeholder="password">
            
                <div class="input-box">
                    <select name="StewardID">
                         <?php 
                        $sql = "select * from steward";
                        $data = mysqli_query($connect, $sql);
                        while ($steward = mysqli_fetch_array($data)) {
                            echo "<option value='$steward[StewardID]'>$steward[steward]</option>";
                        }
                    ?>

                    </select>
                </div>
                
                <div class="input-box">
                    <select name="SupervisorID">

                         <?php
                        $sql = "select * from supervisor";
                        $data = mysqli_query($connect, $sql);
                        while ($supervisor = mysqli_fetch_array($data)) {
                            echo "<option 
value='$supervisor[SupervisorID]'>$supervisor[supervisor]</option>";
                        }
                    ?>
<!-- Add your other options here -->
                    </select>
                </div>
                
    <div class="btn-container">
        <button class="btn" type="submit">Register</button>
        <button class="btn" type="submit" onclick="window.location='login.php'">Cancel</button>
    </div>    
    </form>
</body>
</html>