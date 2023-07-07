<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Debug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'output';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $files = Storage::disk('dummy')->allFiles();

        // $files = array_filter($files, function ($file) {
        //     return strpos($file, "bucket") !== false;
        // });

        foreach ($files as $file) {
            $temp = Storage::disk('dummy')->get($file);
            $image = Image::make($temp);

            $path = storage_path('compressed');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileName = explode(".", $file)[0];

            $img = $image->save($path . "/" . $fileName . ".jpg", 50);

            $this->info("Compressed " . storage_path('compressed'));
        }
    }
}
