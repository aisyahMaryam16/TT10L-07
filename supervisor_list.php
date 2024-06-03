<?php
    include ('connect.php');
    include("supervisor_menu.php");
    ?>
    
   <link rel="stylesheet" href="list.css">
   
  <table>
      <caption>LIST OF SUPERVISORS</caption>
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
          echo"<tr> <td>$supervisor[SupervisorID]</td>
          <td>$supervisor[supervisor]</td>
          <td>$supervisor[password]</td>
          <td><a href= 'supervisor_update.php?
          SupervisorID=$supervisor[SupervisorID]'>update</a></td>
          <td><a href= 'supervisor_delete.php?
          SupervisorID=$supervisor[SupervisorID]'>delete</a></td>
          </tr>";
      }
      
    ?>
  </table>