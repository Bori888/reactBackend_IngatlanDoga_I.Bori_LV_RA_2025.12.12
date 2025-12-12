<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngatlanokSeeder extends Seeder
{
    public function run(): void
    {
        // Kategóriák lekérése név szerint
        $kategoriak = DB::table('kategoriak')->pluck('id', 'kategoria_nev')->toArray();

        $ingatlanok = [
            [
                'leiras' => 'Kényelmes családi ház a város szélén.',
                'datum' => now(),
                'tehermentes' => true,
                'ar' => 45000000,
                'kepUrl' => 'haz1.jpg',
                'kategoria_nev' => 'ház',
            ],
            [
                'leiras' => 'Tágas lakás a belvárosban.',
                'datum' => now(),
                'tehermentes' => false,
                'ar' => 38000000,
                'kepUrl' => 'lakas1.jpg',
                'kategoria_nev' => 'lakás',
            ],
            [
                'leiras' => 'Építési telek csendes utcában.',
                'datum' => now(),
                'tehermentes' => true,
                'ar' => 12000000,
                'kepUrl' => 'telek1.jpg',
                'kategoria_nev' => 'építési telek',
            ],
            [
                'leiras' => 'Kis garázs a lakótelep mellett.',
                'datum' => now(),
                'tehermentes' => true,
                'ar' => 3500000,
                'kepUrl' => 'garazs1.jpg',
                'kategoria_nev' => 'garázs',
            ],
            [
                'leiras' => 'Mezőgazdasági épület földterülettel.',
                'datum' => now(),
                'tehermentes' => false,
                'ar' => 9500000,
                'kepUrl' => 'mezogazdasagi1.jpg',
                'kategoria_nev' => 'mezőgazdasági épület',
            ],
            [
                'leiras' => 'Ipari ingatlan logisztikai célra.',
                'datum' => now(),
                'tehermentes' => true,
                'ar' => 85000000,
                'kepUrl' => 'ipari1.jpg',
                'kategoria_nev' => 'ipari ingatlan',
            ],
            [
                'leiras' => 'Modern családi ház kerttel.',
                'datum' => now(),
                'tehermentes' => true,
                'ar' => 52000000,
                'kepUrl' => 'haz2.jpg',
                'kategoria_nev' => 'ház',
            ],
            [
                'leiras' => 'Lakás panorámás kilátással.',
                'datum' => now(),
                'tehermentes' => false,
                'ar' => 40000000,
                'kepUrl' => 'lakas2.jpg',
                'kategoria_nev' => 'lakás',
            ],
            [
                'leiras' => 'Építési telek frekventált helyen.',
                'datum' => now(),
                'tehermentes' => true,
                'ar' => 15000000,
                'kepUrl' => 'telek2.jpg',
                'kategoria_nev' => 'építési telek',
            ],
            [
                'leiras' => 'Kis garázs könnyen megközelíthető helyen.',
                'datum' => now(),
                'tehermentes' => true,
                'ar' => 3000000,
                'kepUrl' => 'garazs2.jpg',
                'kategoria_nev' => 'garázs',
            ],
        ];

        foreach ($ingatlanok as &$ingatlan) {
            // Releváns kategória hozzárendelése név alapján
            $ingatlan['kategoria_id'] = $kategoriak[$ingatlan['kategoria_nev']];
            unset($ingatlan['kategoria_nev']); // már nincs rá szükség
            $ingatlan['created_at'] = now();
            $ingatlan['updated_at'] = now();
        }

        DB::table('ingatlanok')->insert($ingatlanok);
    }
}