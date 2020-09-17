<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Server;
use League\Glide\ServerFactory;
use League\Glide\Signatures\Signature;
use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;


class imageController extends Controller
{
    public function show(Filesystem $filesystem, Server $server,Signature $signature ,Request $request,string $path): StreamedResponse {

        $signature->validateRequest($request->path(), $request->all());

        return $server->getImageResponse($path, $request->all());

    }
}
