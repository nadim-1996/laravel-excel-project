<?php

namespace App\Http\Controllers;

use App\Models\ExcelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelReader;


class ExcelController extends Controller
{
    public function upload()
    {
        return view('excel.upload');
    }
    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx,csv|max:2048',
        ]);
        $file = $request->file('excel_file');
        $path = $file->store("excels");
        $real_path = storage_path('app/' . $path);

        $rows = SimpleExcelReader::create($real_path)->getRows();

        // dump($rows);
        // unlink($real_path);
        // $res = Storage::delete($real_path);
        // dd($path,$real_path,$res);  

        DB::beginTransaction();
        try {
            foreach ($rows as $row) {

                ExcelModel::create([
                    'id' => $row['id'],
                    'scheme_code' => $row['scheme_code'],
                    'scheme_name' => $row['scheme_name'],
                    'central_state_scheme' => $row['central_state_scheme'],
                    'fin_year' => $row['fin_year'],
                    'state_disbursement' => $row['state_disbursement'],
                    'central_disbursement' => $row['central_disbursement'],
                    'total_disbursement' => $row['total_disbursement'],
                ]);
            }
        } catch (\Throwable $th) {
            Log::error("Failed to upload excel.", $th);
            return Redirect::route('dashboard')->with('fail', 'Failed to import excel data');
            DB::rollBack();
        } finally {
            $result = $this->deletefiles();
        }
        DB::commit();
        return Redirect::route('dashboard')->with('success', 'Excel data imported successfully.');
    }

    public function deletefiles()
    {
        $folderPath = storage_path('app/excels');

        $folderPath = rtrim($folderPath, '/') . '/';

        if (!File::isDirectory($folderPath)) {
            return "Folder does not exist: $folderPath";
        }

        $files = File::files($folderPath);

        foreach ($files as $file) {
            File::delete($file);
        }

        return "All files inside have been deleted.";
    }
}
