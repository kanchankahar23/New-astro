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
        border: 1px solid rgb(193 193 196 / 43%);
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
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Sade-Sati
                            Table</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                        <a id="friendship-tab" data-toggle="tab" href="#friendshipPage" role="tab"
                            onclick="showPage('friendship', this),getFriendshipTable()" aria-controls="contact"
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Friendship
                            Table</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                        <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                            onclick="showPage('extentdedHoroscope', this),getkpHouses()" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold">Kp-Houses</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                        <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                            onclick="showPage('extentdedHoroscope', this),getkpHousesPlanet()" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Kp-Houses Planet</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                        <a id="gemSuggestion-tab" data-toggle="tab" href="#gemSuggestionPage" role="tab"
                            onclick="showPage('gemSuggestion', this),getGemSuggestion()" aria-controls="contact"
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Gem
                            Suggestion</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                        <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                            onclick="showPage('extentdedHoroscope', this),getRudrakshSuggestion()"
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
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.rasiNo')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.zodiac')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.retro')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.name')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.house')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.globalDegree')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.localDegree')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.rasiNo')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.pseudoRasi')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.rasiLord')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.pseudoNakshatra')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.nakshatraNo')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.nakshatraPada')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.nakshatraLord')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.subLord')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.subSubLord')</th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.fullName')</th>
                                    </tr>
                            </thead>
                            <tbody class='colchange onlySadeSati'>
                                @if (isset($response['response']))
                                    @foreach ($response['response'] as $planetData)
                                        <tr>
                                            <td class='sanisadisati'>{{ isset($planetData['rasi_no']) ? $planetData['rasi_no'] : 'NA' }}</td>
                                            <td>{{ isset($planetData['zodiac']) ? $planetData['zodiac'] : 'NA' }}</td>
                                            <td class='sanisadisati'>{{ isset($planetData['retro']) ? ($planetData['retro'] ? 'Yes' : 'No') : 'NA' }}
                                            </td>
                                            <td>{{ isset($planetData['name']) ? $planetData['name'] : 'NA' }}</td>
                                            <td class='sanisadisati'>{{ isset($planetData['house']) ? $planetData['house'] : 'NA' }}</td>
                                            <td>{{ isset($planetData['global_degree']) ? $planetData['global_degree'] : 'NA' }}
                                            </td>
                                            <td class='sanisadisati'>{{ isset($planetData['local_degree']) ? $planetData['local_degree'] : 'NA' }}
                                            </td>
                                            <td>{{ isset($planetData['pseudo_rasi_no']) ? $planetData['pseudo_rasi_no'] : 'NA' }}
                                            </td>
                                            <td class='sanisadisati'>{{ isset($planetData['pseudo_rasi']) ? $planetData['pseudo_rasi'] : 'NA' }}
                                            </td>
                                            <td>{{ isset($planetData['pseudo_rasi_lord']) ? $planetData['pseudo_rasi_lord'] : 'NA' }}
                                            </td>
                                            <td class='sanisadisati'>{{ isset($planetData['pseudo_nakshatra']) ? $planetData['pseudo_nakshatra'] : 'NA' }}
                                            </td>
                                            <td>{{ isset($planetData['pseudo_nakshatra_no']) ? $planetData['pseudo_nakshatra_no'] : 'NA' }}
                                            </td>
                                            <td class='sanisadisati'>{{ isset($planetData['pseudo_nakshatra_pada']) ? $planetData['pseudo_nakshatra_pada'] : 'NA' }}
                                            </td>
                                            <td>{{ isset($planetData['pseudo_nakshatra_lord']) ? $planetData['pseudo_nakshatra_lord'] : 'NA' }}
                                            </td>
                                            <td class='sanisadisati'>{{ isset($planetData['sub_lord']) ? $planetData['sub_lord'] : 'NA' }}
                                            </td>
                                            <td>{{ isset($planetData['sub_sub_lord']) ? $planetData['sub_sub_lord'] : 'NA' }}
                                            </td>
                                            <td class='sanisadisati'>{{ isset($planetData['full_name']) ? $planetData['full_name'] : 'NA' }}
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
