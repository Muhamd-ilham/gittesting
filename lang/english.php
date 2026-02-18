<?php

/* 

Please be careful editing this file. Read the instructions in the ebook tutorial to avoid errors due to edit errors.
Mohon berhati-hati melakukan editing file ini. Baca petunjuk pada ebook tutorial untuk menghindari error karena kesalahan edit.

*/

function replace_text( $replaced ) {
    $text = array(

        /*----------  START EDIT  HERE ----------*/
        
        // General
        'Lihat Semua' => 'View All',
        'Sumber' => 'Source',
        'Penulis' => 'Author',
        'Editor' => 'Editor',
        'Maaf, saat ini belum tersedia post untuk ditampilkan.' => 'Sorry, at the moment there is no post to be displayed.',
        'Tutup Iklan' => 'Close Ad',
        'Scroll untuk melanjutkan' => 'Scroll to continue',
        'Sebelumnya' => 'Previous',
        'Selanjutnya' => 'Next',
        'Baca juga' => 'Read also',
        'Diupload pada' => 'Uploaded at',
        'Atur ukuran teks artikel ini untuk mendapatkan pengalaman membaca terbaik.' => 'Adjust the font size of this article to get the best reading experience.',
        'Pasang Aplikasi' => 'Install App',

        // Jam, Tanggal & Bulan
        'menit yang lalu' => 'minute ago',
        'jam yang lalu' => 'hour ago',

        'Minggu' => 'Sunday',
        'Senin' => 'Monday',
        'Selasa' => 'Tuesday',
        'Rabu' => 'Wednesday',
        'Kamis' => 'Thursday',
        'Jumat' => 'Friday',
        'Sabtu' => 'Saturday',
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
        'Beranda' => 'Home',
        'Arsip "%s"' => 'Archive "%s"',
        'Hasil Pencarian "%s"' => 'Search Results "%s"',
        'Tag "%s"' => 'Tag "%s"',
        'Penulis "%s"' => 'Author "%s"',
        'Halaman "%s"' => 'Page "%s"',
        'Halaman Komentar "%s"' => 'Comment Page "%s"',
        'Kesalahan 404' => 'Error 404',

        // 404
        'Kesalahan 404 - Halaman tidak ditemukan!' => 'Error 404 - Page Not Found!',
        'Maaf, halaman yang Anda cari kemungkinan telah dipindahkan atau dihapus.' => 'Sorry, the page you are looking for may have been moved or deleted.',
        
        // Pencarian
        'Topik berita apa yang Anda cari?' => 'What news topic are you looking for?',
        'Artikel berdasarkan kategori' => 'Articles based on category',
        'Kata Pencarian' => 'Type your keyword',
        'Mencari' => 'Search',
        'Pencarian' => 'Search Results',
        'Maaf, tidak ada hasil untuk ditampilkan.' => 'Sorry, there is no result to be displayed.',
        '%s hasil pencarian dengan kata kunci:' => '%s search results with keyword:',
        'kembali ke Beranda' => 'back to Home',
        'atau silahkan gunakan kolom pencarian dibawah ini.' => 'or use the search box below.',
        
        // Komentar
        'Komentar (%s)' => 'Comment (%s)',
        'komentar' => 'comment',
        'Saat ini belum ada komentar' => 'At the moment there is no comment',
        'Silahkan tulis komentar Anda' => 'Please write your comment',
        'Email Anda tidak akan dipublikasikan. Kolom yang bertanda bintang (*) wajib diisi' => 'Your email will not be published. Fields marked with an asterisk (*) are required',
        'Sunting' => 'Edit',
        'Balas' => 'Reply',
        'Batal' => 'Cancel',
        'Nama' => 'Name',
        'Email' => 'Email',
        'Komentar' => 'Comment',
        'Kirim Komentar' => 'Post Comment',
        'Terima kasih, komentar Anda akan melewati proses moderasi untuk dapat ditampilkan.' => 'Thank you, your comment will go through moderation process to be displayed.',
        'Simpan nama, email, dan situs web saya pada peramban ini untuk komentar saya berikutnya.' => 'Save my name, email, and URL in this browser for the next time I comment.',

        // ePaper
        'Jumlah Halaman' => 'Number of Pages',
        'Bahasa' => 'Language',
        'Penerbit' => 'Publisher',
        'Tanggal Terbit' => 'Published Date',
        'Gratis' => 'Free',
        'File %s saat ini tidak tersedia.' => 'The current %s file is not available.',
        'Baca' => 'Read',
        'Beli Sekarang' => 'Buy Now',

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