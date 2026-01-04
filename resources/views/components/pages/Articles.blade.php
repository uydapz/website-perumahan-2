<x-DashLayout :title="$title ?? 'Properti'">
    <script src="https://cdn.tiny.cloud/1/7v0ppq2eg2r7qq1bety6oavos0nqskl9ol3icyrxxmy1geh6/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>
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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPropertiModal">
                + Tambah Properti
            </button>
            <button class="btn btn-outline-secondary" onclick="printTable()">🖨️ Print Semua</button>
        </div>

        <div class="table-responsive">
            <table id="TableFire" class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Sample</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $a)
                        <tr id="row-{{ $a->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($a->image)
                                    <img src="{{ asset('storage/' . $a->image) }}" width="80" class="rounded">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex; gap: 8px; align-items: center;">
                                    {{-- @dd($a->gambar) --}}
                                    @foreach ($a->gambar as $g)
                                        <div style="text-align: center;">
                                            <img src="{{ asset('storage/' . $g->image) }}" width="40"
                                                style="border-radius: 4px;">
                                            <form action="{{ route('gambar.destroy', $g->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus gambar ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    style="background: none; border: none; color: red; font-size: 12px;">Hapus</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td><strong>{{ $a->title ?? '-' }}</strong></td>
                            <td>{!! $a->deskripsi !!}</td>
                            <td class="no-print">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editArticlesModal{{ $a->id }}">
                                    ✏️
                                </button>
                                <form action="{{ route('article.destroy', $a->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this.form)"
                                        class="btn btn-danger btn-sm">🗑️</button>
                                </form>
                                <button onclick="printRow('row-{{ $a->id }}')"
                                    class="btn btn-outline-secondary btn-sm">
                                    🖨️
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editArticlesModal{{ $a->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('article.update', $a->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf @method('PATCH')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Properti</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="title" class="form-control mb-2"
                                                placeholder="Judul" value="{{ $a->title }}">
                                            <textarea type="text" name="deskripsi" class="form-control mb-2" placeholder="Deskripsi">{{ $a->deskripsi }}</textarea>
                                            <input type="file" name="image" class="form-control mb-2">
                                            <input type="file" name="gambar[]" multiple accept="image/*">
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
    <div class="modal fade" id="addPropertiModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Properti</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="title" class="form-control mb-2" placeholder="Judul (opsional)">
                        <textarea type="text" name="deskripsi" class="form-control mb-2" placeholder="Deskripsi" required></textarea>
                        <input type="file" name="image" class="form-control mb-2">
                        <input type="file" name="gambar[]" multiple accept="image/*">
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
            win.document.write('<html><head><title>Daftar Properti</title>');
            win.document.write(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />'
            );
            win.document.write('</head><body><h4 class="text-center my-3">Daftar Properti</h4>');
            win.document.write(table.outerHTML);
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }

        function printRow(rowId) {
            const row = document.getElementById(rowId).cloneNode(true);
            row.deleteCell(-1);
            const win = window.open('', '', 'width=600,height=400');
            win.document.write('<html><head><title>Detail Properti</title>');
            win.document.write(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />'
            );
            win.document.write('</head><body><h4 class="text-center my-3">Detail Properti</h4>');
            win.document.write('<table class="table table-bordered"><tbody>' + row.outerHTML + '</tbody></table>');
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }

        tinymce.init({
            selector: 'textarea[name=deskripsi]', // atau ganti sesuai kebutuhan
            plugins: 'link image code lists',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
            height: 300
        });
    </script>
</x-DashLayout>
