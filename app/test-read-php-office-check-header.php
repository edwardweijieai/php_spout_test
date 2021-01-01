<?php
require "base.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

$filePath = './source/adn_test.xlsx';
$activeSheetIndex = 0;

$spreadsheet = IOFactory::load($filePath);
$worksheet = $spreadsheet->setActiveSheetIndex($activeSheetIndex);

$result = [];
foreach ($worksheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE);

    $rowData = [];
    $valuesIsEmpty = true;
    foreach ($cellIterator as $cell) {
        $value = $cell->getValue();
        
        if (gettype($value) == 'object') {
            
            $className = get_class($value);

            if ($className == 'PhpOffice\PhpSpreadsheet\RichText\RichText') {
                $richTextElements = $value->getRichTextElements();
                $text = $richTextElements[0]->getText();
                

                $value = $text;
            }
        }

        $rowData[] = $value;

        if (!empty($value) && $valuesIsEmpty) {
            $valuesIsEmpty = false;
        }
    }

    if (!empty($rowData) && !$valuesIsEmpty) {
        $result[] = $rowData;
    }
}

unset($spreadsheet);
unset($worksheet);


var_dump($result);
