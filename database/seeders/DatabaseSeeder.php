<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $Team1 = Team::create([
            'name' => 'Admin Team',
        ]);
        $Team2 = Team::create([
            'name' => 'User Team',
        ]);

        User::factory()->create(
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]
        )->team()->attach([$Team1->id, $Team2->id]);

        User::factory()->create(
            [
                'name' => 'User',
                'email' => 'test1@example.com',
            ]
        )->team()->attach($Team1->id);

        User::factory()->create(
            [
                'name' => 'User',
                'email' => 'user@example.com',
            ]
        )->team()->attach($Team2->id);

        // Produk TEAM 1
        for ($i=1; $i < 100; $i++) {
            # code...
            Produk::factory()->create(
                [
                    'kode_produk' => 'Produk' . $i,
                    // 'nama_produk' => 'Deskripsi Produk'. $i,
                    // 'satuan' => 15000,
                    // 'kategori' => 'Elektronik',
                    // 'brand' => 'Brand B',
                    // 'deskripsi' => 'Deskripsi lengkap tentang Produk '. $i,
                    // 'harga' => 75000,
                    // 'stok' => 150,
                ]
            )->team()->attach($Team1->id);
        }

        // Produk TEAM 2
        Produk::factory()->create(
            [
                'kode_produk' => 'Produk001',
                // 'nama_produk' => 'Deskripsi Produk 1',
                // 'satuan' => 10000,
                // 'kategori' => 'Elektronik',
                // 'brand' => 'Brand A',
                // 'deskripsi' => 'Deskripsi lengkap tentang Produk 1',
                // 'harga' => 50000,
                // 'stok' => 200,
            ]
        )->team()->attach($Team2->id);

    }


}
