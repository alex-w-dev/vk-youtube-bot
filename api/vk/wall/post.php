<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/constants.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/libs/http-requester.class.php';

$vk_current_video_id = '';
if (isset($_POST['attachments'])) {
  $vk_current_video_id = $_POST['attachments'];
  // file_put_contents($_SERVER['DOCUMENT_ROOT'].'/local-db/vk-spam-attach-video.txt', $vk_current_video_id);
} else {
  $vk_current_video_id = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/local-db/vk-spam-attach-video.txt');
}

$vk_spam_video_message = '';
if (isset($_POST['message'])) {
  $vk_spam_video_message = $_POST['message'];
  // file_put_contents($_SERVER['DOCUMENT_ROOT'].'/local-db/vk-spam-text.txt', $vk_current_video_id);
} else {
  $vk_spam_video_message = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/local-db/vk-spam-text.txt');
}

$groups = explode(" ", $_POST['groups']);
$return = [];
for ($i = 0; $i < count($groups); $i++) {
  $group = $groups[$i];
  $getInfoGroupResponse = file_get_contents(
    'https://api.vk.com/method/utils.resolveScreenName'.
    '?screen_name='.$group.
    '&access_token='.$vk_main_poster_access_token.
    '&v=5.102'
  );
  $parsedInfo = json_decode($getInfoGroupResponse, true);
  $parsedInfo['response']['object_id'];

  $postResponse = HTTPRequester::HTTPPost('https://api.vk.com/method/wall.post', [
    'owner_id' => (($parsedInfo['response']['type']==='user')?'':'-').$parsedInfo['response']['object_id'],
    'attachments' => $vk_current_video_id,
    'message' => $vk_spam_video_message,
    'access_token' => $vk_main_poster_access_token,
    'v' => '5.102',
  ]);
  $parsedPostResponse = json_decode($postResponse, true);
  sleep(1);

  $likes_add_parsed_responses = [];
  for ($j = 0; $j < count($vk_likers); $j++) {
    $likeAddResponse = HTTPRequester::HTTPPost('https://api.vk.com/method/likes.add', [
      'owner_id' => (($parsedInfo['response']['type']==='user')?'':'-').$parsedInfo['response']['object_id'],
      'type' => 'post',
      'item_id' => $parsedPostResponse['response']['post_id'],
      'access_token' => $vk_likers[$j],
      'v' => '5.102',
    ]);
    $likes_add_parsed_responses[] = json_decode($likeAddResponse, true);
  }

  sleep(1);
  $return['group'.$i] = [
    'groupInfo' => $parsedInfo,
    'wall.post' => [
      'response' => $parsedPostResponse,
    ],
    'likes.add' => $likes_add_parsed_responses,
  ];
}


header('Content-Type: application/json');
$return['$_POST'] = $_POST;
$return['attachments'] = $vk_current_video_id;
$return['message'] = $vk_spam_video_message;
echo json_encode($return);