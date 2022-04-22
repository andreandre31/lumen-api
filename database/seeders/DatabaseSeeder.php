<?php

namespace Database\Seeders;

use App\Models\Sample;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sample::truncate();

        $json = File::get("database/seed/sample.json");
        $data = json_decode($json, true);

        foreach ($data as $item) {
            
            Sample::create([
                "id" => $item['_id'],
                "isActive" => $item['isActive'],
                "name" => $item['details'][0]['name'],
                "balance" => $item['details'][0]['balance'],
                "greeting" => $item['greeting'],
                "favoriteTransportation" => $item['favoriteTransportation']
            ]);
        }
    }
}
