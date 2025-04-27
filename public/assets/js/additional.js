$(document).ready(function() {
    // Tangani pengiriman form
    $('#submitForm').on('submit', function(e) {
        e.preventDefault();  // Mencegah form submit langsung

        // Tampilkan SweetAlert2 konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang Anda masukkan akan disimpan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan 'Ya, Simpan!', lanjutkan dengan pengiriman form
                this.submit();  // Kirim form
            }
        });
    });

    $('#updateForm').on('submit', function(e) {
        e.preventDefault();  // Mencegah form submit langsung

        // Ambil nilai dari atribut data-note pada form
        var note = $(this).data('note');  // Ambil nilai dari data-note

        // Tampilkan SweetAlert2 konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: note,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Rubah!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan 'Ya, Rubah!', lanjutkan dengan pengiriman form
                this.submit();  // Kirim form
            }
        });
    });
    $('.deleteForm').on('submit', function(e) {
        e.preventDefault();  // Mencegah form submit langsung

        // Ambil nilai dari atribut data-note pada form
        var note = $(this).data('note');  // Ambil nilai dari data-note

        // Tampilkan SweetAlert2 konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: note,  // Menampilkan pesan konfirmasi berdasarkan data-note
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan 'Ya, Hapus!', lanjutkan dengan pengiriman form
                this.submit();  // Kirim form
            }
        });
    });

    $('.sendInvoice').on('click', function(e) {
        e.preventDefault();  // Mencegah aksi default
alert('a    ');
        // var linkApprove = $(this).data('link');  // Ambil nilai dari data-link
        // var note = $(this).data('note');  // Ambil nilai dari data-note
        // var invoice = $(this).data('invoice');  // Ambil nilai dari data-invoice
        // // Tampilkan SweetAlert2 konfirmasi
        // Swal.fire({
        //     title: 'Apakah Anda yakin?',
        //     text: note,  // Menampilkan pesan konfirmasi berdasarkan data-note
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonText: 'Ya, Kirim!',
        //     cancelButtonText: 'Batal'
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         // Jika pengguna menekan 'Ya, Kirim!', lanjutkan dengan pengiriman form
        //         window.location.href = linkApprove;  // Arahkan ke URL yang diambil dari data-link
        //     }
        // });
    });
    
});
