<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Blade::directive('qrcode', function ($expression) {
            return "<?php
                \$qrCode = Endroid\QrCode\QrCode::create($expression);
                \$qrCode->setSize(180);
                \$qrCode->setMargin(10);
                \$writer = new Endroid\QrCode\Writer\PngWriter();
                echo '<img src=\"data:image/png;base64,' . base64_encode(\$writer->write(\$qrCode)->getString()) . '\" alt=\"QR Code\">';
            ?>";
        });
    }
}