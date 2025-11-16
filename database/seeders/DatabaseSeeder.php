<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Announcement;
use App\Models\News;
use App\Models\StudyProgram;
use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // ABOUT SECTION
        // =========================
        About::create([
            'description' => "Sekolah Cerdas Bangsa didirikan dengan visi untuk menciptakan lingkungan belajar yang inspiratif dan transformatif. Kami fokus pada pengembangan akademis, karakter, dan keterampilan hidup agar setiap siswa siap menghadapi tantangan masa depan.",
            'visi' => 'Menjadi sekolah unggulan yang melahirkan pemimpin masa depan berintegritas.',
            'misi' => 'Menyediakan kurikulum inovatif dan fasilitas terbaik untuk memaksimalkan potensi siswa.',
            'nilai' => 'Integritas, inovasi, kolaborasi, dan kepedulian sosial.',
        ]);

        // =========================
        // STUDY PROGRAMS
        // =========================
        $studyPrograms = [
            [
                "title"=> "Teknik Kendaraan Ringan Otomotif (TKR)",
                "description"=> "Fokus pada perawatan dan perbaikan kendaraan bermotor. Jurusan ini bekerja sama dengan PT Honda untuk kelas industri."
            ],
            [
                "title"=> "Pengembangan Perangkat Lunak dan Gim (PPLG)",
                "description"=> "Berfokus pada pengembangan perangkat lunak dan aplikasi."
            ],
            [
                "title"=> "Teknik Jaringan Komputer dan Telekomunikasi (TJKT)",
                "description"=> "Menangani instalasi dan pemeliharaan jaringan komputer. Memiliki program Samsung Teknik Institute (STI)."
            ],
            [
                "title"=> "Teknik Pengelasan dan Fabrikasi Logam (TP)",
                "description"=> "Mempelajari proses pembuatan, perakitan, dan pengelasan komponen logam."
            ]
        ];

        foreach ($studyPrograms as $item) {
            StudyProgram::create($item);
        }

        // =========================
        // ANNOUNCEMENTS
        // =========================
        $announcements = [
            [
                'title' => 'Pengumuman Kelulusan 2025',
                'content' =>
                    'Pelaksanaan pengumuman kelulusan akan dilakukan secara online pada tanggal 20 Mei 2025 pukul 10.00 WIB.',
            ],
            [
                'title' => 'Penerimaan Peserta Didik Baru',
                'content' =>
                    'PPDB dibuka mulai tanggal 1 Juni 2025. Siswa dapat mendaftar melalui website resmi sekolah.',
            ],
            [
                'title' => 'Libur Akhir Semester',
                'content' =>
                    'Libur semester dimulai dari 10 Desember 2025 hingga 2 Januari 2026.',
            ],
        ];

        foreach ($announcements as $a) {
            Announcement::create($a);
        }

        // =========================
        // NEWS
        // =========================
        $news = [
            [
                'title' => 'Prestasi Siswa di Lomba LKS Nasional',
                'content' =>
                    'Siswa jurusan PPLG berhasil meraih juara 1 pada ajang Lomba Kompetensi Siswa tingkat nasional tahun 2025.',
            ],
            [
                'title' => 'Kegiatan Ekstrakurikuler Semester Genap',
                'content' =>
                    'Ekstrakurikuler sekolah akan kembali aktif mulai bulan Februari 2025 dengan agenda kegiatan terbaru.',
            ],
        ];

        foreach ($news as $n) {
            News::create($n);
        }

        // =========================
        // EVENTS
        // =========================
        $events = [
            [
                'title' => 'Seminar Karir & Industri 2026',
                'description' => 'Seminar yang menghadirkan praktisi industri untuk memberikan wawasan karir kepada siswa.',
                'date' => '2026-03-15',
                'location' => 'Aula Utama SMK Cerdas Bangsa',
            ],
            [
                'title' => 'Pentas Seni Akhir Tahun',
                'description' => 'Menampilkan kreativitas siswa dalam bidang seni musik, tari, dan teater.',
                'date' => '2026-06-12',
                'location' => 'Lapangan Sekolah',
            ],
            [
                'title' => 'Lomba Kebersihan Kelas',
                'description' => 'Kompetisi kebersihan antar kelas untuk meningkatkan kenyamanan lingkungan belajar.',
                'date' => '2026-02-01',
                'location' => 'Seluruh Area Sekolah',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        // =========================
        // ROLES & USERS
        // =========================
        $this->call(UserRolePermissionsSeeder::class);
    }
}
