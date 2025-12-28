<?php
include("RtcTokenBuilder.php");

$appId = getenv('AGORA_APP_ID') ?: '';
$appCertificate = getenv('AGORA_APP_CERTIFICATE') ?: '';

if (empty($appId) || empty($appCertificate)) {
    header('Content-Type: application/json; charset=utf-8', true, 500);
    echo json_encode(['error' => 'App ID or App Certificate not set in environment variables (AGORA_APP_ID / AGORA_APP_CERTIFICATE)']);
    exit;
}

$channelName = $_GET['channelName'];
$uid = $_GET['uid'];
$uidStr = "2882341273";
$tokenExpirationInSeconds = 3600;
$privilegeExpirationInSeconds = 3600;

if($uid && $channelName) {
    
    $token = RtcTokenBuilder::buildTokenWithUid(
        $appId, 
        $appCertificate, 
        $channelName,
        $uid, 
        RtcTokenBuilder::ROLE_PUBLISHER, 
        $tokenExpirationInSeconds, 
        $privilegeExpirationInSeconds
    );

    $arr = array('token' => $token);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($arr);
    
} else {
    $arr = array('error:'=> 'No uid, channelName provided');
    echo json_encode($arr);
}

// $token = RtcTokenBuilder::buildTokenWithUserAccount($appId, $appCertificate, $channelName, $uidStr, RtcTokenBuilder::ROLE_PUBLISHER, $tokenExpirationInSeconds, $privilegeExpirationInSeconds);
// echo 'Token with user account: ' . $token . PHP_EOL;

// $token = RtcTokenBuilder::buildTokenWithUidAndPrivilege($appId, $appCertificate, $channelName, $uid, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds);
// echo 'Token with int uid and privilege: ' . $token . PHP_EOL;

// $token = RtcTokenBuilder::buildTokenWithUserAccountAndPrivilege($appId, $appCertificate, $channelName, $uidStr, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds);
// echo 'Token with user account and privilege: ' . $token . PHP_EOL;