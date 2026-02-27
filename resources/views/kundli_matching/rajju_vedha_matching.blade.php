

<style>
    .progress-card {
        --color-accent: #333;
        --color-border: #e4e4e4;
        width: 100%;
        border-radius: 5px;
        margin-bottom: 1em;
        position: relative;
        overflow: hidden;
        border: 1px solid var(--color-border);
        border-bottom: 0;
    }

    .progress-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--color-accent);
        opacity: 0.05;
    }

    .progress-card.orange {
        --color-accent: #ffc48b;
    }

    .progress-card.purple {
        --color-accent: #b4b3ff;
    }

    .progress-card.pink {
        --color-accent: #ffb3c0;
    }

    .progress-card-content {
        padding: 0.7em;
    }

    .progress-card .progress-bar {
        background-color: var(--color-border);
        display: block;
        width: 100%;
        height: 5px;
        position: relative;
    }

    .progress-card .progress-bar::before {
        content: '';
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        height: 5px;
        background-color: var(--color-accent);
        opacity: 0.15;
    }

    .progress-card .progress-bar::after {
        content: '';
        width: var(--value);
        position: absolute;
        left: 0;
        top: 0;
        height: 5px;
        background-color: var(--color-accent);
    }

    .progress-title {
        font-weight: 600;
        margin-bottom: 0.25em;

            {
                {
                -- opacity: 0.9;
                --
            }
        }
    }

    .progress-description {
        font-size: 0.9rem;
        font-weight: 400;

            {
                {
                -- opacity: 0.85;
                --
            }
        }

        color: black;
    }

    .progress-card span {
        display: block;
    }

    .as-sign-box {

        margin-bottom: 15px;
        margin-top: 0px;
    }

    .ast_slider_wrapper {
        margin-bottom: 45px;
    }

    .ariesdescription {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-right: 0 !important;
        margin: 0 auto;
    }
</style>
<div class="p-2 appform">
    <div class="innerforms">
        <div class="tableliner" style="width:100%;">
            <h5 class="birth" style="font-size: 17px;">Rajju-Vedha
                <hr class="kundlitag" style=" width: 120px;color:#fbe216 !important">
            </h5>
            <div class="rashidescripton">
                <div class="imgpara" style="display: contents;">
                    <div class="ariesdescription">
                        <div class="card" style="padding: 20px;">

                            <div class="progress-card" style="--color-accent: #6a4e9c">
                                <div class="progress-card-content" style="padding: 15px;">
                                    @if ($data['response']['is_rajju_dosha_present'])
                                        <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                                            <h6 class="progress-title MangalDosh">
                                                @lang('messages.rajjuDescription')

                                            </h6>
                                            <h6 class="progress-title MangalDosh">
                                                @lang('messages.rajjuPart')
                                            </h6>
                                        </div>
                                        <br>
                                        <span
                                            class="progress-description">{{ $data['response']['rajju_description'] }}</span>
                                    @else
                                        <span class="progress-description">Rajju Dosha Not Available</span>
                                    @endif
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
