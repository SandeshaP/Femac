<?php
  require "input.php";
//Defining variables with empty values for showing errors
  $UNameErr="";
  $PwdErr="";
  $EmailErr="";
  $PhoneErr="";
  $GenderErr="";
  
 //For holding user data
  $UName="";
  $Pwd="";
  $Email="";
  $Phone="";
  $Gender="";
  
  //Input fields validation
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    //Validating username
    if(empty($_POST["UName"])){
        $UNameErr="Username is required";
    }
    else{
        $UName=input_data($_POST["UName"]);
        //To check that username contains only alphabets, digits & underscores
        if(!preg_match("/^[a-zA-Z0-9_]*$/", $UName)){
            $UNameErr="Only alphabets, digits & underscores are allowed for User Name";
        }
    }

    //Validating password
    if(empty($_POST["Password"])){
        $PwdErr="Password is required";
    }
    else{
        $Pwd=input_data($_POST["Password"]);
        //To check that password doesn't contain blankspace
        
        // $ucase=preg_match("@[A-Z]@",$Password);
        // $lcase=preg_match("@[a-z]@",$Password);
        // $digits=preg_match("@[0-9]@",$Password);
        // $specialChars=preg_match("@[^\w]@",$Password);
        // if(!$ucase||!$lcase||!$digits||!$specialChars||strlen($Password)<8){
        //     $PasswordErr="Password should be atleast 8 characters in length & should include atleast one uppercase letter, one lowercase letter, one digit & one special character";
        // }
        if(!preg_match("/^[a-zA-Z0-9_#$%^&*]*$/",$Pwd && !strlen($Pwd)>=8)){
            $PwdErr="Password should be atleast 8 characters in length & should include atleast one uppercase letter, one lowercase letter, one digit & one special character";
        }
    }

    //Validating email
    if(empty($_POST["Email"])){
        $EmailErr="Email is required";
    }
    else{
        $Email=input_data($_POST["Email"]);
        //To check that the email address is valid
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $EmailErr="Invalid Email";
        }
    }

    //Validating phoneno
    if(empty($_POST["Phone"])){
        $PhoneErr="Phoneno is required";
    }
    else{
        $Phone=input_data($_POST["Phone"]);
        //To check that phoneno is valid
        if(!preg_match("/^[0-9]*$/",$Phone)){
            $PhoneErr="Only numeric values are allowed";
        }
        //To check that phoneno contains exact 10 digits
        if(strlen($Phone)!=10){
            $PhoneErr="Please provide a phoneno of 10 digits";
        }
    }

    //Validating gender
    if(empty($_POST["Gender"])){
        $GenderErr="Please provide your gender";
    }
    else{
        $Gender=input_data($_POST["Gender"]);
    }
   }

  //Handling whitespaces & special characters in the data
  function input_data($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
  }
?>