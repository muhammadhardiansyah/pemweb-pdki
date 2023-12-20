<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BrandClass;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);

        // User::factory(10)->create();
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'ardana.629@gmail.com',
            'password' => bcrypt('password'),
            'address' => 'Blitar',
            'email_verified_at' => now()
        ])->assignRole('admin');
        

        BrandClass::create([
            'no_class'  => 1,
            'desc'      => 'Bahan kimia yang digunakan dalam industri, ilmu pengetahuan dan fotografi, maupun dalam pertanian hortikultura dan kehutanan: damar buatan yang belum diproses, plastik yang belum diproses; pupuk, komposisi pemadam kebakaran: sediaan-sediaan mengeraskan dan memateri: zat kimia untuk mengawetkan bahan makanan: zat penyamakan; bahan perekat yang digunakan dalam industri.'
        ]);
        BrandClass::create([
            'no_class'  => 2,
            'desc'      => 'Cat, pernis, lak; bahan pencegah karatan dan kelapukan kayu; bahan warna; bahan penyering; damar yang belum dioleh; logam dalam bentuk daun atau bubuk untuk keperluan melukis, dekorasi, mencetak untuk para airtis'
        ]);
        BrandClass::create([
            'no_class'  => 3,
            'desc'      => 'Sediaan-sediaan untuk memutihkan dan mencuci; sediaan-sediaan untuk membersihkan, mengkilatkan, membuang lemak; sabun, wangi-wangian, minyak sari, kosmetik, minyak rambut; bahan-bahan pemeliharaan gigi'
        ]);
        BrandClass::create([
            'no_class'  => 4,
            'desc'      => 'Minyak dan lemak untuk industri; bahan pelumur; zat untuk mengisap, membasahi dan mengikat debu, bahan bakar (termasik minyak sari untuk motor) dan bahan penerangan; lilin, sumbu'
        ]);
        BrandClass::create([
            'no_class'  => 5,
            'desc'      => 'Sediaan farmasi dan kedokteran hewan, ilmu kebersihan untuk keperluan medis; zat makanan pantangan untuk diadaptasi untuk penggunaan medis dan kedokteran hewan, makanan bayi; suplemen pantangan untuk manusia dan hewan; plester, bahan pembalut; bahan untuk menambal gigi; pembuat gigi buatan; pembasi kuman; sediaan untuk membasmi binatang perusak; bahan pembasmi jamur; bahan pembasmi rumput liar.'
        ]);
        BrandClass::create([
            'no_class'  => 6,
            'desc'      => 'logam biasa dan campurannya; logam bahan bangunan; bangunan diangkut dari logam; bahan dari logam untuk rel kereta api; kabel non-listrik dan kabel dari logam biasa; barang besi, benda-benda kecil dari hardware logam; pipa dan tabung dari logam; brankas; barang dari logam biasa tidak termasuk dalam kelas-kelas lain; bijih.'
        ]);
        BrandClass::create([
            'no_class'  => 7,
            'desc'      => 'Mesin dan mesin perkakas; motor dan mesin (kecuali untuk kendaraan darat); Kopling mesin dan komponen transmisi (kecuali untuk kendaraan darat); alat pertanian selain yang dioperasikan secara manual;alat pengeram'
        ]);
        BrandClass::create([
            'no_class'  => 8,
            'desc'      => 'Perkakas dan alat tangan (dioperasikan secara manual); pisau; pedang; pisau cukur.'
        ]);
        BrandClass::create([
            'no_class'  => 9,
            'desc'      => 'Pesawat dan perkakas ilmu pengetahuan, pelayaran, penelitian, listrik, potret, kinematografi, timbang, ukur, sinyal, pengawasan (pemeriksaan), pertolongan dan pendidikan, pesawat dan perkakas untuk melaksanakan, menukar, menjelmakan, mengumpulkan, mengatur atau mengontrol listrik; perkakas untuk merekan transmisi atau reproduksi suara tau gambar; pembawa data magnetic, cakram perekam; CD, DVD dan media merekam digital'
        ]);
        BrandClass::create([
            'no_class'  => 10,
            'desc'      => 'Perkakas dan pesawat pembedahan, pengobatan, kedokteran, kedokteran gigi dan kedokteran hewan, lengan mata dan gigi palsu, barang-barang ortopedi, bahan-bahan benang bedah'
        ]);
        BrandClass::create([
            'no_class'  => 11,
            'desc'      => 'Instalasi penerangan, pemanasan, penghasilan uap, pemasangan, pendinginan, pengeringan, penyegaran udara pembagian air dan instalsi kesehatan'
        ]);
        BrandClass::create([
            'no_class'  => 12,
            'desc'      => 'Kendaraan; alat untuk bergerak di darat, udara atau air.'
        ]);
        BrandClass::create([
            'no_class'  => 13,
            'desc'      => 'Senjata api; amunisi dan proyektil; bahan peledak; kembang api'
        ]);
        BrandClass::create([
            'no_class'  => 14,
            'desc'      => 'Logam mulia dan campurannya dan benda-benda yang dibuat dari bahan-bahan itu atau disepuh dengan bahan- bahan itu, tidak termasuk dalam kelas lain; perhiasan; batu berharga; jam dan pesawat pengukur waktu'
        ]);
        BrandClass::create([
            'no_class'  => 15,
            'desc'      => 'Alat-alat Musik'
        ]);
        BrandClass::create([
            'no_class'  => 16,
            'desc'      => 'Kertas, karton dan barang-barang terbuat dari bahan-bahan ini, tidak termasuk dalam kelas lain; barang cetakan, alat menjilid buku; alat tulis menulis; bahan perekat untuk keperluan tulis menulis atau rumah tangga; alat untuk kesenian, kuas untuk melukis; mesin tulis dan alat-alat kantor (kecuali perabot) alat-alat pendidikan dan pengajaran (kecuali perkakas); bahan-bahan plastik untuk kemasan (tidak termasuk dalam kelas lain); kartu main; huruf-huruf cetak; blok-blok cetak.'
        ]);
        BrandClass::create([
            'no_class'  => 17,
            'desc'      => 'Karet, getah perca, getah, asbes, mika dan barang dari bahan-bahan itu dan tidak termasuk dalam kelas lain; plastik dalam bentuk menonjol untuk digunakan dalam manufaktur; bahan-bahan yang dipakai untuk pengemasan, merapatkan dan untuk menyekat; tabung lentur bukan dari logam'
        ]);
        BrandClass::create([
            'no_class'  => 18,
            'desc'      => 'Kulit dan kulit imitasi dan barang-barang dari bahan-bahan ini dan tidak termasuk dalam kelas lain; kulit binatang, kulit halus; koper dan tas, payung hujan, payu matahari dan tongkat; cambuk, pakaian kuda dan pelana'
        ]);
        BrandClass::create([
            'no_class'  => 19,
            'desc'      => 'Bahan bagunan (bukan logam); pipa kaku bukan logam untuk bangunan; aspal, pek dan bitumen; bangunan yang dapat dipindahkan bukan dari logam; monuimen, bukan dari logam'
        ]);
        BrandClass::create([
            'no_class'  => 20,
            'desc'      => 'Perabot rumah, kaca, bingkai; benda-benda (tidak termasuk dalam kelas lain) dari kayu, gabus, rumput, bambu, rotan, tanduk, tulang, gading, tulang ikan paus, kerang, amber, kulit mutiara, selloid dan dari bahan-bahan penggantinya, atau dari plastik'
        ]);
        BrandClass::create([
            'no_class'  => 21,
            'desc'      => 'Perkakas rumah tangga atau dapur dan wadah kecil (bukan dari logam mulia atau bukan sepuhan logam mulia); sisir dan bunga karang; sikat (kecuali kuas melukis); bahan-bahan pembuatan sikat; perkakas dan alat untuk membersihkan; kulit besi untuk menggosok; kaca yang belum dikerjakan atau dikerjakan sebagian (kecuali kaca yang digunakan dalam gedung ); barang pecah belah, porselin dan barang-barang tembikar tidak termasuk dalam kelas lain.'
        ]);
        BrandClass::create([
            'no_class'  => 22,
            'desc'      => 'Tampar, tali, jala, renda, kere, kain terpal, layar, kantong, karung (tidak termasuk dalam kelas lain); bahan-bahan pengisi (kecuali dari karet atau plastik); serat kasar untuk pertenunan'
        ]);
        BrandClass::create([
            'no_class'  => 23,
            'desc'      => 'Benang untuk tekstil'
        ]);
        BrandClass::create([
            'no_class'  => 24,
            'desc'      => 'Tekstil dan barang-barang tekstil tidak termasuk dalam kelas lain; sepre dan taplak meja'
        ]);
        BrandClass::create([
            'no_class'  => 25,
            'desc'      => 'Pakaian, alas kaki, tutup kepala'
        ]);
        BrandClass::create([
            'no_class'  => 26,
            'desc'      => 'Kerawang dan sulaman, pita dan tali sepatu; kancing, kancing tekan, kait dan mata kait, peniti dan jarum; bunga buatan'
        ]);
        BrandClass::create([
            'no_class'  => 27,
            'desc'      => 'Permadani, tikar, lanoleum dan bahan-bahan lain yang dipakai sebagai alas lantai; alat-alat dinding (kecuali tenunan)'
        ]);
        BrandClass::create([
            'no_class'  => 28,
            'desc'      => 'Permainan serta alat-alatnya; alat-alat senam dan oari raga tidak termasuk dalam keas aui; perhiasan untuk pohon natal'
        ]);
        BrandClass::create([
            'no_class'  => 29,
            'desc'      => 'Daging, ikan,unggas dan binatang buruan; sari daging; buah-buahan serta sayur-sayuran yang diawetkan, dibekukan, dikeringkan dan dimask; jeli, sele, saus buah-buahan; telur, susu dan produk susu; minyak dan lemak yang'
        ]);
        BrandClass::create([
            'no_class'  => 30,
            'desc'      => 'Kopi, teh, kakao, gula, beras, tapioka, sagu, bahan pengganti kopi; tepung dan sediaan terbuat dari gandum, roti, kueh dan kembang gula, es konsumsi; madu, sirup; ragi, bubuk untuk membuat roti; garam, mostar, cuka, saos; rempah-rempah; es.'
        ]);
        BrandClass::create([
            'no_class'  => 31,
            'desc'      => 'Padi-padian dan hasil-hasil pertanian, perkebunan, kehutanan dan jenis gandum yang tidak termasuk dalam kelas lain; hewan hidup; buah-buahan dan sayur-sayuran segar; benih-benih, tanaman dan bunga hidup; makanan untuk hewan, biji-bijian berkecambah untuk membuat bir'
        ]);
        BrandClass::create([
            'no_class'  => 32,
            'desc'      => 'Bir; air mineral dan air soda dan minuman lain yang tidak beralkohol; minuman dan jus buah-buahan; sirop dan sediaan lain untuk membuat minuman'
        ]);
        BrandClass::create([
            'no_class'  => 33,
            'desc'      => 'Minuman beralkohol (kecuali bir)'
        ]);
        BrandClass::create([
            'no_class'  => 34,
            'desc'      => 'Tembakau; barang-barang keperluan perokok; geretan'
        ]);
        BrandClass::create([
            'no_class'  => 35,
            'desc'      => 'Periklanan; manajemen usaha; administrasi usaha; fungsi kantor'
        ]);
        BrandClass::create([
            'no_class'  => 36,
            'desc'      => 'Asuransi; urusan keuangan; urusan moneter; urusan real estate'
        ]);
        BrandClass::create([
            'no_class'  => 37,
            'desc'      => 'Konstruksi bangunan; perbaikan; jasa instalasi'
        ]);
        BrandClass::create([
            'no_class'  => 38,
            'desc'      => 'Telekomunikasi'
        ]);
        BrandClass::create([
            'no_class'  => 39,
            'desc'      => 'Transportasi; pengemasan dan penyimpanan barang; pengaturan perjalanan'
        ]);
        BrandClass::create([
            'no_class'  => 40,
            'desc'      => 'Penanganan material'
        ]);
        BrandClass::create([
            'no_class'  => 41,
            'desc'      => 'Pendidikan; penyediaan latihan; hiburan; kegiatan olah raga dan kesenian'
        ]);
        BrandClass::create([
            'no_class'  => 42,
            'desc'      => 'Jasa penelitian dan tehnologi dan penelitian dan perancangn yang berhubungan dengannya; jasa penelitian dan analisis industri; perancangan dan pengembangan perangkat keras dan perangkat lunak komputer'
        ]);
        BrandClass::create([
            'no_class'  => 43,
            'desc'      => 'Jasa untuk menyediakan makanan dan minuman; akomodasi sementara'
        ]);
        BrandClass::create([
            'no_class'  => 44,
            'desc'      => 'Jasa medis; Jasa kehewanan; Perawatan kesehatan dan kecantikan untuk manusia atau hewan; Jasa pertanian, hortikultura dan hutan'
        ]);
        BrandClass::create([
            'no_class'  => 45,
            'desc'      => 'Jasa hukum; jasa keamanan untuk perlindungan bangunan dan individu'
        ]);


        Brand::factory(10)->create();


        
        

    }
}
