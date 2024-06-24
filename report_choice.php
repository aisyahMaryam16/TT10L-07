<?php 
    include("supervisor_menu.php"); 
?> 
 
<html> 
    <link rel="stylesheet" href="form.css"> 
    <link rel="stylesheet" href="button.css"> 
    <body> 
        <h3 class = "report">CHOICE OF REPORT</h3> 
        <form class = "report" action="report_print.php" method="post"> 
            <select ID='choice' name='choice' onchange='show_choice()'> 
            <option value=1>Full List</option> 
            <option value=2>List BY Steward</option> 
                </select> <br> 
                <div ID="steward" style="display:none"> 
                <select name="StewardID"> 
                <?php 
                    include('connect.php'); 
                    $sql = "select * from steward"; 
                    $data = mysqli_query($connect, $sql); 
                    while ($steward = mysqli_fetch_array($data)) {
                        echo "<option value='$steward[StewardID]'>$steward[steward]</option>";  
                } 
            ?> 
            </select> 
            </div> 
        <button class="show" type="submit">Show</button> 
    </form> 
<script>  
    function show_choice () { 
        var choose = document.getElementById("choice").value; 
        if (choose == 1) { 
            document.getElementById('steward').style.display = 'none'; 
    } 
    else if (choose == 2) { 
        document.getElementById('steward').style.display = 'block'; 
    } 
} 
</script> 
</body> 
</html>