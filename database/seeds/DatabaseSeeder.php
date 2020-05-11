<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tao teacher/student

        factory(App\User::class, 50)->create();

        // Tao user custom

        DB::table('users')->insert([
            'email' => 'hungdt@gmail.com',
            'name' => 'Dam Tien Hung',
            'role' => 2,
            'code' => '17001201',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'name' => 'ADMIN',
            'role' => 0,
            'code' => '0',
            'password' => Hash::make('123456'),
        ]);

        // them mon hoc

        $array = array();
        $array["MAT3021"] = "Giải tích 1";
        $array["MAT3032"] = "Giải tích 2";
        $array["MAT3054"] = "Đại số tuyến tính";
        $array["MAT3112"] = "Xác suất";
        foreach ($array as $code => $name) {
            DB::table('subjects')->insert([
                'name' => $name,
                'code' => $code,
                'started_at' => Carbon\Carbon::now(),
                'ended_at' => Carbon\Carbon::now()->addMonth(4),
                'number_lessons_per_week' => 2,
                'amount' => 30
            ]);
        }

        // them tat ca mon hoc vao sinh vien 1

        $subjects = App\Subject::all();
        foreach ($subjects as $e) {
            DB::table('user_subject')->insert([
                'user_id' => 1,
                'subject_id' => $e->id
            ]);
        }

        // them giao vien vao lop
        DB::table('user_subject')->insert([
            'user_id' => 3,
            'subject_id' => 1
        ]);

        // them sinh vien vao lop id = 1

        $students = App\User::where('role', 2)->get();
        foreach ($students as $e) {
            DB::table('user_subject')->insert([
                'user_id' => $e->id,
                'subject_id' => 1
            ]);
        }
    }
}
