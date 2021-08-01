<?php

echo password_hash("12345",PASSWORD_BCRYPT);
session_start();
if (isset($_POST['submit'])) {



    $email = $_POST['email'];


    $randomnumber = random_int(1000, 9999);
    $token = bin2hex(random_bytes(20));
    // echo $token;
    require 'mailfolder/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    // $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port     = 587;
    $mail->Username = "Enter Your email";     #this email is only used to practice purpose 
    $mail->Password = "Abc@12345";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("Enter Your email", "Enter Your name");
    $mail->AddReplyTo("Enter Your email");
    $mail->AddAddress("$email");
    $mail->Subject =  "OTP VERIFICATION";
    $mail->WordWrap   = 80;
    $content = "Hello,Your Email Actication Otp is : $randomnumber and this is valid only 5 minutes ";
    $mail->MsgHTML($content);
    $mail->IsHTML(true);
    if (!$mail->Send()) {
        
        echo '
        <script>
            alert("Check Your Internet Connection")
        </script>    ';
    } else {
                    $_SESSION['last_login_time'] = time();

                header("Location:otp_verify.php?token=$token");
         
        }
    
}else{



?>





<!--                                            HTML AND CSS PART -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        
           
          
        }
body{
    background-image: url('https://source.unsplash.com/1600x900/?nature,water');
            background-size: 100%;
           
            background-repeat: no-repeat;
}
        .container {
            width: 50%;
            height: 50%;
            border: 2px solid black;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));


            border-radius: 30px;


        }

        .box {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 50px;


        }

        input[type=email] {
            border: 2px solid black;
            padding: 20px;
            font-size: 20px;
            border-radius: 10px;
            text-align: center;
          
          
            

        }

        input[type=submit] {
            width: 120px;
            height: 40px;
            border-width: 2px;
            border-radius: 10px;
            background-image: linear-gradient(to right, yellowgreen, lightgreen);
            opacity: 1.0;
            

        }

        


        input {
            margin: 10px 0 0px 0;

        }

        h2{
            text-align: center ; 
            padding-top:30px;
            background-image: linear-gradient(to right, blue, yellow);
            border-top-left-radius: 28px;
            border-top-right-radius: 28px;


        }
    </style>
</head>

<body>
    <div class="container">
        <h2  >WELCOME TO EMAIL OTP VERIFICATION</h2>
        <div class="box">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <input type="email" name="email" id="email" title="Enter Email" placeholder="Please Enter Your Email" required><br>
                <input type="submit" value="Conform" id="submited" name="submit">

            </form>

        </div>

    </div>
</body>


</html>



<?php
}