    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }



        table thead th,
        table th {
            color: var(--al-black);
            background: var(--al-primary-color);
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
    </style>

    <div class="p-2 appform">
        <div class="innerforms OnlyWorkResponsive">
            <div class="tableliner" style="width:100%;">
                <div class="tab-betail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item mb-2 GeneralPrediction" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab"
                                onclick="showPage('extentdedHoroscope', this),getPersonalCharacterstics()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Personal
                                Characteristics</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getAscendantReport()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Ascendant
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
                <h5 class="birth perSonalHeading" style="font-size: 17px;">Personal Characteristics
                    <hr class="kundlitag Personal" style=" width: 160px;color:#fbe216 !important">
                </h5>
                <br>
                <div class="rashidescripton" style="margin: unset;">
                    <div class="imgpara" style="display: block;">
                        @if (isset($response['response']))
                            @foreach ($response['response'] as $prediction)
                                <div class="table-wrap headOfTable">
                                    <table class="table table-striped">
                                        <thead>
                                                <tr>
                                            <th>@lang('messages.houseNo')</th>
                                                    <th>@lang('messages.lordHouseSign')</th>
                                                    <th>@lang('messages.lordLocation')</th>
                                                    <th>@lang('messages.lordLocationSign')</th>
                                                    <th>@lang('messages.lordStrength')</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <tr scope="row">
                                                <th>{{ $prediction['current_house'] ?? 'NA' }}</th>
                                                <th>{{ $prediction['lord_of_zodiac'] ?? 'NA' }}</th>
                                                <th>{{ $prediction['lord_house_location'] ?? 'NA' }}</th>
                                                <th>{{ $prediction['lord_zodiac_location'] ?? 'NA' }}</th>
                                                <th>{{ $prediction['lord_strength'] ?? 'NA' }}</th>
                                            </tr>
                                            <tr scope="row">
                                                <td style="font-family: 'Noto Sans', sans-serif;" colspan="5">
                                                    {{ $prediction['personalised_prediction'] ?? 'NA' }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                            @endforeach
                        @else
                            <p>No data available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
