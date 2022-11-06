<?php

include "config.php";

if(isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $user_id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password= $_POST['psw'];

    $sql = "UPDATE users SET firstname ='$firstname', lastname ='$lastname', email ='$email', password='$password', gender='$gender' WHERE id='$user_id'";

    $result = $conn->query($sql);

    if($result == TRUE) {
        echo "Record upated succesfully";
        $url = "http://127.0.0.1/view.php";
        header('Location: '.$url);
        die();
    }
    else {
        echo "error:". $sql . "<br" . $conn->error;
    }
}

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
}
 else {
    //If the 'id' value is not valid, redirect the user back to view.php page
    header('location: view.php');
}

    $sql = "SELECT * FROM users WHERE id = $user_id ";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];

        

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
             }else {
                $email = test_input($_POST["email"]);
            
        }
    }
}
    ?>

    <!DOCTYPE html
    <html>
    <body>    
    
    
    
    <h2> User Update Form</h2>
        <form action="" method="post">
        <fieldset>
        <legend> Personal Information:</legend>
        firstname:<br>
        <input type="text" name="firstname" required value="<?php echo $firstname; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <br>
        Last name:<br>
        <input type="text" name="lastname" required value="<?php echo $lastname; ?>">
        <br>
        Email:<br>
        <input type="email" name="email" required value="<?php echo $email; ?>">
        <br>
        Password:<br>
        <input type="password" id="psw" name="psw" value="<?php echo $password; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <br>
        Gender:<br>
        <input type="gender" name="gender" required value="<?php echo $gender; ?>">
        <br>
        <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){echo "checked";} ?> >Male
        <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){echo "checked";} ?> >Female
        <br><br>
        <input type="submit" value="Update" name="update">
    </fieldset>
    </form>
    
</body>
<body>


</body>
</html>