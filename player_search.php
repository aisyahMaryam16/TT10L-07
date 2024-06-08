<?php 
    include("supervisor_menu.php"); 
    include ('connect.php'); 
     
    ?> 
     
    <link rel="stylesheet" href="form.css"> 
    <link rel="stylesheet" href="button.css"> 
     
    <h3 class="long">SEARCH</h3> 
    <form class="long" action="player_search2.php" method="post"> 
    <table> 
        <tr> 
            <td>Player Name</td> 
            <td> 
                <select name="IcNumber"> 
                    <?php 
                    $sql = "select * from player"; 
                    $data = mysqli_query($connect, $sql); 
                    while ($player = mysqli_fetch_array($data)) { 
                        echo "<option value='$player[IcNumber]'>$player[IcNumber] : 
                            $player[player]</option>"; 
                    } // tamat while 

                            $player[PlayerName]</option>"; 
                    } 
                ?> 
            </select> 
        </td> 
        </tr> 
    </table> 
    <button class="search" type="submit">Search</button> 
    </form>