!function(t, e) {
    "use strict";
    if (!t.fn.dotdotdot) {
        t.fn.dotdotdot = function(e) {
            if (0 === this.length)
                return t.fn.dotdotdot.debug('No element found for "' + this.selector + '".'),
                this;
            if (this.length > 1)
                return this.each(function() {
                    t(this).dotdotdot(e)
                });
            var r = this
              , a = r.contents();
            r.data("dotdotdot") && r.trigger("destroy.dot"),
            r.data("dotdotdot-style", r.attr("style") || ""),
            r.css("word-wrap", "break-word"),
            "nowrap" === r.css("white-space") && r.css("white-space", "normal"),
            r.bind_events = function() {
                return r.bind("update.dot", function(e, n) {
                    switch (r.removeClass("is-truncated"),
                    e.preventDefault(),
                    e.stopPropagation(),
                    typeof u.height) {
                    case "number":
                        u.maxHeight = u.height;
                        break;
                    case "function":
                        u.maxHeight = u.height.call(r[0]);
                        break;
                    default:
                        u.maxHeight = function(t) {
                            for (var e = t.innerHeight(), n = ["paddingTop", "paddingBottom"], r = 0, a = n.length; r < a; r++) {
                                var i = parseInt(t.css(n[r]), 10);
                                isNaN(i) && (i = 0),
                                e -= i
                            }
                            return e
                        }(r)
                    }
                    u.maxHeight += u.tolerance,
                    void 0 !== n && (("string" == typeof n || "nodeType"in n && 1 === n.nodeType) && (n = t("<div />").append(n).contents()),
                    n instanceof t && (a = n)),
                    (v = r.wrapInner('<div class="dotdotdot" />').children()).contents().detach().end().append(a.clone(!0)).find("br").replaceWith("  <br />  ").end().css({
                        height: "auto",
                        width: "auto",
                        border: "none",
                        padding: 0,
                        margin: 0
                    });
                    var d = !1
                      , c = !1;
                    return f.afterElement && ((d = f.afterElement.clone(!0)).show(),
                    f.afterElement.detach()),
                    i(v, u) && (c = "children" == u.wrap ? function(t, e, n) {
                        var r = t.children()
                          , a = !1;
                        t.empty();
                        for (var o = 0, d = r.length; o < d; o++) {
                            var l = r.eq(o);
                            if (t.append(l),
                            n && t.append(n),
                            i(t, e)) {
                                l.remove(),
                                a = !0;
                                break
                            }
                            n && n.detach()
                        }
                        return a
                    }(v, u, d) : function e(n, r, a, d, c) {
                        var u = !1;
                        return n.contents().detach().each(function() {
                            var f = t(this);
                            if (void 0 === this)
                                return !0;
                            if (f.is("script, .dotdotdot-keep"))
                                n.append(f);
                            else {
                                if (u)
                                    return !0;
                                n.append(f),
                                !c || f.is(d.after) || f.find(d.after).length || n[n.is("a, table, thead, tbody, tfoot, tr, col, colgroup, object, embed, param, ol, ul, dl, blockquote, select, optgroup, option, textarea, script, style") ? "after" : "append"](c),
                                i(a, d) && (u = 3 == this.nodeType ? function(e, n, r, a, d) {
                                    var c = e[0];
                                    if (!c)
                                        return !1;
                                    var u = s(c)
                                      , f = -1 !== u.indexOf(" ") ? " " : "　"
                                      , p = "letter" == a.wrap ? "" : f
                                      , g = u.split(p)
                                      , v = -1
                                      , w = -1
                                      , m = 0
                                      , b = g.length - 1;
                                    if (a.fallbackToLetter && 0 === m && 0 === b && (p = "",
                                    b = (g = u.split(p)).length - 1),
                                    a.maxLength)
                                        u = o(u.trim().substr(0, a.maxLength), a),
                                        l(c, u);
                                    else {
                                        for (; m <= b && (0 !== m || 0 !== b); ) {
                                            var y = Math.floor((m + b) / 2);
                                            if (y == w)
                                                break;
                                            w = y,
                                            l(c, g.slice(0, w + 1).join(p) + a.ellipsis),
                                            r.children().each(function() {
                                                t(this).toggle().toggle()
                                            }),
                                            i(r, a) ? (b = w,
                                            a.fallbackToLetter && 0 === m && 0 === b && (p = "",
                                            v = -1,
                                            w = -1,
                                            m = 0,
                                            b = (g = g[0].split(p)).length - 1)) : (v = w,
                                            m = w)
                                        }
                                        if (-1 == v || 1 === g.length && 0 === g[0].length) {
                                            var x = e.parent();
                                            e.detach();
                                            var C = d && d.closest(x).length ? d.length : 0;
                                            if (x.contents().length > C ? c = h(x.contents().eq(-1 - C), n) : (c = h(x, n, !0),
                                            C || x.detach()),
                                            c && (l(c, u = o(s(c), a)),
                                            C && d)) {
                                                var T = d.parent();
                                                t(c).parent().append(d),
                                                t.trim(T.html()) || T.remove()
                                            }
                                        } else
                                            u = o(g.slice(0, v + 1).join(p), a),
                                            l(c, u)
                                    }
                                    return !0
                                }(f, r, a, d, c) : e(f, r, a, d, c)),
                                u || c && c.detach()
                            }
                        }),
                        r.addClass("is-truncated"),
                        u
                    }(v, r, v, u, d)),
                    v.replaceWith(v.contents()),
                    v = null,
                    t.isFunction(u.callback) && u.callback.call(r[0], c, a),
                    f.isTruncated = c,
                    c
                }).bind("isTruncated.dot", function(t, e) {
                    return t.preventDefault(),
                    t.stopPropagation(),
                    "function" == typeof e && e.call(r[0], f.isTruncated),
                    f.isTruncated
                }).bind("originalContent.dot", function(t, e) {
                    return t.preventDefault(),
                    t.stopPropagation(),
                    "function" == typeof e && e.call(r[0], a),
                    a
                }).bind("destroy.dot", function(t) {
                    t.preventDefault(),
                    t.stopPropagation(),
                    r.unwatch().unbind_events().contents().detach().end().append(a).attr("style", r.data("dotdotdot-style") || "").removeClass("is-truncated").data("dotdotdot", !1)
                }),
                r
            }
            ,
            r.unbind_events = function() {
                return r.unbind(".dot"),
                r
            }
            ,
            r.watch = function() {
                if (r.unwatch(),
                "window" == u.watch) {
                    var e = t(window)
                      , n = e.width()
                      , a = e.height();
                    e.bind("resize.dot" + f.dotId, function() {
                        n == e.width() && a == e.height() && u.windowResizeFix || (n = e.width(),
                        a = e.height(),
                        g && clearInterval(g),
                        g = setTimeout(function() {
                            r.trigger("update.dot")
                        }, 100))
                    })
                } else
                    p = d(r),
                    g = setInterval(function() {
                        if (r.is(":visible")) {
                            var t = d(r);
                            p.width == t.width && p.height == t.height || (r.trigger("update.dot"),
                            p = t)
                        }
                    }, 500);
                return r
            }
            ,
            r.unwatch = function() {
                return t(window).unbind("resize.dot" + f.dotId),
                g && clearInterval(g),
                r
            }
            ;
            var c, u = t.extend(!0, {}, t.fn.dotdotdot.defaults, e), f = {}, p = {}, g = null, v = null;
            return u.lastCharacter.remove instanceof Array || (u.lastCharacter.remove = t.fn.dotdotdot.defaultArrays.lastCharacter.remove),
            u.lastCharacter.noEllipsis instanceof Array || (u.lastCharacter.noEllipsis = t.fn.dotdotdot.defaultArrays.lastCharacter.noEllipsis),
            f.afterElement = !!(c = u.after) && ("string" == typeof c ? !!(c = t(c, r)).length && c : !!c.jquery && c),
            f.isTruncated = !1,
            f.dotId = n++,
            r.data("dotdotdot", !0).bind_events().trigger("update.dot"),
            u.watch && r.watch(),
            r
        }
        ,
        t.fn.dotdotdot.defaults = {
            ellipsis: "... ",
            wrap: "word",
            fallbackToLetter: !0,
            lastCharacter: {},
            tolerance: 0,
            callback: null,
            after: null,
            height: null,
            watch: !1,
            windowResizeFix: !0,
            maxLength: null
        },
        t.fn.dotdotdot.defaultArrays = {
            lastCharacter: {
                remove: [" ", "　", ",", ";", ".", "!", "?"],
                noEllipsis: []
            }
        },
        t.fn.dotdotdot.debug = function(t) {}
        ;
        var n = 1
          , r = t.fn.html;
        t.fn.html = function(n) {
            return n != e && !t.isFunction(n) && this.data("dotdotdot") ? this.trigger("update", [n]) : r.apply(this, arguments)
        }
        ;
        var a = t.fn.text;
        t.fn.text = function(n) {
            return n != e && !t.isFunction(n) && this.data("dotdotdot") ? (n = t("<div />").text(n).html(),
            this.trigger("update", [n])) : a.apply(this, arguments)
        }
    }
    function i(t, e) {
        return t.innerHeight() > e.maxHeight || e.maxLength && t.text().trim().length > e.maxLength
    }
    function o(e, n) {
        for (; t.inArray(e.slice(-1), n.lastCharacter.remove) > -1; )
            e = e.slice(0, -1);
        return t.inArray(e.slice(-1), n.lastCharacter.noEllipsis) < 0 && (e += n.ellipsis),
        e
    }
    function d(t) {
        return {
            width: t.innerWidth(),
            height: t.innerHeight()
        }
    }
    function l(t, e) {
        t.innerText ? t.innerText = e : t.nodeValue ? t.nodeValue = e : t.textContent && (t.textContent = e)
    }
    function s(t) {
        return t.innerText ? t.innerText : t.nodeValue ? t.nodeValue : t.textContent ? t.textContent : ""
    }
    function c(t) {
        do {
            t = t.previousSibling
        } while (t && 1 !== t.nodeType && 3 !== t.nodeType);return t
    }
    function h(e, n, r) {
        var a, i = e && e[0];
        if (i) {
            if (!r) {
                if (3 === i.nodeType)
                    return i;
                if (t.trim(e.text()))
                    return h(e.contents().last(), n)
            }
            for (a = c(i); !a; ) {
                if ((e = e.parent()).is(n) || !e.length)
                    return !1;
                a = c(e[0])
            }
            if (a)
                return h(t(a), n)
        }
        return !1
    }
}(jQuery),
jQuery(document).ready(function(t) {
    t(".dot-ellipsis").each(function() {
        var e = t(this).hasClass("dot-resize-update")
          , n = t(this).hasClass("dot-timer-update")
          , r = 0
          , a = t(this).attr("class").split(/\s+/);
        t.each(a, function(t, e) {
            var n = e.match(/^dot-height-(\d+)$/);
            null !== n && (r = Number(n[1]))
        });
        var i = {};
        n && (i.watch = !0),
        e && (i.watch = "window"),
        r > 0 && (i.height = r),
        t(this).dotdotdot(i)
    })
}),
jQuery(window).on("load", function() {
    jQuery(".dot-ellipsis.dot-load-update").trigger("update.dot")
});
(function($) {
    $.fn.extend({
        overDot: function() {
            var beforeStr = ""
              , afterStr = "";
            return $(this).each(function() {
                beforeStr = $(this).text();
                $(this).dotdotdot({
                    wrap: 'letter'
                });
                afterStr = $(this).text();
                if (beforeStr != afterStr) {
                    $(this).attr("title", $.trim(beforeStr));
                }
            });
        }
    });
}
)(jQuery);
