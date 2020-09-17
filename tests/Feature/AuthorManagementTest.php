<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Book,Author};

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/author', [
            'name' => 'Author Name',
            'dob'  =>'04/13/2014'
        ]);

        $this->assertCount(1, Author::all());

        $response->assertRedirect('/');

      //  $this->assertInstanceOf(Carbon::class, $author->first());

    }

}
