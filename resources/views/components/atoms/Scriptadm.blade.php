<!-- jQuery (WAJIB sebelum DataTables JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables Bootstrap 5 -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#TableFire').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Tidak ada data",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });

function confirmDelete(form) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-danger m-2",
                cancelButton: "btn btn-secondary"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Yakin ingin menghapus?",
            text: "Data tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Simulasikan delay sebelum submit agar terlihat manis
                Swal.fire({
                    title: "Menghapus...",
                    text: "Mohon tunggu",
                    timer: 1000,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                }).then(() => {
                    form.submit(); // Ini akan kembali ke controller dan redirect
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data aman, tidak jadi dihapus.',
                    'info'
                )
            }
        });
    }
</script>
