<?php

namespace Blog\Upload;


function upload_file($inputfile,$id) {

   
	if (empty($_FILES[$inputfile])) {	//handle error
		trigger_error("File Missing!");
	}

	else if ($_FILES[$inputfile]['error'] > 0) { //handle error
		trigger_error("Handle the error! " . $_FILES[$inputfile]['error']);
	}


	else if (!in_array($_FILES[$inputfile]['type'], ['image/jpeg', 'image/jpg'])) {
		trigger_error("Handle File Type Not Allowed: " . $_FILES[$inputfile]['type']);
	}


	$tmpFile = $_FILES[$inputfile]['tmp_name'];

	//DOMAIN SPECIFIC:  eg., move the file
	//$dstFile = 'uploads/articles' . $_FILES[$inputfile]['name'];
           $dstFile = 'uploads/articles/'. $id;
                   
                   
	if (!move_uploaded_file($tmpFile, $dstFile)) {
		trigger_error("Handle Error");
	}

	//Clean up the temp file
	if (file_exists($tmpFile)) {
		unlink($tmp);
	}
}
