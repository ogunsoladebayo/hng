<?php


    // scan scripts directory for files
    $filesArray = array_filter(scandir('scripts'), function($item) {
        return $item[0] !== '.';
    });    

    $testCheck = array();
    // runs all scripts
    function runScript($fileExtension, $file){
        $output = exec($fileExtension. ' '. $file);
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
    foreach ($filesArray as $file) {
        chdir('scripts');
        $fileSplit = explode('.', $file);
        $hngId = $fileSplit[0];
        $fileExtension = $fileSplit[1];

        if($fileExtension == 'py'){
            $ext = 'python';
        }elseif($fileExtension == 'js'){
            $ext = 'node';
        }elseif($fileExtension == 'php'){
            $ext = 'php';
        }else{
            // file extension not compatible...
            $check = 'not compatible';
        }
        // call both functions
        $output = runScript($ext, $file);
        $check = checkMatch($output);

        $testCheck[$hngId] = $check;
    }
    print_r(json_encode($testCheck));