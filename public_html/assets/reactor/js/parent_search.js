window.Modernizr = function (t, e, n) {
    function i(t) {
        p.cssText = t
    }

    function o(t, e) {
        return typeof t === e
    }

    var r, s, a, l = "2.8.3", c = {}, u = !0, h = e.documentElement, d = "modernizr", f = e.createElement(d),
        p = f.style, g = ({}.toString, " -webkit- -moz- -o- -ms- ".split(" ")), m = {}, v = [], y = v.slice,
        b = function (t, n, i, o) {
            var r, s, a, l, c = e.createElement("div"), u = e.body, f = u || e.createElement("body");
            if (parseInt(i, 10))for (; i--;)a = e.createElement("div"), a.id = o ? o[i] : d + (i + 1), c.appendChild(a);
            return r = ["&#173;", '<style id="s', d, '">', t, "</style>"].join(""), c.id = d, (u ? c : f).innerHTML += r, f.appendChild(c), u || (f.style.background = "", f.style.overflow = "hidden", l = h.style.overflow, h.style.overflow = "hidden", h.appendChild(f)), s = n(c, t), u ? c.parentNode.removeChild(c) : (f.parentNode.removeChild(f), h.style.overflow = l), !!s
        }, w = {}.hasOwnProperty;
    a = o(w, "undefined") || o(w.call, "undefined") ? function (t, e) {
        return e in t && o(t.constructor.prototype[e], "undefined")
    } : function (t, e) {
        return w.call(t, e)
    }, Function.prototype.bind || (Function.prototype.bind = function (t) {
        var e = this;
        if ("function" != typeof e)throw new TypeError;
        var n = y.call(arguments, 1), i = function () {
            if (this instanceof i) {
                var o = function () {
                };
                o.prototype = e.prototype;
                var r = new o, s = e.apply(r, n.concat(y.call(arguments)));
                return Object(s) === s ? s : r
            }
            return e.apply(t, n.concat(y.call(arguments)))
        };
        return i
    }), m.touch = function () {
        var n;
        return "ontouchstart" in t || t.DocumentTouch && e instanceof DocumentTouch ? n = !0 : b(["@media (", g.join("touch-enabled),("), d, ")", "{#modernizr{top:9px;position:absolute}}"].join(""), function (t) {
            n = 9 === t.offsetTop
        }), n
    };
    for (var x in m)a(m, x) && (s = x.toLowerCase(), c[s] = m[x](), v.push((c[s] ? "" : "no-") + s));
    return c.addTest = function (t, e) {
        if ("object" == typeof t)for (var i in t)a(t, i) && c.addTest(i, t[i]); else {
            if (t = t.toLowerCase(), c[t] !== n)return c;
            e = "function" == typeof e ? e() : e, "undefined" != typeof u && u && (h.className += " " + (e ? "" : "no-") + t), c[t] = e
        }
        return c
    }, i(""), f = r = null, function (t, e) {
        function n(t, e) {
            var n = t.createElement("p"), i = t.getElementsByTagName("head")[0] || t.documentElement;
            return n.innerHTML = "x<style>" + e + "</style>", i.insertBefore(n.lastChild, i.firstChild)
        }

        function i() {
            var t = y.elements;
            return "string" == typeof t ? t.split(" ") : t
        }

        function o(t) {
            var e = v[t[g]];
            return e || (e = {}, m++, t[g] = m, v[m] = e), e
        }

        function r(t, n, i) {
            if (n || (n = e), u)return n.createElement(t);
            i || (i = o(n));
            var r;
            return r = i.cache[t] ? i.cache[t].cloneNode() : p.test(t) ? (i.cache[t] = i.createElem(t)).cloneNode() : i.createElem(t), !r.canHaveChildren || f.test(t) || r.tagUrn ? r : i.frag.appendChild(r)
        }

        function s(t, n) {
            if (t || (t = e), u)return t.createDocumentFragment();
            n = n || o(t);
            for (var r = n.frag.cloneNode(), s = 0, a = i(), l = a.length; s < l; s++)r.createElement(a[s]);
            return r
        }

        function a(t, e) {
            e.cache || (e.cache = {}, e.createElem = t.createElement, e.createFrag = t.createDocumentFragment, e.frag = e.createFrag()), t.createElement = function (n) {
                return y.shivMethods ? r(n, t, e) : e.createElem(n)
            }, t.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + i().join().replace(/[\w\-]+/g, function (t) {
                    return e.createElem(t), e.frag.createElement(t), 'c("' + t + '")'
                }) + ");return n}")(y, e.frag)
        }

        function l(t) {
            t || (t = e);
            var i = o(t);
            return y.shivCSS && !c && !i.hasCSS && (i.hasCSS = !!n(t, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), u || a(t, i), t
        }

        var c, u, h = "3.7.0", d = t.html5 || {},
            f = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
            p = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
            g = "_html5shiv", m = 0, v = {};
        !function () {
            try {
                var t = e.createElement("a");
                t.innerHTML = "<xyz></xyz>", c = "hidden" in t, u = 1 == t.childNodes.length || function () {
                        e.createElement("a");
                        var t = e.createDocumentFragment();
                        return "undefined" == typeof t.cloneNode || "undefined" == typeof t.createDocumentFragment || "undefined" == typeof t.createElement
                    }()
            } catch (n) {
                c = !0, u = !0
            }
        }();
        var y = {
            elements: d.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",
            version: h,
            shivCSS: d.shivCSS !== !1,
            supportsUnknownElements: u,
            shivMethods: d.shivMethods !== !1,
            type: "default",
            shivDocument: l,
            createElement: r,
            createDocumentFragment: s
        };
        t.html5 = y, l(e)
    }(this, e), c._version = l, c._prefixes = g, c.testStyles = b, h.className = h.className.replace(/(^|\s)no-js(\s|$)/, "$1$2") + (u ? " js " + v.join(" ") : ""), c
},  function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
},  !function (t) {



}(jQuery), $.ajaxSetup({headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}});






