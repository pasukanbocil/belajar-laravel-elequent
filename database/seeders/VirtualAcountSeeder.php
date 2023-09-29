<?php

namespace Database\Seeders;

use App\Models\VirtualAcount;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VirtualAcountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wallet = Wallet::where('customer_id', 'DICKY')->firstOrFail();

        $virtualAccount = new VirtualAcount();
        $virtualAccount->bank = "BCA";
        $virtualAccount->va_number = "1234556789";
        $virtualAccount->wallet_id = $wallet->id;
        $virtualAccount->save();
    }
}
