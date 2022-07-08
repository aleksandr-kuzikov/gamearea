<?php
namespace BookReader\BookReader;

interface BookReader {
    public function read();
    public static function canRead($format);
}