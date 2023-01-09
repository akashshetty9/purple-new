<?php

if(isset($_POST['sam'])){
echo '<script>alert("Successful Attack")
    window.location.href="OSCredentialDumping.php";
    </script>';
}elseif(isset($_POST['ca'])){
echo '<script>alert("Successful Attack")
    window.location.href="CreateAccount.php";
    </script>';
}elseif(isset($_POST['map'])){
echo '<script>alert("Successful Attack")
    window.location.href="ModifyAuthenticationProcess.php";
    </script>';
}elseif(isset($_POST['etc'])){
echo '<script>alert("Successful Attack")
    window.location.href="OSCredentialDumping1.php";
    </script>';
}elseif(isset($_POST['mas'])){
echo '<script>alert("Successful Attack")
    window.location.href="Masquerading.php";
    </script>';
}
else{
echo '<script>alert("Select any attack")</script>';
}
?>
