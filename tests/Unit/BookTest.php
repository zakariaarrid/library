<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\{Book,Author};
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{

    use RefreshDatabase;
    /**
     * @test
     */
    public function an_author_id_is_recorder()
    {
        //parent::an_author_id_is_recorder();
         Book::create([
             'title' => 'cool title',
             'author_id' => 1,
         ]);

         $this->assertCount(1, Book::all());
    }
}
