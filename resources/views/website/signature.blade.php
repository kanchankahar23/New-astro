<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astrobuddy | Signature</title>
    <link rel="icon" href="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}" sizes="32x32" />
    <link
      rel="icon"
      href="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}"
      sizes="192x192"
    />
    <link rel="stylesheet" href="{{ asset('website/styles/style.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css')}}">
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
    <div class="signature-contain">
      <div class="signatureverlay"></div>
      <div class="ast_banner_text">
        <div class="ast_waves3">
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
        </div>
        <div class="appointment">
          <div class="appheading">
            <h2>Signature Reading</h2>
          </div>

          <ul class="homeapp">
            <li><a href="">Home</a></li>
            <li>//</li>
            <li><a href="" class="hh2appoint">Signature Reading</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!--Slider End-->

    <!--Price Start-->
    <div class="ast_packages_wrapper ast_bottompadder70">
      <div class="signreading">
        <div class="signfirst">
          <div class="signupper">
            <h3>Some other types of Signatures</h3>
          </div>

          <div class="signheading">
            <div class="resignature">
              <a class="signtag" onclick="NumeroLogy('basic')" >
              Vertical expansion
            </a>
              <a  class="signtag" onclick="NumeroLogy('intro')"
                >Line Below</a
              >
              <a

              class="signtag"
              onclick="NumeroLogy('kundli')"
              >Dot at the end</a
            >
            <a  class="signtag" onclick="NumeroLogy('dasha')"
              >Signature Slashing</a
            >
            </div>

            <div class="resignature">
              <a

                class="signtag"
                onclick="NumeroLogy('report')"
                >Cirled Signature</a
              >
              <a  class="signtag" onclick="NumeroLogy('leo')"
                >Line Roofing</a
              >

              <a  class="signtag" onclick="NumeroLogy('virgo')"
                >Thread like Signature</a
              >
              <a  class="signtag" onclick="NumeroLogy('libra')"
                >Beginning Letters</a
              >
            </div>


<script>
let signtag = document.querySelectorAll('.signtag');

signtag.forEach((element) => {
  element.addEventListener('click', () => {
    signtag.forEach(tag => {
      tag.classList.remove('signActive');
    });
    element.classList.add('signActive');
  });
});


</script>

          </div>

          <div class="signsection">
            <div id="basicPage" class="readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Vertical Expansion in the Signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>
                        When the signature grows vertically (height-wise), it indicates that you strive for distinctive reputation.  See the signature of Dev Anand, cine artist. All the letters are vertically expanded. The D represents that he is a good reader and the bottom looping of D represents that he is an artist.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/dev-anand.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <div id="introPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Lines below the signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>

                          A single horizontal line below the signature represents that the person has achieved control and stability in his thoughts. See the long line below the signature of APJ AbdulKalam, former president of India.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/kalam.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <div id="kundliPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Dots at the end of the signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>

                          A single dot placed at the end of the signature represents that you do not trust others easily and you love some fine art.  Two dots below the signature represent that you are romantic and you give more importance to beauty.  This is clearly shown in the signature of Amitabh Bachchan, cine artist.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/amitabh.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <div id="dashaPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Signature slashing towards left</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>

                          When the end stroke of the signature turns left and strikes back the name, the person will attack himself and becomes his own victim. In the signature of Michael Jackson, famous singer and dancer, we can observe the loop of L coming back and striking the M. The J looks like a knife. These factors represent death like situation where he may kill himself either by a knife or by taking poison.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/michael.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <div id="reportPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Circled signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>
                          A circle or enclosed ring around the signature symbolizes protection against the anxiety and retreat. See the big loop of L encircling the word: Michael, in the signature of Michael Jackson.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/perry')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <div id="leoPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Line roofing the signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p> When a long line is written above the signature as a roof over it, it is an indication of creative, spiritual and intellectual ambitions of the person.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/roofing.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>
            <div id="virgoPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Thread like signature </li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>


                          If your signature looks like a thread connecting the letters, you are capable of reading others thoughts and can solve others problems. See the signature of Mahatma Gandhi, freedom fighter. The bottom loop of G terminating in anti-clock wise direction represents danger from weapons.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/gandhi.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>
            <div id="libraPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Beginning letters in the signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>
 If the beginning capital letter is small, the person has low confidence and doubts his own abilities. A person uses small capitals in the signature after he or she has undergone some injury or surgical operation. See the signature of Steve Jobs, CEO of Apple Computer. The first letters S and J are both in lower case.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/steve.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>
            <div id="scorpioPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Vertical Expansion in the Signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>
When the signature grows vertically (height-wise), it indicates that you strive for distinctive reputation.  See the signature of Dev Anand, cine artist. All the letters are vertically expanded. The D represents that he is a good reader and the bottom looping of D represents that he is an artist.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/dev-anand.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>
            <div id="sagittairusPage" class="hidden readingsection">
              <div class="appform">
                <div class="description-horo">
                  <div
                    class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                  >
                    <div
                      class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                    style="padding-left: 0;">
                      <ul>
                        <li class="lifepath">Vertical Expansion in the Signature</li>
                        <h4 class="lifeunder"><span>&nbsp;</span></h4>
                      </ul>
                    </div>
                  </div>

                  <div class="typessignature">
                    <div class="imgpara">
                      <div class="signdesc">
                        <p>
When the signature grows vertically (height-wise), it indicates that you strive for distinctive reputation.  See the signature of Dev Anand, cine artist. All the letters are vertically expanded. The D represents that he is a good reader and the bottom looping of D represents that he is an artist.
                        </p>
                      </div>
                      <div class="signalogyimg">
                        <img src="{{ asset('website/assets/header/dev-anand.jpg')}}" alt="" />
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="signsection">
          <div class="registerd">
            <div class="appform">
              <div class="description-horo">
                <div
                  class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1"
                >
                  <div
                    class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper"
                  >
                    <ul>
                      <li class="lifepath">Put Your Signature For Better Luck</li>
                      <h4 class="lifeunder"><span>&nbsp;</span></h4>
                    </ul>
                  </div>
                </div>

                <div class="introdescripton">
                  <div class="signdescription">
                    <p>Signaturology represent the mentality of a person. By doing signature analysis, we can understand the future of any person. Knowing the characteristics of a good signature is also called calligraphy. We will analyze the celebrities signatures and various parts like vertical expansion in signature, dots and lines in signature, circled signature, signature slashing left, thread like signature.
                    </p>
                    <p>


Your signature represents the inner you. When you are about to sign, you will mentally visualize the name in a particular way whose impression is stored in your brain. Your fingers and hand movement then stimulates the nerves of the brain in such a way that the signature is stored in your sub conscious. This is the reason most of the people will never be willing to change their signature. Hence, good or bad strokes in your signature will put you into good or bad situations. First, let us analyze to know which qualities in the signature are good and which are bad. After that, we can understand how to put a signature in a better way to attract luck. This is also called 'Signaturology'.

                    </p>
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
      crossorigin="anonymous" ></script>
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
        let numlogy = document.querySelectorAll(".readingsection");
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
