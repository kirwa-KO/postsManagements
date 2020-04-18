<?php

	session_start();
	use PhpOffice\PhpSpreadsheet\IOFactory;

	if (empty($_SESSION['file_name']))
	{
		echo "you must redirected from upload Page..!";
		header('REFRESH: 2; URL=/index.php?error=no_redirect_derectly');
	}
	else
	{

		require __DIR__ . '/../Header.php';

		$inputFileType = $_SESSION['extention'];

		$inputFileName = '/var/www/html/upload/' . $_SESSION['file_name'];

		// $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
		$reader = IOFactory::createReader($inputFileType);
		// $helper->log('Turning Formatting off for Load');
		$reader->setReadDataOnly(true);
		$spreadsheet = $reader->load($inputFileName);

		$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

		// var_dump($sheetData);

		for ($row = 1;$row < count($sheetData);$row++)
		{
			echo "<pre>";
			print_r($sheetData[$row]);
			echo "</pre>";
		}
		unlink($inputFileName);
	}
	session_unset();
	session_destroy();
