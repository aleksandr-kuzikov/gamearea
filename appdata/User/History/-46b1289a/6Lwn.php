<?php

class DocxBookReader implements BookReader {

    public static function canRead($format) {
        if ($format == 'docx')
            return true;

        return false;
    }

    public function __construct() {
        
    }

    public function read($file) {

    }

    private function unzip($file) {

    }

    private function parseStyles() {

    }

    private function parseDocument() {

    }
}