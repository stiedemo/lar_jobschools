<?php

use Illuminate\Database\Seeder;

class ChucVuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('chuc_vu')->insert([
        //     'name' => 'Lớp Trưởng',
        //     'mota' => 'Lớp trưởng chi đoàn',
        // ]);
        DB::table('chuc_vu')->insert(
        [
            'name' => 'Bí Thư',
            'mota' => 'Bí thư chi đoàn',
        ]);
    }
}
