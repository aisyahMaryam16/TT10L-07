<?php
    include("sambungan.php");
    $IcNumber = $_POST["IcNumber"];
    $Score = $_POST["total_marks"];
    
    $sql = "select * from criteria";
    $data = mysqli_query($sambungan, $sql);
    
    while ($criteria = mysqli_fetch_array($data)) {
        $ScoreObtained = $_POST["$criteria[CriteriaID]"];
        $CriteriaID = $criteria['CriteriaID'];
        $sql = "insert into result values('$IcNumber', '$CriteriaID', '$ScoreObtained', '$Score')";
        $result = mysqli_query($sambungan, $sql);
        
        if ($result == true)
            echo "<script>alert('Successfully added');
           window.location='judge_contestant.php'</script>";
           else
            echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
        } // tamat while
    ?>