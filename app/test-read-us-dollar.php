<?php
require "base.php";

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

/** load test data */
$filePath = './source/test.xlsx';

$reader = ReaderEntityFactory::createXLSXReader();
$reader->setShouldFormatDates(true); // Without formatDates

$result = [];
$reader->open($filePath);
foreach ($reader->getSheetIterator() as $sheet) {
    $sheetName = $sheet->getName();

    $result[$sheetName] = [];

    foreach ($sheet->getRowIterator() as $index=>$row) { // $row is a "Row" object, not an array

        $cellIterator = $row->getCells();

        $rowData = [];
        foreach ($cellIterator as $cell) {
            $value = $cell->getValue();
            $rowData[] = [$value];
        }

        if (!empty($rowData)) {
            $result[$sheetName][] = $rowData;
        }
    }
}

var_dump($result);