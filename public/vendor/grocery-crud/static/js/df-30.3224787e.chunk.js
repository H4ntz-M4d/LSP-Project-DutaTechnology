(this["webpackJsonpgrocery-crud-3-frontend"]=this["webpackJsonpgrocery-crud-3-frontend"]||[]).push([[27],{202:function(e,t){e.exports=function(e){return e&&e.__esModule?e:{default:e}},e.exports.__esModule=!0,e.exports.default=e.exports},204:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){return function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},a=t.width?String(t.width):e.defaultWidth;return e.formats[a]||e.formats[e.defaultWidth]}},e.exports=t.default},205:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){return function(t,a){var n;if("formatting"===(null!==a&&void 0!==a&&a.context?String(a.context):"standalone")&&e.formattingValues){var i=e.defaultFormattingWidth||e.defaultWidth,u=null!==a&&void 0!==a&&a.width?String(a.width):i;n=e.formattingValues[u]||e.formattingValues[i]}else{var r=e.defaultWidth,o=null!==a&&void 0!==a&&a.width?String(a.width):e.defaultWidth;n=e.values[o]||e.values[r]}return n[e.argumentCallback?e.argumentCallback(t):t]}},e.exports=t.default},206:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){return function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=a.width,i=n&&e.matchPatterns[n]||e.matchPatterns[e.defaultMatchWidth],u=t.match(i);if(!u)return null;var r,o=u[0],l=n&&e.parsePatterns[n]||e.parsePatterns[e.defaultParseWidth],s=Array.isArray(l)?function(e,t){for(var a=0;a<e.length;a++)if(t(e[a]))return a;return}(l,(function(e){return e.test(o)})):function(e,t){for(var a in e)if(e.hasOwnProperty(a)&&t(e[a]))return a;return}(l,(function(e){return e.test(o)}));return r=e.valueCallback?e.valueCallback(s):s,{value:r=a.valueCallback?a.valueCallback(r):r,rest:t.slice(o.length)}}},e.exports=t.default},207:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){return function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=t.match(e.matchPattern);if(!n)return null;var i=n[0],u=t.match(e.parsePattern);if(!u)return null;var r=e.valueCallback?e.valueCallback(u[0]):u[0];return{value:r=a.valueCallback?a.valueCallback(r):r,rest:t.slice(i.length)}}},e.exports=t.default},836:function(e,t,a){"use strict";var n=a(202).default;Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var i=n(a(837)),u=n(a(838)),r=n(a(839)),o=n(a(840)),l=n(a(841)),s={code:"et",formatDistance:i.default,formatLong:u.default,formatRelative:r.default,localize:o.default,match:l.default,options:{weekStartsOn:1,firstWeekContainsDate:4}};t.default=s,e.exports=t.default},837:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n={lessThanXSeconds:{standalone:{one:"v\xe4hem kui \xfcks sekund",other:"v\xe4hem kui {{count}} sekundit"},withPreposition:{one:"v\xe4hem kui \xfche sekundi",other:"v\xe4hem kui {{count}} sekundi"}},xSeconds:{standalone:{one:"\xfcks sekund",other:"{{count}} sekundit"},withPreposition:{one:"\xfche sekundi",other:"{{count}} sekundi"}},halfAMinute:{standalone:"pool minutit",withPreposition:"poole minuti"},lessThanXMinutes:{standalone:{one:"v\xe4hem kui \xfcks minut",other:"v\xe4hem kui {{count}} minutit"},withPreposition:{one:"v\xe4hem kui \xfche minuti",other:"v\xe4hem kui {{count}} minuti"}},xMinutes:{standalone:{one:"\xfcks minut",other:"{{count}} minutit"},withPreposition:{one:"\xfche minuti",other:"{{count}} minuti"}},aboutXHours:{standalone:{one:"umbes \xfcks tund",other:"umbes {{count}} tundi"},withPreposition:{one:"umbes \xfche tunni",other:"umbes {{count}} tunni"}},xHours:{standalone:{one:"\xfcks tund",other:"{{count}} tundi"},withPreposition:{one:"\xfche tunni",other:"{{count}} tunni"}},xDays:{standalone:{one:"\xfcks p\xe4ev",other:"{{count}} p\xe4eva"},withPreposition:{one:"\xfche p\xe4eva",other:"{{count}} p\xe4eva"}},aboutXWeeks:{standalone:{one:"umbes \xfcks n\xe4dal",other:"umbes {{count}} n\xe4dalat"},withPreposition:{one:"umbes \xfche n\xe4dala",other:"umbes {{count}} n\xe4dala"}},xWeeks:{standalone:{one:"\xfcks n\xe4dal",other:"{{count}} n\xe4dalat"},withPreposition:{one:"\xfche n\xe4dala",other:"{{count}} n\xe4dala"}},aboutXMonths:{standalone:{one:"umbes \xfcks kuu",other:"umbes {{count}} kuud"},withPreposition:{one:"umbes \xfche kuu",other:"umbes {{count}} kuu"}},xMonths:{standalone:{one:"\xfcks kuu",other:"{{count}} kuud"},withPreposition:{one:"\xfche kuu",other:"{{count}} kuu"}},aboutXYears:{standalone:{one:"umbes \xfcks aasta",other:"umbes {{count}} aastat"},withPreposition:{one:"umbes \xfche aasta",other:"umbes {{count}} aasta"}},xYears:{standalone:{one:"\xfcks aasta",other:"{{count}} aastat"},withPreposition:{one:"\xfche aasta",other:"{{count}} aasta"}},overXYears:{standalone:{one:"rohkem kui \xfcks aasta",other:"rohkem kui {{count}} aastat"},withPreposition:{one:"rohkem kui \xfche aasta",other:"rohkem kui {{count}} aasta"}},almostXYears:{standalone:{one:"peaaegu \xfcks aasta",other:"peaaegu {{count}} aastat"},withPreposition:{one:"peaaegu \xfche aasta",other:"peaaegu {{count}} aasta"}}},i=function(e,t,a){var i,u=null!==a&&void 0!==a&&a.addSuffix?n[e].withPreposition:n[e].standalone;return i="string"===typeof u?u:1===t?u.one:u.other.replace("{{count}}",String(t)),null!==a&&void 0!==a&&a.addSuffix?a.comparison&&a.comparison>0?i+" p\xe4rast":i+" eest":i};t.default=i,e.exports=t.default},838:function(e,t,a){"use strict";var n=a(202).default;Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var i=n(a(204)),u={date:(0,i.default)({formats:{full:"EEEE, d. MMMM y",long:"d. MMMM y",medium:"d. MMM y",short:"dd.MM.y"},defaultWidth:"full"}),time:(0,i.default)({formats:{full:"HH:mm:ss zzzz",long:"HH:mm:ss z",medium:"HH:mm:ss",short:"HH:mm"},defaultWidth:"full"}),dateTime:(0,i.default)({formats:{full:"{{date}} 'kell' {{time}}",long:"{{date}} 'kell' {{time}}",medium:"{{date}}. {{time}}",short:"{{date}}. {{time}}"},defaultWidth:"full"})};t.default=u,e.exports=t.default},839:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n={lastWeek:"'eelmine' eeee 'kell' p",yesterday:"'eile kell' p",today:"'t\xe4na kell' p",tomorrow:"'homme kell' p",nextWeek:"'j\xe4rgmine' eeee 'kell' p",other:"P"},i=function(e,t,a,i){return n[e]};t.default=i,e.exports=t.default},840:function(e,t,a){"use strict";var n=a(202).default;Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var i=n(a(205)),u={narrow:["J","V","M","A","M","J","J","A","S","O","N","D"],abbreviated:["jaan","veebr","m\xe4rts","apr","mai","juuni","juuli","aug","sept","okt","nov","dets"],wide:["jaanuar","veebruar","m\xe4rts","aprill","mai","juuni","juuli","august","september","oktoober","november","detsember"]},r={narrow:["P","E","T","K","N","R","L"],short:["P","E","T","K","N","R","L"],abbreviated:["p\xfchap.","esmasp.","teisip.","kolmap.","neljap.","reede.","laup."],wide:["p\xfchap\xe4ev","esmasp\xe4ev","teisip\xe4ev","kolmap\xe4ev","neljap\xe4ev","reede","laup\xe4ev"]},o={ordinalNumber:function(e,t){return Number(e)+"."},era:(0,i.default)({values:{narrow:["e.m.a","m.a.j"],abbreviated:["e.m.a","m.a.j"],wide:["enne meie ajaarvamist","meie ajaarvamise j\xe4rgi"]},defaultWidth:"wide"}),quarter:(0,i.default)({values:{narrow:["1","2","3","4"],abbreviated:["K1","K2","K3","K4"],wide:["1. kvartal","2. kvartal","3. kvartal","4. kvartal"]},defaultWidth:"wide",argumentCallback:function(e){return e-1}}),month:(0,i.default)({values:u,defaultWidth:"wide",formattingValues:u,defaultFormattingWidth:"wide"}),day:(0,i.default)({values:r,defaultWidth:"wide",formattingValues:r,defaultFormattingWidth:"wide"}),dayPeriod:(0,i.default)({values:{narrow:{am:"AM",pm:"PM",midnight:"kesk\xf6\xf6",noon:"keskp\xe4ev",morning:"hommik",afternoon:"p\xe4rastl\xf5una",evening:"\xf5htu",night:"\xf6\xf6"},abbreviated:{am:"AM",pm:"PM",midnight:"kesk\xf6\xf6",noon:"keskp\xe4ev",morning:"hommik",afternoon:"p\xe4rastl\xf5una",evening:"\xf5htu",night:"\xf6\xf6"},wide:{am:"AM",pm:"PM",midnight:"kesk\xf6\xf6",noon:"keskp\xe4ev",morning:"hommik",afternoon:"p\xe4rastl\xf5una",evening:"\xf5htu",night:"\xf6\xf6"}},defaultWidth:"wide",formattingValues:{narrow:{am:"AM",pm:"PM",midnight:"kesk\xf6\xf6l",noon:"keskp\xe4eval",morning:"hommikul",afternoon:"p\xe4rastl\xf5unal",evening:"\xf5htul",night:"\xf6\xf6sel"},abbreviated:{am:"AM",pm:"PM",midnight:"kesk\xf6\xf6l",noon:"keskp\xe4eval",morning:"hommikul",afternoon:"p\xe4rastl\xf5unal",evening:"\xf5htul",night:"\xf6\xf6sel"},wide:{am:"AM",pm:"PM",midnight:"kesk\xf6\xf6l",noon:"keskp\xe4eval",morning:"hommikul",afternoon:"p\xe4rastl\xf5unal",evening:"\xf5htul",night:"\xf6\xf6sel"}},defaultFormattingWidth:"wide"})};t.default=o,e.exports=t.default},841:function(e,t,a){"use strict";var n=a(202).default;Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var i=n(a(206)),u={ordinalNumber:(0,n(a(207)).default)({matchPattern:/^\d+\./i,parsePattern:/\d+/i,valueCallback:function(e){return parseInt(e,10)}}),era:(0,i.default)({matchPatterns:{narrow:/^(e\.m\.a|m\.a\.j|eKr|pKr)/i,abbreviated:/^(e\.m\.a|m\.a\.j|eKr|pKr)/i,wide:/^(enne meie ajaarvamist|meie ajaarvamise j\xe4rgi|enne Kristust|p\xe4rast Kristust)/i},defaultMatchWidth:"wide",parsePatterns:{any:[/^e/i,/^(m|p)/i]},defaultParseWidth:"any"}),quarter:(0,i.default)({matchPatterns:{narrow:/^[1234]/i,abbreviated:/^K[1234]/i,wide:/^[1234](\.)? kvartal/i},defaultMatchWidth:"wide",parsePatterns:{any:[/1/i,/2/i,/3/i,/4/i]},defaultParseWidth:"any",valueCallback:function(e){return e+1}}),month:(0,i.default)({matchPatterns:{narrow:/^[jvmasond]/i,abbreviated:/^(jaan|veebr|m\xe4rts|apr|mai|juuni|juuli|aug|sept|okt|nov|dets)/i,wide:/^(jaanuar|veebruar|m\xe4rts|aprill|mai|juuni|juuli|august|september|oktoober|november|detsember)/i},defaultMatchWidth:"wide",parsePatterns:{narrow:[/^j/i,/^v/i,/^m/i,/^a/i,/^m/i,/^j/i,/^j/i,/^a/i,/^s/i,/^o/i,/^n/i,/^d/i],any:[/^ja/i,/^v/i,/^m\xe4r/i,/^ap/i,/^mai/i,/^juun/i,/^juul/i,/^au/i,/^s/i,/^o/i,/^n/i,/^d/i]},defaultParseWidth:"any"}),day:(0,i.default)({matchPatterns:{narrow:/^[petknrl]/i,short:/^[petknrl]/i,abbreviated:/^(p\xfch?|esm?|tei?|kolm?|nel?|ree?|laup?)\.?/i,wide:/^(p\xfchap\xe4ev|esmasp\xe4ev|teisip\xe4ev|kolmap\xe4ev|neljap\xe4ev|reede|laup\xe4ev)/i},defaultMatchWidth:"wide",parsePatterns:{any:[/^p/i,/^e/i,/^t/i,/^k/i,/^n/i,/^r/i,/^l/i]},defaultParseWidth:"any"}),dayPeriod:(0,i.default)({matchPatterns:{any:/^(am|pm|kesk\xf6\xf6l?|keskp\xe4ev(al)?|hommik(ul)?|p\xe4rastl\xf5unal?|\xf5htul?|\xf6\xf6(sel)?)/i},defaultMatchWidth:"any",parsePatterns:{any:{am:/^a/i,pm:/^p/i,midnight:/^kesk\xf6/i,noon:/^keskp/i,morning:/hommik/i,afternoon:/p\xe4rastl\xf5una/i,evening:/\xf5htu/i,night:/\xf6\xf6/i}},defaultParseWidth:"any"})};t.default=u,e.exports=t.default}}]);