<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loker>
 */
class LokerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama_pekerjaan" => fake()->sentence(2),
            "perusahaan" => fake()->company(),
            "departemen" => fake()->word(),
            "deskripsi" => fake()->paragraph(4),
            "kualifikasi" => fake()->word(),
            "lokasi" => fake()->city(),
            "tanggal_buka" => fake()->date(),
            "tanggal_tutup" => fake()->date(),
        ];
    }
}
