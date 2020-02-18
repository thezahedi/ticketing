<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_title_field_is_required_to_create_ticket()
    {
        $this->postJson(route('ticket.store'))
            ->assertSee("The title field is required");
    }

    public function test_content_field_is_required_to_create_ticket()
    {
        $this->postJson(route('ticket.store'))
            ->assertSee("The content field is required");
    }
}
