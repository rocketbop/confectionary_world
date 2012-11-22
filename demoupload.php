<?php
$basePath =  realpath(dirname(__FILE__));
$targetPath =$basePath . "\\uploads\\";
//echo $targetPath;
if (!empty($_POST)) {
// Where the file is going to be placed



/* Add the original filename to our target path.
 Result is "uploads/filename.extension" */
$targetPath = $targetPath .
 basename( $_FILES['uploadedfile']['name']);

echo "<p>" . $targetPath;
print_r($_FILES);

echo $_FILES['uploadedfile']['tmp_name']; 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $targetPath)) {
	echo "The file ".  basename( $_FILES['uploadedfile']['name']).
	" has been uploaded";
} else{
	echo "<p>There was an error uploading the file, please try again!";
}

}



?>
<form enctype="multipart/form-data" 
action="demoupload.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
Choose a file to upload: <input name="uploadedfile" 
type="file" /><br />
<input type="submit" value="Upload File" />
</form>