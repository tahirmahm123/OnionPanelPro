<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','info@digitaldtech.com')->first();
        if(!$user){
            User::create([
                'name' => 'Digital Developers & Techonologies',
                'username' => 'admin',
                'email' => 'info@digitaldtech.com',
                'password' => "asdjkfhasdkljhasdflkjhasdflkjhasdflkjhjh",
                'role' => 'admin',
                'phone' => '+923008133312',
                'total_allowed_account' => '100000'
            ]);
        }
    }
}
