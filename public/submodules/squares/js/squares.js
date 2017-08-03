!function (t, e, n, i) {
    function s(e, n) {
        this.host = t(e),
            this.id = Math.floor(9999 * Math.random()) + 1,
            this.settings = t.extend(!0, {}, y),
            this.contentRoot = i,
            this.root = i,
            this.Window = i,
            this.ix = 0,
            this.iy = 0,
            this.iex = 0,
            this.iey = 0,
            this.shouldStartDraggingContainer = !1,
            this.didStartDraggingContainer = !1,
            this.draggingContainer = !1,
            this.draggedContainerIndex = 0,
            this.draggedContainer = i,
            this.dummyContainer = i,
            this.containerReorderMap = i,
            this.newIndexOfDraggedContainer = 0,
            this.shouldStartDraggingElement = !1,
            this.didStartDraggingElement = !1,
            this.draggingElement = !1,
            this.draggedElementIndex = -1,
            this.draggedElementContainerIndex = -1,
            this.elementDragMap = i,
            this.dummyElement = i,
            this.newIndexOfDraggedElement = -1,
            this.draggedElementWidth = -1,
            this.selectedElementID = i,
            this.loadSettings(n),
            this.init()
    }
    function a() {
        this.id = "sq-container-" + Math.floor(99999 * Math.random()) + 1,
            this.settings = t.extend(!0, {}, q)
    }
    function o(e, n) {
        this.id = "sq-element-" + Math.floor(99999 * Math.random()) + 1,
            this.settings = t.extend(!0, {}, x, e),
            this.defaults = new Array,
            this.controls = new Array,
            this.content = this.settings.content,
            this.fontStyles = "",
            this.init(n)
    }
    function d() {
        this.root = i,
            this.id = Math.floor(1e4 * Math.random()) + 1,
            this.visible = !1,
            this.shouldStartDragging = !1,
            this.didStartDragging = !1,
            this.dragging = !1,
            this.iex = 0,
            this.iey = 0,
            this.ix = 0,
            this.iy = 0,
            this.init(),
            this.events(),
            this.show(600, 100)
    }
    function r(t, e, n, s, a, o) {
        this.id = Math.floor(9999 * Math.random()) + 1,
            this.elementID = "sq-control-" + this.id,
            this.elementClass = "sq-element-option-group",
            this.type = t.type,
            this.getValue = t.getValue,
            this.setValue = t.setValue,
            this.HTML = t.HTML,
            this.name = e,
            this.options = a,
            this.group = n,
            this.tabGroup = s,
            this._value = i,
            this.group !== i && (this.elementClass = "sq-element-option-group-" + this.group.toLowerCase().replace(/\s/g, "-")),
            this.init = t.init,
            this.init(),
            this.valueUpdated = o,
            this.customLabel = t.customLabel
    }
    function l(t) {
        var e = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(t);
        return e ? {
            r: parseInt(e[1], 16),
            g: parseInt(e[2], 16),
            b: parseInt(e[3], 16)
        } : null
    }
    function g(t, e) {
        var n = {};
        for (var i in e)
            "object" == typeof e[i] ? (t[i] || (t[i] = {}),
                n[i] = g(t[i], e[i])) : e[i] != t[i] && (n[i] = t[i]);
        return n
    }
    function h(t) {
        var e = i;
        if ("object" == typeof t)
            if (m(t))
                e = i;
            else
                for (var n in t) {
                    var s = h(t[n]);
                    s !== i && (e === i && (e = {}),
                        e[n] = s)
                }
        else
            e = t;
        return e
    }
    function m(t) {
        for (var e in t)
            if (t.hasOwnProperty(e))
                return !1;
        return JSON.stringify(t) === JSON.stringify({})
    }
    function c(t) {
        var e = 8.33333333
            , n = e * t;
        return n + "%"
    }
    function f(t) {
        return !isNaN(parseFloat(t)) && isFinite(t)
    }
    var u = i
        , p = new Array
        , v = new Array
        , w = new Array;
    t.squaresInitWithSettings = function (t, e) {
        if (t.data.editor)
            for (var n = 0; n < w.length; n++)
                w[n].id == t.data.editor.id && w.splice(n, 1);
        var i = new s(t, e);
        w.push(i)
    }
        ,
        t.squaresGetCurrentSettings = function (t) {
            return t.data.editor.getCompressedSettings()
        }
        ,
        t.squaresGenerateHTML = function (t) {
            return t.data.editor.generateHTML()
        }
        ,
        t.squaresRegisterElement = function (t) {
            p.push(t)
        }
        ,
        t.squaresRegisterControl = function (t) {
            v.push(t)
        }
        ,
        t.squaresShowEditorWindow = function (t, e) {
            u.show(t, e)
        }
        ,
        t.squaresHideEditorWindow = function () {
            u.hide()
        }
        ,
        t.squaresExtendElementDefaults = function (e) {
            x = t.extend(!0, {}, x, e)
        }
        ,
        t(n).ready(function () {
            t(".squares").each(function () {
                var e = new s(this);
                w.push(e),
                    t(this).data.editor = e
            })
        });
    var y = {
        containers: []
    };
    s.prototype.loadSettings = function (t) {
        if (t && t.containers)
            for (var e = 0; e < t.containers.length; e++) {
                var n = t.containers[e]
                    , i = this.appendContainer();
                if (n.settings)
                    for (var s = 0; s < n.settings.elements.length; s++)
                        for (var a = n.settings.elements[s], o = 0; o < p.length; o++)
                            a.settings.name == p[o].name && i.insertElement(o, s, a.options)
            }
    }
        ,
        s.prototype.init = function () {
            this.host.data.editor = this,
                this.host.html(""),
                this.host.append('<div class="sq-root-container"></div>'),
                this.root = this.host.find(".sq-root-container"),
                this.host.find(".sq-root-container").append('<div class="sq-content"></div>'),
                this.contentRoot = this.host.find(".sq-content"),
                this.contentRoot.attr("id", "sq-editor-" + this.id),
                this.addUI(),
                this.addEvents(),
                this.redraw(),
                u = new d,
                u.hide()
        }
        ,
        s.prototype.redraw = function () {
            this.contentRoot.html("");
            for (var e = 0; e < this.settings.containers.length; e++) {
                var n = this.settings.containers[e]
                    , i = '<div class="sq-container" data-index="' + e + '" id="' + n.id + '"></div>';
                this.contentRoot.append(i);
                var s = t("#" + n.id);
                n.render(),
                    n.appendEditorControls();
                for (var a = 0; a < n.settings.elements.length; a++) {
                    var o = n.settings.elements[a]
                        , i = '<div class="sq-element" data-index="' + a + '" id="' + o.id + '"></div>';
                    s.append(i),
                        o.render(),
                        o.appendEditorControls()
                }
                s.append('<div class="squares-clear"></div>')
            }
            0 == this.settings.containers.length ? this.root.find(".sq-add-elements").hide() : this.root.find(".sq-add-elements").show(),
                this.selectedElementID && this.selectElement(this.selectedElementID)
        }
        ,
        s.prototype.addEvents = function () {
            var e = this;
            this.host.find(".sq-add-container").off("click"),
                this.host.find(".sq-add-container").on("click", function () {
                    e.appendContainer(),
                        e.redraw()
                }),
                t(n).off("mouseout", "#sq-editor-" + this.id + " .sq-container"),
                t(n).on("mouseout", "#sq-editor-" + this.id + " .sq-container", function (e) {
                    0 != t(e.target).closest(".sq-container-confirm-delete").length || t(e.target).hasClass("sq-container-confirm-delete") || 0 != t(e.target).closest(".sq-container-delete").length || t(e.target).hasClass("sq-container-delete") || t(".sq-container-confirm-delete").hide()
                }),
                t(n).off("click", "#sq-editor-" + this.id + " .sq-container-delete"),
                t(n).on("click", "#sq-editor-" + this.id + " .sq-container-delete", function () {
                    t(this).siblings(".sq-container-confirm-delete").show()
                }),
                t(n).off("click", "#sq-editor-" + this.id + " .sq-container-confirm-delete"),
                t(n).on("click", "#sq-editor-" + this.id + " .sq-container-confirm-delete", function () {
                    e.deleteContainer(t(this).data("container-id")),
                        e.redraw()
                }),
                t(n).off("mousedown", "#sq-editor-" + e.id + " .sq-container-move"),
                t(n).on("mousedown", "#sq-editor-" + e.id + " .sq-container-move", function (n) {
                    e.settings.containers.length <= 1 || (e.iex = n.pageX,
                        e.iey = n.pageY,
                        e.shouldStartDraggingContainer = !0,
                        e.draggedContainerIndex = t(n.target).closest(".sq-container").data("index"),
                        e.draggedContainer = e.host.find(".sq-container[data-index=" + e.draggedContainerIndex + "]"))
                }),
                t(n).off("mousedown", "#sq-editor-" + e.id + " .sq-element"),
                t(n).on("mousedown", "#sq-editor-" + e.id + " .sq-element", function (n) {
                    1 == e.settings.containers.length && 1 == e.settings.containers[0].settings.elements.length || (e.iex = n.pageX,
                        e.iey = n.pageY,
                        e.shouldStartDraggingElement = !0,
                        e.draggedElement = t(this),
                        e.draggedElementIndex = t(this).data("index"),
                        e.draggedElementContainerIndex = t(this).closest(".sq-container").data("index"))
                }),
                t(n).off("mousemove." + e.id),
                t(n).on("mousemove." + e.id, function (t) {
                    e.shouldStartDraggingContainer && !e.didStartDraggingContainer && e.startDraggingContainer(t),
                        e.draggingContainer && e.dragContainer(t),
                        e.shouldStartDraggingElement && !e.didStartDraggingElement && e.startDraggingElement(t),
                        e.draggingElement && e.dragElement(t)
                }),
                t(n).off("mouseup." + e.id),
                t(n).on("mouseup." + e.id, function (t) {
                    e.draggingContainer && e.endDraggingContainer(t),
                        e.draggingElement && e.endDraggingElement(t),
                        e.shouldStartDraggingContainer = !1,
                        e.didStartDraggingContainer = !1,
                        e.draggingContainer = !1,
                        e.draggedContainerIndex = 0,
                        e.draggedContainer = i,
                        e.dummyContainer = i,
                        e.shouldStartDraggingElement = !1,
                        e.didStartDraggingElement = !1,
                        e.draggingElement = !1,
                        e.draggedElementIndex = -1,
                        e.draggedElementContainerIndex = -1
                }),
                t(n).off("click." + this.id, "#sq-delete-element-button"),
                t(n).on("click." + this.id, "#sq-delete-element-button", function () {
                    for (var n = t(this).data("element-id"), i = 0; i < e.settings.containers.length; i++)
                        for (var s = e.settings.containers[i], a = 0; a < s.settings.elements.length; a++)
                            s.settings.elements[a].id == n && (s.removeElementAtIndex(a),
                                e.redraw())
                })
        }
        ,
        s.prototype.startDraggingContainer = function (e) {
            if (Math.abs(e.pageX - this.iex) > 5 || Math.abs(e.pageY - this.iey) > 5) {
                this.draggingContainer = !0,
                    this.didStartDraggingContainer = !0,
                    this.containerReorderMap = new Array;
                for (var n = this.draggedContainer.outerHeight() / 2, i = 0; i < this.settings.containers.length; i++) {
                    for (var s = n, a = i - 1; a >= 0; a--) {
                        var o = a;
                        a >= this.draggedContainerIndex && o++;
                        var d = this.host.find(".sq-container[data-index=" + o + "]");
                        s += d.outerHeight()
                    }
                    this.containerReorderMap.push(s)
                }
                this.ix = this.draggedContainer.position().left,
                    this.iy = this.draggedContainer.position().top,
                    this.draggedContainer.css({
                        position: "absolute",
                        left: this.ix,
                        top: this.iy,
                        width: this.draggedContainer.width()
                    }),
                    this.draggedContainer.addClass("sq-dragging"),
                    this.draggedContainer.after('<div id="sq-dummy-container"></div>'),
                    this.dummyContainer = t("#sq-dummy-container"),
                    this.dummyContainer.css({
                        width: this.draggedContainer.outerWidth(),
                        height: this.draggedContainer.outerHeight()
                    })
            }
        }
        ,
        s.prototype.dragContainer = function (e) {
            this.draggedContainer.css({
                left: this.ix + e.pageX - this.iex,
                top: this.iy + e.pageY - this.iey
            });
            for (var n = this.draggedContainer.position().top + this.draggedContainer.outerHeight() / 2, s = 999999, a = i, o = 0; o < this.containerReorderMap.length; o++)
                Math.abs(n - this.containerReorderMap[o]) < s && (s = Math.abs(n - this.containerReorderMap[o]),
                    a = o);
            a != this.newIndexOfDraggedContainer && (this.newIndexOfDraggedContainer = a,
                this.dummyContainer.remove(),
                this.newIndexOfDraggedContainer < this.draggedContainerIndex ? this.host.find(".sq-container[data-index=" + this.newIndexOfDraggedContainer + "]").before('<div id="sq-dummy-container"></div>') : this.host.find(".sq-container[data-index=" + this.newIndexOfDraggedContainer + "]").after('<div id="sq-dummy-container"></div>'),
                this.dummyContainer = t("#sq-dummy-container"),
                this.dummyContainer.css({
                    width: this.draggedContainer.outerWidth(),
                    height: this.draggedContainer.outerHeight()
                }))
        }
        ,
        s.prototype.endDraggingContainer = function (t) {
            if (this.draggedContainerIndex != this.newIndexOfDraggedContainer) {
                var e = this.settings.containers[this.draggedContainerIndex];
                this.settings.containers.splice(this.draggedContainerIndex, 1),
                    this.settings.containers.splice(this.newIndexOfDraggedContainer, 0, e)
            }
            this.redraw()
        }
        ,
        s.prototype.startDraggingElement = function (e) {
            if (Math.abs(e.pageX - this.iex) > 5 || Math.abs(e.pageY - this.iey) > 5) {
                this.draggingElement = !0,
                    this.didStartDraggingElement = !0,
                    this.ix = this.draggedElement.offset().left,
                    this.iy = this.draggedElement.offset().top,
                    this.elementDragMap = new Array;
                var n = this.settings.containers[this.draggedElementContainerIndex].settings.elements[this.draggedElementIndex];
                this.draggedElementWidth = c(n.controls.layout.column_span.getVal()),
                    this.draggedElementWidth = this.draggedElement.outerWidth();
                var i = '<div id="sq-dummy-element-tmp" style="width: ' + this.draggedElementWidth + "px; height: " + this.draggedElement.outerHeight() + 'px;"></div>';
                this.draggedElement.hide();
                for (var s = 0; s < this.settings.containers.length; s++) {
                    var a = this.settings.containers[s];
                    if (0 == a.settings.elements.length) {
                        this.host.find(".sq-container[data-index=" + s + "]").append(i);
                        var o = t("#sq-dummy-element-tmp");
                        this.elementDragMap.push({
                            x: o.offset().left + o.width() / 2,
                            y: o.offset().top + o.height() / 2,
                            containerIndex: s,
                            elementIndex: 0
                        }),
                            t("#sq-dummy-element-tmp").remove()
                    }
                    for (var d = 0; d < a.settings.elements.length; d++) {
                        this.host.find(".sq-container[data-index=" + s + "]").find(".sq-element[data-index=" + d + "]").before(i);
                        var o = t("#sq-dummy-element-tmp");
                        if (this.elementDragMap.push({
                            x: o.offset().left + o.width() / 2,
                            y: o.offset().top + o.height() / 2,
                            containerIndex: s,
                            elementIndex: d
                        }),
                            t("#sq-dummy-element-tmp").remove(),
                            d == a.settings.elements.length - 1) {
                            this.host.find(".sq-container[data-index=" + s + "]").find(".sq-element[data-index=" + d + "]").after(i);
                            var o = t("#sq-dummy-element-tmp");
                            this.elementDragMap.push({
                                x: o.offset().left + o.width() / 2,
                                y: o.offset().top + o.height() / 2,
                                containerIndex: s,
                                elementIndex: d + 1
                            }),
                                t("#sq-dummy-element-tmp").remove()
                        }
                    }
                }
                this.draggedElement.show(),
                    this.draggedElement.after('<div id="sq-dummy-element"><div id="sq-dummy-element-inner"></div></div>'),
                    this.dummyElement = t("#sq-dummy-element"),
                    this.dummyElement.css({
                        width: this.draggedElementWidth,
                        height: this.draggedElement.outerHeight(),
                        margin: this.draggedElement.css("margin"),
                        padding: 0
                    });
                var r = this.draggedElement.width()
                    , l = this.draggedElement.height()
                    , g = this.draggedElement.clone().attr("id", "sq-dragged-element").wrap("<div>").parent().html();
                this.draggedElement.hide(),
                    t("body").prepend(g),
                    this.draggedElement = t("#sq-dragged-element"),
                    this.draggedElement.css({
                        position: "absolute",
                        left: this.ix,
                        top: this.iy,
                        width: r,
                        height: l
                    }),
                    this.draggedElement.addClass("sq-dragging")
            }
        }
        ,
        s.prototype.dragElement = function (e) {
            this.draggedElement.css({
                left: this.ix + e.pageX - this.iex,
                top: this.iy + e.pageY - this.iey
            });
            for (var n = 0, i = 999999, s = 0; s < this.elementDragMap.length; s++) {
                var a = Math.abs(e.pageX - this.elementDragMap[s].x) + Math.abs(e.pageY - this.elementDragMap[s].y);
                a < i && (i = a,
                    n = s)
            }
            if (n != this.newIndexOfDraggedElement) {
                this.newIndexOfDraggedElement = n,
                    t("#sq-dummy-element").remove();
                var o = this.elementDragMap[this.newIndexOfDraggedElement].containerIndex
                    , d = this.elementDragMap[this.newIndexOfDraggedElement].elementIndex
                    , r = this.host.find(".sq-container[data-index=" + o + "]");
                if (0 == this.settings.containers[o].settings.elements.length)
                    r.prepend('<div id="sq-dummy-element"><div id="sq-dummy-element-inner"></div></div>');
                else if (d == this.settings.containers[o].settings.elements.length) {
                    var l = this.settings.containers[o].settings.elements.length - 1
                        , g = r.find(".sq-element[data-index=" + l + "]");
                    g.after('<div id="sq-dummy-element"><div id="sq-dummy-element-inner"></div></div>')
                } else {
                    var g = r.find(".sq-element[data-index=" + d + "]");
                    g.before('<div id="sq-dummy-element"><div id="sq-dummy-element-inner"></div></div>')
                }
                this.dummyElement = t("#sq-dummy-element"),
                    this.dummyElement.css({
                        width: this.draggedElementWidth,
                        height: this.draggedElement.outerHeight(),
                        margin: this.draggedElement.css("margin")
                    })
            }
        }
        ,
        s.prototype.endDraggingElement = function (t) {
            this.draggedElement.remove();
            var e = this.elementDragMap[this.newIndexOfDraggedElement].containerIndex
                , n = this.elementDragMap[this.newIndexOfDraggedElement].elementIndex
                , i = this.draggedElementIndex
                , s = this.draggedElementContainerIndex
                , a = this.settings.containers[s].settings.elements[i];
            this.settings.containers[s].settings.elements.splice(i, 1),
                this.settings.containers[e].settings.elements.splice(n, 0, a),
                this.redraw()
        }
        ,
        s.prototype.addUI = function () {
            this.appendAddContainerButton(),
                this.appendAddElementsButton()
        }
        ,
        s.prototype.appendAddContainerButton = function () {
            var t = '<div class="sq-add-container"><i class="fa fa-plus"></i> <span>Alan Ekle</span></div>';
            this.root.append(t)
        }
        ,
        s.prototype.appendAddElementsButton = function () {
            var t = '<div class="sq-add-elements"><i class="fa fa-cube"></i></div>';
            this.root.append(t)
        }
        ,
        s.prototype.appendContainer = function () {
            var t = new a;
            return this.settings.containers.push(t),
                t
        }
        ,
        s.prototype.deleteContainer = function (t) {
            for (var e = 0, n = 0; n < this.settings.containers.length; n++)
                this.settings.containers[n].id == t && (e = n);
            this.settings.containers.splice(e, 1)
        }
        ,
        s.prototype.addElement = function (t, e, n, i) {
            var s = this;
            s.settings.containers[t].insertElement(n, e, i),
                s.redraw()
        }
        ,
        s.prototype.getCompressedSettings = function () {
            for (var e = t.extend(!0, {}, this.settings), n = 0; n < e.containers.length; n++) {
                for (var i = {
                    id: e.containers[n].id,
                    settings: t.extend(!0, {}, e.containers[n].settings)
                }, s = 0; s < i.settings.elements.length; s++) {
                    var a = t.extend(!0, {}, i.settings.elements[s]);
                    a.settings = g(a.settings, x),
                        a.settings = h(a.settings);
                    var o = a.getCurrentOptions();
                    o = g(o, a.defaults),
                        o = h(o),
                        i.settings.elements[s] = {
                            settings: a.settings,
                            options: o
                        }
                }
                e.containers[n] = i
            }
            return e
        }
        ,
        s.prototype.generateHTML = function () {
            for (var t = "", e = 0; e < this.settings.containers.length; e++) {
                var n = this.settings.containers[e];
                t += n.generateHTML()
            }
            return t = t.replace(/\\(.)/gm, "$1"),
                t = t.replace(/\n/gm, "<br>")
        }
        ,
        s.prototype.selectElement = function (e) {
            this.selectedElementID = e,
                t(".sq-element-selected").removeClass("sq-element-selected"),
                t("#" + this.selectedElementID).addClass("sq-element-selected")
        }
        ;
    var q = {
        elements: []
    };
    a.prototype.insertElement = function (t, e, n) {
        var i = new o(p[t], n);
        this.settings.elements.splice(e, 0, i)
    }
        ,
        a.prototype.removeElementAtIndex = function (t) {
            this.settings.elements.splice(t, 1),
                u.openFirstTab(),
                u.removeElementSettings()
        }
        ,
        a.prototype.render = function () { }
        ,
        a.prototype.appendEditorControls = function () {
            var e = "";
            e += '     <div class="sq-container-move"></div>',
                e += '     <div class="sq-container-delete"><i class="fa fa-times" aria-hidden="true"></i></div>',
                e += '     <div class="sq-container-confirm-delete" data-container-id="' + this.id + '">Sil</div>',
                t("#" + this.id).append(e)
        }
        ,
        a.prototype.generateHTML = function () {
            var t = "";
            t += '<div class="squares-container">';
            for (var e = 0; e < this.settings.elements.length; e++) {
                var n = this.settings.elements[e];
                t += n.generateHTML()
            }
            return t += '<div class="squares-clear"></div>',
                t += "</div>"
        }
        ;
    var x = {
        name: "Untitled Element",
        iconClass: "fa fa-cube",
        controls: [],
        defaultControls: {
            layout: {
                box_model: {
                    name: "Kutu Modeli",
                    type: "box model",
                    default: {
                        margin: {
                            top: 0,
                            bottom: 0,
                            left: 0,
                            right: 0
                        },
                        padding: {
                            top: 10,
                            bottom: 10,
                            left: 10,
                            right: 10
                        }
                    }
                },
                use_grid: {
                    name: "Izgara Sistemi Kullan",
                    type: "switch",
                    default: 1
                },
                column_span: {
                    name: "Izgara Ayarları",
                    type: "grid system",
                    group: "Layout Grid",
                    default: {
                        xs: {
                            use: 0,
                            class: "sq-col-xs-12",
                            visible: 0
                        },
                        sm: {
                            use: 0,
                            class: "sq-col-sm-12",
                            visible: 0
                        },
                        md: {
                            use: 0,
                            class: "sq-col-md-12",
                            visible: 1
                        },
                        lg: {
                            use: 1,
                            class: "sq-col-lg-12",
                            visible: 1
                        }
                    }
                },
                width: {
                    name: "Width",
                    type: "int",
                    group: "Layout Manual",
                    default: "100"
                },
                auto_width: {
                    name: "Auto Width",
                    type: "switch",
                    group: "Layout Manual",
                    default: 1
                },
                height: {
                    name: "Height",
                    type: "int",
                    group: "Layout Manual",
                    default: "100"
                },
                auto_height: {
                    name: "Auto Height",
                    type: "switch",
                    group: "Layout Manual",
                    default: 1
                }
            },
            style: {
                background_color: {
                    name: "Background Color",
                    type: "color",
                    default: "#ffffff"
                },
                background_opacity: {
                    name: "Background Opacity",
                    type: "slider",
                    options: {
                        min: 0,
                        max: 1
                    },
                    default: "0"
                },
                opacity: {
                    name: "Opacity",
                    type: "slider",
                    options: {
                        min: 0,
                        max: 1
                    },
                    default: "1"
                },
                box_shadow: {
                    name: "Box Shadow",
                    type: "text",
                    default: "none"
                },
                border_width: {
                    name: "Border Width",
                    type: "slider",
                    options: {
                        min: 0,
                        max: 20,
                        type: "int"
                    },
                    default: "0"
                },
                border_style: {
                    name: "Border Style",
                    type: "select",
                    options: ["none", "hidden", "dotted", "dashed", "solid", "double", "groove", "ridge", "inset", "outset"],
                    default: "none"
                },
                border_color: {
                    name: "Border Color",
                    type: "color",
                    default: "#000000"
                },
                border_opacity: {
                    name: "Border Opacity",
                    type: "slider",
                    options: {
                        min: 0,
                        max: 1
                    },
                    default: "1"
                },
                border_radius: {
                    name: "Border Radius",
                    type: "slider",
                    options: {
                        min: 0,
                        max: 100,
                        type: "int"
                    },
                    default: "0"
                }
            },
            font: {
                font_family: {
                    name: "Font Family",
                    type: "text",
                    default: "sans-serif"
                },
                font_size: {
                    name: "Font Size",
                    type: "text",
                    format: "int",
                    default: "14"
                },
                font_weight: {
                    name: "Font Weight",
                    type: "text",
                    default: "normal"
                },
                font_style: {
                    name: "Font Stili",
                    type: "select",
                    options: ["normal", "italik", "eğik", "initial", "olduğu gibi"],
                    default: "normal"
                },
                line_height: {
                    name: "Satır Yüksekliği",
                    type: "text",
                    format: "int",
                    default: "22"
                },
                text_color: {
                    name: "Metin Rengi",
                    type: "color",
                    default: "#000000"
                },
                text_align: {
                    name: "Metin Hizalama",
                    type: "select",
                    options: ["sola dayalı", "sağa dayalı", "ortalı", "justify", "justify-all", "start", "end", "match-parent", "inherit", "initial", "unset"],
                    default: "left"
                },
                text_decoration: {
                    name: "Metin Dekoru",
                    type: "select",
                    options: ["yok", "altı çizili"],
                    default: "none"
                },
                text_transform: {
                    name: "Metin Düzeni",
                    type: "select",
                    options: ["yok", "büyük harfli", "hepsi büyük", "hepsi küçük", "baş harfi", "olduğu gibi"],
                    default: "none"
                },
                text_shadow: {
                    name: "Metin Gölgesi",
                    type: "text",
                    default: ""
                }
            },
            general: {
                id: {
                    name: "ID",
                    type: "text",
                    default: ""
                },
                classes: {
                    name: "Classes",
                    type: "text",
                    default: ""
                },
                css: {
                    name: "CSS",
                    type: "text",
                    default: ""
                }
            }
        },
        defaultControlGroupIcons: {
            general: "fa fa-wrench",
            layout: "fa fa-th-large",
            font: "fa fa-font",
            style: "fa fa-paint-brush"
        },
        content: function () {
            return ""
        }
    };
    o.prototype.init = function (e) {
        this.settings.controls = t.extend(!0, {}, this.settings.controls, this.settings.defaultControls),
            this.settings.controlGroupIcons = t.extend(!0, {}, this.settings.controlGroupIcons, this.settings.defaultControlGroupIcons),
            this.settings.useStyleControls === !1 && (this.settings.controls.style = i),
            this.settings.useFontControls === !1 && (this.settings.controls.font = i);
        for (var n in this.settings.controls)
            if (this.settings.controls.hasOwnProperty(n)) {
                var s = this.settings.controls[n];
                this.defaults[n] || (this.defaults[n] = {});
                for (var a in s)
                    if (s.hasOwnProperty(a)) {
                        var o = s[a];
                        this.defaults[n][a] = o.default
                    }
            }
        for (var n in this.settings.controls)
            if (this.settings.controls.hasOwnProperty(n)) {
                var s = this.settings.controls[n];
                for (var a in s)
                    if (s.hasOwnProperty(a)) {
                        for (var o = s[a], d = i, l = 0; l < v.length; l++)
                            v[l].type == o.type && (d = v[l]);
                        var g = o.default;
                        e !== i && e[n] !== i && e[n][a] !== i && (g = "object" == typeof e[n][a] ? t.extend(!0, {}, o.default, e[n][a]) : e[n][a]),
                            this.controls[n] === i && (this.controls[n] = {});
                        var h = this;
                        this.controls[n][a] = new r(d, o.name, o.group, n, o.options, function () {
                            h.updateForm(),
                                h.render(),
                                h.appendEditorControls()
                        }
                        ),
                            this.controls[n][a].setVal(g)
                    }
            }
    }
        ,
        o.prototype.getSettingsForm = function () {
            var t = "";
            t += '<div id="sq-window-settings-sidebar">';
            var e = 0;
            for (var n in this.controls) {
                var i = '<i class="fa fa-toggle-on" aria-hidden="true"></i>';
                this.settings.controlGroupIcons[n] && (i = '<i class="' + this.settings.controlGroupIcons[n] + '" aria-hidden="true"></i>'),
                    t += '<div class="sq-window-settings-sidebar-button" data-tab-index="' + e + '" data-tab-group="sq-element-settings-tab-group" data-tab-button>',
                    t += '   <div class="sq-window-settings-sidebar-button-icon">' + i + "</div>",
                    t += '   <div class="sq-window-settings-sidebar-button-title">' + n + "</div>",
                    t += "</div>",
                    e++
            }
            t += '<div class="sq-window-settings-sidebar-button" data-tab-index="' + e + '" data-tab-group="sq-element-settings-tab-group" data-tab-button>',
                t += '   <div class="sq-window-settings-sidebar-button-icon"><i class="fa fa-trash-o" aria-hidden="true"></i></div>',
                t += '   <div class="sq-window-settings-sidebar-button-title">Sil</div>',
                t += "</div>",
                t += "</div>",
                t += '<div class="sq-settings-window-content-wrap">';
            var e = 0;
            for (var n in this.controls) {
                t += '<div class="sq-window-content" data-tab-content data-tab-index="' + e + '" data-tab-group="sq-element-settings-tab-group">';
                var s = this.controls[n];
                e++;
                for (var a in s) {
                    var o = s[a];
                    t += '<div class="sq-form-control ' + o.elementClass + '">',
                        o.customLabel ? t += o.HTML() : (t += '<label for="' + o.elementID + '">' + o.name + "</label>",
                            t += o.HTML()),
                        t += "</div>"
                }
                t += "</div>"
            }
            return t += '<div class="sq-window-content" data-tab-content data-tab-index="' + e + '" data-tab-group="sq-element-settings-tab-group">',
                t += '   <div class="sq-form-control">',
                t += "       <p>Elemanı sil!</p>",
                t += '       <div id="sq-delete-element-button" data-element-id="' + this.id + '">Sil</div>',
                t += "   </div>",
                t += "</div>",
                t += "</div>"
        }
        ,
        o.prototype.loadOptions = function () {
            for (var t in this.controls) {
                var e = this.controls[t];
                for (var n in e) {
                    var i = e[n];
                    i.loadVal()
                }
            }
            this.updateForm()
        }
        ,
        o.prototype.updateForm = function () {
            1 == this.controls.layout.use_grid.getVal() ? (t("." + this.controls.layout.width.elementClass).hide(),
                t("." + this.controls.layout.column_span.elementClass).show()) : (t("." + this.controls.layout.width.elementClass).show(),
                    t("." + this.controls.layout.column_span.elementClass).hide())
        }
        ,
        o.prototype.generateStyles = function () {
            var t = ""
                , e = this.controls.layout;
            f(e.box_model.getVal().margin.top) && (t += "margin-top: " + e.box_model.getVal().margin.top + "px; "),
                f(e.box_model.getVal().margin.bottom) && (t += "margin-bottom: " + e.box_model.getVal().margin.bottom + "px; "),
                f(e.box_model.getVal().margin.left) && (t += "margin-left: " + e.box_model.getVal().margin.left + "px; "),
                f(e.box_model.getVal().margin.right) && (t += "margin-right: " + e.box_model.getVal().margin.right + "px; "),
                f(e.box_model.getVal().padding.top) && (t += "padding-top: " + e.box_model.getVal().padding.top + "px; "),
                f(e.box_model.getVal().padding.bottom) && (t += "padding-bottom: " + e.box_model.getVal().padding.bottom + "px; "),
                f(e.box_model.getVal().padding.left) && (t += "padding-left: " + e.box_model.getVal().padding.left + "px; "),
                f(e.box_model.getVal().padding.right) && (t += "padding-right: " + e.box_model.getVal().padding.right + "px; "),
                1 == parseInt(e.use_grid.getVal(), 10) || (1 == parseInt(e.auto_width.getVal(), 10) ? t += "width: auto; " : "" === e.width.getVal() || isNaN(e.width.getVal()) || (t += "width: " + e.width.getVal() + "px; "),
                    1 == parseInt(e.auto_height.getVal(), 10) ? t += "height: auto; " : "" === e.height.getVal() || isNaN(e.height.getVal()) || (t += "height: " + e.height.getVal() + "px; ")),
                t += "float: left; ";
            var e = this.controls.font;
            e && ("" !== e.font_family.getVal() && (t += "font-family: " + e.font_family.getVal() + "; ",
                this.fontStyles += "font-family: " + e.font_family.getVal() + "; "),
                f(e.font_size.getVal()) && (t += "font-size: " + e.font_size.getVal() + "px; ",
                    this.fontStyles += "font-size: " + e.font_size.getVal() + "px; "),
                "" !== e.font_weight.getVal() && (t += "font-weight: " + e.font_weight.getVal() + "; ",
                    this.fontStyles += "font-weight: " + e.font_weight.getVal() + "; "),
                "" !== e.font_style.getVal() && (t += "font-style: " + e.font_style.getVal() + "; ",
                    this.fontStyles += "font-style: " + e.font_style.getVal() + "; "),
                f(e.line_height.getVal()) && (t += "line-height: " + e.line_height.getVal() + "px; ",
                    this.fontStyles += "line-height: " + e.line_height.getVal() + "px; "),
                "" !== e.text_color.getVal() && (t += "color: " + e.text_color.getVal() + "; ",
                    this.fontStyles += "color: " + e.text_color.getVal() + "; "),
                "" !== e.text_align.getVal() && (t += "text-align: " + e.text_align.getVal() + "; ",
                    this.fontStyles += "text-align: " + e.text_align.getVal() + "; "),
                "" !== e.text_decoration.getVal() && (t += "text-decoration: " + e.text_decoration.getVal() + "; ",
                    this.fontStyles += "text-decoration: " + e.text_decoration.getVal() + "; "),
                "" !== e.text_transform.getVal() && (t += "text-transform: " + e.text_transform.getVal() + "; ",
                    this.fontStyles += "text-transform: " + e.text_transform.getVal() + "; "),
                "" !== e.text_shadow.getVal() && (t += "text-shadow: " + e.text_shadow.getVal() + "; ",
                    this.fontStyles += "text-shadow: " + e.text_shadow.getVal() + "; "));
            var e = this.controls.style;
            if (e) {
                var n = l(e.background_color.getVal());
                t += "background-color: rgba(" + n.r + ", " + n.g + ", " + n.b + ", " + e.background_opacity.getVal() + "); ",
                    f(e.opacity.getVal()) && (t += "opacity: " + e.opacity.getVal() + "; "),
                    "" !== e.box_shadow.getVal() && (t += "box-shadow: " + e.box_shadow.getVal() + "; "),
                    f(e.border_width.getVal()) && (t += "border-width: " + e.border_width.getVal() + "px; "),
                    "" !== e.border_style.getVal() && (t += "border-style: " + e.border_style.getVal() + "; ");
                var n = l(e.border_color.getVal());
                t += "border-color: rgba(" + n.r + ", " + n.g + ", " + n.b + ", " + e.border_opacity.getVal() + "); ",
                    f(e.border_radius.getVal()) && (t += "border-radius: " + e.border_radius.getVal() + "px; ")
            }
            return t
        }
        ,
        o.prototype.generateLayoutClass = function () {
            var t = this.controls.layout;
            if (1 == parseInt(t.use_grid.getVal(), 10)) {
                var e = ""
                    , n = t.column_span.getVal();
                return 1 == parseInt(n.xs.use, 10) && (e += n.xs.class + " ",
                    0 == parseInt(n.xs.visible, 10) && (e += "sq-hidden-xs ")),
                    1 == parseInt(n.sm.use, 10) && (e += n.sm.class + " ",
                        0 == parseInt(n.sm.visible, 10) && (e += "sq-hidden-sm ")),
                    1 == parseInt(n.md.use, 10) && (e += n.md.class + " ",
                        0 == parseInt(n.md.visible, 10) && (e += "sq-hidden-md ")),
                    1 == parseInt(n.lg.use, 10) && (e += n.lg.class + " ",
                        0 == parseInt(n.lg.visible, 10) && (e += "sq-hidden-lg ")),
                    e
            }
            return ""
        }
        ,
        o.prototype.render = function () {
            var e = !1;
            t("#" + this.id).hasClass("sq-element-selected") && (e = !0),
                t("#" + this.id).attr("style", this.generateStyles()),
                t("#" + this.id).attr("class", "sq-element " + this.generateLayoutClass()),
                t("#" + this.id).html(this.content()),
                e && t("#" + this.id).addClass("sq-element-selected")
        }
        ,
        o.prototype.appendEditorControls = function () {
            var e = "";
            e += '     <div class="sq-element-controls">',
                e += '         <div class="sq-element-control-drag"></div>',
                e += "     </div>",
                t("#" + this.id).append(e)
        }
        ,
        o.prototype.getCurrentOptions = function () {
            var t = {};
            for (var e in this.controls)
                for (var n in this.controls[e]) {
                    var i = this.controls[e][n];
                    t[e] || (t[e] = {}),
                        t[e][n] = i.getVal()
                }
            return t
        }
        ,
        o.prototype.generateHTML = function () {
            var t = "";
            return t += '<div id="' + this.id + '" class="squares-element ' + this.generateLayoutClass() + '" style="' + this.generateStyles() + '">',
                t += this.content(),
                t += "</div>"
        }
        ,
        d.prototype.init = function () {
            var e = "";
            e += ' <div class="sq-window" id="sq-window-' + this.id + '">',
                e += '     <div class="sq-window-header">',
                e += '         <div class="sq-window-main-nav">',
                e += '             <div id="sq-window-main-nav-button-elements" class="sq-window-main-nav-button" data-tab-group="sq-window-main-tab-group" data-tab-index="0" data-tab-button><i class="fa fa-cube" aria-hidden="true"></i></div>',
                e += '             <div id="sq-window-main-nav-button-settings" class="sq-window-main-nav-button" data-tab-group="sq-window-main-tab-group" data-tab-index="1" data-tab-button><i class="fa fa-cog" aria-hidden="true"></i></div>',
                e += "         </div>",
                e += '         <div class="sq-window-close"><i class="fa fa-times"></i></div>',
                e += "     </div>",
                e += '     <div class="sq-window-container">',
                e += '         <div class="sq-window-tab-content" data-tab-group="sq-window-main-tab-group" data-tab-index="0" data-tab-content id="sq-window-elements-tab-content">',
                e += '             <div class="sq-window-main-tab-header">',
                e += "                 <h1>Elemanlar</h1>",
                e += '                 <div id="sq-window-elements-search">',
                e += '                     <i class="fa fa-search" aria-hidden="true"></i>',
                e += '                     <input type="text" id="sq-window-elements-search-input">',
                e += "                 </div>",
                e += "             </div>",
                e += '             <div class="sq-window-content">',
                e += '                 <div id="sq-no-elements-found">No elements found.</div>';
            for (var n = 0; n < p.length; n++)
                e += '             <div class="sq-element-thumb" data-index="' + n + '">',
                    e += '                 <div class="sq-element-thumb-icon">',
                    e += '                     <i class="' + p[n].iconClass + '"></i>',
                    e += "                 </div>",
                    e += '                 <div class="sq-element-thumb-title">',
                    e += "                     <h2>" + p[n].name + "</h2>",
                    e += "                 </div>",
                    e += "             </div>";
            e += '                 <div class="squares-clear"></div>',
                e += "             </div>",
                e += "         </div>",
                e += '         <div class="sq-window-tab-content" data-tab-group="sq-window-main-tab-group" data-tab-index="1" data-tab-content id="sq-window-settings-tab-content">',
                e += '             <div class="sq-window-main-tab-header"><h1>Ayarlar</h1></div>',
                e += '             <div id="sq-window-settings-tab-inner-content"></div>',
                e += "         </div>",
                e += "     </div>",
                e += " </div>",
                0 == t(".sq-windows-root").length && t("body").prepend('<div class="sq-windows-root"></div>'),
                t(".sq-windows-root").html(e),
                this.root = t("#sq-window-" + this.id),
                this.openFirstTab(),
                this.removeElementSettings()
        }
        ,
        d.prototype.events = function () {
            var e = this;
            t(n).on("keyup", "#sq-window-elements-search-input", function () {
                var e = t(this).val().toLowerCase()
                    , n = !1;
                t(".sq-element-thumb").each(function () {
                    var i = t(this).find("h2").html();
                    i.toLowerCase().indexOf(e) >= 0 ? (n = !0,
                        t(this).show()) : t(this).hide()
                }),
                    n ? t("#sq-no-elements-found").hide() : t("#sq-no-elements-found").show()
            }),
                t(n).on("click", ".sq-element", function () {
                    if (!e.visible) {
                        var n = t(this).offset().left + t(this).closest(".sq-root-container").width() + 40
                            , i = t(this).offset().top;
                        e.show(n, i)
                    }
                    var s = t(this).closest(".sq-root-container").data.editor
                        , a = t(this).closest(".sq-container").data("index")
                        , o = t(this).data("index")
                        , d = s.settings.containers[a].settings.elements[o];
                    t("#sq-window-elements-tab-content").hide(),
                        t("#sq-window-settings-tab-content").show(),
                        t(".sq-window-main-nav-button").removeClass("active"),
                        t("#sq-window-main-nav-button-settings").addClass("active"),
                        t("#sq-window-settings-tab-inner-content").html(d.getSettingsForm()),
                        d.loadOptions(),
                        t('[data-tab-content][data-tab-group="sq-element-settings-tab-group"]').hide(),
                        t('[data-tab-content][data-tab-group="sq-element-settings-tab-group"][data-tab-index="0"]').show(),
                        t('[data-tab-button][data-tab-group="sq-element-settings-tab-group"]').removeClass("active").first().addClass("active"),
                        s.selectElement(d.id)
                }),
                t(n).on("click", ".sq-add-elements", function () {
                    if (!e.visible) {
                        var n = t(this).closest(".sq-root-container").offset().left + t(this).closest(".sq-root-container").width() + 40
                            , i = t(this).closest(".sq-root-container").offset().top;
                        e.show(n + 20, i + 20)
                    }
                    t("#sq-window-elements-tab-content").show(),
                        t("#sq-window-settings-tab-content").hide(),
                        t(".sq-window-main-nav-button").removeClass("active"),
                        t("#sq-window-main-nav-button-elements").addClass("active")
                }),
                t(n).on("click", "[data-tab-button]", function () {
                    var e = t(this).data("tab-index")
                        , n = t(this).data("tab-group");
                    t('[data-tab-button][data-tab-group="' + n + '"]').removeClass("active"),
                        t(this).addClass("active"),
                        t('[data-tab-content][data-tab-group="' + n + '"]').hide(),
                        t('[data-tab-content][data-tab-group="' + n + '"][data-tab-index="' + e + '"]').show()
                }),
                e.root.find(".sq-window-close").on("click", function (t) {
                    e.hide()
                }),
                e.root.find(".sq-window-header").off("mousedown"),
                e.root.find(".sq-window-header").on("mousedown", function (n) {
                    t(n.target).hasClass("sq-window-close") || t(n.target).closest(".sq-window-close").length > 0 || (e.shouldStartDragging = !0,
                        e.iex = n.pageX,
                        e.iey = n.pageY,
                        t(".sq-window-active").removeClass("sq-window-active"),
                        e.root.addClass("sq-window-active"))
                }),
                t(n).on("mousemove." + e.id, function (t) {
                    e.shouldStartDragging && !e.didStartDragging && (Math.abs(t.pageX - e.iex) > 5 || Math.abs(t.pageY - e.iey) > 5) && (e.ix = e.root.offset().left,
                        e.iy = e.root.offset().top,
                        e.dragging = !0,
                        e.didStartDragging = !0),
                        e.dragging && e.root.css({
                            left: e.ix + t.pageX - e.iex,
                            top: e.iy + t.pageY - e.iey
                        })
                }),
                t(n).on("mouseup." + e.id, function (t) {
                    e.shouldStartDragging = !1,
                        e.didStartDragging = !1,
                        e.dragging = !1
                });
            var s = !1
                , a = !1
                , o = !1
                , d = -1
                , r = -1
                , l = i
                , g = i
                , h = i
                , m = 0
                , c = 0
                , f = 0
                , u = 0;
            t(n).off("mousedown", ".sq-element-thumb"),
                t(n).on("mousedown", ".sq-element-thumb", function (e) {
                    s = !0,
                        m = e.pageX,
                        c = e.pageY,
                        l = t(this)
                }),
                t(n).off("mousemove.elementFromWindow"),
                t(n).on("mousemove.elementFromWindow", function (e) {
                    if (s && !a && (Math.abs(e.pageX - m) > 5 || Math.abs(e.pageY - c) > 5)) {
                        a = !0,
                            r = l.data("index");
                        var n = l.html();
                        f = l.offset().left,
                            u = l.offset().top,
                            t("body").prepend('<div id="sq-dragged-element-clone" class="sq-element-thumb">' + n + "</div>"),
                            g = t("#sq-dragged-element-clone"),
                            g.css({
                                left: f,
                                top: u,
                                margin: 0
                            }),
                            h = new Array;
                        for (var i = 0; i < w.length; i++)
                            for (var p = w[i], v = 0; v < p.settings.containers.length; v++) {
                                var y = p.host.find(".sq-container[data-index=" + v + "]");
                                if (0 == p.settings.containers[v].settings.elements.length) {
                                    y.append('<div id="sq-dummy-element-dragging-from-window-tmp"></div>');
                                    var q = t("#sq-dummy-element-dragging-from-window-tmp").offset().left + t("#sq-dummy-element-dragging-from-window-tmp").outerWidth() / 2
                                        , x = t("#sq-dummy-element-dragging-from-window-tmp").offset().top + t("#sq-dummy-element-dragging-from-window-tmp").outerHeight() / 2;
                                    h.push({
                                        x: q,
                                        y: x,
                                        elementIndex: 0,
                                        containerIndex: v,
                                        editorIndex: i
                                    }),
                                        t("#sq-dummy-element-dragging-from-window-tmp").remove()
                                }
                                for (var b = 0; b < p.settings.containers[v].settings.elements.length; b++) {
                                    var C = y.find(".sq-element[data-index=" + b + "]");
                                    C.before('<div id="sq-dummy-element-dragging-from-window-tmp"></div>');
                                    var q = t("#sq-dummy-element-dragging-from-window-tmp").offset().left + t("#sq-dummy-element-dragging-from-window-tmp").outerWidth() / 2
                                        , x = t("#sq-dummy-element-dragging-from-window-tmp").offset().top + t("#sq-dummy-element-dragging-from-window-tmp").outerHeight() / 2;
                                    if (h.push({
                                        x: q,
                                        y: x,
                                        elementIndex: b,
                                        containerIndex: v,
                                        editorIndex: i
                                    }),
                                        t("#sq-dummy-element-dragging-from-window-tmp").remove(),
                                        b == p.settings.containers[v].settings.elements.length - 1) {
                                        C.after('<div id="sq-dummy-element-dragging-from-window-tmp"></div>');
                                        var q = t("#sq-dummy-element-dragging-from-window-tmp").offset().left + t("#sq-dummy-element-dragging-from-window-tmp").outerWidth() / 2
                                            , x = t("#sq-dummy-element-dragging-from-window-tmp").offset().top + t("#sq-dummy-element-dragging-from-window-tmp").outerHeight() / 2;
                                        h.push({
                                            x: q,
                                            y: x,
                                            elementIndex: b + 1,
                                            containerIndex: v,
                                            editorIndex: i
                                        }),
                                            t("#sq-dummy-element-dragging-from-window-tmp").remove()
                                    }
                                }
                            }
                        0 == h.length && (g.remove(),
                            a = !1,
                            s = !1,
                            a = !1,
                            o = !1,
                            d = -1)
                    }
                    if (a) {
                        g.css({
                            left: f + e.pageX - m,
                            top: u + e.pageY - c
                        });
                        for (var E = 0, _ = 999999, v = 0; v < h.length; v++) {
                            var I = Math.abs(e.pageX - h[v].x) + Math.abs(e.pageY - h[v].y);
                            I < _ && (_ = I,
                                E = v)
                        }
                        if (E != d) {
                            d = E,
                                t("#sq-dummy-element-dragging-from-window").remove();
                            var V = h[d].containerIndex
                                , D = h[d].elementIndex
                                , S = h[d].editorIndex
                                , y = w[S].host.find(".sq-container[data-index=" + V + "]");
                            if (0 == w[S].settings.containers[V].settings.elements.length)
                                y.prepend('<div id="sq-dummy-element-dragging-from-window"><div id="sq-dummy-element-dragging-from-window-inner"></div></div>');
                            else if (D == w[S].settings.containers[V].settings.elements.length) {
                                var M = w[S].settings.containers[V].settings.elements.length - 1
                                    , e = y.find(".sq-element[data-index=" + M + "]");
                                e.after('<div id="sq-dummy-element-dragging-from-window"><div id="sq-dummy-element-dragging-from-window-inner"></div></div>')
                            } else {
                                var e = y.find(".sq-element[data-index=" + D + "]");
                                e.before('<div id="sq-dummy-element-dragging-from-window"><div id="sq-dummy-element-dragging-from-window-inner"></div></div>')
                            }
                        }
                    }
                }),
                t(n).off("mouseup.elementFromWindow"),
                t(n).on("mouseup.elementFromWindow", function () {
                    if (a) {
                        g.remove();
                        var t = h[d].containerIndex
                            , e = h[d].elementIndex
                            , n = h[d].editorIndex;
                        w[n].addElement(t, e, r)
                    }
                    s = !1,
                        a = !1,
                        o = !1,
                        d = -1
                })
        }
        ,
        d.prototype.show = function (t, e) {
            this.visible = !0,
                this.root.show(),
                t !== i && e !== i && this.root.css({
                    left: t,
                    top: e
                })
        }
        ,
        d.prototype.hide = function () {
            this.visible = !1,
                this.root.hide()
        }
        ,
        d.prototype.openFirstTab = function () {
            t(".sq-window-main-nav-button").removeClass("active"),
                t("#sq-window-main-nav-button-elements").addClass("active"),
                t('[data-tab-content][data-tab-group="sq-window-main-tab-group"]').hide(),
                t('[data-tab-content][data-tab-group="sq-window-main-tab-group"][data-tab-index="0"]').show()
        }
        ,
        d.prototype.removeElementSettings = function () {
            t("#sq-window-settings-tab-inner-content").html('<div id="sq-window-settings-tab-no-element">Hiçbir eleman seçilmedi. Elemanlar kısmından bir elemanı alan içine sürükleyin.</div>')
        }
        ,
        r.prototype.getVal = function () {
            return this._value
        }
        ,
        r.prototype.setVal = function (t) {
            this._value = t;
            try {
                this.setValue(t)
            } catch (t) { }
        }
        ,
        r.prototype.loadVal = function (t) {
            this.setValue(this._value)
        }
        ,
        r.prototype.valueChanged = function () {
            this._value = this.getValue(),
                this.valueUpdated()
        }
}(jQuery, window, document);