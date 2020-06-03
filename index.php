<?php


    // scan scripts directory for files
    $filesArray = scandir('scripts/');    

    // $testCheck = array();

    function runScript($fileExtension, $file){
        chdir('scripts');
        $output = exec($fileExtension. ' '. $file);
        return $output;
    }
    function checkMatch($output){
        $searchTerm1 = "Hello World, this is";
        $searchTerm2 = "for stage 2 task";    
        if(strpos($output, $searchTerm1) !== false && strpos($output, $searchTerm2) !== false){
            $check = 'Pass';
        }else{
            $check = 'Fail';
        }
        return $check;
    }


    foreach ($filesArray as $file) {
        $fileSplit = explode('.', $file);
        $fileExtension = $fileSplit[1];
        if($fileExtension == 'py'){
            // call function
            $output = runScript('python', $file);
        }elseif($fileExtension == 'js'){
            // call function
            $output = runScript('node', $file);
        }elseif($fileExtension == 'php'){
            // call function
            $output = runScript('php', $file);
        }else{
            // file extension not compatible...
            $check = 'not compatible';
        }
        $check = checkMatch($output);
        $result .= ($check. '<br>');
    }
    echo $result;