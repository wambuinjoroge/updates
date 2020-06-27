<?php

Use Carbon\Carbon;
Use App\User;
Use App\Role;
Use App\RoleUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User([
            'name'=>'Wanjuhi',
            'email'=>'wanjuhi@updates.com',
            'password'=>Hash::make('wanjuhi123'),
            'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $user->save();
        $role = new Role([
            'name'=>'Admin',
            'slug'=>'admin',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $role->save();

        $user->roles()->attach($role->id,['created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        
        DB::table('role_user')->insert([
            'role_id'=>$role->id,
            'user_id'=>$user->id,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
