<?php 
  $data = "";
  if ($data == null) echo "this is boolean ";


  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  echo generateRandomString(3);
// private static final String ALPHA_NUMERIC_STRING = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
// public static String randomAlphaNumeric(int count) {
//   StringBuilder builder = new StringBuilder();
//   while (count-- != 0) {
//     int character = (int)(Math.random()*ALPHA_NUMERIC_STRING.length());
//     builder.append(ALPHA_NUMERIC_STRING.charAt(character));
//   }
//   return builder.toString();
// }

// private static final String ALPHA_NUMERIC_STRING = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
// public static String randomAlphaNumeric(int count) {
// StringBuilder builder = new StringBuilder();
// while (count-- != 0) {
// int character = (int)(Math.random()*ALPHA_NUMERIC_STRING.length());
// builder.append(ALPHA_NUMERIC_STRING.charAt(character));
// }
// return builder.toString();
// }