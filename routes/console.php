<?php

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('import:user {file}', function ($file) {
    $path = '';
    if (str_starts_with($file, '/')) {
        $path = $file;
    } else {
        $path = getcwd() . '/' . $file;
    };

    $users = [];
    if ($resource = fopen($path, 'r')) {
        $firstRow = true;
        while ($data = fgetcsv($resource, 1000, ',')) {
            if ($firstRow) {
                $firstRow = false;
                continue;
            }

            $role = null;
            $class = null;
            switch (strtoupper($data[2])) {
                case 'MURID':
                    $role = User::STUDENT;
                    $class = $data[3];
                    break;
                case 'GURU':
                    $role = User::TEACHER;
                    break;
                case 'STAFF':
                    $role = User::STAFF;
                    break;
            }

            $users[] = [
                'name' => $data[0],
                'username' => $data[1],
                'role_id' => $role,
                'class' => $class ?? null,
                'password' => strtoupper($data[2]) . $data[1],
            ];
        }
        fclose($resource);
    }

    $users = array_reverse($users);

    DB::transaction(function () use ($users) {
        foreach ($users as $user) {
            try {
                User::create([
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'class' => $user['class'],
                    'password' => Hash::make($user['password']),
                ]);

                $this->info("\"{$user['name']}\",{$user['username']},{$user['password']}");
            } catch (QueryException $exception) {
                $this->warn($exception->getMessage() . PHP_EOL);
            }
        }
    });
})->purpose('Seed User from CSV file');
