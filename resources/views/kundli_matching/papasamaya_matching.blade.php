<style>
    .active-tab {
        background-color: #f0f0f0;
        /* Example active tab background color */
    }
</style>


<div class="p-2 appform">
    <div class="innerforms">
        <div class="tableliner" style="width:100%;">
            <h5 class="birth" style="font-size: 17px;">Papasamaya Matching
                <hr class="kundlitag"
                    style=" width: 203px;color:#fbe216 !important">
            </h5>
            <div class="rashidescripton">
                <div class="imgpara" style="display: contents;">
                    <div class="table-wrap scrollbar"
                        style="overflow: auto;cursor: grab;">
                        <table
                            class="table table-striped paPaSamaya taBleOfPapasamaya">
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='responsetr' scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500; width: 30% !important;">
                                        @lang('messages.rahuPapa')
                                    </td>
                                    <td class='responsetr' scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['boy_papa']['rahu_papa']
                                        }}
                                    </td>
                                    <td class='responsetr' scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['girl_papa']['rahu_papa']
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        @lang('messages.sunPapa')
                                    </td>
                                    <td scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['boy_papa']['sun_papa']
                                        }}
                                    </td>
                                    <td scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['girl_papa']['sun_papa']
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class='responsetr' scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        @lang('messages.saturnPapa')
                                    </td>
                                    <td class='responsetr' scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['boy_papa']['saturn_papa']
                                        }}
                                    </td>
                                    <td class='responsetr' scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['girl_papa']['saturn_papa']
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        @lang('messages.marsPapa')
                                    </td>
                                    <td scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['boy_papa']['mars_papa']
                                        }}
                                    </td>
                                    <td scope="row"
                                        style="text-align: center; font-size: 0.9rem;font-weight: 500;">
                                        {{
                                        $data['response']['girl_papa']['mars_papa']
                                        }}
                                    </td>
                                </tr>


                                <tr class='longParaTable'>

                                    <td style='text-align:center;'>
                                        <b style="    padding: 10px;"> {{
                                            $data['response']['bot_response']
                                            }}</b>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {{-- <div class="ariesdescription">
                        <div class="card" style="padding: 20px;">
                            <div class="progress-card"
                                style="--color-accent: #6a4e9c">
                                <div class="progress-card-content"
                                    style="padding: 15px;">
                                    <div
                                        style="display: flex;justify-content:space-between;margin-top: 5px;">
                                        <h6 class="progress-title">Extended
                                            Response</h6>
                                        <h6 class="progress-title">Overall Score
                                            :
                                            {{ $data['response']['score'] ??
                                            '--' }}</h6>
                                    </div>
                                    <br>
                                    <span class="progress-description">{{
                                        $data['response']['extended_response']
                                        ?? '--' }}
                                    </span>
                                </div>
                                <span class="progress-bar"
                                    style="--value:100%;"></span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>