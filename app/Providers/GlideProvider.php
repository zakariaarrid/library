<?php


namespace App\Providers;


use App\service\ImagePathGenerator;
use http\Client\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureFactory;

class GlideProvider extends ServiceProvider
{
    public function register() {
        $this->app->singleton(ImagePathGenerator::class, function(){
             new ImagePathGenerator(env('GLIDE_KEY'));
        });
        $this->app->singleton(Signature::class, function(){
            new signature(env('GLIDE_KEY'));
        });

        $this->app->singleton(Server::class, function(Application $app){
          $filesystem = $app->get(Filesystem::class);
           return ServerFactory::create([
                'response' => new LaravelResponseFactory($app->get(Request::class)),
                'source' => $filesystem->getDriver(),
                'cache' => $filesystem->getDriver(),
                'cache_path_prefix' => '.cache',
                'base_url' => 'image'
            ]);

        });
    }
}
