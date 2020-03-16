$(function () {
    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form')[0].reset();
    });
    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/qodr/php/phpmvc/public/mahasiswa/ubahData')

        const id = $(this).data('id');

        $.ajax({
            type: "post",
            url: "http://localhost/qodr/php/phpmvc/public/mahasiswa/ubah",
            data: {
                id: id
            },
            dataType: "json",
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#jurusan').val(data.jurusan);
                $('#email').val(data.email);
                $('#id').val(data.id);
            }
        });

    });
})