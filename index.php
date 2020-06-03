<?php


    // scan scripts directory for files
    $filesArray = array_filter(scandir('scripts'), function($item) {
        return $item[0] !== '.';
    });    

    $resultArray = array();
    // runs all scripts
    function runScript($fileType, $fileName){
        $output = exec($fileType. ' '. $fileName);
        return $output;
    }

    // checking for specific strings...
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

    // main program
    foreach ($filesArray as $fileName) {
        @chdir('scripts');
        $fileSplit = explode('.', $fileName);
        $hngId = $fileSplit[0];
        $fileType = $fileSplit[1];

        if($fileType == 'py'){
            $ext = 'python';
        }elseif($fileType == 'js'){
            $ext = 'node';
        }elseif($fileType == 'php'){
            $ext = 'php';
        }else{
            // fileName Type not compatible...
            $check = 'not compatible';
        }
        // call both functions
        $output = runScript($ext, $fileName);
        $check = checkMatch($output);

        $resultArray[$hngId] = $check;
    }
    print_r(json_encode($resultArray));