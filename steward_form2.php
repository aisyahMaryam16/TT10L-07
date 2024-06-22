<?php
    include("connect.php");
    $IcNumber = $_POST["IcNumber"];
    $Score = $_POST["total_marks"];
    
    $sql = "select * from aspect";
    $data = mysqli_query($connect, $sql);
    
    while ($aspect = mysqli_fetch_array($data)) {
        $ScoreObtained = $_POST["$aspect[AspectID]"];
        $AspectID = $aspect['AspectID'];
        $sql = "insert into result values('$IcNumber', '$AspectID', '$ScoreObtained', '$Score')";
        $result = mysqli_query($connect, $sql);
        
        if ($result == true)
            echo "<script>alert('successfully added');
           window.location='steward_player.php'</script>";
           else
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
        } // tamat while
    ?>