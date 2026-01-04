<x-DashLayout :title="$title ?? 'Testimoni'">
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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimoniModal">
                + Tambah Testimoni
            </button>
            <button class="btn btn-outline-secondary" onclick="printTable()">🖨️ Print Semua</button>
        </div>

        <div class="table-responsive">
            <table id="TableFire" class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Rating</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $t)
                        <tr id="row-{{ $t->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $t->image) }}" width="80" class="rounded-circle">
                            </td>
                            <td>
                                <strong>{{ $t->name }}</strong><br>
                                <small class="text-muted">{{ $t->role }}</small>
                            </td>
                            <td>
                                @for ($i = 0; $i < $t->rating; $i++)
                                    ⭐
                                @endfor
                            </td>
                            <td>{{ $t->message }}</td>
                            <td class="no-print">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editTestimoniModal{{ $t->id }}">
                                    ✏️
                                </button>
                                <form action="{{ route('testimoni.destroy', $t->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this.form)"
                                        class="btn btn-danger btn-sm">🗑️</button>
                                </form>
                                <button onclick="printRow('row-{{ $t->id }}')"
                                    class="btn btn-outline-secondary btn-sm">
                                    🖨️
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editTestimoniModal{{ $t->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('testimoni.update', $t->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Testimoni</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="name" class="form-control mb-2" placeholder="Nama" value="{{ $t->name }}">
                                            <input type="text" name="role" class="form-control mb-2" placeholder="Peran" value="{{ $t->role }}">
                                            <textarea name="message" class="form-control mb-2" placeholder="Pesan">{{ $t->message }}</textarea>
                                            <input type="number" name="rating" class="form-control mb-2" placeholder="Rating (1-5)" value="{{ $t->rating }}" min="1" max="5">
                                            <input type="file" name="image" class="form-control mb-2">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
    <div class="modal fade" id="addTestimoniModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Testimoni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Nama">
                        <input type="text" name="role" class="form-control mb-2" placeholder="Peran">
                        <textarea name="message" class="form-control mb-2" placeholder="Pesan"></textarea>
                        <input type="number" name="rating" class="form-control mb-2" placeholder="Rating (1-5)" min="1" max="5">
                        <input type="file" name="image" class="form-control mb-2">
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
            win.document.write('<html><head><title>Daftar Testimoni</title>');
            win.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />');
            win.document.write('</head><body><h4 class="text-center my-3">Daftar Testimoni</h4>');
            win.document.write(table.outerHTML);
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }

        function printRow(rowId) {
            const row = document.getElementById(rowId).cloneNode(true);
            row.deleteCell(-1);
            const win = window.open('', '', 'width=600,height=400');
            win.document.write('<html><head><title>Detail Testimoni</title>');
            win.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />');
            win.document.write('</head><body><h4 class="text-center my-3">Detail Testimoni</h4>');
            win.document.write('<table class="table table-bordered"><tbody>' + row.outerHTML + '</tbody></table>');
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }
    </script>
</x-DashLayout>
