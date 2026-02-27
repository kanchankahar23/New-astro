
<div class="p-2 appform antarDasha">
    <div class="innerforms">
        <div class="tableliner" style="width:100%;">
            <div class="tab-betail">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    {{--  <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                            onclick="showPage('dasha', this),getDashaChart()" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold">Mahadasha</a>

                    </li>  --}}
                    <li class="nav-item mb-2 singalAntardasha" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Antardasha</a>
                    </li>
                    {{--  <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                        aria-controls="contact" aria-selected="false"
                        class="border-0 nav-link text-uppercase font-weight-bold">Pratyantar Dasha</a>
                    </li>  --}}
                    {{--  <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                            onclick="showPage('dasha', this),getMahadashaPrediction()" aria-controls="contact"
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Mahadasha
                            Prediction</a>
                    </li>  --}}

                </ul>
            </div>
            <br>
            <h5 class="birth" style="font-size: 17px;">AntarDasha
                <hr class="kundlitag" style=" width: 115px;color:#fbe216 !important">
            </h5><br>
            <div class="row">
                @foreach ($response['response']['antardashas'] as $index => $planetGroup)
                    @php
                        $mainPlanet = explode('/', $planetGroup[0])[0];
                    @endphp
                    @if ($mainPlanet === $dashaType)
                        <div class="col-12">
                            <table class="table table-striped thirdTimeCall" style="border: 2px solid #e9e9e9;">
                                <thead>
                                    <tr>
                                        <th style="background-color: transparent; border: none; font-size: medium;">
                                        </th>
                                        <th
                                            style="color: #2c2c2c; background-color: transparent; border: none; font-size: medium;">
                                            {{ $planetGroup[0] }}</th>
                                        <th style="background-color: transparent; border: none; font-size: medium;">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="color: #2c2c2c;" class='firstTagAntar'>
                            @lang('messages.planet')
                        </th>
                        <th style="color: #2c2c2c;" class='midtagAntar'>
                            @lang('messages.startDate')
                        </th>
                        <th style="color: #2c2c2c;" class='midtagAntar'>
                            @lang('messages.endDate')
                        </th>
                                        <th style="color: #2c2c2c;" class='lastTagTable'><i class="fa-solid fa-angle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $previousEndDate = 'Birth'; // Initial start date
                                    @endphp
                                    @foreach ($response['response']['antardasha_order'][$index] as $dateIndex => $startDate)
                                        @php
                                            $currentEndDate =
                                                $response['response']['antardasha_order'][$index][$dateIndex + 1] ??
                                                'N/A';
                                        @endphp
                                        <tr>
                                            <td>{{ $planetGroup[$dateIndex] }}</td>
                                            <td>{{ $previousEndDate }}</td>
                                            <!-- This will be 'Birth' for the first row -->
                                            <td>{{ $currentEndDate }}</td>
                                            <td style="font-size: 21px; font-weight: 500;cursor:pointer;"
                                                onclick="fetchPratyantarDasha('{{ $dateIndex }}', '{{ $planetType }}')">
                                                &nbsp;&nbsp; ></td>
                                        </tr>
                                        @php
                                            // Update previousEndDate for the next iteration
                                            $previousEndDate = $currentEndDate;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="p-2 appform " id="pratyantarDasha-container"></div>
<script>
    function fetchPratyantarDasha(planet, planetType) {
    
        var meetingId = "{{ $meetingId ?? '' }}";
        $('#preloader').show();
        $.ajax({
            url: '/get-paryantar-dasha',
            type: 'GET',
            data: {
                dashaType: planet,
                planetType: planetType,
                 meetingId: meetingId || null
            },
            success: function(response) {
                console.log(response);
                $('#pratyantarDasha-container').html(response);
                 $('#preloader').hide();
                $('.antarDasha').hide();
            },
            error: function(xhr) {
                alert('Failed to retrieve Pratyantar Dasha data');
                 $('#preloader').hide();
            }
        });
    }
</script>
