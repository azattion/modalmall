<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Zenwalker\CommerceML\CommerceML;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use ZipArchive;

class ImportController extends Controller
{

    public function parse()
    {
        $files = Storage::files('/public/import/');
        $za = new ZipArchive();
//        dd($za);
        $za->open('test_with_comment.zip');
//        print_r($za);
//        var_dump($za);
        echo "numFiles: " . $za->numFiles . "\n";
        echo "status: " . $za->status  . "\n";
        echo "statusSys: " . $za->statusSys . "\n";
        echo "filename: " . $za->filename . "\n";
        echo "comment: " . $za->comment . "\n";

        for ($i=0; $i<$za->numFiles;$i++) {
            echo "index: $i\n";
            print_r($za->statIndex($i));
        }
        echo "numFile:" . $za->numFiles . "\n";
        return 1;
        if (count($files)) {
            foreach ($files as $file) {
                $file_path = str_replace('public', 'storage', $file);
                $cml = new CommerceML();
                $cml->loadImportXml($file_path);
                var_dump($cml);
//                $xml = simplexml_load_file($file_path);
//                if (isset($xml->Каталог->Товары)) {
////                    dump($xml->Каталог->Товары);
//                    foreach ($xml->Каталог->Товары[0] as $item) {
//                        echo '[', (string) $item->Ид[0], '] ', (string) $item->Наименование[0], "\n";
//                    }
//                }

//                foreach ($cml->catalog as $catalog) {
//                    dump($catalog);
//                }

            }
//            return $cml;
        }
    }


    public function exchange(Request $request)
    {
        $cookieName = config('session.cookie');
        $cookieID = Session::getId();
        $csrf = csrf_token();
        $date = date('Y-m-d H:m:s');

//        Log::info('Log message', array('context' => $request->all()));

        if ($request->get('type') == 'catalog') {
            switch ($request->mode) {
                case 'checkauth':
                    $user = $_SERVER['PHP_AUTH_USER'];
                    $pass = $_SERVER['PHP_AUTH_PW'];
                    if ($user == 'emaleigh' && $pass == '7US7x8CJCU{C6>W')
                        return response("success\n$cookieName\n$cookieID\n$csrf\n$date")
                            ->header("Content-Type", "text/plane; charset=UTF-8");
                    break;

                case 'init':
                    return response("zip=yes\nfile_limit=100000000000\nsessid=$cookieID\nversion=3.1")
                        ->header("Content-Type", "text/plane; charset=UTF-8");

                case 'file':
                    file_get_contents('php://input');
                    $response = "failure";
//                    if ($request->hasFile('filename')) {
                        $filename = $request->get('filename');
                        $name = $request->{$filename}->getClientOriginalName();
                        $path = $request->{$filename}->storeAs('/public/import', $name);
                        Log::info('Log message', array('context' => $path));
                        $response = "success";
//                    }
                    return response($response)
                        ->header("Content-Type", "text/plane; charset=UTF-8");
            }
        }
    }
}
