
<div class="p-2 appform">
    <div class="innerforms"><br>
        <div class="tagchart1 scrollbar" style="overflow: auto;">
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'D9' ? 'active' : '' }}" onclick="activateTab(this); showPage('kundli', this);getKundliChart('D9', '@lang('messages.navamsha')')">@lang('messages.navamsha')</a>
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'moon' ? 'active' : '' }}" onclick="showPage('kundli', this), getKundliChart('moon', '@lang('messages.moon')')">@lang('messages.moon')</a>
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'chalit' ? 'active' : '' }}" onclick="showPage('kundli', this), getKundliChart('chalit', '@lang('messages.chalit')')">@lang('messages.chalit')</a>
         
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'sun' ? 'active' : '' }}" onclick="showPage('kundli', this), getKundliChart('sun', '@lang('messages.sun')')">@lang('messages.sun')</a>
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'kp_chalit' ? 'active' : '' }}" onclick="showPage('kundli', this),getKundliChart('kp_chalit', '@lang('messages.kPChalit')')">@lang('messages.kPChalit')</a>
        </div>
        <div class="tagchart2 scrollbar" style="overflow: auto;">
            
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'D2' ? 'active' : '' }}" onclick="showPage('kundli',this),getKundliChart('D2', '@lang('messages.hora')')">@lang('messages.hora')</a>
               <a href="#kundliPage" class="chartbutton {{ $chartName == 'D3' ? 'active' : '' }}" onclick="showPage('kundli',this),getKundliChart('D3', '@lang('messages.drekkana')')">@lang('messages.drekkana')</a>
             <a href="#kundliPage" class="chartbutton {{ $chartName == 'D7' ? 'active' : '' }}" onclick="showPage('kundli', this), getKundliChart('D7', '@lang('messages.saptamansha')')">@lang('messages.saptamansha')</a>
            <a href="#kundliPage"
                class="chartbutton {{ $chartName == 'D10' ? 'active' : '' }}"
                onclick="showPage('kundli', this), getKundliChart('D10', '@lang('messages.dashamansha')')">@lang('messages.dashamansha')</a>
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'D12' ? 'active' : '' }}"
                onclick="showPage('kundli',this),getKundliChart('D12', '@lang('messages.dwadashamsha')')">@lang('messages.dwadashamsha')</a>
                    <a href="#kundliPage" class="chartbutton {{ $chartName == 'D40' ? 'active' : '' }}"
                onclick="showPage('kundli',this),getKundliChart('D40', '@lang('messages.khavedamsha')')">@lang('messages.khavedamsha')</a>
            <a href="#kundliPage" class="chartbutton {{ $chartName == 'D45' ? 'active' : '' }}"
                onclick="showPage('kundli',this),getKundliChart('D45', '@lang('messages.akshvedansha')')">@lang('messages.akshvedansha')</a>
        </div>
        <div class="container" style="width:max-width;" >
            <div  class="tableliner">
                <h5 id="chartTitle" class="birth" style="text-align: center;">@lang('messages.birthChart')
            <hr class="kundlitag birthchart">    
            </h5>
                {{--  <div class="kundliimg" style="overflow: scroll;">
                    {!! $kundliChartSvg !!}
                </div>  --}}
                <div class="kundliimg" style="width:100%">
                    {!! $kundliChartSvg !!}
                </div>
         </div>
    </div>
    <div id="kundliPage" class="appointastrojd">

    </div>
</div>
<script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var hash = window.location.hash.substring(1); // Removes the '#' character
        if (hash) {
            getHoroscope(hash);
            togglePageVisibility(hash);
        }
    });

    function togglePageVisibility(pageId) {
        var pages = document.querySelectorAll(".horosecond");
        pages.forEach(function(page) {
            page.classList.add("hidden");
        });

        var selectedPage = document.getElementById(pageId);
        selectedPage.classList.remove("hidden");
    }

 function getKundliChart(chartType, chartName) {
        var url = "{{ url('get-kundli-charts') }}";
        url += `?chartName=${chartType}`;
         $('#preloader').show();
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                     $('#preloader').hide();
                var kundli_chart = $('#kundliPage');
                kundli_chart.html(response);
                $('#chartTitle').html(`${chartName} Chart <hr class="kundlitag birthchart" style='margin-top:5px;'>`);

            },
            error: function(error) {
                console.log('Error:', error);
                 $('#preloader').hide();
            }
        });
    }
    function activateTab(element) {
        var tabs = document.querySelectorAll('.chartbutton');
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });
        element.classList.add('active');
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var chartName = "<?php echo $chartName; ?>";
        var chartButtons = document.querySelectorAll(".chartbutton");
        chartButtons.forEach(function(button) {
            if (button.getAttribute("onclick").includes(chartName)) {
                button.classList.add("active");
            }
        });
    });
</script>
