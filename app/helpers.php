<?php
 function image(string $path, int $width, int $height) :string {
   return  app(\App\service\ImagePathGenerator::class)->generate($path, $width, $height);
}



