<?php
    include "config.php";

    $sql = "SELECT *FROM users";

    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
        <title> View Page </title>
        <link rel="stylesheet"
        href=https://www.simplilearn.com/tutorials/php-tutorial/php-crud-operations>

        <style>
         table, th, td {
            border: 1px solid black;
            width: 100px;
            height: 50px;
            padding: 10px;
            border-radius: 10px;
         }
      </style>
    </head>

<body>
    <div class="container">        
        <div style="margin-bottom: 10px;">
            <strong style="margin-right: 300px;">Users</strong>
            <a href="create.php">Add New Record</a>
        </div>
        <table class="table">
        <tbody>    
        <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
            </tr>
            
                 <?php
                 if($result->num_rows>0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                        <td><?php echo $row['id']; ?> </td>
                        <td><?php echo $row['firstname']; ?> </td>
                        <td><?php echo $row['lastname']; ?> </td>
                        <td><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['gender']; ?> </td>
                        <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">
                        Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">
                        delete</a</td>
                    </tr>
                    
                    <?php  
                    }
                } else {
                    ?>                    
                    <tr>
                    <td colspan="6" style="text-align: center;">There are no records found.</td></tr>
                    <?php
                    //echo "There are no records found.";
                }
                ?>
                
            </tbody>
            </table>
            </div>

            </body>
            <body>
          

            </body>
            </html>           