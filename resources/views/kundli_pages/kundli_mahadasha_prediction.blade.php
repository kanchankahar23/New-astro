    <style>
        .ariesdescription {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-right: 0 !important;
            margin: 0 auto;
        }
    </style>

    <div class="p-2 appform">
        <div class="innerforms forMobile">
            
            <div class="tableliner" style="width:100%;">
                <div class="tab-betail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                                onclick="showPage('dasha', this),getDashaChart()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Mahadasha</a>

                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                                 aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Antardasha</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                                aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Pratyantar Dasha</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                                onclick="showPage('dasha', this),getMahadashaPrediction()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Mahadasha Prediction</a>
                        </li>

                    </ul>
                </div>
                <br>
                <h5 class="birth mahaPridiction" style="font-size: 17px;">Mahadasha Prediction
                    <hr class="kundlitag" style=" width: 203px;color:#fbe216 !important">
                </h5>
                <div class="rashidescripton">
                    <div class="imgpara">
                        <div class="ariesdescription">
                            <div class="card" style="padding: 20px;">
                  @foreach ($response['dashas'] as $dasha)
                   @if(is_array($dasha))
                                        @php
                                        $colors1 = ['#7FFFD4', '#00FFFF', '#FF7F50', '#9fef9c', '#88a1dd', '#6a4e9c',
                                        '#d2bd54', '#53a7a6', '#FF7F50'];
                                        $randomColor = $colors1[array_rand($colors1)];
                                        @endphp
                                <div class="progress-card squareBox" style="--color-accent: {{ $randomColor }}">
                                    <div class="progress-card-content" style="padding: 15px;">
                                         <div
                                        style="display: flex;justify-content:space-between;margin-top: 5px;">
                                        <h6 class="progress-title upheading">@lang('messages.dasha') : {{ $dasha['dasha'] }}</h6>
                                        <div style="display: flex;justify-content:space-between; rightport">
                                            <h6 class="progress-title upheading2"><strong>@lang('messages.startDate') :</strong> {{ $dasha['dasha_start_year'] }} &nbsp;-&nbsp;
                                        </h6>
                                        <h6 class="progress-title upheading2"><strong>@lang('messages.endDate') :</strong> {{ $dasha['dasha_end_year'] }}
                                        </h6>
                                        </div>
                                    </div>
                                    <br>
                                        <span class="progress-description">{{ $dasha['prediction'] }}
                                        </span>
                                    </div>
                                    <span class="progress-bar" style="--value:100%;"></span>
                                </div>
                                @endif
                   @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
