<?php

namespace App\Services;

use App\Models\Employee;
//use OpenSpout\Reader\Common\Creator\ReaderEntityFactory;
use OpenSpout\Reader\ReaderFactory;
class UserImportService
{
    public function import($filePath)
    {
        $reader = new \OpenSpout\Reader\XLSX\Reader();
        $reader->open($filePath);

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $cells = $row->getCells();
                print_r($cells);
                Employee::updateOrCreate(['email' => $cells[3]],
                [
                    'id'                    => $cells[0]->getValue(),
                    'name'                  => $cells[1]->getValue(),
                    'age'                   => $cells[2]->getValue(),
                    'email'                 => $cells[3]->getValue(),
                    'country'               => $cells[4]->getValue(),
                    'postal_code'           => $cells[5]->getValue(),
                    'department'            => $cells[6]->getValue(),
                    'salary'                => $cells[7]->getValue(),
                    'hire_date'             => $cells[8]->getValue(),
                    'tenure_months'         => $cells[9]->getValue(),
                    'performance_rating'    => $cells[10]->getValue(),
                    'manager_id'            => $cells[11]->getValue(),
                ]);
            }
        }

        $reader->close();
    }
}
