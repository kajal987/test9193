<?php
   $imagesString = $_POST['files'][0];
   $imagesArray = preg_split('/(?=data:image\/[a-z]+\;base64,)/', $imagesString, -1, PREG_SPLIT_NO_EMPTY);
   $imageCount = count($imagesArray);
    $time = time();
    for($i=0; $i<$imageCount;$i++){
        $base64img = $imagesArray[$i];
        $base64img = str_replace('data:image/jpeg;base64,', '',$base64img);
        $base64img = str_replace('data:image/png;base64,', '',$base64img);
        $base64img = str_replace('data:image/jpg;base64,', '',$base64img);
        $base64img = str_replace(' ', '+', $base64img);
        $base64img = base64_decode($base64img);
        $fName =  $time++. '.png';
        $file = "upload/". $fName;
        $upload =file_put_contents($file, $base64img);
    }
?>