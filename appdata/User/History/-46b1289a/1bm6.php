<?php
use  application\BookReader;

class DocxBookReader implements BookReader {

    public static function canRead($format) {
        if ($format == 'docx')
            return true;

        return false;
    }

    public function __construct() {
        
    }

    public function read() {
        return "hello";
    }

    private function unzip() {

    }

    private function parseStyles() {

    }

    private function parseDocument() {

    }
}