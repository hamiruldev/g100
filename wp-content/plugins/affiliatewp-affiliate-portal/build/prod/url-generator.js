window.AFFWP=window.AFFWP||{},window.AFFWP.portal=window.AFFWP.portal||{},window.AFFWP.portal.urlGenerator=function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=43)}([function(e,t){!function(){e.exports=this.wp.url}()},function(e,t){!function(){e.exports=this.regeneratorRuntime}()},function(e,t){function n(e,t,n,r,i,o,a){try{var s=e[o](a),l=s.value}catch(e){return void n(e)}s.done?t(l):Promise.resolve(l).then(r,i)}e.exports=function(e){return function(){var t=this,r=arguments;return new Promise((function(i,o){var a=e.apply(t,r);function s(e){n(a,i,o,s,l,"next",e)}function l(e){n(a,i,o,s,l,"throw",e)}s(void 0)}))}}},function(e,t,n){"use strict";function r(e){return new Promise((function(t){return setTimeout(t,e)}))}function i(e){return"string"!=typeof e||e.endsWith("/")?e:"".concat(e,"/")}n.d(t,"a",(function(){return r})),n.d(t,"b",(function(){return i}))},function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}},function(e,t){!function(){e.exports=this.AFFWP.portal.sdk}()},function(e,t){function n(t){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?e.exports=n=function(e){return typeof e}:e.exports=n=function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n(t)}e.exports=n},function(e,t,n){"use strict";n.d(t,"f",(function(){return f})),n.d(t,"c",(function(){return u})),n.d(t,"a",(function(){return a})),n.d(t,"b",(function(){return l})),n.d(t,"e",(function(){return c})),n.d(t,"g",(function(){return d})),n.d(t,"d",(function(){return p}));var r=n(0),i=n(3),o=/\/([^\/a-zA-Z-_]+)\/?$/;function a(e,t){return t.startsWith("/")&&(t=t.substr(1)),s(e,["protocol","authority","path",Object(i.b)(t),"querystring","fragment"])}function s(e,t){var n={getProtocol:function(){return"".concat(Object(r.getProtocol)(e),"//")},getAuthority:function(){return Object(i.b)(Object(r.getAuthority)(e))},getPath:function(){return Object(i.b)(Object(r.getPath)(e))},getQuerystring:function(){return Object(r.getQueryString)(e)?"?".concat(Object(r.getQueryString)(e)):""},getFragment:function(){return Object(r.getFragment)(e)}};return t.reduce((function(e,t){var r=["protocol","authority","path","querystring","fragment"].includes(t.toLowerCase());if(!r&&"string"==typeof t)return e+t;if(!r)return e;var i=(0,n["get"+t.charAt(0).toUpperCase()+t.slice(1).toLowerCase()])();return void 0===i?e:e+i}),"")}function l(e,t){var n=Object(r.getAuthority)(e);return n===t||new RegExp("\\w\\."+t+"$").test(n)}function c(e){var t=Object(r.getProtocol)(e);return["https:","http:"].includes(t)}function u(e){var t=Object(r.getPath)(e).match(o);return null===t?"1":t[1]}function f(e,t){u(e);var n=["protocol","authority",Object(i.b)(Object(r.getPath)(e)).replace(o,"/")];t.page&&(t.page>1&&n.push(t.page+"/"),delete t.page);var a=s(e,n);return Object(r.addQueryArgs)(a,t)}function d(e){return/\.\w\w.*/.test(e)}function p(e){var t=e.split("?"),n=t[1],r=t[0];return n?r+"?"+n.split("&").map((function(e){return e.split("=")})).sort((function(e,t){return e[0].localeCompare(t[0])})).map((function(e){return e.join("=")})).join("&"):r}},function(e,t,n){e.exports=function(){"use strict";function e(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function t(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function n(n){for(var r=1;r<arguments.length;r++){var i=null!=arguments[r]?arguments[r]:{};r%2?t(Object(i),!0).forEach((function(t){e(n,t,i[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(i)):t(Object(i)).forEach((function(e){Object.defineProperty(n,e,Object.getOwnPropertyDescriptor(i,e))}))}return n}function r(e){return Array.from(new Set(e))}function i(){return navigator.userAgent.includes("Node.js")||navigator.userAgent.includes("jsdom")}function o(e,t){return e==t}function a(e,t){"template"!==e.tagName.toLowerCase()?console.warn(`Alpine: [${t}] directive should only be added to <template> tags. See https://github.com/alpinejs/alpine#${t}`):1!==e.content.childElementCount&&console.warn(`Alpine: <template> tag with [${t}] encountered with multiple element roots. Make sure <template> only has a single child element.`)}function s(e){return e.toLowerCase().replace(/-(\w)/g,(e,t)=>t.toUpperCase())}function l(e,t){var n;return function(){var r=this,i=arguments,o=function(){n=null,e.apply(r,i)};clearTimeout(n),n=setTimeout(o,t)}}function c(e,t,n={}){return"function"==typeof e?e.call(t):new Function(["$data",...Object.keys(n)],`var __alpine_result; with($data) { __alpine_result = ${e} }; return __alpine_result`)(t,...Object.values(n))}const u=/^x-(on|bind|data|text|html|model|if|for|show|cloak|transition|ref|spread)\b/;function f(e){const t=h(e.name);return u.test(t)}function d(e,t,n){let r=Array.from(e.attributes).filter(f).map(p),i=r.filter(e=>"spread"===e.type)[0];if(i){let e=c(i.expression,t.$data);r=r.concat(Object.entries(e).map(([e,t])=>p({name:e,value:t})))}return n?r.filter(e=>e.type===n):function(e){let t=["bind","model","show","catch-all"];return e.sort((e,n)=>{let r=-1===t.indexOf(e.type)?"catch-all":e.type,i=-1===t.indexOf(n.type)?"catch-all":n.type;return t.indexOf(r)-t.indexOf(i)})}(r)}function p({name:e,value:t}){const n=h(e),r=n.match(u),i=n.match(/:([a-zA-Z0-9\-:]+)/),o=n.match(/\.[^.\]]+(?=[^\]]*$)/g)||[];return{type:r?r[1]:null,value:i?i[1]:null,modifiers:o.map(e=>e.replace(".","")),expression:t}}function h(e){return e.startsWith("@")?e.replace("@","x-on:"):e.startsWith(":")?e.replace(":","x-bind:"):e}function m(e,t=Boolean){return e.split(" ").filter(t)}function b(e,t,n,r,i=!1){if(i)return t();if(e.__x_transition&&"in"===e.__x_transition.type)return;const o=d(e,r,"transition"),a=d(e,r,"show")[0];if(a&&a.modifiers.includes("transition")){let r=a.modifiers;if(r.includes("out")&&!r.includes("in"))return t();const i=r.includes("in")&&r.includes("out");r=i?r.filter((e,t)=>t<r.indexOf("out")):r,function(e,t,n,r){const i={duration:v(t,"duration",150),origin:v(t,"origin","center"),first:{opacity:0,scale:v(t,"scale",95)},second:{opacity:1,scale:100}};g(e,t,n,()=>{},r,i,"in")}(e,r,t,n)}else o.some(e=>["enter","enter-start","enter-end"].includes(e.value))?function(e,t,n,r,i){const o=m(x((n.find(e=>"enter"===e.value)||{expression:""}).expression,e,t)),a=m(x((n.find(e=>"enter-start"===e.value)||{expression:""}).expression,e,t)),s=m(x((n.find(e=>"enter-end"===e.value)||{expression:""}).expression,e,t));_(e,o,a,s,r,()=>{},"in",i)}(e,r,o,t,n):t()}function y(e,t,n,r,i=!1){if(i)return t();if(e.__x_transition&&"out"===e.__x_transition.type)return;const o=d(e,r,"transition"),a=d(e,r,"show")[0];if(a&&a.modifiers.includes("transition")){let r=a.modifiers;if(r.includes("in")&&!r.includes("out"))return t();const i=r.includes("in")&&r.includes("out");r=i?r.filter((e,t)=>t>r.indexOf("out")):r,function(e,t,n,r,i){const o={duration:n?v(t,"duration",150):v(t,"duration",150)/2,origin:v(t,"origin","center"),first:{opacity:1,scale:100},second:{opacity:0,scale:v(t,"scale",95)}};g(e,t,()=>{},r,i,o,"out")}(e,r,i,t,n)}else o.some(e=>["leave","leave-start","leave-end"].includes(e.value))?function(e,t,n,r,i){const o=m(x((n.find(e=>"leave"===e.value)||{expression:""}).expression,e,t)),a=m(x((n.find(e=>"leave-start"===e.value)||{expression:""}).expression,e,t)),s=m(x((n.find(e=>"leave-end"===e.value)||{expression:""}).expression,e,t));_(e,o,a,s,()=>{},r,"out",i)}(e,r,o,t,n):t()}function v(e,t,n){if(-1===e.indexOf(t))return n;const r=e[e.indexOf(t)+1];if(!r)return n;if("scale"===t&&!O(r))return n;if("duration"===t){let e=r.match(/([0-9]+)ms/);if(e)return e[1]}return"origin"===t&&["top","right","left","center","bottom"].includes(e[e.indexOf(t)+2])?[r,e[e.indexOf(t)+2]].join(" "):r}function g(e,t,n,r,i,o,a){e.__x_transition&&e.__x_transition.cancel&&e.__x_transition.cancel();const s=e.style.opacity,l=e.style.transform,c=e.style.transformOrigin,u=!t.includes("opacity")&&!t.includes("scale"),f=u||t.includes("opacity"),d=u||t.includes("scale"),p={start(){f&&(e.style.opacity=o.first.opacity),d&&(e.style.transform=`scale(${o.first.scale/100})`)},during(){d&&(e.style.transformOrigin=o.origin),e.style.transitionProperty=[f?"opacity":"",d?"transform":""].join(" ").trim(),e.style.transitionDuration=o.duration/1e3+"s",e.style.transitionTimingFunction="cubic-bezier(0.4, 0.0, 0.2, 1)"},show(){n()},end(){f&&(e.style.opacity=o.second.opacity),d&&(e.style.transform=`scale(${o.second.scale/100})`)},hide(){r()},cleanup(){f&&(e.style.opacity=s),d&&(e.style.transform=l),d&&(e.style.transformOrigin=c),e.style.transitionProperty=null,e.style.transitionDuration=null,e.style.transitionTimingFunction=null}};w(e,p,a,i)}const x=(e,t,n)=>"function"==typeof e?n.evaluateReturnExpression(t,e):e;function _(e,t,n,r,i,o,a,s){e.__x_transition&&e.__x_transition.cancel&&e.__x_transition.cancel();const l=e.__x_original_classes||[],c={start(){e.classList.add(...n)},during(){e.classList.add(...t)},show(){i()},end(){e.classList.remove(...n.filter(e=>!l.includes(e))),e.classList.add(...r)},hide(){o()},cleanup(){e.classList.remove(...t.filter(e=>!l.includes(e))),e.classList.remove(...r.filter(e=>!l.includes(e)))}};w(e,c,a,s)}function w(e,t,n,r){const i=E(()=>{t.hide(),e.isConnected&&t.cleanup(),delete e.__x_transition});e.__x_transition={type:n,cancel:E(()=>{r("cancelled"),i()}),finish:i,nextFrame:null},t.start(),t.during(),e.__x_transition.nextFrame=requestAnimationFrame(()=>{let n=1e3*Number(getComputedStyle(e).transitionDuration.replace(/,.*/,"").replace("s",""));0===n&&(n=1e3*Number(getComputedStyle(e).animationDuration.replace("s",""))),t.show(),e.__x_transition.nextFrame=requestAnimationFrame(()=>{t.end(),setTimeout(e.__x_transition.finish,n)})})}function O(e){return!Array.isArray(e)&&!isNaN(e)}function E(e){let t=!1;return function(){t||(t=!0,e.apply(this,arguments))}}function j(e,t,r,i,o){a(t,"x-for");let s=A("function"==typeof r?e.evaluateReturnExpression(t,r):r),l=function(e,t,n,r){let i=d(t,e,"if")[0];if(i&&!e.evaluateReturnExpression(t,i.expression))return[];let o=e.evaluateReturnExpression(t,n.items,r);return O(o)&&o>0&&(o=Array.from(Array(o).keys(),e=>e+1)),o}(e,t,s,o),c=t;l.forEach((r,a)=>{let u=function(e,t,r,i,o){let a=o?n({},o):{};return a[e.item]=t,e.index&&(a[e.index]=r),e.collection&&(a[e.collection]=i),a}(s,r,a,l,o()),f=function(e,t,n,r){let i=d(t,e,"bind").filter(e=>"key"===e.value)[0];return i?e.evaluateReturnExpression(t,i.expression,()=>r):n}(e,t,a,u),p=function(e,t){if(!e)return;if(e.__x_for_key===t)return e;let n=e;for(;n;){if(n.__x_for_key===t)return n.parentElement.insertBefore(n,e);n=!(!n.nextElementSibling||void 0===n.nextElementSibling.__x_for_key)&&n.nextElementSibling}}(c.nextElementSibling,f);p?(delete p.__x_for_key,p.__x_for=u,e.updateElements(p,()=>p.__x_for)):(p=function(e,t){let n=document.importNode(e.content,!0);return t.parentElement.insertBefore(n,t.nextElementSibling),t.nextElementSibling}(t,c),b(p,()=>{},()=>{},e,i),p.__x_for=u,e.initializeElements(p,()=>p.__x_for)),c=p,c.__x_for_key=f}),function(e,t){for(var n=!(!e.nextElementSibling||void 0===e.nextElementSibling.__x_for_key)&&e.nextElementSibling;n;){let e=n,r=n.nextElementSibling;y(n,()=>{e.remove()},()=>{},t),n=!(!r||void 0===r.__x_for_key)&&r}}(c,e)}function A(e){let t=/,([^,\}\]]*)(?:,([^,\}\]]*))?$/,n=e.match(/([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/);if(!n)return;let r={};r.items=n[2].trim();let i=n[1].trim().replace(/^\(|\)$/g,""),o=i.match(t);return o?(r.item=i.replace(t,"").trim(),r.index=o[1].trim(),o[2]&&(r.collection=o[2].trim())):r.item=i,r}function P(e,t,n,i,a,l,c){var u=e.evaluateReturnExpression(t,i,a);if("value"===n){if(pe.ignoreFocusedForValueBinding&&document.activeElement.isSameNode(t))return;if(void 0===u&&i.match(/\./)&&(u=""),"radio"===t.type)void 0===t.attributes.value&&"bind"===l?t.value=u:"bind"!==l&&(t.checked=o(t.value,u));else if("checkbox"===t.type)"boolean"==typeof u||[null,void 0].includes(u)||"bind"!==l?"bind"!==l&&(Array.isArray(u)?t.checked=u.some(e=>o(e,t.value)):t.checked=!!u):t.value=String(u);else if("SELECT"===t.tagName)!function(e,t){const n=[].concat(t).map(e=>e+"");Array.from(e.options).forEach(e=>{e.selected=n.includes(e.value||e.text)})}(t,u);else{if(t.value===u)return;t.value=u}}else if("class"===n)if(Array.isArray(u)){const e=t.__x_original_classes||[];t.setAttribute("class",r(e.concat(u)).join(" "))}else if("object"==typeof u)Object.keys(u).sort((e,t)=>u[e]-u[t]).forEach(e=>{u[e]?m(e).forEach(e=>t.classList.add(e)):m(e).forEach(e=>t.classList.remove(e))});else{const e=t.__x_original_classes||[],n=m(u);t.setAttribute("class",r(e.concat(n)).join(" "))}else n=c.includes("camel")?s(n):n,[null,void 0,!1].includes(u)?t.removeAttribute(n):function(e){return["disabled","checked","required","readonly","hidden","open","selected","autofocus","itemscope","multiple","novalidate","allowfullscreen","allowpaymentrequest","formnovalidate","autoplay","controls","loop","muted","playsinline","default","ismap","reversed","async","defer","nomodule"].includes(e)}(n)?k(t,n,n):k(t,n,u)}function k(e,t,n){e.getAttribute(t)!=n&&e.setAttribute(t,n)}function S(e,t,n,r,i,o={}){const a={passive:r.includes("passive")};if(r.includes("camel")&&(n=s(n)),r.includes("away")){let s=l=>{t.contains(l.target)||t.offsetWidth<1&&t.offsetHeight<1||(C(e,i,l,o),r.includes("once")&&document.removeEventListener(n,s,a))};document.addEventListener(n,s,a)}else{let s=r.includes("window")?window:r.includes("document")?document:t,c=l=>{s!==window&&s!==document||document.body.contains(t)?function(e){return["keydown","keyup"].includes(e)}(n)&&function(e,t){let n=t.filter(e=>!["window","document","prevent","stop"].includes(e));if(n.includes("debounce")){let e=n.indexOf("debounce");n.splice(e,O((n[e+1]||"invalid-wait").split("ms")[0])?2:1)}if(0===n.length)return!1;if(1===n.length&&n[0]===$(e.key))return!1;const r=["ctrl","shift","alt","meta","cmd","super"].filter(e=>n.includes(e));return n=n.filter(e=>!r.includes(e)),!(r.length>0&&r.filter(t=>("cmd"!==t&&"super"!==t||(t="meta"),e[t+"Key"])).length===r.length&&n[0]===$(e.key))}(l,r)||(r.includes("prevent")&&l.preventDefault(),r.includes("stop")&&l.stopPropagation(),r.includes("self")&&l.target!==t)||C(e,i,l,o).then(e=>{!1===e?l.preventDefault():r.includes("once")&&s.removeEventListener(n,c,a)}):s.removeEventListener(n,c,a)};if(r.includes("debounce")){let e=r[r.indexOf("debounce")+1]||"invalid-wait",t=O(e.split("ms")[0])?Number(e.split("ms")[0]):250;c=l(c,t)}s.addEventListener(n,c,a)}}function C(e,t,r,i){return e.evaluateCommandExpression(r.target,t,()=>n(n({},i()),{},{$event:r}))}function $(e){switch(e){case"/":return"slash";case" ":case"Spacebar":return"space";default:return e&&e.replace(/([a-z])([A-Z])/g,"$1-$2").replace(/[_\s]/,"-").toLowerCase()}}function D(e,t,n){return"radio"===e.type&&(e.hasAttribute("name")||e.setAttribute("name",n)),(n,r)=>{if(n instanceof CustomEvent&&n.detail)return n.detail;if("checkbox"===e.type){if(Array.isArray(r)){const e=t.includes("number")?T(n.target.value):n.target.value;return n.target.checked?r.concat([e]):r.filter(t=>!o(t,e))}return n.target.checked}if("select"===e.tagName.toLowerCase()&&e.multiple)return t.includes("number")?Array.from(n.target.selectedOptions).map(e=>T(e.value||e.text)):Array.from(n.target.selectedOptions).map(e=>e.value||e.text);{const e=n.target.value;return t.includes("number")?T(e):t.includes("trim")?e.trim():e}}}function T(e){const t=e?parseFloat(e):null;return O(t)?t:e}const{isArray:F}=Array,{getPrototypeOf:L,create:M,defineProperty:U,defineProperties:R,isExtensible:N,getOwnPropertyDescriptor:z,getOwnPropertyNames:I,getOwnPropertySymbols:W,preventExtensions:B,hasOwnProperty:q}=Object,{push:V,concat:G,map:Q}=Array.prototype;function H(e){return void 0===e}function K(e){return"function"==typeof e}const Z=new WeakMap;function J(e,t){Z.set(e,t)}const X=e=>Z.get(e)||e;function Y(e,t){return e.valueIsObservable(t)?e.getProxy(t):t}function ee(e,t,n){G.call(I(n),W(n)).forEach(r=>{let i=z(n,r);i.configurable||(i=ue(e,i,Y)),U(t,r,i)}),B(t)}class te{constructor(e,t){this.originalTarget=t,this.membrane=e}get(e,t){const{originalTarget:n,membrane:r}=this,i=n[t],{valueObserved:o}=r;return o(n,t),r.getProxy(i)}set(e,t,n){const{originalTarget:r,membrane:{valueMutated:i}}=this;return r[t]!==n?(r[t]=n,i(r,t)):"length"===t&&F(r)&&i(r,t),!0}deleteProperty(e,t){const{originalTarget:n,membrane:{valueMutated:r}}=this;return delete n[t],r(n,t),!0}apply(e,t,n){}construct(e,t,n){}has(e,t){const{originalTarget:n,membrane:{valueObserved:r}}=this;return r(n,t),t in n}ownKeys(e){const{originalTarget:t}=this;return G.call(I(t),W(t))}isExtensible(e){const t=N(e);if(!t)return t;const{originalTarget:n,membrane:r}=this,i=N(n);return i||ee(r,e,n),i}setPrototypeOf(e,t){}getPrototypeOf(e){const{originalTarget:t}=this;return L(t)}getOwnPropertyDescriptor(e,t){const{originalTarget:n,membrane:r}=this,{valueObserved:i}=this.membrane;i(n,t);let o=z(n,t);if(H(o))return o;const a=z(e,t);return H(a)?(o=ue(r,o,Y),o.configurable||U(e,t,o),o):a}preventExtensions(e){const{originalTarget:t,membrane:n}=this;return ee(n,e,t),B(t),!0}defineProperty(e,t,n){const{originalTarget:r,membrane:i}=this,{valueMutated:o}=i,{configurable:a}=n;if(q.call(n,"writable")&&!q.call(n,"value")){const e=z(r,t);n.value=e.value}return U(r,t,function(e){return q.call(e,"value")&&(e.value=X(e.value)),e}(n)),!1===a&&U(e,t,ue(i,n,Y)),o(r,t),!0}}function ne(e,t){return e.valueIsObservable(t)?e.getReadOnlyProxy(t):t}class re{constructor(e,t){this.originalTarget=t,this.membrane=e}get(e,t){const{membrane:n,originalTarget:r}=this,i=r[t],{valueObserved:o}=n;return o(r,t),n.getReadOnlyProxy(i)}set(e,t,n){return!1}deleteProperty(e,t){return!1}apply(e,t,n){}construct(e,t,n){}has(e,t){const{originalTarget:n,membrane:{valueObserved:r}}=this;return r(n,t),t in n}ownKeys(e){const{originalTarget:t}=this;return G.call(I(t),W(t))}setPrototypeOf(e,t){}getOwnPropertyDescriptor(e,t){const{originalTarget:n,membrane:r}=this,{valueObserved:i}=r;i(n,t);let o=z(n,t);if(H(o))return o;const a=z(e,t);return H(a)?(o=ue(r,o,ne),q.call(o,"set")&&(o.set=void 0),o.configurable||U(e,t,o),o):a}preventExtensions(e){return!1}defineProperty(e,t,n){return!1}}function ie(e){let t=void 0;return F(e)?t=[]:"object"==typeof e&&(t={}),t}const oe=Object.prototype;function ae(e){if(null===e)return!1;if("object"!=typeof e)return!1;if(F(e))return!0;const t=L(e);return t===oe||null===t||null===L(t)}const se=(e,t)=>{},le=(e,t)=>{},ce=e=>e;function ue(e,t,n){const{set:r,get:i}=t;return q.call(t,"value")?t.value=n(e,t.value):(H(i)||(t.get=function(){return n(e,i.call(X(this)))}),H(r)||(t.set=function(t){r.call(X(this),e.unwrapProxy(t))})),t}class fe{constructor(e){if(this.valueDistortion=ce,this.valueMutated=le,this.valueObserved=se,this.valueIsObservable=ae,this.objectGraph=new WeakMap,!H(e)){const{valueDistortion:t,valueMutated:n,valueObserved:r,valueIsObservable:i}=e;this.valueDistortion=K(t)?t:ce,this.valueMutated=K(n)?n:le,this.valueObserved=K(r)?r:se,this.valueIsObservable=K(i)?i:ae}}getProxy(e){const t=X(e),n=this.valueDistortion(t);if(this.valueIsObservable(n)){const r=this.getReactiveState(t,n);return r.readOnly===e?e:r.reactive}return n}getReadOnlyProxy(e){e=X(e);const t=this.valueDistortion(e);return this.valueIsObservable(t)?this.getReactiveState(e,t).readOnly:t}unwrapProxy(e){return X(e)}getReactiveState(e,t){const{objectGraph:n}=this;let r=n.get(t);if(r)return r;const i=this;return r={get reactive(){const n=new te(i,t),r=new Proxy(ie(t),n);return J(r,e),U(this,"reactive",{value:r}),r},get readOnly(){const n=new re(i,t),r=new Proxy(ie(t),n);return J(r,e),U(this,"readOnly",{value:r}),r}},n.set(t,r),r}}class de{constructor(e,t=null){this.$el=e;const n=this.$el.getAttribute("x-data"),r=""===n?"{}":n,i=this.$el.getAttribute("x-init");let o={$el:this.$el},a=t?t.$el:this.$el;Object.entries(pe.magicProperties).forEach(([e,t])=>{Object.defineProperty(o,"$"+e,{get:function(){return t(a)}})}),this.unobservedData=t?t.getUnobservedData():c(r,o);let{membrane:s,data:l}=this.wrapDataInObservable(this.unobservedData);var u;this.$data=l,this.membrane=s,this.unobservedData.$el=this.$el,this.unobservedData.$refs=this.getRefsProxy(),this.nextTickStack=[],this.unobservedData.$nextTick=e=>{this.nextTickStack.push(e)},this.watchers={},this.unobservedData.$watch=(e,t)=>{this.watchers[e]||(this.watchers[e]=[]),this.watchers[e].push(t)},Object.entries(pe.magicProperties).forEach(([e,t])=>{Object.defineProperty(this.unobservedData,"$"+e,{get:function(){return t(a)}})}),this.showDirectiveStack=[],this.showDirectiveLastElement,t||pe.onBeforeComponentInitializeds.forEach(e=>e(this)),i&&!t&&(this.pauseReactivity=!0,u=this.evaluateReturnExpression(this.$el,i),this.pauseReactivity=!1),this.initializeElements(this.$el),this.listenForNewElementsToInitialize(),"function"==typeof u&&u.call(this.$data),t||setTimeout(()=>{pe.onComponentInitializeds.forEach(e=>e(this))},0)}getUnobservedData(){return function(e,t){let n=e.unwrapProxy(t),r={};return Object.keys(n).forEach(e=>{["$el","$refs","$nextTick","$watch"].includes(e)||(r[e]=n[e])}),r}(this.membrane,this.$data)}wrapDataInObservable(e){var t=this;let n=l((function(){t.updateElements(t.$el)}),0);return function(e,t){let n=new fe({valueMutated(e,n){t(e,n)}});return{data:n.getProxy(e),membrane:n}}(e,(e,r)=>{t.watchers[r]?t.watchers[r].forEach(t=>t(e[r])):Array.isArray(e)?Object.keys(t.watchers).forEach(n=>{let i=n.split(".");"length"!==r&&i.reduce((r,i)=>(Object.is(e,r[i])&&t.watchers[n].forEach(t=>t(e)),r[i]),t.unobservedData)}):Object.keys(t.watchers).filter(e=>e.includes(".")).forEach(n=>{let i=n.split(".");r===i[i.length-1]&&i.reduce((i,o)=>(Object.is(e,i)&&t.watchers[n].forEach(t=>t(e[r])),i[o]),t.unobservedData)}),t.pauseReactivity||n()})}walkAndSkipNestedComponents(e,t,n=(()=>{})){!function e(t,n){if(!1===n(t))return;let r=t.firstElementChild;for(;r;)e(r,n),r=r.nextElementSibling}(e,e=>e.hasAttribute("x-data")&&!e.isSameNode(this.$el)?(e.__x||n(e),!1):t(e))}initializeElements(e,t=(()=>{})){this.walkAndSkipNestedComponents(e,e=>void 0===e.__x_for_key&&void 0===e.__x_inserted_me&&void this.initializeElement(e,t),e=>{e.__x=new de(e)}),this.executeAndClearRemainingShowDirectiveStack(),this.executeAndClearNextTickStack(e)}initializeElement(e,t){e.hasAttribute("class")&&d(e,this).length>0&&(e.__x_original_classes=m(e.getAttribute("class"))),this.registerListeners(e,t),this.resolveBoundAttributes(e,!0,t)}updateElements(e,t=(()=>{})){this.walkAndSkipNestedComponents(e,e=>{if(void 0!==e.__x_for_key&&!e.isSameNode(this.$el))return!1;this.updateElement(e,t)},e=>{e.__x=new de(e)}),this.executeAndClearRemainingShowDirectiveStack(),this.executeAndClearNextTickStack(e)}executeAndClearNextTickStack(e){e===this.$el&&this.nextTickStack.length>0&&requestAnimationFrame(()=>{for(;this.nextTickStack.length>0;)this.nextTickStack.shift()()})}executeAndClearRemainingShowDirectiveStack(){this.showDirectiveStack.reverse().map(e=>new Promise((t,n)=>{e(t,n)})).reduce((e,t)=>e.then(()=>t.then(e=>{e()})),Promise.resolve(()=>{})).catch(e=>{if("cancelled"!==e)throw e}),this.showDirectiveStack=[],this.showDirectiveLastElement=void 0}updateElement(e,t){this.resolveBoundAttributes(e,!1,t)}registerListeners(e,t){d(e,this).forEach(({type:r,value:i,modifiers:o,expression:a})=>{switch(r){case"on":S(this,e,i,o,a,t);break;case"model":!function(e,t,r,i,o){var a="select"===t.tagName.toLowerCase()||["checkbox","radio"].includes(t.type)||r.includes("lazy")?"change":"input";S(e,t,a,r,`${i} = rightSideOfExpression($event, ${i})`,()=>n(n({},o()),{},{rightSideOfExpression:D(t,r,i)}))}(this,e,o,a,t)}})}resolveBoundAttributes(e,t=!1,n){let r=d(e,this);r.forEach(({type:i,value:o,modifiers:s,expression:l})=>{switch(i){case"model":P(this,e,"value",l,n,i,s);break;case"bind":if("template"===e.tagName.toLowerCase()&&"key"===o)return;P(this,e,o,l,n,i,s);break;case"text":var c=this.evaluateReturnExpression(e,l,n);!function(e,t,n){void 0===t&&n.match(/\./)&&(t=""),e.textContent=t}(e,c,l);break;case"html":!function(e,t,n,r){t.innerHTML=e.evaluateReturnExpression(t,n,r)}(this,e,l,n);break;case"show":c=this.evaluateReturnExpression(e,l,n),function(e,t,n,r,i=!1){const o=()=>{t.style.display="none",t.__x_is_shown=!1},a=()=>{1===t.style.length&&"none"===t.style.display?t.removeAttribute("style"):t.style.removeProperty("display"),t.__x_is_shown=!0};if(!0===i)return void(n?a():o());const s=(r,i)=>{n?(("none"===t.style.display||t.__x_transition)&&b(t,()=>{a()},i,e),r(()=>{})):"none"!==t.style.display?y(t,()=>{r(()=>{o()})},i,e):r(()=>{})};r.includes("immediate")?s(e=>e(),()=>{}):(e.showDirectiveLastElement&&!e.showDirectiveLastElement.contains(t)&&e.executeAndClearRemainingShowDirectiveStack(),e.showDirectiveStack.push(s),e.showDirectiveLastElement=t)}(this,e,c,s,t);break;case"if":if(r.some(e=>"for"===e.type))return;c=this.evaluateReturnExpression(e,l,n),function(e,t,n,r,i){a(t,"x-if");const o=t.nextElementSibling&&!0===t.nextElementSibling.__x_inserted_me;if(!n||o&&!t.__x_transition)!n&&o&&y(t.nextElementSibling,()=>{t.nextElementSibling.remove()},()=>{},e,r);else{const n=document.importNode(t.content,!0);t.parentElement.insertBefore(n,t.nextElementSibling),b(t.nextElementSibling,()=>{},()=>{},e,r),e.initializeElements(t.nextElementSibling,i),t.nextElementSibling.__x_inserted_me=!0}}(this,e,c,t,n);break;case"for":j(this,e,l,t,n);break;case"cloak":e.removeAttribute("x-cloak")}})}evaluateReturnExpression(e,t,r=(()=>{})){return c(t,this.$data,n(n({},r()),{},{$dispatch:this.getDispatchFunction(e)}))}evaluateCommandExpression(e,t,r=(()=>{})){return function(e,t,n={}){if("function"==typeof e)return Promise.resolve(e.call(t,n.$event));let r=Function;if(r=Object.getPrototypeOf((async function(){})).constructor,Object.keys(t).includes(e)){let r=new Function(["dataContext",...Object.keys(n)],`with(dataContext) { return ${e} }`)(t,...Object.values(n));return"function"==typeof r?Promise.resolve(r.call(t,n.$event)):Promise.resolve()}return Promise.resolve(new r(["dataContext",...Object.keys(n)],`with(dataContext) { ${e} }`)(t,...Object.values(n)))}(t,this.$data,n(n({},r()),{},{$dispatch:this.getDispatchFunction(e)}))}getDispatchFunction(e){return(t,n={})=>{e.dispatchEvent(new CustomEvent(t,{detail:n,bubbles:!0}))}}listenForNewElementsToInitialize(){const e=this.$el;new MutationObserver(e=>{for(let t=0;t<e.length;t++){const n=e[t].target.closest("[x-data]");if(n&&n.isSameNode(this.$el)){if("attributes"===e[t].type&&"x-data"===e[t].attributeName){const n=c(e[t].target.getAttribute("x-data")||"{}",{$el:this.$el});Object.keys(n).forEach(e=>{this.$data[e]!==n[e]&&(this.$data[e]=n[e])})}e[t].addedNodes.length>0&&e[t].addedNodes.forEach(e=>{1!==e.nodeType||e.__x_inserted_me||(!e.matches("[x-data]")||e.__x?this.initializeElements(e):e.__x=new de(e))})}}}).observe(e,{childList:!0,attributes:!0,subtree:!0})}getRefsProxy(){var e=this;return new Proxy({},{get(t,n){return"$isAlpineProxy"===n||(e.walkAndSkipNestedComponents(e.$el,e=>{e.hasAttribute("x-ref")&&e.getAttribute("x-ref")===n&&(r=e)}),r);var r}})}}const pe={version:"2.7.3",pauseMutationObserver:!1,magicProperties:{},onComponentInitializeds:[],onBeforeComponentInitializeds:[],ignoreFocusedForValueBinding:!1,start:async function(){i()||await new Promise(e=>{"loading"==document.readyState?document.addEventListener("DOMContentLoaded",e):e()}),this.discoverComponents(e=>{this.initializeComponent(e)}),document.addEventListener("turbolinks:load",()=>{this.discoverUninitializedComponents(e=>{this.initializeComponent(e)})}),this.listenForNewUninitializedComponentsAtRunTime()},discoverComponents:function(e){document.querySelectorAll("[x-data]").forEach(t=>{e(t)})},discoverUninitializedComponents:function(e,t=null){const n=(t||document).querySelectorAll("[x-data]");Array.from(n).filter(e=>void 0===e.__x).forEach(t=>{e(t)})},listenForNewUninitializedComponentsAtRunTime:function(){const e=document.querySelector("body");new MutationObserver(e=>{if(!this.pauseMutationObserver)for(let t=0;t<e.length;t++)e[t].addedNodes.length>0&&e[t].addedNodes.forEach(e=>{1===e.nodeType&&(e.parentElement&&e.parentElement.closest("[x-data]")||this.discoverUninitializedComponents(e=>{this.initializeComponent(e)},e.parentElement))})}).observe(e,{childList:!0,attributes:!0,subtree:!0})},initializeComponent:function(e){if(!e.__x)try{e.__x=new de(e)}catch(e){setTimeout(()=>{throw e},0)}},clone:function(e,t){t.__x||(t.__x=new de(t,e))},addMagicProperty:function(e,t){this.magicProperties[e]=t},onComponentInitialized:function(e){this.onComponentInitializeds.push(e)},onBeforeComponentInitialized:function(e){this.onBeforeComponentInitializeds.push(e)}};return i()||(window.Alpine=pe,window.deferLoadingAlpine?window.deferLoadingAlpine((function(){window.Alpine.start()})):window.Alpine.start()),pe}()},function(e,t,n){"use strict";n.d(t,"a",(function(){return o})),n.d(t,"b",(function(){return a}));var r=n(7),i=n.n(r);function o(e){return new Promise((function(t,n){void 0===i()(navigator.clipboard)||void 0===i()(navigator.clipboard.writeText)?n("Could not find a valid clipboard library."):t(navigator.clipboard.writeText(e))}))}function a(e){return new Promise((function(t,n){("object"!==i()(e)||"string"!=typeof e.innerText&&"string"!=typeof e.value)&&n("Target is not a valid HTML node.");var r="";"string"==typeof e.value?r=e.value:"string"==typeof e.innerText?r=e.innerText:n("Could not find valid text to copy"),t(o(r))}))}},,function(e,t){e.exports=function(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}},,,function(e,t,n){var r=n(12);e.exports=function(e,t){if(e){if("string"==typeof e)return r(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?r(e,t):void 0}}},,,,,,,,function(e,t,n){var r=n(44),i=n(45),o=n(15),a=n(46);e.exports=function(e,t){return r(e)||i(e,t)||o(e,t)||a()}},,,,,,,,,,,,,,,,,,,,function(e,t,n){"use strict";n.r(t);var r=n(23),i=n.n(r),o=n(1),a=n.n(o),s=n(2),l=n.n(s),c=n(5),u=n.n(c),f=(n(9),n(4)),d=n(0),p=n(6),h=n(3),m=n(10),b=n(8);function y(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function v(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?y(Object(n),!0).forEach((function(t){u()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):y(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}t.default=function(){return{campaign:"",inputUrl:"",baseAuthority:"",pageUrlLabel:"",affiliateId:0,referralFormatValue:"",prettyAffiliateUrls:!1,referralVar:"",bypassUrlAuthority:!1,isLoading:!0,defaultCopyMessage:Object(f.__)("Copy link","affiliatewp-affiliate-portal"),defaultErrorMessage:Object(f.__)("Invalid URL","affiliatewp-affiliate-portal"),get urls(){return AFFWP.portal.core.store.get("urlGeneratorUrls",{})},set urls(e){AFFWP.portal.core.store.set("urlGeneratorUrls",v(v({},this.urls),e))},generateUrl:function(e){if(!1===this.getUrlObject(e))return"";var t=this.inputUrl,n={};this.campaign.length>0&&(n.campaign=this.campaign),!0===this.prettyAffiliateUrls?t=Object(b.a)(t,"".concat(this.referralVar,"/").concat(this.referralFormatValue)):n[this.referralVar]=this.referralFormatValue,t=encodeURI(Object(d.safeDecodeURI)(t));var r=Object(d.addQueryArgs)(t,n),i=this.urls;return i[e]=this.urlObject({url:r}),this.urls=i,this.getUrlParam(e,"url")},getUrlObject:function(e){return void 0!==this.urls[e]&&this.urls[e]},getUrlParam:function(e,t){var n=this.getUrlObject(e);return!1===n||void 0===n[t]?"":n[t]},setCopy:function(e){var t=this;return l()(a.a.mark((function n(){var r;return a.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:if(!1!==(r=t.getUrlObject(e))){n.next=3;break}return n.abrupt("return");case 3:return n.prev=3,n.next=6,Object(m.a)(r.url);case 6:r.copyMessage="🎉 ".concat(Object(f.__)("Copied!","affiliatewp-affiliate-portal")),n.next=12;break;case 9:n.prev=9,n.t0=n.catch(3),r.copyMessage=Object(f.__)("Could not copy to clipboard","affiliatewp-affiliate-portal");case 12:return n.next=14,Object(h.a)(2e3);case 14:r.copyMessage=r.defaultCopyMessage;case 15:case"end":return n.stop()}}),n,null,[[3,9]])})))()},init:function(){var e=this;return l()(a.a.mark((function t(){var n,r,o,s;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,Promise.all([Object(p.portalAffiliate)(),Object(p.portalSettings)()]);case 2:n=t.sent,r=i()(n,2),o=r[0],s=r[1],e.baseAuthority=Object(d.getAuthority)(o.base_url),e.inputUrl=o.base_url,e.affiliateId=o.affiliate_id,e.prettyAffiliateUrls=s.pretty_affiliate_urls,e.referralFormatValue=s.referral_format_value,e.referralVar=s.referral_var,e.bypassUrlAuthority=s.bypass_url_authority,e.pageUrlLabel=Object(f.__)("Enter any valid page URL from ".concat(o.base_url),"affiliatewp-affiliate-portal"),e.urls={generated:e.urlObject({url:o.base_url}),referral:e.urlObject({url:e.getUrlParam("generated","url")})},Object.keys(e.urls).forEach((function(t){e.generateUrl(t)})),e.isLoading=!1;case 17:case"end":return t.stop()}}),t)})))()},urlObject:function(e){var t=v(v({},{defaultCopyMessage:this.defaultCopyMessage,defaultErrorMessage:this.defaultErrorMessage,url:""}),e);return Object(b.e)(t.url)&&(Object(b.b)(t.url,this.baseAuthority)||!0===this.bypassUrlAuthority)?(t.copyMessage=t.defaultCopyMessage,t.isError=!1):(t.copyMessage=t.defaultErrorMessage,t.isError=!0),t}}}},function(e,t){e.exports=function(e){if(Array.isArray(e))return e}},function(e,t){e.exports=function(e,t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e)){var n=[],r=!0,i=!1,o=void 0;try{for(var a,s=e[Symbol.iterator]();!(r=(a=s.next()).done)&&(n.push(a.value),!t||n.length!==t);r=!0);}catch(e){i=!0,o=e}finally{try{r||null==s.return||s.return()}finally{if(i)throw o}}return n}}},function(e,t){e.exports=function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}}]);