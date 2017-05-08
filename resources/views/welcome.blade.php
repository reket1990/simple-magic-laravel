<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Magic</title>

        <!-- Bootstrap -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            /* Base Formatting */
            html,
            body {
                height: 100%;
                background-color: #333;
            }
            body {
                color: #fff;
                text-align: center;
            }

            .page-wrapper {
                display: table;
                width: 100%;
                height: 100%;
                min-height: 100%;
                -webkit-box-shadow: inset 0 0 5rem rgba(0, 0, 0, 1);
                box-shadow: inset 0 0 5rem rgba(0, 0, 0, 1);
            }
            .page-wrapper-cell {
                display: table-cell;
                vertical-align: middle;
                padding: 20px;
            }

            /* Button */
            .btn-lg,
            .btn-lg:hover,
            .btn-lg:focus {
                color: #333;
                text-shadow: none;
                background-color: #fff;
                padding: .75rem 1.25rem;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <div class="page-wrapper">
            <div class="page-wrapper-cell">
                <h1>Simple Magic</h1>
                <p class="lead">A simple magic trick for a little bit of fun</p>
                <p class="lead">
                    <a href="#" class="btn btn-lg">Start</a>
                </p>
            </div>
        </div>
    </body>
</html>
