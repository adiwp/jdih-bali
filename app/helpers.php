<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (!function_exists('generate_qrcode')) {
    function generate_qrcode($text, $size = 180, $margin = 10) {
        $qrCode = QrCode::create($text);
        $qrCode->setSize($size);
        $qrCode->setMargin($margin);
        
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        
        return '<img src="data:image/png;base64,' . base64_encode($result->getString()) . '" alt="QR Code">';
    }
}