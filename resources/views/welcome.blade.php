<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form UKAES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        .col-md-4{
            border-radius: 15px 0 0 15px;
            border: 7px solid #B72024;
           
        }
        .container {
            /* padding: 20px; */
            justify-content: center;
            margin-top: 60px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(183, 32, 36, 0.5);
            border: #B72024;
            border-radius: 15px; 
            width: 70%;
            /* border: 2px solid #B72024; 
            padding: 20px;
            background-color: #f8f9fa; */
        }
        .col-md-4 .row{
            background-color: #B72024;
            align-items: center;
            text-align: center;
        }
        .col-md-4 h2{
            color: white;
            font-family: poppins;
            font-weight: 700;
            padding-bottom: 25%;

        }
        .col-md-4 .row h3{
            color: white;
            font-family: poppins;
            font-weight: 700;
            font-size: 25px;
            padding-bottom: 25%;
            padding-top: 10%;
        }
        .col-md-4 .row h4{
            color: white;
            font-family: poppins;
            font-weight: 400;
            font-size: 18px;
            padding-bottom: 5%;
        }
        .col-md-4 img{
            width: 50%;
            /* padding-bottom: 30%; */
            margin-left: 25%;
        }
        .col-md-8 h3{
            font-family: poppins;
            font-weight: 700;
            padding-bottom: 30px;
        }
        .col-md-8 h5{
            font-family: poppins;
            font-weight: 500;
            font-size: 15px;
        }
        .col-md-8{
            /* padding: 70px; */
            margin: auto;
            width: 50%;
            align-items: center;
            /* place-items: center; */
        }
        .col-md-8 input{
            margin-bottom: 5%;
            
        }

        .col-md-8 button{
            margin-bottom: 5%;
            
        }
    </style>
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <h3>Selamat datang di</h3>                    
                </div>
                <div class="row"><img src="{{ asset('uksnewwhite.png') }}" alt="logo"></div>
                <div class="row">
                    <h2>UKAES</h2>
                </div>
                <div class="row">
                    <h4>Ada keluhan hari ini? <br> diisi dulu formnya, ya!</h4>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3>Form Pendaftaran Pasien</h3>
                </div>
               <form onsubmit="sendMessage()" autocomplete="off">
                 <div class="row">
                    <h5>Nama</h5>
                    <div class="row">
                        <input id="nama" type="text" placeholder="Masukkan Nama" class="form-control rounded" required>
                    </div>
                </div>
                <div class="row">
                    <h5>Keluhan</h5>
                    <div class="row">
                        <input id="keluhan" type="text" placeholder="Masukkan Keluhan" class="form-control rounded" required>
                    </div>
                </div>
                <div class="row">
                    <h5>Ruangan</h5>
                    <div class="row">
                        <select name="kelas" class="form-control" id="kelas" required>
                            <option value="Guru">Ruang Guru</option>
                            <option value="X SIJA 1">X SIJA 1</option>
                            <option value="X SIJA 2">X SIJA 2</option>
                            <option value="X TJAT 1">X TJAT 1</option>
                            <option value="X TJAT 2">X TJAT 2</option>
                            <option value="X TJAT 3">X TJAT 3</option>
                            <option value="X TJAT 4">X TJAT 4</option>
                            <option value="X TJAT 5">X TJAT 5</option>
                            <option value="XI SIJA 1">XI SIJA 1</option>
                            <option value="XI SIJA 2">XI SIJA 2</option>
                            <option value="XI TJAT 1">XI TJAT 1</option>
                            <option value="XI TJAT 2">XI TJAT 2</option>
                            <option value="XI TJAT 3">XI TJAT 3</option>
                            <option value="XI TJAT 4">XI TJAT 4</option>
                            <option value="XI TJAT 5">XI TJAT 5</option>
                            <option value="XI TJAT 6">XI TJAT 6</option>
                            <option value="XII SIJA 1">XII SIJA 1</option>
                            <option value="XII SIJA 2">XII SIJA 2</option>
                            <option value="XII TJAT 1">XII TJAT 1</option>
                            <option value="XII TJAT 2">XII TJAT 2</option>
                            <option value="XII TJAT 3">XII TJAT 3</option>
                            <option value="XII TJAT 4">XII TJAT 4</option>
                            <option value="XII TJAT 5">XII TJAT 5</option>
                        </select>
                    </div>
                </div>
                <div class="row d-flex justify-content-start">
                    <button style="background-color: #B72024; color: white; border: none; padding: 1%; margin-top: 20px; width: 70px; border-radius: 10%;"  >Kirim</button>
                </div>
               </form>
            </div>
        </div>
    </div>
    </div>
     <script>
      function sendMessage() {
        const nama = document.getElementById("nama").value;
        const keluhan = document.getElementById("keluhan").value;
        const kelas = document.getElementById("kelas").value;

        const url =
          "https://api.whatsapp.com/send?phone=+6281212527602&text=Permisi%20kak%0ASaya%20"+nama+"%20dari%20"+kelas+"%20Keluhan%20saya%20"+keluhan+"%0A%0ATerima%20Kasih%20Kak";

        window.open(url);
      }
    </script>
</body>
</html>