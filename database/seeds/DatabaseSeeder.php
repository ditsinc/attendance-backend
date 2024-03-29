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
        // factory(\App\User::class)->create(['role' => 'TEACHER'])->each(function($user) {
        //     factory(\App\Teacher::class)->create(['user_id' => $user->id])->each(function($teacher) {
        //         factory(\App\Section::class)->create(['teacher_id' => $teacher->id])->each(function($section) {
        //             factory(\App\Student::class)->create(['section_id' => $section->id])->each(function($student) {
        //                 factory(\App\Attendance::class)->create(['student_id' => $student->id, 'status' => 'PRESENT', 'date' => '2021-12-12']);
        //             });
        //         });
        //     });
        // });

        $user = \App\User::create(['username' => 'teacherone', 'password' => 'password', 'role' => 'TEACHER']);
        \App\Teacher::create(['user_id' => $user->id, 'name' => 'teacherone']);

        $user = \App\User::create(['username' => 'teachertwo', 'password' => 'password', 'role' => 'TEACHER']);
        \App\Teacher::create(['user_id' => $user->id, 'name' => 'teachertwo']);

        $user = \App\User::create(['username' => 'teacherthree', 'password' => 'password', 'role' => 'TEACHER']);
        \App\Teacher::create(['user_id' => $user->id, 'name' => 'teacherthreee']);
    }
}
