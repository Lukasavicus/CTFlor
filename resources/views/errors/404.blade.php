<!DOCTYPE html>
<html>
    <head>
        <title>Unathorized 404</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            .sub-title {
                font-size: 32px;
                margin-bottom: 40px;
            }

            .link
            {
                color: #5C2BC4;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa p&aacute;gina.</div>
                <div class="sub-title">Voc&ecirc; deve estar logado.</div>
                <div class="sub-title">Por favor acesse: <a class="link" href="{{ route('site.login') }}">Log In</a> </div>
            </div>
        </div>
    </body>
</html>