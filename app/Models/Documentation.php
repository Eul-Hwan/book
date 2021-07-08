<?php

namespace App\Models;

use Illuminate\Support\Str;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use File;

class Documentation extends Model
{
    use HasFactory;

    public function get($file = 'documentation.md')
    {
        $content = File::get($this->path($file));

        return $this->replaceLinks($content);
    }

    protected function path($file)
    {
        $file = Str::endsWith($file, '.md') ? $file : $file . '.md';
        $path = base_path('docs' . DIRECTORY_SEPARATOR . $file);

        if (! File::exists($path)){
            abort(404, '요청하신 파일이 없습니다.');
        }

        return $path;
    }

    protected function replaceLinks($content)
    {
        return str_replace('/docs/{{version}}', '/docs', $content);
    }
}
