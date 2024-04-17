<?php
    if(isset($_GET['hospitalName']))
    {
        include('./backend/config.php');

        $hospitalName = $_REQUEST['hospitalName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $special_access_code = $_REQUEST['special_access_code'];

        $sql_query = "Select * from user_data";

        $result = mysqli_query($conn, $sql_query);

        if($result)
        {
            while($data = mysqli_fetch_assoc($result))
            {
                if($password == $data['password'] && $special_access_code == $data['special_access_code'])
                {
                    header('location: camera.html');
                }
            }

            echo "<script>alert('Please enter right password and special access code.')</script>";


        }

    }
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sicu-aura</title>
    <link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
    <div class="container">

        <div class="logo-image">
            <img src="./image/logo-image.png" alt="logo-image"/>
        </div>

        <div class="form">

            <div class="logo-with-title">

                <div class="logo">
                    <img src="./image/logo.png" alt="logo"/>
                </div>
                

                <div class="title">
                    <button id="Sign-Up-btn">Sign Up/</button>

                    <span>Login</span>

                </div>

            </div>

            <form action="" method="get">
            <div class="form-table">

                <div>
                    <p class="welcome-text">Welcome to Sicu-aura</p>
                    <p class="safety-sol-text">Your one stop safety solutions using innovative technology</p>
                </div>

                
                <div>
                    
                    <table>
                        <tr>
                            <td><input id="Hospital-Name" type="text" placeholder="Hospital Name" name="hospitalName" value=""></td>
                        </tr>
                        <tr>
                            <td><input type="email" placeholder="Email ID" name="email"></td>
                        </tr>
                        <tr>
                            <td><input type="password" placeholder="Password" name="password"></td>
                        </tr>
                        <tr>
                            <td><input type="password" placeholder="Special Access Code" name="special_access_code"></td>
                        </tr>
                    </table>

                </div>

            </div>

          
            <div class="login-button">
                <button type="submit">Login</button>
            </div>

            </form>

        
            <div class="terms-and-condition">
               <ul>
                <li>Terms and Condition privacy policy</li>
               </ul>
            </div>

            
        </div>
    </div>
<script src="./javascript/login.js"></script>
</body>
</html>