<?php 


function env($key, $default=""){
    //find file
    if(file_exists(".env")) {
        //read file
        $file = fopen('.env','r');
        //read line by line
        while(!feof($file)){
            $line = fgets($file);
            //if line starts with double // or # skip line
            if(preg_match('/=/', $line) && !preg_match("/#|\/\//", $line)){
                [$lineKey, $lineValue] =  explode('=', $line);
                //if key exist
                if(strtoupper($lineKey) == strtoupper($key)){
                    return $lineValue;
                }
            }
        }
        return $default;
    }else{
        //else return default
        return $default;
    }
}