<?php
$fadil = "hello";
echo "Hello\n";
$_ar = array(
  "satu0" => "fadil",
  "satu1" => "fadil",
  "satu2" => "fadil",
  "satu3" => "fadil",
  "satu4" => "fadil",
  "satu5" => "fadil",
  "satu6" => "fadil"
);
if (isset($_ar['satu0'])) {
  echo "ini bool";
}

foreach ($_ar as  $value) {
  echo "$value\n";
}


$str = "api/fadil/{id}/ini";
if (preg_match("/{*}/", $str)) {
  $newRoute = substr($str, 0, strpos($str, "{"));
  echo $newRoute;
}

$email = "asdsdff@asdf.com"; 
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
$email = (preg_match($regex, $email))?$email:"invalid email";
echo $email."\n";

// class Fadil {}

// class Foo {
//   function bar($a, $b, $c) {
//       return $a + $b + $c;
//   }
// }

// $method = new ReflectionMethod('Foo', 'bar');
// var_dump($method->getParameters());

$money = 200000.00;
setlocale(LC_MONETARY, 'en_US');
echo money_format('%i', $money) . "\n";
number_format();

$string = "JKSJA";
if(preg_match("/[a-z]/i", $string)){
  print "it has alphabet!";
}




