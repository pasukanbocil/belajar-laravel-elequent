<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Wallet;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\VirtualAcountSeeder;
use Database\Seeders\WalletSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function testOneToOne()
    {
        $this->seed([CustomerSeeder::class, WalletSeeder::class]);

        $customer = Customer::find("DICKY");
        self::assertNotNull($customer);


        // $wallet = Wallet::query()->where("customer_id",$customer->id)->first();
        $wallet = $customer->wallet;
        self::assertNotNull($wallet);

        self::assertEquals(1000000, $wallet->amount);
    }

    public function testOneToOneQuery()
    {
        $customer = new Customer();
        $customer->id = "DICKY";
        $customer->name = "Dicky";
        $customer->email = "dickysph@gmai.com";
        $customer->save();

        $wallet = new Wallet();
        $wallet->amount = 1000000;

        $customer->wallet()->save($wallet);

        self::assertNotNull($wallet->customer_id);
    }

    public function testHasOneThourgh()
    {
        $this->seed([CustomerSeeder::class, WalletSeeder::class, VirtualAcountSeeder::class]);

        $customer = Customer::find("DICKY");
        self::assertNotNull($customer);

        $virtualAccount = $customer->virtualAccount;
        self::assertNotNull($virtualAccount);
        self::assertEquals("BCA", $virtualAccount->bank);
    }

    public function testManyToMany()
    {
        $this->seed([
            CustomerSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class
        ]);

        $customer = Customer::find("DICKY");
        self::assertNotNull($customer);

        $customer->likeProducts()->attach("1");

        $products = $customer->likeProducts;
        self::assertCount(1, $products);

        self::assertEquals("1", $products[0]->id);
    }

    public function testMantToManyDetach()
    {
        $this->testManyToMany();

        $customer = Customer::find("DICKY");
        $customer->likeProducts()->detach("1");

        $products = $customer->likeProducts;
        self::assertCount(0, $products);
    }

    public function testPivotAttribute()
    {
        $this->testManyToMany();

        $customer = Customer::find("DICKY");
        $products = $customer->likeProducts;

        foreach ($products as $product) {
            $pivot = $product->pivot;
            self::assertNotNull($pivot);
            self::assertNotNull($pivot->customer_id);
            self::assertNotNull($pivot->product_id);
            self::assertNotNull($pivot->created_at);
        }
    }

    public function testPivotAttributeCondition()
    {
        $this->testManyToMany();

        $customer = Customer::find("DICKY");
        $products = $customer->likeProductsLastWeek;

        foreach ($products as $product) {
            $pivot = $product->pivot;
            self::assertNotNull($pivot);
            self::assertNotNull($pivot->customer_id);
            self::assertNotNull($pivot->product_id);
            self::assertNotNull($pivot->created_at);
        }
    }

    public function testPivotModel()
    {
        $this->testManyToMany();

        $customer = Customer::find("DICKY");
        $products = $customer->likeProducts;

        foreach ($products as $product) {
            $pivot = $product->pivot;
            self::assertNotNull($pivot);
            self::assertNotNull($pivot->customer_id);
            self::assertNotNull($pivot->product_id);
            self::assertNotNull($pivot->created_at);

            self::assertNotNull($pivot->customer);

            self::assertNotNull($pivot->product);
        }
    }
}
