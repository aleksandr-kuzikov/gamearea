<?php
namespace application\BookReader;

interface BookReader {
    public function read();
    public static function canRead();
}