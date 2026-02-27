    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }
        .tableliner table td {
            border: 1px solid #d3d3d5 !important;
            padding: 10px 10px;
            text-align: center;
            padding-left: 31px;
            color: #101010;
            font-weight: 400;
            background: white;
            font-family: "Noto Sans", sans-serif;
        }

        .tableliner table {
            margin-top: 0 !important;
        }

        :root {
            --font-fam: "Satoshi", sans-serif;
            --text-color: #212529;
            --bar-color: #36f31d;
            --transition-effect: all 90ms linear;
        }



        .load {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            padding: 8px;
            border-radius: 10px;

        }

        #loader {

            z-index: 999;
            height: 40px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 10%;
            position: relative;

        }

        .wrap {
            margin: 500px;
        }

        #text {
            font-family: var(--font-fam);
            color: var(--text-color);
            font-size: 20px;
            padding: 0 10px;

            font-weight: 500;
        }

        #percent {
            border: 1px solid black;
            font-family: var(--font-fam);
            color: var(--text-color);
            transition: var(--transition-effect);
            font-size: 16px;
            padding: 0 10px;
            font-weight: 500;
        }

        #bar {
            position: absolute;
            height: 40px;
            width: 100%;
            z-index: -1;
            border-top: 4px solid var(--bar-color);
            transform-origin: left;
            transform: scalex(0%);
            transition: var(--transition-effect);
        }

        #help {
            font-family: var(--font-fam);
            color: var(--text-color);
            font-size: 20px;
            position: absolute;
            top: 20px;
            font-weight: 600;
        }

        .table-wrap {
            margin: 10px;
            /* border: 1px solid rgba(0, 0, 0, 0.425); */
            border-radius: 10px;
        }



        th {
            text-align: inherit;
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .table {
            width: 100%;
            color: #212529;
        }

        .custom-list {
            list-style-type: disc;
            margin-left: 20px;
            margin-top: 10px;
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
                                class="border-0 nav-link text-uppercase font-weight-bold ">SadeSati</a>

                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="sadeSati-tab" data-toggle="tab" href="#sadeSatiPage" role="tab"
                                onclick="showPage('sadeSati', this),getSadheShatiTable()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Sade-Sati Table</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="friendship-tab" data-toggle="tab" href="#friendshipPage" role="tab"
                                onclick="showPage('friendship', this),getFriendshipTable()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Friendship
                                Table</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getkpHouses()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Kp-Houses</a>
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
                <h5 class="birth mahaPridiction" style="font-size: 17px;">Permanent Friendship
                    <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
                </h5>
                <br>
                <div class="rashidescripton" style="margin: unset;">
                    <div class="imgpara" style="display: block;">
                        <div class="table-wrap DecSpace" style="overflow: auto;">
                            <table class="table spaceTable">
                                <thead class='SaniSadeSati trippleColor'>
                                        <tr>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.planet')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.friends')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.neutral')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.enemies')</th>
                                        </tr>
                                </thead>
                                <tbody class='colchange onlySadeSati'>
                                    @if (isset($response['response']['permanent_table']))
                                        @foreach ($response['response']['permanent_table'] as $planet => $friendship)
                                            <tr>
                                                <td class='sanisadisati'>
                                                    {{ $planet }}
                                                </td>
                                                <td class='evenTable'>
                                                    {{ isset($friendship['Friends']) ? implode(', ', $friendship['Friends']) : 'NA' }}
                                                </td>
                                                <td class='sanisadisati'>
                                                    {{ isset($friendship['Neutral']) ? implode(', ', $friendship['Neutral']) : 'NA' }}

                                                </td>
                                                <td class='evenTable'>
                                                    {{ isset($friendship['Enemies']) ? implode(', ', $friendship['Enemies']) : 'NA' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h5 class="birth mahaPridiction" style="font-size: 17px;">Temporary Friendship
                            <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
                        </h5>
                        <br>
                        <div class="table-wrap DecSpace" style="overflow: auto;">
                            <table class="table  spaceTable ">
                                <thead class='SaniSadeSati trippleColor'>
                                        <tr>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.planet')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.friends')</th>
                                            <th style="color: #0b0606;border: #dee2e6;">@lang('messages.enemies')</th>
                                        </tr>
                                </thead>
                                <tbody class='colchange onlySadeSati'>
                                    @if (isset($response['response']['temporary_friendship']))
                                        @foreach ($response['response']['temporary_friendship'] as $planet => $friendship)
                                            <tr>
                                                <td class='sanisadisati'> 
                                                    {{ $planet }}
                                                </td>
                                                <td class='evenTable'>
                                                    {{ implode(', ', $friendship['Friends']) ?? '' }}
                                                </td>

                                                <td class='sanisadisati' >
                                                    {{ implode(', ', $friendship['Enemies']) ?? '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h5 class="birth mahaPridiction" style="font-size: 17px;">Five-fold Friendship
                            <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
                        </h5>
                        <br>
                        <div class="table-wrap DecSpace" style="overflow: auto;">
                            <table class="table spaceTable">
                                <thead class='SaniSadeSati trippleColor'>
                                        <tr>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.planet')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.intimateFriends')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.friends')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.neutral')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.bitterEnemies')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.enemies')</th>
                                        </tr>
                                </thead>
                                <tbody class='colchange onlySadeSati'>
                                    @if (isset($response['response']['five_fold_friendship']))
                                        @foreach ($response['response']['five_fold_friendship'] as $planet => $friendship)
                                            <tr>
                                                <td class='sanisadisati'>
                                                    {{ $planet }}
                                                </td>
                                                <td class='evenTable'>
                                                    {{ implode(', ', $friendship['IntimateFriend']) ?? '' }}
                                                </td>
                                                <td class='sanisadisati'>
                                                    {{ implode(', ', $friendship['Friends']) ?? '' }}
                                                </td>
                                                <td class='evenTable'>
                                                    {{ implode(', ', $friendship['Neutral']) ?? '' }}
                                                </td>
                                                <td class='sanisadisati'>
                                                    {{ implode(', ', $friendship['BitterEnemy']) ?? '' }}
                                                </td>
                                                <td class='evenTable'>
                                                    {{ implode(', ', $friendship['Enemies']) ?? '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
