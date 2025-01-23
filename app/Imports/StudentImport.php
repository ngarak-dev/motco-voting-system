<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentImport implements ToModel, WithUpserts, WithHeadingRow, WithBatchInserts, WithChunkReading {
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row) {
        try {
            //Setting execution time to 5 mins
            ini_set('max_execution_time', 300);

            // Extract the first letter
            $firstLetter = strtoupper(substr(trim($row['first_name']), 0, 1));

            $dob = is_numeric($row['date_of_birth'])
                ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d')
                : date('Y-m-d', strtotime($row['date_of_birth']));

            $dobYear = date('Y', strtotime($dob));
            $dobMonth = date('m', strtotime($dob));

            // SD from admission_number
            $admissionNumber = $row['admission_number'];
            preg_match('/\b([A-Z]{2})\b/', $admissionNumber, $matches);
            $admissionPart = $matches[1] ?? '';

            // Changanya password
            $password = $firstLetter . $dobYear . $dobMonth . $admissionPart;

            return new Student([
                'admission_number' => $row['admission_number'],
                'first_name' => Str::upper($row['first_name']),
                'middle_name' => Str::upper($row['middle_name']),
                'last_name' => Str::upper($row['last_name']),
                'sex' => Str::upper($row['sex']),
                'program' => Str::upper($row['program']),
                'option' => Str::upper($row['option']),
                'year' => $row['year'],
                'dob' => $dob,
                'password' => Hash::make($password),
            ]);
        }

        catch (\Throwable $th) {
            Log::error('Error processing row, admission number : ', ['row' => $row['admission_number'], 'error' => $th->getMessage()]);
        }
    }

    public function uniqueBy() {
        return 'admission_number';
    }

    public function batchSize(): int {
        return 400;
    }

    public function chunkSize(): int {
        return 400;
    }
}
