<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('students')->insert([
        'name' => 'Dam Tien Hung',
        'email' => 'hungdt@gmail.com',
        'code' => '1',
      ]);
      $array = array();
      $array["MAT3021"] = "Giải tích 1";
      $array["MAT3032"] = "Giải tích 2";
      $array["MAT3054"] = "Đại số tuyến tính";
      $array["MAT3112"] = "Xác suất";
      foreach ($array as $code => $name) {
          DB::table('subjects')->insert([
            'name' => $name,
            'code' => $code,
          ]);
      }
      DB::table('teacher_subjects')->insert([
        'student_id' => 1
        ''
      ]);
    }
}
