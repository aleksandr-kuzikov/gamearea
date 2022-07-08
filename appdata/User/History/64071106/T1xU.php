<?php
namespace application\BookReader\BookReader;

interface BookReader {
    public function read();
    public static function canRead($format);
}