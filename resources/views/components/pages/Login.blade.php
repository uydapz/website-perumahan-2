<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Puncak Permata Batu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        body {
            background: linear-gradient(135deg, #205781, #8ed2c9);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            padding: 1rem;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 16px;
        }

        .form-control:focus {
            border-color: #205781;
            box-shadow: 0 0 0 0.2rem rgba(32, 87, 129, 0.2);
        }

        .btn-primary {
            background-color: #205781;
            border: none;
            padding: 12px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #143b58;
        }

        .nav-tabs {
            border: none;
            justify-content: center;
        }

        .nav-tabs .nav-link {
            border: none;
            background: transparent;
            font-weight: 600;
            color: #205781;
            padding-bottom: 10px;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #205781;
        }

        .text-muted a {
            color: #205781;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }

        .alert {
            max-width: 500px;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>

    {{-- Alert --}}
    <div class="position-absolute top-0 mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    {{-- Card --}}
    <div class="card p-4 p-md-5 mt-4 mt-md-0">
        <ul class="nav nav-tabs mb-4" id="authTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                    type="button" role="tab">Masuk</button>
            </li>
        </ul>

        <div class="tab-content" id="authTabsContent">
            {{-- Login Form --}}
            <div class="tab-pane fade show active" id="login" role="tabpanel">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email/Nama</label>
                        <input type="text" class="form-control" id="loginEmail" name="login"
                            placeholder="Masukkan Email atau Nama" required>

                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="loginPassword" name="password"
                            placeholder="Masukkan Password" required>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary" type="submit">Masuk</button>
                    </div>
                </form>
            </div>

            {{-- Register Form --}}
            <div class="tab-pane fade" id="register" role="tabpanel">
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="registerName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" required>
                    </div>
                    <div class="mb-4">
                        <label for="registerConfirm" class="form-label">Ulangi Kata Sandi</label>
                        <input type="password" class="form-control" id="registerConfirm" name="password_confirmation"
                            required>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary" type="submit">Daftar</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tombol Back --}}
        <div class="text-center mt-3">
            <a href="/" class="btn btn-outline-light text-dark btn-sm">← Kembali ke Beranda</a>
        </div>
    </div>

</body>

</html>
