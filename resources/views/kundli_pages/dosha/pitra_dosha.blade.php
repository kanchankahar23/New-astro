<title>Kaalsharp Dosh Report</title>
<style>
    

    .table-custom th,
    .table-custom td {
        border: 1px solid #fbe216 !important;
    }

    .table-header {
        background-color: #fbe216 !important;
        color: white;
    }

    .disclaimer {
        background-color: #fbe216 !important;
        color: rgb(0, 0, 0);
        text-align: center;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 12px;
    }
</style>
<div class=" mt-4" style="padding: 25px">
    <div class="tab-betail">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                    onclick="showPage('dasha', this),getMangalDosha()" aria-controls="contact" aria-selected="false"
                    class="border-0 nav-link text-uppercase  ">Mangal Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="kaalsharpDosha-tab" data-toggle="tab" href="#kaalsharpDoshaPage" role="tab"
                    onclick="showPage('kaalsharpDosha', this),getKaalsharpDosha()" aria-controls="contact"
                    aria-selected="false" class="border-0 nav-link text-uppercase">Kaalsharp Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="pitraDosha-tab" data-toggle="tab" href="#pitraDoshaPage" role="tab"
                    onclick="showPage('pitraDosha', this),getPitraDosha()" aria-controls="contact" aria-selected="false"
                    class="border-0 nav-link text-uppercase  clickedpage">Pitra Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="papasamaya-tab" data-toggle="tab" href="#papasamayaPage" role="tab"
                    onclick="showPage('papasamaya', this),getPapasamaya()" aria-controls="contact" aria-selected="false"
                    class="border-0 nav-link text-uppercase ">Papasamaya</a>
            </li>

        </ul>
    </div>
    <br>
    <h5 class="mb-4 mangalfont mahaPridiction">Pitra Dosha Report</h5>
    <table class="table table-custom">

        <thead>
            <tr class="table-header">
                <th colspan="2">Pitra Dosha</th>
            </tr>
        </thead>

        @if ($data['status'] == 200)
            <tbody>
                <tr>
                    <td>
                        @lang('messages.isDoshaPresent')
                    </td>
                    <td>{{ $data['response']['is_dosha_present'] ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>
                        @lang('messages.botResponse')

                    </td>
                    <td>{{ $data['response']['bot_response'] }}</td>
                </tr>

                <tr>
                    <td>
                        @lang('messages.effects')

                    </td>
                    <td>
                        <ul>
                            @if (!empty($data['response']['effects']))
                                @foreach ($data['response']['effects'] as $effect)
                                    <li>{{ $effect }}</li>
                                @endforeach
                            @else
                                Not Found
                            @endif
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('messages.remedies')

                    </td>
                    <td>
                        <ul>
                            @if (!empty($data['response']['remedies']))
                                <ul>
                                    @foreach ($data['response']['remedies'] as $remedy)
                                        <li>{{ $remedy }}</li>
                                    @endforeach
                                </ul>
                            @else
                               Not Found
                            @endif
                        </ul>
                    </td>
                </tr>

            </tbody>
        @else
            <p>There was an error with the status code.</p>
        @endif
    </table>
    <div class="disclaimer">
        Disclaimer: This is a computer-generated analysis. Kindly contact our Astrologer to understand this in detail.
    </div>
</div>
