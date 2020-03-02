<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class MakeViewCommand extends Command
{

    protected $signature = 'make:view {view}';
    protected $description = 'Create a new blade template.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $view = $this->argument('view');
        $path = $this->viewPath($view);

        $content = "@extends('layouts.app')
@section('page_name', 'Default')

@section('content')
<div class=\"container\"></div>
@endsection

@section('js') @endsection
@section('css') @endsection
";

        $this->createDir($path);

        if (File::exists($path)) {
            $this->error("File {$path} already exists!");
            return;
        }
        File::put($path, $content);
        $this->info("File {$path} created.");
    }

    public function viewPath($view)
    {
        return $path = "resources/views/" . str_replace('.', '/', $view) . ".blade.php";
    }

    public function createDir($path)
    {
        if (!file_exists(dirname($path))) mkdir(dirname($path), 0777, true);
    }
}
