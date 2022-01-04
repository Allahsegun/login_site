<?php
    $isfirst = true;
    $msg = "";
    $file = "userdata.txt";
    $username = trim(htmlentities($_POST["username"]));
    $password = trim(htmlentities($_POST["password"]));
    $fileData = file_get_contents($file);
    $firstArray = explode(";",$fileData);
    foreach($firstArray as $myArray){
        $subArray = explode(",",$myArray);
        if($subArray[0] == $username && $subArray[2] == $password && $isfirst ){
            $msg = "welcome $username <br><br>";
            $isfirst = false;
        }
        
   }
   if($isfirst){
    $msg = "*username or passsword incorrect *";
   }
  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <style>
       
        body{
            background:#f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 300px;
            scroll-behavior: smooth;
            }
        div{
            width:50%;
            margin:auto;
        }
        p{
            padding:15px 5px;
            margin-top:100px;
            text-align:center;
            letter-spacing: 1px;
            color:#063fa8;
            border:3px solid #063fa8;
        }
    </style>
</head>
<body>
        <div>
            <p><?php echo $msg;?></p>
        </div>
</body>
</html>










