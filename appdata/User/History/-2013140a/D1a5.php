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
            $ddoc->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            // Return data without XML formatting tags

            $contents = explode('\n',strip_tags($ddoc->saveXML()));
            $text = '';
            foreach($contents as $i=>$content) {
                $text .= '<p>' . $contents[$i] . '</p>';
            }
            return $text;
        }
        $zip->close();
    }
    // In case of failure return empty string
    return "";
}

function xml2assoc($xml, $name)
{
    print "<ul>";

    $tree = null;
    print("I'm inside " . $name . "<br>");
   
    while($xml->read())
    {
        if($xml->nodeType == XMLReader::END_ELEMENT)
        {
            print "</ul>";
            return $tree;
        }
       
        else if($xml->nodeType == XMLReader::ELEMENT)
        {
            $node = array();
           
            print("Adding " . $xml->name ."<br>");
            $node['tag'] = $xml->name;

            if($xml->hasAttributes)
            {
                $attributes = array();
                while($xml->moveToNextAttribute())
                {
                    // print("Adding attr " . $xml->name ." = " . $xml->value . "<br>");
					if ($xml->name == 'title')
						print("Title " . $xml->name ." = " . $xml->value . "<br>");

					
					if ($xml->name == 'subtitle')
						print("Subtitle " . $xml->name ." = " . $xml->value . "<br>");

                    $attributes[$xml->name] = $xml->value;
                }
                $node['attr'] = $attributes;
            }
           
            if(!$xml->isEmptyElement)
            {
                $childs = xml2assoc($xml, $node['tag']);
                $node['childs'] = $childs;
            }
           
            print($node['tag'] . " added <br>");
            $tree[] = $node;
        }
       
        else if($xml->nodeType == XMLReader::TEXT)
        {
            $node = array();
            $node['text'] = $xml->value;
            $tree[] = $node;
            print "text added = " . $node['text'] . "<br>";
        }
    }
   
    print "returning " . count($tree) . " childs<br>";
    print "</ul>";
   
    return $tree;
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

		// $zip = new ZipArchive;
		// if ($zip->open('./files/file3.docx') === TRUE) {
		// 	$zip->extractTo('./files/docx');
		// 	$zip->close();
		// 	echo '????????????';
		// } else {
		// 	echo '????????????';
		// }

		// echo readDocx('./files/file3.docx');

		// $xml = simplexml_load_file(???????? ?? ?????????? ?????? ??????);


		// Create new ZIP archive
		$zip = new ZipArchive;
		$dataFile = 'word/document.xml';
		$filePath = './files/file3.docx';
		$data = NULL;
		// Open received archive file
		if (true === $zip->open($filePath)) {
			// If done, search for the data file in the archive
			if (($index = $zip->locateName($dataFile)) !== false) {
				// If found, read it to the string
				$data = $zip->getFromIndex($index);
			}
			$zip->close();
		}

		file_put_contents('./files/tmp.xml', $data);
		$xml = new XMLReader();
		$xml->open('./files/tmp.xml');

		$assoc = xml2assoc($xml, "root");


		$xml->close();
		echo "<pre>";
		print_r($assoc);
		echo "</pre>";

	}
}
