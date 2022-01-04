 
 
var msg= document.getElementById("msg");
msg.style.display="none";
var Name = document.getElementById("username");
var email = document.getElementById("email");
var passone = document.getElementById("passOne");
var passtwo = document.getElementById("passTwo");
var submit = document.getElementById("submitBtn");
submit.addEventListener("click",SendUserData);

/*
    create function to handle user data when user clicks the
    submit button.

    Name.value = "";
    email.value = "";
    passone.value = "";
     passtwo.value = "";

     "<strong>Form Filled Succesfully</strong>";
                setTimeout(()=>msg.style.display= "none", 3000);

*/

function SendUserData(e){
    var Usernane = Name.value;
    var Email = email.value;
    var Passone = passone.value;
    var Passtwo = passtwo.value;

    if( Usernane != "" && Email!= "" && Passone != "" && Passtwo != ""){
        if(Passone == Passtwo){
        xhr = new XMLHttpRequest();
        xhr.open("get",`index.php?name=${Usernane}&password=${Passone}&email=${Email}`,true);
        xhr.onload = function(){
            if(this.status == 200){
                Name.value = "";
                email.value = "";
                passone.value = "";
                passtwo.value = "";
                msg.style.display= "block";
                msg.classList = "pass-msg";console.log(this.responseText);
                msg.innerHTML = this.responseText;
                window.location.href = "login.html";
            }
        }
        xhr.send();
    }
        else{
            msg.style.display= "block";
            msg.classList = "error-msg";
            msg.innerHTML = "<strong>*Passwords Does Not Match*</strong>";
            setTimeout(()=>msg.style.display= "none", 3000);
        }
    }
    else {
            msg.style.display= "block";
            msg.classList = "error-msg";
            msg.innerHTML = "<strong>*Please Fill In All Fields*</strong>";
            setTimeout(()=>msg.style.display= "none", 3000);
    }

}