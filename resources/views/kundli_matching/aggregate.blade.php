
<div class="p-2 appform">
    <div class="innerforms">
        <div class="tableliner" style="width:100%;">
            <h5 class="birth DashakootReport" style="font-size: 17px;">Aggregate Match
                <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
            </h5>
            @php
                $response_data = $data['response']['score'];
            @endphp

            @if (isset($data['response']['score']))
                @php
                    $totalScore = $data['response']['score'];
                    $outOf = 100;
                    $percentage = ($totalScore / $outOf) * 100;
                    $progressBarClass = $totalScore < 18 ? 'bg-danger' : 'bg-success';
                @endphp
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
                <div class="progress-card" style="--color-accent: #ffd502; width: 98%;  margin: 41px 10px auto;">
                    <div class="progress-card-content" style="padding: 15px;">
                        <div style="display: flex; justify-content: space-between; margin-top: 5px;"  class='totalScore'>
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
            @else
                <p><strong>Total Score:</strong> Not available</p>
            @endif
            <div class="rashidescripton">
                <div class="imgpara" style="display: contents;">
                    <div class="table-wrap scrollbar" style="overflow: auto;cursor: grab;">
                        <table class="table table-striped AstTable">
                            <thead>
                                <tr>
                                    <th style="color: #3c3b3b;border: #dee2e6;">
                                        @if ($lang === 'hi')
                                            अष्टकूट स्कोर
                                        @elseif ($lang === 'en')
                                            Ashtakoot Score
                                        @elseif ($lang === 'ml')
                                            അഷ്ടകൂട്ട് സ്കോർ
                                        @elseif ($lang === 'bn')
                                            অষ্টকুট স্কোর
                                        @elseif ($lang === 'ta')
                                            அஷ்டகூட ஸ்கோர்
                                        @elseif ($lang === 'ka')
                                            ಅಷ್ಟಕೂಟ ಸ್ಕೋರ್
                                        @elseif ($lang === 'te')
                                            అష్టకూట్ స్కోరు
                                        @elseif ($lang === 'sp')
                                            Puntuación de Ashtakoot
                                        @elseif ($lang === 'fr')
                                            Score Ashtakoot
                                        @else
                                            Ashtakoot Score
                                        @endif
                                    </th>
                                    <th style="color: #3c3b3b;border: #dee2e6;">
                                        @if ($lang === 'hi')
                                            दशकूट स्कोर
                                        @elseif ($lang === 'en')
                                            Dashkoot Score
                                        @elseif ($lang === 'ml')
                                            ദശകൂട്ട് സ്കോർ
                                        @elseif ($lang === 'bn')
                                            দশকুট স্কোর
                                        @elseif ($lang === 'ta')
                                            தசகூட ஸ்கோர்
                                        @elseif ($lang === 'ka')
                                            ದಶಕೂಟ ಸ್ಕೋರ್
                                        @elseif ($lang === 'te')
                                            దశకూట్ స్కోరు
                                        @elseif ($lang === 'sp')
                                            Puntuación de Dashkoot
                                        @elseif ($lang === 'fr')
                                            Score Dashkoot
                                        @else
                                            Dashkoot Score
                                        @endif
                                    </th>
                                    <th style="color: #3c3b3b;border: #dee2e6;">
                                        @if ($lang === 'hi')
                                            रज्जु दोष
                                        @elseif ($lang === 'en')
                                            Rajju Dosh
                                        @elseif ($lang === 'ml')
                                            രജ്ജു ദോഷം
                                        @elseif ($lang === 'bn')
                                            রজ্জু দোষ
                                        @elseif ($lang === 'ta')
                                            ரஜ்ஜு தோஷம்
                                        @elseif ($lang === 'ka')
                                            ರಜ್ಜು ದೋಷ
                                        @elseif ($lang === 'te')
                                            రజ్జు దోషం
                                        @elseif ($lang === 'sp')
                                            Rajju Dosh
                                        @elseif ($lang === 'fr')
                                            Rajju Dosh
                                        @else
                                            Rajju Dosh
                                        @endif
                                    </th>
                                    <th style="color: #3c3b3b;border: #dee2e6;">
                                        @if ($lang === 'hi')
                                            वेध दोष
                                        @elseif ($lang === 'en')
                                            Vedha Dosh
                                        @elseif ($lang === 'ml')
                                            വേദ ദോഷം
                                        @elseif ($lang === 'bn')
                                            বেদ দোষ
                                        @elseif ($lang === 'ta')
                                            வேத தோஷம்
                                        @elseif ($lang === 'ka')
                                            ವೇಧ ದೋಷ
                                        @elseif ($lang === 'te')
                                            వేద దోషం
                                        @elseif ($lang === 'sp')
                                            Vedha Dosh
                                        @elseif ($lang === 'fr')
                                            Vedha Dosh
                                        @else
                                            Vedha Dosh
                                        @endif
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row" style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{ $data['response']['ashtakoot_score'] ?? '--' }}
                                    </td>
                                    <td scope="row" style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{ $data['response']['dashkoot_score'] ?? '--' }}
                                    </td>
                                    <td scope="row" style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{ $data['response']['rajjudosh'] ? 'Yes' : 'No' }}
                                    </td>
                                    <td scope="row" style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{ $data['response']['vedhadosh'] ? 'Yes' : 'No' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="ariesdescription">
                        <div class="card" style="padding: 20px;">
                            @php
                                $colors1 = [
                                    '#7FFFD4',
                                    '#00FFFF',
                                    '#FF7F50',
                                    '#9fef9c',
                                    '#88a1dd',
                                    '#6a4e9c',
                                    '#d2bd54',
                                    '#53a7a6',
                                    '#FF7F50',
                                ];
                                $randomColor = $colors1[array_rand($colors1)];
                            @endphp
                            <div class="progress-card" style="--color-accent: #FF7F50">
                                <div class="progress-card-content" style="padding: 15px;">
                                    <div style="display: flex;justify-content:space-between;margin-top: 5px;" class='AnkMangal'>
                                        <h6 class="progress-title MangalDosh">
                                            @if ($lang === 'hi')
                                                मंगल दोष
                                            @elseif ($lang === 'en')
                                                Mangal Dosh
                                            @elseif ($lang === 'ml')
                                                മംഗൾ ദോഷം
                                            @elseif ($lang === 'bn')
                                                মঙ্গল দোষ
                                            @elseif ($lang === 'ta')
                                                செவ்வாய் தோஷம்
                                            @elseif ($lang === 'ka')
                                                ಮಂಗಳ ದೋಷ
                                            @elseif ($lang === 'te')
                                                మంగళ దోషం
                                            @elseif ($lang === 'sp')
                                                Mangal Dosh
                                            @elseif ($lang === 'fr')
                                                Mangal Dosh
                                            @else
                                                Mangal Dosh
                                            @endif
                                        </h6>
                                        <div style="display: flex; justify-content: space-between;" class='AnkDosh'>
                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        मंगल दोष अंक (लड़का):
                                                    @elseif ($lang === 'en')
                                                        Mangal Dosh Points (Boy):
                                                    @elseif ($lang === 'ml')
                                                        മംഗൾ ദോഷ പോയിന്റുകൾ (അനുരാഗൻ):
                                                    @elseif ($lang === 'bn')
                                                        মঙ্গল দোষ পয়েন্টস (ছেলে):
                                                    @elseif ($lang === 'ta')
                                                        செவ்வாய் தோஷ புள்ளிகள் (ஆண்):
                                                    @elseif ($lang === 'ka')
                                                        ಮಂಗಳ ದೋಷ ಅಂಕಗಳು (ಹುಡುಗ):
                                                    @elseif ($lang === 'te')
                                                        మంగళ దోష పాయింట్లు (అబ్బాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Mangal Dosh (Niño):
                                                    @elseif ($lang === 'fr')
                                                        Points Mangal Dosh (Garçon):
                                                    @else
                                                        Mangal Dosh Points (Boy):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['mangaldosh_points']['boy'] ?? '--' }}
                                             
                                            </h6>
                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        मंगल दोष अंक (लड़की):
                                                    @elseif ($lang === 'en')
                                                        Mangal Dosh Points (Girl):
                                                    @elseif ($lang === 'ml')
                                                        മംഗൾ ദോഷ പോയിന്റുകൾ (പെൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        মঙ্গল দোষ পয়েন্টস (মেয়ে):
                                                    @elseif ($lang === 'ta')
                                                        செவ்வாய் தோஷ புள்ளிகள் (பெண்):
                                                    @elseif ($lang === 'ka')
                                                        ಮಂಗಳ ದೋಷ ಅಂಕಗಳು (ಹುಡುಗಿ):
                                                    @elseif ($lang === 'te')
                                                        మంగళ దోష పాయింట్లు (అమ్మాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Mangal Dosh (Niña):
                                                    @elseif ($lang === 'fr')
                                                        Points Mangal Dosh (Fille):
                                                    @else
                                                        Mangal Dosh Points (Girl):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['mangaldosh_points']['girl'] ?? '--' }}
                                            </h6>
                                        </div>

                                    </div>
                                    <br>
                                    <span class="progress-description">{{ $data['response']['mangaldosh'] ?? '--' }}
                                    </span>
                                </div>
                                <span class="progress-bar" style="--value:100%;"></span>
                            </div>
                            <div class="progress-card" style="--color-accent: #7FFFD4">
                                <div class="progress-card-content" style="padding: 15px;">
                                    <div style="display: flex;justify-content:space-between;margin-top: 5px;" class='AnkMangal'>
                                        <h6 class="progress-title MangalDosh">
                                            @if ($lang === 'hi')
                                                पितृ दोष
                                            @elseif ($lang === 'en')
                                                Pitra Dosh
                                            @elseif ($lang === 'ml')
                                                പിതൃ ദോഷം
                                            @elseif ($lang === 'bn')
                                                পিতৃ দোষ
                                            @elseif ($lang === 'ta')
                                                பித்ரு தோஷம்
                                            @elseif ($lang === 'ka')
                                                ಪಿತೃ ದೋಷ
                                            @elseif ($lang === 'te')
                                                పితృ దోషం
                                            @elseif ($lang === 'sp')
                                                Pitra Dosh
                                            @elseif ($lang === 'fr')
                                                Pitra Dosh
                                            @else
                                                Pitra Dosh
                                            @endif
                                        </h6>

                                        <div style="display: flex;justify-content:space-between;" class='AnkDosh'>
                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        पितृ दोष अंक (लड़का):
                                                    @elseif ($lang === 'en')
                                                        Pitra Dosh Points (Boy):
                                                    @elseif ($lang === 'ml')
                                                        പിതൃ ദോഷം പോയിന്റുകൾ (ആൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        পিতৃ দোষের পয়েন্ট (ছেলে):
                                                    @elseif ($lang === 'ta')
                                                        பித்ரு தோஷம் புள்ளிகள் (ஆண்):
                                                    @elseif ($lang === 'ka')
                                                        ಪಿತೃ ದೋಷ ಅಂಕಗಳು (ಮಗ):
                                                    @elseif ($lang === 'te')
                                                        పితృ దోష పాయింట్లు (అబ్బాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Pitra Dosh (Niño):
                                                    @elseif ($lang === 'fr')
                                                        Points de Pitra Dosh (Garçon):
                                                    @else
                                                        Pitra Dosh Points (Boy):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['pitradosh_points']['boy'] ? 'Yes' : 'No' }}
                                                &nbsp;-&nbsp;
                                            </h6>

                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        पितृ दोष अंक (लड़की):
                                                    @elseif ($lang === 'en')
                                                        Pitra Dosh Points (Girl):
                                                    @elseif ($lang === 'ml')
                                                        പിതൃ ദോഷം പോയിന്റുകൾ (പെൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        পিতৃ দোষের পয়েন্ট (মেয়ে):
                                                    @elseif ($lang === 'ta')
                                                        பித்ரு தோஷம் புள்ளிகள் (பெண்):
                                                    @elseif ($lang === 'ka')
                                                        ಪಿತೃ ದೋಷ ಅಂಕಗಳು (ಹುಡುಗಿ):
                                                    @elseif ($lang === 'te')
                                                        పితృ దోష పాయింట్లు (అమ్మాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Pitra Dosh (Niña):
                                                    @elseif ($lang === 'fr')
                                                        Points de Pitra Dosh (Fille):
                                                    @else
                                                        Pitra Dosh Points (Girl):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['pitradosh_points']['girl'] ? 'Yes' : 'No' }}
                                            </h6>
                                        </div>

                                    </div>
                                    <br>
                                    <span class="progress-description">{{ $data['response']['pitradosh'] ?? '--' }}
                                    </span>
                                </div>
                                <span class="progress-bar" style="--value:100%;"></span>
                            </div>

                            <div class="progress-card" style="--color-accent: #00FFFF">
                                <div class="progress-card-content" style="padding: 15px;">
                                    <div style="display: flex;justify-content:space-between;margin-top: 5px;" class='AnkMangal'>
                                        <h6 class="progress-title MangalDosh">
                                            @if ($lang === 'hi')
                                                कालसर्प दोष
                                            @elseif ($lang === 'en')
                                                Kaalsarp Dosh
                                            @elseif ($lang === 'ml')
                                                കാൽസർപ് ദോഷം
                                            @elseif ($lang === 'bn')
                                                কালসর্স দোষ
                                            @elseif ($lang === 'ta')
                                                கால்சர்ப்ப தோஷம்
                                            @elseif ($lang === 'ka')
                                                ಕಾಲ್ಸರ್ಪ ದೋಷ
                                            @elseif ($lang === 'te')
                                                కాల్సర్ప దోషం
                                            @elseif ($lang === 'sp')
                                                Kaalsarp Dosh
                                            @elseif ($lang === 'fr')
                                                Kaalsarp Dosh
                                            @else
                                                Kaalsarp Dosh
                                            @endif
                                        </h6>

                                        <div style="display: flex;justify-content:space-between;" class='AnkDosh'>
                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        कालसर्प दोष अंक (लड़का):
                                                    @elseif ($lang === 'en')
                                                        Kaalsarp Dosh Points (Boy):
                                                    @elseif ($lang === 'ml')
                                                        കാൽസർപ് ദോഷം പോയിന്റുകൾ (ആൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        কালসর্স দোষের পয়েন্ট (ছেলে):
                                                    @elseif ($lang === 'ta')
                                                        கால்சர்ப்ப தோஷம் புள்ளிகள் (ஆண்):
                                                    @elseif ($lang === 'ka')
                                                        ಕಾಲ್ಸರ್ಪ ದೋಷ ಅಂಕಗಳು (ಮಗ):
                                                    @elseif ($lang === 'te')
                                                        కాల్సర్ప దోష పాయింట్లు (అబ్బాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Kaalsarp Dosh (Niño):
                                                    @elseif ($lang === 'fr')
                                                        Points de Kaalsarp Dosh (Garçon):
                                                    @else
                                                        Kaalsarp Dosh Points (Boy):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['kaalsarp_points']['boy'] ? 'Yes' : 'No' }}
                                                &nbsp;-&nbsp;
                                            </h6>

                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        कालसर्प दोष अंक (लड़की):
                                                    @elseif ($lang === 'en')
                                                        Kaalsarp Dosh Points (Girl):
                                                    @elseif ($lang === 'ml')
                                                        കാൽസർപ് ദോഷം പോയിന്റുകൾ (പെൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        কালসর্স দোষের পয়েন্ট (মেয়ে):
                                                    @elseif ($lang === 'ta')
                                                        கால்சர்ப்ப தோஷம் புள்ளிகள் (பெண்):
                                                    @elseif ($lang === 'ka')
                                                        ಕಾಲ್ಸರ್ಪ ದೋಷ ಅಂಕಗಳು (ಹುಡುಗಿ):
                                                    @elseif ($lang === 'te')
                                                        కాల్సర్ప దోష పాయింట్లు (అమ్మాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Kaalsarp Dosh (Niña):
                                                    @elseif ($lang === 'fr')
                                                        Points de Kaalsarp Dosh (Fille):
                                                    @else
                                                        Kaalsarp Dosh Points (Girl):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['kaalsarp_points']['girl'] ? 'Yes' : 'No' }}
                                            </h6>
                                        </div>

                                    </div>
                                    <br>
                                    <span class="progress-description">{{ $data['response']['kaalsarpdosh'] ?? '--' }}
                                    </span>
                                </div>
                                <span class="progress-bar" style="--value:100%;"></span>
                            </div>

                            <div class="progress-card" style="--color-accent: #9fef9c">
                                <div class="progress-card-content" style="padding: 15px;">
                                    <div style="display: flex;justify-content:space-between;margin-top: 5px;" class='AnkMangal'>
                                        <h6 class="progress-title MangalDosh">
                                            @if ($lang === 'hi')
                                                मंगलीक दोष (शनि)
                                            @elseif ($lang === 'en')
                                                Manglik Dosh (Saturn)
                                            @elseif ($lang === 'ml')
                                                മംഗ്ലിക് ദോഷം (ശനി)
                                            @elseif ($lang === 'bn')
                                                মঙ্গলিক দোষ (শনি)
                                            @elseif ($lang === 'ta')
                                                மங்க்ளிக் தோஷம் (சனி)
                                            @elseif ($lang === 'ka')
                                                ಮಂಗಳಿಕ ದೋಷ (ಶನಿ)
                                            @elseif ($lang === 'te')
                                                మంగ్లిక్ దోషం (శని)
                                            @elseif ($lang === 'sp')
                                                Manglik Dosh (Saturno)
                                            @elseif ($lang === 'fr')
                                                Manglik Dosh (Saturne)
                                            @else
                                                Manglik Dosh (Saturn)
                                            @endif
                                        </h6>

                                        <div style="display: flex;justify-content:space-between;" class='AnkDosh'>
                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        मंगलीक दोष (शनि) अंक (लड़का):
                                                    @elseif ($lang === 'en')
                                                        Manglik Dosh (Saturn) Points (Boy):
                                                    @elseif ($lang === 'ml')
                                                        മംഗ്ലിക് ദോഷം (ശനി) പോയിന്റുകൾ (ആൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        মঙ্গলিক দোষ (শনি) পয়েন্ট (ছেলে):
                                                    @elseif ($lang === 'ta')
                                                        மங்க்ளிக் தோஷம் (சனி) புள்ளிகள் (ஆண்):
                                                    @elseif ($lang === 'ka')
                                                        ಮಂಗಳಿಕ ದೋಷ (ಶನಿ) ಅಂಕಗಳು (ಮಗ):
                                                    @elseif ($lang === 'te')
                                                        మంగ్లిక్ దోషం (శని) పాయింట్లు (అబ్బాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Manglik Dosh (Saturno) (Niño):
                                                    @elseif ($lang === 'fr')
                                                        Points de Manglik Dosh (Saturne) (Garçon):
                                                    @else
                                                        Manglik Dosh (Saturn) Points (Boy):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['manglikdosh_saturn_points']['boy'] ? 'Yes' : 'No' }}
                                                &nbsp;-&nbsp;
                                            </h6>

                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        मंगलीक दोष (शनि) अंक (लड़की):
                                                    @elseif ($lang === 'en')
                                                        Manglik Dosh (Saturn) Points (Girl):
                                                    @elseif ($lang === 'ml')
                                                        മംഗ്ലിക് ദോഷം (ശനി) പോയിന്റുകൾ (പെൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        মঙ্গলিক দোষ (শনি) পয়েন্ট (মেয়ে):
                                                    @elseif ($lang === 'ta')
                                                        மங்க்ளிக் தோஷம் (சனி) புள்ளிகள் (பெண்):
                                                    @elseif ($lang === 'ka')
                                                        ಮಂಗಳಿಕ ದೋಷ (ಶನಿ) ಅಂಕಗಳು (ಹುಡುಗಿ):
                                                    @elseif ($lang === 'te')
                                                        మంగ్లిక్ దోషం (శని) పాయింట్లు (అమ్మాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Manglik Dosh (Saturno) (Niña):
                                                    @elseif ($lang === 'fr')
                                                        Points de Manglik Dosh (Saturne) (Fille):
                                                    @else
                                                        Manglik Dosh (Saturn) Points (Girl):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['manglikdosh_saturn_points']['girl'] ? 'Yes' : 'No' }}
                                            </h6>
                                        </div>

                                    </div>
                                    <br>
                                    <span
                                        class="progress-description">{{ $data['response']['manglikdosh_saturn'] ?? '--' }}
                                    </span>
                                </div>
                                <span class="progress-bar" style="--value:100%;"></span>
                            </div>
                            <div class="progress-card" style="--color-accent: #88a1dd">
                                <div class="progress-card-content" style="padding: 15px;">
                                    <div style="display: flex;justify-content:space-between;margin-top: 5px;" class='AnkMangal'>
                                        <h6 class="progress-title MangalDosh">
                                            @if ($lang === 'hi')
                                                मंगलीक दोष (राहु/केतु)
                                            @elseif ($lang === 'en')
                                                Manglik Dosh (Rahu/Ketu)
                                            @elseif ($lang === 'ml')
                                                മംഗ്ലിക് ദോഷം (രാഹു/കേതു)
                                            @elseif ($lang === 'bn')
                                                মঙ্গলিক দোষ (রাহু/কেতু)
                                            @elseif ($lang === 'ta')
                                                மங்க்ளிக் தோஷம் (ராகு/கேது)
                                            @elseif ($lang === 'ka')
                                                ಮಂಗಳಿಕ ದೋಷ (ರಾಹು/ಕೆತು)
                                            @elseif ($lang === 'te')
                                                మంగ్లిక్ దోషం (రాహు/కేతు)
                                            @elseif ($lang === 'sp')
                                                Manglik Dosh (Rahu/Ketu)
                                            @elseif ($lang === 'fr')
                                                Manglik Dosh (Rahu/Ketu)
                                            @else
                                                Manglik Dosh (Rahu/Ketu)
                                            @endif
                                        </h6>

                                        <div style="display: flex;justify-content:space-between;" class='AnkDosh'>
                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        मंगलीक दोष (राहु/केतु) अंक (लड़का):
                                                    @elseif ($lang === 'en')
                                                        Manglik Dosh (Rahu/Ketu) Points (Boy):
                                                    @elseif ($lang === 'ml')
                                                        മംഗ്ലിക് ദോഷം (രാഹു/കേതു) പോയിന്റുകൾ (ആൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        মঙ্গলিক দোষ (রাহু/কেতু) পয়েন্ট (ছেলে):
                                                    @elseif ($lang === 'ta')
                                                        மங்க்ளிக் தோஷம் (ராகு/கேது) புள்ளிகள் (ஆண்):
                                                    @elseif ($lang === 'ka')
                                                        ಮಂಗಳಿಕ ದೋಷ (ರಾಹು/ಕೆತು) ಅಂಕಗಳು (ಮಗ):
                                                    @elseif ($lang === 'te')
                                                        మంగ్లిక్ దోషం (రాహు/కేతు) పాయింట్లు (అబ్బాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Manglik Dosh (Rahu/Ketu) (Niño):
                                                    @elseif ($lang === 'fr')
                                                        Points de Manglik Dosh (Rahu/Ketu) (Garçon):
                                                    @else
                                                        Manglik Dosh (Rahu/Ketu) Points (Boy):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['manglikdosh_rahuketu_points']['boy'] ? 'Yes' : 'No' }}
                                                &nbsp;-&nbsp;
                                            </h6>

                                            <h6 class="progress-title">
                                                <strong>
                                                    @if ($lang === 'hi')
                                                        मंगलीक दोष (राहु/केतु) अंक (लड़की):
                                                    @elseif ($lang === 'en')
                                                        Manglik Dosh (Rahu/Ketu) Points (Girl):
                                                    @elseif ($lang === 'ml')
                                                        മംഗ്ലിക് ദോഷം (രാഹു/കേതു) പോയിന്റുകൾ (പെൺകുട്ടി):
                                                    @elseif ($lang === 'bn')
                                                        মঙ্গলিক দোষ (রাহু/কেতু) পয়েন্ট (মেয়ে):
                                                    @elseif ($lang === 'ta')
                                                        மங்க்ளிக் தோஷம் (ராகு/கேது) புள்ளிகள் (பெண்):
                                                    @elseif ($lang === 'ka')
                                                        ಮಂಗಳಿಕ ದೋಷ (ರಾಹು/ಕೆತು) ಅಂಕಗಳು (ಹುಡುಗಿ):
                                                    @elseif ($lang === 'te')
                                                        మంగ్లిక్ దోషం (రాహు/కేతు) పాయింట్లు (అమ్మాయి):
                                                    @elseif ($lang === 'sp')
                                                        Puntos de Manglik Dosh (Rahu/Ketu) (Niña):
                                                    @elseif ($lang === 'fr')
                                                        Points de Manglik Dosh (Rahu/Ketu) (Fille):
                                                    @else
                                                        Manglik Dosh (Rahu/Ketu) Points (Girl):
                                                    @endif
                                                </strong>
                                                {{ $data['response']['manglikdosh_rahuketu_points']['girl'] ? 'Yes' : 'No' }}
                                            </h6>
                                        </div>

                                    </div>
                                    <br>
                                    <span
                                        class="progress-description">{{ $data['response']['manglikdosh_rahuketu'] ?? '--' }}
                                    </span>
                                </div>
                                <span class="progress-bar" style="--value:100%;"></span>
                            </div>
                            <div class="progress-card" style="--color-accent: #6a4e9c">
                                <div class="progress-card-content" style="padding: 15px;">
                                    <div style="display: flex;justify-content:space-between;margin-top: 5px;">
                                        <h6 class="progress-title MangalDosh">
                                            @if ($lang === 'hi')
                                                विस्तृत उत्तर
                                            @elseif ($lang === 'en')
                                                Extended Response
                                            @elseif ($lang === 'ml')
                                                വിപുലമായ മറുപടി
                                            @elseif ($lang === 'bn')
                                                বিস্তৃত প্রতিক্রিয়া
                                            @elseif ($lang === 'ta')
                                                விரிவான பதில்
                                            @elseif ($lang === 'ka')
                                                ವಿಸ್ತೃತ ಪ್ರತಿಸ್ಪಂದನ
                                            @elseif ($lang === 'te')
                                                విస్తృత ప్రతిస్పందన
                                            @elseif ($lang === 'sp')
                                                Respuesta Extendida
                                            @elseif ($lang === 'fr')
                                                Réponse Étendue
                                            @else
                                                Extended Response
                                            @endif
                                        </h6>

                                        <h6 class="progress-title MangalDosh">
                                            @lang('messages.overallScore') :
                                            {{ $data['response']['score'] ?? '--' }}
                                        </h6>
                                    </div>
                                    <br>
                                    <span
                                        class="progress-description">{{ $data['response']['extended_response'] ?? '--' }}
                                    </span>
                                </div>
                                <span class="progress-bar" style="--value:100%;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
