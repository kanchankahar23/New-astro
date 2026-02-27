    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }

        .tableliner table td {
            border: 1px solid #d3d3d5 !important;
            padding: 10px 36px;
            text-align: center;
            padding-left: 31px;
            color: #101010;
            font-weight: 400;
            background: white;
            vertical-align: middle;
            font-family: "Poppins", sans-serif;
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
        <div class="innerforms forMobile">
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
                                class="border-0 nav-link text-uppercase font-weight-bold">Friendship Table</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getkpHouses()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Kp-Houses</a>
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
                <h5 class="birth mahaPridiction" style="font-size: 17px;">KP Houses
                    <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
                </h5>
                <br>
                <div class="rashidescripton" style="margin: unset;">
                    <div class="imgpara" style="display: block;">
                        <div class="table-wrap scrollbar DecSpace" style="  overflow: auto;cursor: grab;">
                            <table class="table spaceTable">
                                <thead class='SaniSadeSati trippleColor'>
                                        <tr>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.house')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.startRasi')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.endRasi')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.endRasiLord')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.localStartDegree')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.localEndDegree')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.length')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.bhavMadhya')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.globalStartDegree')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.globalEndDegree')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.startNakshatra')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.endNakshatra') </th>
                                            <th style="color: #3c3b3b;border: #dee2e6;"> @lang('messages.startNakshatraLord')</th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.endNakshatraLord') </th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.planet') </th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.cuspSubLord') </th>
                                            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.cuspSubSubLord') </th>
                                        </tr>

                                </thead>
                                <tbody class='colchange onlySadeSati'>
                                    @if (isset($response['response']))
                                        @foreach ($response['response'] as $rasiData)
                                            <tr>
                                                <td class='sanisadisati'>{{ $rasiData['house'] }}</td>
                                                <td class='evenTable'>{{ $rasiData['start_rasi'] }}</td>
                                                <td class='sanisadisati'>{{ $rasiData['end_rasi'] }}</td>
                                                <td class='evenTable'>{{ $rasiData['end_rasi_lord'] }}</td>
                                                <td class='sanisadisati'>{{ $rasiData['local_start_degree'] }}</td>
                                                <td class='evenTable'>{{ $rasiData['local_end_degree'] }}</td>
                                                <td class='sanisadisati'>{{ $rasiData['length'] }}</td>
                                                <td class='evenTable'>{{ $rasiData['bhavmadhya'] }}</td>
                                                <td class='sanisadisati' style="padding: 46px;">{{ $rasiData['global_start_degree'] }}</td>
                                                <td class='evenTable' style="padding: 46px;">{{ $rasiData['global_end_degree'] }}</td>
                                                <td class='sanisadisati'>{{ $rasiData['start_nakshatra'] }}</td>
                                                <td class='evenTable'>{{ $rasiData['end_nakshatra'] }}</td>
                                                <td class='sanisadisati' style="padding: 62px;">{{ $rasiData['start_nakshatra_lord'] }}
                                                </td>
                                                <td class='sanisadisati' style="padding: 53px;">{{ $rasiData['end_nakshatra_lord'] }}</td>
                                                <td class='evenTable'>
                                                    @if (!empty($rasiData['planets']))
                                                        @foreach ($rasiData['planets'] as $planet)
                                                            {{ $planet['full_name'] }} ({{ $planet['name'] }}),
                                                        @endforeach
                                                    @else
                                                        NA
                                                    @endif
                                                </td>
                                                <td class='sanisadisati' style="padding: 46px;">{{ $rasiData['cusp_sub_lord'] ?? 'NA' }}
                                                </td>
                                                <td class='evenTable' style="padding: 52px;">
                                                    {{ $rasiData['cusp_sub_sub_lord'] ?? 'NA' }}</td>
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
