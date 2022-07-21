<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $posts = Post::all();
    // $posts = [];

    // $posts = collect(File::files(resource_path("posts")))
    //     ->map(fn ($file) => YamlFrontMatter::parseFile($file))
    //     ->map(
    //         fn ($document) => new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         )
    //     );

    // $posts = array_map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);

    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }
    return view('posts', [
        'posts' =>
        Post::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});