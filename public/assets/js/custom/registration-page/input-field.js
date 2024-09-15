$(document).ready(function() {
    // Menangani elemen select
    $('#kt_sign_in_form select').on('change', function() {
        const selectName = $(this).attr('name');
        const $errorElement = $('.error-message[data-for="' + selectName + '"]');

        if ($errorElement.length) {
            if ($(this).val() === '') {
                $errorElement.show();
            } else {
                $errorElement.hide();
            }
        }
    });

    // Menangani elemen input
    $('#kt_sign_in_form input').on('input', function() {
        const inputName = $(this).attr('name');
        const $errorElement = $('.error-message[data-for="' + inputName + '"]');

        if ($errorElement.length) {
            if ($(this).val().trim() === '') {
                $errorElement.show();
            } else {
                $errorElement.hide();
            }
        }
    });

    // Fungsi untuk memuat kabupaten berdasarkan provinsi yang dipilih
    function loadKabupaten(provinsiId) {
        $.ajax({
            url: '/registrasi/' + provinsiId, // Kirim ID Provinsi ke endpoint Laravel
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#kabupaten').empty(); // Kosongkan dropdown kabupaten sebelumnya
                $('#kabupaten').append('<option value="">Pilih Kabupaten</option>'); // Tambah placeholder

                $.each(data, function(key, value) {
                    $('#kabupaten').append(
                        '<option value="' + value.name + '">' +
                        value.name +
                        '</option>'
                    );
                });

                // Pilih kabupaten lama jika ada
                if (oldKabupaten !== "") {
                    $('#kabupaten').val(oldKabupaten);
                }
            },
            error: function() {
                alert('Gagal memuat data kabupaten');
            }
        });
    }

    // Ketika provinsi diubah
    $('#provinsi').change(function() {
        var selectedOption = $(this).find('option:selected');
        var provinsiId = selectedOption.data('id'); // Ambil ID Provinsi dari data-id attribute

        if (provinsiId) {
            $('#kabupaten-container').show(); // Tampilkan dropdown kabupaten
            loadKabupaten(provinsiId); // Muat kabupaten
        } else {
            $('#kabupaten-container').hide(); // Sembunyikan dropdown kabupaten
            $('#kabupaten').empty(); // Kosongkan dropdown kabupaten
            $('#kabupaten').append('<option value="">Pilih Kabupaten</option>');
        }
    });

    // Jika ada nilai lama untuk provinsi, muat kabupaten terkait
    if (oldProvinsi !== "") {
        $('#provinsi option').each(function() {
            if ($(this).val() === oldProvinsi) {
                $(this).prop('selected', true);
                $('#provinsi').trigger('change');
                return false; // Berhenti mencari jika ditemukan
            }
        });
    }
});
