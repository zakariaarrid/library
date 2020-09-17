<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Book,user};

class BookReservationsTest extends TestCase
{
    /**
     * @test
     */
    public function a_book_can_be_checked_out(){

        $book = factory(Book::class)->create();
        $user = factory(User::class)->create();

        $book->checkout($user);

        $this->assertCount(1 ,Reservation::all());
        $this->assertEquals($user->id, Reservation::first()->user_id);
        $this->assertEquals($book->id, Reservation::first()->book_id);

        $this->assertEquals(now(), Reservation::first()->checked_out_at);

        $book->checkout($user);


    }
}
