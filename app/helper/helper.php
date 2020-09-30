<?php

/**
 * @param $audience
 * ex: 'included_segments' => array('All'),
 * ex: 'include_player_ids' => array("6392d91a-b206-4b7b-a620-cd68e32c3a76",)
 * @param array $contents
 * 'en' => 'notification title'
 * @param $data
 * optional data as array
 * @return mixed
 */


   function pushNotification($notification)
    {
        // dd($notification['device_token']);
        
          $token = $notification['device_token'];
          
          
        //   $token = $notification['device_token'];
    define( 'API_ACCESS_KEY', 'AAAAWEzU-As:APA91bF8BjHYTiz7yu2Ffvj1VFi-brJtMjBMWX8f0clWWxJwp3YHsrediuqOmGFTzR9_zz4kgcacaQhZTFJRw5QOBJGMgMKeJObRA_i4lqqhTIGTuf-MxZOBTQug-aPKlWGx7uSEN8gZ');
    $msg = array
    (
        'body' 	=> 'alaaaaaashawaa',
        'title'	=>'applaham',
        'type'	=>'2',
        'order_id'	=>'1',
    );
    $fields = array
    (
        'to'=>$token  ,
        'notification'=> $msg
    );



$notification['content_available'] = true;
$header = ['Authorization: Key=' . API_ACCESS_KEY, 'Content-Type: Application/json'];
$tokens[] = $token;

$payload = ['registration_ids' => $tokens,
            'notification' => $notification,
//            data message
            'data' => $notification];
            
            
// $payload = ['registration_ids' => $tokens, 'data' => $msg];
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => $header
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
return response()->json([
    'firebase_response' => json_decode($response)
],200);






      
//     define( 'API_ACCESS_KEY', 'AAAA-wIV5oo:APA91bFbUfvjJQQ4sEZDfpRZthvDc9vEiSfzOFYjfMy4OGqJZ1WQL96mwtYY_iamEOdeHRqqdJcQWfoZvIPWXlXUDG8XYD0gkmsBxjMkAu7u7GrziWe4y57N4PP6XaoFvqkCHLymR22A');
//     $msg = array
//     (
//         'body' 	=> $notification['body'],
//         'title'	=>$notification['title'],
//     );
//     $fields = array
//     (
//         'to'=>$notification['device_token'] ,
//         'notification'=> $msg
//     );


//     $headers = array
//     (
//         'Authorization: key=' . API_ACCESS_KEY,
//         'Content-Type: application/json'
//     );
//     $ch = curl_init();
//     curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send
// ' );
//     curl_setopt( $ch,CURLOPT_POST, true );
//     curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
//     curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
//     curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
//     curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

//     $result = curl_exec($ch);
//      echo  $result;

//     curl_close($ch);



}

?>
