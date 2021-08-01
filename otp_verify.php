<?php
ob_start();
session_start();
if (isset($_GET['token']) &&  isset($_SESSION['last_login_time'])) {
    $token = $_GET['token'];














?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <script>
        function pageRedirect() {
            window.location.replace("http://localhost/task/index.php");
        }
        setTimeout("pageRedirect()", 300000);
    </script>

    <body>
        <style>
            * {
                padding: 0;
                margin: 0;

            }

            body{
    background-image: url('https://source.unsplash.com/1600x900/?nature,water');
            background-size: 100%;
           
            background-repeat: no-repeat;
            color: yellow;
}

            .container {
                width: 30%;
                height: 30%;
                border: 2px solid black;
                position: relative;
                left: 50%;
                top: 50%;
                transform: translate(-50%, 4%);
                justify-content: center;
                align-items: center;
                background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));


                border-radius: 10px;
               


            }

            .box {




                text-align: center;
                padding: 20px;


            }

            input[type=tel] {
                border: 2px solid black;
                padding: 2px;
                font-size: 20px;
                border-radius: 10px;
                text-align: center;

            }

            button,
            input[type=submit] {
                width: 100px;
                height: 30px;
                border-width: 2px;
                border-radius: 10px;

            }


            input {
                margin: 10px 0px 6px 11px;
            }

            h3 {
                padding-top: 15px;
            }
        </style>
        </head>

        <body>

            <div class="container">
                <h3 style="text-align: center;">ENTER OTP</h3>
                <p style="text-align: center;">**You have only 5 minutes for registration **</p>
                <p style="text-align: center;">**Please check your email**</p>
                <div class="box">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?take=<?php echo  $token ?>" method="POST" enctype="multipart/form-data">

                        <input type="tel" min="6" max="6" name="pin" id="pin" title="Enter Six Digit Pin " placeholder="Please Enter Otp" required><br>


                      
                        <input type="submit" value="Verify" name="submit">

                    </form>

                </div>

            </div>
        </body>

    </html>
    </body>

    </html>


<?php
}







if ((isset($_POST['submit'])) && isset($_GET['take'])) {

   
    $pin = $_POST['pin'];
    
    $take = $_GET['take'];
   
        $data1 = $data['otp'];

        if ($data1 === $pin) {


            echo '
<script>
    alert("Succesfully Verified");
    window.location.replace("http://localhost/task/index.php");
</script>';
        } else {

            echo ' <script> alert("Otp is wrong")
    </script>';
        }
    }

?>