<head>
    <title>Coming Soon Landing Page Website Template | WIX</title>

    <!-- BEGIN SENTRY -->
    <script type="text/javascript" async="" src="https://apps.wix.com/support-chat-widget/script.js"
        crossorigin="anonymous"></script>
    <script id="sentry">
        (function(c, u, v, n, p, e, z, A, w) {
            function k(a) {
                if (!x) {
                    x = !0;
                    var l = u.getElementsByTagName(v)[0],
                        d = u.createElement(v);
                    d.src = A;
                    d.crossorigin = "anonymous";
                    d.addEventListener("load", function() {
                        try {
                            c[n] = r;
                            c[p] = t;
                            var b = c[e],
                                d = b.init;
                            b.init = function(a) {
                                for (var b in a) Object.prototype.hasOwnProperty.call(a, b) && (w[b] = a[
                                b]);
                                d(w)
                            };
                            B(a, b)
                        } catch (g) {
                            console.error(g)
                        }
                    });
                    l.parentNode.insertBefore(d, l)
                }
            }

            function B(a, l) {
                try {
                    for (var d = m.data, b = 0; b < a.length; b++)
                        if ("function" === typeof a[b]) a[b]();
                    var e = !1,
                        g = c.__SENTRY__;
                    "undefined" !==
                    typeof g && g.hub && g.hub.getClient() && (e = !0);
                    g = !1;
                    for (b = 0; b < d.length; b++)
                        if (d[b].f) {
                            g = !0;
                            var f = d[b];
                            !1 === e && "init" !== f.f && l.init();
                            e = !0;
                            l[f.f].apply(l, f.a)
                        }! 1 === e && !1 === g && l.init();
                    var h = c[n],
                        k = c[p];
                    for (b = 0; b < d.length; b++) d[b].e && h ? h.apply(c, d[b].e) : d[b].p && k && k.apply(c, [d[b]
                        .p])
                } catch (C) {
                    console.error(C)
                }
            }
            for (var f = !0, y = !1, q = 0; q < document.scripts.length; q++)
                if (-1 < document.scripts[q].src.indexOf(z)) {
                    f = "no" !== document.scripts[q].getAttribute("data-lazy");
                    break
                } var x = !1,
                h = [],
                m = function(a) {
                    (a.e || a.p || a.f &&
                        -1 < a.f.indexOf("capture") || a.f && -1 < a.f.indexOf("showReportDialog")) && f && k(h);
                    m.data.push(a)
                };
            m.data = [];
            c[e] = c[e] || {};
            c[e].onLoad = function(a) {
                h.push(a);
                f && !y || k(h)
            };
            c[e].forceLoad = function() {
                y = !0;
                f && setTimeout(function() {
                    k(h)
                })
            };
            "init addBreadcrumb captureMessage captureException captureEvent configureScope withScope showReportDialog"
            .split(" ").forEach(function(a) {
                c[e][a] = function() {
                    m({
                        f: a,
                        a: arguments
                    })
                }
            });
            var r = c[n];
            c[n] = function(a, e, d, b, f) {
                m({
                    e: [].slice.call(arguments)
                });
                r && r.apply(c, arguments)
            };
            var t = c[p];
            c[p] = function(a) {
                m({
                    p: a.reason
                });
                t && t.apply(c, arguments)
            };
            f || setTimeout(function() {
                k(h)
            })
        })(window, document, "script", "onerror", "onunhandledrejection", "Sentry", "b4e7a2b423b54000ac2058644c76f718",
            "https://static.parastorage.com/unpkg/@sentry/browser@5.27.4/build/bundle.min.js", {
                "dsn": "https://b4e7a2b423b54000ac2058644c76f718@sentry.wixpress.com/217"
            });
    </script>

    <script type="text/javascript">
        window.Sentry.onLoad(() => {
            window.Sentry.init({
                "release": "1.1853.0",
                "environment": "production",
                "allowUrls": undefined,
                "denyUrls": undefined
            });
            window.Sentry.configureScope(function(scope) {
                scope.setUser({
                    id: "null-user-id:64e9aa28-b35c-4930-b718-4b87aa3df530",
                    clientId: "64e9aa28-b35c-4930-b718-4b87aa3df530",
                });
                scope.setExtra("user.authenticated", false);
                scope.setExtra("sessionId", "c9eec97a-fda9-4b0f-94bb-e771f8d41c7c");
            });
        });
    </script>
    <!-- END SENTRY -->
    <script type="text/javascript">
        var initialTime = new Date().getTime();
        (function() {
            var appName = 'marketing-template-viewer';
            window.appStartLoadTime = window.performance && window.performance.now();
            window.fedops = window.fedops || {};
            window.fedops.apps = window.fedops.apps || {};
            window.fedops.apps[appName] = {
                startLoadTime: window.appStartLoadTime
            };
            try {
                window.fedops.sessionId = window.localStorage.getItem('fedops.logger.sessionId');
            } catch (e) {};
            window.fedops.sessionId = window.fedops.sessionId || 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g,
                function(c) {
                    var r = Math.random() * 16 | 0,
                        v = c == 'x' ? r : (r & 0x3 | 0x8);
                    return v.toString(16);
                });
            (new Image()).src = '//frog.wix.com/fed?appName=' + appName + '&src=72&evid=14&session_id=' + window.fedops
                .sessionId;
        })();
    </script>
    <script
        src="https://static.parastorage.com/polyfill/v3/polyfill.min.js?features=default,es6,es7,es2017,es2018,es2019,fetch&amp;flags=gated&amp;unknown=polyfill">
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link type="image/x-icon" href="//www.wix.com/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://static.parastorage.com/services/third-party/fonts/Helvetica/fontFace.css">
    <link rel="stylesheet" href="https://static.parastorage.com/unpkg/@wix/wix-fonts@1.14.0/madefor.min.css">
    <link rel="stylesheet" href="https://static.parastorage.com/unpkg/@wix/wix-fonts@1.14.0/madeforDisplay.min.css">
    <link rel="stylesheet" href="//static.parastorage.com/services/marketing-template-viewer/1.1853.0/app.min.css">

    <meta name="description"
        content="Countdown to the launch of your new site with a professional coming soon page. Engage your customers with an eye-catching design that grabs their attention and keeps them eager with anticipation for your upcoming website release. Attract new users with links to your social media accounts and a one-click email subscription.">
    <meta name="author" content="Wixpress">
    <meta http-equiv="content-language" content="en">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta property="og:title" content="Coming Soon Landing Page Website Template | WIX">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.wix.com/website-template/view/html/1896">
    <meta property="og:image"
        content="//static.wixstatic.com/media//templates/image/e00ffcb703fc99b0b85ade70d9bb7b9172040ada947a55283b24baca4604c8ce1626607768930.jpg">
    <meta content="Wix" property="og:site_name">
    <meta property="og:description"
        content="Countdown to the launch of your new site with a professional coming soon page. Engage your customers with an eye-catching design that grabs their attention and keeps them eager with anticipation for your upcoming website release. Attract new users with links to your social media accounts and a one-click email subscription.">
    <meta property="fb:admins" content="731184828">
    <meta name="fb:app_id" content="236335823061286">
    <meta name="google-site-verification" content="QXhlrY-V2PWOmnGUb8no0L-fKzG48uJ5ozW0ukU7Rpo">

    <link rel="canonical" href="https://www.wix.com/website-template/view/html/1896">

    <link rel="alternate" hreflang="fr" href="https://fr.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="pt" href="https://pt.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="cs" href="https://cs.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="it" href="https://it.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="nl" href="https://nl.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="ko" href="https://ko.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="de" href="https://de.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="ru" href="https://ru.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="sv" href="https://sv.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="tr" href="https://tr.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="da" href="https://da.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="en" href="https://www.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="es" href="https://es.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="hi" href="https://hi.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="ja" href="https://ja.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="no" href="https://no.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="pl" href="https://pl.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="vi" href="https://vi.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="uk" href="https://uk.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="zh" href="https://zh.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="th" href="https://th.wix.com/website-template/view/html/1896">
    <link rel="alternate" hreflang="x-default" href="https://www.wix.com/website-template/view/html/1896">

    <script
        src="//static.parastorage.com/services/tag-manager-host-scripts/1.188.0//assets/TEMPLATES/google-tag-manager.js">
    </script>
    <script type="text/javascript"
        src="//static.parastorage.com/services/dealer-lightbox/2.0.223/dealer-lightbox-module.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="//static.parastorage.com/services/dealer-lightbox/2.0.223/dealer-lightbox-module.min.css">
    <style>
        .Mudh7 {
            z-index: 5001;
            display: none;
            align-items: flex-start;
            flex-direction: column;
            position: absolute;
            bottom: calc(100% + 15px);
            left: -277px;
            width: 287px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 18px rgba(22, 45, 61, 0.12), 0 6px 6px rgba(22, 45, 61, 0.06);
            padding: 20px;
            font-family: Madefor, HelveticaNeueW01-55Roma, HelveticaNeueW02-55Roma, HelveticaNeueW10-55Roma, "Helvetica Neue", Helvetica, Arial, "メイリオ", "meiryo", "ヒラギノ角ゴ pro w3", "hiragino kaku gothic pro", sans-serif;
            cursor: pointer
        }

        .Mudh7>button {
            font-size: 14px;
            line-height: 18px;
            color: #3899EC;
            background: #fff;
            font-weight: var(--wix-font-weight-medium, 530);
            cursor: pointer;
            margin: 6px 0 0 0;
            padding: 0;
            font-family: Madefor, HelveticaNeueW01-55Roma, HelveticaNeueW02-55Roma, HelveticaNeueW10-55Roma, "Helvetica Neue", Helvetica, Arial, "メイリオ", "meiryo", "ヒラギノ角ゴ pro w3", "hiragino kaku gothic pro", sans-serif
        }

        .yd9_L {
            margin-top: 14px;
            font-size: 14px;
            line-height: 18px;
            color: #32536A
        }

        .pqIHb {
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
            width: 100%;
            line-height: 24px;
            font-size: 16px
        }

        .HjoDd {
            width: 73%;
            color: #162D3D;
            font-weight: var(--wix-font-weight-medium, 530)
        }

        ._2Dn59 {
            width: 17%;
            text-align: left;
            line-height: 12px
        }

        ._2Dn59:after {
            content: ' ';
            background: #fff url("data:image/svg+xml,%3Csvg width='36' height='36' viewBox='0 0 36 36' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M18 35.4882C21.9223 35.4882 25.5517 34.7454 28.5086 32.6157C33.0459 29.3476 36 24.0188 36 18C36 8.05887 27.9411 0 18 0C8.05887 0 0 8.05887 0 18C0 24.0254 2.96055 29.3593 7.50635 32.6264C10.4605 34.7496 14.0843 35.4882 18 35.4882Z' fill='%23C2E2FF'/%3E%3Cpath d='M29.0009 10.39C31.21 10.39 33.0009 12.1809 33.0009 14.39V16C33.0009 18.2092 31.21 20 29.0009 20V10.39ZM7.00085 10.39C5.90532 10.424 4.86822 10.892 4.11796 11.691C3.3677 12.49 2.96583 13.5545 3.00085 14.65V15.71C2.96037 16.8099 3.35951 17.8806 4.11007 18.6856C4.86064 19.4906 5.90085 19.9635 7.00085 20' fill='%23192C55'/%3E%3Cpath d='M28.5595 32.57C28.4777 32.6368 28.3907 32.697 28.2995 32.75C22.9803 36.4791 16.0609 37.0413 10.2095 34.22C9.33197 33.7994 8.49222 33.3043 7.69945 32.74L7.43945 32.56C8.83673 29.4318 11.9434 27.4182 15.3695 27.42H20.6295C24.0594 27.4148 27.1692 29.4344 28.5595 32.57Z' fill='%23116DFF'/%3E%3Cpath d='M16 23.16H20C20.5523 23.16 21 23.6077 21 24.16V27.61C21 29.2668 19.6569 30.61 18 30.61C16.3431 30.61 15 29.2668 15 27.61V24.16C15 23.6077 15.4477 23.16 16 23.16Z' fill='%23192C55'/%3E%3Cpath d='M25 6H11C7.68629 6 5 8.68629 5 12V18C5 21.3137 7.68629 24 11 24H25C28.3137 24 31 21.3137 31 18V12C31 8.68629 28.3137 6 25 6Z' fill='%23116DFF'/%3E%3Cpath d='M18.0008 22C14.9372 21.9645 11.9909 20.8165 9.71084 18.77C7.68275 16.9692 7.41084 13.8992 9.09084 11.77C9.86468 10.7632 11.021 10.1219 12.2849 9.99877C13.5488 9.87561 14.8072 10.2815 15.7608 11.12C16.3539 11.716 17.16 12.0511 18.0008 12.0511C18.8416 12.0511 19.6478 11.716 20.2408 11.12C21.1945 10.2815 22.4529 9.87561 23.7168 9.99877C24.9806 10.1219 26.137 10.7632 26.9108 11.77C28.5909 13.8992 28.3189 16.9692 26.2908 18.77C24.0108 20.8165 21.0645 21.9645 18.0008 22Z' fill='%23FDFDFD'/%3E%3Cpath d='M23.4992 16.3C24.4933 16.3 25.2992 15.4941 25.2992 14.5C25.2992 13.5059 24.4933 12.7 23.4992 12.7C22.5051 12.7 21.6992 13.5059 21.6992 14.5C21.6992 15.4941 22.5051 16.3 23.4992 16.3Z' fill='%23192C55'/%3E%3Cpath d='M12.4992 16.3C13.4933 16.3 14.2992 15.4941 14.2992 14.5C14.2992 13.5059 13.4933 12.7 12.4992 12.7C11.5051 12.7 10.6992 13.5059 10.6992 14.5C10.6992 15.4941 11.5051 16.3 12.4992 16.3Z' fill='%23192C55'/%3E%3Cpath d='M17.9997 19C16.7698 19.0154 15.5628 18.6675 14.5297 18L15.0797 17.16C16.8442 18.3508 19.1551 18.3508 20.9197 17.16L21.4697 18C20.4366 18.6675 19.2296 19.0154 17.9997 19ZM23.3197 6.12999L19.6397 8.33999C18.6289 8.94074 17.3705 8.94074 16.3597 8.33999L12.6797 6.12999C13.3272 4.82283 14.661 3.99696 16.1197 3.99998H19.8797C21.3384 3.99696 22.6722 4.82283 23.3197 6.12999ZM17.9997 33.77C14.7412 33.7862 12.0045 31.3223 11.6797 28.08L12.6797 27.98C12.9693 30.7057 15.2687 32.7737 18.0097 32.7737C20.7507 32.7737 23.0501 30.7057 23.3397 27.98L24.3397 28.08C24.0097 31.3277 21.2641 33.7919 17.9997 33.77Z' fill='%23192C55'/%3E%3C/svg%3E%0A") no-repeat 50% 50%;
            width: 36px;
            height: 36px;
            display: inline-block
        }

        .gkWvb {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 36px;
            height: 36px;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg width='11' height='11' viewBox='0 0 11 11' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10.0169 0L5.5 4.51631L0.984497 0L0 0.983002L4.51688 5.50069L0 10.017L0.984497 11L5.5 6.48369L10.0169 11L11 10.017L6.48312 5.50069L11 0.983002L10.0169 0Z' fill='%233899EC'/%3E%3C/svg%3E%0A");
            background-position: 50% 50%;
            background-repeat: no-repeat
        }

        .gkWvb:before {
            content: ' ';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #EAF7FF;
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
            z-index: -1
        }

        .gkWvb:hover:before {
            opacity: 1
        }

        @media only screen and (max-width: 760px) {
            .Mudh7 {
                width: 250px;
                left: -240px
            }

            .pqIHb {
                font-size: 14px;
                line-height: 20px
            }
        }

        @media print {
            .Mudh7 {
                display: none !important
            }
        }

        ._32hPX {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Madefor, HelveticaNeueW01-55Roma, HelveticaNeueW02-55Roma, HelveticaNeueW10-55Roma, "Helvetica Neue", Helvetica, Arial, "メイリオ", "meiryo", "ヒラギノ角ゴ pro w3", "hiragino kaku gothic pro", sans-serif;
            position: absolute;
            top: -2px;
            left: -2px;
            border: solid 2px #fff;
            background-color: #60bc57;
            color: #fff;
            font-size: 10px;
            height: 1.3em;
            min-width: 1.3em;
            padding: 2px;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.21);
            border-radius: 30px;
            display: none
        }

        .widget-editor-theme ._32hPX {
            top: 5px;
            right: 7px;
            left: auto;
            height: 16px;
            width: 16px;
            padding: 0;
            border: none;
            background-color: #E62214;
            line-height: 12px;
            font-weight: 700
        }

        ._2m_XZ {
            position: relative
        }

        ._3wEq3 {
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 5001;
            position: fixed;
            bottom: 30px;
            right: 30px;
            will-change: left, top
        }

        ._2RJ1i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            border: none;
            border-radius: 50%;
            position: relative;
            background-color: #162D3D;
            outline: none;
            cursor: pointer
        }

        ._1Pdm2 {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3px;
            background-color: #fff;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.21);
            border-radius: 50px;
            transition: border-radius 0.15s cubic-bezier(0.65, 0, 0.35, 1)
        }

        ._1Pdm2:after {
            content: ' ';
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' style='transform:rotate(90deg);' viewBox='0 0 970 970' %3E%3Cpath fill='%23737a9e' d='M90 576h.5c49.7 0 90-40.3 90-90s-40.3-90-90-90H90c-49.7 0-90 40.3-90 90s40.3 90 90 90zm527.5 0h1.1c49.7 0 90-40.3 90-90s-40.3-90-90-90h-1.1c-49.7 0-90 40.3-90 90s40.3 90 90 90zm-263 0c49.7 0 90-40.3 90-90s-40.3-90-90-90h-1.1c-49.7 0-90 40.3-90 90s40.3 90 90 90h1.1zm527 0h.5c49.7 0 90-40.3 90-90s-40.3-90-90-90h-.5c-49.7 0-90 40.3-90 90s40.3 90 90 90z'/%3E%3C/svg%3E") no-repeat 50% 50%;
            height: 46px;
            cursor: move;
            display: inline-block;
            position: relative;
            opacity: 0;
            width: 0;
            right: -12px;
            transition: width 0.3s cubic-bezier(0.65, 0, 0.35, 1)
        }

        ._1Pdm2:hover,
        ._1Pdm2:active {
            border-radius: 50px 6px 6px 50px
        }

        ._1Pdm2:hover:after,
        ._1Pdm2:active:after {
            opacity: 1;
            width: 12px;
            right: 0
        }

        .widget-default-embed ._3wEq3 {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        @media print {
            ._3wEq3 {
                display: none !important
            }
        }

        ._2zkfg {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            position: absolute;
            top: 0;
            left: 0;
            right: 0
        }

        .widget-default-embed ._2zkfg {
            cursor: move
        }

        .widget-help-center-theme ._2zkfg {
            left: 125px
        }

        ._1Pp9W {
            position: relative;
            display: block;
            padding: 0;
            margin: 12px;
            border-radius: 50%;
            width: 36px;
            height: 36px
        }

        ._1Pp9W:hover ._23nLB {
            opacity: 1;
            transition-delay: 0.6s
        }

        ._1Pp9W:hover ._2MoLU {
            background-color: #32536A
        }

        ._2MoLU {
            border: none;
            border-radius: 50%;
            outline: none;
            background-color: transparent;
            width: 100%;
            height: 100%;
            cursor: pointer;
            transition: background-color 0.2s ease
        }

        ._2MoLU:after {
            content: ' ';
            display: block;
            width: 14px;
            height: 2px;
            background-color: #FFFFFF;
            margin: auto;
            border-radius: 20px;
            cursor: pointer
        }

        ._23nLB {
            position: absolute;
            right: -3px;
            bottom: 48px;
            width: 115px;
            height: 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            font-family: madefor-text, "Helvetica Neue", Helvetica, Arial, メイリオ, meiryo, "ヒラギノ角ゴ pro w3", "hiragino kaku gothic pro", sans-serif;
            font-size: 16px;
            background-color: #ffffff;
            color: #162D3D;
            box-shadow: rgba(22, 45, 61, 0.06) 0 6px 6px 0, rgba(22, 45, 61, 0.12) 0 0 18px 0;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s ease;
            transition-delay: 0s
        }

        ._23nLB:after {
            content: ' ';
            display: block;
            position: absolute;
            bottom: -6px;
            right: 12px;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid #ffffff
        }

        .widget-editor-theme ._2MoLU:after {
            background-color: #17191C
        }

        .widget-editor-theme ._1Pp9W:hover ._2MoLU {
            background-color: #F7F8F8
        }

        .widget-placeholder-embed ._2MoLU {
            display: none
        }

        .widget-placeholder-embed {
            position: relative;
            width: 100%;
            height: 100%
        }

        ._2lmQc {
            z-index: 5001;
            display: block;
            position: fixed;
            outline: none;
            will-change: left, top
        }

        .mV0kr {
            overflow: hidden;
            border: none;
            background: #fff url(https://static.wixstatic.com/media/e3b156_740679ad1e1b4264927b20f025df67ab~mv2.gif) no-repeat 50%
        }

        .widget-default-embed ._2lmQc {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            bottom: 3vh;
            right: 1.5vw;
            cursor: move
        }

        .widget-default-embed .mV0kr {
            width: 360px;
            height: 85vh;
            min-height: 300px;
            max-height: 625px
        }

        .widget-placeholder-embed ._2lmQc {
            position: relative;
            width: 100%;
            height: 100%
        }

        .widget-placeholder-embed .mV0kr {
            width: 100%;
            height: 100%
        }

        @media only screen and (max-width: 760px) {
            .widget-default-embed ._2lmQc {
                top: 0;
                right: 0;
                padding: 0;
                z-index: 9999;
                height: 100vh;
                background-color: #f0f4f7
            }

            .widget-default-embed .mV0kr {
                width: 100vw;
                box-shadow: none;
                max-height: none;
                border-radius: 0
            }

            body._9KDwb {
                overflow: hidden
            }
        }

        @media print {
            ._2lmQc {
                display: none !important
            }
        }

        .widget-default-embed ._3N3H5 {
            display: block;
            width: 402px;
            max-height: 618px;
            border-radius: 8px;
            box-shadow: 0 2px 34px 0 rgba(0, 0, 0, 0.15)
        }

        .widget-editor-theme ._3N3H5 {
            width: 500px;
            max-height: 550px
        }

        @media only screen and (max-width: 760px) {
            .widget-default-embed ._1JFgm {
                border-radius: 0;
                top: 0;
                right: 0;
                padding: 0;
                z-index: 9999;
                height: 100vh;
                max-height: none;
                background-color: #f0f4f7
            }

            .widget-default-embed ._3N3H5 {
                width: 100vw;
                max-height: none;
                border-radius: 0
            }
        }

        ._2-6dI {
            display: block;
            padding: 0;
            border: none;
            outline: none;
            background-color: transparent;
            width: 20px;
            height: 24px;
            margin-right: 32px;
            cursor: pointer
        }

        ._2-6dI:after {
            content: ' ';
            display: block;
            padding: 0;
            border: none;
            outline: none;
            width: 14px;
            height: 2px;
            background-color: #fff;
            cursor: pointer
        }

        .widget-placeholder-embed ._2-6dI {
            display: none
        }

        .widget-default-embed ._2rT95 {
            border-radius: 6px;
            box-shadow: 0 2px 34px 0 rgba(0, 0, 0, 0.15)
        }

        @media only screen and (max-width: 760px) {
            .widget-default-embed ._2rT95 {
                border-radius: 0
            }
        }
    </style>
</head>

<body>
    <script src="//static.parastorage.com/services/cookie-sync-service/1.282.0/embed-cidx.bundle.min.js"></script>
    <script src="//static.parastorage.com/services/tag-manager-client/1.427.0/hostTags.bundle.min.js"></script>
    <div id="root">
        <div data-hook="app">

        

        </div>
    </div>
    <script>
        window.__BASEURL__ = "https:\u002F\u002Fwww.wix.com\u002Fwebsite-template\u002Fview\u002Fhtml\u002F";
        window.__INITIAL_I18N__ = {
            "locale": "en",
            "resources": {
                "errorPage.templatesLinkText": "Templates",
                "template.viewer.page.title": " Website Template | WIX",
                "template_button_label": "Edit Website",
                "template_seeFeatures_label": "See All Features",
                "template_expand_examples_text": "Great for",
                "template_expand_header": "Template Features",
                "template.viewer.title": "Click edit and create your own amazing website",
                "template.viewer.edit.button": "Edit this site",
                "template.viewer.read.more": "Read More",
                "template.viewer.back": "Back",
                "template.viewer.info.edit.button": "Edit Now",
                "template.viewer.price": "Price:",
                "template.viewer.info.title": " - Website Template",
                "template.viewer.info.goodFor": "Good For:",
                "template.viewer.info.description": "Description:",
                "template.viewer.info.desktop.only.notice": "Edit this template by going to Wix.com from your desktop, where you can customise any of our beautiful templates.",
                "template.viewer.see.all.templates": "See All Templates",
                "template.viewer.seeAllExpressions": "See All Expressions",
                "template.viewer.goToBiggerScreen": "Go to a bigger screen to edit.",
                "template.viewer.getStarted": "Get Started",
                "template.viewer.startNow": "Start Now",
                "template.viewer.features": "Features",
                "template.viewer.allFeatures": "All Features",
                "template.viewer.expressions": "Expressions",
                "template.viewer.tutorials": "Tutorials",
                "template.viewer.updatesAndReleases": "Updates & Releases",
                "template.viewer.comingSoon": "Coming soon",
                "template.viewer.academy": "Academy",
                "template.viewer.editTemplate": "Edit Template",
                "a11y.desktop.button": "show desktop view",
                "a11y.mobile.button": "show mobile view",
                "a11y.close.popup.button": "close info popup",
                "toolbar.tooltip.desktop": "1001px & up",
                "toolbar.tooltip.tablet": "751 to 1000px",
                "toolbar.tooltip.mobile": "320 to 750px",
                "errorPage.4xx.title": "We couldn't find the template you're looking for",
                "errorPage.5xx.title": "We couldn't load our template",
                "errorPage.subTitle": "Error ",
                "errorPage.4xx.details": "Try searching for another template \u003Clink\u003Ehere\u003C\u002Flink\u003E.",
                "errorPage.5xx.details": "A temporary technical issue on our end stopped us from loading this page. Please wait a few minutes and then try again.",
                "errorPage.5xx.action": "Refresh"
            }
        };
        window.__INITIAL_STATE__ = {
            "viewMode": "desktop",
            "isInfoShown": false,
            "isEditButtonHidden": false,
            "template": {
                "title": "Coming Soon Landing Page",
                "description": "Countdown to the launch of your new site with a professional coming soon page. Engage your customers with an eye-catching design that grabs their attention and keeps them eager with anticipation for your upcoming website release. Attract new users with links to your social media accounts and a one-click email subscription.",
                "image": "\u002Ftemplates\u002Fimage\u002Fe00ffcb703fc99b0b85ade70d9bb7b9172040ada947a55283b24baca4604c8ce1626607768930.jpg",
                "id": "1896",
                "lng": "en",
                "price": "Free",
                "docUrl": "https:\u002F\u002Fwww.wix.com\u002Fdemone2\u002Fcoming-soon-landing",
                "editorUrl": "https:\u002F\u002Fmanage.wix.com\u002Fedit-template\u002Ffrom-intro?originTemplateId=2f5a38ee-e1bf-4a2d-a169-8e9670dd4cb0&editorSessionId=7F790806-4179-47BB-3D24-45E662DD169C",
                "goodFor": "Businesses, Professionals, Graphic Designers",
                "siteId": "c54249f0-9878-4464-9dc0-5cc938a097e4",
                "metaSiteId": "2f5a38ee-e1bf-4a2d-a169-8e9670dd4cb0",
                "editorSessionId": "7F790806-4179-47BB-3D24-45E662DD169C",
                "isResponsive": false,
                "url": "https:\u002F\u002Fwww.wix.com\u002Fdemone2\u002Fcoming-soon-landing"
            },
            "config": {
                "locale": "en",
                "dealerCmsTranslationsUrl": "\u002F\u002Fstatic.parastorage.com\u002Fservices\u002Fdealer-cms-translations\u002F1.5862.0\u002F",
                "dealerLightboxUrl": "\u002F\u002Fstatic.parastorage.com\u002Fservices\u002Fdealer-lightbox\u002F2.0.223\u002F"
            }
        };
        window.__BI__ = {
            "siteId": "c54249f0-9878-4464-9dc0-5cc938a097e4",
            "originUrl": "https:\u002F\u002Fwww.wix.com\u002Fwebsite\u002Ftemplates\u002Fhtml\u002Flanding-pages",
            "referer": "https:\u002F\u002Fblog.hubspot.com\u002Fmarketing\u002Ffree-landing-page-templates",
            "editorSessionId": "7F790806-4179-47BB-3D24-45E662DD169C"
        };
        window.__BI__.initialTime = initialTime;
        window.__DEVICE__ = "desktop";
        window.__CONSENT_POLICY__ = {
            "essential": true,
            "functional": true,
            "analytics": true,
            "advertising": true,
            "dataToThirdParty": true
        };
        window.__ACTIVE_EXPERIMENTS__ = ["TemplateViewerUseCustomErrorPages", "TemplateViewerPublicUrlError",
            "TemplateViewerHydrationRender"
        ];
    </script>

    <script src="//static.parastorage.com/unpkg/react@16.14.0/umd/react.production.min.js" crossorigin=""></script>
    <script src="//static.parastorage.com/unpkg/react-dom@16.14.0/umd/react-dom.production.min.js" crossorigin=""></script>
    <script src="//static.parastorage.com/services/cookie-consent-policy-client/1.573.0/app.bundle.min.js"></script>


    <script src="//static.parastorage.com/services/dealer-lightbox/2.0.223/dealer-lightbox.bundle.min.js"></script>


    <script src="//static.parastorage.com/services/marketing-template-viewer/1.1853.0/app.bundle.min.js"></script>


    <div id="react-lightbox" style="position: absolute; z-index: 99999999;"></div>
    <div></div>
    <div data-hook="help-widget" class="widget-default-embed widget-help-center-theme">
        <div class="_3wEq3" data-hook="chatbot-widget-button-container" style="display: none;" aria-hidden="true">
            <div class="_1Pdm2" data-hook="chatbot-widget-anchor-wrapper" data-draggable=""><button class="_2RJ1i"
                    type="button" aria-label="Need Help?" data-hook="chatbot-widget-anchor-container"><svg
                        width="14" height="22" aria-hidden="true">
                        <path fill="#fff"
                            d="M11.884 1.511C10.52.51 8.79 0 6.745 0 5.177 0 3.83.362 2.742 1.073 1.145 2.108.225 4.065.002 6.434a.585.585 0 00.585.631h3.379a.58.58 0 00.577-.512c.07-.575.251-1.227.542-1.697.35-.567.946-.841 1.823-.841.892 0 1.5.225 1.81.667.343.491.51 1.02.51 1.618 0 .507-.146.96-.453 1.391-.167.247-.393.48-.679.698l-.952.759c-1.003.797-1.615 1.495-1.869 2.139-.207.525-.488 1.09-.602 2.2a.593.593 0 00.584.656h3.329a.594.594 0 00.583-.537c.026-.223.067-.329.127-.52.143-.458.428-.854.875-1.207l.927-.732c.979-.776 1.628-1.404 1.98-1.916.612-.853.922-1.911.922-3.144 0-2.004-.712-3.544-2.116-4.576zM8.556 22H5.444a.782.782 0 01-.777-.786v-3.143a.78.78 0 01.777-.785h3.112c.43 0 .777.35.777.785v3.143c0 .29-.259.551-.777.786z">
                        </path>
                    </svg></button></div>
            <div class="_32hPX" role="progressbar" data-hook="notifications-count"></div>
            <div class="Mudh7" data-hook="chatbot-widget-tooltip-container"></div>
        </div>
        <div data-hook="chatbot-widget-iframe-container" data-aid="undefined" class="_2lmQc _1JFgm"
            data-draggable="" style="visibility: hidden;" aria-hidden="true">
            <div class="_2zkfg" data-hook="chatbot-widget-header" data-draggable="">
                <div class="_1Pp9W"><button class="_2MoLU" type="button" aria-label="collapse widget"
                        aria-controls="c5ae986c-8e12-47d6-891a-21a875c731e1" aria-expanded="true"
                        data-hook="chatbot-widget-collapse"></button>
                    <div class="_23nLB">Minimize</div>
                </div>
            </div><iframe id="c5ae986c-8e12-47d6-891a-21a875c731e1" title="Wixbot" data-hook="chatbot-widget-iframe"
                class="mV0kr _3N3H5" frameborder="0"></iframe>
        </div>
    </div>
</body>
</html>
