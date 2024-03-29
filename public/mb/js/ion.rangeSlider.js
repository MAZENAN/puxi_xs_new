﻿(function(c, ea, aa, M) {
	var ba = 0,
	r, N = function() {
		var c = M.userAgent,
		a = /msie\s\d+/i;
		return 0 < c.search(a) && (c = a.exec(c).toString(), c = c.split(" ")[1], 9 > c) ? !0 : !1
	} (),
	X = "ontouchstart" in aa || 0 < M.msMaxTouchPoints,
	O = function(c) {
		"number" !== typeof c && (c = parseFloat(c));
		return isNaN(c) ? null: c
	},
	H = {
		init: function(fa) {
			return this.each(function() {
				var a = c.extend({
					min: null,
					max: null,
					from: null,
					to: null,
					type: "single",
					step: null,
					prefix: "",
					postfix: "",
					maxPostfix: "",
					hasGrid: !1,
					gridMargin: 0,
					hideMinMax: !1,
					hideFromTo: !1,
					prettify: !0,
					disable: !1,
					values: null,
					onLoad: null,
					onChange: null,
					onFinish: null
				},
				fa),
				e = c(this),
				l = this,
				I = !1,
				g = null;
				if (!e.data("isActive")) {
					e.data("isActive", !0);
					this.plugin_count = ba += 1;
					e.prop("value") && (g = e.prop("value").split(";"));
					"single" === a.type ? g && 1 < g.length ? ("number" !== typeof a.min ? a.min = parseFloat(g[0]) : "number" !== typeof a.from && (a.from = parseFloat(g[0])), "number" !== typeof a.max && (a.max = parseFloat(g[1]))) : g && 1 === g.length && "number" !== typeof a.from && (a.from = parseFloat(g[0])) : "double" === a.type && (g && 1 < g.length ? ("number" !== typeof a.min ? a.min = parseFloat(g[0]) : "number" !== typeof a.from && (a.from = parseFloat(g[0])), "number" !== typeof a.max ? a.max = parseFloat(g[1]) : "number" !== typeof a.to && (a.to = parseFloat(g[1]))) : g && 1 === g.length && ("number" !== typeof a.min ? a.min = parseFloat(g[0]) : "number" !== typeof a.from && (a.from = parseFloat(g[0]))));
					"number" === typeof e.data("min") && (a.min = parseFloat(e.data("min")));
					"number" === typeof e.data("max") && (a.max = parseFloat(e.data("max")));
					"number" === typeof e.data("from") && (a.from = parseFloat(e.data("from")));
					"number" === typeof e.data("to") && (a.to = parseFloat(e.data("to")));
					e.data("step") && (a.step = parseFloat(e.data("step")));
					e.data("type") && (a.type = e.data("type"));
					e.data("prefix") && (a.prefix = e.data("prefix"));
					e.data("postfix") && (a.postfix = e.data("postfix"));
					e.data("maxpostfix") && (a.maxPostfix = e.data("maxpostfix"));
					e.data("hasgrid") && (a.hasGrid = e.data("hasgrid"));
					e.data("gridmargin") && (a.gridMargin = +e.data("gridmargin"));
					e.data("hideminmax") && (a.hideMinMax = e.data("hideminmax"));
					e.data("hidefromto") && (a.hideFromTo = e.data("hidefromto"));
					e.data("prettify") && (a.prettify = e.data("prettify"));
					e.data("disable") && (a.disable = e.data("disable"));
					e.data("values") && (a.values = e.data("values").split(","));
					a.min = O(a.min);
					a.min || 0 === a.min || (a.min = 10);
					a.max = O(a.max);
					a.max || 0 === a.max || (a.max = 100);
					"[object Array]" !== Object.prototype.toString.call(a.values) && (a.values = null);
					a.values && 0 < a.values.length && (a.min = 0, a.max = a.values.length - 1, a.step = 1, I = !0);
					a.from = O(a.from);
					a.from || 0 === a.from || (a.from = a.min);
					a.to = O(a.to);
					a.to || 0 === a.to || (a.to = a.max);
					a.step = O(a.step);
					a.step || (a.step = 1);
					a.from < a.min && (a.from = a.min);
					a.from > a.max && (a.from = a.min);
					a.to < a.min && (a.to = a.max);
					a.to > a.max && (a.to = a.max);
					"double" === a.type && (a.from > a.to && (a.from = a.to), a.to < a.from && (a.to = a.from));
					var z = function(b) {
						b = b.toString();
						a.prettify && (b = b.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1 "));
						return b
					},
					g = '<span class="irs" id="irs-' + this.plugin_count + '"></span>';
					e[0].style.display = "none";
					e.before(g);
					var n = e.prev(),
					C = c(ea.body),
					P = c(aa),
					p,
					D,
					E,
					A,
					B,
					w,
					x,
					m,
					s,
					q,
					H,
					Y,
					v = !1,
					y = !1,
					J = !0,
					f = {},
					U = 0,
					Q = 0,
					R = 0,
					t = 0,
					F = 0,
					G = 0,
					V = 0,
					S = 0,
					T = 0,
					Z = 0,
					u = 0;
					parseInt(a.step, 10) !== parseFloat(a.step) && (u = a.step.toString().split(".")[1], u = Math.pow(10, u.length));
					this.updateData = function(b) {
						c.extend(a, b);
						n.find("*").off();
						P.off("mouseup.irs" + l.plugin_count);
						C.off("mouseup.irs" + l.plugin_count);
						C.off("mouseleave.irs" + l.plugin_count);
						C.off("mousemove.irs" + l.plugin_count);
						n.html("");
						M()
					};
					
					this.removeSlider = function() {
						n.find("*").off();
						P.off("mouseup.irs" + l.plugin_count);
						C.off("mouseup.irs" + l.plugin_count);
						C.off("mouseleave.irs" + l.plugin_count);
						C.off("mousemove.irs" + l.plugin_count);
						n.html("").remove();
						e.data("isActive", !1);
						e.show()
					};
					var M = function() {
						n.html('<span class="irs"><span class="irs-line"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min">0</span><span class="irs-max">1</span><span class="irs-from">0</span><span class="irs-to">0</span><span class="irs-single">0</span></span><span class="irs-grid"></span>');
						p = n.find(".irs");
						D = p.find(".irs-min");
						E = p.find(".irs-max");
						A = p.find(".irs-from");
						B = p.find(".irs-to");
						w = p.find(".irs-single");
						
						a.hideFromTo && (A[0].style.visibility = "hidden", B[0].style.visibility = "hidden", w[0].style.visibility = "hidden");
						a.hideFromTo || (A[0].style.visibility = "visible", B[0].style.visibility = "visible", w[0].style.visibility = "visible");
						a.hideMinMax && (D[0].style.visibility = "hidden", E[0].style.visibility = "hidden", R = Q = 0);
						a.hideMinMax || (D[0].style.visibility = "visible", E[0].style.visibility = "visible", a.values ? (D.html(a.prefix + a.values[0] + a.postfix), E.html(a.prefix + a.values[a.values.length - 1] + a.maxPostfix + a.postfix)) : (D.html(a.prefix + z(a.min) + a.postfix), E.html(a.prefix + z(a.max) + a.maxPostfix + a.postfix)), Q = D.outerWidth(!1), R = E.outerWidth(!1));
						ga()
					},
					ga = function() {
						if ("single" === a.type) {
							if (p.append('<span class="irs-slider single"></span>'), x = p.find(".single"), x.on("mousedown",
							function(a) {
								a.preventDefault();
								a.stopPropagation();
								K(a, c(this), null);
								y = v = !0;
								r = l.plugin_count;
								N && c("*").prop("unselectable", !0)
							}), X) x.on("touchstart",
							function(a) {
								a.preventDefault();
								a.stopPropagation();
								K(a.originalEvent.touches[0], c(this), null);
								y = v = !0;
								r = l.plugin_count
							})
						} else "double" === a.type && (p.append('<span class="irs-diapason"></span><dd class="irs-slider from" ></dd><dd class="irs-slider to"></dd>'), m = p.find(".from"), s = p.find(".to"), H = p.find(".irs-diapason"), L(), m.on("mousedown",
						function(a) {
							a.preventDefault();
							a.stopPropagation();
							c(this).addClass("last");
							s.removeClass("last");
							K(a, c(this), "from");
							y = v = !0;
							r = l.plugin_count;
							N && c("*").prop("unselectable", !0)
						}), s.on("mousedown",
						function(a) {
							a.preventDefault();
							a.stopPropagation();
							c(this).addClass("last");
							m.removeClass("last");
							K(a, c(this), "to");
							y = v = !0;
							r = l.plugin_count;
							N && c("*").prop("unselectable", !0)
						}), X && (m.on("touchstart",
						function(a) {
							a.preventDefault();
							a.stopPropagation();
							c(this).addClass("last");
							s.removeClass("last");
							K(a.originalEvent.touches[0], c(this), "from");
							y = v = !0;
							r = l.plugin_count
						}), s.on("touchstart",
						function(a) {
							a.preventDefault();
							a.stopPropagation();
							c(this).addClass("last");
							m.removeClass("last");
							K(a.originalEvent.touches[0], c(this), "to");
							y = v = !0;
							r = l.plugin_count
						})), a.to === a.max && m.addClass("last"));
						var b = function() {
							r === l.plugin_count && v && (v = y = !1, q.removeAttr("id"), q = null, "double" === a.type && L(), $(), N && c("*").prop("unselectable", !1))
						};
						P.on("mouseup.irs" + l.plugin_count,
						function() {
							b()
						});
						if (N) C.on("mouseleave.irs" + l.plugin_count,
						function() {
							b()
						});
						C.on("mousemove.irs" + l.plugin_count,
						function(a) {
							v && (U = a.pageX, W())
						});
						n.on("mousedown",
						function() {
							r = l.plugin_count
						});
						n.on("mouseup",
						function(b) {
							if (r === l.plugin_count && !v && !a.disable) {
								b = b.pageX;
								J = !1;
								b -= n.offset().left;
								var h = f.fromX + (f.toX - f.fromX) / 2;
								S = 0;
								V = p.width() - G;
								T = p.width() - G;
								"single" === a.type ? (q = x, q.prop("id", "irs-active-slider"), W(b)) : "double" === a.type && (q = b <= h ? m: s, q.prop("id", "irs-active-slider"), W(b), L());
								q.removeAttr("id");
								q = null
							}
						});
						X && (P.on("touchend",
						function() {
							v && (v = y = !1, q.removeAttr("id"), q = null, "double" === a.type && L(), $())
						}), P.on("touchmove",
						function(a) {
							v && (U = a.originalEvent.touches[0].pageX, W())
						}));
						ca();
						ha();
						a.hasGrid && ia();
						a.disable ? (n.addClass("irs-disabled"), n.append('<span class="irs-disable-mask"></span>')) : (n.removeClass("irs-disabled"), n.find(".irs-disable-mask").remove())
					},
					ca = function() {
						t = p.width();
						G = x ? x.width() : m.width();
						F = t - G
					},
					K = function(b, d, h) {
						ca();
						J = !1;
						q = d;
						q.prop("id", "irs-active-slider");
						d = q.offset().left;
						Z = d + (b.pageX - d) - q.position().left;
						"single" === a.type ? V = p.width() - G: "double" === a.type && ("from" === h ? (S = 0, T = parseInt(s.css("left"), 10)) : (S = parseInt(m.css("left"), 10), T = p.width() - G))
					},
					L = function() {
						var a = m.width(),
						d = c.data(m[0], "x") || parseInt(m[0].style.left, 10) || m.position().left,
						h = (c.data(s[0], "x") || parseInt(s[0].style.left, 10) || s.position().left) - d;
						H[0].style.left = d + a / 2 + "px";
						H[0].style.width = h + "px"
					},
					W = function(b) {
						var d = U - Z,
						d = b ? b: U - Z;
						"single" === a.type ? (0 > d && (d = 0), d > V && (d = V)) : "double" === a.type && (d < S && (d = S), d > T && (d = T), L());
						c.data(q[0], "x", d);
						$();
						b = Math.round(d);
						q[0].style.left = b + "px"
					},
					$ = function() {
						var b = {
							input: e,
							slider: n,
							min: a.min,
							max: a.max,
							fromNumber: 0,
							toNumber: 0,
							fromPers: 0,
							toPers: 0,
							fromX: 0,
							fromX_pure: 0,
							toX: 0,
							toX_pure: 0
						},
						d = a.max - a.min,
						h;
						"single" === a.type ? (b.fromX = c.data(x[0], "x") || parseInt(x[0].style.left, 10) || x.position().left, b.fromPers = b.fromX / F * 100, h = d / 100 * b.fromPers + a.min, b.fromNumber = Math.round(h / a.step) * a.step, b.fromNumber < a.min && (b.fromNumber = a.min), b.fromNumber > a.max && (b.fromNumber = a.max), u && (b.fromNumber = parseInt(b.fromNumber * u, 10) / u), I && (b.fromValue = a.values[b.fromNumber])) : "double" === a.type && (b.fromX = c.data(m[0], "x") || parseInt(m[0].style.left, 10) || m.position().left, b.fromPers = b.fromX / F * 100, h = d / 100 * b.fromPers + a.min, b.fromNumber = Math.round(h / a.step) * a.step, b.fromNumber < a.min && (b.fromNumber = a.min), b.toX = c.data(s[0], "x") || parseInt(s[0].style.left, 10) || s.position().left, b.toPers = b.toX / F * 100, d = d / 100 * b.toPers + a.min, b.toNumber = Math.round(d / a.step) * a.step, b.toNumber > a.max && (b.toNumber = a.max), u && (b.fromNumber = parseInt(b.fromNumber * u, 10) / u, b.toNumber = parseInt(b.toNumber * u, 10) / u), I && (b.fromValue = a.values[b.fromNumber], b.toValue = a.values[b.toNumber]));
						f = b;
						da()
					},
					ha = function() {
						var b = {
							input: e,
							slider: n,
							min: a.min,
							max: a.max,
							fromNumber: a.from,
							toNumber: a.to,
							fromPers: 0,
							toPers: 0,
							fromX: 0,
							fromX_pure: 0,
							toX: 0,
							toX_pure: 0
						},
						d = a.max - a.min;
						"single" === a.type ? (b.fromPers = 0 !== d ? (b.fromNumber - a.min) / d * 100 : 0, b.fromX_pure = F / 100 * b.fromPers, b.fromX = Math.round(b.fromX_pure), x[0].style.left = b.fromX + "px", c.data(x[0], "x", b.fromX_pure)) : "double" === a.type && (b.fromPers = 0 !== d ? (b.fromNumber - a.min) / d * 100 : 0, b.fromX_pure = F / 100 * b.fromPers, b.fromX = Math.round(b.fromX_pure), m[0].style.left = b.fromX + "px", c.data(m[0], "x", b.fromX_pure), b.toPers = 0 !== d ? (b.toNumber - a.min) / d * 100 : 1, b.toX_pure = F / 100 * b.toPers, b.toX = Math.round(b.toX_pure), s[0].style.left = b.toX + "px", c.data(s[0], "x", b.toX_pure), L());
						f = b;
						da()
					},
					da = function() {
						var b, d, h, c, g, k;
						k = G / 2;
						h = "";
						"single" === a.type ? (h = f.fromNumber === a.max ? a.maxPostfix: "", A[0].style.display = "none", B[0].style.display = "none", h = I ? a.prefix + a.values[f.fromNumber] + h + a.postfix: a.prefix + z(f.fromNumber) + h + a.postfix, w.html(h), g = w.outerWidth(!1), k = f.fromX - g / 2 + k, 0 > k && (k = 0), k > t - g && (k = t - g), w[0].style.left = k + "px", a.hideMinMax || a.hideFromTo || (D[0].style.display = k < Q ? "none": "block", E[0].style.display = k + g > t - R ? "none": "block"), e.prop("value", parseFloat(f.fromNumber))) : "double" === a.type && (h = f.toNumber === a.max ? a.maxPostfix: "", I ? (b = a.prefix + a.values[f.fromNumber] + a.postfix, d = a.prefix + a.values[f.toNumber] + h + a.postfix, h = f.fromNumber !== f.toNumber ? a.prefix + a.values[f.fromNumber] + " \u2014 " + a.prefix + a.values[f.toNumber] + h + a.postfix: a.prefix + a.values[f.fromNumber] + h + a.postfix) : (b = a.prefix + z(f.fromNumber) + a.postfix, d = a.prefix + z(f.toNumber) + h + a.postfix, h = f.fromNumber !== f.toNumber ? a.prefix + z(f.fromNumber) + " \u2014 " + a.prefix + z(f.toNumber) + h + a.postfix: a.prefix + z(f.fromNumber) + h + a.postfix), A.html(b), B.html(d), w.html(h), b = A.outerWidth(!1), d = f.fromX - b / 2 + k, 0 > d && (d = 0), d > t - b && (d = t - b), A[0].style.left = d + "px", h = B.outerWidth(!1), c = f.toX - h / 2 + k, 0 > c && (c = 0), c > t - h && (c = t - h), B[0].style.left = c + "px", g = w.outerWidth(!1), k = f.fromX + (f.toX - f.fromX) / 2 - g / 2 + k, 0 > k && (k = 0), k > t - g && (k = t - g), w[0].style.left = k + "px", d + b < c ? (w[0].style.display = "none", A[0].style.display = "block", B[0].style.display = "block") : (w[0].style.display = "block", A[0].style.display = "none", B[0].style.display = "none"), a.hideMinMax || a.hideFromTo || (D[0].style.display = k < Q || d < Q ? "none": "block", E[0].style.display = k + g > t - R || c + h > t - R ? "none": "block"), e.prop("value", parseFloat(f.fromNumber) + ";" + parseFloat(f.toNumber)));
						a.from = f.fromNumber;
						a.to = f.toNumber;
						ja()
					},
					ja = function() {
						"function" !== typeof a.onFinish || y || J || a.onFinish.call(this, f);
						"function" !== typeof a.onChange || J || a.onChange.call(this, f);
						"function" === typeof a.onLoad && !y && J && (a.onLoad.call(this, f), J = !1)
					},
					ia = function() {
						n.addClass("irs-with-grid");
						var b, d = "",
						c = 0,
						c = 0,
						e = "",
						f = t - 2 * a.gridMargin;
						for (b = 0; 20 >= b; b += 1) c = Math.floor(f / 20 * b),
						c >= f && (c = f - 1),
						e += '<span class="irs-grid-pol small" style="left: ' + c + 'px;"></span>';
						for (b = 0; 4 >= b; b += 1) c = Math.floor(f / 4 * b),
						c >= f && (c = f - 1),
						e += '<span class="irs-grid-pol" style="left: ' + c + 'px;"></span>',
						u ? (d = a.min + (a.max - a.min) / 4 * b, d = d / a.step * a.step, d = parseInt(d * u, 10) / u) : (d = Math.round(a.min + (a.max - a.min) / 4 * b), d = Math.round(d / a.step) * a.step, d = z(d)),
						I && (a.hideMinMax ? (d = Math.round(a.min + (a.max - a.min) / 4 * b), d = Math.round(d / a.step) * a.step, d = 0 === b || 4 === b ? a.values[d] : "") : d = ""),
						0 === b ? e += '<span class="irs-grid-text" style="left: ' + c + 'px; text-align: left;">' + d + "</span>": 4 === b ? (c -= 100, e += '<span class="irs-grid-text" style="left: ' + c + 'px; text-align: right;">' + d + "</span>") : (c -= 50, e += '<span class="irs-grid-text" style="left: ' + c + 'px;">' + d + "</span>");
						Y.html(e);
						Y[0].style.left = a.gridMargin + "px"
					};
					M()
				}
			})
		},
		update: function(c) {
			return this.each(function() {
				this.updateData(c)
			})
		},
		remove: function() {
			return this.each(function() {
				this.removeSlider()
			})
		}
	};
	
	c.fn.ionRangeSlider = function(r) {
		if (H[r]) return H[r].apply(this, Array.prototype.slice.call(arguments, 1));
		if ("object" !== typeof r && r) c.error("Method " + r + " does not exist for jQuery.ionRangeSlider");
		else return H.init.apply(this, arguments)
	}
})(jQuery, document, window, navigator);