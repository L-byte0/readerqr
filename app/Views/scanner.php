<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url() . "/js/adapter.min.js"?>"></script>
    <script src="<?= base_url() . "/js/vue.min.js"?>"></script>
    <script src="<?= base_url() . "/js/instascan.min.js"?>"></script>
    <!--<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>-->
    
    <!--Bootstrap-->
    <link rel="stylesheet" href="<?= base_url() . "/bootstrap/css/bootstrap.min.css"?>">
    <script src="<?= base_url() . "/bootstrap/js/bootstrap.min.js"?>"></script>
    <script src="<?= base_url() . "/bootstrap/js/popper.min.js"?>"></script>

    <style>
      body{
        background: #FBD3E9;
        background: -webkit-linear-gradient(to left, #FBD3E9, #BB377D);
        background: linear-gradient(to left, #FBD3E9, #BB377D);
      }
    </style>

    <title>TESVG Semana de la Ciencia y la Tecnología</title>
  </head>

  <body>    
    <div class="container text-center">
      <div class="card d-flex">
        <div class="card-header d-flex justify-content-center flex-column align-items-center">
          <img src="<?= base_url() . "/assets/logs.jpg"?>" width=100% alt="TESVG">

          <h2 class="card-title text-center">
            Bienvenido a la IV Feria de Ciencia y Tecnología
        </h2>
        <span style="font-size: 1.3rem;">
            TESVG <strong>2022</strong>
        </span>
        </div>

    
        <div class="card-body">
          <h5 class="card-title">Escanea tu código QR aquí</h5>

          <div class="row">

            <div class="col">

              <img src="<?= base_url() . "/assets/tux.png"?>" width=38% alt="TESVG">
              <hr>
              <img src="<?= base_url() . "/assets/os.png"?>" width=38% alt="TESVG">
              <hr>
              <img src="<?= base_url() . "/assets/ia.png"?>" width=38% alt="TESVG">
              <hr>
            </div>


            <div class="col">
              <div class="card text-center" style="width: 35rem;">
              <?= form_open(); ?>

              <?= form_input(array_merge($email, ['class' => $email['class'] . ' ' . ($validation->hasError('email') ? 'is-invalid' : '')])) ?>
              <?php if ($error = $validation->getError('email')){ ?>
                <div class="alert alert-danger" role="alert">
                  <?= $error ?>
                </div>
              <?php }else{?>
                <div class="alert alert-success" role="alert">
                  Registrado exitosamente
                </div>
              <?php }?>


              <?= form_close(); ?>

              <video id="preview"></video>
              <script>
                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                Instascan.Camera.getCameras().then(function (cameras) {
                  if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                  } else {
                    alert('No cameras found.');
                  }
                }).catch(function (e) {
                    console.error(e);
                  });
                  scanner.addListener('scan', function (content) {
                    document.getElementById('email').value=content;
                    document.forms[0].submit();
                  });
              </script> 

              </div>
            </div>

            <div class="col">
              <img src="<?= base_url() . "/assets/circuito.png"?>" width=38% alt="TESVG">
              <hr>
              <img src="<?= base_url() . "/assets/placa.png"?>" width=38% alt="TESVG">
              <hr>
              <img src="<?= base_url() . "/assets/chip.png"?>" width=38% alt="TESVG">
              <hr>
            </div>

          </div>
        </div>
      </div>
    </div>

  </body>
</html>