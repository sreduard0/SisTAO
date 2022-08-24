<?php
$senha =  date('dmYHis'). md5(date('dmYHis'). $_POST['senha']);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiCaPEx</title>
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
            width: 800px;
            height: 180px;
            text-align: center;

        }

        .c-loader {
            margin: 20px;
            margin-left: 350px;
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
    <script src="/js/jquery-3.2.1.min.js"></script>
</head>
<body style="background-color: #454d55;">

 <div id='loading'>
<div class="load-block">
            <p style="font-size:72px;"><strong style="line-height: 1.5;">SisTAO </strong>- SiCaPEx </p>

<div class="c-loader">
</div>
    <span>Aguarde um momento.</span>

</div>
</div>

	<form action="https://sicapex.eb.mil.br/sicapex/login.seam"  method="post"  id="login">
		<input type="hidden" name="login:usuario" value="<?php echo  $_POST['usuario'] ?>" />
		<input type="hidden" name="login:senha-cripto" value="<?php echo  $senha ?>" />
        <input type="hidden" name="login:senha" value="" />
        <input type="hidden" name="login" value="login" />
        <input type="hidden" name="login:Entrar" value="Entrar" />
	   <input type="hidden" name="javax.faces.ViewState" value="j_id1" />
       
	</form>
	<script>
         $(function() {
              $('#login').submit();
         })
    </script>
</body>

</html>

