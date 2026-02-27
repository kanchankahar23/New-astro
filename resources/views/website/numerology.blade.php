<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astrobuddy | Numerology</title>
    <link rel="stylesheet" href="{{ asset('website/styles/style.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css')}}">

    <link rel="icon" href="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}" sizes="32x32" />
    <link
      rel="icon"
      href="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}"
      sizes="192x192"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css')}}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('website/plugins/astro-appointment/assets/css/style.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1')}}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css')}}"
    />

    <link
      rel="stylesheet"
      href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1')}}"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap"
      rel="stylesheet"
      property="stylesheet"
      media="all"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
   
  </head>
  <body>
    @include('website.website_header')
    <!--Slider Start-->
    <div class="ast_slider_wrapper">
      <div class="astrooverlay"></div>
      <div class="ast_banner_text">
        <div class="ast_waves3">
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
        </div>
        <div class="appointment">
          <div class="appheading">
            <h2>Numerology</h2>
          </div>

          <ul class="homeapp">
            <li><a href="">Home</a></li>
            <li>//</li>
            <li><a href="" class="hh2appoint">Numerology</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!--Slider End-->

    <!--Price Start-->
    <div class="ast_packages_wrapper ast_bottompadder70">
      <div class="horoscope">
        <div class="horofirst">
          <div class="uppersign">
            <h3>Numerology</h3>
          </div>

          <div class="numrashitag">
            <div class="numlobox">
              <a
                href="#basicPage"
                class="numankr"
                onclick="NumeroLogy('basic')"
                style="font-size: 35px"
              >
                <i class="fa-solid fa-arrow-up-from-bracket"></i
              ></a>
              <a href="#introPage" class="numankr" onclick="NumeroLogy('intro')"
                >01</a
              >
            </div>
            <div class="numlobox">
              <a
                href="#kundliPage"
                class="numankr"
                onclick="NumeroLogy('kundli')"
                >02</a
              >
              <a href="#dashaPage" class="numankr" onclick="NumeroLogy('dasha')"
                >03</a
              >
            </div>
            <div class="numlobox">
              <a
                href="#reportPage"
                class="numankr"
                onclick="NumeroLogy('report')"
                >04</a
              >
              <a href="#leoPage" class="numankr" onclick="NumeroLogy('leo')"
                >05</a
              >
            </div>
            <div class="numlobox">
              <a href="#virgoPage" class="numankr" onclick="NumeroLogy('virgo')"
                >06</a
              >
              <a href="#libraPage" class="numankr" onclick="NumeroLogy('libra')"
                >07</a
              >
            </div>
            <div class="numlobox">
              <a
                href="#scorpioPage"
                class="numankr"
                onclick="NumeroLogy('scorpio')"
                >08</a
              >
              <a
                href="#sagittairusPage"
                class="numankr"
                onclick="NumeroLogy('sagittairus')"
                >09</a
              >
            </div>
          </div>
        </div>

        <div class="horosection">
          <div id="basicPage" class="horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li class="lifepath">What's A Life-Path Number?</li>
                      <h4 class="lifeunder"><span>&nbsp;</span></h4>
                    </ul>
                  </div>
                </div>

                <div class="introdescripton">
                  <div class="intronum">
                    <p>
                      Your Life-Path number is probably the most influential
                      numerological aspect to be considered. This number
                      istermined by your birth date and represents who you are
                      at this time. It indicates specific traits that are
                      present and will likely be active and influential
                      throughout your lifetime. Enter your birth information
                      below to calculate your Life Path Number and get your
                      Daily Numeroscope:
                    </p>
                    <p>
                      Let's say your birthday is August 18, 1989. To calculate
                      your Life Path Number, you will reduce each component of
                      this date to a single digit:
                      <br />
                      <br />
                      The month, 8, remains a single digit =
                      <span class="numbold">8.</span>
                      <br />
                      The date, 18, is reduced to
                      <span class="numbold"> 1 + 8 = 9.</span>
                      <br />
                      The year, = 1989, is reduced to
                      <span class="numbold">1 + 9 + 8 + 9.</span> This equals
                      27.
                      <br />
                      Then, 27 is reduced to
                      <span class="numbold">2 + 7 = 9.</span>
                      <br />
                      <br />
                      Then, we add the reduced month, date, and year numbers
                      <span class="numbold">(8 + 9 + 9)</span> and arrive at
                      <span class="numbold">26.</span> Finally, we add
                      <span class="numbold">2 + 6,</span> and reach
                      <span class="numbold">8.</span> If you were born on August
                      18, 1989, your Life Path Number is
                      <span class="numbold">8.</span>
                    </p>
                  </div>

                  <div class="pointdes" style="margin-top: 30px">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li class="lifepath">Enter Your Date Of Birth:</li>
                        <h4 class="lifeunder" style="margin-top: -5px">
                          <span>&nbsp;</span>
                        </h4>
                      </ul>
                      <div class="hs_num_input_wrapper i-date">
                        <input type="text" placeholder="29/03/2024" />
                      </div>
                      <div class="submitbtn">
                        <button>Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="introPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/1 (4).png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 1</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/num1.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="kundliPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/2 (1).png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 2</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/2big.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="dashaPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/three.png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 3</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/3big.jpeg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="reportPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/number-4.png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 4</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/4big.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="leoPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/number-5.png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 5</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/5big.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="virgoPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/6 (1).png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 6</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/6big.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="libraPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/7.png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 1</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/7big.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="scorpioPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/8.png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 8</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/8big.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="sagittairusPage" class="hidden horosecond">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div class="hs_slider_tabs_icon_wrapper">
                    <img src="{{ asset('website/assets/Zodiac/9.png')}}" alt="" />
                  </div>
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li>
                        <a href="#" class="hs_tabs_btn">Life-Path Number 9</a>
                      </li>
                      <li>31 March - 12 October</li>
                    </ul>
                  </div>
                </div>

                <div class="rashidescripton">
                  <div class="imgpara">
                    <div class="imgnumlogy">
                      <img src="{{ asset('website/assets/Zodiac/9big.jpg')}}" alt="" />
                    </div>
                    <div class="numdesc">
                      <p>
                        As a Life-Path Number 1, you possess qualities
                        associated with leadership, independence, and ambition.
                        Life-Path Number, derived from your date of birth, is
                        believed in numerology to represent your core attributes
                        and potential in this lifetime. Here's a breakdown of
                        what being a Life-Path Number 1 might entail:
                      </p>
                    </div>
                  </div>

                  <div class="pointdes">
                    <div
                      class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper"
                    >
                      <ul>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Leadership</span> : You're likely to have a
                              natural inclination towards leadership roles. You
                              have the ability to take charge of situations and
                              inspire others to follow your lead.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Independence</span> : Independence is a key
                              trait of individuals with a Life-Path Number 1.
                              You prefer to do things your own way and may find
                              it challenging to follow others unless you deeply
                              respect their leadership.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span>Ambition</span> : You have a strong drive to
                              succeed and achieve your goals. Ambition fuels
                              your actions and propels you forward even in the
                              face of obstacles.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div class="hs_pr_icon_wrapper">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              <span> Assertiveness </span>: You're not afraid to
                              speak your mind and assert yourself when
                              necessary. Your assertiveness helps you command
                              respect and assert your authority when leading
                              others.
                            </p>
                          </div>
                        </li>
                        <li>
                          <div
                            class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper"
                          >
                            <p class="leadpoint">
                              Remember, while numerology can provide insights into your personality and tendencies, it's not deterministic. You have the power to shape your own destiny through your actions, choices, and attitudes.
                            </p>
                          </div>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--Price End-->
    @include('website.website_footer')
    <script
      src="https://kit.fontawesome.com/66f2518709.js"
      crossorigin="anonymous"
    ></script>
    <script>
      // JavaScript function to toggle visibility of different sections based on clicked button

      // <a
      //           href="#basicPage"
      //           class="numankr"
      //           onclick="NumeroLogy('basic')"
      //           style="font-size: 35px"
      //         >

      function NumeroLogy(pageId) {
        // Hide all pages
        let numlogy = document.querySelectorAll(".horosecond");
        numlogy.forEach(function (page) {
          page.classList.add("hidden");
        });

        // Show the selected page
        let selectedNum = document.getElementById(pageId + "Page");
        selectedNum.classList.remove("hidden");
      }
    </script>

    <script
      src="https://kit.fontawesome.com/66f2518709.js"
      crossorigin="anonymous"
    ></script>

    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1')}}"></script>

    <!-- SCRIPTS ENDS -->

  <script
    src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215')}}"
    id="astrologer-custom-script-js"
  ></script>



  <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>

  </body>
</html>
