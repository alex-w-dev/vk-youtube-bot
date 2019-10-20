<?php
include('../../../constants.php');
session_start();

$getInfoGroupResponse = file_get_contents(
  'https://api.vk.com/method/utils.resolveScreenName'.
  '?screen_name=chertkov.alexandr'.
//  '&count=1'.
  '&access_token='.$vk_main_poster_access_token.
  '&v=5.102'
);
$parsedInfo = json_decode($getInfoGroupResponse, true);

header('Content-Type: application/json');
echo file_get_contents('https://api.vk.com/method/wall.get'.
  '?owner_id='.(($parsedInfo['response']['type']==='user')?'':'-').$parsedInfo['response']['object_id'].
  '&count=3'.
  '&access_token='.$vk_main_poster_access_token.
  '&v=5.102');