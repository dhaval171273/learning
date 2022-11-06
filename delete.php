<?php
    include "config.php";

    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result ==TRUE) {
        echo "Record deleted succesfully.";
        $url = "http://127.0.0.1/view.php";
        header('Location: '.$url);
        die();
    } else{
        echo "error:" . $sql . "<br>" . $conn->error;
    }
}
?>
</br>
<a href="view.php">Back</a>