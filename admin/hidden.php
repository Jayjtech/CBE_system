<?php  
 include "../config/db.php";
$user_token = $_SESSION['token'];
 if(isset($_POST['id'])){
    $category = $_POST['id'];
     $sub = $conn->query("SELECT * FROM subject_tbl WHERE user_token ='$user_token'");
        echo '
            <select class="form-control" name="course_code" required>
            <option value="">Select Course Code</option>
            ';
                while($row = $sub->fetch_assoc()):
            echo '
                    <option value="'.$row['course_code'].'">'.$row['subject'].' :: '.$row['course_code'].'
                ';
                endwhile;
                echo '
                </option>
            </select>
        ';
 }