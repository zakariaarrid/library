<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use App\Models\Author;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

     /**
     * @test
     * */
    public function only_name_is_required_to_create_an_author(){
        Author::firstOrCreate([
            'name' => 'John Doe',
        ]);

        $this->assertCount(1, Author::all());
    }

}
