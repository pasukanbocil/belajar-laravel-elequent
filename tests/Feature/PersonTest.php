<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    public function testPerson()
    {
        $person = new Person();
        $person->first_name = "Dicky";
        $person->last_name = "Satria";
        $person->save();

        self::assertEquals("DICKY Satria", $person->full_name);

        $person->full_name = "Meli Amelia";
        $person->save();

        self::assertEquals("MELI", $person->first_name);
        self::assertEquals("Amelia", $person->last_name);
    }

    public function testAttributesCasting()
    {
        $person = new Person();
        $person->first_name = "Dicky";
        $person->last_name = "Satria";
        $person->save();

        self::assertNotNull($person->created_at);
        self::assertNotNull($person->updated_at);
        self::assertInstanceOf(Carbon::class, $person->created_at);
        self::assertInstanceOf(Carbon::class, $person->updated_at);
    }

    public function testCustomCasts()
    {
        $person = new Person();
        $person->first_name = "Dicky";
        $person->last_name = "Satria";
        $person->address = new Address("Cikole", "Garut", "Indonesia", "44183");
        $person->save();

        self::assertNotNull($person->created_at);
        self::assertNotNull($person->updated_at);
        self::assertInstanceOf(Carbon::class, $person->created_at);
        self::assertInstanceOf(Carbon::class, $person->updated_at);
        self::assertEquals("Cikole", $person->address->street);
        self::assertEquals("Garut", $person->address->city);
        self::assertEquals("Indonesia", $person->address->country);
        self::assertEquals("44183", $person->address->postal_code);
    }
}
