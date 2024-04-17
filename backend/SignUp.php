<?php

    include('config.php');

        $hospitalName = $_REQUEST['hospitalName'];
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $pinCode = $_REQUEST['pinCode'];
        $h_RegistrationDate = $_REQUEST['h_RegistrationDate'];
        $n_ambulance = $_REQUEST['n_ambulance'];
    
    
        $email = $_REQUEST['email'];
        $phoneNumber = $_REQUEST['phoneNumber'];
        $h_RegistrationNumber = $_REQUEST['h_RegistrationNumber'];
        $e_WardNumber = $_REQUEST['e_WardNumber'];
    
    
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
    
        $file_path = "../client_data/".$file_name;
        
        $password = $_REQUEST['password'];
    
        $special_access_code = $_REQUEST['special_access_code'];
    
        $date_and_time = date("d.M.Y/D  h-i-s/A");

        echo "('$date_and_time', '$hospitalName', '$address', '$city', '$state', '$pinCode', '$h_RegistrationDate', '$n_ambulance', '$email', '$phoneNumber', '$h_RegistrationNumber', '$e_WardNumber', '$file_path', '$password', '$special_access_code')";
    

    if(move_uploaded_file($file_tmp, $file_path));
    {
        $sql_query = "INSERT INTO `user_data` (`date_and_time`, `hospitalName`, `address`, `city`, `state`, `pinCode`, `h_RegistrationDate`, `n_ambulance`, `email`, `phoneNumber`, `h_RegistrationNumber`, `e_WardNumber`, `file_path`, `password`, `special_access_code` ) VALUES ('$date_and_time', '$hospitalName', '$address', '$city', '$state', '$pinCode', '$h_RegistrationDate', '$n_ambulance', '$email', '$phoneNumber', '$h_RegistrationNumber', '$e_WardNumber', '$file_path', '$password', '$special_access_code')";

        $result = mysqli_query($conn, $sql_query);

        if($result)
        {   echo "Please Wait, we are redirecting you in 5 sec.";
            header("refresh: 5; url= ../login.php");
        }
        else
        {
            echo "Sorry, Registration failed. Please try again.";
 
        }


    }

?> 

