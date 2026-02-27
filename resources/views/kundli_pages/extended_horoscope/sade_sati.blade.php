    <style>
body{
    font-family: "Noto Sans", sans-serif;
}
        .active-tab {
            background-color: #f0f0f0;
            /* Example active tab background color */
        }
    </style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        #astrologom {
            animation: spin 9s infinite linear;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .ast_slider_wrapper {
            float: left;
            width: 100%;
            position: relative;
            background-color: #111111;
            z-index: 1;
            background-image: url("{{ asset('website/assets/Zodiac/contact.jpg') }}");
            background-size: cover;
        }

        .appointment {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 18px 0;
        }

        tr{
            color: #000 !impo;
        }

        .hidden {
            display: none;
        }

        .same {
            display: flex;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.2;
            }

            100% {
                opacity: 1;
            }
        }

        .as-sign-box {
            width: 150px;
            padding: 12px 20px 20px;
            margin-left: 25px
        }

        .as-sign-box h5 {
            font-size: 15px;
            white-space: nowrap;
        }

        .blink {
            animation: blink 1s infinite;
        }

        .col-2 {
            flex: 0 0 auto;
            width: 94%;
        }
.topTableBox  {
        border: 1px solid #e4e4e6 !important;
}
    </style>

    <style>
        .progress-card {
            --color-accent: #333;
            --color-border: #e4e4e4;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 1em;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--color-border);
            border-bottom: 0;
        }

        .progress-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--color-accent);
            opacity: 0.05;
        }

        .progress-card.orange {
            --color-accent: #ffc48b;
        }

        .progress-card.purple {
            --color-accent: #b4b3ff;
        }

        .progress-card.pink {
            --color-accent: #ffb3c0;
        }

        .progress-card-content {
            padding: 0.7em;
        }

        .progress-card .progress-bar {
            background-color: var(--color-border);
            display: block;
            width: 100%;
            height: 5px;
            position: relative;
        }

        .progress-card .progress-bar::before {
            content: '';
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            height: 5px;
            background-color: var(--color-accent);
            opacity: 0.15;
        }

        .progress-card .progress-bar::after {
            content: '';
            width: var(--value);
            position: absolute;
            left: 0;
            top: 0;
            height: 5px;
            background-color: var(--color-accent);
        }

        .progress-title {
            font-weight: 600;
            margin-bottom: 0.25em;

                {
                    {
                    -- opacity: 0.9;
                    --
                }
            }
        }

        .progress-description {
            font-size: 0.9rem;
            font-weight: 400;

                {
                    {
                    -- opacity: 0.85;
                    --
                }
            }

            color: black;
        }

        .progress-card span {
            display: block;
        }

        th{
            color: #000 !important;
        }



        .as-sign-box {

            margin-bottom: 15px;
            margin-top: 0px;
        }

        .ast_slider_wrapper {
            margin-bottom: 45px;
        }

        .ariesdescription {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-right: 0 !important;
            margin: 0 auto;
        }
    </style>
    <div class="p-2 appform">

        <div class="innerforms">
            <div class="tableliner" style="width:100%;">
                <div class="tab-betail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="sadeSati-tab" data-toggle="tab" href="#sadeSatiPage" role="tab"
                                onclick="showPage('sadeSati', this),getSadheShati()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase  clickedpage">SadeSati</a>

                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="sadeSati-tab" data-toggle="tab" href="#sadeSatiPage" role="tab"
                                onclick="showPage('sadeSati', this),getSadheShatiTable()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase ">Sade-Sati Table</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="friendship-tab" data-toggle="tab" href="#friendshipPage" role="tab"
                                onclick="showPage('friendship', this),getFriendshipTable()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase ">Friendship Table</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getkpHouses()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase ">Kp-Houses</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getkpHousesPlanet()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Kp-Houses Planet</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="gemSuggestion-tab" data-toggle="tab" href="#gemSuggestionPage" role="tab"
                                onclick="showPage('gemSuggestion', this),getGemSuggestion()" aria-controls="contact"
                                aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Gem
                                Suggestion</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getRudrakshSuggestion()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Rudraksh Suggestion</a>
                        </li>

                    </ul>
                </div>
                <br>
                <h5 class="birth mahaPridiction" style="font-size: 17px;">Current Sade Sati
                    <hr class="kundlitag current" style=" width: 203px;color:#fbe216 !important">
                </h5><br>
                <div class="scrollbar headOfTable" style="    max-height: 649px;overflow-y: hidden;">
                    <table class="table table-striped perSonalTable">
                        <thead>
                                <tr>
                                    <th>@lang('messages.dateConsidered')</th>
                                    <th>@lang('messages.saturnRetrograde')</th>
                                    <th>@lang('messages.age')</th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class='nontable topTableBox'> {{ $sadeSati['date_considered'] }}</td>
                                <td class='nontable topTableBox'> {{ $sadeSati['saturn_retrograde'] }}</td>
                                <td class='nontable topTableBox'> {{ $sadeSati['age'] }}</td>
                            </tr>

                        </tbody>

                    </table>
                </div>
                <div class="rashidescripton" style="margin: unset;">
                    <div class="imgpara">
                        <div class="ariesdescription">
                            <div class="card" style="padding: 20px;">
                                <div class="progress-card squareBox" style="--color-accent: #7FFFD4;">
                                    <div class="progress-card-content" style="padding: 15px;">
                                        <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                                                <h6 class="progress-title">@lang('messages.response')</h6>

                                        </div>
                                        <br>
                                        <span class="progress-description">
                                            {{ $sadeSati['bot_response'] }}
                                        </span>
                                    </div>
                                    <span class="progress-bar" style="--value:100%;"></span>
                                </div>
                                <div class="progress-card squareBox" style="--color-accent: #d2bd54;">
                                    <div class="progress-card-content" style="padding: 15px;">
                                        <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                                                <h6 class="progress-title">@lang('messages.description')</h6>
                                        </div>
                                        <br>
                                        <span class="progress-description">
                                            {{ $sadeSati['description'] }}
                                        </span>
                                    </div>
                                    <span class="progress-bar" style="--value:100%;"></span>
                                </div>
                                <div class="progress-card squareBox" style="--color-accent: #9fef9c;">
                                    <div class="progress-card-content" style="padding: 15px;">
                                        <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                                                <h6 class="progress-title">@lang('messages.remedies')</h6>
                                        </div>
                                        <br>
                                        <span class="progress-description">
                                            <ol>
                                                @foreach ($sadeSati['remedies'] as $index => $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ol>

                                        </span>
                                    </div>
                                    <span class="progress-bar" style="--value:100%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
