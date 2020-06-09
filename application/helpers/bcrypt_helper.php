<?php

function bcrypt_encode($string)
{
   $encrypt_text = rand(111111111, 999999999) . '020' . $string . '412' . rand(111111111, 999999999);
   $encrypt_result = base64_encode($encrypt_text);
   return $encrypt_result;
}

function bcrypt_decode($string)
{
   $decrypt_text = base64_decode($string);
   $decrypt_result = substr($decrypt_text, 12, 5);
   return $decrypt_result;
}
