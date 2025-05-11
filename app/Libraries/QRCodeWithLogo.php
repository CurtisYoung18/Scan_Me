<?php
namespace App\Libraries;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class QRCodeWithLogo extends QRCode {
    protected $logoOptions;

    public function __construct(QROptions $options, $logoOptions) {
        parent::__construct($options);
        $this->logoOptions = $logoOptions;
    }

    public function render(?string $data = null,?string $file = null) {
        $qrCodeFile = parent::render($data, $file);
        $qrCodeData = file_get_contents($qrCodeFile);
        $qrCode = imagecreatefromstring($qrCodeData);
        $logo = imagecreatefrompng($this->logoOptions['src']);
        $logoWidth = $this->logoOptions['width'];
        $logoHeight = $this->logoOptions['height'];
    
        $qrCodeWidth = imagesx($qrCode);
        $qrCodeHeight = imagesy($qrCode);
    
        $logoX = ($qrCodeWidth - $logoWidth) / 2;
        $logoY = ($qrCodeHeight - $logoHeight) / 2;
    
        imagecopy($qrCode, $logo, $logoX, $logoY, 0, 0, $logoWidth, $logoHeight);
    
        ob_start();
        imagepng($qrCode);
        $qrCodeData = ob_get_contents();
        ob_end_clean();
    
        imagedestroy($qrCode);
        imagedestroy($logo);
    
        return 'data:image/png;base64,'. base64_encode($qrCodeData);
    }
}