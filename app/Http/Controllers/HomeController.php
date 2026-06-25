<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $visitorCount = Visitor::query()->count();

        return view('admin.index', compact('user', 'settings', 'visitorCount'));
    }



//    public function backup()
//    {
//        // Backup file name
//        $fileName = 'backup_' . date('Y_m_d_H_i_s') . '.sql';
//        $backupFolder = storage_path('app/backups');
//
//        // Create folder if not exists
//        if (!file_exists($backupFolder)) {
//            mkdir($backupFolder, 0777, true);
//        }
//
//        $filePath = $backupFolder . '/' . $fileName;
//
//        // DB credentials from .env
//        $dbHost = env('DB_HOST', '127.0.0.1');
//        $dbName = env('DB_DATABASE');
//        $dbUser = env('DB_USERNAME');
//        $dbPass = env('DB_PASSWORD');
//
//        // Full path to mysqldump.exe (update according to your XAMPP installation)
//        $mysqldumpPath = '"C:\\xampp\\mysql\\bin\\mysqldump.exe"';
//
//        // Build command
//        $command = "{$mysqldumpPath} -h {$dbHost} -u {$dbUser} --password={$dbPass} {$dbName} > \"{$filePath}\"";
//
//        // Execute command
//        exec($command, $output, $returnVar);
//
//        // Check if file was created
//        if ($returnVar !== 0 || !file_exists($filePath)) {
//            return back()->with('error', 'Backup failed: check mysqldump path, credentials, and storage folder.');
//        }
//
//        // Download and delete after sending
//        return response()->download($filePath)->deleteFileAfterSend(true);
//    }


    public function backup()
    {
        $fileName = 'backup_' . date('Y_m_d_H_i_s') . '.sql';
        $backupFolder = storage_path('app/backups');

        // Create folder if it doesn't exist
        if (!file_exists($backupFolder)) {
            mkdir($backupFolder, 0777, true);
        }

        $filePath = $backupFolder . '/' . $fileName;

        // DB credentials from .env
        $dbHost = env('DB_HOST', '127.0.0.1');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');

        // Full path to mysqldump.exe (XAMPP)
        $mysqldumpPath = '"C:\\xampp\\mysql\\bin\\mysqldump.exe"';

        // Command to generate SQL dump
        $command = "{$mysqldumpPath} -h {$dbHost} -u {$dbUser} --password={$dbPass} {$dbName} > \"{$filePath}\"";

        exec($command, $output, $returnVar);

        // Check if file was created
        if ($returnVar !== 0 || !file_exists($filePath)) {
            return back()->with('error', 'Backup failed: check mysqldump path, credentials, and storage folder.');
        }

        // Return file as download
        return response()->download($filePath)->deleteFileAfterSend(true);
    }


}
