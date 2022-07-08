<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		if (file_exists(__DIR__ . '../../files/Kiland_Vi_Konkurenty_r3_P59Re.docx'))
			echo 'exsist';

		$zip = new ZipArchive;
		if ($zip->open('../../files/Kiland_Vi_Konkurenty_r3_P59Re.docx') === TRUE) {
			$zip->extractTo('../../files/docx');
			$zip->close();
			echo 'готово';
		} else {
			echo 'ошибка';
		}

		// $xml = simplexml_load_file(путь к файлу или урл);
	}
}
