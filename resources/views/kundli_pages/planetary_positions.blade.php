
<div class="p-2 appform">
    <div class="innerforms">
        <div class="tableliner">
            <h5 class="birth" style="font-size: 17px;">Planetary Positions
                <hr class="kundlitag planetary" style=" width: 115px;">
            </h5><br>
            @if (isset($planetaryPositions) && is_array($planetaryPositions))
                <div class="scrollbar DecSpace" style="overflow-y: hidden;">
                    <table class="table spaceTable">
                        <thead class='SaniSadeSati trippleColor'>
                                <tr>
                                    <th>@lang('messages.name')</th>
                                    <th>@lang('messages.name')</th>
                                    <th>@lang('messages.localDegree')</th>
                                    <th>@lang('messages.globalDegree')</th>
                                    <th>@lang('messages.progress')</th>
                                    <th>@lang('messages.rasiNo')</th>
                                    <th> @lang('messages.zodiac')</th>
                                    <th>@lang('messages.house')</th>
                                    <th> @lang('messages.nakshatra')</th>
                                    <th>@lang('messages.nakshatraLord')</th>
                                    <th>@lang('messages.nakshatraPada')</th>
                                    <th>@lang('messages.zodiacLord')</th>
                                    <th>@lang('messages.planetSet')</th>
                                    <th>@lang('messages.lordStatus')</th>
                                    <th>@lang('messages.basicAwastha')</th>
                                </tr>

                        </thead>
                        <tbody class='colchange onlySadeSati'>
                            @foreach ($planetaryPositions as $position)
                                @if (!empty($position))
                                    <tr>
                                        <td class='sanisadisati'>{{ $position['name'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['full_name'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['local_degree'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['global_degree'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['progress_in_percentage'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['rasi_no'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['zodiac'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['house'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['nakshatra'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['nakshatra_lord'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['nakshatra_pada'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['zodiac_lord'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ isset($position['is_planet_set']) ? ($position['is_planet_set'] ? 'True' : 'False') : '-' }}
                                        </td>
                                        <td class='sanisadisati'>{{ $position['lord_status'] ?? '-' }}</td>
                                        <td class='sanisadisati'>{{ $position['basic_avastha'] ?? '-' }}</td>
                                    </tr>
                                @endif
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
            @else
                <p>No planetary positions available.</p>
            @endif
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