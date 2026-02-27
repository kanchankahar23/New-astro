function setREVStartSize(e) {
    //window.requestAnimationFrame(function() {
    window.RSIW =
      window.RSIW === undefined ? window.innerWidth : window.RSIW;
    window.RSIH =
      window.RSIH === undefined ? window.innerHeight : window.RSIH;
    try {
      var pw = document.getElementById(e.c).parentNode.offsetWidth,
        newh;
      pw =
        pw === 0 ||
          isNaN(pw) ||
          e.l == "fullwidth" ||
          e.layout == "fullwidth"
          ? window.RSIW
          : pw;
      e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
      e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
      e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
      e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
      e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
      e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
      e.mh =
        e.mh === undefined || e.mh == "" || e.mh === "auto"
          ? 0
          : parseInt(e.mh, 0);
      if (e.layout === "fullscreen" || e.l === "fullscreen")
        newh = Math.max(e.mh, window.RSIH);
      else {
        e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
        for (var i in e.rl)
          if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
        e.gh =
          e.el === undefined ||
            e.el === "" ||
            (Array.isArray(e.el) && e.el.length == 0)
            ? e.gh
            : e.el;
        e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
        for (var i in e.rl)
          if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

        var nl = new Array(e.rl.length),
          ix = 0,
          sl;
        e.tabw = e.tabhide >= pw ? 0 : e.tabw;
        e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
        e.tabh = e.tabhide >= pw ? 0 : e.tabh;
        e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
        for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
        sl = nl[0];
        for (var i in nl)
          if (sl > nl[i] && nl[i] > 0) {
            sl = nl[i];
            ix = i;
          }
        var m =
          pw > e.gw[ix] + e.tabw + e.thumbw
            ? 1
            : (pw - (e.tabw + e.thumbw)) / e.gw[ix];
        newh = e.gh[ix] * m + (e.tabh + e.thumbh);
      }
      var el = document.getElementById(e.c);
      if (el !== null && el) el.style.height = newh + "px";
      el = document.getElementById(e.c + "_wrapper");
      if (el !== null && el) {
        el.style.height = newh + "px";
        el.style.display = "block";
      }
    } catch (e) {
      console.log("Failure at Presize of Slider:" + e);
    }
    //});
  }

  var tpj = jQuery;

  var revapi1;

  if (window.RS_MODULES === undefined) window.RS_MODULES = {};
  if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
  RS_MODULES.modules["revslider11"] = {
    once:
      RS_MODULES.modules["revslider11"] !== undefined
        ? RS_MODULES.modules["revslider11"].once
        : undefined,
    init: function () {
      window.revapi1 =
        window.revapi1 === undefined ||
          window.revapi1 === null ||
          window.revapi1.length === 0
          ? document.getElementById("rev_slider_1_1")
          : window.revapi1;
      if (
        window.revapi1 === null ||
        window.revapi1 === undefined ||
        window.revapi1.length == 0
      ) {
        window.revapi1initTry =
          window.revapi1initTry === undefined
            ? 0
            : window.revapi1initTry + 1;
        if (window.revapi1initTry < 20)
          requestAnimationFrame(function () {
            RS_MODULES.modules["revslider11"].init();
          });
        return;
      }
      window.revapi1 = jQuery(window.revapi1);
      if (window.revapi1.revolution == undefined) {
        revslider_showDoubleJqueryError("rev_slider_1_1");
        return;
      }
      revapi1.revolutionInit({
        revapi: "revapi1",
        DPR: "dpr",
        sliderLayout: "fullwidth",
        visibilityLevels: "1240,1024,778,480",
        gridwidth: "1920,1024,778,480",
        gridheight: "800,680,930,800",
        lazyType: "smart",
        perspective: 600,
        perspectiveType: "global",
        editorheight: "800,680,930,800",
        responsiveLevels: "1240,1024,778,480",
        progressBar: {
          disableProgressBar: true,
        },
        navigation: {
          wheelCallDelay: 1000,
          onHoverStop: false,
          touch: {
            touchenabled: true,
            touchOnDesktop: true,
          },
          arrows: {
            enable: true,
            style: "hephaistos",
            hide_onmobile: true,
            hide_under: "1699px",
            hide_onleave: true,
            left: {
              h_offset: 30,
            },
            right: {
              h_offset: 30,
            },
          },
          tabs: {
            enable: true,
            tmp: '<div class="tp-tab-title">{{param1}}</div><div class="tp-tab-desc">{{title}}</div>',
            style: "hebe_copy24",
            hide_over: "1200px",
            h_offset: 10,
            v_offset: -42,
            space: 2,
            width: 50,
            height: 100,
            min_width: 50,
            wrapper_padding: 5,
            wrapper_color: "rgba(0, 122, 255, 0)",
            visibleAmount: 3,
          },
        },
        viewPort: {
          global: true,
          globalDist: "-200px",
          enable: false,
        },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid: true,
        },
      });
    },
  }; // End of RevInitScript

  if (window.RS_MODULES.checkMinimal !== undefined) {
    window.RS_MODULES.checkMinimal();
  }

  var wc_single_product_params = {
    i18n_required_rating_text: "Please select a rating",
    review_rating_required: "yes",
    flexslider: {
      rtl: false,
      animation: "slide",
      smoothHeight: true,
      directionNav: false,
      controlNav: "thumbnails",
      slideshow: false,
      animationSpeed: 500,
      animationLoop: false,
      allowOneSlide: false,
    },
    zoom_enabled: "1",
    zoom_options: [],
    photoswipe_enabled: "1",
    photoswipe_options: {
      shareEl: false,
      closeOnScroll: false,
      history: false,
      hideAnimationDuration: 0,
      showAnimationDuration: 0,
    },
    flexslider_enabled: "1",
  };

  var wc_add_to_cart_variation_params = {
    wc_ajax_url: "\/wp\/astrologer\/demo2\/?wc-ajax=%%endpoint%%",
    i18n_no_matching_variations_text:
      "Sorry, no products matched your selection. Please choose a different combination.",
    i18n_make_a_selection_text:
      "Please select some product options before adding this product to your cart.",
    i18n_unavailable_text:
      "Sorry, this product is unavailable. Please choose a different combination.",
  };


  jQuery(function (jQuery) {
    jQuery.datepicker.setDefaults({
      closeText: "Close",
      currentText: "Today",
      monthNames: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ],
      monthNamesShort: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      nextText: "Next",
      prevText: "Previous",
      dayNames: [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ],
      dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      dayNamesMin: ["S", "M", "T", "W", "T", "F", "S"],
      dateFormat: "MM d, yy",
      firstDay: 1,
      isRTL: false,
    });
  });

  if (typeof revslider_showDoubleJqueryError === "undefined") {
    function revslider_showDoubleJqueryError(sliderID) {
      console.log(
        "You have some jquery.js library include that comes after the Slider Revolution files js inclusion."
      );
      console.log("To fix this, you can:");
      console.log(
        "1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on"
      );
      console.log("2. Find the double jQuery.js inclusion and remove it");
      return "Double Included jQuery Library";
    }
  }

  (function () {
    var c = document.body.className;
    c = c.replace(/woocommerce-no-js/, "woocommerce-js");
    document.body.className = c;
  })();

  (function () {
    var c = document.body.className;
    c = c.replace(/woocommerce-no-js/, "woocommerce-js");
    document.body.className = c;
  })();

  window.RS_MODULES = window.RS_MODULES || {};
  window.RS_MODULES.modules = window.RS_MODULES.modules || {};
  window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
  window.RS_MODULES.defered = true;
  window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
  window.RS_MODULES.type = "compiled";

  setREVStartSize({
    c: "rev_slider_1_1",
    rl: [1240, 1024, 778, 480],
    el: [800, 680, 930, 800],
    gw: [1920, 1024, 778, 480],
    gh: [800, 680, 930, 800],
    type: "standard",
    justify: "",
    layout: "fullwidth",
    mh: "0",
  });
  if (
    window.RS_MODULES !== undefined &&
    window.RS_MODULES.modules !== undefined &&
    window.RS_MODULES.modules["revslider11"] !==
    undefined
  ) {
    window.RS_MODULES.modules[
      "revslider11"
    ].once = false;
    window.revapi1 = undefined;
    if (
      window.RS_MODULES.checkMinimal !==
      undefined
    )
      window.RS_MODULES.checkMinimal();
  }