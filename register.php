<?php

//$pdo = require 'connect.php';
require_once 'config.php';
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
/*if ($pdo) {
    echo "Connected to the $dbname database successfully!";
}*/

// to check if email id is already registered
$chk = $pdo->prepare("SELECT * FROM userdata WHERE email=?");
$chk->execute([$_POST['id']]);
$data = $chk->fetchAll();

if(count($data)>0){
    echo '<script>alert("Email ID Already Exists!!");
    window.location.href="index.html";
    </script>';
}
else{
// prepare statement for insert
$sql = "INSERT INTO userdata(email,fname,lname,age,gender,pno,roles) VALUES (:email,:fname,:lname,:age,:gender,:pno,:roles)";
//$sql = "INSERT INTO userdata(email,fname,lname,age,gender,pno,roles) VALUES (:email,:fname,:lname,:age,:gender,:pno,:roles";

$stmt = $pdo->prepare($sql);

//$uid='22';
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$email = $_POST['id'];
$role = $_POST['roles'];
$ph = $_POST['ph'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$passw = $_POST['passw'];
$cpass = $_POST['cpass'];

// pass values to the statement
//$stmt->bindValue(':uids', $uid);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':fname', $f_name);
$stmt->bindValue(':lname', $l_name);
$stmt->bindValue(':age', $age);
$stmt->bindValue(':gender', $gender);
$stmt->bindValue(':pno', $ph);
$stmt->bindValue(':roles', $role);



// execute the insert statement
$stmt->execute();

$stmt = $pdo->prepare("SELECT * FROM userdata WHERE email=?");
$stmt->execute([$email]);
$data = $stmt->fetchAll();
$lid = $data[0][0];

$sql = "INSERT INTO login(uids,email,passw) VALUES (:uids,:email,:passw)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uids', $lid);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':passw',$passw);
$stmt->execute();
    
$pat = '2022-06-03 10:10:00';
$nra = 0;
$nba = 0;
$nsa = 0;
$nusa = 0;
$performance = 0;

$sql = "INSERT INTO activity(uids,email,pat,nra,nba,nsa,nusa,performance) VALUES (:uids,:email,:pat,:nra,:nba,:nsa,:nusa,:performance)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uids', $lid);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':pat',$pat);
$stmt->bindValue(':nra',$nra);
$stmt->bindValue(':nba',$nba);
$stmt->bindValue(':nsa',$nsa);
$stmt->bindValue(':nusa',$nusa);
$stmt->bindValue(':performance',$performance);
//$stmt->bindValue(':uids', $lid);
$stmt->execute();

echo '<script>alert("Registered successfully. Please go to Login page and Login.");
    window.location.href="index.html";
    </script>';
}
?>
