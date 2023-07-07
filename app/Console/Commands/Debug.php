<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

        foreach ($files as $file) {
            $temp = Storage::disk('dummy')->get($file);
            $this->info(Storage::disk('dummy')->size($file));
        }
    }
}
