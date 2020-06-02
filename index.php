<?php


    // scan scripts directory for files
    $filesArray = scandir('scripts/');

    $testCheck = Array(

    );

    foreach ($filesArray as $file) {
        $fileSplit = explode('.', $file);
        $fileExtension = $fileSplit[1];
        if ($fileExtension == 'py'){
            // call function
        }elseif($fileExtension == 'js'){
            // call function
        }elseif($fileExtension == 'cs'){
            // call function
        }else{
            // file extension not compatible...
        }
    }