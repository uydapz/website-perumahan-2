<x-DashLayout :title="$title ?? 'User'">
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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                + Tambah User
            </button>
            <button class="btn btn-outline-secondary" onclick="printTable()">🖨️ Print Semua</button>
        </div>

        <div class="table-responsive">
            <table id="TableFire" class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr id="row-{{ $u->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $u->name }}</strong></td>
                            <td>{{ $u->email }}</td>
                            <td class="no-print">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editUserModal{{ $u->id }}">
                                    ✏️
                                </button>
                                <form action="{{ route('user.destroy', $u->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this.form)"
                                        class="btn btn-danger btn-sm">🗑️</button>
                                </form>
                                <button onclick="printRow('row-{{ $u->id }}')"
                                    class="btn btn-outline-secondary btn-sm">
                                    🖨️
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editUserModal{{ $u->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('user.update', $u->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="name" class="form-control mb-2"
                                                value="{{ $u->name }}" required>
                                            <input type="email" name="email" class="form-control mb-2"
                                                value="{{ $u->email }}" required>
                                            <input type="password" name="password" class="form-control mb-2"
                                                placeholder="Ganti Password (opsional)">
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
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Nama" required>
                        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
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
            win.document.write('<html><head><title>Daftar User</title>');
            win.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />');
            win.document.write('</head><body><h4 class="text-center my-3">Daftar User</h4>');
            win.document.write(table.outerHTML);
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }

        function printRow(rowId) {
            const row = document.getElementById(rowId).cloneNode(true);
            row.deleteCell(-1);
            const win = window.open('', '', 'width=600,height=400');
            win.document.write('<html><head><title>Detail User</title>');
            win.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />');
            win.document.write('</head><body><h4 class="text-center my-3">Detail User</h4>');
            win.document.write('<table class="table table-bordered"><tbody>' + row.outerHTML + '</tbody></table>');
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }
    </script>
</x-DashLayout>
