<?php
    $tgl_sekarang = date("d_m_Y");
    require_once("phpToPDF.php");
    ob_start();
    include("laporan.php");
    $my_html = ob_get_clean();

    $cetak_laporan = array(
        "source_type" => 'html',
        "source" => $my_html,
        "action" => 'download',
        "save_directory" => '',
        "page_size" => 'A4',
        "file_name" => 'laporan '.$tgl_sekarang.'.pdf'
    );
    phptopdf($cetak_laporan);
    
?>