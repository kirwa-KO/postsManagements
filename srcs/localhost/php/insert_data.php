<!DOCTYPE html>
<html>
	<body>
		<h3 style="text-align: center;">If You want to upload your data from excel File...!</h3>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" style="text-align: center;">
			<input type="file" name="file">
			<br/>
			<br/>
			<input type="submit" value="Upload File">
		</form>

    </body>
</html>


<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if ($_FILES["file"]["error"] > 0)
			echo "File Upload Failed..!";
		else
		{

			$file_name = $_FILES["file"]["name"];
			$file_ext = explode('.', $file_name);
			$ext = strtolower(end($file_ext));
			$allowded_ext = array("xls", "xlsx");

			if (in_array($ext, $allowded_ext) == FALSE)
			{
				echo "Sorry your upload file is not Valid..!";
				exit;
			}
			session_start();
			switch($ext)
			{
				case "xlsx";
					$_SESSION['extention'] = "Xlsx";
					break ;
				case "xls":
					$_SESSION['extention'] = "Xls";
					break ;
			}

			$_SESSION['file_name'] = $_FILES["file"]["name"];
			if (move_uploaded_file($_FILES["file"]["tmp_name"], '/var/www/html/upload/' . $_FILES["file"]["name"]) == FALSE)
				echo "File Upload Failed..!";
			else
			{
				echo '<h6 style="text-align:center;">File Upload Succes..!</h6>';
				header('Refresh: 2; URL=/vendor/phpoffice/phpspreadsheet/samples/Reader/dataprocess.php');
			}
		}
	}
