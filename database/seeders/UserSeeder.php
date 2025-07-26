<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([  
            [
                'name' => 'Anugrahani Prasetyowati, S.ST, M.Si.',
                'email' => 'anugrahani@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '197910172000122001',
                'jabatan' => 'Kepala BPS Kabupaten/kota',
                'role' => 'admin',
                'foto' => 'hani.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Deki Zulkarnain, S.ST',
                'email' => 'deki@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198902032012111001',
                'jabatan' => 'Kepala Subbagian Umum',
                'role' => 'admin',
                'foto' => 'deki.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mitra Larasaty Adami, S.ST',
                'email' => 'adami@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199012032013112001',
                'jabatan' => 'Statistisi Ahli Muda BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'adami.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cinta Seftia Ramadhani, S.Kom',
                'email' => 'cinta@bps.go.id',
                'password' => Hash::make('cinta123'),
                'nip' => '2006092520260920002',
                'jabatan' => 'Statistisi Ahli Muda BPS Kabupaten/Kota',
                'role' => 'admin',
                'foto' => 'cinta.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Nanda Adi Pradana, S.ST',
                'email' => 'nanda.ap@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199104292014101001',
                'jabatan' => 'Statistisi Ahli Muda BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'nanda.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   	
                'name' => 'Erwin Taher, S.Kom.',
                'email' => 'air.wind@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198212202011011009',
                'jabatan' => 'Statistisi Ahli Muda BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'erwin.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Desye Komaria, S.Si',
                'email' => 'desye.komaria@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198612282010032002',
                'jabatan' => 'Statistisi Ahli Muda BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'desye.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Elmafatriza Elisha Ekatama, S.ST',
                'email' => 'elmafatriza@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199111042014102001',
                'jabatan' => 'Statistisi Ahli Muda BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'elmafatriza.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [	
                'name' => 'Tita Marsita, S.P, M.Si.',
                'email' => 'tita.marsita@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198706062010032002',
                'jabatan' => 'Statistisi Ahli Muda BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'tita.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [	
                'name' => 'Muhammad Alfaris Kurniawan, S.Tr.Stat.',
                'email' => 'm.alfaris@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '200010162023021001',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'faris.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Heni Rahmawati, S.Tr.Stat.',
                'email' => 'heni.rahmawati@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199906232022012003',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'heni.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [	
                'name' => 'Erwin Majid',
                'email' => 'emajid@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198303062002121003',
                'jabatan' => 'Staf Subbagian Umum',
                'role' => 'pegawai',
                'foto' => 'emajid.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Muhammad Lukman Hakim, A.Md.T.',
                'email' => 'muh.lukman@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199802052022031008',
                'jabatan' => 'Statistisi Terampil BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'lukman.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Karmila Putri, S.ST',
                'email' => 'karmila.putri@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199405082016022001',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'putri.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Arima Dwi Oktari, A.Md.',
                'email' => 'arima@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198910022011012008',
                'jabatan' => 'Statistisi Mahir BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'arima.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Purnama Diah, S.Sos.',
                'email' => 'purnama.diah@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198701052008012001',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'diah.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Sylvia Yemima Sinaga, S.E',
                'email' => 'sylvia.yemima@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199607102022032013',
                'jabatan' => 'Statistisi Terampil BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'sylvia.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Jemmy Saputra, S.M.',
                'email' => 'jemmy@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198807052010031001',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'jemmy.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [	
                'name' => 'Marzuki, A.Md.',
                'email' => 'marzuki-pppk@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199006182024211003',
                'jabatan' => 'Pranata Komputer Terampil BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'marzuki.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Muhammad Idris, S.Tr.Stat.',
                'email' => 'muh.idris@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199908152022011003',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'idris.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [	
                'name' => 'Amaida, S.Si',
                'email' => 'amaida@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198501302011012016',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'amaida.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Dina Yunita Sari, S.Tr.Stat',
                'email' => 'dina.yunita@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199708142019122003',
                'jabatan' => 'Statistisi Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'dina.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [	
                'name' => 'Alif Andika Putra, S.Tr.Stat.',
                'email' => 'alif.putra@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199908022021041001',
                'jabatan' => 'Pranata Komputer Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'alif.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [			
                'name' => 'Candra Budiman, A.Md',
                'email' => 'candra.budiman@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '198806292010031001',
                'jabatan' => 'Statistisi Mahir BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'candra.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [		
                'name' => 'Ahmad Rahmadhan, S.ST, M.Si.',
                'email' => 'ahmad.rahmadhan@bps.go.id',
                'password' => Hash::make('11111111'),
                'nip' => '199003282013111001',
                'jabatan' => 'Pranata Komputer Ahli Pertama BPS Kabupaten/Kota',
                'role' => 'pegawai',
                'foto' => 'rahmadhan.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
