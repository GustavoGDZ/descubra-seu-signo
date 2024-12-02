<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descubra seu signo</title>
 
    <link rel="icon" href="./assets/imgs/icone.jpeg" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('layouts/header.php'); ?>

    <link rel="stylesheet" href="./assets/css/style.css">

    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h3 class="form-weight-bold">Descubra seu signo:</h3>
                <hr class="mx-auto">
            </div>

            <div class="mx-auto container">
                <p style="color:red" class="text-center">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    } ?>
                </p>
                <div class="form-group">
                    <label>Digite uma data de nascimento</label>
                    <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento" placeholder="Ex.: 21/05/1992" required />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="signo-btn" name="signo_btn" value="Descobrir" />
                </div>
            </div>
        </section>
    </form>
</body>
</html>