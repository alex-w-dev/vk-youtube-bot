<?php

//session_start();
//$content = file_get_contents(
//  'https://oauth.vk.com/access_token'.
//  '?client_id=7172930'.
//  '&client_secret=2ShxBhN3I4oXe8LcpGSC'.
//  '&redirect_uri=http://'.$_SERVER['HTTP_HOST'].'/api/vk/access-call-back.php'.
//  '&code='.$_GET['code']
//);
//$decoded = json_decode($content, true);
//
//$_SESSION['vk_access_token'] = $decoded['access_token'];
//$_SESSION['vk_expires_in'] = $decoded['expires_in'];
//$_SESSION['vk_user_id'] = $decoded['user_id'];
//
//header('Location: http://'.$_SERVER['HTTP_HOST'].
//    '?page=spam-vk-walls'.
//    '&access_token='.$decoded['access_token'].
//    '&expires_in='.$decoded['expires_in'].
//    '&user_id='.$decoded['user_id']);