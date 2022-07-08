<?php
require_once('./BookReader.php');

interface BookReader {
    public function read();
    public static function canRead();
}