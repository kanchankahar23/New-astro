<?php

namespace App\PDF;

use setasign\Fpdi\Tcpdf\Fpdi;

class CustomPdf extends Fpdi
{
    // Page header
    public function Header()
    {
        $this->SetY(5); 
        $imageFile = public_path('images/premiumKundli/newHeader.png'); 
        if (file_exists($imageFile)) {
            $this->Image(
                $imageFile,
                0,
                1
                ,
                230,
                '',
                '',
                '',
                'T',
                false,
                300,
                '',
                false,
                false,
                0,
                false,
                false,
                false
            );
        }
        $headerHtml = '
            <div style="text-align: center; font-weight: bold;">
                <p> </p>
            </div>
        ';
        $this->writeHTMLCell(0, 0, '', '', $headerHtml, 0, 1, false, true, '');
    }

    // Page footer
    public function Footer()
    {
        $this->SetY(-31); 
        $imageFile = public_path('images/premiumKundli/newFooter1.png');
        if (file_exists($imageFile)) {
            $this->Image($imageFile, 0, 260, 217, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
        $footerHtml = '
             <div style="text-align: center;  padding: 5px;">
                <p style="color: black; background-color:white;">www.astro-buddy.com</p>
                <p style="color: black;">Copyright © 2024 AstroBuddy. All Rights Reserved.</p>
            </div>
        ';
        $this->writeHTMLCell(0, 0, '', '', $footerHtml, 0, 1, false, true, '');
    }
}
