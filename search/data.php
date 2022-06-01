<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
    echo "search.php?u=$username";
}
?>