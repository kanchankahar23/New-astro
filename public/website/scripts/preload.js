// Script 1 ------------------------------------------------------------------------------------
let mp_ajax_url =
  "https://kamleshyadav.com/wp/astrologer/demo2/wp-admin/admin-ajax.php";
let mp_currency_symbol = "&#36;";
let mp_currency_position = "left";
let mp_currency_decimal = ".";
let mp_currency_thousands_separator = ",";
let mp_num_of_decimal = "2";
let mp_empty_image_url =
  "https://kamleshyadav.com/wp/astrologer/demo2/wp-content/plugins/mage-eventpress/assets/helper/images/no_image.png";
let mp_date_format = "'D d M , yy'";

// Script 2 ------------------------------------------------------------------------------------

window._wpemojiSettings = {
  baseUrl: "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
  ext: ".png",
  svgUrl: "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
  svgExt: ".svg",
  source: {
    concatemoji:
      "https:\/\/kamleshyadav.com\/wp\/astrologer\/demo2\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.3",
  },
};
/*! This file is auto-generated */
!(function (i, n) {
  var o, s, e;

  function c(e) {
    try {
      var t = {
        supportTests: e,
        timestamp: new Date().valueOf(),
      };
      sessionStorage.setItem(o, JSON.stringify(t));
    } catch (e) {}
  }

  function p(e, t, n) {
    e.clearRect(0, 0, e.canvas.width, e.canvas.height),
      e.fillText(t, 0, 0);
    var t = new Uint32Array(
        e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
      ),
      r =
        (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
        e.fillText(n, 0, 0),
        new Uint32Array(
          e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
        ));
    return t.every(function (e, t) {
      return e === r[t];
    });
  }

  function u(e, t, n) {
    switch (t) {
      case "flag":
        return n(
          e,
          "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f",
          "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f"
        )
          ? !1
          : !n(
              e,
              "\ud83c\uddfa\ud83c\uddf3",
              "\ud83c\uddfa\u200b\ud83c\uddf3"
            ) &&
              !n(
                e,
                "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
              );
      case "emoji":
        return !n(
          e,
          "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff",
          "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff"
        );
    }
    return !1;
  }

  function f(e, t, n) {
    var r =
        "undefined" != typeof WorkerGlobalScope &&
        self instanceof WorkerGlobalScope
          ? new OffscreenCanvas(300, 150)
          : i.createElement("canvas"),
      a = r.getContext("2d", {
        willReadFrequently: !0,
      }),
      o = ((a.textBaseline = "top"), (a.font = "600 32px Arial"), {});
    return (
      e.forEach(function (e) {
        o[e] = t(a, e, n);
      }),
      o
    );
  }

  function t(e) {
    var t = i.createElement("script");
    (t.src = e), (t.defer = !0), i.head.appendChild(t);
  }
  "undefined" != typeof Promise &&
    ((o = "wpEmojiSettingsSupports"),
    (s = ["flag", "emoji"]),
    (n.supports = {
      everything: !0,
      everythingExceptFlag: !0,
    }),
    (e = new Promise(function (e) {
      i.addEventListener("DOMContentLoaded", e, {
        once: !0,
      });
    })),
    new Promise(function (t) {
      var n = (function () {
        try {
          var e = JSON.parse(sessionStorage.getItem(o));
          if (
            "object" == typeof e &&
            "number" == typeof e.timestamp &&
            new Date().valueOf() < e.timestamp + 604800 &&
            "object" == typeof e.supportTests
          )
            return e.supportTests;
        } catch (e) {}
        return null;
      })();
      if (!n) {
        if (
          "undefined" != typeof Worker &&
          "undefined" != typeof OffscreenCanvas &&
          "undefined" != typeof URL &&
          URL.createObjectURL &&
          "undefined" != typeof Blob
        )
          try {
            var e =
                "postMessage(" +
                f.toString() +
                "(" +
                [JSON.stringify(s), u.toString(), p.toString()].join(
                  ","
                ) +
                "));",
              r = new Blob([e], {
                type: "text/javascript",
              }),
              a = new Worker(URL.createObjectURL(r), {
                name: "wpTestEmojiSupports",
              });
            return void (a.onmessage = function (e) {
              c((n = e.data)), a.terminate(), t(n);
            });
          } catch (e) {}
        c((n = f(s, u, p)));
      }
      t(n);
    })
      .then(function (e) {
        for (var t in e)
          (n.supports[t] = e[t]),
            (n.supports.everything =
              n.supports.everything && n.supports[t]),
            "flag" !== t &&
              (n.supports.everythingExceptFlag =
                n.supports.everythingExceptFlag && n.supports[t]);
        (n.supports.everythingExceptFlag =
          n.supports.everythingExceptFlag && !n.supports.flag),
          (n.DOMReady = !1),
          (n.readyCallback = function () {
            n.DOMReady = !0;
          });
      })
      .then(function () {
        return e;
      })
      .then(function () {
        var e;
        n.supports.everything ||
          (n.readyCallback(),
          (e = n.source || {}).concatemoji
            ? t(e.concatemoji)
            : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)));
      }));
})((window, document), window._wpemojiSettings);


