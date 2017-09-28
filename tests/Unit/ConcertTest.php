<?php

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcertTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @test
     */
    public function can_get_formatted_date()
    {
        $concert = factory(Concert::class)->make(['date' => Carbon::parse('2017-12-01 8:00pm')]);

        $this->assertEquals('December 1, 2017', $concert->formatted_date);
    }

    /**
     * @test
     */
    public function can_get_formated_start_time()
    {
        $concert = factory(Concert::class)->make(['date' => Carbon::parse('2017-12-01 21:00:00')]);

        $this->assertEquals('9:00pm', $concert->formatted_start_time);
    }

    /**
     * @test
     */
    public function can_get_ticket_price_in_dollars()
    {
        $concert = factory(Concert::class)->make(['ticket_price' => '2350']);

        $this->assertEquals('23.50', $concert->ticket_price_in_dollars);
    }
}
