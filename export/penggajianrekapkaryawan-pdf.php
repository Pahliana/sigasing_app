<?php

require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\html2pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    include 'res/penggajianrekapkaryawan-res.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'en');
    $html2pdf->pdf->setDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example07.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>