    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }

        .tableliner table td {
            border: transparent !important;
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
        <div class="innerforms">
            <div class="tableliner increeseOutWidth" style="width:100%;">
                <h5 class="birth DashakootReport" style="font-size: 17px;">Dashakoot Report
                    <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
                </h5>
                @php
                    $response_data = $data['response']['score'];
                @endphp

                @if (isset($data['response']['score']))
                    @php
                        $totalScore = $data['response']['score'];
                        $outOf = 10;
                        $percentage = ($totalScore / $outOf) * 100;
                        $progressBarClass = $totalScore < 18 ? 'bg-success' : 'bg-success';
                    @endphp

<!-- <div style="display: flex; justify-content: center; margin-top: 5px;">
    <h6 class="progress-title">
        @if ($lang === 'hi')
            कुल स्कोर
        @elseif ($lang === 'en')
            Overall Score
        @elseif ($lang === 'ml')
            മൊത്തം സ്കോർ
        @elseif ($lang === 'bn')
            সামগ্রিক স্কোর
        @elseif ($lang === 'ta')
            மொத்த மதிப்பெண்
        @elseif ($lang === 'ka')
            ಒಟ್ಟು ಅಂಕಗಳು
        @elseif ($lang === 'te')
            మొత్తం స్కోరు
        @elseif ($lang === 'sp')
            Puntuación Total
        @elseif ($lang === 'fr')
            Score Global
        @else
            Overall Score
        @endif
        - {{ number_format($percentage, 2) }} %
    </h6>
</div> -->
                    <div class="progress-card" style="--color-accent: #ffd502;  width: 98%;  margin: 41px 10px auto;">
                        <div class="progress-card-content" style="padding: 15px;">
                            <div style="display: flex; justify-content: space-between; margin-top: 5px;" class='totalScore'>
                                <h6 class="progress-title">
                                    @lang('messages.overallScore')
                                    - {{ number_format($percentage, 2) }} %
                                </h6>
                            </div>
                            <h6 class="progress-title" style="text-align: center;"> <i
                                    class="fa-solid fa-pen-nib"></i>&nbsp;&nbsp;{{ $data['response']['bot_response'] ?? '--' }}
                            </h6>
                        </div>
                        <span class="progress-bar" style="--value:{{ $percentage }}%;"></span>
                    </div>
                    {{--  <div style="background-color: #ffffaf; padding: 5px; align-items: center;margin: 39px auto !important;    width: 98%; border-radius: 10px;border: 1px solid #efefef;"
                        class="appointfirst">
                        <h5 style="display: flex; justify-content: center;   padding: 10px;"> <i
                                class="fa-solid fa-pen-nib"></i>&nbsp;&nbsp;
                            {{ $data['response']['bot_response'] ?? '--' }}
                            <h4 class="tagline"></h4>
                        </h5>
                        <div class="progress" style="margin: 16px 25px 16px 25px; height: 19px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated {{ $progressBarClass }}"
                                role="progressbar" style="width: {{ $percentage }}%;color: black;"
                                aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                {{ round($percentage, 2) }}%
                            </div>
                        </div>
                    </div>  --}}
                @else
                    <p><strong>Total Score:</strong> Not available</p>
                @endif
                <br>
                <div class="rashidescripton" style="margin: unset;">
                    <div class="imgpara" style="display: block;">
                        <div class="table-wrap scrollbar BchangeTable lowTable" style="overflow: auto;cursor: grab;">
                            <table class="table table-striped rotateTable non-rotate">
                                <thead>
                                    <tr>
                                        <th style="color: #3c3b3b;border: #dee2e6;">
                                            @lang('messages.Attribute')
                                        </th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">
                                           @lang('messages.male')
                                        </th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">
                                             @lang('messages.female')

                                        </th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">
                                            @lang('messages.description')
                                        </th>
                                        <th style="color: #3c3b3b;border: #dee2e6;">
                                            @lang('messages.matchingPoints')

                                        </th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @if ($data['response'])
                                        @foreach (['dina', 'gana', 'mahendra', 'sthree', 'yoni', 'rasi', 'rasiathi', 'vasya', 'rajju', 'vedha'] as $key)
                                            <tr >
                                                <td class='sanisadisati' scope="row"
                                                    style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                                  
                                                        {{ $data['response'][$key]['name'] ?? '--' }}</td>
                                                
                                                <td style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                                    @if (isset($data['response'][$key]['boy_' . $key]))
                                                        {{ $data['response'][$key]['boy_' . $key] }}
                                                    @elseif (isset($data['response'][$key]['boy_star']))
                                                        {{ $data['response'][$key]['boy_star'] }}
                                                    @elseif (isset($data['response'][$key]['boy_rasi']))
                                                        {{ $data['response'][$key]['boy_rasi'] }}
                                                    @elseif (isset($data['response'][$key]['boy_lord']))
                                                        {{ $data['response'][$key]['boy_lord'] }}
                                                    @elseif (isset($data['response'][$key]['boy_rajju']))
                                                        {{ $data['response'][$key]['boy_rajju'] }}
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                                <td class='sanisadisati'  style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                                    @if (isset($data['response'][$key]['girl_' . $key]))
                                                        {{ $data['response'][$key]['girl_' . $key] }}
                                                    @elseif (isset($data['response'][$key]['girl_star']))
                                                        {{ $data['response'][$key]['girl_star'] }}
                                                    @elseif (isset($data['response'][$key]['girl_rasi']))
                                                        {{ $data['response'][$key]['girl_rasi'] }}
                                                    @elseif (isset($data['response'][$key]['girl_lord']))
                                                        {{ $data['response'][$key]['girl_lord'] }}
                                                    @elseif (isset($data['response'][$key]['girl_rajju']))
                                                        {{ $data['response'][$key]['girl_rajju'] }}
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                                <td  style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                                    {{ $data['response'][$key]['description'] ?? '--' }}</td>
                                                <td class='sanisadisati'  style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                                    {{ $data['response'][$key][$key] ?? '--' }}/{{ $data['response'][$key]['full_score'] ?? '--' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class='LastTotalScore'>
                                            <td colspan="5"
                                                style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                                @lang('messages.overallScore')
                                                : {{ $data['response']['score'] ?? '--' }}/10
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
