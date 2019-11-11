<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$vk_sasha_access_token = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/local-db/vk-sasha-access-token.txt');
$vk_babushka_access_token = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/local-db/vk-babushka-access-token.txt');
$vk_sveta_access_token = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/local-db/vk-sveta-access-token.txt');

$vk_main_poster_access_token = $vk_sveta_access_token;

$vk_likers = [
  $vk_sasha_access_token,
  $vk_sveta_access_token,
  $vk_babushka_access_token,
];
//href="away.php?utf=1&to=https%3A%2F%2Fapi.vk.com%2Fblank.html%23access_token%3Dd1af5cc4cb922371f3c2090242269bdff86cc82d9d970a47c6959e31bbf54db592c050e68fe8b2f1099dc%26expires_in%3D0%26user_id%3D238372933"