// Script 3 ------------------------------------------------------------------------------------


var mep_ajax = {
  mep_ajaxurl:
    "https:\/\/kamleshyadav.com\/wp\/astrologer\/demo2\/wp-admin\/admin-ajax.php",
};
var Astro_ajax_path = {
  url: "https:\/\/kamleshyadav.com\/wp\/astrologer\/demo2\/wp-admin\/admin-ajax.php",
  disbale_cafe_datas: "[]",
};
var moc_obj = {
  ajax_url:
    "https:\/\/kamleshyadav.com\/wp\/astrologer\/demo2\/wp-admin\/admin-ajax.php",
};
var wsfw_public_param = {
  ajaxurl:
    "https:\/\/kamleshyadav.com\/wp\/astrologer\/demo2\/wp-admin\/admin-ajax.php",
  nonce: "ed4022283e",
  datatable_pagination_text: "Rows per page _MENU_",
  datatable_info: "_START_ - _END_ of _TOTAL_",
  wsfw_ajax_error: "An error occured!",
  wsfw_amount_error: "Enter amount greater than 0",
  wsfw_min_wallet_withdrawal:
    "Wallet Withdrawal Amount Must Be Greater Than",
  wsfw_max_wallet_withdrawal:
    "Wallet Withdrawal Amount Should Be Less Than",
  wsfw_min_wallet_transfer: "Wallet Transfer Amount Must Be Greater Than",
  wsfw_max_wallet_transfer: "Wallet Transfer Amount Should Be Less Than",
  wsfw_partial_payment_msg: "Amount want to use from wallet",
  wsfw_apply_wallet_msg: "Apply wallet",
  wsfw_transfer_amount_error:
    "Transfer amount should be less than or equal to wallet balance.",
  wsfw_withdrawal_amount_error:
    "Withdrawal amount should be less than or equal to wallet balance.",
  wsfw_recharge_minamount_error:
    "Recharge amount should be greater than or equal to ",
  wsfw_recharge_maxamount_error:
    "Recharge amount should be less than or equal to ",
  wsfw_wallet_transfer: "You cannot transfer amount to yourself.",
  wsfw_unset_amount: "Wallet Amount Removed",
};
var wsfw_common_param = {
  ajaxurl:
    "https:\/\/kamleshyadav.com\/wp\/astrologer\/demo2\/wp-admin\/admin-ajax.php",
  nonce: "c35fe769cf",
};
var woocommerce_params = {
  ajax_url: "\/wp\/astrologer\/demo2\/wp-admin\/admin-ajax.php",
  wc_ajax_url: "\/wp\/astrologer\/demo2\/?wc-ajax=%%endpoint%%",
};

// Script 4 ------------------------------------------------------------------------------------
