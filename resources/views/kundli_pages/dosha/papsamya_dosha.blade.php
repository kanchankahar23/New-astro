<title>Kaalsharp Dosh Report</title>
<style>

  .table-striped>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #ffffaf !important;
        ;
        color: var(--bs-table-striped-color);
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
                    aria-selected="false" class="border-0 nav-link text-uppercase ">Kaalsharp Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="pitraDosha-tab" data-toggle="tab" href="#pitraDoshaPage" role="tab"
                    onclick="showPage('pitraDosha', this),getPitraDosha()" aria-controls="contact" aria-selected="false"
                    class="border-0 nav-link text-uppercase ">Pitra Dosha</a>
            </li>
            <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                <a id="papasamaya-tab" data-toggle="tab" href="#papasamayaPage" role="tab"
                    onclick="showPage('papasamaya', this),getPapasamaya()" aria-controls="contact" aria-selected="false"
                    class="border-0 nav-link text-uppercase  clickedpage">Papasamaya</a>
            </li>

        </ul>
    </div>
    <br>
    <h5 class="mb-4 mangalfont mahaPridiction">Papasamaya</h5>
    <table class="table table-custom">

        <thead>
            <tr class="table-header">
                <th colspan="2">Papasamaya</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @lang('messages.rahuPapa')

                </td>
                <td>{{ $response['rahu_papa'] }}</td>
            </tr>
            <tr>
                <td>
                    @lang('messages.sunPapa')

                </td>
                <td>{{ $response['sun_papa'] }}</td>
            </tr>
            <tr>
                <td>
                    @lang('messages.saturnPapa')

                </td>
                <td>{{ $response['saturn_papa'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>
                    @lang('messages.marsPapa')

                </td>
                <td>{{ $response['mars_papa'] ?? 'N/A' }}</td>
            </tr>

        </tbody>
    </table>
    <div class="disclaimer">
        Disclaimer: This is a computer-generated analysis. Kindly contact our Astrologer to understand this in detail.
    </div>
</div>
