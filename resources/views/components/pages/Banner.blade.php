<x-DashLayout :title="$title ?? 'Banners'">
    <style>
        @media print {

            th:last-child,
            td:last-child,
            .no-print {
                display: none !important;
            }
        }
    </style>

    <div class="p-4 rounded shadow-sm">
        @if (session('success'))
            <script>
                Swal.fire('Berhasil!', '{{ session('success') }}', 'success');
            </script>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBannerModal">
                + Tambah Banner
            </button>
            <button class="btn btn-outline-secondary" onclick="printTable()">🖨️ Print Semua</button>
        </div>

        <div class="table-responsive">
            <table id="TableFire" class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banner as $b)
                        <tr id="row-{{ $b->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($b->image)
                                    <a href="{{ asset('storage/' . $b->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $b->image) }}" width="150"
                                            class="img-thumbnail">
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="no-print">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editBannerModal{{ $b->id }}">
                                    <i class="ni ni-ruler-pencil"></i>
                                </button>

                                <form action="{{ route('banner.destroy', $b->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this.form)"
                                        class="btn btn-danger btn-sm">
                                        <i class="ni ni-fat-remove"></i>
                                    </button>
                                </form>

                                <button onclick="printRow('row-{{ $b->id }}')"
                                    class="btn btn-outline-secondary btn-sm">
                                    <i class="ni ni-single-copy-04"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editBannerModal{{ $b->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('banner.update', $b->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Banner</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" name="image" class="form-control mb-3">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addBannerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="image" class="form-control mb-3">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-Scriptadm />
    <script>
        function printTable() {
            const table = document.getElementById('TableFire').cloneNode(true);
            Array.from(table.rows).forEach(row => row.deleteCell(-1));
            const win = window.open('', '', 'height=600,width=800');
            win.document.write('<html><head><title>Daftar Banner</title>');
            win.document.write(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />'
            );
            win.document.write('</head><body><h4 class="text-center my-3">Daftar Banner</h4>');
            win.document.write(table.outerHTML);
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }

        function printRow(rowId) {
            const row = document.getElementById(rowId).cloneNode(true);
            row.deleteCell(-1);
            const win = window.open('', '', 'width=600,height=400');
            win.document.write('<html><head><title>Detail Banner</title>');
            win.document.write(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />'
            );
            win.document.write('</head><body><h4 class="text-center my-3">Detail Banner</h4>');
            win.document.write('<table class="table table-bordered"><tbody>' + row.outerHTML + '</tbody></table>');
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }
    </script>
</x-DashLayout>
