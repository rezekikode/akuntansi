$(document).on('click', '.hapus', function() {
    let id = $(this).data('id');
    let induk = $(this).data('id-induk');
    let token = $(this).data('token');
    Swal.fire({
        title: 'Apa Anda yakin?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/akun/' + id + '?induk=' + induk,
                type: 'POST',
                data: {
                    _token: token,
                    _method: 'DELETE'
                },
                beforeSend: function() {
                    Swal.showLoading();
                },
                complete: function() {
                    Swal.hideLoading();
                },
                success: function(data) {
                    Swal.fire(
                        'Dihapus!',
                        'Data telah di hapus.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Ups!',
                        'Ada yang salah.',
                        'error'
                    );
                }
            });
        }
    });
});

$(document).on('click', '.restore', function() {
    let id = $(this).data('id');
    let induk = $(this).data('id-induk');
    let token = $(this).data('token');
    Swal.fire({
        title: 'Apa Anda yakin?',
        text: "Anda akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, kembalikan!',
        cancelButtonText: 'Batal',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/akun/' + id + '/restore/ajax?induk=' + induk,
                type: 'POST',
                data: {
                    _token: token,
                    _method: 'PATCH'
                },
                beforeSend: function() {
                    Swal.showLoading();
                },
                complete: function() {
                    Swal.hideLoading();
                },
                success: function(data) {
                    Swal.fire(
                        'Dikembalikan!',
                        'Data telah di kembalikan.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Ups!',
                        'Ada yang salah.',
                        'error'
                    );
                }
            });
        }
    });
});