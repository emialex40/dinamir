<?php
$filename = 'saver.txt';
$fileip = 'ipclient.txt';
$ip_array = [];

if(isset($_POST['text'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $flag = false;
    $data = file_get_contents($fileip);
    $ip_array = json_decode($data);



    for($i = 0; $i < count($ip_array); $i++){
        if($ip_array[$i] === $ip) {
          $flag = true;
            break;
        }
    }

    if($flag === false){
        $ip_array[] = $ip;
        $ip_array = array_unique ( $ip_array );
        $data = json_encode($ip_array);
        file_put_contents($fileip, $data);

        $text = $_POST['text'];
        $text++;
        file_put_contents($filename, $text);
        $number = file_get_contents($filename);
        echo $number;
    }else{
        $number = file_get_contents($filename);
        echo $number;
    }
        } else {
    $number = file_get_contents($filename);
}
?>