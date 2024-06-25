<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Form</title>
    <style>
        body{
            /* background-image:url("img/36b885107148725.5fa08100392dd.jpg"); */

            /* background-image:url("img/IMG-20240617-WA0002.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center top;
            background-size:200px 200px ; */
            background-color: white;
        }
        .container{
            background-color: #f1eeee;
            /* display: flex;
            align-items: center; */
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%,-50%);
           height: fit-content;
           width: 500px;
           border: 1px solid black;
           border-radius: 5px;
           box-shadow:0 20px 35px rgb(0,0,1,0.9);
        }
        img{
        height: 50px;
        width: 80px;
        margin-top: 10px;
        margin-left: 200px;
        margin-right: 200px;
        }
        .h{
            font-family:Georgia, 'Times New Roman', Times, serif;
            text-align: center;
            margin: 10px;
            font-size: 30px;
            color: rgb(207, 31, 31);
        }
         .f{
            margin: 10px;
            padding: 10px;
        } 
        .details{
            height: 40px;
            width: 400px;
            margin: 10px;
            padding: 5px;
            border-radius: 5px;
            border: none;
            background-color: white;
        }
        .error{
            color: red;
        }
        input[type=radio]{
            accent-color: red;
        }
        button{
             margin-left: 170px;
             margin-right: 150px;
             margin-top: 15px;
             margin-bottom: 5px;
        }
        .btn{
            align-items: center;
            width: 120px;
            height: 35px;
            background-color: black;
            color: white;
            border-radius: 20px;
        }
        .msg {
            color: brown;
            margin: 20px 0px 10px 0px;
            font-size: 25px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php require "validation.php"?>
    <!-- Creating registration form -->
    <div class="container">
    <img src="img\IMG-20240621-WA0000.jpg">
        <h3 class="h">Register</h3>
        <!-- Using 'post' method for secure data sharing -->
        <form method="post" class="f" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <input type="text" name="UName" placeholder="Enter your username" class="details">
            <span class="error"><?php echo $UNameErr; ?></span> 
            <br>            
            <input type="password" name="Password" placeholder="Create a password" class="details">
            <span class="error"><?php echo $PwdErr;?></span>
            <br>
            <input type="email" name="Email" placeholder="Enter your email" class="details">
            <span class="error"><?php echo $EmailErr;?></span>
            <br>
            <input type="text" name="Phone" placeholder="Enter your phoneno" class="details">
            <span class="error"><?php echo $PhoneErr;?></span>
            <br>
            <label>
            <input type="radio" name="Gender" value="male"> Male</label>
            <label><input type="radio" name="Gender" value="female"> Female</label>
            <label><input type="radio" name="Gender" value="other"> Other</label>
            </label>
            <br>
            <span class="error"><?php echo $GenderErr;?></span>
            <br>
            <button type="submit" name="input_submit" class="btn">Submit</button>
         </form>

    </div>
     <?php
    //Checking whether the submit button has been pressed or not
      if(isset($_POST['input_submit'])){
        //Checking if there is any error or not
        if($UNameErr=="" && $PwdErr=="" && $EmailErr=="" && $PhoneErr=="" && $GenderErr==""){
            echo "<p class='msg'>You have been successfully registered.</p>";
        }
        else{
            echo "<p class='msg'>You shared Invalid details.<br>Please provide correct data!</p>";
        }
     }
    ?>
</body>
</html>