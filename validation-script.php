<?php
$valid=$fnameErr=$lnameErr=$phoneErr=$emailErr=$passErr=$cpassErr='';

$set_firstName=$set_lastName=$set_phone=$set_files=$set_email='';    
 extract($_POST);

if(isset($_POST['register']))
{
   
   
   $validName="/^[a-zA-Z ]*$/";
   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   $validphone="/(?=.*?[0-9])/";
   $uppercasePassword = "/(?=.*?[A-Z])/";
   $lowercasePassword = "/(?=.*?[a-z])/";
   $digitPassword = "/(?=.*?[0-9])/";
   $spacesPassword = "/^$|\s+/";
   $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
   $minEightPassword = "/.{8,}/";

 
   
if(empty($first_name)){
   $fnameErr="First Name is Required"; 
}
else if (!preg_match($validName,$first_name)) {
   $fnameErr="Digits are not allowed";
}else{
   $fnameErr=true;
}



if(empty($last_name)){
   $lnameErr="Last Name is Required"; 
}
else if (!preg_match($validName,$last_name)) {
   $lnameErr="Digits are not allowed";
}
else{
   $lnameErr=true;
}



if(empty($email)){
  $emailErr="Email is Required"; 
}
else if (!preg_match($validEmail,$email)) {
  $emailErr="Invalid Email Address";
}
else{
  $emailErr=true;
}


if(empty($phone)){
    $phoneErr="Phone no. is Required"; 
  }
  else if (!preg_match($validEmail,$email)) {
    $phoneErr="Invalid Phone no.";
  }
  else{
    $phoneErr=true;
  }
    

  
if(empty($password)){
  $passErr="Password is Required"; 
} 
elseif (!preg_match($uppercasePassword,$password) || !preg_match($lowercasePassword,$password) || !preg_match($digitPassword,$password) || !preg_match($symbolPassword,$password) || !preg_match($minEightPassword,$password) || preg_match($spacesPassword,$password)) {
  $passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
}
else{
   $passErr=true;
}



if($cpassword!=$password){
   $cpassErr="Confirm Password doest Matched";
}
else{
   $cpassErr=true;
}



if($fnameErr==1 && $lnameErr==1 && $emailErr==1 && $passErr==1 && $cpassErr==1 && $phoneErr==1)
{
   $valid="All fields are validated successfully";


   
   
   $firstName= legal_input($first_name);
   $lastName=  legal_input($first_name);
   $email=     legal_input($email);
   $phone=     legal_input($phone);
   $password=  legal_input($password);

  
   
}else{
    
    
    $set_firstName=$first_name;
    $set_lastName= $last_name;
    $set_email=    $email;
    $set_phone= $phone;
    $set_files= $files;
}

}




function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>