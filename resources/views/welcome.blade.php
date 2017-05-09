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
        <!-- TODO: Put this as a sass file and minify -->
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
                font-weight: bold;
            }

            /* Effects */
            .opaque {
                opacity: 0;
            }

            /* Instructions two lines on mobile */
            #instructions {
                min-height: 44px;
            }
            @media only screen and (min-width : 480px) {
                #instructions{
                    min-height: 0;
                }
            }

            /* Deck */
            .deck-wrapper {
                position: relative;
                height: 175px;
                margin-bottom: 27px;
            }
            .deck {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
            }
            #deck-top {
                height: 75px;
            }
            #card {
                height: 0;
                overflow: hidden;
                min-width: 222px;
            }
            #card img {
                background-color: white;
                border-radius: 10px 10px 0 0;
                transform: rotateX(50deg);
                transform-origin: top;
            }
            .stripes {
                width: 222px;
                margin: auto;
                background: repeating-linear-gradient(
                    0deg,
                    white,
                    #333 3px
                );
            }

            /* Results card */
            #results-card {
                margin-bottom: 27px;
            }
            #results-card img {
                background-color: white;
                border-radius: 10px;
                padding: 10px;
            }

            /* Bubble sort cards */
            .mini-deck-wrapper {
                margin-bottom: 27px;
                margin-left: 80px;  /* offset stacking of cards to center */
            }
            .mini-deck-wrapper img {
                width: 111px;
                margin-left: -80px;  /* stack cards */
                background-color: white;
                border-radius: 5px;
                padding: 5px;
                border: 1px solid black;
            }
        </style>
    </head>

    <body>
        <div class="page-wrapper">
            <div class="page-wrapper-cell" id="home-cell">
                <h1>Simple Magic</h1>
                <p class="lead">A simple magic trick for a little bit of fun</p>
                <p class="lead">
                    <a href="#" class="btn btn-lg" id="start-button">Start</a>
                </p>
            </div>

            <div class="page-wrapper-cell hidden" id="trick-cell">
                <p class="lead" id="instructions">Here is a deck of cards</p>
                <div class="deck-wrapper">
                    <div class="deck">
                        <div class="stripes" id="deck-top"></div>
                        <div id="card"><img src="{{ asset('images/cards/png/red_joker.png') }}"></div>
                        <div class="stripes" id="deck-bottom"></div>
                    </div>
                </div>
                <p class="lead opaque" id="trick-buttons">
                    <a href="#" class="btn btn-lg" id="trick-button-1">Again</a>
                    <a href="#" class="btn btn-lg" id="trick-button-2">Got One</a>
                </p>
            </div>

            <div class="page-wrapper-cell hidden" id="results-cell">
                <p class="lead" id="results-text">Is this your card?</p>

                <div class="opaque" id="results-card"><img src="{{ asset('images/cards/png/'.$cards[51].'.png') }}"></div>

                <p class="lead">
                    <a href="#" class="btn btn-lg" id="results-button">Next</a>
                </p>
            </div>

            <div class="page-wrapper-cell hidden" id="bubble-sort-cell">
                <p class="lead" id="instructions">Well, if that didn't work, maybe this will impress?</p>

                <p class="lead" id="instructions">10 random cards:</p>
                <div class="mini-deck-wrapper">
                    <?php foreach ($ten_cards as $card): ?>
                        <img src="{{ asset('images/cards/png/'.$card.'.png') }}">
                    <?php endforeach; ?>
                </div>

                <p class="lead" id="instructions">10 random cards bubble sorted:</p>
                <div class="mini-deck-wrapper">
                    <?php foreach ($ten_cards_sorted as $card): ?>
                        <img src="{{ asset('images/cards/png/'.$card.'.png') }}">
                    <?php endforeach; ?>
                </div>

                <p class="lead" id="instructions">Now let's never talk about bubble sort ever again...</p>
            </div>
        </div>
    </body>

    <!-- JavaScript -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
</html>
