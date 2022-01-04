<?php

    $msg = "";
    $file = "userdata.txt";
    $isavailable = true;
    $username = trim(htmlentities( $_GET["name"]));
    $email = trim(htmlentities($_GET["email"]));
    $password = htmlentities($_GET["password"]);
    $Data = "$username,$email,$password";
    if(file_exists($file)){
        if(file_get_contents($file) == ""){
        $fileData = "$username,$email,$password";
        file_put_contents($file,$fileData);
        echo ucwords("congratulations you are sucessfully registered");
        }
        else{
            $fileData = file_get_contents($file);
            $firstArray = explode(";",$fileData);
            foreach($firstArray as $get){
                $sub_array = explode(",",$get);
                if($sub_array[0]==$username && stristr($msg,$username) == ""){
                    $msg .= ucwords("username \"$username\" has already been used!<br/><br/>");
                    $isavailable = false;
                }
                if($sub_array[1]==$email && stristr($msg,$email) == "" ){
                   
                    $msg .=ucwords("email \"$email\" has already been used <br/><br/>");
                    $isavailable = false;
               
            }

           
        }
        if($isavailable){
            $fileData .= ";$Data";
            file_put_contents($file,$fileData);
            echo ucwords("congratulations $username you are sucessfully registered");

        }
        else{
            echo $msg;
        }
    }
}
    else{
        $handle = fopen("userdata.txt",'w');
        echo "file created";
    }

    /*if(fread($handle,filesize("userdata.txt")) == ""){
        $data = "$username => ['username' => $username,'email' => $email, 'password' => $password]";
        $handle = fopen("userdata.txt","w");
        fwrite($handle,$data);
        echo "Success";

    }
    else{
        $handle = fopen("userdata.txt","r");
        $data = [fread($handle,filesize("userdata.txt"))];
        foreach($data as $users => $user){
            if($user == $username){
                $isavailable = false;
            }
            // echo "username $username is already been used!";
        }
        if($isavailable){
            $handle = fopen("userdata","r");
            $data .= [$username => ["username" => $username,"email" => $email, "password" => $password]];
            $handle = fopen("userdata","w");
            fwrite($handle,$data);
            echo "okay";
            echo "Congarulations $username You Are Succesfully Registered <div><button id =\"login\">LOGIN</button>";
    
        }

        
    }
    $isavailable = true;
    */
    // $isavailable = true;
    // $isoncename = true;
    // $isonceemail = true;

?>