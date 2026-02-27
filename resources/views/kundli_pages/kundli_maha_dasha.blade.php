<style>
    .active-tab {
        background-color: #f0f0f0;
        /* Example active tab background color */
    }
    .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }

        .table-striped thead th,
        table thead th,
        table th {
            color: #101010;
        }

</style>


<div class="p-2 appform mahadasha">
    <div class="innerforms forMobile">
        <div class="tableliner" style="width:100%;">
            <div class="tab-betail">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mb-2 GeneralPrediction" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                            onclick="showPage('dasha', this),getDashaChart()" aria-controls="contact"
                            aria-selected="false"
                            class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Mahadasha</a>
                    </li>
                    {{--  <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                         aria-controls="contact" aria-selected="false"
                        class="border-0 nav-link text-uppercase font-weight-bold">Antardasha</a>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                         aria-controls="contact" aria-selected="false"
                        class="border-0 nav-link text-uppercase font-weight-bold">Pratyantar Dasha</a>
                    </li>  --}}
                    <li class="nav-item mb-2 GeneralPrediction" role="presentation">
                        <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                            onclick="showPage('dasha', this),getMahadashaPrediction()" aria-controls="contact"
                            aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Mahadasha
                            Prediction</a>
                    </li>

                </ul>
            </div>
            <br>
            <h5 class="birth" style="font-size: 17px;">MahaDasha
                <hr class="kundlitag" style=" width: 115px;color:#fbe216 !important">
            </h5>
            <br>
            <table class="table table-striped perSonalTable">
                <thead>
                    <tr class='trippleMode'>
                        <th style="color: #2c2c2c;">
                            @lang('messages.planet')
                        </th>
                        <th style="color: #2c2c2c;">
                            @lang('messages.startDate')

                        </th>
                        <th style="color: #2c2c2c;">
                            @lang('messages.endDate')

                        </th>
                        <th style="color: #2c2c2c;">विवरण</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $birth_date = 'Birth';
                        $start_date = $birth_date;
                    @endphp
                    @foreach ($data['response']['mahadasha'] as $index => $planet)
                        <tr class='trippleMode responseNew'>
                            <td>{{ $planet }}</td>
                            <td>{{ $start_date }}</td>
                            <td>{{ $data['response']['mahadasha_order'][$index] }}</td>
                            <td class='workingIcon' style="cursor:pointer;"
                                onclick="fetchAntardasha('{{ $planet }}', '{{ $index }}')"><i class="fa-solid fa-hand-pointer" style="margin-left:5px;" aria-hidden="true"></i>
                            </td>
                        </tr>
                        @php
                            $start_date = $data['response']['mahadasha_order'][$index];
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="p-2 appform" id="antardasha-container"></div>
<script>
    function fetchAntardasha(planet, planetType) {
        var meetingId = "{{ $meetingId ?? '' }}";
        $('#preloader').show();
        $.ajax({
            url: '/get-antar-dasha',
            type: 'GET',
            data: {
                dashaType: planet,
                planetType: planetType,
                meetingId: meetingId || null
            },
            success: function(response) {
                console.log(response);
                $('#antardasha-container').html(response);
                $('.mahadasha').hide();
                $('#preloader').hide();

            },
            error: function(xhr) {
                alert('Failed to retrieve Antardasha data');
                $('#preloader').hide();

            }
        });
    }
</script>
