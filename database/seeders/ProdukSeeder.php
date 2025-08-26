<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\User;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ambil user pertama (anggap sebagai penjual)
        $user = User::first();

        $produks = [
            [
                'nama_produk' => 'Benang Bekas',
                'deskripsi' => 'Sisa gulungan benang yang masih bisa dimanfaatkan untuk menjahit atau merajut.',
                'harga' => 15000,
                'stok' => 50,
                'lokasi' => 'Bogor',
                'foto' => 'public/image/benang.png',
            ],
            [
                'nama_produk' => 'Kaleng Bekas',
                'deskripsi' => 'Kaleng bekas makanan atau minuman, cocok untuk dijadikan wadah atau kerajinan tangan.',
                'harga' => 10000,
                'stok' => 100,
                'lokasi' => 'Cibinong, Bogor',
                'foto' => 'public/image/kaleng.png',
            ],
            [
                'nama_produk' => 'Kancing Bekas',
                'deskripsi' => 'Kancing pakaian yang masih bagus, bisa dipakai ulang untuk baju atau kerajinan.',
                'harga' => 5000,
                'stok' => 200,
                'lokasi' => 'Dramaga, Bogor',
                'foto' => 'image/kancing.png',
            ],
            [
                'nama_produk' => 'Kayu Bekas',
                'deskripsi' => 'Potongan kayu bekas konstruksi yang masih kuat, bisa diolah untuk kerajinan atau furnitur.',
                'harga' => 30000,
                'stok' => 40,
                'lokasi' => 'Bogor Barat',
                'foto' => 'image/kayu.png',
            ],
            [
                'nama_produk' => 'Kulit Bekas',
                'deskripsi' => 'Sisa potongan kulit sintetis yang masih layak, cocok untuk aksesoris atau tas kecil.',
                'harga' => 25000,
                'stok' => 30,
                'lokasi' => 'Bogor Timur',
                'foto' => 'image/leather.png',
            ],
            [
                'nama_produk' => 'Pipa Bekas',
                'deskripsi' => 'Potongan pipa plastik yang masih dapat dipakai untuk saluran atau kerajinan.',
                'harga' => 20000,
                'stok' => 60,
                'lokasi' => 'Bogor Utara',
                'foto' => 'image/pipa.png',
            ],
            [
                'nama_produk' => 'Sabuk Bekas',
                'deskripsi' => 'Sabuk kulit bekas yang masih bagus, bisa dipakai ulang atau didaur ulang.',
                'harga' => 10000,
                'stok' => 25,
                'lokasi' => 'Bogor Selatan',
                'foto' => 'image/belts.png',
            ],
            [
                'nama_produk' => 'Benang Sisa Produksi',
                'deskripsi' => 'Benang sisa produksi pabrik, bisa dipakai untuk kerajinan tangan atau menjahit.',
                'harga' => 12000,
                'stok' => 70,
                'lokasi' => 'Cileungsi, Bogor',
                'foto' => 'image/benang.png',
            ],
            [
                'nama_produk' => 'Kaleng Minuman Bekas',
                'deskripsi' => 'Kaleng minuman ringan bekas, cocok untuk dijadikan wadah kreatif atau hiasan.',
                'harga' => 8000,
                'stok' => 150,
                'lokasi' => 'Ciomas, Bogor',
                'foto' => 'image/kaleng.png',
            ],
            [
                'nama_produk' => 'Kayu Palet Bekas',
                'deskripsi' => 'Kayu palet bekas gudang yang masih kuat, bisa dibuat meja, kursi, atau rak sederhana.',
                'harga' => 35000,
                'stok' => 20,
                'lokasi' => 'Gunung Putri, Bogor',
                'foto' => 'image/kayu.png',
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create([
                'user_id' => $user->id,
                'nama_produk' => $produk['nama_produk'],
                'deskripsi' => $produk['deskripsi'],
                'harga' => $produk['harga'],
                'stok' => $produk['stok'],
                'lokasi' => $produk['lokasi'],
                'foto' => $produk['foto'],
                'status' => 'approved',
            ]);
        }
    }
}
