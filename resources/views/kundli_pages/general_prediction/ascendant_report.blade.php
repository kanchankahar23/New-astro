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
</style>


<div class="p-2 appform">
    <div class="innerforms">
        <div class="tableliner" style="width:100%;">
            <div class="tab-betail">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mb-2 GeneralPrediction" role="presentation">
                        <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                            onclick="showPage('extentdedHoroscope', this),getPersonalCharacterstics()"
                            aria-controls="contact" aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold">Personal Characteristics</a>
                    </li>
                    <li class="nav-item mb-2 GeneralPrediction" role="presentation">
                        <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                            onclick="showPage('extentdedHoroscope', this),getAscendantReport()" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Ascendant
                            Report</a>
                    </li>
                    {{--  <li class="nav-item mb-2" role="presentation">
                        <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                            onclick="showPage('extentdedHoroscope', this),getPlanetReport()" aria-controls="contact"
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Planet
                            Report</a>
                    </li>  --}}
                </ul>
            </div>
            <br>
            <h5 class="birth perSonalHeading" style="font-size: 17px;">Ascendant
                Report
                <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
            </h5>
            <br>
            <div class="rashidescripton" style="margin: unset;">
                <div class="imgpara" style="display: flex;">
                    @if (isset($response['response']) && !empty($response['response']))
                        @foreach ($response['response'] as $prediction)
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
                                                <tr class='generalline'>
                                                    <td class='nontable'>@lang('messages.Ascendant')</td>
                                                    <td class='nontable'>{{ $prediction['ascendant'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class='nontable'>@lang('messages.ascendantLord')</td>
                                                    <td class='nontable'>{{ $prediction['ascendant_lord'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr class='generalline'>
                                                    <td class='nontable'>@lang('messages.AscendantLordLocation')</td>
                                                    <td class='nontable'>{{ $prediction['ascendant_lord_location'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class='nontable'>@lang('messages.AscendantLordHouseLocation')</td>
                                                    <td class='nontable'>{{ $prediction['ascendant_lord_house_location'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr class='generalline'>
                                                    <td class='nontable'>@lang('messages.AscendantLordStrength')</td>
                                                    <td class='nontable'>{{ $prediction['ascendant_lord_strength'] ?? 'NA' }}</td>
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
                                                <tr class='generalline'>
                                                    <td class='nontable'>@lang('messages.Symbol')</td>
                                                    <td class='nontable'>{{ $prediction['symbol'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class='nontable'>@lang('messages.ZodiacCharacteristics')</td>
                                                    <td class='nontable'>{{ $prediction['zodiac_characteristics'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr class='generalline'>
                                                    <td class='nontable'>@lang('messages.LuckyGem')</td>
                                                    <td class='nontable'>{{ $prediction['lucky_gem'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class='nontable'>@lang('messages.DayForFasting')</td>
                                                    <td class='nontable'>{{ $prediction['day_for_fasting'] ?? 'NA' }}</td>
                                                </tr>
                                                <tr class='generalline'>
                                                    <td class='nontable'>@lang('messages.GayatriMantra')</td>
                                                    <td class='nontable'>{{ $prediction['gayatri_mantra'] ?? 'NA' }}</td>
                                                </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                </div>
                @endforeach
                @endif
                <br>
                @if (isset($response['response']) && !empty($response['response']))
                    @foreach ($response['response'] as $prediction)
                        <div class="table-wrap deTailPara">
                            <table class="table table-striped horroDetails">
                                <tbody>
                                    @if (isset($response['response']))
                                            <tr class='generalline'>
                                                <td colspan="5"><strong>@lang('messages.generalPrediction') &nbsp;:</strong>
                                                    {{ $prediction['general_prediction'] ?? 'NA' }}</td>
                                            </tr>
                                            <tr class='Encryption'>
                                                <td colspan="5"><strong>@lang('messages.personalisedPrediction')  &nbsp;:</strong>
                                                    {{ $prediction['personalised_prediction'] ?? 'NA' }}</td>
                                            </tr>
                                            <tr class='generalline'>
                                                <td colspan="5"><strong>@lang('messages.flagshipQualities') &nbsp;:</strong>
                                                    {{ $prediction['flagship_qualities'] ?? 'NA' }}</td>
                                            </tr>
                                            <tr class='Encryption'>
                                                <td colspan="5"><strong>@lang('messages.spiritualityAdvice')  &nbsp;:</strong>
                                                    {{ $prediction['spirituality_advice'] ?? 'NA' }}</td>
                                            </tr>
                                            <tr class='generalline'>
                                                <td colspan="5"><strong>@lang('messages.goodQualities')  &nbsp;:</strong>

                                                    {{ $prediction['good_qualities'] ?? 'NA' }}</td>
                                            </tr>
                                            <tr class='Encryption'>
                                                <td colspan="5"><strong>@lang('messages.badQualities') &nbsp;:</strong>
                                                    {{ $prediction['bad_qualities'] ?? 'NA' }}</td>
                                            </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
</div>
 