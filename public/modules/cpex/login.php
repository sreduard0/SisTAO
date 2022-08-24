<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPEx - Contracheque</title>
	  
    <script src="/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/css/adminlte.css">
    <!-- <link rel="stylesheet" href="/css/util.css">  -->
    <style>
        /* LOADER*/

        #loading {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: block;
        }

        .load-block {
        	color:#fff;
            width: 500px;
            height: 180px;
            text-align: center;

        }

        .c-loader {
            margin: 20px;
            margin-left: 210px;
            animation: is-rotating 1s infinite;
            border: 6px solid #e5e5e5;
            border-radius: 50%;
            border-top-color: #00664d;
            height: 80px;
            width: 80px;
        }

        @keyframes is-rotating {
            to {
                transform: rotate(1turn);
            }
        }


        /* LOADER */
    </style>
</head>
<body class="dark-mode " style="background-color: #454d55;">
<div id='loading'>
    <div class="load-block">
        <p style="font-size:72px;"><strong style="line-height: 1.5;">SisTAO </strong>- CPEX </p>
        <div class="c-loader">
        </div>
        
        <img src="https://contrachequecpex.eb.mil.br/area_individual/adm/captcha.asp" width="300" height="80" alt="Carrengando imagem...">
        <form action="https://contrachequecpex.eb.mil.br/area_individual/Login_Valida_captcha.asp"  method="post"  id="login">
            <input type="hidden" id="CPF_USUARIO" name="CPF_USUARIO" value="<?php echo $_POST['usuario']?>" />
            <input type="hidden" id="SENHA_USUARIO" name="SENHA_USUARIO" value="<?php echo $_POST['senha']?>" />
            <div class="form-group col">
                <label for="captchacode">Verificação</label>
                <input type="text" class="form-control" id="captchacode" name="captchacode"
                                placeholder="Digite as letras da imagem" value="">
            </div>
            <button class="btn btn-success" onclick="return login()">OK</button>
        </form>
    </div>
</div>


	<script>
         function login(){
            $('#login').submit();
         }
             
    </script>
</body>

</html>


