<?php
    include ('connect.php');
    include("supervisor_menu.php");
    ?>
    
   <link rel="stylesheet" href="list.css">
   
  <table>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Password</th>
          <th colspan="2">Action</th>
      </tr>
      
      <?php
        $sql = "select * from supervisor";
        $result = mysqli_query($connect, $sql);
      while($supervisor = mysqli_fetch_array($result)){
          $maskedPassword = str_repeat('*', strlen($supervisor['password']));
          echo"<tr>
          <td>{$supervisor['SupervisorID']}</td>
                <td>{$supervisor['supervisor']}</td>
                <<td>{$maskedPassword}</td>
                <td><a href='supervisor_update.php?SupervisorID={$supervisor['SupervisorID']}'class='btn edit'>update</a></td>
                <td><a href='supervisor_delete.php?SupervisorID={$supervisor['SupervisorID']}'class='btn btn-danger'>delete</a></td>
              </tr>";
          
        
      }
      
    ?>
  </table>