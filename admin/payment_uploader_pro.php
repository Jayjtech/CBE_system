<?php  
 require "../config/db.php";
if(isset($_POST["submit"]))
{
    
    $bosser = mysqli_real_escape_string($conn,$_POST['bosser']);
           	
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))//handling csv file 
   {
     
    $username = mysqli_real_escape_string($conn, $data[0]);  
    $adm_no = mysqli_real_escape_string($conn, $data[1]);
    $u_bill_name = mysqli_real_escape_string($conn, $data[2]);
    $amount = mysqli_real_escape_string($conn, $data[3]);
    $u_term = mysqli_real_escape_string($conn, $data[4]);
    $session = mysqli_real_escape_string($conn, $data[5]);

    if(empty($u_bill_name)){
        $_SESSION['message'] = "There is an error in the bill name column, please fill in the correct spelling and
        and ensure that it is in uppercase form!";
        $_SESSION['msg_type'] = "danger";//Message saved background
         header("location:manual_payment.php");
    } 

    
    if($u_bill_name == "TUITION"){
        $bill_name = "tuition";
    }
    if($u_bill_name == "SPORT WEAR"){
        $bill_name = "sport_wear";
    }
    if($u_bill_name == "CARDIGAN"){
        $bill_name = "cardigan";
    }
    if($u_bill_name == "UNIFORM"){
        $bill_name = "uniform";
    }
    if($u_bill_name == "VS"){
        $bill_name = "thanksgiving";
    }
    if($u_bill_name == "EXCURSION"){
        $bill_name = "excursion";
    }
    if($u_bill_name == "OTHERS"){
        $bill_name = "others";
    }
    if($u_bill_name == "BOOK"){
        $bill_name = "book";
    }

    

    $time = time();
    $day = date("dmY");
    $reference = "ACPS$day$time";

    if($u_term == "FIRST"){
        $term = "First Term";
        $my_bill = "my_bill";
    }
    if($u_term == "SECOND"){
        $term = "Second Term";
        $my_bill = "second_term_bill";
        
    }
    if($u_term == "THIRD"){
        $term = "Third Term";
        $my_bill = "third_term_bill";
    }

    if($bill_name == "tuition"){
        $trans_table = "tuition_fee";
    }
    if($bill_name == "cardigan" || $bill_name == "sport_wear" || $bill_name == "thanksgiving" || $bill_name == "excursion" || 
    $bill_name == "uniform" || $bill_name == "others" || $bill_name == "book"){
        $trans_table = "transactions";
    }
    
    //INSERT AND UPDATE QUERY
    if(!empty($u_bill_name)){
    if($bill_name == "tuition" || $bill_name == "cardigan" || $bill_name == "sport_wear" || $bill_name == "thanksgiving" || $bill_name == "excursion" || 
    $bill_name == "uniform" || $bill_name == "others"){

        $conn->query("INSERT INTO  $trans_table (term, session, username, description, amount, reference) 
        VALUES('$term', '$session', '$username', '$bill_name', '$amount', '$reference')") 
        or die($conn->error);

        $result =$conn->query("SELECT * FROM $my_bill WHERE session='$session' AND username='$username' AND adm_no = '$adm_no' ");
        while($row = $result->fetch_assoc()):
         $total = $row['total'];
         $bill = $row["$bill_name"];
         $static_tuition = $row['static_tuition'];
        endwhile;

        //Update Student's Bill to new amount
        $balance = $bill - $amount;
        $newTotal = $total - $amount;

        $query = $conn->query("UPDATE $my_bill SET $bill_name ='$balance', total='$newTotal' WHERE username='$username' AND session='$session' AND adm_no = '$adm_no'")
         or die($conn->error);

         if($query){ 
            $_SESSION['message'] = "Records have successfully been saved and Students' bills have been Updated!";
            $_SESSION['msg_type'] = "success";//Message saved background
             header("location:manual_payment.php");
         
            } 

        }
    }
    
       }
   
    }
 }
}


if(isset($_POST['update_rev'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $adm_no = mysqli_real_escape_string($conn, $_POST['adm_no']);
    $bill_name = mysqli_real_escape_string($conn, $_POST['bill_name']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $term = mysqli_real_escape_string($conn, $_POST['term']);
    $session = mysqli_real_escape_string($conn, $_POST['session']);


    $time = time();
    $day = date("dmY");
    $reference = "ACPS$day$time";

    if($term == "First Term"){
    $my_bill = "my_bill";
    }
    if($term == "Second Term"){
        $my_bill = "second_term_bill";
    }
    if($term == "Third Term"){
        $my_bill = "third_term_bill";
    }

    if($bill_name == "tuition"){
        $trans_table = "tuition_fee";
    }

    if($bill_name == "cardigan" || $bill_name == "sport_wear" || $bill_name == "thanksgiving" || $bill_name == "excursion" || 
    $bill_name == "uniform" || $bill_name == "others" || $bill_name == "book"){
        $trans_table = "transactions";
    }


    $conn->query("INSERT INTO  $trans_table (term, session, username, description, amount, reference) 
        VALUES('$term', '$session', '$username', '$bill_name', '$amount', '$reference')") 
        or die($conn->error);

        $result =$conn->query("SELECT * FROM $my_bill WHERE session='$session' AND username='$username' AND adm_no = '$adm_no' ");
        while($row = $result->fetch_assoc()):
         $total = $row['total'];
         $bill = $row["$bill_name"];
         $static_tuition = $row['static_tuition'];
        endwhile;

        //Update Student's Bill to new amount
        $balance = $bill - $amount;
        $newTotal = $total - $amount;

        $query = $conn->query("UPDATE $my_bill SET $bill_name ='$balance', total='$newTotal' WHERE username='$username' AND session='$session' AND adm_no = '$adm_no'")
         or die($conn->error);

         if($query){ 
            $_SESSION['message'] = "Records have successfully been saved and Students' bills have been Updated!";
            $_SESSION['msg_type'] = "success";//Message saved background
             header("location:manual_payment.php");


    }
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
        $conn->query("DELETE FROM transactions WHERE id=$id") or die($conn->error());
        
        $_SESSION['message'] = "Transaction details has been deleted!";
        $_SESSION['msg_type'] = "danger";//Message delete background
    
        header("location: manual_payment.php");
}
?>