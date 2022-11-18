!function($, wysi) {
    "use strict";

    var tpl = {
        "font-styles": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li class='dropdown'>" +
              "<a class='btn btn-default btn" + size + " dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true' href='#'>" +
              "<i class='glyphicon glyphicon-font'></i>&nbsp;<span class='current-font'>" + locale.font_styles.normal + "</span>&nbsp;<b class='caret'></b>" +
              "</a>" +
              "<ul class='dropdown-menu' data-popper-placement='bottom-start'>" +
                "<li><a class='dropdown-item' data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='div' tabindex='-1'>" + locale.font_styles.normal + "</a></li>" +
                "<li><a class='dropdown-item' data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h1' tabindex='-1'>" + locale.font_styles.h1 + "</a></li>" +
                "<li><a class='dropdown-item' data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h2' tabindex='-1'>" + locale.font_styles.h2 + "</a></li>" +
                "<li><a class='dropdown-item' data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h3' tabindex='-1'>" + locale.font_styles.h3 + "</a></li>" +
                "<li><a class='dropdown-item' data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h4'>" + locale.font_styles.h4 + "</a></li>" +
                "<li><a class='dropdown-item' data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h5'>" + locale.font_styles.h5 + "</a></li>" +
                "<li><a class='dropdown-item' data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h6'>" + locale.font_styles.h6 + "</a></li>" +
              "</ul>" +
            "</li>";
        },

        "emphasis": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='btn-group'>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='bold' title='CTRL+B' tabindex='-1'>" + locale.emphasis.bold + "</a>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='italic' title='CTRL+I' tabindex='-1'>" + locale.emphasis.italic + "</a>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='underline' title='CTRL+U' tabindex='-1'>" + locale.emphasis.underline + "</a>" +
              "</div>" +
            "</li>";
        },

        "lists": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='btn-group'>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='insertUnorderedList' title='" + locale.lists.unordered + "' tabindex='-1'><i class='glyphicon glyphicon-list'></i></a>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='insertOrderedList' title='" + locale.lists.ordered + "' tabindex='-1'><i class='glyphicon glyphicon-th-list'></i></a>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='Outdent' title='" + locale.lists.outdent + "' tabindex='-1'><i class='glyphicon glyphicon-indent-right'></i></a>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='Indent' title='" + locale.lists.indent + "' tabindex='-1'><i class='glyphicon glyphicon-indent-left'></i></a>" +
              "</div>" +
            "</li>";
        },

        "link": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml5-insert-link-modal modal fade'>" +
                "<div class='modal-dialog'>" +
                  "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                      "<h3 class='modal-title'>" + locale.link.insert + "</h3>" +
                      "<a class='close' data-bs-dismiss='modal' aria-label='Close'>&times;</a>" +
                    "</div>" +
                    "<div class='modal-body'>" +
                      "<input value='http://' class='bootstrap-wysihtml5-insert-link-url form-control'>" +
                      "<label class='checkbox' style='margin-top: 10px;'><input type='checkbox' class='bootstrap-wysihtml5-insert-link-target' checked> " + locale.link.target + "</label>" +
                    "</div>" +
                    "<div class='modal-footer'>" +
                      "<a href='#' class='btn btn-secondary' data-bs-dismiss='modal'>" + locale.link.cancel + "</a>" +
                      "<a href='#' class='btn btn-primary' data-dismiss='modal'>" + locale.link.insert + "</a>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</div>" +
              "<a class='btn btn-default" + size + "' data-wysihtml5-command='createLink' title='" + locale.link.insert + "' tabindex='-1'><i class='fa fa-external-link-square-alt'></i></a>" +
            "</li>";
        },

        "youtube": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml5-insert-youtube-modal modal fade'>" +
                "<div class='modal-dialog'>" +
                  "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                      "<h3 class='modal-title'>Incorporar Youtube</h3>" +
                      "<a class='close' data-bs-dismiss='modal' aria-label='Close'>&times;</a>" +
                    "</div>" +
                    "<div class='modal-body'>" +
                      "<input value='' placeholder='https://www.youtube.com/watch?v=PD-MdiUm1_Y' class='bootstrap-wysihtml5-insert-youtube-url form-control'>" +
                    "</div>" +
                    "<div class='modal-footer'>" +
                      "<a href='#' class='btn btn-secondary' data-bs-dismiss='modal'>" + locale.link.cancel + "</a>" +
                      "<a href='#' class='btn btn-primary' data-dismiss='modal'>Incorporar</a>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</div>" +
              "<a class='btn btn-default" + size + "' data-wysihtml5-command='createLinkYoutube' title='Incorporar Youtube' tabindex='-1'><i class='fa fa-brands fa-youtube'></i></a>" +
            "</li>";
        },

        "facebook": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml5-insert-facebook-modal modal fade'>" +
                "<div class='modal-dialog'>" +
                  "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                      "<h3 class='modal-title'>Incorporar VÍDEO do Facebook</h3>" +
                      "<a class='close' data-bs-dismiss='modal' aria-label='Close'>&times;</a>" +
                    "</div>" +
                    "<div class='modal-body'>" +
                      "<input value='' placeholder='Link do VÍDEO do Facebook' class='bootstrap-wysihtml5-insert-facebook-url form-control'>" +
                    "</div>" +
                    "<div class='modal-footer'>" +
                      "<a href='#' class='btn btn-secondary' data-bs-dismiss='modal'>" + locale.link.cancel + "</a>" +
                      "<a href='#' class='btn btn-primary' data-dismiss='modal'>Incorporar</a>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</div>" +
              "<a class='btn btn-default" + size + "' data-wysihtml5-command='createLinkFacebook' title='Incorporar Vídeo' tabindex='-1'><i class='fa fa-brands fa-facebook'></i></a>" +
            "</li>";
        },

        "anchor": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml5-insert-anchor-modal modal fade'>" +
                "<div class='modal-dialog'>" +
                  "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                      "<h3 class='modal-title'>Incorporar Anchor</h3>" +
                      "<a class='close' data-bs-dismiss='modal' aria-label='Close'>&times;</a>" +
                    "</div>" +
                    "<div class='modal-body'>" +
                      "<input value='' placeholder='Link completo Anchor' class='bootstrap-wysihtml5-insert-anchor-url form-control'>" +
                    "</div>" +
                    "<div class='modal-footer'>" +
                      "<a href='#' class='btn btn-secondary' data-bs-dismiss='modal'>" + locale.link.cancel + "</a>" +
                      "<a href='#' class='btn btn-primary' data-dismiss='modal'>Incorporar</a>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</div>" +
              "<a class='btn btn-default" + size + "' data-wysihtml5-command='createLinkAnchor' title='Incorporar Anchor' tabindex='-1'><i class='fa fa-microphone'></i></a>" +
            "</li>";
        },

        "embedhtml": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml5-insert-embedhtml-modal modal fade'>" +
                "<div class='modal-dialog'>" +
                  "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                      "<h3 class='modal-title'>Incorporar Tweet</h3>" +
                      "<a class='close' data-bs-dismiss='modal' aria-label='Close'>&times;</a>" +
                    "</div>" +
                    "<div class='modal-body'>" +
                      "<input type='text' class='bootstrap-wysihtml5-insert-embedhtml-url form-control' placeholder='Link do tweet, exemplo: https://twitter.com/LedZeppelin_/status/501572495536050178' />" +
                    "</div>" +
                    "<div class='modal-footer'>" +
                      "<a href='#' class='btn btn-secondary' data-bs-dismiss='modal'>" + locale.link.cancel + "</a>" +
                      "<a href='#' class='btn btn-primary' data-dismiss='modal'>Incorporar</a>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</div>" +
              "<a class='btn btn-default" + size + "' data-wysihtml5-command='createEmbedHtml' title='Incorporar Tweet' tabindex='-1'><i class='fa fa-brands fa-twitter'></i></a>" +
            "</li>";
        },

        "image": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml5-insert-image-modal modal fade bd-example-modal-lg'>" +
                "<div class='modal-dialog modal-lg'>" +
                  "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                      "<h3 class='modal-title'>" + locale.image.insert + "</h3>" +
                      "<a class='close' data-bs-dismiss='modal' aria-label='Close'>&times;</a>" +
                    "</div>" +
                    "<div class='modal-body' >" +
                        "<div class='row' style='margin-bottom: 20px;'>" +  
                            "<div class='col-md-6'>" +
                                "<input type='file' id='fileUpload' name='fileUpload' class='form-control' />" +
                            "</div>" +
                            "<div class='col-md-6'>" +
                                "<input type='button' id='btnEnviar' value='Enviar' class='btn btn-primary' />" +
                            "</div>" +
                        "</div>" +
                      "<div id='pictures-container' style='height: 500px; max-height: 500px; overflow:auto;'></div>" +
                      "<div class='row'>"+
                        "<div class='col-md-3'>"+
                            "<label>Largura</label>" +
                            "<input type='text' class='form-control' value='' id='pic-width'  />" +
                        "</div>" +
                        "<div class='col-md-3'>"+
                            "<label>Altura</label>" +
                            "<input type='text' class='form-control' value='' id='pic-height'  />" +
                        "</div>" +
                        "<div class='col-md-6'>"+
                            "<label>Imagem</label>" +
                            "<input type='text' class='form-control' readonly value='' id='pic-url'  />" +
                            "<input type='hidden' class='form-control' value='' id='baseurl'  />" +
                        "</div>" +
                      "</div>" +
                    "</div>" +
                    "<div class='modal-footer'>" +
                      "<a href='#' class='btn btn-secondary' data-bs-dismiss='modal'>" + locale.image.cancel + "</a>" +
                      "<a href='#' class='btn btn-primary' data-dismiss='modal'>" + locale.image.insert + "</a>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</div>" +
              "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='insertImage' title='" + locale.image.insert + "' tabindex='-1'><i class='fa fa-photo-film'></i></a>" +
            "</li>";
        },

        "html": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='btn-group'>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-action='change_view' title='" + locale.html.edit + "' tabindex='-1'><i class='fa fa-laptop-code'></i></a>" +
              "</div>" +
            "</li>";
        },

        "blockquote": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='btn-group'>" +
                "<a class='btn btn-default btn" + size + "' data-wysihtml5-command='insertBlockquote' title='" + locale.html.edit + "' tabindex='-1'><i class='fa fa-quote-right'></i></a>" +
              "</div>" +
            "</li>";
        },

        "color": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li class='dropdown'>" +
              "<a class='btn btn-default dropdown-toggle" + size + "' data-bs-toggle='dropdown' aria-expanded='true' href='#' tabindex='-1'>" +
                "<span class='current-color'>" + locale.colours.black + "</span>&nbsp;<b class='caret'></b>" +
              "</a>" +
              "<ul class='dropdown-menu' data-popper-placement='bottom-start'>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='black'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='black'>" + locale.colours.black + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='silver'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='silver'>" + locale.colours.silver + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='gray'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='gray'>" + locale.colours.gray + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='maroon'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='maroon'>" + locale.colours.maroon + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='red'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='red'>" + locale.colours.red + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='purple'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='purple'>" + locale.colours.purple + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='green'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='green'>" + locale.colours.green + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='olive'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='olive'>" + locale.colours.olive + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='navy'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='navy'>" + locale.colours.navy + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='blue'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='blue'>" + locale.colours.blue + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='orange'></div><a class='dropdown-item wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='orange'>" + locale.colours.orange + "</a></li>" +
              "</ul>" +
            "</li>";
        }
    };

    var templates = function(key, locale, options) {
        return tpl[key](locale, options);
    };


    var Wysihtml5 = function(el, options) {
        this.el = el;
        var toolbarOpts = options || defaultOptions;
        for(var t in toolbarOpts.customTemplates) {
          tpl[t] = toolbarOpts.customTemplates[t];
        }
        this.toolbar = this.createToolbar(el, toolbarOpts);
        this.editor =  this.createEditor(options);

        window.editor = this.editor;

        $('iframe.wysihtml5-sandbox').each(function(i, el){
            $(el.contentWindow).off('focus.wysihtml5').on({
                'focus.wysihtml5' : function(){
                    $('li.dropdown').removeClass('open');
                }
            });
        });
    };

    Wysihtml5.prototype = {

        constructor: Wysihtml5,

        createEditor: function(options) {
            options = options || {};
            
            // Add the toolbar to a clone of the options object so multiple instances
            // of the WYISYWG don't break because "toolbar" is already defined
            options = $.extend(true, {}, options);
            options.toolbar = this.toolbar[0];

            var editor = new wysi.Editor(this.el[0], options);

            if(options && options.events) {
                for(var eventName in options.events) {
                    editor.on(eventName, options.events[eventName]);
                }
            }
            return editor;
        },

        createToolbar: function(el, options) {
            var self = this;
            var toolbar = $("<ul/>", {
                'class' : "wysihtml5-toolbar",
                'style': "display:none"
            });
            var culture = options.locale || defaultOptions.locale || "en";
            for(var key in defaultOptions) {
                var value = false;

                if(options[key] !== undefined) {
                    if(options[key] === true) {
                        value = true;
                    }
                } else {
                    value = defaultOptions[key];
                }

                if(value === true) {
                    toolbar.append(templates(key, locale[culture], options));

                    if(key === "html") {
                        this.initHtml(toolbar);
                    }

                    if(key === "link") {
                        this.initInsertLink(toolbar);
                    }

                    if(key === "image") {
                        this.initInsertImage(toolbar);
                    }

                    if(key === "youtube") {
                        this.initInsertYoutube(toolbar);
                    }

                    if(key === "facebook") {
                        this.initInsertFacebook(toolbar);
                    }

                    if(key === "anchor") {
                        this.initInsertAnchor(toolbar);
                    }

                    if(key === "embedhtml") {
                        this.initInsertEmbedHtml(toolbar);
                    }

                    if(key === "blockquote") {
                        this.initBlockquote(toolbar);
                    }
                }
            }

            if(options.toolbar) {
                for(key in options.toolbar) {
                    toolbar.append(options.toolbar[key]);
                }
            }

            toolbar.find("a[data-wysihtml5-command='formatBlock']").click(function(e) {
                var target = e.target || e.srcElement;
                var el = $(target);
                self.toolbar.find('.current-font').text(el.html());
            });

            toolbar.find("a[data-wysihtml5-command='foreColor']").click(function(e) {
                var target = e.target || e.srcElement;
                var el = $(target);
                self.toolbar.find('.current-color').text(el.html());
            });

            this.el.before(toolbar);

            return toolbar;
        },

        initHtml: function(toolbar) {
            var changeViewSelector = "a[data-wysihtml5-action='change_view']";
            toolbar.find(changeViewSelector).click(function(e) {
                toolbar.find('a.btn').not(changeViewSelector).toggleClass('disabled');
            });
        },

        initInsertImage: function(toolbar) {
            var self = this;
            var insertImageModal = toolbar.find('.bootstrap-wysihtml5-insert-image-modal');
            var urlInput = insertImageModal.find('.bootstrap-wysihtml5-insert-image-url');
            var insertButton = insertImageModal.find('a.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertImage = function() {
                var width = $('#pic-width').val();
                var height = $('#pic-height').val();
                var picurl = $('#pic-url').val();
                var baseurl = $('#baseurl').val();

                var url = baseurl+'/storage/articles/'+picurl; //alert(url);
                //urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                  self.editor.composer.selection.setBookmark(caretBookmark);
                  caretBookmark = null;
                }
                self.editor.composer.commands.exec("insertImage", { src: url, alt: "xxx" });

                //$( "img" ).resizable();
            };

            

            // urlInput.keypress(function(e) {
            //     if(e.which == 13) {
            //         insertImage();
            //         insertImageModal.modal('hide');
            //     }
            // });

            insertButton.click(insertImage);

            // insertImageModal.on('shown', function() {
            //     urlInput.focus();
            // });

            insertImageModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=insertImage]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                $.get("/admin/media/popup", function(response){
                    $("#pictures-container").html(response.html);
                });

                $("body").on("click", ".pictureInsert", function(e){
                    var width = $(this).attr('data-width');
                    var height = $(this).attr('data-height');
                    var picurl = $(this).attr('data-file');
                    var baseurl = $(this).attr('data-baseurl');

                    $('#pic-width').val(width);
                    $('#pic-height').val(height);
                    $('#pic-url').val(picurl);
                    $('#baseurl').val(baseurl);

    
                });

                var form;
                $('#fileUpload').change(function (event) {
                    form = new FormData();
                    form.append('fileUpload', event.target.files[0]); // para apenas 1 arquivo
                    //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção
                });

                $('#btnEnviar').click(function () {
                    $("#btnEnviar").val('Aguarde...');
                    $.ajax({
                        url: '/admin/media/upload', // Url do lado server que vai receber o arquivo
                        data: form,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            $.get("/admin/media/popup", function(response){
                                $("#pictures-container").html(response.html);
                            });
                            $("#btnEnviar").val('Enviar');
                            $("#fileUpload").val('');
                        }
                    });
                });

                if (!activeButton) {
                    //self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertImageModal.appendTo('body').modal('show');
                    insertImageModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        },

        initInsertLink: function(toolbar) {
            var self = this;
            var insertLinkModal = toolbar.find('.bootstrap-wysihtml5-insert-link-modal');
            var urlInput = insertLinkModal.find('.bootstrap-wysihtml5-insert-link-url');
            var targetInput = insertLinkModal.find('.bootstrap-wysihtml5-insert-link-target');
            var insertButton = insertLinkModal.find('a.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertLink = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                  self.editor.composer.selection.setBookmark(caretBookmark);
                  caretBookmark = null;
                }

                var newWindow = targetInput.prop("checked");
                self.editor.composer.commands.exec("createLink", {
                    'href' : url,
                    'target' : (newWindow ? '_blank' : '_self'),
                    'rel' : (newWindow ? 'nofollow' : '')
                });
            };
            var pressedEnter = false;

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertLink();
                    insertLinkModal.modal('hide');
                }
            });

            insertButton.click(insertLink);

            insertLinkModal.on('shown', function() {
                urlInput.focus();
            });

            insertLinkModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=createLink]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    //self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertLinkModal.appendTo('body').modal('show');
                    insertLinkModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        },

        initBlockquote: function(toolbar) {
            var self = this;

           
            var caretBookmark;

            var insertBlockquote = function() {
         
                self.editor.currentView.element.focus();
                

                self.editor.composer.commands.exec("insertHTML", "<blockquote><cite><h3>"+caretBookmark+"</h3></cite></blockquote>");

                
                
                if (caretBookmark) {
                  self.editor.composer.selection.setBookmark(caretBookmark);
                  caretBookmark = null;
                }
                
            };

            

            toolbar.find('a[data-wysihtml5-command=insertBlockquote]').click(function() {
            
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    //self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertBlockquote();
                    return false;
                }
                else {
                    return true;
                }
            });

        },

        initInsertAnchor: function(toolbar) {
            var self = this;
            var insertAnchorModal = toolbar.find('.bootstrap-wysihtml5-insert-anchor-modal');
            var urlInput = insertAnchorModal.find('.bootstrap-wysihtml5-insert-anchor-url');
            var targetInput = insertAnchorModal.find('.bootstrap-wysihtml5-insert-anchor-target');
            var insertButton = insertAnchorModal.find('a.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertAnchor = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                self.editor.composer.selection.setBookmark(caretBookmark);
                caretBookmark = null;
                }

                var newWindow = targetInput.prop("checked");
                self.editor.composer.commands.exec("insertHTML", "[anchor="+url+"]");
            };
            var pressedEnter = false;

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertAnchor();
                    insertAnchorModal.modal('hide');
                }
            });

            insertButton.click(insertAnchor);

            insertAnchorModal.on('shown', function() {
                urlInput.focus();
            });

            insertAnchorModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=createLinkAnchor]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    //self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertAnchorModal.appendTo('body').modal('show');
                    insertAnchorModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        },

        initInsertEmbedHtml: function(toolbar) {
            var self = this;
            var insertEmbedHtmlModal = toolbar.find('.bootstrap-wysihtml5-insert-embedhtml-modal');
            var urlInput = insertEmbedHtmlModal.find('.bootstrap-wysihtml5-insert-embedhtml-url');
            var targetInput = insertEmbedHtmlModal.find('.bootstrap-wysihtml5-insert-embedhtml-target');
            var insertButton = insertEmbedHtmlModal.find('a.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertEmbedHtml = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                self.editor.composer.selection.setBookmark(caretBookmark);
                caretBookmark = null;
                }

                var newWindow = targetInput.prop("checked");
                self.editor.composer.commands.exec("insertHTML", "[twitter="+url+"]");
            };
           

            insertButton.click(insertEmbedHtml);

            insertEmbedHtmlModal.on('shown', function() {
                urlInput.focus();
            });

            insertEmbedHtmlModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=createEmbedHtml]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    //self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertEmbedHtmlModal.appendTo('body').modal('show');
                    insertEmbedHtmlModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        },
        

        initInsertYoutube: function(toolbar) {
            var self = this;
            var insertYoutubeModal = toolbar.find('.bootstrap-wysihtml5-insert-youtube-modal');
            var urlInput = insertYoutubeModal.find('.bootstrap-wysihtml5-insert-youtube-url');
            var targetInput = insertYoutubeModal.find('.bootstrap-wysihtml5-insert-youtube-target');
            var insertButton = insertYoutubeModal.find('a.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertYoutube = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                  self.editor.composer.selection.setBookmark(caretBookmark);
                  caretBookmark = null;
                }

                var newWindow = targetInput.prop("checked");
                self.editor.composer.commands.exec("insertHTML", "[youtube="+url+"]");
            };
            var pressedEnter = false;

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertYoutube();
                    insertYoutubeModal.modal('hide');
                }
            });

            insertButton.click(insertYoutube);

            insertYoutubeModal.on('shown', function() {
                urlInput.focus();
            });

            insertYoutubeModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=createLinkYoutube]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    //self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertYoutubeModal.appendTo('body').modal('show');
                    insertYoutubeModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        },
    

        initInsertFacebook: function(toolbar) {
            var self = this;
            var insertFacebookModal = toolbar.find('.bootstrap-wysihtml5-insert-facebook-modal');
            var urlInput = insertFacebookModal.find('.bootstrap-wysihtml5-insert-facebook-url');
            var targetInput = insertFacebookModal.find('.bootstrap-wysihtml5-insert-facebook-target');
            var insertButton = insertFacebookModal.find('a.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertFacebook = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                  self.editor.composer.selection.setBookmark(caretBookmark);
                  caretBookmark = null;
                }

                var newWindow = targetInput.prop("checked");
                self.editor.composer.commands.exec("insertHTML", "[facebook="+url+"]");
            };
            var pressedEnter = false;

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertFacebook();
                    insertFacebookModal.modal('hide');
                }
            });

            insertButton.click(insertFacebook);

            insertFacebookModal.on('shown', function() {
                urlInput.focus();
            });

            insertFacebookModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=createLinkFacebook]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    //self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertFacebookModal.appendTo('body').modal('show');
                    insertFacebookModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        }
    };

    // these define our public api
    var methods = {
        resetDefaults: function() {
            $.fn.wysihtml5.defaultOptions = $.extend(true, {}, $.fn.wysihtml5.defaultOptionsCache);
        },
        bypassDefaults: function(options) {
            return this.each(function () {
                var $this = $(this);
                $this.data('wysihtml5', new Wysihtml5($this, options));
            });
        },
        shallowExtend: function (options) {
            var settings = $.extend({}, $.fn.wysihtml5.defaultOptions, options || {}, $(this).data());
            var that = this;
            return methods.bypassDefaults.apply(that, [settings]);
        },
        deepExtend: function(options) {
            var settings = $.extend(true, {}, $.fn.wysihtml5.defaultOptions, options || {});
            var that = this;
            return methods.bypassDefaults.apply(that, [settings]);
        },
        init: function(options) {
            var that = this;
            return methods.shallowExtend.apply(that, [options]);
        }
    };

    $.fn.wysihtml5 = function ( method ) {
        if ( methods[method] ) {
            return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.wysihtml5' );
        }    
    };

    $.fn.wysihtml5.Constructor = Wysihtml5;

    var defaultOptions = $.fn.wysihtml5.defaultOptions = {
        "font-styles": true,
        "color": false,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": true,
        "image": true,
        "youtube": true,
        "anchor": true,
        "embedhtml": true,
        "autoLink": false,
        "blockquote": true,
        "facebook": true,
        events: {},
        parserRules: {
            classes: {
                // (path_to_project/lib/css/wysiwyg-color.css)
                "wysiwyg-color-silver" : 1,
                "wysiwyg-color-gray" : 1,
                "wysiwyg-color-white" : 1,
                "wysiwyg-color-maroon" : 1,
                "wysiwyg-color-red" : 1,
                "wysiwyg-color-purple" : 1,
                "wysiwyg-color-fuchsia" : 1,
                "wysiwyg-color-green" : 1,
                "wysiwyg-color-lime" : 1,
                "wysiwyg-color-olive" : 1,
                "wysiwyg-color-yellow" : 1,
                "wysiwyg-color-navy" : 1,
                "wysiwyg-color-blue" : 1,
                "wysiwyg-color-teal" : 1,
                "wysiwyg-color-aqua" : 1,
                "wysiwyg-color-orange" : 1
            },
            tags: {
                "b":  {},
                "i":  {},
                "br": {},
                "ol": {},
                "ul": {},
                "li": {},
                "h1": {},
                "h2": {},
                "h3": {},
                "h4": {},
                "h5": {},
                "h6": {},
                "blockquote": {},
                "u": 1,
                "img": {
                    "check_attributes": {
                        "width": "numbers",
                        "alt": "alt",
                        "src": "url",
                        "height": "numbers"
                    }
                },
                "a":  {
                    check_attributes: {
                        'href': "url", // important to avoid XSS
                        'target': 'alt',
                        'rel': 'alt'
                    }
                },
                "span": 1,
                "div": 1,
                // to allow save and edit files with code tag hacks
                "code": 1,
                "pre": 1
            }
        },
        stylesheets: ["./css/wysiwyg-color.css"], // (path_to_project/lib/css/wysiwyg-color.css)
        locale: "br"
    };

    if (typeof $.fn.wysihtml5.defaultOptionsCache === 'undefined') {
        $.fn.wysihtml5.defaultOptionsCache = $.extend(true, {}, $.fn.wysihtml5.defaultOptions);
    }

    var locale = $.fn.wysihtml5.locale = {
        en: {
            font_styles: {
                normal: "Normal text",
                h1: "Heading 1",
                h2: "Heading 2",
                h3: "Heading 3",
                h4: "Heading 4",
                h5: "Heading 5",
                h6: "Heading 6"
            },
            emphasis: {
                bold: "Bold",
                italic: "Italic",
                underline: "Underline"
            },
            lists: {
                unordered: "Unordered list",
                ordered: "Ordered list",
                outdent: "Outdent",
                indent: "Indent"
            },
            link: {
                insert: "Insert link",
                cancel: "Cancel",
                target: "Open link in new window"
            },
            image: {
                insert: "Insert image",
                cancel: "Cancel"
            },
            html: {
                edit: "Edit HTML"
            },
            colours: {
                black: "Black",
                silver: "Silver",
                gray: "Grey",
                maroon: "Maroon",
                red: "Red",
                purple: "Purple",
                green: "Green",
                olive: "Olive",
                navy: "Navy",
                blue: "Blue",
                orange: "Orange"
            }
        },
        br: {
            font_styles: {
                normal: "Normal",
                h1: "Cabeçalho 1",
                h2: "Cabeçalho 2",
                h3: "Cabeçalho 3",
                h4: "Cabeçalho 4",
                h5: "Cabeçalho 5",
                h6: "Cabeçalho 6"
            },
            emphasis: {
                bold: "Negrito",
                italic: "Itálico",
                underline: "Sublinhado"
            },
            lists: {
                unordered: "Unordered list",
                ordered: "Ordered list",
                outdent: "Outdent",
                indent: "Indent"
            },
            link: {
                insert: "Inserir link",
                cancel: "Cancelar",
                target: "Abrir link em nova janela"
            },
            image: {
                insert: "Inserir Imagem",
                cancel: "Cancelar"
            },
            html: {
                edit: "Editar HTML"
            },
            colours: {
                black: "Preto",
                silver: "Prata",
                gray: "Cinza",
                maroon: "Marrom",
                red: "Vermelho",
                purple: "Roxo",
                green: "Verde",
                olive: "Verde Oliva",
                navy: "Navy",
                blue: "Azul",
                orange: "Laranja"
            }
        }
    };

}(window.jQuery, window.wysihtml5);

