<?php 
    include("manager_menu.php"); 
    include ('sambungan.php'); 
     
    ?> 
     
    <link rel="stylesheet" href="form.css"> 
    <link rel="stylesheet" href="button.css"> 
     
    <h3 class="long">SEARCH</h3> 
    <form class="long" action="contestant_search2.php" method="post"> 
    <table> 
        <tr> 
            <td>Contestant Name</td> 
            <td> 
                <select name="IcNumber"> 
                    <?php 
                    $sql = "select * from contestant"; 
                    $data = mysqli_query($sambungan, $sql); 
                    while ($contestant = mysqli_fetch_array($data)) { 
                        echo "<option value='$contestant[IcNumber]'>$contestant[IcNumber] : 
                            $contestant[ContestantName]</option>"; 
                    } // tamat while 
                ?> 
            </select> 
        </td> 
        </tr> 
    </table> 
    <button class="search" type="submit">Search</button> 
    </form>