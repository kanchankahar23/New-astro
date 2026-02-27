<div style="font-family: 'Noto Sans', sans-serif; " class="p-2 appform">
    <div class="innerforms">
        <div class="tableliner" style="width:100%;">
            <div class="tab-betail">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    {{--  <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                        onclick="showPage('dasha', this),getDashaChart()" aria-controls="contact" aria-selected="false"
                        class="border-0 nav-link text-uppercase font-weight-bold">Mahadasha</a>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                        onclick="showPage('dasha', this),getAntardasha()" aria-controls="contact" aria-selected="false"
                        class="border-0 nav-link text-uppercase font-weight-bold">Antardasha</a>
                    </li>  --}}
                    <li class="nav-item mb-2 newPTdasha" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                            onclick="showPage('dasha', this),getParyantardasha()" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Pratyantar Dasha</a>
                    </li>
                    {{--  <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                        onclick="showPage('dasha', this),getMahadashaPrediction()" aria-controls="contact" aria-selected="false"
                        class="border-0 nav-link text-uppercase font-weight-bold">Mahadasha Prediction</a>
                    </li>  --}}

                </ul>
            </div>
            <br>
            <h5 class="birth" style="font-size: 17px;margin-bottom: 20px;">ParyantarDasha
                <hr class="kundlitag" style=" width: 135px;color:#fbe216 !important">
            </h5>
            <div class="row">
                @php
                    $dataType = request()->get('dashaType', 'default_value');
                @endphp
                    @if (isset($response['paryantardasha']) &&
                        is_array($response['paryantardasha']) &&
                        isset($response['paryantardasha_order']) &&
                        is_array($response['paryantardasha_order']) &&
                        !empty($response['paryantardasha']) &&
                        !empty($response['paryantardasha_order']))
                    @php
                        $firstParyantardasha = $response['paryantardasha'][$planetType][$dashaType];
                        $firstParyantardashaOrder = $response['paryantardasha_order'][$planetType][$dashaType + 1];
                    @endphp
                    <table class="table table-striped pratyantarTableClass">
                        <thead>
                            <tr>
                                <th style="color: #2c2c2c;">
                                    @lang('messages.planet')
                                </th>
                                <th style="color: #2c2c2c;">
                                    @lang('messages.startDate')
                                </th>
                                <th style="color: #2c2c2c;">
                                    @lang('messages.endDate')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($firstParyantardasha as $index => $pratyantar)
                                <tr>
                                    <td>{{ $pratyantar }}</td>
                                    <td>{{ $firstParyantardashaOrder[$index] }}</td>
                                    <td>
                                        @if (isset($firstParyantardashaOrder[$index + 1]))
                                            {{ $firstParyantardashaOrder[$index + 1] }}
                                        @else
                                            End of Period
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No Paryantardasha data available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
