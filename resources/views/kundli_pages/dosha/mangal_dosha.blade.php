<title>Mangal Dosh Report</title>
<style>
    .table-custom {
        font-family: "Noto Sans", sans-serif;

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
                    class="border-0 nav-link text-uppercase  clickedpage">Mangal Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="kaalsharpDosha-tab" data-toggle="tab" href="#kaalsharpDoshaPage" role="tab"
                    onclick="showPage('kaalsharpDosha', this),getKaalsharpDosha()" aria-controls="contact"
                    aria-selected="false" class="border-0 nav-link text-uppercase">Kaalsharp Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="pitraDosha-tab" data-toggle="tab" href="#pitraDoshaPage" role="tab"
                    onclick="showPage('pitraDosha', this),getPitraDosha()" aria-controls="contact" aria-selected="false"
                    class="border-0 nav-link text-uppercase ">Pitra Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="papasamaya-tab" data-toggle="tab" href="#papasamayaPage" role="tab"
                    onclick="showPage('papasamaya', this),getPapasamaya()" aria-controls="contact" aria-selected="false"
                    class="border-0 nav-link text-uppercase ">Papasamaya</a>
            </li>

        </ul>
    </div>
    <br>
    <h2 class="mb-4 mangalfont mahaPridiction">Mangal Dosh Report</h2>
    <table class="table table-custom">
        <thead>
            <tr class="table-header">
                <th colspan="2">Mangal Dosh</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @lang('messages.doshaPresentMarsFromLagna')

                </td>
                <td>
                    @lang('messages.doshaPresentMarsFromMoon')

                </td>
            </tr>
            <tr>
                <td>
                    @lang('messages.isDoshaPresent')

                </td>
                <td>{{ $response['is_dosha_present'] ? 'Yes' : 'No' }}</td>
            </tr>

            {{--  <tr>
    <td>Is Anshik</td>
    @if ($response['is_anshik'])
    <td>{{ $response['is_anshik'] ? 'Yes' : 'No' }}</td>
    @endif
</tr>  --}}
            <tr>
                <td>
                    @lang('messages.cancellationScore')

                </td>
                <td>{{ $response['cancellation']['cancellationScore'] }}</td>
            </tr>
            <tr>
                <td>
                   @lang('messages.cancellationReason')
                </td>
                <td>
                    @if (count($response['cancellation']['cancellationReason']) > 0)
                        <ul>
                            @foreach ($response['cancellation']['cancellationReason'] as $reason)
                                <li>{{ $reason }}</li>
                            @endforeach
                        </ul>
                    @else
                      N/A
                    @endif
                </td>
            </tr>
            @if ($response['is_dosha_present'])
                <tr>
                    <td>
                        @lang('messages.factors')

                    </td>
                    <td>
                        @foreach ($response['factors'] as $key => $value)
                            <strong>{{ ucfirst($key) }}:</strong> {{ $value }}<br>
                        @endforeach
                    </td>
                </tr>
            @endif
            @if ($response['is_dosha_present'])
                <tr>
                    <td>
                        @lang('messages.advise')

                    </td>
                    <td>
                        {{ $response['bot_response'] }}
                    </td>
                </tr>
            @else
                <tr>
                    <td>
                       @lang('messages.advise')
                    </td>
                    <td>
                        @lang('messages.manglik_res')
                    </td>
                </tr>
            @endif


        </tbody>
    </table>
    <div class="disclaimer">
        Disclaimer: This is a computer-generated analysis. Kindly contact our Astrologer to understand this in detail.
    </div>
</div>
