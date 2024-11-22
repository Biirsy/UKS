<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form UKAES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            height: 100vh; /* Pastikan tinggi penuh layar */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
        margin: 40px auto;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(183, 32, 36, 0.5);
        border-radius: 15px;
        background-color: white;
        max-width: 900px;

        }

        .col-md-4 {
            border-radius: 15px 0 0 15px;
            background-color: #B72024;
            color: white;
            padding: 0; /* Hapus padding/margin dari elemen ini */
        }

        .col-md-4 .content {
            padding: 40px 20px; /* Margin untuk elemen dalam */
            text-align: center;
        }

        .col-md-4 img {
            width: 70%;
            margin: 20px auto;
        }

        .col-md-4 h2 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .col-md-4 h3 {
            font-weight: 500;
            margin-bottom: 15px;
        }

        .col-md-4 h4 {
            font-weight: 400;
            margin-bottom: 20px;
        }

        .col-md-8 {
            padding: 30px;
        }

        .col-md-8 h3 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 10px;
            padding: 10px;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-submit {
            background-color: #B72024;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
        }

        .btn-submit:hover {
            background-color: #9a1b1e;
        }

        @media (max-width: 768px) {
            .col-md-4 {
                display: none; /* Sembunyikan kolom kiri pada layar kecil */
            }

            .container {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-4">
                <div class="content">
                    <h3>Selamat datang di</h3>
                    <img src="{{ asset('uksnewwhite.png') }}" alt="logo">
                    <h2>UKAES</h2>
                    <h4>Ada keluhan hari ini? <br> diisi dulu formnya, ya!</h4>
                </div>
            </div>

            <!-- Kolom Form -->
            <div class="col-md-8">
                <h3>Form Pendaftaran Pasien</h3>
                <form onsubmit="sendMessage()" autocomplete="off">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input id="nama" type="text" placeholder="Masukkan Nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan</label>
                        <input id="keluhan" type="text" placeholder="Masukkan Keluhan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Ruangan</label>
                        <input id="kelas" type="text" placeholder="Masukkan Ruangan" class="form-control" required>
                    </div>
                    <button type="submit" class="btn-submit">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function sendMessage() {
            const nama = document.getElementById("nama").value;
            const keluhan = document.getElementById("keluhan").value;
            const kelas = document.getElementById("kelas").value;

            const url = `https://api.whatsapp.com/send?phone=+6281212527602&text=Permisi%20Kak%0ASaya%20${encodeURIComponent(nama)}%20dari%20${encodeURIComponent(kelas)}%20Keluhan%20saya%20${encodeURIComponent(keluhan)}%0A%0ATerima%20Kasih%20Kak`;
            window.open(url);
        }
    </script>
</body>
</html>
