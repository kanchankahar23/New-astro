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
        margin-top: 11px !important;
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
        border: 1px solid rgba(0, 0, 0, 0.425);
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

    .kundlitag {
        color: #fbe216 !important;
        ;
    }

    .kundlidetailsfirst {
        float: left;
        width: 100%;
        position: relative;
        background-color: #111111;
        z-index: 1;
        background-image: url('https://hips.hearstapps.com/hmg-prod/images/solar-system-royalty-free-image-1649969440.jpg?crop=1xw:0.75xh;center,top&resize=1200:*');
        background-size: cover;
        margin-bottom: 70px;
    }

    .appointment {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 18px 0;
    }

    .tableliner {
        width: 90%;
        margin: 40px auto;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 20px;
    }
</style>
<style>
    .progress {
        height: 30px;
        margin-top: 20px;
    }

    .progress-bar {
        font-size: 0.8rem;
        font-weight: 600;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .bg-success {
        background-color: #ffc107 !important;
    }

    .scrollbar::-webkit-scrollbar {
        {{--  display: ;  --}}
    }

    .scrollbar::-webkit-scrollbar {
        width: 5px;
        height: 8px;
        border-radius: 5px;
        background-color: #aaa;
        /* or add it to the track */
    }

    /* Add a thumb */
    .scrollbar::-webkit-scrollbar-thumb {
        width: 3px;
        background: #fbe216;
        border-radius: 5px;

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
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Gem
                            Suggestion</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                        <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                            onclick="showPage('extentdedHoroscope', this),getRudrakshSuggestion()"
                            aria-controls="contact" aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Rudraksh
                            Suggestion</a>
                    </li>

                </ul>
            </div>
            <br>
            <h5 class="birth mahaPridiction" style="font-size: 17px;">Gem Suggestion
                <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
            </h5>
            <br>

            <div class="rashidescripton" style="margin: unset;">
                <div class="imgpara" style="display: block;">
                    <div class="progress-card" style="--color-accent: #d2bd54;">
                        <div class="progress-card-content" style="padding: 15px;">
                            <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                                <h6 class="progress-title lasttitle">

                                    @lang('messages.mukhiForDiseaseCure') :
                                    {{ !empty($response['response']['mukhi_for_disease_cure']) ? implode(', ', $response['response']['mukhi_for_disease_cure']) : 'NA' }}

                                </h6>

                                <h6 class="progress-title lasttitle">

                                    @lang('messages.mukhiForMoney')
                                    :
                                    {{ !empty($response['response']['mukhi_for_money']) ? implode(', ', $response['response']['mukhi_for_money']) : 'NA' }}

                                </h6>

                            </div>
                            <br>
                            <span class="progress-description lastdescription">
                                {{ $response['response']['mukhi_description'] ?? 'NA' }}
                                <br>
                                {{ $response['response']['bot_response'] ?? 'NA' }}
                            </span>
                        </div>
                        <span class="progress-bar" style="--value:100%;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>