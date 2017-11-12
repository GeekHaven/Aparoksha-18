window.log = function f() {
    log.history = log.history || [];
    log.history.push(arguments);
    if (this.console) {
        var a = arguments,
            b;
        a.callee = a.callee.caller;
        b = [].slice.call(a);
        if (typeof console.log === "object") {
            log.apply.call(console.log, console, b)
        } else {
            console.log.apply(console, b)
        }
    }
};
(function(i) {
    function h() {}
    for (var k = "assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","), j; !!(j = k.pop());) {
        i[j] = i[j] || h
    }
})(function() {
    try {
        console.log();
        return window.console
    } catch (b) {
        return (window.console = {})
    }
}());
window.PR_SHOULD_USE_CONTINUATION = true;
window.PR_TAB_WIDTH = 8;
window.PR_normalizedHtml = window.PR = window.prettyPrintOne = window.prettyPrint = void 0;
window._pr_isIE6 = function() {
    var a = navigator && navigator.userAgent && navigator.userAgent.match(/\bMSIE ([678])\./);
    a = a ? +a[1] : false;
    window._pr_isIE6 = function() {
        return a
    };
    return a
};
(function() {
    function ap(u) {
        return u.replace(v, "&amp;").replace(t, "&lt;").replace(s, "&gt;")
    }

    function T(u, B, z) {
        switch (u.nodeType) {
            case 1:
                var C = u.tagName.toLowerCase();
                B.push("<", C);
                var x = u.attributes,
                    E = x.length;
                if (E) {
                    if (z) {
                        for (var A = [], y = E; --y >= 0;) {
                            A[y] = x[y]
                        }
                        A.sort(function(H, G) {
                            return H.name < G.name ? -1 : H.name === G.name ? 0 : 1
                        });
                        x = A
                    }
                    for (y = 0; y < E; ++y) {
                        A = x[y];
                        A.specified && B.push(" ", A.name.toLowerCase(), '="', A.value.replace(v, "&amp;").replace(t, "&lt;").replace(s, "&gt;").replace(j, "&quot;"), '"')
                    }
                }
                B.push(">");
                for (x = u.firstChild; x; x = x.nextSibling) {
                    T(x, B, z)
                }
                if (u.firstChild || !/^(?:br|link|img)$/.test(C)) {
                    B.push("</", C, ">")
                }
                break;
            case 3:
            case 4:
                B.push(ap(u.nodeValue));
                break
        }
    }

    function r(I) {
        function H(K) {
            if (K.charAt(0) !== "\\") {
                return K.charCodeAt(0)
            }
            switch (K.charAt(1)) {
                case "b":
                    return 8;
                case "t":
                    return 9;
                case "n":
                    return 10;
                case "v":
                    return 11;
                case "f":
                    return 12;
                case "r":
                    return 13;
                case "u":
                case "x":
                    return parseInt(K.substring(2), 16) || K.charCodeAt(1);
                case "0":
                case "1":
                case "2":
                case "3":
                case "4":
                case "5":
                case "6":
                case "7":
                    return parseInt(K.substring(1), 8);
                default:
                    return K.charCodeAt(1)
            }
        }

        function G(K) {
            if (K < 32) {
                return (K < 16 ? "\\x0" : "\\x") + K.toString(16)
            }
            K = String.fromCharCode(K);
            if (K === "\\" || K === "-" || K === "[" || K === "]") {
                K = "\\" + K
            }
            return K
        }

        function z(R) {
            var Q = R.substring(1, R.length - 1).match(RegExp("\\\\u[0-9A-Fa-f]{4}|\\\\x[0-9A-Fa-f]{2}|\\\\[0-3][0-7]{0,2}|\\\\[0-7]{1,2}|\\\\[\\s\\S]|-|[^-\\\\]", "g"));
            R = [];
            for (var K = [], L = Q[0] === "^", P = L ? 1 : 0, N = Q.length; P < N; ++P) {
                var O = Q[P];
                switch (O) {
                    case "\\B":
                    case "\\b":
                    case "\\D":
                    case "\\d":
                    case "\\S":
                    case "\\s":
                    case "\\W":
                    case "\\w":
                        R.push(O);
                        continue
                }
                O = H(O);
                var M;
                if (P + 2 < N && "-" === Q[P + 1]) {
                    M = H(Q[P + 2]);
                    P += 2
                } else {
                    M = O
                }
                K.push([O, M]);
                if (!(M < 65 || O > 122)) {
                    M < 65 || O > 90 || K.push([Math.max(65, O) | 32, Math.min(M, 90) | 32]);
                    M < 97 || O > 122 || K.push([Math.max(97, O) & -33, Math.min(M, 122) & -33])
                }
            }
            K.sort(function(U, S) {
                return U[0] - S[0] || S[1] - U[1]
            });
            Q = [];
            O = [NaN, NaN];
            for (P = 0; P < K.length; ++P) {
                N = K[P];
                if (N[0] <= O[1] + 1) {
                    O[1] = Math.max(O[1], N[1])
                } else {
                    Q.push(O = N)
                }
            }
            K = ["["];
            L && K.push("^");
            K.push.apply(K, R);
            for (P = 0; P < Q.length; ++P) {
                N = Q[P];
                K.push(G(N[0]));
                if (N[1] > N[0]) {
                    N[1] + 1 > N[0] && K.push("-");
                    K.push(G(N[1]))
                }
            }
            K.push("]");
            return K.join("")
        }

        function C(Q) {
            for (var P = Q.source.match(RegExp("(?:\\[(?:[^\\x5C\\x5D]|\\\\[\\s\\S])*\\]|\\\\u[A-Fa-f0-9]{4}|\\\\x[A-Fa-f0-9]{2}|\\\\[0-9]+|\\\\[^ux0-9]|\\(\\?[:!=]|[\\(\\)\\^]|[^\\x5B\\x5C\\(\\)\\^]+)", "g")), K = P.length, L = [], O = 0, M = 0; O < K; ++O) {
                var N = P[O];
                if (N === "(") {
                    ++M
                } else {
                    if ("\\" === N.charAt(0)) {
                        if ((N = +N.substring(1)) && N <= M) {
                            L[N] = -1
                        }
                    }
                }
            }
            for (O = 1; O < L.length; ++O) {
                if (-1 === L[O]) {
                    L[O] = ++A
                }
            }
            for (M = O = 0; O < K; ++O) {
                N = P[O];
                if (N === "(") {
                    ++M;
                    if (L[M] === undefined) {
                        P[O] = "(?:"
                    }
                } else {
                    if ("\\" === N.charAt(0)) {
                        if ((N = +N.substring(1)) && N <= M) {
                            P[O] = "\\" + L[M]
                        }
                    }
                }
            }
            for (M = O = 0; O < K; ++O) {
                if ("^" === P[O] && "^" !== P[O + 1]) {
                    P[O] = ""
                }
            }
            if (Q.ignoreCase && u) {
                for (O = 0; O < K; ++O) {
                    N = P[O];
                    Q = N.charAt(0);
                    if (N.length >= 2 && Q === "[") {
                        P[O] = z(N)
                    } else {
                        if (Q !== "\\") {
                            P[O] = N.replace(/[a-zA-Z]/g, function(R) {
                                R = R.charCodeAt(0);
                                return "[" + String.fromCharCode(R & -33, R | 32) + "]"
                            })
                        }
                    }
                }
            }
            return P.join("")
        }
        for (var A = 0, u = false, E = false, x = 0, B = I.length; x < B; ++x) {
            var J = I[x];
            if (J.ignoreCase) {
                E = true
            } else {
                if (/[a-z]/i.test(J.source.replace(/\\u[0-9a-f]{4}|\\x[0-9a-f]{2}|\\[^ux]/gi, ""))) {
                    u = true;
                    E = false;
                    break
                }
            }
        }
        var y = [];
        x = 0;
        for (B = I.length; x < B; ++x) {
            J = I[x];
            if (J.global || J.multiline) {
                throw Error("" + J)
            }
            y.push("(?:" + C(J) + ")")
        }
        return RegExp(y.join("|"), E ? "gi" : "g")
    }

    function i(u) {
        var x = 0;
        return function(z) {
            for (var B = null, y = 0, C = 0, A = z.length; C < A; ++C) {
                switch (z.charAt(C)) {
                    case "\t":
                        B || (B = []);
                        B.push(z.substring(y, C));
                        y = u - x % u;
                        for (x += y; y >= 0; y -= 16) {
                            B.push("                ".substring(0, y))
                        }
                        y = C + 1;
                        break;
                    case "\n":
                        x = 0;
                        break;
                    default:
                        ++x
                }
            }
            if (!B) {
                return z
            }
            B.push(z.substring(y));
            return B.join("")
        }
    }

    function F(u, y, x, z) {
        if (y) {
            u = {
                source: y,
                c: u
            };
            x(u);
            z.push.apply(z, u.d)
        }
    }

    function ae(u, z) {
        var y = {},
            A;
        (function() {
            for (var H = u.concat(z), E = [], I = {}, C = 0, G = H.length; C < G; ++C) {
                var J = H[C],
                    L = J[3];
                if (L) {
                    for (var K = L.length; --K >= 0;) {
                        y[L.charAt(K)] = J
                    }
                }
                J = J[1];
                L = "" + J;
                if (!I.hasOwnProperty(L)) {
                    E.push(J);
                    I[L] = null
                }
            }
            E.push(/[\0-\uffff]/);
            A = r(E)
        })();
        var x = z.length;

        function B(C) {
            for (var J = C.c, E = [J, ao], H = 0, R = C.source.match(A) || [], G = {}, O = 0, N = R.length; O < N; ++O) {
                var P = R[O],
                    I = G[P],
                    M = void 0,
                    K;
                if (typeof I === "string") {
                    K = false
                } else {
                    var L = y[P.charAt(0)];
                    if (L) {
                        M = P.match(L[1]);
                        I = L[0]
                    } else {
                        for (K = 0; K < x; ++K) {
                            L = z[K];
                            if (M = P.match(L[1])) {
                                I = L[0];
                                break
                            }
                        }
                        M || (I = ao)
                    }
                    if ((K = I.length >= 5 && "lang-" === I.substring(0, 5)) && !(M && typeof M[1] === "string")) {
                        K = false;
                        I = q
                    }
                    K || (G[P] = I)
                }
                L = H;
                H += P.length;
                if (K) {
                    K = M[1];
                    var S = P.indexOf(K),
                        Q = S + K.length;
                    if (M[2]) {
                        Q = P.length - M[2].length;
                        S = Q - K.length
                    }
                    I = I.substring(5);
                    F(J + L, P.substring(0, S), B, E);
                    F(J + L + S, K, p(I, K), E);
                    F(J + L + Q, P.substring(Q), B, E)
                } else {
                    E.push(J + L, I)
                }
            }
            C.d = E
        }
        return B
    }

    function ar(u) {
        var y = [],
            x = [];
        if (u.tripleQuotedStrings) {
            y.push([af, /^(?:\'\'\'(?:[^\'\\]|\\[\s\S]|\'{1,2}(?=[^\']))*(?:\'\'\'|$)|\"\"\"(?:[^\"\\]|\\[\s\S]|\"{1,2}(?=[^\"]))*(?:\"\"\"|$)|\'(?:[^\\\']|\\[\s\S])*(?:\'|$)|\"(?:[^\\\"]|\\[\s\S])*(?:\"|$))/, null, "'\""])
        } else {
            u.multiLineStrings ? y.push([af, /^(?:\'(?:[^\\\']|\\[\s\S])*(?:\'|$)|\"(?:[^\\\"]|\\[\s\S])*(?:\"|$)|\`(?:[^\\\`]|\\[\s\S])*(?:\`|$))/, null, "'\"`"]) : y.push([af, /^(?:\'(?:[^\\\'\r\n]|\\.)*(?:\'|$)|\"(?:[^\\\"\r\n]|\\.)*(?:\"|$))/, null, "\"'"])
        }
        u.verbatimStrings && x.push([af, /^@\"(?:[^\"]|\"\")*(?:\"|$)/, null]);
        if (u.hashComments) {
            if (u.cStyleComments) {
                y.push([ad, /^#(?:(?:define|elif|else|endif|error|ifdef|include|ifndef|line|pragma|undef|warning)\b|[^\r\n]*)/, null, "#"]);
                x.push([af, /^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h|[a-z]\w*)>/, null])
            } else {
                y.push([ad, /^#[^\r\n]*/, null, "#"])
            }
        }
        if (u.cStyleComments) {
            x.push([ad, /^\/\/[^\r\n]*/, null]);
            x.push([ad, /^\/\*[\s\S]*?(?:\*\/|$)/, null])
        }
        u.regexLiterals && x.push(["lang-regex", RegExp("^" + c + "(/(?=[^/*])(?:[^/\\x5B\\x5C]|\\x5C[\\s\\S]|\\x5B(?:[^\\x5C\\x5D]|\\x5C[\\s\\S])*(?:\\x5D|$))+/)")]);
        u = u.keywords.replace(/^\s+|\s+$/g, "");
        u.length && x.push([o, RegExp("^(?:" + u.replace(/\s+/g, "|") + ")\\b"), null]);
        y.push([ao, /^\s+/, null, " \r\n\t\u00a0"]);
        x.push([D, /^@[a-z_$][a-z_$@0-9]*/i, null], [n, /^@?[A-Z]+[a-z][A-Za-z_$@0-9]*/, null], [ao, /^[a-z_$][a-z_$@0-9]*/i, null], [D, /^(?:0x[a-f0-9]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+\-]?\d+)?)[a-z]*/i, null, "0123456789"], [ac, /^.[^\s\w\.$@\'\"\`\/\#]*/, null]);
        return ae(y, x)
    }

    function ak(U) {
        function P(X) {
            if (X > B) {
                if (L && L !== C) {
                    H.push("</span>");
                    L = null
                }
                if (!L && C) {
                    L = C;
                    H.push('<span class="', L, '">')
                }
                var W = ap(E(M.substring(B, X))).replace(Q ? R : S, "$1&#160;");
                Q = K.test(W);
                H.push(W.replace(V, A));
                B = X
            }
        }
        var M = U.source,
            G = U.g,
            J = U.d,
            H = [],
            B = 0,
            L = null,
            C = null,
            I = 0,
            z = 0,
            E = i(window.PR_TAB_WIDTH),
            S = /([\r\n ]) /g,
            R = /(^| ) /gm,
            V = /\r\n?|\n/g,
            K = /[ \r\n]$/,
            Q = true,
            N = window._pr_isIE6();
        N = N ? U.b.tagName === "PRE" ? N === 6 ? "&#160;\r\n" : N === 7 ? "&#160;<br>\r" : "&#160;\r" : "&#160;<br />" : "<br />";
        var O = U.b.className.match(/\blinenums\b(?::(\d+))?/),
            A;
        if (O) {
            for (var x = [], u = 0; u < 10; ++u) {
                x[u] = N + '</li><li class="L' + u + '">'
            }
            var y = O[1] && O[1].length ? O[1] - 1 : 0;
            H.push('<ol class="linenums"><li class="L', y % 10, '"');
            y && H.push(' value="', y + 1, '"');
            H.push(">");
            A = function() {
                var W = x[++y % 10];
                return L ? "</span>" + W + '<span class="' + L + '">' : W
            }
        } else {
            A = N
        }
        for (;;) {
            if (I < G.length ? z < J.length ? G[I] <= J[z] : true : false) {
                P(G[I]);
                if (L) {
                    H.push("</span>");
                    L = null
                }
                H.push(G[I + 1]);
                I += 2
            } else {
                if (z < J.length) {
                    P(J[z]);
                    C = J[z + 1];
                    z += 2
                } else {
                    break
                }
            }
        }
        P(M.length);
        L && H.push("</span>");
        O && H.push("</li></ol>");
        U.a = H.join("")
    }

    function at(u, y) {
        for (var x = y.length; --x >= 0;) {
            var z = y[x];
            if (ab.hasOwnProperty(z)) {
                "console" in window && console.warn("cannot override language handler %s", z)
            } else {
                ab[z] = u
            }
        }
    }

    function p(u, x) {
        u && ab.hasOwnProperty(u) || (u = /^\s*</.test(x) ? "default-markup" : "default-code");
        return ab[u]
    }

    function m(S) {
        var O = S.f,
            L = S.e;
        S.a = O;
        try {
            var E, I = O.match(ag);
            O = [];
            var G = 0,
                A = [];
            if (I) {
                for (var K = 0, B = I.length; K < B; ++K) {
                    var H = I[K];
                    if (H.length > 1 && H.charAt(0) === "<") {
                        if (!au.test(H)) {
                            if (al.test(H)) {
                                O.push(H.substring(9, H.length - 3));
                                G += H.length - 12
                            } else {
                                if (ah.test(H)) {
                                    O.push("\n");
                                    ++G
                                } else {
                                    if (H.indexOf(l) >= 0 && H.replace(/\s(\w+)\s*=\s*(?:\"([^\"]*)\"|'([^\']*)'|(\S+))/g, ' $1="$2$3$4"').match(/[cC][lL][aA][sS][sS]=\"[^\"]*\bnocode\b/)) {
                                        var y = H.match(k)[2],
                                            C = 1,
                                            R;
                                        R = K + 1;
                                        U: for (; R < B; ++R) {
                                            var Q = I[R].match(k);
                                            if (Q && Q[2] === y) {
                                                if (Q[1] === "/") {
                                                    if (--C === 0) {
                                                        break U
                                                    }
                                                } else {
                                                    ++C
                                                }
                                            }
                                        }
                                        if (R < B) {
                                            A.push(G, I.slice(K, R + 1).join(""));
                                            K = R
                                        } else {
                                            A.push(G, H)
                                        }
                                    } else {
                                        A.push(G, H)
                                    }
                                }
                            }
                        }
                    } else {
                        var U;
                        C = H;
                        var J = C.indexOf("&");
                        if (J < 0) {
                            U = C
                        } else {
                            for (--J;
                                (J = C.indexOf("&#", J + 1)) >= 0;) {
                                var P = C.indexOf(";", J);
                                if (P >= 0) {
                                    var M = C.substring(J + 3, P),
                                        N = 10;
                                    if (M && M.charAt(0) === "x") {
                                        M = M.substring(1);
                                        N = 16
                                    }
                                    var z = parseInt(M, N);
                                    isNaN(z) || (C = C.substring(0, J) + String.fromCharCode(z) + C.substring(P + 1))
                                }
                            }
                            U = C.replace(a, "<").replace(am, ">").replace(ai, "'").replace(b, '"').replace(an, " ").replace(aj, "&")
                        }
                        O.push(U);
                        G += U.length
                    }
                }
            }
            E = {
                source: O.join(""),
                h: A
            };
            var x = E.source;
            S.source = x;
            S.c = 0;
            S.g = E.h;
            p(L, x)(S);
            ak(S)
        } catch (u) {
            if ("console" in window) {
                console.log(u && u.stack ? u.stack : u)
            }
        }
    }
    var af = "str",
        o = "kwd",
        ad = "com",
        n = "typ",
        D = "lit",
        ac = "pun",
        ao = "pln",
        q = "src",
        l = "nocode",
        c = function() {
            for (var u = ["!", "!=", "!==", "#", "%", "%=", "&", "&&", "&&=", "&=", "(", "*", "*=", "+=", ",", "-=", "->", "/", "/=", ":", "::", ";", "<", "<<", "<<=", "<=", "=", "==", "===", ">", ">=", ">>", ">>=", ">>>", ">>>=", "?", "@", "[", "^", "^=", "^^", "^^=", "{", "|", "|=", "||", "||=", "~", "break", "case", "continue", "delete", "do", "else", "finally", "instanceof", "return", "throw", "try", "typeof"], y = "(?:^^|[+-]", x = 0; x < u.length; ++x) {
                y += "|" + u[x].replace(/([^=<>:&a-z])/g, "\\$1")
            }
            y += ")\\s*";
            return y
        }(),
        v = /&/g,
        t = /</g,
        s = />/g,
        j = /\"/g,
        a = /&lt;/g,
        am = /&gt;/g,
        ai = /&apos;/g,
        b = /&quot;/g,
        aj = /&amp;/g,
        an = /&nbsp;/g,
        h = /[\r\n]/g,
        w = null,
        ag = RegExp("[^<]+|<!--[\\s\\S]*?-->|<!\\[CDATA\\[[\\s\\S]*?\\]\\]>|</?[a-zA-Z](?:[^>\"']|'[^']*'|\"[^\"]*\")*>|<", "g"),
        au = /^<\!--/,
        al = /^<!\[CDATA\[/,
        ah = /^<br\b/i,
        k = /^<(\/?)([a-zA-Z][a-zA-Z0-9]*)/,
        aq = ar({
            keywords: "break continue do else for if return while auto case char const default double enum extern float goto int long register short signed sizeof static struct switch typedef union unsigned void volatile catch class delete false import new operator private protected public this throw true try typeof alignof align_union asm axiom bool concept concept_map const_cast constexpr decltype dynamic_cast explicit export friend inline late_check mutable namespace nullptr reinterpret_cast static_assert static_cast template typeid typename using virtual wchar_t where break continue do else for if return while auto case char const default double enum extern float goto int long register short signed sizeof static struct switch typedef union unsigned void volatile catch class delete false import new operator private protected public this throw true try typeof abstract boolean byte extends final finally implements import instanceof null native package strictfp super synchronized throws transient as base by checked decimal delegate descending event fixed foreach from group implicit in interface internal into is lock object out override orderby params partial readonly ref sbyte sealed stackalloc string select uint ulong unchecked unsafe ushort var break continue do else for if return while auto case char const default double enum extern float goto int long register short signed sizeof static struct switch typedef union unsigned void volatile catch class delete false import new operator private protected public this throw true try typeof debugger eval export function get null set undefined var with Infinity NaN caller delete die do dump elsif eval exit foreach for goto if import last local my next no our print package redo require sub undef unless until use wantarray while BEGIN END break continue do else for if return while and as assert class def del elif except exec finally from global import in is lambda nonlocal not or pass print raise try with yield False True None break continue do else for if return while alias and begin case class def defined elsif end ensure false in module next nil not or redo rescue retry self super then true undef unless until when yield BEGIN END break continue do else for if return while case done elif esac eval fi function in local set then until ",
            hashComments: true,
            cStyleComments: true,
            multiLineStrings: true,
            regexLiterals: true
        }),
        ab = {};
    at(aq, ["default-code"]);
    at(ae([], [
        [ao, /^[^<?]+/],
        ["dec", /^<!\w[^>]*(?:>|$)/],
        [ad, /^<\!--[\s\S]*?(?:-\->|$)/],
        ["lang-", /^<\?([\s\S]+?)(?:\?>|$)/],
        ["lang-", /^<%([\s\S]+?)(?:%>|$)/],
        [ac, /^(?:<[%?]|[%?]>)/],
        ["lang-", /^<xmp\b[^>]*>([\s\S]+?)<\/xmp\b[^>]*>/i],
        ["lang-js", /^<script\b[^>]*>([\s\S]*?)(<\/script\b[^>]*>)/i],
        ["lang-css", /^<style\b[^>]*>([\s\S]*?)(<\/style\b[^>]*>)/i],
        ["lang-in.tag", /^(<\/?[a-z][^<>]*>)/i]
    ]), ["default-markup", "htm", "html", "mxml", "xhtml", "xml", "xsl"]);
    at(ae([
        [ao, /^[\s]+/, null, " \t\r\n"],
        ["atv", /^(?:\"[^\"]*\"?|\'[^\']*\'?)/, null, "\"'"]
    ], [
        ["tag", /^^<\/?[a-z](?:[\w.:-]*\w)?|\/?>$/i],
        ["atn", /^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],
        ["lang-uq.val", /^=\s*([^>\'\"\s]*(?:[^>\'\"\s\/]|\/(?=\s)))/],
        [ac, /^[=<>\/]+/],
        ["lang-js", /^on\w+\s*=\s*\"([^\"]+)\"/i],
        ["lang-js", /^on\w+\s*=\s*\'([^\']+)\'/i],
        ["lang-js", /^on\w+\s*=\s*([^\"\'>\s]+)/i],
        ["lang-css", /^style\s*=\s*\"([^\"]+)\"/i],
        ["lang-css", /^style\s*=\s*\'([^\']+)\'/i],
        ["lang-css", /^style\s*=\s*([^\"\'>\s]+)/i]
    ]), ["in.tag"]);
    at(ae([], [
        ["atv", /^[\s\S]+/]
    ]), ["uq.val"]);
    at(ar({
        keywords: "break continue do else for if return while auto case char const default double enum extern float goto int long register short signed sizeof static struct switch typedef union unsigned void volatile catch class delete false import new operator private protected public this throw true try typeof alignof align_union asm axiom bool concept concept_map const_cast constexpr decltype dynamic_cast explicit export friend inline late_check mutable namespace nullptr reinterpret_cast static_assert static_cast template typeid typename using virtual wchar_t where ",
        hashComments: true,
        cStyleComments: true
    }), ["c", "cc", "cpp", "cxx", "cyc", "m"]);
    at(ar({
        keywords: "null true false"
    }), ["json"]);
    at(ar({
        keywords: "break continue do else for if return while auto case char const default double enum extern float goto int long register short signed sizeof static struct switch typedef union unsigned void volatile catch class delete false import new operator private protected public this throw true try typeof abstract boolean byte extends final finally implements import instanceof null native package strictfp super synchronized throws transient as base by checked decimal delegate descending event fixed foreach from group implicit in interface internal into is lock object out override orderby params partial readonly ref sbyte sealed stackalloc string select uint ulong unchecked unsafe ushort var ",
        hashComments: true,
        cStyleComments: true,
        verbatimStrings: true
    }), ["cs"]);
    at(ar({
        keywords: "break continue do else for if return while auto case char const default double enum extern float goto int long register short signed sizeof static struct switch typedef union unsigned void volatile catch class delete false import new operator private protected public this throw true try typeof abstract boolean byte extends final finally implements import instanceof null native package strictfp super synchronized throws transient ",
        cStyleComments: true
    }), ["java"]);
    at(ar({
        keywords: "break continue do else for if return while case done elif esac eval fi function in local set then until ",
        hashComments: true,
        multiLineStrings: true
    }), ["bsh", "csh", "sh"]);
    at(ar({
        keywords: "break continue do else for if return while and as assert class def del elif except exec finally from global import in is lambda nonlocal not or pass print raise try with yield False True None ",
        hashComments: true,
        multiLineStrings: true,
        tripleQuotedStrings: true
    }), ["cv", "py"]);
    at(ar({
        keywords: "caller delete die do dump elsif eval exit foreach for goto if import last local my next no our print package redo require sub undef unless until use wantarray while BEGIN END ",
        hashComments: true,
        multiLineStrings: true,
        regexLiterals: true
    }), ["perl", "pl", "pm"]);
    at(ar({
        keywords: "break continue do else for if return while alias and begin case class def defined elsif end ensure false in module next nil not or redo rescue retry self super then true undef unless until when yield BEGIN END ",
        hashComments: true,
        multiLineStrings: true,
        regexLiterals: true
    }), ["rb"]);
    at(ar({
        keywords: "break continue do else for if return while auto case char const default double enum extern float goto int long register short signed sizeof static struct switch typedef union unsigned void volatile catch class delete false import new operator private protected public this throw true try typeof debugger eval export function get null set undefined var with Infinity NaN ",
        cStyleComments: true,
        regexLiterals: true
    }), ["js"]);
    at(ae([], [
        [af, /^[\s\S]+/]
    ]), ["regex"]);
    window.PR_normalizedHtml = T;
    window.prettyPrintOne = function(u, y) {
        var x = {
            f: u,
            e: y
        };
        m(x);
        return x.a
    };
    window.prettyPrint = function(H) {
        function G() {
            for (var K = window.PR_SHOULD_USE_CONTINUATION ? C.now() + 250 : Infinity; x < y.length && C.now() < K; x++) {
                var L = y[x];
                if (L.className && L.className.indexOf("prettyprint") >= 0) {
                    var N = L.className.match(/\blang-(\w+)\b/);
                    if (N) {
                        N = N[1]
                    }
                    for (var M = false, I = L.parentNode; I; I = I.parentNode) {
                        if ((I.tagName === "pre" || I.tagName === "code" || I.tagName === "xmp") && I.className && I.className.indexOf("prettyprint") >= 0) {
                            M = true;
                            break
                        }
                    }
                    if (!M) {
                        I = L;
                        if (null === w) {
                            M = document.createElement("PRE");
                            M.appendChild(document.createTextNode('<!DOCTYPE foo PUBLIC "foo bar">\n<foo />'));
                            w = !/</.test(M.innerHTML)
                        }
                        if (w) {
                            M = I.innerHTML;
                            if ("XMP" === I.tagName) {
                                M = ap(M)
                            } else {
                                I = I;
                                if ("PRE" === I.tagName) {
                                    I = true
                                } else {
                                    if (h.test(M)) {
                                        var J = "";
                                        if (I.currentStyle) {
                                            J = I.currentStyle.whiteSpace
                                        } else {
                                            if (window.getComputedStyle) {
                                                J = window.getComputedStyle(I, null).whiteSpace
                                            }
                                        }
                                        I = !J || J === "pre"
                                    } else {
                                        I = true
                                    }
                                }
                                I || (M = M.replace(/(<br\s*\/?>)[\r\n]+/g, "$1").replace(/(?:[\r\n]+[ \t]*)+/g, " "))
                            }
                            M = M
                        } else {
                            M = [];
                            for (I = I.firstChild; I; I = I.nextSibling) {
                                T(I, M)
                            }
                            M = M.join("")
                        }
                        M = M.replace(/(?:\r\n?|\n)$/, "");
                        A = {
                            f: M,
                            e: N,
                            b: L
                        };
                        m(A);
                        if (L = A.a) {
                            N = A.b;
                            if ("XMP" === N.tagName) {
                                M = document.createElement("PRE");
                                for (I = 0; I < N.attributes.length; ++I) {
                                    J = N.attributes[I];
                                    if (J.specified) {
                                        if (J.name.toLowerCase() === "class") {
                                            M.className = J.value
                                        } else {
                                            M.setAttribute(J.name, J.value)
                                        }
                                    }
                                }
                                M.innerHTML = L;
                                N.parentNode.replaceChild(M, N)
                            } else {
                                N.innerHTML = L
                            }
                        }
                    }
                }
            }
            if (x < y.length) {
                setTimeout(G, 250)
            } else {
                H && H()
            }
        }
        for (var E = [document.getElementsByTagName("pre"), document.getElementsByTagName("code"), document.getElementsByTagName("xmp")], y = [], B = 0; B < E.length; ++B) {
            for (var z = 0, u = E[B].length; z < u; ++z) {
                y.push(E[B][z])
            }
        }
        E = null;
        var C = Date;
        C.now || (C = {
            now: function() {
                return (new Date).getTime()
            }
        });
        var x = 0,
            A;
        G()
    };
    window.PR = {
        combinePrefixPatterns: r,
        createSimpleLexer: ae,
        registerLangHandler: at,
        sourceDecorator: ar,
        PR_ATTRIB_NAME: "atn",
        PR_ATTRIB_VALUE: "atv",
        PR_COMMENT: ad,
        PR_DECLARATION: "dec",
        PR_KEYWORD: o,
        PR_LITERAL: D,
        PR_NOCODE: l,
        PR_PLAIN: ao,
        PR_PUNCTUATION: ac,
        PR_SOURCE: q,
        PR_STRING: af,
        PR_TAG: "tag",
        PR_TYPE: n
    }
})();
jQuery.easing.jswing = jQuery.easing.swing;
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(h, i, a, k, j) {
        return jQuery.easing[jQuery.easing.def](h, i, a, k, j)
    },
    easeInQuad: function(h, i, a, k, j) {
        return k * (i /= j) * i + a
    },
    easeOutQuad: function(h, i, a, k, j) {
        return -k * (i /= j) * (i - 2) + a
    },
    easeInOutQuad: function(h, i, a, k, j) {
        if ((i /= j / 2) < 1) {
            return k / 2 * i * i + a
        }
        return -k / 2 * ((--i) * (i - 2) - 1) + a
    },
    easeInCubic: function(h, i, a, k, j) {
        return k * (i /= j) * i * i + a
    },
    easeOutCubic: function(h, i, a, k, j) {
        return k * ((i = i / j - 1) * i * i + 1) + a
    },
    easeInOutCubic: function(h, i, a, k, j) {
        if ((i /= j / 2) < 1) {
            return k / 2 * i * i * i + a
        }
        return k / 2 * ((i -= 2) * i * i + 2) + a
    },
    easeInQuart: function(h, i, a, k, j) {
        return k * (i /= j) * i * i * i + a
    },
    easeOutQuart: function(h, i, a, k, j) {
        return -k * ((i = i / j - 1) * i * i * i - 1) + a
    },
    easeInOutQuart: function(h, i, a, k, j) {
        if ((i /= j / 2) < 1) {
            return k / 2 * i * i * i * i + a
        }
        return -k / 2 * ((i -= 2) * i * i * i - 2) + a
    },
    easeInQuint: function(h, i, a, k, j) {
        return k * (i /= j) * i * i * i * i + a
    },
    easeOutQuint: function(h, i, a, k, j) {
        return k * ((i = i / j - 1) * i * i * i * i + 1) + a
    },
    easeInOutQuint: function(h, i, a, k, j) {
        if ((i /= j / 2) < 1) {
            return k / 2 * i * i * i * i * i + a
        }
        return k / 2 * ((i -= 2) * i * i * i * i + 2) + a
    },
    easeInSine: function(h, i, a, k, j) {
        return -k * Math.cos(i / j * (Math.PI / 2)) + k + a
    },
    easeOutSine: function(h, i, a, k, j) {
        return k * Math.sin(i / j * (Math.PI / 2)) + a
    },
    easeInOutSine: function(h, i, a, k, j) {
        return -k / 2 * (Math.cos(Math.PI * i / j) - 1) + a
    },
    easeInExpo: function(h, i, a, k, j) {
        return (i == 0) ? a : k * Math.pow(2, 10 * (i / j - 1)) + a
    },
    easeOutExpo: function(h, i, a, k, j) {
        return (i == j) ? a + k : k * (-Math.pow(2, -10 * i / j) + 1) + a
    },
    easeInOutExpo: function(h, i, a, k, j) {
        if (i == 0) {
            return a
        }
        if (i == j) {
            return a + k
        }
        if ((i /= j / 2) < 1) {
            return k / 2 * Math.pow(2, 10 * (i - 1)) + a
        }
        return k / 2 * (-Math.pow(2, -10 * --i) + 2) + a
    },
    easeInCirc: function(h, i, a, k, j) {
        return -k * (Math.sqrt(1 - (i /= j) * i) - 1) + a
    },
    easeOutCirc: function(h, i, a, k, j) {
        return k * Math.sqrt(1 - (i = i / j - 1) * i) + a
    },
    easeInOutCirc: function(h, i, a, k, j) {
        if ((i /= j / 2) < 1) {
            return -k / 2 * (Math.sqrt(1 - i * i) - 1) + a
        }
        return k / 2 * (Math.sqrt(1 - (i -= 2) * i) + 1) + a
    },
    easeInElastic: function(i, k, h, o, n) {
        var l = 1.70158;
        var m = 0;
        var j = o;
        if (k == 0) {
            return h
        }
        if ((k /= n) == 1) {
            return h + o
        }
        if (!m) {
            m = n * 0.3
        }
        if (j < Math.abs(o)) {
            j = o;
            var l = m / 4
        } else {
            var l = m / (2 * Math.PI) * Math.asin(o / j)
        }
        return -(j * Math.pow(2, 10 * (k -= 1)) * Math.sin((k * n - l) * (2 * Math.PI) / m)) + h
    },
    easeOutElastic: function(i, k, h, o, n) {
        var l = 1.70158;
        var m = 0;
        var j = o;
        if (k == 0) {
            return h
        }
        if ((k /= n) == 1) {
            return h + o
        }
        if (!m) {
            m = n * 0.3
        }
        if (j < Math.abs(o)) {
            j = o;
            var l = m / 4
        } else {
            var l = m / (2 * Math.PI) * Math.asin(o / j)
        }
        return j * Math.pow(2, -10 * k) * Math.sin((k * n - l) * (2 * Math.PI) / m) + o + h
    },
    easeInOutElastic: function(i, k, h, o, n) {
        var l = 1.70158;
        var m = 0;
        var j = o;
        if (k == 0) {
            return h
        }
        if ((k /= n / 2) == 2) {
            return h + o
        }
        if (!m) {
            m = n * (0.3 * 1.5)
        }
        if (j < Math.abs(o)) {
            j = o;
            var l = m / 4
        } else {
            var l = m / (2 * Math.PI) * Math.asin(o / j)
        }
        if (k < 1) {
            return -0.5 * (j * Math.pow(2, 10 * (k -= 1)) * Math.sin((k * n - l) * (2 * Math.PI) / m)) + h
        }
        return j * Math.pow(2, -10 * (k -= 1)) * Math.sin((k * n - l) * (2 * Math.PI) / m) * 0.5 + o + h
    },
    easeInBack: function(h, i, a, l, k, j) {
        if (j == undefined) {
            j = 1.70158
        }
        return l * (i /= k) * i * ((j + 1) * i - j) + a
    },
    easeOutBack: function(h, i, a, l, k, j) {
        if (j == undefined) {
            j = 1.70158
        }
        return l * ((i = i / k - 1) * i * ((j + 1) * i + j) + 1) + a
    },
    easeInOutBack: function(h, i, a, l, k, j) {
        if (j == undefined) {
            j = 1.70158
        }
        if ((i /= k / 2) < 1) {
            return l / 2 * (i * i * (((j *= (1.525)) + 1) * i - j)) + a
        }
        return l / 2 * ((i -= 2) * i * (((j *= (1.525)) + 1) * i + j) + 2) + a
    },
    easeInBounce: function(h, i, a, k, j) {
        return k - jQuery.easing.easeOutBounce(h, j - i, 0, k, j) + a
    },
    easeOutBounce: function(h, i, a, k, j) {
        if ((i /= j) < (1 / 2.75)) {
            return k * (7.5625 * i * i) + a
        } else {
            if (i < (2 / 2.75)) {
                return k * (7.5625 * (i -= (1.5 / 2.75)) * i + 0.75) + a
            } else {
                if (i < (2.5 / 2.75)) {
                    return k * (7.5625 * (i -= (2.25 / 2.75)) * i + 0.9375) + a
                } else {
                    return k * (7.5625 * (i -= (2.625 / 2.75)) * i + 0.984375) + a
                }
            }
        }
    },
    easeInOutBounce: function(h, i, a, k, j) {
        if (i < j / 2) {
            return jQuery.easing.easeInBounce(h, i * 2, 0, k, j) * 0.5 + a
        }
        return jQuery.easing.easeOutBounce(h, i * 2 - j, 0, k, j) * 0.5 + k * 0.5 + a
    }
});
(function(o) {
    o.transit = {
        version: "0.9.9",
        propertyMap: {
            marginLeft: "margin",
            marginRight: "margin",
            marginBottom: "margin",
            marginTop: "margin",
            paddingLeft: "padding",
            paddingRight: "padding",
            paddingBottom: "padding",
            paddingTop: "padding"
        },
        enabled: true,
        useTransitionEnd: false
    };
    var h = document.createElement("div");
    var u = {};

    function b(z) {
        if (z in h.style) {
            return z
        }
        var y = ["Moz", "Webkit", "O", "ms"];
        var v = z.charAt(0).toUpperCase() + z.substr(1);
        if (z in h.style) {
            return z
        }
        for (var x = 0; x < y.length; ++x) {
            var w = y[x] + v;
            if (w in h.style) {
                return w
            }
        }
    }

    function i() {
        h.style[u.transform] = "";
        h.style[u.transform] = "rotateY(90deg)";
        return h.style[u.transform] !== ""
    }
    var a = navigator.userAgent.toLowerCase().indexOf("chrome") > -1;
    u.transition = b("transition");
    u.transitionDelay = b("transitionDelay");
    u.transform = b("transform");
    u.transformOrigin = b("transformOrigin");
    u.transform3d = i();
    var m = {
        transition: "transitionEnd",
        MozTransition: "transitionend",
        OTransition: "oTransitionEnd",
        WebkitTransition: "webkitTransitionEnd",
        msTransition: "MSTransitionEnd"
    };
    var j = u.transitionEnd = m[u.transition] || null;
    for (var t in u) {
        if (u.hasOwnProperty(t) && typeof o.support[t] === "undefined") {
            o.support[t] = u[t]
        }
    }
    h = null;
    o.cssEase = {
        _default: "ease",
        "in": "ease-in",
        out: "ease-out",
        "in-out": "ease-in-out",
        snap: "cubic-bezier(0,1,.5,1)",
        easeOutCubic: "cubic-bezier(.215,.61,.355,1)",
        easeInOutCubic: "cubic-bezier(.645,.045,.355,1)",
        easeInCirc: "cubic-bezier(.6,.04,.98,.335)",
        easeOutCirc: "cubic-bezier(.075,.82,.165,1)",
        easeInOutCirc: "cubic-bezier(.785,.135,.15,.86)",
        easeInExpo: "cubic-bezier(.95,.05,.795,.035)",
        easeOutExpo: "cubic-bezier(.19,1,.22,1)",
        easeInOutExpo: "cubic-bezier(1,0,0,1)",
        easeInQuad: "cubic-bezier(.55,.085,.68,.53)",
        easeOutQuad: "cubic-bezier(.25,.46,.45,.94)",
        easeInOutQuad: "cubic-bezier(.455,.03,.515,.955)",
        easeInQuart: "cubic-bezier(.895,.03,.685,.22)",
        easeOutQuart: "cubic-bezier(.165,.84,.44,1)",
        easeInOutQuart: "cubic-bezier(.77,0,.175,1)",
        easeInQuint: "cubic-bezier(.755,.05,.855,.06)",
        easeOutQuint: "cubic-bezier(.23,1,.32,1)",
        easeInOutQuint: "cubic-bezier(.86,0,.07,1)",
        easeInSine: "cubic-bezier(.47,0,.745,.715)",
        easeOutSine: "cubic-bezier(.39,.575,.565,1)",
        easeInOutSine: "cubic-bezier(.445,.05,.55,.95)",
        easeInBack: "cubic-bezier(.6,-.28,.735,.045)",
        easeOutBack: "cubic-bezier(.175, .885,.32,1.275)",
        easeInOutBack: "cubic-bezier(.68,-.55,.265,1.55)"
    };
    o.cssHooks["transit:transform"] = {
        get: function(v) {
            return o(v).data("transform") || new n()
        },
        set: function(x, w) {
            var y = w;
            if (!(y instanceof n)) {
                y = new n(y)
            }
            if (u.transform === "WebkitTransform" && !a) {
                x.style[u.transform] = y.toString(true)
            } else {
                x.style[u.transform] = y.toString()
            }
            o(x).data("transform", y)
        }
    };
    o.cssHooks.transform = {
        set: o.cssHooks["transit:transform"].set
    };
    if (o.fn.jquery < "1.8") {
        o.cssHooks.transformOrigin = {
            get: function(v) {
                return v.style[u.transformOrigin]
            },
            set: function(v, w) {
                v.style[u.transformOrigin] = w
            }
        };
        o.cssHooks.transition = {
            get: function(v) {
                return v.style[u.transition]
            },
            set: function(v, w) {
                v.style[u.transition] = w
            }
        }
    }
    r("scale");
    r("translate");
    r("rotate");
    r("rotateX");
    r("rotateY");
    r("rotate3d");
    r("perspective");
    r("skewX");
    r("skewY");
    r("x", true);
    r("y", true);

    function n(v) {
        if (typeof v === "string") {
            this.parse(v)
        }
        return this
    }
    n.prototype = {
        setFromString: function(x, w) {
            var v = (typeof w === "string") ? w.split(",") : (w.constructor === Array) ? w : [w];
            v.unshift(x);
            n.prototype.set.apply(this, v)
        },
        set: function(w) {
            var v = Array.prototype.slice.apply(arguments, [1]);
            if (this.setter[w]) {
                this.setter[w].apply(this, v)
            } else {
                this[w] = v.join(",")
            }
        },
        get: function(v) {
            if (this.getter[v]) {
                return this.getter[v].apply(this)
            } else {
                return this[v] || 0
            }
        },
        setter: {
            rotate: function(v) {
                this.rotate = s(v, "deg")
            },
            rotateX: function(v) {
                this.rotateX = s(v, "deg")
            },
            rotateY: function(v) {
                this.rotateY = s(v, "deg")
            },
            scale: function(v, w) {
                if (w === undefined) {
                    w = v
                }
                this.scale = v + "," + w
            },
            skewX: function(v) {
                this.skewX = s(v, "deg")
            },
            skewY: function(v) {
                this.skewY = s(v, "deg")
            },
            perspective: function(v) {
                this.perspective = s(v, "px")
            },
            x: function(v) {
                this.set("translate", v, null)
            },
            y: function(v) {
                this.set("translate", null, v)
            },
            translate: function(v, w) {
                if (this._translateX === undefined) {
                    this._translateX = 0
                }
                if (this._translateY === undefined) {
                    this._translateY = 0
                }
                if (v !== null && v !== undefined) {
                    this._translateX = s(v, "px")
                }
                if (w !== null && w !== undefined) {
                    this._translateY = s(w, "px")
                }
                this.translate = this._translateX + "," + this._translateY
            }
        },
        getter: {
            x: function() {
                return this._translateX || 0
            },
            y: function() {
                return this._translateY || 0
            },
            scale: function() {
                var v = (this.scale || "1,1").split(",");
                if (v[0]) {
                    v[0] = parseFloat(v[0])
                }
                if (v[1]) {
                    v[1] = parseFloat(v[1])
                }
                return (v[0] === v[1]) ? v[0] : v
            },
            rotate3d: function() {
                var w = (this.rotate3d || "0,0,0,0deg").split(",");
                for (var v = 0; v <= 3; ++v) {
                    if (w[v]) {
                        w[v] = parseFloat(w[v])
                    }
                }
                if (w[3]) {
                    w[3] = s(w[3], "deg")
                }
                return w
            }
        },
        parse: function(w) {
            var v = this;
            w.replace(/([a-zA-Z0-9]+)\((.*?)\)/g, function(y, A, z) {
                v.setFromString(A, z)
            })
        },
        toString: function(x) {
            var w = [];
            for (var v in this) {
                if (this.hasOwnProperty(v)) {
                    if ((!u.transform3d) && ((v === "rotateX") || (v === "rotateY") || (v === "perspective") || (v === "transformOrigin"))) {
                        continue
                    }
                    if (v[0] !== "_") {
                        if (x && (v === "scale")) {
                            w.push(v + "3d(" + this[v] + ",1)")
                        } else {
                            if (x && (v === "translate")) {
                                w.push(v + "3d(" + this[v] + ",0)")
                            } else {
                                w.push(v + "(" + this[v] + ")")
                            }
                        }
                    }
                }
            }
            return w.join(" ")
        }
    };

    function q(w, v, x) {
        if (v === true) {
            w.queue(x)
        } else {
            if (v) {
                w.queue(v, x)
            } else {
                x()
            }
        }
    }

    function l(w) {
        var v = [];
        o.each(w, function(x) {
            x = o.camelCase(x);
            x = o.transit.propertyMap[x] || o.cssProps[x] || x;
            x = c(x);
            if (o.inArray(x, v) === -1) {
                v.push(x)
            }
        });
        return v
    }

    function k(w, z, B, v) {
        var x = l(w);
        if (o.cssEase[B]) {
            B = o.cssEase[B]
        }
        var A = "" + p(z) + " " + B;
        if (parseInt(v, 10) > 0) {
            A += " " + p(v)
        }
        var y = [];
        o.each(x, function(D, C) {
            y.push(C + " " + A)
        });
        return y.join(", ")
    }
    o.fn.transition = o.fn.transit = function(D, w, C, G) {
        var H = this;
        var y = 0;
        var A = true;
        if (typeof w === "function") {
            G = w;
            w = undefined
        }
        if (typeof C === "function") {
            G = C;
            C = undefined
        }
        if (typeof D.easing !== "undefined") {
            C = D.easing;
            delete D.easing
        }
        if (typeof D.duration !== "undefined") {
            w = D.duration;
            delete D.duration
        }
        if (typeof D.complete !== "undefined") {
            G = D.complete;
            delete D.complete
        }
        if (typeof D.queue !== "undefined") {
            A = D.queue;
            delete D.queue
        }
        if (typeof D.delay !== "undefined") {
            y = D.delay;
            delete D.delay
        }
        if (typeof w === "undefined") {
            w = o.fx.speeds._default
        }
        if (typeof C === "undefined") {
            C = o.cssEase._default
        }
        w = p(w);
        var I = k(D, w, C, y);
        var F = o.transit.enabled && u.transition;
        var x = F ? (parseInt(w, 10) + parseInt(y, 10)) : 0;
        if (x === 0) {
            var E = function(J) {
                H.css(D);
                if (G) {
                    G.apply(H)
                }
                if (J) {
                    J()
                }
            };
            q(H, A, E);
            return H
        }
        var B = {};
        var v = function(L) {
            var K = false;
            var J = function() {
                if (K) {
                    H.unbind(j, J)
                }
                if (x > 0) {
                    H.each(function() {
                        this.style[u.transition] = (B[this] || null)
                    })
                }
                if (typeof G === "function") {
                    G.apply(H)
                }
                if (typeof L === "function") {
                    L()
                }
            };
            if ((x > 0) && (j) && (o.transit.useTransitionEnd)) {
                K = true;
                H.bind(j, J)
            } else {
                window.setTimeout(J, x)
            }
            H.each(function() {
                if (x > 0) {
                    this.style[u.transition] = I
                }
                o(this).css(D)
            })
        };
        var z = function(J) {
            this.offsetWidth;
            v(J)
        };
        q(H, A, z);
        return this
    };

    function r(w, v) {
        if (!v) {
            o.cssNumber[w] = true
        }
        o.transit.propertyMap[w] = u.transform;
        o.cssHooks[w] = {
            get: function(y) {
                var x = o(y).css("transit:transform");
                return x.get(w)
            },
            set: function(y, z) {
                var x = o(y).css("transit:transform");
                x.setFromString(w, z);
                o(y).css({
                    "transit:transform": x
                })
            }
        }
    }

    function c(v) {
        return v.replace(/([A-Z])/g, function(w) {
            return "-" + w.toLowerCase()
        })
    }

    function s(w, v) {
        if ((typeof w === "string") && (!w.match(/^[\-0-9\.]+$/))) {
            return w
        } else {
            return "" + w + v
        }
    }

    function p(w) {
        var v = w;
        if (o.fx.speeds[v]) {
            v = o.fx.speeds[v]
        }
        return s(v, "ms")
    }
    o.transit.getTransitionValue = k
})(jQuery);
(function(a) {
    a.fn.ascensor = function(j) {
        var j = a.extend({
            ChildType: "div",
            WindowsOn: 1,
            Direction: "y",
            AscensorMap: "",
            AscensorName: "ascensor",
            AscensorFloorName: "",
            Time: 1000,
        }, j);
        var i = this;
        var n = 0;
        var b = a(window).height();
        var h = a(window).width();
        var q = j.WindowsOn;
        i.width(h);
        i.height(b);
        i.css("position", "absolute");
        if (j.AscensorFloorName.split == "") {} else {
            var c = window.location.href;
            var t = c.split("/").pop();
            var l = j.AscensorFloorName.split(" | ");
            a.each(l, function(u) {
                if (l[u] === t) {
                    q = u + 1
                }
            })
        }
        i.children(j.ChildType).each(function() {
            n++;
            a(this).attr("id", j.AscensorName + "Floor" + n).attr("class", j.AscensorName + "Floor").height(b).width(h)
        });
        a(window).resize(function() {
            s()
        });

        function s() {
            b = a(window).height();
            h = a(window).width();
            a(i).children(j.ChildType).each(function() {
                a(this).height(b).width(h)
            });
            a(i).width(h);
            a(i).height(b);
            if (j.Direction == "x") {
                a(i).children().css("position", "absolute");
                a(i).children().each(function(v) {
                    a(this).css("left", v * h)
                })
            }
            if (j.Direction == "chocolate") {
                var u = j.AscensorMap.split(" & ");
                a(i).children(j.ChildType).each(function(w) {
                    var v = u[w].split("|");
                    a(this).css("position", "absolute").css("left", (v[1] - 1) * h).css("top", (v[0] - 1) * b)
                })
            }
            k(q, 1)
        }

        function k(v, x) {
            if (j.Direction == "y") {
                a(i).stop().animate({
                    scrollTop: (v - 1) * b
                }, x)
            }
            if (j.Direction == "x") {
                a(i).stop().animate({
                    scrollLeft: (v - 1) * h
                }, x)
            }
            if (j.Direction == "chocolate") {
                var u = j.AscensorMap.split(" & ");
                var w = u[v - 1].split("|");
                a(i).stop().animate({
                    scrollLeft: (w[1] - 1) * h,
                    scrollTop: (w[0] - 1) * b
                }, x)
            }
            q = v;
            if (j.AscensorFloorName == "") {} else {
                var z = j.AscensorFloorName.split(" | ");
                z = z[q - 1];
                window.location.href = "#/" + z
            }
            a("." + j.AscensorName + "Link").removeClass(j.AscensorName + "LinkActive");
            a("." + j.AscensorName + "Link" + v).addClass(j.AscensorName + "LinkActive");
            var y = a("#nav");
            if (w[0] == 1) {} else {}
            if (w[0] == 2) {
                a("#design_nav").fadeIn("slow")
            } else {
                a("#design_nav").fadeOut("slow")
            }
            if (w[0] == 3) {
                a("#develop_nav").fadeIn("slow")
            } else {
                a("#develop_nav").fadeOut("slow")
            }
            if (w[0] == 4) {
                a("#marketing_nav").fadeIn("slow")
            } else {
                a("#marketing_nav").fadeOut("slow")
            }
            if (w[0] == 5) {
                a("#box1").delay(500).transition({
                    scale: 1
                }, 1000);
                a("#box2").delay(700).transition({
                    scale: 1
                }, 1000);
                a("#box3").delay(900).transition({
                    scale: 1
                }, 1000);
                a("#box4").delay(1100).transition({
                    scale: 1
                }, 1000);
                a("#box5").delay(1300).transition({
                    scale: 1
                }, 1000);
                a("#box6").delay(1500).transition({
                    scale: 1
                }, 1000)
            } else {
                a("#box1").transition({
                    scale: 0
                }, 1000);
                a("#box2").transition({
                    scale: 0
                }, 1000);
                a("#box3").transition({
                    scale: 0
                }, 1000);
                a("#box4").transition({
                    scale: 0
                }, 1000);
                a("#box5").transition({
                    scale: 0
                }, 1000);
                a("#box6").transition({
                    scale: 0
                }, 1000)
            }
            if (w[0] == 6) {} else {}
        }
        a("." + j.AscensorName + "Link").click(function() {
            var u = a(this).attr("class");
            u = u.split(" ");
            u = u[1];
            u = u.split(j.AscensorName + "Link");
            u = parseInt(u[1]);
            k(u, j.Time)
        });
        a("." + j.AscensorName + "LinkPrev").click(function() {
            var u = q - 1;
            if (u < 1) {
                u = n
            }
            k(u, j.Time)
        });
        a("." + j.AscensorName + "LinkNext").click(function() {
            var u = q + 1;
            if (u > n) {
                u = 1
            }
            k(u, j.Time)
        });
        a("." + j.AscensorName + "LinkRight").click(function() {
            o(0, 1);
            return false
        });
        a("." + j.AscensorName + "LinkLeft").click(function() {
            o(0, -1);
            return false
        });
        var p = 0;
        var m = function() {
            if (window.orientation !== p) {
                p = window.orientation;
                s()
            }
        };
        window.addEventListener("resize", m, false);
        window.addEventListener("orientationchange", m, false);
        setInterval(m, 1);

        function r(u) {
            if (q == 9 || q == 20 || q == 29 || q == 38 || q == 47 || q == 56 || q == 65) {
                switch (u.keyCode) {
                    case 40:
                        console.log("down");
                        o(1, 0);
                        return false;
                        break;
                    case 37:
                        console.log("gauche");
                        o(0, -1);
                        return false;
                        break;
                    case 39:
                        console.log("droite");
                        o(0, 1);
                        return false;
                        break
                }
            } else {
                if (q == 9 || q == 18 || q == 27 || q == 36 || q == 45 || q == 54 || q == 63 || q == 72) {
                    switch (u.keyCode) {
                        case 38:
                            console.log("up");
                            o(-1, 0);
                            return false;
                            break
                    }
                } else {
                    switch (u.keyCode) {
                        case 40:
                            console.log("down");
                            o(1, 0);
                            return false;
                            break;
                        case 38:
                            console.log("up");
                            o(-1, 0);
                            return false;
                            break;
                        case 37:
                            if (q != 1) {
                                console.log("gauche");
                                o(0, -1)
                            }
                            return false;
                            break;
                        case 39:
                            if (q != 1) {
                                console.log("droite");
                                o(0, 1)
                            }
                            return false;
                            break
                    }
                }
            }
        }
        if (a.browser.mozilla) {
            a(document).keypress(r)
        } else {
            a(document).keydown(r)
        }

        function o(v, w) {
            if (j.Direction == "y") {
                if (v == 1 && w == 0) {
                    var y = q + 1;
                    if (y > n) {} else {
                        k(y, j.Time)
                    }
                }
                if (v == -1 && w == 0) {
                    var z = q - 1;
                    if (z < 1) {} else {
                        k(z, j.Time)
                    }
                }
            }
            if (j.Direction == "x") {
                if (v == 0 && w == -1) {
                    var z = q - 1;
                    if (z < 1) {} else {
                        k(z, j.Time)
                    }
                }
                if (v == 0 && w == 1) {
                    var y = q + 1;
                    if (y > n) {} else {
                        k(y, j.Time)
                    }
                }
            }
            if (j.Direction == "chocolate") {
                var x = j.AscensorMap.split(" & ");
                x = x[q - 1].split("|");
                var u = (parseInt(x[0]) + v) + "|" + (parseInt(x[1]) + w);
                var A = j.AscensorMap.split(" & ");
                a.each(A, function(B) {
                    if (A[B] === u) {
                        k(B + 1, j.Time)
                    }
                })
            }
            document.getElementById("test").innerHTML = q
        }
        k(q, 1);
        s()
    }
})(jQuery);

function d(h) {
    var j, i;
    if (!this.length) {
        return this
    }
    j = this[0];
    j.ownerDocument ? i = j.ownerDocument : (i = j, j = i.documentElement);
    if (null == h) {
        if (!i.cancelFullScreen && !i.webkitCancelFullScreen && !i.mozCancelFullScreen) {
            return null
        }
        h = !!i.fullScreen || !!i.webkitIsFullScreen || !!i.mozFullScreen;
        return !h ? h : i.fullScreenElement || i.webkitCurrentFullScreenElement || i.mozFullScreenElement || h
    }
    h ? (h = j.requestFullScreen || j.webkitRequestFullScreen || j.mozRequestFullScreen) && h.call(j, Element.ALLOW_KEYBOARD_INPUT) : (h = i.cancelFullScreen || i.webkitCancelFullScreen || i.mozCancelFullScreen) && h.call(i);
    return this
}
jQuery.fn.fullScreen = d;
jQuery.fn.toggleFullScreen = function() {
    return d.call(this, !d.call(this))
};
var e, f, g;
e = document;
e.webkitCancelFullScreen ? (f = "webkitfullscreenchange", g = "webkitfullscreenerror") : e.mozCancelFullScreen ? (f = "mozfullscreenchange", g = "mozfullscreenerror") : (f = "fullscreenchange", g = "fullscreenerror");
jQuery(document).bind(f, function() {
    jQuery(document).trigger(new jQuery.Event("fullscreenchange"))
});
jQuery(document).bind(g, function() {
    jQuery(document).trigger(new jQuery.Event("fullscreenerror"))
});
/*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 *
 * Requires: 1.2.2+
 */
(function(i) {
    function j(a) {
        var q = a || window.event,
            p = [].slice.call(arguments, 1),
            o = 0,
            n = !0,
            m = 0,
            l = 0;
        return a = i.event.fix(q), a.type = "mousewheel", q.wheelDelta && (o = q.wheelDelta / 120), q.detail && (o = -q.detail / 3), l = o, q.axis !== undefined && q.axis === q.HORIZONTAL_AXIS && (l = 0, m = -1 * o), q.wheelDeltaY !== undefined && (l = q.wheelDeltaY / 120), q.wheelDeltaX !== undefined && (m = -1 * q.wheelDeltaX / 120), p.unshift(a, o, m, l), (i.event.dispatch || i.event.handle).apply(this, p)
    }
    var h = ["DOMMouseScroll", "mousewheel"];
    if (i.event.fixHooks) {
        for (var k = h.length; k;) {
            i.event.fixHooks[h[--k]] = i.event.mouseHooks
        }
    }
    i.event.special.mousewheel = {
        setup: function() {
            if (this.addEventListener) {
                for (var b = h.length; b;) {
                    this.addEventListener(h[--b], j, !1)
                }
            } else {
                this.onmousewheel = j
            }
        },
        teardown: function() {
            if (this.removeEventListener) {
                for (var b = h.length; b;) {
                    this.removeEventListener(h[--b], j, !1)
                }
            } else {
                this.onmousewheel = null
            }
        }
    }, i.fn.extend({
        mousewheel: function(b) {
            return b ? this.bind("mousewheel", b) : this.trigger("mousewheel")
        },
        unmousewheel: function(b) {
            return this.unbind("mousewheel", b)
        }
    })
})(jQuery);
(function(c) {
    var a = c.scrollTo = function(h, j, k) {
        c(window).scrollTo(h, j, k)
    };
    a.defaults = {
        axis: "xy",
        duration: parseFloat(c.fn.jquery) >= 1.3 ? 0 : 1
    };
    a.window = function(h) {
        return c(window)._scrollable()
    };
    c.fn._scrollable = function() {
        return this.map(function() {
            var h = this,
                j = !h.nodeName || c.inArray(h.nodeName.toLowerCase(), ["iframe", "#document", "html", "body"]) != -1;
            if (!j) {
                return h
            }
            var k = (h.contentWindow || h).document || h.ownerDocument || h;
            return c.browser.safari || k.compatMode == "BackCompat" ? k.body : k.documentElement
        })
    };
    c.fn.scrollTo = function(k, i, h) {
        if (typeof i == "object") {
            h = i;
            i = 0
        }
        if (typeof h == "function") {
            h = {
                onAfter: h
            }
        }
        if (k == "max") {
            k = 9000000000
        }
        h = c.extend({}, a.defaults, h);
        i = i || h.speed || h.duration;
        h.queue = h.queue && h.axis.length > 1;
        if (h.queue) {
            i /= 2
        }
        h.offset = b(h.offset);
        h.over = b(h.over);
        return this._scrollable().each(function() {
            var v = this,
                o = c(v),
                p = k,
                m, n = {},
                j = o.is("html,body");
            switch (typeof p) {
                case "number":
                case "string":
                    if (/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(p)) {
                        p = b(p);
                        break
                    }
                    p = c(p, this);
                case "object":
                    if (p.is || p.style) {
                        m = (p = c(p)).offset()
                    }
            }
            c.each(h.axis.split(""), function(s, t) {
                var w = t == "x" ? "Left" : "Top",
                    u = w.toLowerCase(),
                    y = "scroll" + w,
                    r = v[y],
                    q = a.max(v, t);
                if (m) {
                    n[y] = m[u] + (j ? 0 : r - o.offset()[u]);
                    if (h.margin) {
                        n[y] -= parseInt(p.css("margin" + w)) || 0;
                        n[y] -= parseInt(p.css("border" + w + "Width")) || 0
                    }
                    n[y] += h.offset[u] || 0;
                    if (h.over[u]) {
                        n[y] += p[t == "x" ? "width" : "height"]() * h.over[u]
                    }
                } else {
                    var x = p[u];
                    n[y] = x.slice && x.slice(-1) == "%" ? parseFloat(x) / 100 * q : x
                }
                if (/^\d+$/.test(n[y])) {
                    n[y] = n[y] <= 0 ? 0 : Math.min(n[y], q)
                }
                if (!s && h.queue) {
                    if (r != n[y]) {
                        l(h.onAfterFirst)
                    }
                    delete n[y]
                }
            });
            l(h.onAfter);

            function l(q) {
                o.animate(n, i, h.easing, q && function() {
                    q.call(this, k, h)
                })
            }
        }).end()
    };
    a.max = function(n, o) {
        var q = o == "x" ? "Width" : "Height",
            p = "scroll" + q;
        if (!c(n).is("html,body")) {
            return n[p] - c(n)[q.toLowerCase()]()
        }
        var r = "client" + q,
            k = n.ownerDocument.documentElement,
            j = n.ownerDocument.body;
        return Math.max(k[p], j[p]) - Math.min(k[r], j[r])
    };

    function b(h) {
        return typeof h == "object" ? h : {
            top: h,
            left: h
        }
    }
})(jQuery);
jQuery(function(a) {
    a.localScroll.hash({
        axis: "xy",
        offset: {
            top: -200,
            left: 0
        }
    });
    a.localScroll({
        target: "section",
        queue: true,
        duration: 1000,
        hash: false,
        onBefore: function(h, c, b) {},
        onAfter: function(b, c) {}
    })
});
var html5_audiotypes = {
    mp3: "audio/mpeg",
    mp4: "audio/mp4",
    ogg: "audio/ogg",
    wav: "audio/wav"
};

function createsoundbite(h) {
    var b = document.createElement("audio");
    if (b.canPlayType) {
        for (var c = 0; c < arguments.length; c++) {
            var a = document.createElement("source");
            a.setAttribute("src", arguments[c]);
            if (arguments[c].match(/\.(\w+)$/i)) {
                a.setAttribute("type", html5_audiotypes[RegExp.$1])
            }
            b.appendChild(a)
        }
        b.load();
        b.playclip = function() {
            b.pause();
            b.currentTime = 0;
            b.play()
        };
        return b
    } else {
        return {
            playclip: function() {
                throw new Error("Your browser doesn't support HTML5 audio unfortunately")
            }
        }
    }
}
var foliosound = createsoundbite("audio/button-29.ogg", "audio/button-29.mp3");
var clicksound = createsoundbite("audio/click.ogg", "audio/click.mp3");
var contactsound = createsoundbite("audio/button-5.ogg", "audio/button-5.mp3");
$(document).ready(function() {
    $("#nav").delay("slow").animate({
        bottom: "0"
    }, 600, "easeInOutExpo");
    $("#contactArea").css("top", "-100%");
    $(".contact").click(function() {
        $("#contactArea").animate({
            top: "0px"
        }, {
            queue: false,
            duration: 1700,
            easing: "easeOutBounce"
        })
    });
    $(".formBtn").click(function() {
        $("#contactArea").animate({
            top: "-100%"
        }, {
            queue: false,
            duration: 1700,
            easing: "easeOutBounce"
        })
    });
    $("body").mousemove(function(c) {
        var b = c.pageX - this.offsetLeft;
        var a = c.pageY - this.offsetTop;
        $("#coordinates").html(+", " + a);
        $("#xLine").css("top", a - 1 + "px");
        $("#yLine").css("left", b - 1 + "px")
    });
    $("#portfolio .box").click(function() {
        if ($(this).next("span").hasClass("showMe")) {
            $("span").removeClass("showMe").hide()
        } else {
            $("span").removeClass("showMe").fadeOut();
            $(this).next("span").addClass("showMe").fadeIn()
        }
    });
    $("span").hide()
});
var animateTime = 10,
    offsetStep = 5,
    scrollWrapper = $(".img_wrap");
$(".bttR, .bttL").mousedown(function() {
    scrollWrapper.data("loop", true);
    loopingAnimation($(this), $(this).is(".bttR"))
}).bind("mouseup mouseout", function() {
    scrollWrapper.data("loop", false).stop();
    $(this).data("scrollLeft", this.scrollLeft)
});
scrollWrapper.mousedown(function(a) {
    $(this).data("down", true).data("x", a.clientX).data("scrollLeft", this.scrollLeft);
    return false
}).mouseup(function(a) {
    $(this).data("down", false)
}).mousemove(function(a) {
    if ($(this).data("down")) {
        this.scrollLeft = $(this).data("scrollLeft") + $(this).data("x") - a.clientX
    }
}).mousewheel(function(a, b) {
    this.scrollLeft -= (b * 30)
}).css({
    overflow: "hidden",
    cursor: "-moz-grab"
});
loopingAnimation = function(c, b) {
    if (scrollWrapper.data("loop")) {
        var a = (b) ? offsetStep : -offsetStep;
        scrollWrapper[0].scrollLeft += a;
        setTimeout(function() {
            loopingAnimation(c, b)
        }, animateTime)
    }
    return false
};
var $img = $(".mycursor");
$img.hide();
$(".img_wrap").mousemove(function(a) {
    $img.stop(1, 1).fadeIn();
    $(".mycursor").offset({
        top: a.pageY + $img.outerHeight(),
        left: a.pageX - ($img.outerWidth() / 2)
    })
}).mouseleave(function() {
    $img.hide()
});
$(function() {
    var a = $("#pull");
    menu = $("#menu nav ul");
    menuHeight = menu.height();
    $(a).on("click", function(b) {
        b.preventDefault();
        menu.slideToggle()
    });
    $(window).resize(function() {
        var b = $(window).width();
        if (b > 320 && menu.is(":hidden")) {
            menu.removeAttr("style")
        }
    })
});