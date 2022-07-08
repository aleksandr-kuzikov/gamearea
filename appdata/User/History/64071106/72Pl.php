<?php
namespace BookReader

interface BookReader {
    public function read();
    public static function canRead();
}