<?php

namespace Tests\Feature;

use App\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_name_field_is_required_to_create_unit()
    {
        $this->postJson(route('unit.store'))
            ->assertSee("The name field is required");
    }

    public function test_unit_will_created()
    {
        $this->postJson(route('unit.store'), [
            'name' => $this->faker->name,
        ])->assertJson(['status' => 200]);

        self::assertCount(1, Unit::all());
    }

    public function test_name_field_is_required_to_update_unit()
    {
        $unit = \UnitMaker::create();

        $this->patchJson(route('unit.update', $unit))
            ->assertSee("The name field is required");
    }

    public function test_unit_will_updated()
    {
        $unit = \UnitMaker::create();

        $this->patchJson(route('unit.update', $unit), [
            'name' => $name = $this->faker->name,
        ])->assertJson(['status' => 200]);

        $this->assertDatabaseHas('units', [
            'name' => $name,
        ]);
    }

    public function test_unit_will_deleted()
    {
        $unit = \UnitMaker::create();

        $this->deleteJson(route('unit.destroy', $unit))
            ->assertJson(['status' => 200]);

        $this->assertSoftDeleted($unit->fresh());
    }
}
