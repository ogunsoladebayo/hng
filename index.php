<?php


    // scan scripts directory for files
    $filesArray = scandir('scripts/');    

    $testCheck = array();

    function runScript($fileExtension, $file){
        chdir('scripts');
        $output = exec($fileExtension. ' '. $file);
        return $output;
    }

    function checkMatch($output){
        
    }



    foreach ($filesArray as $file) {
        $fileSplit = explode('.', $file);
        $fileExtension = $fileSplit[1];
        if ($fileExtension == 'py'){
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
        }
        echo $output
    };