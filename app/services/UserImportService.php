<?php

namespace App\Services;

use App\Models\User;
use OpenSpout\Reader\Common\Creator\ReaderEntityFactory;

class UserImportService
{
    public function import($filePath)
    {
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($filePath);

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $cells = $row->getCells();

                User::create([
                    'name'     => $cells[0]->getValue(),
                    'email'    => $cells[1]->getValue(),
                    'password' => \Hash::make($cells[2]->getValue()),
                ]);
            }
        }

        $reader->close();
    }
}
