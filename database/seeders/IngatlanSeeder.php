
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriak = [
            'ház',
            'lakás',
            'építési telek',
            'garázs',
            'mezőgazdasági épület',
            'ipari ingatlan',
        ];

        foreach ($kategoriak as $kat) {
            DB::table('kategoriak')->insert([
                'kategoria_nev' => $kat,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}