<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user. Accessed only by {admins}';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user['name'] = $this->ask('Name of the new user');
        $user['email'] = $this->ask('Email of the new user');
        $user['password'] = $this->secret('Password of the new user');

        $roleName = $this->choice('Role of the new user',['admin','editor'],1);
        $role = Role::where('name', $roleName)->first();
        if(! $role) {
            $this->error('Role not found');

            return;
        }

        DB::transaction(function () use ( $user ,$role){
           $newUser = User::create([
             'name' => $user['name'],
             'email' => $user['email'],
             'password' => bcrypt($user['password'])
           ]);
           $newUser->roles()->attach($role->id);
        });

    }
}
