<?php
if(isset($_POST['input_submit'])){
        include("connect.php");
        
        $UName=$_POST['UName'];
        $Pwd=md5($_POST['Password']);
        $Email=$_POST['Email'];
        $Phone=$_POST['Phone'];
        $Gender=$_POST['Gender'];
    
        $query=mysqli_query($conn,"Select * from user where Email='$Email' or UName='$UName'");
        
        //Checking whether email already exist in the database 
        if(mysqli_num_rows($query)>0){
             echo "Email or Username already exists";
            // <!DOCTYPE html>
            // <html lang="en">
            // <head>
            //     <meta charset="UTF-8">
            //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
            //     <title>Document</title>
            //     <style>
            //         .popup{
            //             background-color: aquamarine;
            //             position: absolute;
            //             top: 50%;
            //             left: 50%;
            //             transform: translate(-50%,-50%);
            //             height: fit-content;
            //             width: fit-content;
            //             border: 1px solid black;
            //             border-radius: 5px;
            //             opacity: 0.5;
            //         }
            //     </style>
            // </head>
            // <body>
            //     <div class="popup">
            //         <p>Email already exists!</p>
            //     </div>
            // </body>
            // </html>
        }
        else{
        //Inserting data into database
            $sql="insert into user(UName,Password,Email,Phone,Gender) values('$UName','$Pwd','$Email','$Phone','$Gender')";
            mysqli_query($conn,$sql);
        }
}
?>