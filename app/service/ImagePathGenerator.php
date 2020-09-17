<?php


namespace App\service;


use League\Glide\Urls\UrlBuilderFactory;
use League\Glide\Urls\urlBuilder;
class ImagePathGenerator
{
   // private League\Glide\Urls\urlBuilder $urlBuilder;
    private $urlBuilder;

    public function __construct(string $signature){
        $this->urlBuilder = UrlBuilderFactory::create('/image/'.$signature);
    }

    public function generate(string $path, int $width, int $height): string {
             // $urlBuilder = UrlBuilderFactory::create('/image/');
              return $this->urlBuilder->getUrl($path, ['w' => $width ,'h' => $height, 'fit' => 'crop']);
    }
}
