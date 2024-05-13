<?php 
    session_start(); 
     include("sambungan.php"); 
     include("judge_menu.php"); 
     $name = $_SESSION["name"]; 
     $JudgeID = $_SESSION['UserID']; 
      
?> 
<link rel="stylesheet" href="form.css"> 
<link rel="stylesheet" href="button.css"> 
<div class="content"> 
    <h3 class="marks">SCORING FORM</h3> 
    <form class="marks" action="judge_form2.php" method="post"> 
    <table> 
        <tr> 
            <td>Judge Name : </td> 
            <td><?php echo $name; ?> </td> 
        </tr> 
         
        <tr> 
            <td>Contestant</td> 
            <td> 
                <select class="TotalMarks" name="IcNumber"> 
                <?php 
                    $sql = "select * from contestant where JudgeID = '$JudgeID' "; 
                    $data = mysqli_query($sambungan, $sql); 
                    while ($contestant = mysqli_fetch_array($data)) { 
                        echo "<option value ='$contestant[IcNumber]'>$contestant[ContestantName]</option>"; 
                    } 
                ?> 
                </select> 
            </td> 
        </tr> 
    </table> 
     
    <table class="marks"> 
        <tr> 
            <th>Criteria Name</th> 
            <th>Total Marks</th> 
            <th>Score Obtained</th> 
        </tr> 
        <?php     
            $sql = "select * from criteria"; 
            $data = mysqli_query($sambungan, $sql); 
            while ($criteria = mysqli_fetch_array($data)) { 
            echo "<tr > 
                   <td>$criteria[CriteriaName]</td> 
                   <td>$criteria[TotalMarks]</td> 
                   <td><input oninput='count_Score()' class='marks' type='text' pattern = '[0-9]+'
                   id ='$criteria[CriteriaID]' name ='$criteria[CriteriaID]' value= 0 maxlength=2
                   required></td>  
                </tr>";  
            } //tamat while 
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
            $sql = "select * from criteria"; 
            $data = mysqli_query($sambungan, $sql); 
            while ($criteria = mysqli_fetch_array($data)) { 
                echo "var marks = parseInt(document.getElementById('$criteria[CriteriaID]').value); 
                    tot_all = tot_all + marks;"; 
            } // tamat while 
        ?> 
        document.getElementById("total_marks").value = tot_all; 
         
    } //tamat function 
     
</script>