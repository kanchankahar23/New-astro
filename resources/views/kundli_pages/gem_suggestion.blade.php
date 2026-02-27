<style>

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
        font-family: "Noto Sans", sans-serif;
    }

    .tableliner table {
        margin-top: 0;
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
        border: 1px solid rgba(255, 255, 255, 0.425);
        border-radius: 10px;
    }



    th {
        text-align: inherit;
        color: #000 !important;
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
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Kp-Houses
                            Planet</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                        <a id="gemSuggestion-tab" data-toggle="tab" href="#gemSuggestionPage" role="tab"
                            onclick="showPage('gemSuggestion', this),getGemSuggestion()" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Gem Suggestion</a>
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
            <h5 class="birth mahaPridiction" style="font-size: 17px;">Gem Suggestion
                <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
            </h5>
            <br>
            <div class="rashidescripton" style="margin: unset;">
                <div class="imgpara" style="display: flex;justify-content: space-between;">

                    <div class="table-wrap headOfTable">
                        <table class="table table-striped perSonalTable">
                            <thead>
                                <tr>
                                    <th>
                                        @lang('messages.Attribute')
                                    </th>
                                    <th>
                                        @lang('messages.Result')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (isset($response['response']))

                                        <tr class='extraColYellow'>
                                            <td class='nontable'>@lang('messages.name')</td>
                                            <td class='nontable'>{{ $response['response']['name'] ?? 'NA' }}</td>
                                        </tr>
                                        <tr >
                                            <td class='nontable'>@lang('messages.Gem')</td>
                                            <td class='nontable'>{{ $response['response']['gem'] ?? 'NA' }}</td>
                                        </tr>
                                        <tr class='extraColYellow'>
                                            <td class='nontable'>@lang('messages.planet')</td>
                                            <td class='nontable'>{{ $response['response']['planet'] ?? 'NA' }}</td>
                                        </tr>
                                        <tr >
                                            <td class='nontable'>@lang('messages.otherName')</td>
                                            <td class='nontable'>{{ $response['response']['other_name'] ?? 'NA' }}</td>
                                        </tr>
                                        <tr class='extraColYellow'>
                                            <td class='nontable'>@lang('messages.finger')</td>
                                            <td class='nontable'>{{ $response['response']['finger'] ?? 'NA' }}</td>
                                        </tr>
                                        <tr >
                                            <td class='nontable'>@lang('messages.weight')</td>
                                            <td class='nontable'>{{ $response['response']['weight'] ?? 'NA' }}</td>
                                        </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="table-wrap headOfTable">
                        <table class="table table-striped perSonalTable">
                            <thead>
                                <tr>
                                    <th>
                                        @lang('messages.Attribute')
                                    </th>
                                    <th>
                                        @lang('messages.Result')
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($response['response']))
                                        <tr class='extraColYellow'>
                                            <td class='nontable'>@lang('messages.day')</td>
                                            <td class='nontable'>{{ $response['response']['day'] ?? 'NA' }}</td>
                                        </tr>
                                        <tr>
                                            <td class='nontable'>@lang('messages.metal')</td>
                                            <td class='nontable'>{{ $response['response']['metal'] ?? 'NA' }}</td>
                                        </tr>
                                        <tr class='extraColYellow'>
                                            <td class='nontable'>@lang('messages.substitute')</td>
                                            <td class='nontable'>{{ !empty($response['response']['substitute']) ? implode(', ', $response['response']['substitute']) : 'NA' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='nontable'>@lang('messages.notToWear')</td>
                                            <td class='nontable'>{{ !empty($response['response']['not_to_wear_with']) ? implode(', ', $response['response']['not_to_wear_with']) : 'NA' }}
                                            </td>
                                        </tr>
                                        <tr class='extraColYellow'>
                                            <td class='nontable'>@lang('messages.goodResults')</td>
                                            <td class='nontable'>{{ !empty($response['response']['good_results']) ? implode(', ', $response['response']['good_results']) : 'NA' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='nontable'>@lang('messages.canCureDiseases')</td>
                                            <td class='nontable'>{{ !empty($response['response']['diseases_cure']) ? implode(', ', $response['response']['diseases_cure']) : 'NA' }}
                                            </td>
                                        </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="progress-card squareBox" style="--color-accent: #7FFFD4;">
                    <div class="progress-card-content" style="padding: 15px;">
                        <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                            <h6 class="progress-title">
                                @lang('messages.method')
                            </h6>

                        </div>
                        <br>
                        <span class="progress-description">
                            {{ $response['response']['methods'] ?? 'NA' }}
                        </span>
                    </div>
                    <span class="progress-bar" style="--value:100%;"></span>
                </div>
                <div class="progress-card squareBox" style="--color-accent: #d2bd54;">
                    <div class="progress-card-content" style="padding: 15px;">
                        <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                            <h6 class="progress-title">
                               @lang('messages.description')
                            </h6>
                        </div>
                        <br>
                        <span class="progress-description">
                            {{ $response['response']['description'] ?? 'NA' }}
                        </span>
                    </div>
                    <span class="progress-bar" style="--value:100%;"></span>
                </div>
                <div class="progress-card squareBox" style="--color-accent: #d2bd54;">
                    <div class="progress-card-content" style="padding: 15px;">
                        <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                            <h6 class="progress-title">
                                @lang('messages.timeToWear')
                            </h6>

                            <h6 class="progress-title">
                                @lang('messages.timeToWearShort')
                                {{ $response['response']['time_to_wear_short'] ?? 'NA' }}
                            </h6>

                        </div>
                        <br>
                        <span class="progress-description">
                            {{ $response['response']['time_to_wear'] ?? 'NA' }}
                        </span>
                    </div>
                    <span class="progress-bar" style="--value:100%;"></span>
                </div>
                <h3>Flaw Results
                    <hr class="kundlitag ResultTag"
                        style=" width: 160px;color:#fbe216 !important;position: relative; left: 42%;">
                </h3>
                <table class="table table-striped perSonalTable lastForTable">
                    <thead>
                        <tr>
                            <th>Flaw Type</th>
                            <th>Flaw Effects</th>
                        </tr>
                    </thead>
                    <tbody class='extraColYellow33'>
                        @foreach ($response['response']['flaw_results'] as $flaw)
                            <tr>
                                <td >{{ $flaw['flaw_type'] ?? 'NA' }}</td>
                                <td>{{ $flaw['flaw_effects'] ?? 'NA' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
