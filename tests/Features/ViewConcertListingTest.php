<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Concert;

class ViewConcertListingTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function user_can_view_a_concert_listing()
    {
        // Arrange
        // Create a Concert
        $concert = Concert::create([
            'title'                  => 'The Red Chord',
            'subtitle'               => 'with Animosity and Lethargy',
            'date'                   => Carbon::parse('December 13, 2017 8:00 PM'),
            'ticket_price'           => 3250, // cents
            'venue'                  => 'The Mosh Pit',
            'venue_address'          => '123 Example Lane',
            'city'                   => 'Laravel',
            'state'                  => 'PA',
            'zip'                    => '19403',
            'additional_information' => 'For tickets, call (555) 555-5555',
        ]);

        // Act
        // View the Concert
        $this->visit('/concerts/' . $concert->id);

        // Assert
        // See the Concert details
        $this->see('The Red Chord');
        $this->see('with Animosity and Lethargy');
        $this->see('December 13, 2017');
        $this->see('8:00pm');
        $this->see('$32.50');
        $this->see('The Mosh Pit');
        $this->see('123 Example Lane');
        $this->see('Laravel');
        $this->see('PA');
        $this->see('19403');
        $this->see('For tickets, call (555) 555-5555');
    }
}
