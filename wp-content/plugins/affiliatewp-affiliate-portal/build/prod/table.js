window.AFFWP=window.AFFWP||{},window.AFFWP.portal=window.AFFWP.portal||{},window.AFFWP.portal.table=function(t){var e={};function n(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)n.d(r,o,function(e){return t[e]}.bind(null,o));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=42)}({1:function(t,e){!function(){t.exports=this.regeneratorRuntime}()},2:function(t,e){function n(t,e,n,r,o,i,u){try{var c=t[i](u),a=c.value}catch(t){return void n(t)}c.done?e(a):Promise.resolve(a).then(r,o)}t.exports=function(t){return function(){var e=this,r=arguments;return new Promise((function(o,i){var u=t.apply(e,r);function c(t){n(u,o,i,c,a,"next",t)}function a(t){n(u,o,i,c,a,"throw",t)}c(void 0)}))}}},22:function(t,e){!function(){t.exports=this.AFFWP.portal.alpineTable}()},4:function(t,e){!function(){t.exports=this.wp.i18n}()},42:function(t,e,n){"use strict";n.r(e);var r=n(1),o=n.n(r),i=n(2),u=n.n(i),c=n(5),a=n.n(c),f=n(4),s=n(22),l=n.n(s),p=n(6);function b(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function d(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?b(Object(n),!0).forEach((function(e){a()(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):b(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}e.default=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},e=d(d({},l.a),t);return e.setupColumns=function(){var t=u()(o.a.mark((function t(e){var n,r;return o.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,Object(p.portalSchemaColumns)(this.type);case 2:n=t.sent,this.schema=n.columns,r=[n.columns.reduce((function(t,e,n){return t[e.id]=0===n?Object(f.__)("Loading...","affiliatewp-affiliate-portal"):"",t}),{})],!0===this.isLoading&&(this.rows=r);case 6:case"end":return t.stop()}}),t,this)})));return function(e){return t.apply(this,arguments)}}(),e}},5:function(t,e){t.exports=function(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}},6:function(t,e){!function(){t.exports=this.AFFWP.portal.sdk}()}});