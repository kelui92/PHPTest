<?php
    $file = "./invoices/$file_name";
    $filename = $file_name;
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($file);
?>