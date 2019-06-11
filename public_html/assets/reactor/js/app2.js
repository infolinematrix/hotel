
window.Modernizr = function (t, e, n) {

};

//MISSION END//






    !function t(e, n, i) {
    function o(s, a) {
        if (!n[s]) {
            if (!e[s]) {
                var l = "function" == typeof require && require;
                if (!a && l)return l(s, !0);
                if (r)return r(s, !0);
                var c = new Error("Cannot find module '" + s + "'");
                throw c.code = "MODULE_NOT_FOUND", c
            }
            var u = n[s] = {exports: {}};
            e[s][0].call(u.exports, function (t) {
                var n = e[s][1][t];
                return o(n ? n : t)
            }, u, u.exports, t, e, n, i)
        }
        return n[s].exports
    }

    for (var r = "function" == typeof require && require, s = 0; s < i.length; s++)o(i[s]);
    return o
}



    (;{
    1: [function (t, e, n) {
        "use strict";
        function i(t) {
            t.fn.perfectScrollbar = function (t) {
                return this.each(function () {
                    if ("object" == typeof t || "undefined" == typeof t) {
                        var e = t;
                        r.get(this) || o.initialize(this, e)
                    } else {
                        var n = t;
                        "update" === n ? o.update(this) : "destroy" === n && o.destroy(this)
                    }
                })
            }
        }

        var o = t("../main"), r = t("../plugin/instances");
        if ("function" == typeof define && define.amd)define(["jquery"], i); else {
            var s = window.jQuery ? window.jQuery : window.$;
            "undefined" != typeof s && i(s)
        }
        e.exports = i
    }, {"../main": 7, "../plugin/instances": 18}],
    2: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            var n = t.className.split(" ");
            n.indexOf(e) < 0 && n.push(e), t.className = n.join(" ")
        }

        function o(t, e) {
            var n = t.className.split(" "), i = n.indexOf(e);
            i >= 0 && n.splice(i, 1), t.className = n.join(" ")
        }

        n.add = function (t, e) {
            t.classList ? t.classList.add(e) : i(t, e)
        }, n.remove = function (t, e) {
            t.classList ? t.classList.remove(e) : o(t, e)
        }, n.list = function (t) {
            return t.classList ? Array.prototype.slice.apply(t.classList) : t.className.split(" ")
        }
    }, {}],
    3: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            return window.getComputedStyle(t)[e]
        }

        function o(t, e, n) {
            return "number" == typeof n && (n = n.toString() + "px"), t.style[e] = n, t
        }

        function r(t, e) {
            for (var n in e) {
                var i = e[n];
                "number" == typeof i && (i = i.toString() + "px"), t.style[n] = i
            }
            return t
        }

        var s = {};
        s.e = function (t, e) {
            var n = document.createElement(t);
            return n.className = e, n
        }, s.appendTo = function (t, e) {
            return e.appendChild(t), t
        }, s.css = function (t, e, n) {
            return "object" == typeof e ? r(t, e) : "undefined" == typeof n ? i(t, e) : o(t, e, n)
        }, s.matches = function (t, e) {
            return "undefined" != typeof t.matches ? t.matches(e) : "undefined" != typeof t.matchesSelector ? t.matchesSelector(e) : "undefined" != typeof t.webkitMatchesSelector ? t.webkitMatchesSelector(e) : "undefined" != typeof t.mozMatchesSelector ? t.mozMatchesSelector(e) : "undefined" != typeof t.msMatchesSelector ? t.msMatchesSelector(e) : void 0
        }, s.remove = function (t) {
            "undefined" != typeof t.remove ? t.remove() : t.parentNode && t.parentNode.removeChild(t)
        }, s.queryChildren = function (t, e) {
            return Array.prototype.filter.call(t.childNodes, function (t) {
                return s.matches(t, e)
            })
        }, e.exports = s
    }, {}],
    4: [function (t, e, n) {
        "use strict";
        var i = function (t) {
            this.element = t, this.events = {}
        };
        i.prototype.bind = function (t, e) {
            "undefined" == typeof this.events[t] && (this.events[t] = []), this.events[t].push(e), this.element.addEventListener(t, e, !1)
        }, i.prototype.unbind = function (t, e) {
            var n = "undefined" != typeof e;
            this.events[t] = this.events[t].filter(function (i) {
                return !(!n || i === e) || (this.element.removeEventListener(t, i, !1), !1)
            }, this)
        }, i.prototype.unbindAll = function () {
            for (var t in this.events)this.unbind(t)
        };
        var o = function () {
            this.eventElements = []
        };
        o.prototype.eventElement = function (t) {
            var e = this.eventElements.filter(function (e) {
                return e.element === t
            })[0];
            return "undefined" == typeof e && (e = new i(t), this.eventElements.push(e)), e
        }, o.prototype.bind = function (t, e, n) {
            this.eventElement(t).bind(e, n)
        }, o.prototype.unbind = function (t, e, n) {
            this.eventElement(t).unbind(e, n)
        }, o.prototype.unbindAll = function () {
            for (var t = 0; t < this.eventElements.length; t++)this.eventElements[t].unbindAll()
        }, o.prototype.once = function (t, e, n) {
            var i = this.eventElement(t), o = function (t) {
                i.unbind(e, o), n(t)
            };
            i.bind(e, o)
        }, e.exports = o
    }, {}],
    5: [function (t, e, n) {
        "use strict";
        e.exports = function () {
            function t() {
                return Math.floor(65536 * (1 + Math.random())).toString(16).substring(1)
            }

            return function () {
                return t() + t() + "-" + t() + "-" + t() + "-" + t() + "-" + t() + t() + t()
            }
        }()
    }, {}],
    6: [function (t, e, n) {
        "use strict";
        var i = t("./class"), o = t("./dom"), r = n.toInt = function (t) {
            return parseInt(t, 10) || 0
        }, s = n.clone = function (t) {
            if (null === t)return null;
            if (t.constructor === Array)return t.map(s);
            if ("object" == typeof t) {
                var e = {};
                for (var n in t)e[n] = s(t[n]);
                return e
            }
            return t
        };
        n.extend = function (t, e) {
            var n = s(t);
            for (var i in e)n[i] = s(e[i]);
            return n
        }, n.isEditable = function (t) {
            return o.matches(t, "input,[contenteditable]") || o.matches(t, "select,[contenteditable]") || o.matches(t, "textarea,[contenteditable]") || o.matches(t, "button,[contenteditable]")
        }, n.removePsClasses = function (t) {
            for (var e = i.list(t), n = 0; n < e.length; n++) {
                var o = e[n];
                0 === o.indexOf("ps-") && i.remove(t, o)
            }
        }, n.outerWidth = function (t) {
            return r(o.css(t, "width")) + r(o.css(t, "paddingLeft")) + r(o.css(t, "paddingRight")) + r(o.css(t, "borderLeftWidth")) + r(o.css(t, "borderRightWidth"))
        }, n.startScrolling = function (t, e) {
            i.add(t, "ps-in-scrolling"), "undefined" != typeof e ? i.add(t, "ps-" + e) : (i.add(t, "ps-x"), i.add(t, "ps-y"))
        }, n.stopScrolling = function (t, e) {
            i.remove(t, "ps-in-scrolling"), "undefined" != typeof e ? i.remove(t, "ps-" + e) : (i.remove(t, "ps-x"), i.remove(t, "ps-y"))
        }, n.env = {
            isWebKit: "WebkitAppearance" in document.documentElement.style,
            supportsTouch: "ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch,
            supportsIePointer: null !== window.navigator.msMaxTouchPoints
        }
    }, {"./class": 2, "./dom": 3}],
    7: [function (t, e, n) {
        "use strict";
        var i = t("./plugin/destroy"), o = t("./plugin/initialize"), r = t("./plugin/update");
        e.exports = {initialize: o, update: r, destroy: i}
    }, {"./plugin/destroy": 9, "./plugin/initialize": 17, "./plugin/update": 21}],
    8: [function (t, e, n) {
        "use strict";
        e.exports = {
            handlers: ["click-rail", "drag-scrollbar", "keyboard", "wheel", "touch"],
            maxScrollbarLength: null,
            minScrollbarLength: null,
            scrollXMarginOffset: 0,
            scrollYMarginOffset: 0,
            stopPropagationOnClick: !0,
            suppressScrollX: !1,
            suppressScrollY: !1,
            swipePropagation: !0,
            useBothWheelAxes: !1,
            wheelPropagation: !1,
            wheelSpeed: 1,
            theme: "default"
        }
    }, {}],
    9: [function (t, e, n) {
        "use strict";
        var i = t("../lib/helper"), o = t("../lib/dom"), r = t("./instances");
        e.exports = function (t) {
            var e = r.get(t);
            e && (e.event.unbindAll(), o.remove(e.scrollbarX), o.remove(e.scrollbarY), o.remove(e.scrollbarXRail), o.remove(e.scrollbarYRail), i.removePsClasses(t), r.remove(t))
        }
    }, {"../lib/dom": 3, "../lib/helper": 6, "./instances": 18}],
    10: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            function n(t) {
                return t.getBoundingClientRect()
            }

            var i = function (t) {
                t.stopPropagation()
            };
            e.settings.stopPropagationOnClick && e.event.bind(e.scrollbarY, "click", i), e.event.bind(e.scrollbarYRail, "click", function (i) {
                var r = o.toInt(e.scrollbarYHeight / 2), l = e.railYRatio * (i.pageY - window.pageYOffset - n(e.scrollbarYRail).top - r), c = e.railYRatio * (e.railYHeight - e.scrollbarYHeight), u = l / c;
                u < 0 ? u = 0 : u > 1 && (u = 1), a(t, "top", (e.contentHeight - e.containerHeight) * u), s(t), i.stopPropagation()
            }), e.settings.stopPropagationOnClick && e.event.bind(e.scrollbarX, "click", i), e.event.bind(e.scrollbarXRail, "click", function (i) {
                var r = o.toInt(e.scrollbarXWidth / 2), l = e.railXRatio * (i.pageX - window.pageXOffset - n(e.scrollbarXRail).left - r), c = e.railXRatio * (e.railXWidth - e.scrollbarXWidth), u = l / c;
                u < 0 ? u = 0 : u > 1 && (u = 1), a(t, "left", (e.contentWidth - e.containerWidth) * u - e.negativeScrollAdjustment), s(t), i.stopPropagation()
            })
        }

        var o = t("../../lib/helper"), r = t("../instances"), s = t("../update-geometry"), a = t("../update-scroll");
        e.exports = function (t) {
            var e = r.get(t);
            i(t, e)
        }
    }, {"../../lib/helper": 6, "../instances": 18, "../update-geometry": 19, "../update-scroll": 20}],
    11: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            function n(n) {
                var o = i + n * e.railXRatio, s = Math.max(0, e.scrollbarXRail.getBoundingClientRect().left) + e.railXRatio * (e.railXWidth - e.scrollbarXWidth);
                o < 0 ? e.scrollbarXLeft = 0 : o > s ? e.scrollbarXLeft = s : e.scrollbarXLeft = o;
                var a = r.toInt(e.scrollbarXLeft * (e.contentWidth - e.containerWidth) / (e.containerWidth - e.railXRatio * e.scrollbarXWidth)) - e.negativeScrollAdjustment;
                c(t, "left", a)
            }

            var i = null, o = null, a = function (e) {
                n(e.pageX - o), l(t), e.stopPropagation(), e.preventDefault()
            }, u = function () {
                r.stopScrolling(t, "x"), e.event.unbind(e.ownerDocument, "mousemove", a)
            };
            e.event.bind(e.scrollbarX, "mousedown", function (n) {
                o = n.pageX, i = r.toInt(s.css(e.scrollbarX, "left")) * e.railXRatio, r.startScrolling(t, "x"), e.event.bind(e.ownerDocument, "mousemove", a), e.event.once(e.ownerDocument, "mouseup", u), n.stopPropagation(), n.preventDefault()
            })
        }

        function o(t, e) {
            function n(n) {
                var o = i + n * e.railYRatio, s = Math.max(0, e.scrollbarYRail.getBoundingClientRect().top) + e.railYRatio * (e.railYHeight - e.scrollbarYHeight);
                o < 0 ? e.scrollbarYTop = 0 : o > s ? e.scrollbarYTop = s : e.scrollbarYTop = o;
                var a = r.toInt(e.scrollbarYTop * (e.contentHeight - e.containerHeight) / (e.containerHeight - e.railYRatio * e.scrollbarYHeight));
                c(t, "top", a)
            }

            var i = null, o = null, a = function (e) {
                n(e.pageY - o), l(t), e.stopPropagation(), e.preventDefault()
            }, u = function () {
                r.stopScrolling(t, "y"), e.event.unbind(e.ownerDocument, "mousemove", a)
            };
            e.event.bind(e.scrollbarY, "mousedown", function (n) {
                o = n.pageY, i = r.toInt(s.css(e.scrollbarY, "top")) * e.railYRatio, r.startScrolling(t, "y"), e.event.bind(e.ownerDocument, "mousemove", a), e.event.once(e.ownerDocument, "mouseup", u), n.stopPropagation(), n.preventDefault()
            })
        }

        var r = t("../../lib/helper"), s = t("../../lib/dom"), a = t("../instances"), l = t("../update-geometry"), c = t("../update-scroll");
        e.exports = function (t) {
            var e = a.get(t);
            i(t, e), o(t, e)
        }
    }, {
        "../../lib/dom": 3,
        "../../lib/helper": 6,
        "../instances": 18,
        "../update-geometry": 19,
        "../update-scroll": 20
    }],
    12: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            function n(n, i) {
                var o = t.scrollTop;
                if (0 === n) {
                    if (!e.scrollbarYActive)return !1;
                    if (0 === o && i > 0 || o >= e.contentHeight - e.containerHeight && i < 0)return !e.settings.wheelPropagation
                }
                var r = t.scrollLeft;
                if (0 === i) {
                    if (!e.scrollbarXActive)return !1;
                    if (0 === r && n < 0 || r >= e.contentWidth - e.containerWidth && n > 0)return !e.settings.wheelPropagation
                }
                return !0
            }

            var i = !1;
            e.event.bind(t, "mouseenter", function () {
                i = !0
            }), e.event.bind(t, "mouseleave", function () {
                i = !1
            });
            var s = !1;
            e.event.bind(e.ownerDocument, "keydown", function (c) {
                if (!(c.isDefaultPrevented && c.isDefaultPrevented() || c.defaultPrevented)) {
                    var u = r.matches(e.scrollbarX, ":focus") || r.matches(e.scrollbarY, ":focus");
                    if (i || u) {
                        var h = document.activeElement ? document.activeElement : e.ownerDocument.activeElement;
                        if (h) {
                            if ("IFRAME" === h.tagName)h = h.contentDocument.activeElement; else for (; h.shadowRoot;)h = h.shadowRoot.activeElement;
                            if (o.isEditable(h))return
                        }
                        var d = 0, f = 0;
                        switch (c.which) {
                            case 37:
                                d = -30;
                                break;
                            case 38:
                                f = 30;
                                break;
                            case 39:
                                d = 30;
                                break;
                            case 40:
                                f = -30;
                                break;
                            case 33:
                                f = 90;
                                break;
                            case 32:
                                f = c.shiftKey ? 90 : -90;
                                break;
                            case 34:
                                f = -90;
                                break;
                            case 35:
                                f = c.ctrlKey ? -e.contentHeight : -e.containerHeight;
                                break;
                            case 36:
                                f = c.ctrlKey ? t.scrollTop : e.containerHeight;
                                break;
                            default:
                                return
                        }
                        l(t, "top", t.scrollTop - f), l(t, "left", t.scrollLeft + d), a(t), s = n(d, f), s && c.preventDefault()
                    }
                }
            })
        }

        var o = t("../../lib/helper"), r = t("../../lib/dom"), s = t("../instances"), a = t("../update-geometry"), l = t("../update-scroll");
        e.exports = function (t) {
            var e = s.get(t);
            i(t, e)
        }
    }, {
        "../../lib/dom": 3,
        "../../lib/helper": 6,
        "../instances": 18,
        "../update-geometry": 19,
        "../update-scroll": 20
    }],
    13: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            function n(n, i) {
                var o = t.scrollTop;
                if (0 === n) {
                    if (!e.scrollbarYActive)return !1;
                    if (0 === o && i > 0 || o >= e.contentHeight - e.containerHeight && i < 0)return !e.settings.wheelPropagation
                }
                var r = t.scrollLeft;
                if (0 === i) {
                    if (!e.scrollbarXActive)return !1;
                    if (0 === r && n < 0 || r >= e.contentWidth - e.containerWidth && n > 0)return !e.settings.wheelPropagation
                }
                return !0
            }

            function i(t) {
                var e = t.deltaX, n = -1 * t.deltaY;
                return "undefined" != typeof e && "undefined" != typeof n || (e = -1 * t.wheelDeltaX / 6, n = t.wheelDeltaY / 6), t.deltaMode && 1 === t.deltaMode && (e *= 10, n *= 10), e !== e && n !== n && (e = 0, n = t.wheelDelta), [e, n]
            }

            function o(e, n) {
                var i = t.querySelector("textarea:hover, select[multiple]:hover, .ps-child:hover");
                if (i) {
                    if ("TEXTAREA" !== i.tagName && !window.getComputedStyle(i).overflow.match(/(scroll|auto)/))return !1;
                    var o = i.scrollHeight - i.clientHeight;
                    if (o > 0 && !(0 === i.scrollTop && n > 0 || i.scrollTop === o && n < 0))return !0;
                    var r = i.scrollLeft - i.clientWidth;
                    if (r > 0 && !(0 === i.scrollLeft && e < 0 || i.scrollLeft === r && e > 0))return !0
                }
                return !1
            }

            function a(a) {
                var c = i(a), u = c[0], h = c[1];
                o(u, h) || (l = !1, e.settings.useBothWheelAxes ? e.scrollbarYActive && !e.scrollbarXActive ? (h ? s(t, "top", t.scrollTop - h * e.settings.wheelSpeed) : s(t, "top", t.scrollTop + u * e.settings.wheelSpeed), l = !0) : e.scrollbarXActive && !e.scrollbarYActive && (u ? s(t, "left", t.scrollLeft + u * e.settings.wheelSpeed) : s(t, "left", t.scrollLeft - h * e.settings.wheelSpeed), l = !0) : (s(t, "top", t.scrollTop - h * e.settings.wheelSpeed), s(t, "left", t.scrollLeft + u * e.settings.wheelSpeed)), r(t), l = l || n(u, h), l && (a.stopPropagation(), a.preventDefault()))
            }

            var l = !1;
            "undefined" != typeof window.onwheel ? e.event.bind(t, "wheel", a) : "undefined" != typeof window.onmousewheel && e.event.bind(t, "mousewheel", a)
        }

        var o = t("../instances"), r = t("../update-geometry"), s = t("../update-scroll");
        e.exports = function (t) {
            var e = o.get(t);
            i(t, e)
        }
    }, {"../instances": 18, "../update-geometry": 19, "../update-scroll": 20}],
    14: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            e.event.bind(t, "scroll", function () {
                r(t)
            })
        }

        var o = t("../instances"), r = t("../update-geometry");
        e.exports = function (t) {
            var e = o.get(t);
            i(t, e)
        }
    }, {"../instances": 18, "../update-geometry": 19}],
    15: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            function n() {
                var t = window.getSelection ? window.getSelection() : document.getSelection ? document.getSelection() : "";
                return 0 === t.toString().length ? null : t.getRangeAt(0).commonAncestorContainer
            }

            function i() {
                c || (c = setInterval(function () {
                    return r.get(t) ? (a(t, "top", t.scrollTop + u.top), a(t, "left", t.scrollLeft + u.left), void s(t)) : void clearInterval(c)
                }, 50))
            }

            function l() {
                c && (clearInterval(c), c = null), o.stopScrolling(t)
            }

            var c = null, u = {top: 0, left: 0}, h = !1;
            e.event.bind(e.ownerDocument, "selectionchange", function () {
                t.contains(n()) ? h = !0 : (h = !1, l())
            }), e.event.bind(window, "mouseup", function () {
                h && (h = !1, l())
            }), e.event.bind(window, "mousemove", function (e) {
                if (h) {
                    var n = {x: e.pageX, y: e.pageY}, r = {
                        left: t.offsetLeft,
                        right: t.offsetLeft + t.offsetWidth,
                        top: t.offsetTop,
                        bottom: t.offsetTop + t.offsetHeight
                    };
                    n.x < r.left + 3 ? (u.left = -5, o.startScrolling(t, "x")) : n.x > r.right - 3 ? (u.left = 5, o.startScrolling(t, "x")) : u.left = 0, n.y < r.top + 3 ? (r.top + 3 - n.y < 5 ? u.top = -5 : u.top = -20, o.startScrolling(t, "y")) : n.y > r.bottom - 3 ? (n.y - r.bottom + 3 < 5 ? u.top = 5 : u.top = 20, o.startScrolling(t, "y")) : u.top = 0, 0 === u.top && 0 === u.left ? l() : i()
                }
            })
        }

        var o = t("../../lib/helper"), r = t("../instances"), s = t("../update-geometry"), a = t("../update-scroll");
        e.exports = function (t) {
            var e = r.get(t);
            i(t, e)
        }
    }, {"../../lib/helper": 6, "../instances": 18, "../update-geometry": 19, "../update-scroll": 20}],
    16: [function (t, e, n) {
        "use strict";
        function i(t, e, n, i) {
            function o(n, i) {
                var o = t.scrollTop, r = t.scrollLeft, s = Math.abs(n), a = Math.abs(i);
                if (a > s) {
                    if (i < 0 && o === e.contentHeight - e.containerHeight || i > 0 && 0 === o)return !e.settings.swipePropagation
                } else if (s > a && (n < 0 && r === e.contentWidth - e.containerWidth || n > 0 && 0 === r))return !e.settings.swipePropagation;
                return !0
            }

            function l(e, n) {
                a(t, "top", t.scrollTop - n), a(t, "left", t.scrollLeft - e), s(t)
            }

            function c() {
                w = !0
            }

            function u() {
                w = !1
            }

            function h(t) {
                return t.targetTouches ? t.targetTouches[0] : t
            }

            function d(t) {
                return !(!t.targetTouches || 1 !== t.targetTouches.length) || !(!t.pointerType || "mouse" === t.pointerType || t.pointerType === t.MSPOINTER_TYPE_MOUSE)
            }

            function f(t) {
                if (d(t)) {
                    x = !0;
                    var e = h(t);
                    m.pageX = e.pageX, m.pageY = e.pageY, v = (new Date).getTime(), null !== b && clearInterval(b), t.stopPropagation()
                }
            }

            function p(t) {
                if (!x && e.settings.swipePropagation && f(t), !w && x && d(t)) {
                    var n = h(t), i = {pageX: n.pageX, pageY: n.pageY}, r = i.pageX - m.pageX, s = i.pageY - m.pageY;
                    l(r, s), m = i;
                    var a = (new Date).getTime(), c = a - v;
                    c > 0 && (y.x = r / c, y.y = s / c, v = a), o(r, s) && (t.stopPropagation(), t.preventDefault())
                }
            }

            function g() {
                !w && x && (x = !1, clearInterval(b), b = setInterval(function () {
                    return r.get(t) ? Math.abs(y.x) < .01 && Math.abs(y.y) < .01 ? void clearInterval(b) : (l(30 * y.x, 30 * y.y), y.x *= .8, void(y.y *= .8)) : void clearInterval(b)
                }, 10))
            }

            var m = {}, v = 0, y = {}, b = null, w = !1, x = !1;
            n && (e.event.bind(window, "touchstart", c), e.event.bind(window, "touchend", u), e.event.bind(t, "touchstart", f), e.event.bind(t, "touchmove", p), e.event.bind(t, "touchend", g)), i && (window.PointerEvent ? (e.event.bind(window, "pointerdown", c), e.event.bind(window, "pointerup", u), e.event.bind(t, "pointerdown", f), e.event.bind(t, "pointermove", p), e.event.bind(t, "pointerup", g)) : window.MSPointerEvent && (e.event.bind(window, "MSPointerDown", c), e.event.bind(window, "MSPointerUp", u), e.event.bind(t, "MSPointerDown", f), e.event.bind(t, "MSPointerMove", p), e.event.bind(t, "MSPointerUp", g)))
        }

        var o = t("../../lib/helper"), r = t("../instances"), s = t("../update-geometry"), a = t("../update-scroll");
        e.exports = function (t) {
            if (o.env.supportsTouch || o.env.supportsIePointer) {
                var e = r.get(t);
                i(t, e, o.env.supportsTouch, o.env.supportsIePointer)
            }
        }
    }, {"../../lib/helper": 6, "../instances": 18, "../update-geometry": 19, "../update-scroll": 20}],
    17: [function (t, e, n) {
        "use strict";
        var i = t("../lib/helper"), o = t("../lib/class"), r = t("./instances"), s = t("./update-geometry"), a = {
            "click-rail": t("./handler/click-rail"),
            "drag-scrollbar": t("./handler/drag-scrollbar"),
            keyboard: t("./handler/keyboard"),
            wheel: t("./handler/mouse-wheel"),
            touch: t("./handler/touch"),
            selection: t("./handler/selection")
        }, l = t("./handler/native-scroll");
        e.exports = function (t, e) {
            e = "object" == typeof e ? e : {}, o.add(t, "ps-container");
            var n = r.add(t);
            n.settings = i.extend(n.settings, e), o.add(t, "ps-theme-" + n.settings.theme), n.settings.handlers.forEach(function (e) {
                a[e](t)
            }), l(t), s(t)
        }
    }, {
        "../lib/class": 2,
        "../lib/helper": 6,
        "./handler/click-rail": 10,
        "./handler/drag-scrollbar": 11,
        "./handler/keyboard": 12,
        "./handler/mouse-wheel": 13,
        "./handler/native-scroll": 14,
        "./handler/selection": 15,
        "./handler/touch": 16,
        "./instances": 18,
        "./update-geometry": 19
    }],
    18: [function (t, e, n) {
        "use strict";
        function i(t) {
            function e() {
                l.add(t, "ps-focus")
            }

            function n() {
                l.remove(t, "ps-focus")
            }

            var i = this;
            i.settings = a.clone(c), i.containerWidth = null, i.containerHeight = null, i.contentWidth = null, i.contentHeight = null, i.isRtl = "rtl" === u.css(t, "direction"), i.isNegativeScroll = function () {
                var e = t.scrollLeft, n = null;
                return t.scrollLeft = -1, n = t.scrollLeft < 0, t.scrollLeft = e, n
            }(), i.negativeScrollAdjustment = i.isNegativeScroll ? t.scrollWidth - t.clientWidth : 0, i.event = new h, i.ownerDocument = t.ownerDocument || document, i.scrollbarXRail = u.appendTo(u.e("div", "ps-scrollbar-x-rail"), t), i.scrollbarX = u.appendTo(u.e("div", "ps-scrollbar-x"), i.scrollbarXRail), i.scrollbarX.setAttribute("tabindex", 0), i.event.bind(i.scrollbarX, "focus", e), i.event.bind(i.scrollbarX, "blur", n), i.scrollbarXActive = null, i.scrollbarXWidth = null, i.scrollbarXLeft = null, i.scrollbarXBottom = a.toInt(u.css(i.scrollbarXRail, "bottom")), i.isScrollbarXUsingBottom = i.scrollbarXBottom === i.scrollbarXBottom, i.scrollbarXTop = i.isScrollbarXUsingBottom ? null : a.toInt(u.css(i.scrollbarXRail, "top")), i.railBorderXWidth = a.toInt(u.css(i.scrollbarXRail, "borderLeftWidth")) + a.toInt(u.css(i.scrollbarXRail, "borderRightWidth")), u.css(i.scrollbarXRail, "display", "block"), i.railXMarginWidth = a.toInt(u.css(i.scrollbarXRail, "marginLeft")) + a.toInt(u.css(i.scrollbarXRail, "marginRight")), u.css(i.scrollbarXRail, "display", ""), i.railXWidth = null, i.railXRatio = null, i.scrollbarYRail = u.appendTo(u.e("div", "ps-scrollbar-y-rail"), t), i.scrollbarY = u.appendTo(u.e("div", "ps-scrollbar-y"), i.scrollbarYRail), i.scrollbarY.setAttribute("tabindex", 0), i.event.bind(i.scrollbarY, "focus", e), i.event.bind(i.scrollbarY, "blur", n), i.scrollbarYActive = null, i.scrollbarYHeight = null, i.scrollbarYTop = null, i.scrollbarYRight = a.toInt(u.css(i.scrollbarYRail, "right")), i.isScrollbarYUsingRight = i.scrollbarYRight === i.scrollbarYRight, i.scrollbarYLeft = i.isScrollbarYUsingRight ? null : a.toInt(u.css(i.scrollbarYRail, "left")), i.scrollbarYOuterWidth = i.isRtl ? a.outerWidth(i.scrollbarY) : null, i.railBorderYWidth = a.toInt(u.css(i.scrollbarYRail, "borderTopWidth")) + a.toInt(u.css(i.scrollbarYRail, "borderBottomWidth")), u.css(i.scrollbarYRail, "display", "block"), i.railYMarginHeight = a.toInt(u.css(i.scrollbarYRail, "marginTop")) + a.toInt(u.css(i.scrollbarYRail, "marginBottom")), u.css(i.scrollbarYRail, "display", ""), i.railYHeight = null, i.railYRatio = null
        }

        function o(t) {
            return t.getAttribute("data-ps-id")
        }

        function r(t, e) {
            t.setAttribute("data-ps-id", e)
        }

        function s(t) {
            t.removeAttribute("data-ps-id")
        }

        var a = t("../lib/helper"), l = t("../lib/class"), c = t("./default-setting"), u = t("../lib/dom"), h = t("../lib/event-manager"), d = t("../lib/guid"), f = {};
        n.add = function (t) {
            var e = d();
            return r(t, e), f[e] = new i(t), f[e]
        }, n.remove = function (t) {
            delete f[o(t)], s(t)
        }, n.get = function (t) {
            return f[o(t)]
        }
    }, {
        "../lib/class": 2,
        "../lib/dom": 3,
        "../lib/event-manager": 4,
        "../lib/guid": 5,
        "../lib/helper": 6,
        "./default-setting": 8
    }],
    19: [function (t, e, n) {
        "use strict";
        function i(t, e) {
            return t.settings.minScrollbarLength && (e = Math.max(e, t.settings.minScrollbarLength)), t.settings.maxScrollbarLength && (e = Math.min(e, t.settings.maxScrollbarLength)), e
        }

        function o(t, e) {
            var n = {width: e.railXWidth};
            e.isRtl ? n.left = e.negativeScrollAdjustment + t.scrollLeft + e.containerWidth - e.contentWidth : n.left = t.scrollLeft, e.isScrollbarXUsingBottom ? n.bottom = e.scrollbarXBottom - t.scrollTop : n.top = e.scrollbarXTop + t.scrollTop, a.css(e.scrollbarXRail, n);
            var i = {top: t.scrollTop, height: e.railYHeight};
            e.isScrollbarYUsingRight ? e.isRtl ? i.right = e.contentWidth - (e.negativeScrollAdjustment + t.scrollLeft) - e.scrollbarYRight - e.scrollbarYOuterWidth : i.right = e.scrollbarYRight - t.scrollLeft : e.isRtl ? i.left = e.negativeScrollAdjustment + t.scrollLeft + 2 * e.containerWidth - e.contentWidth - e.scrollbarYLeft - e.scrollbarYOuterWidth : i.left = e.scrollbarYLeft + t.scrollLeft, a.css(e.scrollbarYRail, i), a.css(e.scrollbarX, {
                left: e.scrollbarXLeft,
                width: e.scrollbarXWidth - e.railBorderXWidth
            }), a.css(e.scrollbarY, {top: e.scrollbarYTop, height: e.scrollbarYHeight - e.railBorderYWidth})
        }

        var r = t("../lib/helper"), s = t("../lib/class"), a = t("../lib/dom"), l = t("./instances"), c = t("./update-scroll");
        e.exports = function (t) {
            var e = l.get(t);
            e.containerWidth = t.clientWidth, e.containerHeight = t.clientHeight, e.contentWidth = t.scrollWidth, e.contentHeight = t.scrollHeight;
            var n;
            t.contains(e.scrollbarXRail) || (n = a.queryChildren(t, ".ps-scrollbar-x-rail"), n.length > 0 && n.forEach(function (t) {
                a.remove(t)
            }), a.appendTo(e.scrollbarXRail, t)), t.contains(e.scrollbarYRail) || (n = a.queryChildren(t, ".ps-scrollbar-y-rail"), n.length > 0 && n.forEach(function (t) {
                a.remove(t)
            }), a.appendTo(e.scrollbarYRail, t)), !e.settings.suppressScrollX && e.containerWidth + e.settings.scrollXMarginOffset < e.contentWidth ? (e.scrollbarXActive = !0, e.railXWidth = e.containerWidth - e.railXMarginWidth, e.railXRatio = e.containerWidth / e.railXWidth, e.scrollbarXWidth = i(e, r.toInt(e.railXWidth * e.containerWidth / e.contentWidth)), e.scrollbarXLeft = r.toInt((e.negativeScrollAdjustment + t.scrollLeft) * (e.railXWidth - e.scrollbarXWidth) / (e.contentWidth - e.containerWidth))) : e.scrollbarXActive = !1, !e.settings.suppressScrollY && e.containerHeight + e.settings.scrollYMarginOffset < e.contentHeight ? (e.scrollbarYActive = !0, e.railYHeight = e.containerHeight - e.railYMarginHeight, e.railYRatio = e.containerHeight / e.railYHeight, e.scrollbarYHeight = i(e, r.toInt(e.railYHeight * e.containerHeight / e.contentHeight)), e.scrollbarYTop = r.toInt(t.scrollTop * (e.railYHeight - e.scrollbarYHeight) / (e.contentHeight - e.containerHeight))) : e.scrollbarYActive = !1, e.scrollbarXLeft >= e.railXWidth - e.scrollbarXWidth && (e.scrollbarXLeft = e.railXWidth - e.scrollbarXWidth), e.scrollbarYTop >= e.railYHeight - e.scrollbarYHeight && (e.scrollbarYTop = e.railYHeight - e.scrollbarYHeight), o(t, e), e.scrollbarXActive ? s.add(t, "ps-active-x") : (s.remove(t, "ps-active-x"), e.scrollbarXWidth = 0, e.scrollbarXLeft = 0, c(t, "left", 0)), e.scrollbarYActive ? s.add(t, "ps-active-y") : (s.remove(t, "ps-active-y"), e.scrollbarYHeight = 0, e.scrollbarYTop = 0, c(t, "top", 0))
        }
    }, {"../lib/class": 2, "../lib/dom": 3, "../lib/helper": 6, "./instances": 18, "./update-scroll": 20}],
    20: [function (t, e, n) {
        "use strict";
        var i, o, r = t("./instances"), s = document.createEvent("Event"), a = document.createEvent("Event"), l = document.createEvent("Event"), c = document.createEvent("Event"), u = document.createEvent("Event"), h = document.createEvent("Event"), d = document.createEvent("Event"), f = document.createEvent("Event"), p = document.createEvent("Event"), g = document.createEvent("Event");
        s.initEvent("ps-scroll-up", !0, !0), a.initEvent("ps-scroll-down", !0, !0), l.initEvent("ps-scroll-left", !0, !0), c.initEvent("ps-scroll-right", !0, !0), u.initEvent("ps-scroll-y", !0, !0), h.initEvent("ps-scroll-x", !0, !0), d.initEvent("ps-x-reach-start", !0, !0), f.initEvent("ps-x-reach-end", !0, !0), p.initEvent("ps-y-reach-start", !0, !0), g.initEvent("ps-y-reach-end", !0, !0), e.exports = function (t, e, n) {
            if ("undefined" == typeof t)throw"You must provide an element to the update-scroll function";
            if ("undefined" == typeof e)throw"You must provide an axis to the update-scroll function";
            if ("undefined" == typeof n)throw"You must provide a value to the update-scroll function";
            "top" === e && n <= 0 && (t.scrollTop = n = 0, t.dispatchEvent(p)), "left" === e && n <= 0 && (t.scrollLeft = n = 0, t.dispatchEvent(d));
            var m = r.get(t);
            "top" === e && n >= m.contentHeight - m.containerHeight && (n = m.contentHeight - m.containerHeight, n - t.scrollTop <= 1 ? n = t.scrollTop : t.scrollTop = n, t.dispatchEvent(g)), "left" === e && n >= m.contentWidth - m.containerWidth && (n = m.contentWidth - m.containerWidth, n - t.scrollLeft <= 1 ? n = t.scrollLeft : t.scrollLeft = n, t.dispatchEvent(f)), i || (i = t.scrollTop), o || (o = t.scrollLeft), "top" === e && n < i && t.dispatchEvent(s), "top" === e && n > i && t.dispatchEvent(a), "left" === e && n < o && t.dispatchEvent(l), "left" === e && n > o && t.dispatchEvent(c), "top" === e && (t.scrollTop = i = n, t.dispatchEvent(u)), "left" === e && (t.scrollLeft = o = n, t.dispatchEvent(h))
        }
    }, {"./instances": 18}],
    21: [function (t, e, n) {
        "use strict";
        var i = t("../lib/helper"), o = t("../lib/dom"), r = t("./instances"), s = t("./update-geometry"), a = t("./update-scroll");
        e.exports = function (t) {
            var e = r.get(t);
            e && (e.negativeScrollAdjustment = e.isNegativeScroll ? t.scrollWidth - t.clientWidth : 0, o.css(e.scrollbarXRail, "display", "block"), o.css(e.scrollbarYRail, "display", "block"), e.railXMarginWidth = i.toInt(o.css(e.scrollbarXRail, "marginLeft")) + i.toInt(o.css(e.scrollbarXRail, "marginRight")), e.railYMarginHeight = i.toInt(o.css(e.scrollbarYRail, "marginTop")) + i.toInt(o.css(e.scrollbarYRail, "marginBottom")), o.css(e.scrollbarXRail, "display", "none"), o.css(e.scrollbarYRail, "display", "none"), s(t), a(t, "top", t.scrollTop), a(t, "left", t.scrollLeft), o.css(e.scrollbarXRail, "display", ""), o.css(e.scrollbarYRail, "display", ""))
        }
    }, {
        "../lib/dom": 3,
        "../lib/helper": 6,
        "./instances": 18,
        "./update-geometry": 19,
        "./update-scroll": 20}]
}, {}, [1]),

(jQuery), $.ajaxSetup({headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}}), $(".scroller").perfectScrollbar(), $(window).on("resize.scroller", function () {
    $(".scroller").perfectScrollbar("update")
}), $(".pagination__selector").on("change", function () {
    window.location = $(this).val()
});

$("#contentFilter").on("change", function () {
    window.location = $(this).find("option:selected").data("filterurl");
});
var headerBulkActions = $(".header__action--bulk"), bulkSelectedInput = headerBulkActions.find('input[name="_bulkSelected"]');
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
