<?php

use Illuminate\Database\Seeder;
use App\Status;
class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Status::where('status','pending')->first()){
            Status::create([
                'status' => "pending",
                'color' => "blue",
                'text' => "Pending"
            ]);
        }
        if(!Status::where('status','approved')->first()){
            Status::create([
                'status' => "approved",
                'color' => "red",
                'text' => "Approved"
            ]);
        }
        if(!Status::where('status','denied')->first()){
            Status::create([
                'status' => "denied",
                'color' => "red",
                'text' => "Denied"
            ]);
        }

    }
}
