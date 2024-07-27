<?php

use App\Models\Data;
use PhpOffice\PhpSpreadsheet\IOFactory;
use function Livewire\Volt\{state, mount};


$fetchDataFromCsv = function () {

    $inputFileName = public_path('images/data.csv');

    // Load CSV file
    $spreadsheet = IOFactory::load($inputFileName);

    // Get the active sheet (first sheet in the CSV)
    $sheet = $spreadsheet->getActiveSheet();

    // Specify the cell you want to read
    $cellCoordinate = 'A1'; // For example, cell A1

    // Get the value of the specified cell
    $cellValue = $sheet->getCell($cellCoordinate)->getValue();

    $data = $cellValue;

    $highestColumn = $sheet->getHighestColumn();
    $highestRow = $sheet->getHighestRow();

    $data = [];
    for ($i = 2; $i <= $highestRow; $i++) {
        $array = [];
        for ($a = 'A'; $a <= $highestColumn; $a++) {
            $array[$sheet->getCell($a . '1')->getValue()] = $sheet->getCell($a . $i)->getValue();
        }
        $data[] = $array;
    }

    Data::insert($data);
};
?>

<div class="grid grid-cols-1 gap-6">
    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6">
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
    </div>
    <div class="lg:flex lg:justify-between max-lg:grid max-lg:grid-cols-1 gap-6">
        <div class="bg-white lg:w-3/5 h-96 rounded-2xl shadow-md"></div>
        <div class="bg-white lg:w-2/5 h-96 rounded-2xl shadow-md"></div>
    </div>
    <div class="lg:flex lg:justify-between max-lg:grid max-lg:grid-cols-1 gap-6">
        <div class="bg-white lg:w-3/5 h-72 rounded-2xl shadow-md"></div>
        <div class="bg-white lg:w-2/5 h-72 rounded-2xl shadow-md"></div>
    </div>
</div>