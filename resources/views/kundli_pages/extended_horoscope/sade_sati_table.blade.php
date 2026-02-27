    <style>

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }

        .tableliner table td {
            border: 1px solid #d3d3d5 !important;
            padding: 10px 10px;
            text-align: center;
            padding-left: 31px;
            color: #101010;
            font-weight: 400;
            background: white;
            font-family: "Noto Sans", sans-serif;
        }

        .tableliner table {
            margin-top: 0 !important;
        }

        :root {
            --font-fam: "Satoshi", sans-serif;
            --text-color: #212529;
            --bar-color: #36f31d;
            --transition-effect: all 90ms linear;
        }



        .load {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            padding: 8px;
            border-radius: 10px;

        }

        #loader {

            z-index: 999;
            height: 40px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 10%;
            position: relative;

        }

        .wrap {
            margin: 500px;
        }

        #text {
            font-family: var(--font-fam);
            color: var(--text-color);
            font-size: 20px;
            padding: 0 10px;

            font-weight: 500;
        }

        #percent {
            border: 1px solid black;
            font-family: var(--font-fam);
            color: var(--text-color);
            transition: var(--transition-effect);
            font-size: 16px;
            padding: 0 10px;
            font-weight: 500;
        }

        #bar {
            position: absolute;
            height: 40px;
            width: 100%;
            z-index: -1;
            border-top: 4px solid var(--bar-color);
            transform-origin: left;
            transform: scalex(0%);
            transition: var(--transition-effect);
        }

        #help {
            font-family: var(--font-fam);
            color: var(--text-color);
            font-size: 20px;
            position: absolute;
            top: 20px;
            font-weight: 600;
        }

        .table-wrap {
            margin: 10px;
            /* border: 1px solid rgba(0, 0, 0, 0.425); */
            border-radius: 10px;
        }



        th {
            text-align: inherit;
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .table {
            width: 100%;
            color: #212529;
        }

        .custom-list {
            list-style-type: disc;
            margin-left: 20px;
            margin-top: 10px;
        }
    </style>

    <div class="p-2 appform">
        <div class="innerforms forMobile">
            <div class="tableliner" style="width:100%;">
                <div class="tab-betail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="sadeSati-tab" data-toggle="tab" href="#sadeSatiPage" role="tab"
                                onclick="showPage('sadeSati', this),getSadheShati()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold ">SadeSati</a>

                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="sadeSati-tab" data-toggle="tab" href="#sadeSatiPage" role="tab"
                                onclick="showPage('sadeSati', this),getSadheShatiTable()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Sade-Sati
                                Table</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="friendship-tab" data-toggle="tab" href="#friendshipPage" role="tab"
                                onclick="showPage('friendship', this),getFriendshipTable()" aria-controls="contact"
                                aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Friendship Table</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getkpHouses()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Kp-Houses</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getkpHousesPlanet()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Kp-Houses Planet</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="gemSuggestion-tab" data-toggle="tab" href="#gemSuggestionPage" role="tab"
                                onclick="showPage('gemSuggestion', this),getGemSuggestion()" aria-controls="contact"
                                aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Gem
                                Suggestion</a>
                        </li>
                        <li class="nav-item mb-2 GeneralPrediction allBoxBorder" role="presentation">
                            <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage"
                                role="tab" onclick="showPage('extentdedHoroscope', this),getRudrakshSuggestion()"
                                aria-controls="contact" aria-selected="false"
                                class="border-0 nav-link text-uppercase font-weight-bold">Rudraksh Suggestion</a>
                        </li>

                    </ul>
                </div>
                <br>
                <h5 class="birth mahaPridiction" style="font-size: 17px;">Current Sade Sati
                    <hr class="kundlitag" style=" width: 160px;color:#fbe216 !important">
                </h5><br>
                <br>
                <div class="rashidescripton" style="margin: unset;">
  <div class="imgpara" style="display: block;">
    <div class="table-wrap DecSpace" style="overflow: auto;">
      <table class="table spaceTable">
        <thead class='SaniSadeSati trippleColor'>
          <tr>
            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.zodiac')</th>
            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.type')</th>
            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.startDate')</th>
            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.endDate')</th>
            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.retro')</th>
            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.dhaiya')</th>
            <th style="color: #3c3b3b;border: #dee2e6;">@lang('messages.direction')</th>
          </tr>
        </thead>
        <tbody class='colchange onlySadeSati'>
          @foreach ($sadeSatiTable as $item)
          <tr>
            <td class='sanisadisati'>
              {{ $item['zodiac'] }}
            </td>
            <td class='sanisadisati'>
              {{ $item['type'] }}
            </td>
            <td class='sanisadisati'>
              {{ $item['start_date'] }}
            </td>
            <td class='sanisadisati'>
              {{ $item['end_date'] }}
            </td>
            <td class='sanisadisati'>
              @if ($item['retro']) Yes @else No @endif
            </td>
            <td class='sanisadisati'>
              {{ $item['dhaiya'] }}
            </td>
            <td class='sanisadisati'>
              {{ $item['direction'] }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- The sliding hand image -->
      <div class="handImage" style="display: none;">
        <div class="slideimage">
          <img src="{{ url('images/sliderimage.png') }}" alt="Hand Image">
        </div>
      </div>
    </div>
  </div>
</div>

   
<script>
 // Function to check if the element is visible on the screen
function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Listen for the scroll event
window.addEventListener('scroll', function() {
  const decSpace = document.querySelector('.DecSpace');
  const handImage = document.querySelector('.handImage');
  
  // Check if the section is in view
  if (isElementInViewport(decSpace)) {
    handImage.style.display = 'flex'; // Show the handImage

    // Hide the hand image after 3 seconds
    setTimeout(() => {
      handImage.style.display = 'none';
    }, 6000);
  }
});


</script>