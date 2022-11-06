<?php
    include "config.php";

    if(isset($_POST['submit'])) {

     //echo "<pre>";print_r($_POST);exit;
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $gender = $_POST['gender'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `gender`, `comment`) VALUES ('$first_name', '$last_name', '$email', '$password', '$gender', '$comment')";
        //to check the sql query
        //echo $sql;
        //exit;

        $result = $conn->query($sql);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
              $nameErr = "Name is required";
            } else {
              $name = test_input($_POST["name"]);
        }

        if($result == TRUE) {
            echo "New record created succesfully";
            $url = "http://127.0.0.1/view.php";
            header('Location: '.$url);
            die();
        }
        else {
            echo "Error:" . $sql . "<br>". $conn->error;
        }
         $conn->close();
    }
}
    

?>




<!DOCTYPE html>
<html>
<body>


<h2> Signup Form</h2>


<Form action= "" method="POST">
    <fieldset>
    <legend> Personal Information:</legend>
    First Name: <br>
    <input type= "text" name="firstname" required>
    <br>
    Last Name: <br>
    <input type="text" name="lastname" required>
    <br>
    Email: <br>
    <input type= "email" name="email" required>
    <br>
    Password: <br>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <br>
    Gender: <br>
    <input type="radio" name="gender" value="Male" required>Male
    <input type="radio" name="gender" value="Female" required>Female
    
   
    <br><br>
    Comment: 
    <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="submit">

</fieldset>
</form>


</body>
</html>
