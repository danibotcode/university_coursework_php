<?php

// Exercise 7-1

echo "<pre>"; // Enables viewing of the spaces

// Pad to 15 spaces
printf("The result is $%15f\n", 123.42 / 12);

// Pad to 15 spaces, fill with zeros
printf("The result is $%015f\n", 123.42 / 12);

// Pad to 15 spaces, 2 decimal places precision
printf("The result is $%15.2f\n", 123.42 / 12);

// Pad to 15 spaces, 2 decimal places precision, fill with zeros
printf("The result is $%015.2f\n", 123.42 / 12);

// Pad to 15 space, 2 decimal places precision, fill with # symbol
printf("The result is $%'#15.2f\n", 123.42 / 12);


// Exercise 7-2

$h = 'Rasmus';

printf("[%s\n",			 $h); // Standard string output
printf("[%12s]\n", 		 $h); // Right justify with spaces to width 12
printf("[%-12s]\n", 	 $h); // Left justify with spaces
printf("[%012s]\n",		 $h); // Pad with zeros
printf("[%'#12s]\n\n",	 $h); // Use the custom padding character '#'

$d = 'Rasmus Lerdorf';		  // The original creator of PHP

printf("[%12.8s]\n", 	 $d); // Right justify, cust off 8 characters
printf("[%-12.12s]\n",   $d); // Left justify, cutoff 12 characters
printf("[%-'@12.10s]\n", $d); // Left justify, pad with '@', cutoff 10 chars


// Exercise 7-3

$month = 9;       // September (only has 30 days)
$day   = 31;      // 31st
$year  = 2022;    // 2022


if (checkdate($month, $day, $year)) echo "Date is valid";
else echo "Date is invalid";
echo "<br>";

// Exercise 7-4 - Writing a file
	
	$fh = fopen("testfile.txt", 'w') or die("Failed to create file");

	$text = <<<_END
Line 1
Line 2
Line 3
_END;

	fwrite($fh, $text) or die ("Could not write to file");
	fclose($fh);
	echo "File 'testfile.txt' written successfully";
	echo "<br>";



// Exercise 7-5 - Reading a file with fgets

	$fh = fopen("testfile.txt", 'r') or
		die("File does not exist or you lack permission to open it");

	$text = fgets($fh);
	fclose($fh);

	echo $text;
	echo "<br>";


// Exercise 7-6 - Reading a file with fread

 $fh = fopen("testfile.txt", 'r') or
 	die("File does not exist or you lack permission to open it");

 	$text = fread($fh, 3);
 	fclose($fh);

 	echo $text;
	echo "<br>";

// Exercise 7-7 - copying a file

 	copy('testfile.txt', 'testfile2.txt') or die("Could not copy file");
 	echo "File successfully copied to 'testfile2.txt'";
	echo "<br>";


// Exercise 7-8 - alternate syntax for copying a file
 	if (!copy('testfile.txt', 'testfile2.txt')) echo "Could not copy file";
 	else echo "File successfully copied to 'testfile2.txt'";

	echo "<br>";

// Exercise 7-9 - moving a file

 	if (!rename('testfile2.txt', 'testfile2.new'))
 		echo "Could not rename file";
 	else echo "File successfully renamed to 'testfile2.new'";
	echo "<br>";
// Exercise 7-10 - deleting a file


 	if (!unlink('testfile2.new')) echo "Could not delete file";
 	else echo "File 'testfile2.new' successfully deleted";
	echo "<br>";


// Exercise 7-11  Updating a file

	$fh    = fopen("testfile.txt", 'r+') or die("Failed to open file");
	$text  = fgets($fh);
	fseek($fh, 0, SEEK_END);
	fwrite($fh, "$text") or die("Could not write to file");
	fclose($fh);

	echo "File 'testfile.txt' successfully updated";
	echo "<br>";


// Exercise 7-12 Updating a file with file locking

	$fh    = fopen("testfile.txt", 'r+') or die("Failed to open file");
	$text  = fgets($fh);

	if (flock($fh, LOCK_EX))
	{
	fseek($fh, 0, SEEK_END);
	fwrite($fh, "$text") or die("Could not write to file");
	flock($fh, LOCK_UN);
	}

	fclose($fh);
	echo "File 'testfile.txt' successfully updated";
	echo "<br>";

// Exercise 7-13 Using file_get_contents

	echo "<pre>"; // Enables display of line feeds
	echo file_get_contents("testfile.txt");
	echo "</pre>"; // Terminates the <pre> tag


// Exercise 7-14 Grabbing the o'reilly homepage

	// echo file_get_contents("http://oreilly.com");


// Exercise 7-15 Image uploader upload.php

	echo <<<_END
		<html><head><title>PHP Form Upload</title></head><body>
		<form method='post' action='php-07.php' enctype='multipart/form-data'>
		Select File: <input type='file' name='filename' size='10'>
		<input type='submit' value='Upload'>
		</form>
	_END;

		if ($_FILES)
		{
			$name = $_FILES['filename']['name'];
			move_uploaded_file($_FILES['filename']['tmp_name'], $name);
			echo "Uploaded image '$name' <br><img src='$name'>";

		}

		echo "</body></html>";


// Exercise 7-16 - A more secure version of upload.php

		echo <<<_END
			<html><head><title>PHP Upload</title></head><body>
			<form method='post' action='php-07.php' enctype='multipart/form-data'>
			select a JPG, GIF, PNG or TIF File:
			<input type='file'name='filename' size='10'>
			<input type='submit' value='Upload'></form>
		_END;

		if ($_FILES)
		{
			$name = $_FILES['filename']['name'];

			switch($_FILES['filename']['type'])
			{
				case 'image/jpeg':  $ext = 'jpg'; break;
				case 'image/gif':   $ext = 'gif'; break;
				case 'image/png':   $ext = 'png'; break;
				case 'image/tiff':  $ext = 'tif'; break;
				default:			$ext = '';	  break;
			}
			if ($ext)
			{
				$n = "image.$ext";
				move_uploaded_file($_FILES['filename']['tmp_name'], $n);
				echo "Uploaded image '$name' as '$n':<br>";
				echo "<img src='$n'>";
			}
			 else echo "'$name' is not an accepted image file";
		}
		else echo "No image has been uploaded";

		echo "</body></html>";			


// Exercise 7-17 - Executing a system command
		$cmd = "dir"; // Windows
		 $cmd = "ls";  //Linux, Unix & Mac

		exec(escapeshellcmd($cmd), $output, $status);

		if ($status) echo "Exec command failed";
		else
		{
			echo "<pre>";
			foreach($output as $line) echo htmlspecialchars("$line\n");
			echo "</pre>";
		}


?>









