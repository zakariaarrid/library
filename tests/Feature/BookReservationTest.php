<?php

namespace Tests\Feature;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * */

    public function a_book_can_be_added_to_library()
    {
       $this->withoutExceptionHandling();

       $response = $this->post('/books', [
           'title' => 'cool book Title',
           'author' => 'Zak'
        ]);
        $response->assertOk();
        $this->assertCount('1', Book::all());
    }

    public function a_title_is_required() {

       $this->withoutExceptionHandling();

       $response = $this->post('/books', [
           'title' => '',
           'author' => 'Zak'
        ]);
        $response->assertSessionsHasErrors('title');
        //$response->assertOk();
        //$this->assertCount('1', Book::all());
    }
     /**
     * @test
     * */
    public function a_book_can_be_updated() {

      $this->withoutExceptionHandling();

       $this->post('/books', [
           'title' => 'ok',
           'author' => 'Zak'
        ]);

       $book = Book::first();
       $response = $this->patch('/books/'.$book->id,[
            'title' => 'New Title',
            'author' => 'New Author'
       ]);


       $this->assertEquals('New Title', Book::first()->title);
       $this->assertEquals('New Author', Book::first()->author);

    }













}
