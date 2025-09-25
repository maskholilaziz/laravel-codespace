<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResepAyamGorengLengkuasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan transaction untuk memastikan semua data masuk atau tidak sama sekali
        DB::transaction(function () {
            // 1. Cari atau buat User sebagai author resep
            $author = User::find(1);

            // 2. Cari atau buat Kategori "Masakan Rumahan"
            $category = Category::find(1);

            // 3. Buat data resep utamanya
            $recipe = Recipe::create([
                'title' => 'Ayam Goreng Lengkuas',
                'description' => 'Ayam goreng gurih meresap dengan serundeng lengkuas yang renyah. Resep andalan keluarga yang selalu bikin nambah nasi.',
                'cooking_time_minutes' => 60,
                'default_servings' => 4,
                'estimated_budget' => 50000,
                'status' => 'published',
                'author_id' => $author->id,
            ]);

            // 4. Siapkan data bahan-bahan (ingredients)
            // Menggunakan firstOrCreate untuk menghindari duplikasi bahan di tabel master 'ingredients'
            $ingredients = [
                ['name' => 'Ayam', 'quantity' => '1', 'unit' => 'ekor', 'notes' => 'potong 8 bagian'],
                ['name' => 'Lengkuas', 'quantity' => '200', 'unit' => 'gram', 'notes' => 'parut kasar'],
                ['name' => 'Serai', 'quantity' => '3', 'unit' => 'batang', 'notes' => 'memarkan'],
                ['name' => 'Daun Salam', 'quantity' => '3', 'unit' => 'lembar', 'notes' => null],
                ['name' => 'Air Kelapa', 'quantity' => '500', 'unit' => 'ml', 'notes' => 'bisa diganti air biasa'],
                ['name' => 'Minyak Goreng', 'quantity' => '750', 'unit' => 'ml', 'notes' => 'untuk menggoreng'],
                // Bumbu Halus
                ['name' => 'Bawang Merah', 'quantity' => '8', 'unit' => 'siung', 'notes' => 'untuk bumbu halus'],
                ['name' => 'Bawang Putih', 'quantity' => '5', 'unit' => 'siung', 'notes' => 'untuk bumbu halus'],
                ['name' => 'Kunyit', 'quantity' => '3', 'unit' => 'cm', 'notes' => 'bakar sebentar, untuk bumbu halus'],
                ['name' => 'Ketumbar', 'quantity' => '1', 'unit' => 'sdm', 'notes' => 'sangrai, untuk bumbu halus'],
                ['name' => 'Garam', 'quantity' => '1.5', 'unit' => 'sdt', 'notes' => 'sesuai selera'],
                ['name' => 'Gula Pasir', 'quantity' => '1', 'unit' => 'sdt', 'notes' => 'sesuai selera'],
            ];

            // 5. Hubungkan bahan-bahan ke resep melalui tabel pivot
            foreach ($ingredients as $ing) {
                $ingredientModel = Ingredient::firstOrCreate(['name' => $ing['name']]);
                $recipe->ingredients()->attach($ingredientModel->id, [
                    'quantity' => $ing['quantity'],
                    'unit' => $ing['unit'],
                    'notes' => $ing['notes'],
                ]);
            }

            // 6. Buat langkah-langkah (steps) memasak
            $steps = [
                ['step_number' => 1, 'instruction' => 'Haluskan bawang merah, bawang putih, kunyit, dan ketumbar. Campurkan dengan lengkuas parut.'],
                ['step_number' => 2, 'instruction' => 'Lumuri potongan ayam dengan bumbu halus hingga merata.'],
                ['step_number' => 3, 'instruction' => 'Diamkan selama minimal 30 menit di dalam kulkas agar bumbu meresap.', 'timer_in_seconds' => 1800],
                ['step_number' => 4, 'instruction' => 'Masukkan ayam yang sudah dibumbui ke dalam wajan. Tambahkan air kelapa, serai, dan daun salam. Aduk rata.'],

                // Langkah 5 yang lama dipecah menjadi dua
                ['step_number' => 5, 'instruction' => 'Nyalakan api sedang, masak hingga mendidih. Pastikan untuk menutup wajan.'],
                ['step_number' => 6, 'instruction' => 'Lanjutkan proses ungkep (memasak) hingga air menyusut dan bumbu meresap. Proses ini akan memakan waktu sekitar 25 menit.', 'timer_in_seconds' => 1500], // INI LANGKAH TIMER BARU (25 menit * 60 detik)

                // Nomor langkah selanjutnya disesuaikan
                ['step_number' => 7, 'instruction' => 'Setelah air menyusut, angkat ayam dan pisahkan dari sisa bumbu lengkuas.'],
                ['step_number' => 8, 'instruction' => 'Panaskan minyak goreng dalam jumlah banyak. Goreng ayam hingga berwarna kuning keemasan. Angkat dan tiriskan.'],
                ['step_number' => 9, 'instruction' => 'Goreng sisa bumbu lengkuas di minyak bekas menggoreng ayam hingga kering dan renyah. Angkat dan tiriskan.'],
                ['step_number' => 10, 'instruction' => 'Sajikan ayam goreng dengan taburan serundeng lengkuas di atasnya. Selamat menikmati!'],
            ];

            $recipe->steps()->createMany($steps);

            // 7. Hubungkan resep ini dengan kategori "Masakan Rumahan"
            $recipe->categories()->attach($category->id);
        });
    }
}