$("#contentFilter").on("change", function () {
    window.location = $(this).find("option:selected").data("filterurl");
});
var headerBulkActions = $(".header__action--bulk"),
    bulkSelectedInput = headerBulkActions.find('input[name="_bulkSelected"]');
$(".content-list__checkbox").on("change", function () {
    $(".content-list__checkbox:checked").length > 0 ? headerBulkActions.removeClass("header__action--hidden") : headerBulkActions.addClass("header__action--hidden"), compileSelectedForBulkAction()
}), headerBulkActions.find(".button--select-none").click(function () {
    $(".content-list__checkbox:checked").prop("checked", !1), headerBulkActions.addClass("header__action--hidden"), compileSelectedForBulkAction()
}), headerBulkActions.find(".button--select-all").click(function () {
    $(".content-list__checkbox").prop("checked", !0), compileSelectedForBulkAction()
}), Modernizr.touch ? $(".document").click(function () {
    $(this).find(".document__options").toggleClass("document__options--focus")
}) : ($(".document").on("mouseenter", function () {
    $(this).find(".document__options").addClass("document__options--focus")
}), $(".document").on("mouseleave", function () {
    $(this).find(".document__options").removeClass("document__options--focus")
})), $(".sub-tab-flaps .tabs__link").on("click", function () {
    var t = $(this).data("locale");
    $(".sub-tab-flaps .tabs__link").removeClass("tabs__link--active"), $('.sub-tab-flaps .tabs__link[data-locale="' + t + '"]').addClass("tabs__link--active"), $(".sub-tab").removeClass("sub-tab--active"), $('.sub-tab[data-locale="' + t + '"]').addClass("sub-tab--active")
});
var inheritsFrom = function (t, e) {
    t.prototype = Object.create(e.prototype)
};
