<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function readDocx($filePath) {
    // Create new ZIP archive
    $zip = new ZipArchive;
    $dataFile = 'word/document.xml';
    // Open received archive file
    if (true === $zip->open($filePath)) {
        // If done, search for the data file in the archive
        if (($index = $zip->locateName($dataFile)) !== false) {
            // If found, read it to the string
            $data = $zip->getFromIndex($index);
            // Close archive file
            $zip->close();
            // Load XML from a string
            // Skip errors and warnings
			$ddoc = new DOMDocument();
            $xml = $ddoc->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            // Return data without XML formatting tags

            $contents = explode('\n',strip_tags($ddoc->saveXML()));
            $text = '';
            foreach($contents as $i=>$content) {
                $text .= $contents[$i];
            }
            return $text;
        }
        $zip->close();
    }
    // In case of failure return empty string
    return "";
}

class Upload extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

		$zip = new ZipArchive;
		if ($zip->open('./files/file-docx.docx') === TRUE) {
			$zip->extractTo('./files/docx');
			$zip->close();
			echo 'готово';
		} else {
			echo 'ошибка';
		}

		readDocx('./files/file-docx.docx');

		// $xml = simplexml_load_file(путь к файлу или урл);
	}
}
