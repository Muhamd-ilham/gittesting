<?php

/* 

Please be careful editing this file. Read the instructions in the ebook tutorial to avoid errors due to edit errors.
Mohon berhati-hati melakukan editing file ini. Baca petunjuk pada ebook tutorial untuk menghindari error karena kesalahan edit.

*/

function replace_text( $replaced ) {
    $text = array(

        /*----------  START EDIT  HERE ----------*/
        
        // General
        'Lihat Semua' => 'Lihat Semua',
        'Sumber' => 'Sumber',
        'Penulis' => 'Penulis',
        'Editor' => 'Editor',
        'Maaf, saat ini belum tersedia post untuk ditampilkan.' => 'Maaf, saat ini belum tersedia post untuk ditampilkan.',
        'Tutup Iklan' => 'Tutup Iklan',
        'Scroll untuk melanjutkan' => 'Scroll untuk melanjutkan',
        'Sebelumnya' => 'Sebelumnya',
        'Selanjutnya' => 'Selanjutnya',
        'Baca juga' => 'Baca juga',
        'Diupload pada' => 'Diupload pada',
        'Atur ukuran teks artikel ini untuk mendapatkan pengalaman membaca terbaik.' => 'Atur ukuran teks artikel ini untuk mendapatkan pengalaman membaca terbaik.',
        'Pasang Aplikasi' => 'Pasang Aplikasi',

        // Jam, Tanggal & Bulan
        'menit yang lalu' => 'menit yang lalu',
        'jam yang lalu' => 'jam yang lalu',

        'Minggu' => 'Minggu',
        'Senin' => 'Senin',
        'Selasa' => 'Selasa',
        'Rabu' => 'Rabu',
        'Kamis' => 'Kamis',
        'Jumat' => 'Jumat',
        'Sabtu' => 'Sabtu',
        'Jan' => 'Jan',
        'Feb' => 'Feb',
        'Mar' => 'Mar',
        'Apr' => 'Apr',
        'Mei' => 'Mei',
        'Jun' => 'Jun',
        'Jul' => 'Jul',
        'Agt' => 'Agt',
        'Sep' => 'Sep',
        'Okt' => 'Okt',
        'Nov' => 'Nov',
        'Des' => 'Des',

        // Breadcrumb
        'Beranda' => 'Beranda',
        'Arsip "%s"' => 'Arsip "%s"',
        'Hasil Pencarian "%s"' => 'Hasil Pencarian "%s"',
        'Tag "%s"' => 'Tag "%s"',
        'Penulis "%s"' => 'Penulis "%s"',
        'Halaman "%s"' => 'Halaman "%s"',
        'Halaman Komentar "%s"' => 'Halaman Komentar "%s"',
        'Kesalahan 404' => 'Kesalahan 404',

        // 404
        'Kesalahan 404 - Halaman tidak ditemukan!' => 'Kesalahan 404 - Halaman tidak ditemukan!',
        'Maaf, halaman yang Anda cari kemungkinan telah dipindahkan atau dihapus.' => 'Maaf, halaman yang Anda cari kemungkinan telah dipindahkan atau dihapus.',

        // Pencarian
        'Topik berita apa yang Anda cari?' => 'Topik berita apa yang Anda cari?',
        'Artikel berdasarkan kategori' => 'Artikel berdasarkan kategori',
        'Kata Pencarian' => 'Kata Pencarian',
        'Mencari' => 'Mencari',
        'Pencarian' => 'Pencarian',
        'Maaf, tidak ada hasil untuk ditampilkan.' => 'Maaf, tidak ada hasil untuk ditampilkan.',
        '%s hasil pencarian dengan kata kunci:' => '%s hasil pencarian dengan kata kunci:',
        'kembali ke Beranda' => 'kembali ke Beranda',
        'atau silahkan gunakan kolom pencarian dibawah ini.' => 'atau silahkan gunakan kolom pencarian dibawah ini.',

        // Komentar
        'Komentar (%s)' => 'Komentar (%s)',
        'komentar' => 'komentar',
        'Saat ini belum ada komentar' => 'Saat ini belum ada komentar',
        'Silahkan tulis komentar Anda' => 'Silahkan tulis komentar Anda',
        'Email Anda tidak akan dipublikasikan. Kolom yang bertanda bintang (*) wajib diisi' => 'Email Anda tidak akan dipublikasikan. Kolom yang bertanda bintang (*) wajib diisi',
        'Sunting' => 'Sunting',
        'Balas' => 'Balas',
        'Batal' => 'Batal',
        'Nama' => 'Nama',
        'Email' => 'Email',
        'Komentar' => 'Komentar',
        'Kirim Komentar' => 'Kirim Komentar',
        'Terima kasih, komentar Anda akan melewati proses moderasi untuk dapat ditampilkan.' => 'Terima kasih, komentar Anda akan melewati proses moderasi untuk dapat ditampilkan.',
        'Simpan nama, email, dan situs web saya pada peramban ini untuk komentar saya berikutnya.' => 'Simpan nama, email, dan situs web saya pada peramban ini untuk komentar saya berikutnya.',

        // ePaper
        'Jumlah Halaman' => 'Jumlah Halaman',
        'Bahasa' => 'Bahasa',
        'Penerbit' => 'Penerbit',
        'Tanggal Terbit' => 'Tanggal Terbit',
        'Gratis' => 'Gratis',
        'File %s saat ini tidak tersedia.' => 'File %s saat ini tidak tersedia.',
        'Baca' => 'Baca',
        'Beli Sekarang' => 'Beli Sekarang',


        // Bila ada yang perlu diubah cukup menambahkan text awal dan replace text-nya sesuai format yang ada diatas.
        // 'Text Asli' => 'Text Pengganti',

        /*----------  STOP EDIT  HERE ----------*/

    );

    foreach ( $text as $key => $value ) {
        if ( $replaced === $key ) {
            $replaced = $value;
            break;
        }
    }
    return $replaced;
}
add_filter( 'gettext', 'replace_text', 20 );
?>