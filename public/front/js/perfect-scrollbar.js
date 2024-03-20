/*! For license information please see perfect-scrollbar.js.LICENSE.txt */ ! function (t, e) {
    if ("object" == typeof exports && "object" == typeof module) module.exports = e();
    else if ("function" == typeof define && define.amd) define([], e);
    else {
        var r = e();
        for (var i in r)("object" == typeof exports ? exports : t)[i] = r[i]
    }
}(self, (function () {
    return function () {
        var t = {
                5529: function (t) {
                    t.exports = function () {
                        "use strict";

                        function t(t) {
                            return getComputedStyle(t)
                        }

                        function e(t, e) {
                            for (var r in e) {
                                var i = e[r];
                                "number" == typeof i && (i += "px"), t.style[r] = i
                            }
                            return t
                        }

                        function r(t) {
                            var e = document.createElement("div");
                            return e.className = t, e
                        }
                        var i = "undefined" != typeof Element && (Element.prototype.matches || Element.prototype.webkitMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector);

                        function n(t, e) {
                            if (!i) throw new Error("No element matching method supported");
                            return i.call(t, e)
                        }

                        function l(t) {
                            t.remove ? t.remove() : t.parentNode && t.parentNode.removeChild(t)
                        }

                        function o(t, e) {
                            return Array.prototype.filter.call(t.children, (function (t) {
                                return n(t, e)
                            }))
                        }
                        var s = {
                                main: "ps",
                                rtl: "ps__rtl",
                                element: {
                                    thumb: function (t) {
                                        return "ps__thumb-" + t
                                    },
                                    rail: function (t) {
                                        return "ps__rail-" + t
                                    },
                                    consuming: "ps__child--consume"
                                },
                                state: {
                                    focus: "ps--focus",
                                    clicking: "ps--clicking",
                                    active: function (t) {
                                        return "ps--active-" + t
                                    },
                                    scrolling: function (t) {
                                        return "ps--scrolling-" + t
                                    }
                                }
                            },
                            a = {
                                x: null,
                                y: null
                            };

                        function c(t, e) {
                            var r = t.element.classList,
                                i = s.state.scrolling(e);
                            r.contains(i) ? clearTimeout(a[e]) : r.add(i)
                        }

                        function h(t, e) {
                            a[e] = setTimeout((function () {
                                return t.isAlive && t.element.classList.remove(s.state.scrolling(e))
                            }), t.settings.scrollingThreshold)
                        }
                        var u = function (t) {
                                this.element = t, this.handlers = {}
                            },
                            d = {
                                isEmpty: {
                                    configurable: !0
                                }
                            };
                        u.prototype.bind = function (t, e) {
                            void 0 === this.handlers[t] && (this.handlers[t] = []), this.handlers[t].push(e), this.element.addEventListener(t, e, !1)
                        }, u.prototype.unbind = function (t, e) {
                            var r = this;
                            this.handlers[t] = this.handlers[t].filter((function (i) {
                                return !(!e || i === e) || (r.element.removeEventListener(t, i, !1), !1)
                            }))
                        }, u.prototype.unbindAll = function () {
                            for (var t in this.handlers) this.unbind(t)
                        }, d.isEmpty.get = function () {
                            var t = this;
                            return Object.keys(this.handlers).every((function (e) {
                                return 0 === t.handlers[e].length
                            }))
                        }, Object.defineProperties(u.prototype, d);
                        var f = function () {
                            this.eventElements = []
                        };

                        function p(t) {
                            if ("function" == typeof window.CustomEvent) return new CustomEvent(t);
                            var e = document.createEvent("CustomEvent");
                            return e.initCustomEvent(t, !1, !1, void 0), e
                        }

                        function b(t, e, r, i, n) {
                            var l;
                            if (void 0 === i && (i = !0), void 0 === n && (n = !1), "top" === e) l = ["contentHeight", "containerHeight", "scrollTop", "y", "up", "down"];
                            else {
                                if ("left" !== e) throw new Error("A proper axis should be provided");
                                l = ["contentWidth", "containerWidth", "scrollLeft", "x", "left", "right"]
                            }! function (t, e, r, i, n) {
                                var l = r[0],
                                    o = r[1],
                                    s = r[2],
                                    a = r[3],
                                    u = r[4],
                                    d = r[5];
                                void 0 === i && (i = !0), void 0 === n && (n = !1);
                                var f = t.element;
                                t.reach[a] = null, f[s] < 1 && (t.reach[a] = "start"), f[s] > t[l] - t[o] - 1 && (t.reach[a] = "end"), e && (f.dispatchEvent(p("ps-scroll-" + a)), e < 0 ? f.dispatchEvent(p("ps-scroll-" + u)) : e > 0 && f.dispatchEvent(p("ps-scroll-" + d)), i && function (t, e) {
                                    c(t, e), h(t, e)
                                }(t, a)), t.reach[a] && (e || n) && f.dispatchEvent(p("ps-" + a + "-reach-" + t.reach[a]))
                            }(t, r, l, i, n)
                        }

                        function g(t) {
                            return parseInt(t, 10) || 0
                        }
                        f.prototype.eventElement = function (t) {
                            var e = this.eventElements.filter((function (e) {
                                return e.element === t
                            }))[0];
                            return e || (e = new u(t), this.eventElements.push(e)), e
                        }, f.prototype.bind = function (t, e, r) {
                            this.eventElement(t).bind(e, r)
                        }, f.prototype.unbind = function (t, e, r) {
                            var i = this.eventElement(t);
                            i.unbind(e, r), i.isEmpty && this.eventElements.splice(this.eventElements.indexOf(i), 1)
                        }, f.prototype.unbindAll = function () {
                            this.eventElements.forEach((function (t) {
                                return t.unbindAll()
                            })), this.eventElements = []
                        }, f.prototype.once = function (t, e, r) {
                            var i = this.eventElement(t),
                                n = function (t) {
                                    i.unbind(e, n), r(t)
                                };
                            i.bind(e, n)
                        };
                        var v = {
                            isWebKit: "undefined" != typeof document && "WebkitAppearance" in document.documentElement.style,
                            supportsTouch: "undefined" != typeof window && ("ontouchstart" in window || "maxTouchPoints" in window.navigator && window.navigator.maxTouchPoints > 0 || window.DocumentTouch && document instanceof window.DocumentTouch),
                            supportsIePointer: "undefined" != typeof navigator && navigator.msMaxTouchPoints,
                            isChrome: "undefined" != typeof navigator && /Chrome/i.test(navigator && navigator.userAgent)
                        };

                        function m(t) {
                            var r = t.element,
                                i = Math.floor(r.scrollTop),
                                n = r.getBoundingClientRect();
                            t.containerWidth = Math.round(n.width), t.containerHeight = Math.round(n.height), t.contentWidth = r.scrollWidth, t.contentHeight = r.scrollHeight, r.contains(t.scrollbarXRail) || (o(r, s.element.rail("x")).forEach((function (t) {
                                    return l(t)
                                })), r.appendChild(t.scrollbarXRail)), r.contains(t.scrollbarYRail) || (o(r, s.element.rail("y")).forEach((function (t) {
                                    return l(t)
                                })), r.appendChild(t.scrollbarYRail)), !t.settings.suppressScrollX && t.containerWidth + t.settings.scrollXMarginOffset < t.contentWidth ? (t.scrollbarXActive = !0, t.railXWidth = t.containerWidth - t.railXMarginWidth, t.railXRatio = t.containerWidth / t.railXWidth, t.scrollbarXWidth = Y(t, g(t.railXWidth * t.containerWidth / t.contentWidth)), t.scrollbarXLeft = g((t.negativeScrollAdjustment + r.scrollLeft) * (t.railXWidth - t.scrollbarXWidth) / (t.contentWidth - t.containerWidth))) : t.scrollbarXActive = !1, !t.settings.suppressScrollY && t.containerHeight + t.settings.scrollYMarginOffset < t.contentHeight ? (t.scrollbarYActive = !0, t.railYHeight = t.containerHeight - t.railYMarginHeight, t.railYRatio = t.containerHeight / t.railYHeight, t.scrollbarYHeight = Y(t, g(t.railYHeight * t.containerHeight / t.contentHeight)), t.scrollbarYTop = g(i * (t.railYHeight - t.scrollbarYHeight) / (t.contentHeight - t.containerHeight))) : t.scrollbarYActive = !1, t.scrollbarXLeft >= t.railXWidth - t.scrollbarXWidth && (t.scrollbarXLeft = t.railXWidth - t.scrollbarXWidth), t.scrollbarYTop >= t.railYHeight - t.scrollbarYHeight && (t.scrollbarYTop = t.railYHeight - t.scrollbarYHeight),
                                function (t, r) {
                                    var i = {
                                            width: r.railXWidth
                                        },
                                        n = Math.floor(t.scrollTop);
                                    r.isRtl ? i.left = r.negativeScrollAdjustment + t.scrollLeft + r.containerWidth - r.contentWidth : i.left = t.scrollLeft, r.isScrollbarXUsingBottom ? i.bottom = r.scrollbarXBottom - n : i.top = r.scrollbarXTop + n, e(r.scrollbarXRail, i);
                                    var l = {
                                        top: n,
                                        height: r.railYHeight
                                    };
                                    r.isScrollbarYUsingRight ? r.isRtl ? l.right = r.contentWidth - (r.negativeScrollAdjustment + t.scrollLeft) - r.scrollbarYRight - r.scrollbarYOuterWidth - 9 : l.right = r.scrollbarYRight - t.scrollLeft : r.isRtl ? l.left = r.negativeScrollAdjustment + t.scrollLeft + 2 * r.containerWidth - r.contentWidth - r.scrollbarYLeft - r.scrollbarYOuterWidth : l.left = r.scrollbarYLeft + t.scrollLeft, e(r.scrollbarYRail, l), e(r.scrollbarX, {
                                        left: r.scrollbarXLeft,
                                        width: r.scrollbarXWidth - r.railBorderXWidth
                                    }), e(r.scrollbarY, {
                                        top: r.scrollbarYTop,
                                        height: r.scrollbarYHeight - r.railBorderYWidth
                                    })
                                }(r, t), t.scrollbarXActive ? r.classList.add(s.state.active("x")) : (r.classList.remove(s.state.active("x")), t.scrollbarXWidth = 0, t.scrollbarXLeft = 0, r.scrollLeft = !0 === t.isRtl ? t.contentWidth : 0), t.scrollbarYActive ? r.classList.add(s.state.active("y")) : (r.classList.remove(s.state.active("y")), t.scrollbarYHeight = 0, t.scrollbarYTop = 0, r.scrollTop = 0)
                        }

                        function Y(t, e) {
                            return t.settings.minScrollbarLength && (e = Math.max(e, t.settings.minScrollbarLength)), t.settings.maxScrollbarLength && (e = Math.min(e, t.settings.maxScrollbarLength)), e
                        }

                        function y(t, e) {
                            var r = e[0],
                                i = e[1],
                                n = e[2],
                                l = e[3],
                                o = e[4],
                                a = e[5],
                                u = e[6],
                                d = e[7],
                                f = e[8],
                                p = t.element,
                                b = null,
                                g = null,
                                v = null;

                            function Y(e) {
                                e.touches && e.touches[0] && (e[n] = e.touches[0].pageY), p[u] = b + v * (e[n] - g), c(t, d), m(t), e.stopPropagation(), e.type.startsWith("touch") && e.changedTouches.length > 1 && e.preventDefault()
                            }

                            function y() {
                                h(t, d), t[f].classList.remove(s.state.clicking), t.event.unbind(t.ownerDocument, "mousemove", Y)
                            }

                            function X(e, o) {
                                b = p[u], o && e.touches && (e[n] = e.touches[0].pageY), g = e[n], v = (t[i] - t[r]) / (t[l] - t[a]), o ? t.event.bind(t.ownerDocument, "touchmove", Y) : (t.event.bind(t.ownerDocument, "mousemove", Y), t.event.once(t.ownerDocument, "mouseup", y), e.preventDefault()), t[f].classList.add(s.state.clicking), e.stopPropagation()
                            }
                            t.event.bind(t[o], "mousedown", (function (t) {
                                X(t)
                            })), t.event.bind(t[o], "touchstart", (function (t) {
                                X(t, !0)
                            }))
                        }
                        var X = {
                                "click-rail": function (t) {
                                    t.element, t.event.bind(t.scrollbarY, "mousedown", (function (t) {
                                        return t.stopPropagation()
                                    })), t.event.bind(t.scrollbarYRail, "mousedown", (function (e) {
                                        var r = e.pageY - window.pageYOffset - t.scrollbarYRail.getBoundingClientRect().top > t.scrollbarYTop ? 1 : -1;
                                        t.element.scrollTop += r * t.containerHeight, m(t), e.stopPropagation()
                                    })), t.event.bind(t.scrollbarX, "mousedown", (function (t) {
                                        return t.stopPropagation()
                                    })), t.event.bind(t.scrollbarXRail, "mousedown", (function (e) {
                                        var r = e.pageX - window.pageXOffset - t.scrollbarXRail.getBoundingClientRect().left > t.scrollbarXLeft ? 1 : -1;
                                        t.element.scrollLeft += r * t.containerWidth, m(t), e.stopPropagation()
                                    }))
                                },
                                "drag-thumb": function (t) {
                                    y(t, ["containerWidth", "contentWidth", "pageX", "railXWidth", "scrollbarX", "scrollbarXWidth", "scrollLeft", "x", "scrollbarXRail"]), y(t, ["containerHeight", "contentHeight", "pageY", "railYHeight", "scrollbarY", "scrollbarYHeight", "scrollTop", "y", "scrollbarYRail"])
                                },
                                keyboard: function (t) {
                                    var e = t.element;
                                    t.event.bind(t.ownerDocument, "keydown", (function (r) {
                                        if (!(r.isDefaultPrevented && r.isDefaultPrevented() || r.defaultPrevented) && (n(e, ":hover") || n(t.scrollbarX, ":focus") || n(t.scrollbarY, ":focus"))) {
                                            var i = document.activeElement ? document.activeElement : t.ownerDocument.activeElement;
                                            if (i) {
                                                if ("IFRAME" === i.tagName) i = i.contentDocument.activeElement;
                                                else
                                                    for (; i.shadowRoot;) i = i.shadowRoot.activeElement;
                                                if (n(s = i, "input,[contenteditable]") || n(s, "select,[contenteditable]") || n(s, "textarea,[contenteditable]") || n(s, "button,[contenteditable]")) return
                                            }
                                            var l = 0,
                                                o = 0;
                                            switch (r.which) {
                                                case 37:
                                                    l = r.metaKey ? -t.contentWidth : r.altKey ? -t.containerWidth : -30;
                                                    break;
                                                case 38:
                                                    o = r.metaKey ? t.contentHeight : r.altKey ? t.containerHeight : 30;
                                                    break;
                                                case 39:
                                                    l = r.metaKey ? t.contentWidth : r.altKey ? t.containerWidth : 30;
                                                    break;
                                                case 40:
                                                    o = r.metaKey ? -t.contentHeight : r.altKey ? -t.containerHeight : -30;
                                                    break;
                                                case 32:
                                                    o = r.shiftKey ? t.containerHeight : -t.containerHeight;
                                                    break;
                                                case 33:
                                                    o = t.containerHeight;
                                                    break;
                                                case 34:
                                                    o = -t.containerHeight;
                                                    break;
                                                case 36:
                                                    o = t.contentHeight;
                                                    break;
                                                case 35:
                                                    o = -t.contentHeight;
                                                    break;
                                                default:
                                                    return
                                            }
                                            t.settings.suppressScrollX && 0 !== l || t.settings.suppressScrollY && 0 !== o || (e.scrollTop -= o, e.scrollLeft += l, m(t), function (r, i) {
                                                var n = Math.floor(e.scrollTop);
                                                if (0 === r) {
                                                    if (!t.scrollbarYActive) return !1;
                                                    if (0 === n && i > 0 || n >= t.contentHeight - t.containerHeight && i < 0) return !t.settings.wheelPropagation
                                                }
                                                var l = e.scrollLeft;
                                                if (0 === i) {
                                                    if (!t.scrollbarXActive) return !1;
                                                    if (0 === l && r < 0 || l >= t.contentWidth - t.containerWidth && r > 0) return !t.settings.wheelPropagation
                                                }
                                                return !0
                                            }(l, o) && r.preventDefault())
                                        }
                                        var s
                                    }))
                                },
                                wheel: function (e) {
                                    var r = e.element;

                                    function i(i) {
                                        var n = function (t) {
                                                var e = t.deltaX,
                                                    r = -1 * t.deltaY;
                                                return void 0 !== e && void 0 !== r || (e = -1 * t.wheelDeltaX / 6, r = t.wheelDeltaY / 6), t.deltaMode && 1 === t.deltaMode && (e *= 10, r *= 10), e != e && r != r && (e = 0, r = t.wheelDelta), t.shiftKey ? [-r, -e] : [e, r]
                                            }(i),
                                            l = n[0],
                                            o = n[1];
                                        if (! function (e, i, n) {
                                                if (!v.isWebKit && r.querySelector("select:focus")) return !0;
                                                if (!r.contains(e)) return !1;
                                                for (var l = e; l && l !== r;) {
                                                    if (l.classList.contains(s.element.consuming)) return !0;
                                                    var o = t(l);
                                                    if (n && o.overflowY.match(/(scroll|auto)/)) {
                                                        var a = l.scrollHeight - l.clientHeight;
                                                        if (a > 0 && (l.scrollTop > 0 && n < 0 || l.scrollTop < a && n > 0)) return !0
                                                    }
                                                    if (i && o.overflowX.match(/(scroll|auto)/)) {
                                                        var c = l.scrollWidth - l.clientWidth;
                                                        if (c > 0 && (l.scrollLeft > 0 && i < 0 || l.scrollLeft < c && i > 0)) return !0
                                                    }
                                                    l = l.parentNode
                                                }
                                                return !1
                                            }(i.target, l, o)) {
                                            var a = !1;
                                            e.settings.useBothWheelAxes ? e.scrollbarYActive && !e.scrollbarXActive ? (o ? r.scrollTop -= o * e.settings.wheelSpeed : r.scrollTop += l * e.settings.wheelSpeed, a = !0) : e.scrollbarXActive && !e.scrollbarYActive && (l ? r.scrollLeft += l * e.settings.wheelSpeed : r.scrollLeft -= o * e.settings.wheelSpeed, a = !0) : (r.scrollTop -= o * e.settings.wheelSpeed, r.scrollLeft += l * e.settings.wheelSpeed), m(e), (a = a || function (t, i) {
                                                var n = Math.floor(r.scrollTop),
                                                    l = 0 === r.scrollTop,
                                                    o = n + r.offsetHeight === r.scrollHeight,
                                                    s = 0 === r.scrollLeft,
                                                    a = r.scrollLeft + r.offsetWidth === r.scrollWidth;
                                                return !(Math.abs(i) > Math.abs(t) ? l || o : s || a) || !e.settings.wheelPropagation
                                            }(l, o)) && !i.ctrlKey && (i.stopPropagation(), i.preventDefault())
                                        }
                                    }
                                    void 0 !== window.onwheel ? e.event.bind(r, "wheel", i) : void 0 !== window.onmousewheel && e.event.bind(r, "mousewheel", i)
                                },
                                touch: function (e) {
                                    if (v.supportsTouch || v.supportsIePointer) {
                                        var r = e.element,
                                            i = {},
                                            n = 0,
                                            l = {},
                                            o = null;
                                        v.supportsTouch ? (e.event.bind(r, "touchstart", u), e.event.bind(r, "touchmove", d), e.event.bind(r, "touchend", f)) : v.supportsIePointer && (window.PointerEvent ? (e.event.bind(r, "pointerdown", u), e.event.bind(r, "pointermove", d), e.event.bind(r, "pointerup", f)) : window.MSPointerEvent && (e.event.bind(r, "MSPointerDown", u), e.event.bind(r, "MSPointerMove", d), e.event.bind(r, "MSPointerUp", f)))
                                    }

                                    function a(t, i) {
                                        r.scrollTop -= i, r.scrollLeft -= t, m(e)
                                    }

                                    function c(t) {
                                        return t.targetTouches ? t.targetTouches[0] : t
                                    }

                                    function h(t) {
                                        return !(t.pointerType && "pen" === t.pointerType && 0 === t.buttons || (!t.targetTouches || 1 !== t.targetTouches.length) && (!t.pointerType || "mouse" === t.pointerType || t.pointerType === t.MSPOINTER_TYPE_MOUSE))
                                    }

                                    function u(t) {
                                        if (h(t)) {
                                            var e = c(t);
                                            i.pageX = e.pageX, i.pageY = e.pageY, n = (new Date).getTime(), null !== o && clearInterval(o)
                                        }
                                    }

                                    function d(o) {
                                        if (h(o)) {
                                            var u = c(o),
                                                d = {
                                                    pageX: u.pageX,
                                                    pageY: u.pageY
                                                },
                                                f = d.pageX - i.pageX,
                                                p = d.pageY - i.pageY;
                                            if (function (e, i, n) {
                                                    if (!r.contains(e)) return !1;
                                                    for (var l = e; l && l !== r;) {
                                                        if (l.classList.contains(s.element.consuming)) return !0;
                                                        var o = t(l);
                                                        if (n && o.overflowY.match(/(scroll|auto)/)) {
                                                            var a = l.scrollHeight - l.clientHeight;
                                                            if (a > 0 && (l.scrollTop > 0 && n < 0 || l.scrollTop < a && n > 0)) return !0
                                                        }
                                                        if (i && o.overflowX.match(/(scroll|auto)/)) {
                                                            var c = l.scrollWidth - l.clientWidth;
                                                            if (c > 0 && (l.scrollLeft > 0 && i < 0 || l.scrollLeft < c && i > 0)) return !0
                                                        }
                                                        l = l.parentNode
                                                    }
                                                    return !1
                                                }(o.target, f, p)) return;
                                            a(f, p), i = d;
                                            var b = (new Date).getTime(),
                                                g = b - n;
                                            g > 0 && (l.x = f / g, l.y = p / g, n = b),
                                                function (t, i) {
                                                    var n = Math.floor(r.scrollTop),
                                                        l = r.scrollLeft,
                                                        o = Math.abs(t),
                                                        s = Math.abs(i);
                                                    if (s > o) {
                                                        if (i < 0 && n === e.contentHeight - e.containerHeight || i > 0 && 0 === n) return 0 === window.scrollY && i > 0 && v.isChrome
                                                    } else if (o > s && (t < 0 && l === e.contentWidth - e.containerWidth || t > 0 && 0 === l)) return !0;
                                                    return !0
                                                }(f, p) && o.preventDefault()
                                        }
                                    }

                                    function f() {
                                        e.settings.swipeEasing && (clearInterval(o), o = setInterval((function () {
                                            e.isInitialized ? clearInterval(o) : l.x || l.y ? Math.abs(l.x) < .01 && Math.abs(l.y) < .01 ? clearInterval(o) : e.element ? (a(30 * l.x, 30 * l.y), l.x *= .8, l.y *= .8) : clearInterval(o) : clearInterval(o)
                                        }), 10))
                                    }
                                }
                            },
                            w = function (i, n) {
                                var l = this;
                                if (void 0 === n && (n = {}), "string" == typeof i && (i = document.querySelector(i)), !i || !i.nodeName) throw new Error("no element is specified to initialize PerfectScrollbar");
                                for (var o in this.element = i, i.classList.add(s.main), this.settings = {
                                        handlers: ["click-rail", "drag-thumb", "keyboard", "wheel", "touch"],
                                        maxScrollbarLength: null,
                                        minScrollbarLength: null,
                                        scrollingThreshold: 1e3,
                                        scrollXMarginOffset: 0,
                                        scrollYMarginOffset: 0,
                                        suppressScrollX: !1,
                                        suppressScrollY: !1,
                                        swipeEasing: !0,
                                        useBothWheelAxes: !1,
                                        wheelPropagation: !0,
                                        wheelSpeed: 1
                                    }, n) this.settings[o] = n[o];
                                this.containerWidth = null, this.containerHeight = null, this.contentWidth = null, this.contentHeight = null;
                                var a, c, h = function () {
                                        return i.classList.add(s.state.focus)
                                    },
                                    u = function () {
                                        return i.classList.remove(s.state.focus)
                                    };
                                this.isRtl = "rtl" === t(i).direction, !0 === this.isRtl && i.classList.add(s.rtl), this.isNegativeScroll = (a = i.scrollLeft, null, i.scrollLeft = -1, c = i.scrollLeft < 0, i.scrollLeft = a, c), this.negativeScrollAdjustment = this.isNegativeScroll ? i.scrollWidth - i.clientWidth : 0, this.event = new f, this.ownerDocument = i.ownerDocument || document, this.scrollbarXRail = r(s.element.rail("x")), i.appendChild(this.scrollbarXRail), this.scrollbarX = r(s.element.thumb("x")), this.scrollbarXRail.appendChild(this.scrollbarX), this.scrollbarX.setAttribute("tabindex", 0), this.event.bind(this.scrollbarX, "focus", h), this.event.bind(this.scrollbarX, "blur", u), this.scrollbarXActive = null, this.scrollbarXWidth = null, this.scrollbarXLeft = null;
                                var d = t(this.scrollbarXRail);
                                this.scrollbarXBottom = parseInt(d.bottom, 10), isNaN(this.scrollbarXBottom) ? (this.isScrollbarXUsingBottom = !1, this.scrollbarXTop = g(d.top)) : this.isScrollbarXUsingBottom = !0, this.railBorderXWidth = g(d.borderLeftWidth) + g(d.borderRightWidth), e(this.scrollbarXRail, {
                                    display: "block"
                                }), this.railXMarginWidth = g(d.marginLeft) + g(d.marginRight), e(this.scrollbarXRail, {
                                    display: ""
                                }), this.railXWidth = null, this.railXRatio = null, this.scrollbarYRail = r(s.element.rail("y")), i.appendChild(this.scrollbarYRail), this.scrollbarY = r(s.element.thumb("y")), this.scrollbarYRail.appendChild(this.scrollbarY), this.scrollbarY.setAttribute("tabindex", 0), this.event.bind(this.scrollbarY, "focus", h), this.event.bind(this.scrollbarY, "blur", u), this.scrollbarYActive = null, this.scrollbarYHeight = null, this.scrollbarYTop = null;
                                var p = t(this.scrollbarYRail);
                                this.scrollbarYRight = parseInt(p.right, 10), isNaN(this.scrollbarYRight) ? (this.isScrollbarYUsingRight = !1, this.scrollbarYLeft = g(p.left)) : this.isScrollbarYUsingRight = !0, this.scrollbarYOuterWidth = this.isRtl ? function (e) {
                                    var r = t(e);
                                    return g(r.width) + g(r.paddingLeft) + g(r.paddingRight) + g(r.borderLeftWidth) + g(r.borderRightWidth)
                                }(this.scrollbarY) : null, this.railBorderYWidth = g(p.borderTopWidth) + g(p.borderBottomWidth), e(this.scrollbarYRail, {
                                    display: "block"
                                }), this.railYMarginHeight = g(p.marginTop) + g(p.marginBottom), e(this.scrollbarYRail, {
                                    display: ""
                                }), this.railYHeight = null, this.railYRatio = null, this.reach = {
                                    x: i.scrollLeft <= 0 ? "start" : i.scrollLeft >= this.contentWidth - this.containerWidth ? "end" : null,
                                    y: i.scrollTop <= 0 ? "start" : i.scrollTop >= this.contentHeight - this.containerHeight ? "end" : null
                                }, this.isAlive = !0, this.settings.handlers.forEach((function (t) {
                                    return X[t](l)
                                })), this.lastScrollTop = Math.floor(i.scrollTop), this.lastScrollLeft = i.scrollLeft, this.event.bind(this.element, "scroll", (function (t) {
                                    return l.onScroll(t)
                                })), m(this)
                            };
                        return w.prototype.update = function () {
                            this.isAlive && (this.negativeScrollAdjustment = this.isNegativeScroll ? this.element.scrollWidth - this.element.clientWidth : 0, e(this.scrollbarXRail, {
                                display: "block"
                            }), e(this.scrollbarYRail, {
                                display: "block"
                            }), this.railXMarginWidth = g(t(this.scrollbarXRail).marginLeft) + g(t(this.scrollbarXRail).marginRight), this.railYMarginHeight = g(t(this.scrollbarYRail).marginTop) + g(t(this.scrollbarYRail).marginBottom), e(this.scrollbarXRail, {
                                display: "none"
                            }), e(this.scrollbarYRail, {
                                display: "none"
                            }), m(this), b(this, "top", 0, !1, !0), b(this, "left", 0, !1, !0), e(this.scrollbarXRail, {
                                display: ""
                            }), e(this.scrollbarYRail, {
                                display: ""
                            }))
                        }, w.prototype.onScroll = function (t) {
                            this.isAlive && (m(this), b(this, "top", this.element.scrollTop - this.lastScrollTop), b(this, "left", this.element.scrollLeft - this.lastScrollLeft), this.lastScrollTop = Math.floor(this.element.scrollTop), this.lastScrollLeft = this.element.scrollLeft)
                        }, w.prototype.destroy = function () {
                            this.isAlive && (this.event.unbindAll(), l(this.scrollbarX), l(this.scrollbarY), l(this.scrollbarXRail), l(this.scrollbarYRail), this.removePsClasses(), this.element = null, this.scrollbarX = null, this.scrollbarY = null, this.scrollbarXRail = null, this.scrollbarYRail = null, this.isAlive = !1)
                        }, w.prototype.removePsClasses = function () {
                            this.element.className = this.element.className.split(" ").filter((function (t) {
                                return !t.match(/^ps([-_].+|)$/)
                            })).join(" ")
                        }, w
                    }()
                }
            },
            e = {};

        function r(i) {
            var n = e[i];
            if (void 0 !== n) return n.exports;
            var l = e[i] = {
                exports: {}
            };
            return t[i].call(l.exports, l, l.exports, r), l.exports
        }
        r.n = function (t) {
            var e = t && t.__esModule ? function () {
                return t.default
            } : function () {
                return t
            };
            return r.d(e, {
                a: e
            }), e
        }, r.d = function (t, e) {
            for (var i in e) r.o(e, i) && !r.o(t, i) && Object.defineProperty(t, i, {
                enumerable: !0,
                get: e[i]
            })
        }, r.o = function (t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }, r.r = function (t) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
                value: "Module"
            }), Object.defineProperty(t, "__esModule", {
                value: !0
            })
        };
        var i = {};
        return function () {
            "use strict";
            r.r(i), r.d(i, {
                PerfectScrollbar: function () {
                    return e.a
                }
            });
            var t = r(5529),
                e = r.n(t)
        }(), i
    }()
}));
