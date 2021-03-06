<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;
// use Illuminate\Filesystem\Cache;
use Cache;

class DocsController extends Controller
{
    protected $docs;

    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    // public function show($file = null)
    // {
    //     $index = markdown($this->docs->get());
    //     $content = markdown($this->docs->get($file ?: 'installation.md'));

    //     return view('docs.show', compact('index', 'content'));
    // }

    public function show($file = null)
    {
        $index = Cache::remember('docs.index', 120, function(){
            return markdown($this->docs->get());
        });
        $content = Cache::remember('docs.{$file}', 120, function () use ($file) {
            return markdown($this->docs->get($file ?: 'installation.md'));
        });

        return view('docs.show', compact('index', 'content'));
    }

    public function image($file)
    {
        $image = $this->docs->image($file);

        return response($image->encode('png'), 200, [
            'Content-Type' => 'image/png'
        ]);
    }
}
