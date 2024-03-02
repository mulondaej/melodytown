<?php 

if(isset($_GET['code'])) {
    $confirmation_code = $_GET['code'];
if(mysqli_num_rows($result) == 1) {
        // Update user's email status as confirmed
        $user_id = $row['id'];
        $sql = "UPDATE users SET email = 1 WHERE id = $user_id";

        if(mysqli_query($conn, $update_sql)) {
            echo "Your email has been verified successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid confirmation code.";
    }
} else {
    echo "Confirmation code not found.";
}

?>