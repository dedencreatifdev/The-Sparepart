<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'kode_produk' => $this->faker->unique()->bothify('PRD-####'),
            'nama_produk' => $this->faker->word(),
            'satuan' => $this->faker->randomElement(['pcs', 'box', 'kg', 'liter']),
            'kategori' => $this->faker->randomElement(['Elektronik', 'Otomotif', 'Rumah Tangga', 'Alat Tulis']),
            'brand' => $this->faker->company(),
            'deskripsi' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. lore,em ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'harga' => $this->faker->numberBetween(10000, 1000000),
            'stok' => $this->faker->numberBetween(0, 500),
        ];
    }
}
