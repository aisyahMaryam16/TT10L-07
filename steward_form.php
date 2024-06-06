<?php 
    session_start(); 
     include("connect.php"); 
     include("steward_menu.php"); 
     $name = $_SESSION["name"]; 
     $StewardID = $_SESSION['UserID']; 
      
?> 
<link rel="stylesheet" href="form.css"> 
<link rel="stylesheet" href="button.css"> 
<div class="content"> 
    <h3 class="marks">SCORING FORM</h3> 
    <form class="marks" action="steward_form2.php" method="post"> 
    <table> 
        <tr> 
            <td>Steward Name : </td> 
            <td><?php echo $name; ?> </td> 
        </tr> 
         
        <tr> 
            <td>Player</td> 
            <td> 
                <select class="TotalMarks" name="IcNumber"> 
                <?php 
                    $sql = "select * from player where StewardID = '$StewardID' "; 
                    $data = mysqli_query($connect, $sql); 
                    while ($player = mysqli_fetch_array($data)) { 
                        echo "<option value ='$player[IcNumber]'>$player[PlayerName]</option>"; 
                    } 
                ?> 
                </select> 
            </td> 
        </tr> 
    </table> 
     
    <table class="marks"> 
        <tr> 
            <th>Aspect Name</th> 
            <th>Total Marks</th> 
            <th>Score Obtained</th> 
        </tr> 
        <?php     
            $sql = "select * from aspect"; 
            $data = mysqli_query($connect, $sql); 
            while ($aspect = mysqli_fetch_array($data)) { 
            echo "<tr > 
                   <td>$aspect[AspectName]</td> 
                   <td>$aspect[TotalMarks]</td> 
                   <td><input oninput='count_Score()' class='marks' type='text' pattern = '[0-9]+'
                   id ='$aspect[AspectID]' name ='$aspect[AspectID]' value= 0 maxlength=2
                   required></td>  
                </tr>";  
            } 
        ?> 
        <tr class="total_marks"> 
                <td></td> 
                <td class="total_marks">Total Marks</td> 
                <td><input class="marks" type="text" id="total_marks" name="total_marks"></td> 
            </tr> 
        </table> 
        <button class="Add" type="submit" name="submit">Add</button> 
        </form> 
    </div> 
     
    <script type="text/javascript"> 
         
        function count_Score() { 
             
        var tot_all = 0; 
         
        <?php 
            $sql = "select * from aspect"; 
            $data = mysqli_query($connect, $sql); 
            while ($aspect = mysqli_fetch_array($data)) { 
                echo "var marks = parseInt(document.getElementById('$aspect[AspectID]').value); 
                    tot_all = tot_all + marks;"; 
            } 
        ?> 
        document.getElementById("total_marks").value = tot_all; 
         
    } 
     
</script>