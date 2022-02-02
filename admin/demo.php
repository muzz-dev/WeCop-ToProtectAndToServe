<?php
	function sendnotification($title,$message,$id,$pagename,$pageid)
	{
        if (!defined('API_ACCESS_KEY'))
        define('API_ACCESS_KEY', 'AAAAyaN8ah0:APA91bEhX_R_WQWFwSy8LaBlu2uz02LOknqIAYVimY0HFg0C4Yef4FRmPIfcdWwsWz_OoTp6pCsYd9P1zVA0JzUVofVZFXqdZHRgFf0knf7D6iUWsFfnJMNT_h_MbdGdpAKAHM2aJVIo');
    // define( 'API_ACCESS_KEY', 'AAAAyaN8ah0:APA91bEhX_R_WQWFwSy8LaBlu2uz02LOknqIAYVimY0HFg0C4Yef4FRmPIfcdWwsWz_OoTp6pCsYd9P1zVA0JzUVofVZFXqdZHRgFf0knf7D6iUWsFfnJMNT_h_MbdGdpAKAHM2aJVIo' );
    $registrationIds = $id;
#prep the bundle
     $msg = array
          (
        'body'  => $message,
        'title' => $title,
        'channelId' => "default",
        'icon'  => 'myicon',/*Default Icon*/
        'sound' => 'mySound'/*Default sound*/
          );
    $fields = array
            (
                'to'        => $registrationIds,
                'notification'  => $msg,
                'data'=> array(
                    'page' => $pagename,
                    'pageid' => $pageid
                )
            );


    $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
#Send Reponse To FireBase Server    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        }
?>