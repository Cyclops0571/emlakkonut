var editor = undefined;
;(function ( $, window, document, undefined) {
    // Register Forms
    $.wcpEditorCreateForm({
        name: 'Image Map Settings',
        controlGroups: [
            // {
            //     groupName: 'general',
            //     groupTitle: 'General',
            //     groupIcon: 'fa fa-cog',
            //     controls: [
            //         {
            //             type: 'text',
            //             name: 'image_map_name',
            //             title: 'Harita Görsel İsmi',
            //             value: $.imageMapProDefaultSettings.general.name
            //         },
            //         {
            //             type: 'switch',
            //             name: 'responsive',
            //             title: 'Responsive',
            //             value: $.imageMapProDefaultSettings.general.responsive,
            //         },
            //         {
            //             type: 'switch',
            //             name: 'preserve_quality',
            //             title: 'Preserve Quality',
            //             value: $.imageMapProDefaultSettings.general.preserve_quality,
            //         },
            //         {
            //             type: 'int',
            //             name: 'image_map_width',
            //             title: 'Genişlik',
            //             value: $.imageMapProDefaultSettings.general.width,
            //         },
            //         {
            //             type: 'int',
            //             name: 'image_map_height',
            //             title: 'Yükseklik',
            //             value: $.imageMapProDefaultSettings.general.height
            //             },
            //         {
            //             type: 'button',
            //             name: 'reset_size',
            //             title: 'Boyutu Sıfırla',
            //             options: { event_name: 'button-reset-size-clicked' },
            //             value: undefined
            //         },
            //         {
            //             type: 'select',
            //             name: 'pageload_animation',
            //             title: 'Sayfa Yüklenme Animasyonu',
            //             options: [
            //                 { value: 'none', title: 'None' },
            //                 { value: 'grow', title: 'Grow' },
            //                 { value: 'fade', title: 'Fade' },
            //             ],
            //             value: $.imageMapProDefaultSettings.general.pageload_animation
            //         },
            //         {
            //             type: 'switch',
            //             name: 'late_initialization',
            //             title: 'Geç Yüklenme',
            //             value: $.imageMapProDefaultSettings.general.late_initialization,
            //         },
            //         {
            //             type: 'switch',
            //             name: 'center_image_map',
            //             title: 'Merkez Harita Görseli',
            //             value: $.imageMapProDefaultSettings.general.center_image_map,
            //         },
            //     ]
            // },
            // {
            //     groupName: 'image',
            //     groupTitle: 'Image',
            //     groupIcon: 'fa fa-photo',
            //     controls: [
            //         {
            //             type: 'wp media upload',
            //             name: 'image_url',
            //             title: 'Görsel URL',
            //             value: $.imageMapProDefaultSettings.general.image_url
            //         },
            //     ]
            // },
            // {
            //     groupName: 'tooltips',
            //     groupTitle: 'İpuçları',
            //     groupIcon: 'fa fa-comment',
            //     controls: [
            //         {
            //             type: 'switch',
            //             name: 'sticky_tooltips',
            //             title: 'Yapışkan İpuçları',
            //             value: $.imageMapProDefaultSettings.general.sticky_tooltips,
            //         },
            //         {
            //             type: 'switch',
            //             name: 'constrain_tooltips',
            //             title: 'Constrain İpuçları',
            //             value: $.imageMapProDefaultSettings.general.constrain_tooltips,
            //         },
            //         {
            //             type: 'select',
            //             name: 'tooltip_animation',
            //             title: 'Tooltip Animation',
            //             options: [
            //                 { value: 'none', title: 'None' },
            //                 { value: 'grow', title: 'Grow' },
            //                 { value: 'fade', title: 'Fade' },
            //             ],
            //             value: $.imageMapProDefaultSettings.general.tooltip_animation
            //         },
            //         {
            //             type: 'select',
            //             name: 'fullscreen_tooltips',
            //             title: 'Tam Ekran İpuçları',
            //             options: [
            //                 { value: 'none', title: 'None' },
            //                 { value: 'mobile-only', title: 'Mobile Only' },
            //                 { value: 'always', title: 'Always' },
            //             ],
            //             value: $.imageMapProDefaultSettings.general.fullscreen_tooltips
            //         },
            //     ]
            // },
            // {
            //     groupName: 'fullscreen',
            //     groupTitle: 'Tam Ekran',
            //     groupIcon: 'fa fa-arrows-alt',
            //     controls: [
            //         {
            //             type: 'switch',
            //             name: 'enable_fullscreen_mode',
            //             title: 'Tam Ekran Modu Aktif',
            //             value: $.imageMapProDefaultSettings.fullscreen.enable_fullscreen_mode,
            //         },
            //         {
            //             type: 'switch',
            //             name: 'start_in_fullscreen_mode',
            //             title: 'Tam Ekran Modunu Başlat',
            //             value: $.imageMapProDefaultSettings.fullscreen.start_in_fullscreen_mode,
            //         },
            //         {
            //             type: 'color',
            //             name: 'fullscreen_background',
            //             title: 'Tam Ekran Arkaplanı',
            //             value: $.imageMapProDefaultSettings.fullscreen.fullscreen_background,
            //         },
            //         {
            //             type: 'fullscreen button position',
            //             name: 'fullscreen_button_position',
            //             title: 'Tam Ekran Buton Pozisyonu',
            //             value: 1 // 0 = top left, 1 = top center, 2 = top right, 3 = bottom right, 4 = bottom center, 5 = bottom left
            //         },
            //         {
            //             type: 'button group',
            //             name: 'fullscreen_button_type',
            //             title: 'Buton Tipi',
            //             options: [
            //                 { value: 'icon', title: 'Icon' },
            //                 { value: 'text', title: 'Text' },
            //                 { value: 'icon_and_text', title: 'Icon and Text' }
            //             ],
            //             value: $.imageMapProDefaultSettings.fullscreen.fullscreen_button_type,
            //         },
            //         {
            //             type: 'color',
            //             name: 'fullscreen_button_color',
            //             title: 'Buton Rengi',
            //             value: $.imageMapProDefaultSettings.fullscreen.fullscreen_button_color,
            //         },
            //         {
            //             type: 'color',
            //             name: 'fullscreen_button_text_color',
            //             title: 'Button Icon/Text Color',
            //             value: $.imageMapProDefaultSettings.fullscreen.fullscreen_button_text_color,
            //         }
            //     ]
            // }
        ]
    });
    $.wcpEditorCreateForm({
        name: 'Shape Settings',
        controlGroups: [
            {
                groupName: 'general',
                groupTitle: 'Genel',
                groupIcon: 'fa fa-cog',
                controls: [
                    {
                        type: 'float',
                        name: 'x',
                        title: 'X',
                        value: $.imageMapProDefaultSpotSettings.x
                    },
                    {
                        type: 'float',
                        name: 'y',
                        title: 'Y',
                        value: $.imageMapProDefaultSpotSettings.y
                    },
                    {
                        type: 'float',
                        name: 'width',
                        title: 'Genişlik',
                        value: $.imageMapProDefaultSpotSettings.width
                    },
                    {
                        type: 'float',
                        name: 'height',
                        title: 'Yükseklik',
                        value: $.imageMapProDefaultSpotSettings.height
                    },
                ]
            },
            {
                groupName: 'actions',
                groupTitle: 'Aksiyonlar',
                groupIcon: 'fa fa-bolt',
                controls: [
                    {
                        type: 'select',
                        name: 'mouseover',
                        title: 'Üzerine Gelince',
                        options: [
                            { value: 'no-action', title: 'Aksiyon Yok' },
                            { value: 'show-tooltip', title: 'İpucunu Göster' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.actions.mouseover
                    },
                    {
                        type: 'select',
                        name: 'click',
                        title: 'Tıklanınca',
                        options: [
                            { value: 'no-action', title: 'Aksiyon Yok' },
                            { value: 'show-tooltip', title: 'İpucunu Göster' },
                            { value: 'follow-link', title: 'Linki Takip Et' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.actions.click
                    },
                    {
                        type: 'text',
                        name: 'link',
                        title: 'Link',
                        value: $.imageMapProDefaultSpotSettings.actions.link
                    },
                    {
                        type: 'switch',
                        name: 'open_link_in_new_window',
                        title: 'Linki Yeni Pencerede Aç',
                        value: $.imageMapProDefaultSpotSettings.actions.open_link_in_new_window
                    },
                ]
            },
            {
                groupName: 'icon',
                groupTitle: 'İkon',
                groupIcon: 'fa fa-map-marker',
                controls: [
                    {
                        type: 'switch',
                        name: 'use_icon',
                        title: 'İkon Kullan',
                        value: $.imageMapProDefaultSpotSettings.default_style.use_icon
                    },
                    {
                        type: 'button group',
                        name: 'icon_type',
                        title: 'İkon Tipi',
                        options: [
                            { value: 'library', title: 'Kütüphaneden' },
                            { value: 'custom', title: 'Özel' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.default_style.icon_type
                    },
                    {
                        type: 'button',
                        name: 'choose_icon_from_library',
                        title: 'Kütüphaneden Seç',
                        options: { event_name: 'button-choose-icon-clicked' },
                        value: undefined
                    },
                    {
                        type: 'text',
                        name: 'icon_svg_path',
                        title: 'İkon SVG Yolu',
                        value: $.imageMapProDefaultSpotSettings.default_style.icon_svg_path,
                        render: false
                    },
                    {
                        type: 'text',
                        name: 'icon_svg_viewbox',
                        title: 'İkon SVG Viewbox',
                        value: $.imageMapProDefaultSpotSettings.default_style.icon_svg_viewbox,
                        render: false
                    },
                    {
                        type: 'text',
                        name: 'icon_url',
                        title: 'İkon URL Gir',
                        value: $.imageMapProDefaultSpotSettings.default_style.icon_url
                    },
                    {
                        type: 'switch',
                        name: 'icon_is_pin',
                        title: 'Pin İkonu',
                        value: $.imageMapProDefaultSpotSettings.default_style.icon_is_pin
                    },
                    {
                        type: 'switch',
                        name: 'icon_shadow',
                        title: 'İkon Gölgesi',
                        value: $.imageMapProDefaultSpotSettings.default_style.icon_shadow
                    },
                ]
            },
            {
                groupName: 'default_style',
                groupTitle: 'Varsayılan Stil',
                groupIcon: 'fa fa-paint-brush',
                controls: [
                    {
                        type: 'slider',
                        name: 'opacity',
                        title: 'Saydamlık',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.default_style.opacity
                    },
                    {
                        type: 'color',
                        name: 'icon_fill',
                        title: 'SVG İkon Rengi',
                        value: $.imageMapProDefaultSpotSettings.default_style.icon_fill
                    },
                    {
                        type: 'int',
                        name: 'border_radius',
                        title: 'Çerçeve Yumuşaklığı',
                        value: $.imageMapProDefaultSpotSettings.default_style.border_radius
                    },
                    {
                        type: 'color',
                        name: 'background_color',
                        title: 'Arkaplan Rengi',
                        value: $.imageMapProDefaultSpotSettings.default_style.background_color
                    },
                    {
                        type: 'slider',
                        name: 'background_opacity',
                        title: 'Arkaplan Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.default_style.background_opacity
                    },
                    {
                        type: 'slider',
                        name: 'border_width',
                        title: 'Çerçeve Kalınlığı',
                        options: { min: 0, max: 20, type: 'int' },
                        value: $.imageMapProDefaultSpotSettings.default_style.border_width
                    },
                    {
                        type: 'select',
                        name: 'border_style',
                        title: 'Çerçeve Stili',
                        options: [
                            { value: 'none', title: 'Yok' },
                            { value: 'hidden', title: 'Gizli' },
                            { value: 'solid', title: 'Solid' },
                            { value: 'dotted', title: 'Nokta' },
                            { value: 'dashed', title: 'Çizgi' },
                            { value: 'double', title: 'Çift' },
                            { value: 'groove', title: 'Groove' },
                            { value: 'inset', title: 'Inset' },
                            { value: 'outset', title: 'Outset' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.default_style.border_style
                    },
                    {
                        type: 'color',
                        name: 'border_color',
                        title: 'Çerçeve Rengi',
                        value: $.imageMapProDefaultSpotSettings.default_style.border_color
                    },
                    {
                        type: 'slider',
                        name: 'border_opacity',
                        title: 'Çerçeve Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.default_style.border_opacity
                    },
                    {
                        type: 'color',
                        name: 'fill',
                        title: 'Dolum Rengi',
                        value: $.imageMapProDefaultSpotSettings.default_style.fill
                    },
                    {
                        type: 'slider',
                        name: 'fill_opacity',
                        title: 'Dolum Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.default_style.fill_opacity
                    },
                    {
                        type: 'color',
                        name: 'stroke_color',
                        title: 'Kalınlık Rengi',
                        value: $.imageMapProDefaultSpotSettings.default_style.stroke_color
                    },
                    {
                        type: 'slider',
                        name: 'stroke_opacity',
                        title: 'Kenar Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.default_style.stroke_opacity
                    },
                    {
                        type: 'slider',
                        name: 'stroke_width',
                        title: 'Kenar Genişliği',
                        options: { min: 0, max: 20, type: 'int' },
                        value: $.imageMapProDefaultSpotSettings.default_style.stroke_width
                    },
                    {
                        type: 'text',
                        name: 'stroke_dasharray',
                        title: 'Çizgi Dizisi Kalınlığı',
                        value: $.imageMapProDefaultSpotSettings.default_style.stroke_dasharray
                    },
                    {
                        type: 'select',
                        name: 'stroke_linecap',
                        title: 'Hat Kalınlığı',
                        options: [
                            { value: 'butt', title: 'Butt' },
                            { value: 'round', title: 'Round' },
                            { value: 'square', title: 'Square' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.default_style.stroke_linecap
                    },
                ]
            },
            {
                groupName: 'mouseover_style',
                groupTitle: 'Hover Stili',
                groupIcon: 'fa fa-paint-brush',
                controls: [
                    {
                        type: 'button',
                        name: 'copy_from_default_styles',
                        title: 'Varsayılan Stilden Kopyala',
                        options: { event_name: 'button-copy-from-default-styles-clicked' },
                        value: undefined
                    },
                    {
                        type: 'slider',
                        name: 'mouseover_opacity',
                        title: 'Hover Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.opacity
                    },
                    {
                        type: 'color',
                        name: 'mouseover_icon_fill',
                        title: 'SVG İkon Dolum Rengi',
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.icon_fill
                    },
                    {
                        type: 'int',
                        name: 'mouseover_border_radius',
                        title: 'Çerçeve Yumuşaklığı',
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.border_radius
                    },
                    {
                        type: 'color',
                        name: 'mouseover_background_color',
                        title: 'Arkaplan Rengi',
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.background_color
                    },
                    {
                        type: 'slider',
                        name: 'mouseover_background_opacity',
                        title: 'Arkaplan Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.background_opacity
                    },
                    {
                        type: 'slider',
                        name: 'mouseover_border_width',
                        title: 'Çerçeve Genişliği',
                        options: { min: 0, max: 20, type: 'int' },
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.border_width
                    },
                    {
                        type: 'select',
                        name: 'mouseover_border_style',
                        title: 'Çerçeve Stili',
                        options: [
                            { value: 'none', title: 'Yok' },
                            { value: 'hidden', title: 'Gizli' },
                            { value: 'solid', title: 'Solid' },
                            { value: 'dotted', title: 'Nokta' },
                            { value: 'dashed', title: 'Çizgi' },
                            { value: 'double', title: 'Çift' },
                            { value: 'groove', title: 'Groove' },
                            { value: 'inset', title: 'Inset' },
                            { value: 'outset', title: 'Outset' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.border_style
                    },
                    {
                        type: 'color',
                        name: 'mouseover_border_color',
                        title: 'Çerçeve Rengi',
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.border_color
                    },
                    {
                        type: 'slider',
                        name: 'mouseover_border_opacity',
                        title: 'Çerçeve Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.border_opacity
                    },
                    {
                        type: 'color',
                        name: 'mouseover_fill',
                        title: 'Dolum Rengi',
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.fill
                    },
                    {
                        type: 'slider',
                        name: 'mouseover_fill_opacity',
                        title: 'Dolum Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.fill_opacity
                    },
                    {
                        type: 'color',
                        name: 'mouseover_stroke_color',
                        title: 'Kalınlık Rengi',
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.stroke_color
                    },
                    {
                        type: 'slider',
                        name: 'mouseover_stroke_opacity',
                        title: 'Kalınlık Şeffaflığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.stroke_opacity
                    },
                    {
                        type: 'slider',
                        name: 'mouseover_stroke_width',
                        title: 'Kalınlık Genişliği',
                        options: { min: 0, max: 20, type: 'int' },
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.stroke_width
                    },
                    {
                        type: 'text',
                        name: 'mouseover_stroke_dasharray',
                        title: 'Nokta Dizesi Kalınlığı',
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.stroke_dasharray
                    },
                    {
                        type: 'select',
                        name: 'mouseover_stroke_linecap',
                        title: 'Hat Kalınlığı',
                        options: [
                            { value: 'butt', title: 'Butt' },
                            { value: 'round', title: 'Round' },
                            { value: 'square', title: 'Square' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.mouseover_style.stroke_linecap
                    },
                ]
            },
            {
                groupName: 'tooltip_settings',
                groupTitle: 'İpucu Ayarları',
                groupIcon: 'fa fa-comment',
                controls: [
                    {
                        type: 'int',
                        name: 'tooltip_border_radius',
                        title: 'Çerçeve Yumuşaklığı',
                        value: $.imageMapProDefaultSpotSettings.tooltip_style.border_radius
                    },
                    {
                        type: 'int',
                        name: 'tooltip_padding',
                        title: 'Mesafe',
                        value: $.imageMapProDefaultSpotSettings.tooltip_style.padding
                    },
                    {
                        type: 'color',
                        name: 'tooltip_background_color',
                        title: 'Arkaplan Rengi',
                        value: $.imageMapProDefaultSpotSettings.tooltip_style.background_color
                    },
                    {
                        type: 'slider',
                        name: 'tooltip_background_opacity',
                        title: 'Arkaplan Saydamlığı',
                        options: { min: 0, max: 1 },
                        value: $.imageMapProDefaultSpotSettings.tooltip_style.background_opacity
                    },
                    {
                        type: 'select',
                        name: 'tooltip_position',
                        title: 'Pozisyon',
                        options: [
                            { value: 'top', title: 'Üst' },
                            { value: 'bottom', title: 'Alt' },
                            { value: 'left', title: 'Sol' },
                            { value: 'right', title: 'Sağ' },
                        ],
                        value: $.imageMapProDefaultSpotSettings.tooltip_style.position
                    },
                    {
                        type: 'switch',
                        name: 'tooltip_auto_width',
                        title: 'Otomatik Genişlik',
                        value: $.imageMapProDefaultSpotSettings.tooltip_style.auto_width
                    },
                    {
                        type: 'int',
                        name: 'tooltip_width',
                        title: 'Genişlik',
                        value: $.imageMapProDefaultSpotSettings.tooltip_style.width
                    },
                ]
            },
            {
                groupName: 'tooltip_content',
                groupTitle: 'İpucu İçeriği',
                groupIcon: 'fa fa-paragraph',
                controls: [
                    {
                        type: 'button group',
                        name: 'tooltip_content_type',
                        title: 'İpucu İçeriği',
                        options: [
                            { value: 'plain-text', title: 'Düz Yazı' },
                            { value: 'content-builder', title: 'İçerik Editörü' },
                        ]
                    },
                    {
                        type: 'textarea',
                        name: 'plain_text',
                        title: 'İpucu İçeriği',
                        value: $.imageMapProDefaultSpotSettings.tooltip_content.plain_text
                    },
                    {
                        type: 'color',
                        name: 'plain_text_color',
                        title: 'Metin Rengi',
                        value: $.imageMapProDefaultSpotSettings.tooltip_content.plain_text_color
                    },
                    {
                        type: 'object',
                        name: 'squares_settings',
                        title: 'Squares Settings',
                        value: $.imageMapProDefaultSpotSettings.tooltip_content.squares_settings,
						render: false
                    },
                    {
                        type: 'button',
                        name: 'launch_content_builder',
                        title: 'İçerik Editörünü Çalıştır',
                        options: { event_name: 'button-launch-content-builder-clicked' },
                        value: undefined
                    },
                ]
            },
        ]
    });

    // Register Tour
    $.wcpTourRegister({
        name: 'Image Map Pro Editor Tour',
        welcomeScreen: {
            title: 'Hoşgeldiniz!',
            text: 'This is a guided tour to get you started quickly with Image Map Pro.<br>Click the button below to begin!',
            startButtonTitle: 'Tur atabilir',
            cancelButtonTitle: 'Veya eğitimi geçebilirsiniz',
        },
        steps: [
            {
                title: 'Drawing Shapes',
                text: 'Use the toolbar on the left to draw different kinds of shapes.<br>Choose between Spots/Icons, Ellipses, Rectangles or polygons.',
                tip: {
                    title: 'Toolbar',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/01-drawing-shapes.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/01-drawing-shapes.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/01-drawing-shapes.mp4',
                    },
                    position: 'bottom-left',
                    highlightRect: true
                },
            },
            {
                title: 'Customize Your Shapes',
                text: 'Change how the shapes look by selecting a shape <br>and clicking “Shape” on the left, and then “Default Style” or “Mouseover Style”.',
                tip: {
                    title: 'Shape Styles',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/02-customizing-shapes.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/02-customizing-shapes.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/02-customizing-shapes.mp4',
                    },
                    position: 'bottom-right',
                    arrowStyle: 'transform: scaleX(-1);',
                    highlightRect: true
                }
            },
            {
                title: 'Edit and Delete Shapes',
                text: 'From the list on the right you can do various things with your shapes, like <br>copy-pasting styles, reordering them, or deleting the shapes.',
                tip: {
                    title: 'Shapes List',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/03-list.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/03-list.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/03-list.mp4',
                    },
                    position: 'bottom-left',
                    highlightRect: true
                }
            },
            {
                title: 'Use Icons',
                text: 'To have an icon, place a Spot shape on the image, then open the “Icon” tab on the left to customize it.<br>Choose from 150 built-in SVG icons, or use your own!',
                tip: {
                    title: 'Icon Settings',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/04-icons.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/04-icons.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/04-icons.mp4',
                    },
                    position: 'bottom-right',
                    highlightRect: true
                }
            },
            {
                title: 'Tooltip Content Builder',
                text: 'Use a fully featured content builder to add rich content to the tooltips. <br>You can launch the content builder by selecting a shape and opening the "Tooltip Content" settings tab.',
                tip: {
                    title: 'Tooltip Content Settings',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/05-content-builder.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/05-content-builder.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/05-content-builder.mp4',
                    },
                    position: 'top-right',
                    highlightRect: true
                }
            },
            {
                title: 'Responsive &amp; Fullscreen Tooltips',
                text: 'Image Map Pro is fully optimized for mobile devices. It\'s responsive, <br>and you even have the option for fullscreen tooltips on mobile. To change these settings, open the "General" settings tab.',
                tip: {
                    title: 'Image Map Settings',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/06-responsive.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/06-responsive.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/06-responsive.mp4',
                    },
                    position: 'bottom-right',
                    highlightRect: true
                }
            },
            {
                title: 'Preview Mode',
                text: 'See how your image map will look like by entering Preview Mode. <br>You can continue to tweak settings and see the changes live!',
                tip: {
                    title: 'Preview Mode Button',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/07-preview-mode.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/07-preview-mode.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/07-preview-mode.mp4',
                    },
                    position: 'bottom-right',
                    highlightRect: true
                }
            },
            {
                title: 'Save and Load',
                text: 'This editor uses Local Storage to save your work. You can have <br>as many image maps as you want, and switch between them any time. No database needed!',
                tip: {
                    title: 'Save/Load Buttons',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/08-save-load.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/08-save-load.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/08-save-load.mp4',
                    },
                    position: 'bottom-right',
                    highlightRect: true
                }
            },
            {
                title: 'Import and Export',
                text: 'You can also import and export your data, <br>in case you need to switch devices, or save your work somewhere else.',
                tip: {
                    title: 'Import/Export Buttons',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/09-import-export.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/09-import-export.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/09-import-export.mp4',
                    },
                    position: 'bottom-right',
                    highlightRect: true
                }
            },
            {
                title: 'Easy Installation',
                text: 'When you are ready to add the image map to your site, simply click the <br>"Code" button and follow the instructions.',
                tip: {
                    title: 'Code Button',
                    subtitle: 'Watch Video',
                    media: {
                        type: 'video',
                        url_mp4: 'https://webcraftplugins.com/uploads/image-map-pro/videos/10-install.mp4',
                        url_webm: 'https://webcraftplugins.com/uploads/image-map-pro/videos/10-install.mp4',
                        url_ogv: 'https://webcraftplugins.com/uploads/image-map-pro/videos/10-install.mp4',
                    },
                    position: 'bottom-right',
                    highlightRect: true
                }
            },
        ]
    });

    var extraMainButtons = [
        {
            name: 'code',
            icon: 'fa fa-code',
            title: 'Code'
        },
        {
            name: 'import',
            icon: 'fa fa-arrow-down',
            title: 'Import'
        },
        {
            name: 'export',
            icon: 'fa fa-arrow-up',
            title: 'Export'
        }
    ];
    
    $.WCPEditorSettings = {
        mainTabs: [
            {
                name: 'Image Map',
                icon: 'fa fa-cog',
                title: 'Görsel Harita Ayarları'
            },
            {
                name: 'Shape',
                icon: 'fa fa-object-ungroup',
                title: 'Şekil Ayarları'
            }
        ],
        toolbarButtons: [
            [
                {
                    name: 'spot',
                    icon: 'fa fa-map-marker',
                    title: 'İkon'
                },
                {
                    name: 'oval',
                    customIcon: '<div style="width: 14px; height: 14px; border: 2px solid #222; border-radius: 50px;"></div>',
                    title: 'Elips'
                },
                {
                    name: 'rect',
                    customIcon: '<div style="width: 20px; height: 14px; border: 2px solid #222; border-radius: 5px;"></div>',
                    title: 'Kare'
                },
                {
                    name: 'poly',
                    customIcon: '<svg width="24px" height="24px" viewport="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><polygon fill="none" style="stroke: black; stroke-width: 2px;" points="20,20 18,4 7,7 4,20"></polygon><ellipse cx="20" cy="20" rx="3" ry="3"></ellipse><ellipse cx="18" cy="4" rx="3" ry="3"></ellipse><ellipse cx="7" cy="7" rx="3" ry="3"></ellipse><ellipse cx="4" cy="20" rx="3" ry="3"></ellipse></svg>',
                    title: 'Poligon'
                },
            ],
            [
                {
                    name: 'select',
                    icon: 'fa fa-mouse-pointer',
                    title: 'Seç'
                },
                {
                    name: 'zoom-in',
                    icon: 'fa fa-search-plus',
                    title: 'Yakınlaştır (CTRL +)',
                },
                {
                    name: 'zoom-out',
                    icon: 'fa fa-search-minus',
                    title: 'Uzaklaştır (CTRL -)'
                },
                {
                    name: 'drag',
                    icon: 'fa fa-hand-paper-o',
                    title: 'Alanı Sürükle (Spacebar tuşuna basın ve sürükleyin)'
                },
                {
                    name: 'reset',
                    customIcon: '1:1',
                    title: 'Sıfırla (CTRL + 0)',
                    kind: 'button'
                },
            ]
        ], 
        extraMainButtons: extraMainButtons,
        listItemButtons: [
               
        ],
        listItemTitle: 'Eklediklerim',
        listItemTitleButtons: [
            {
                name: 'rename',
                icon: 'fa fa-pencil',
                title: 'Adlandır'
            },
            {
                name: 'copy',
                icon: 'fa fa-files-o',
                title: 'Stili Kopyala'
            },
            {
                name: 'paste',
                icon: 'fa fa-clipboard',
                title: 'Stili Yapıştır'
            },
            {
                name: 'duplicate',
                icon: 'fa fa-clone',
                title: 'Kopyala'
            },
            {
                name: 'delete',
                icon: 'fa fa-trash-o',
                title: 'Sil'
            },
        ],
        fullscreenButton: false,
        newButton: true,
        helpButton: false,
        previewToggle: true
    };

    // Init Editor
    // $(document).ready(function() {
    //     editor = $.image_map_pro_init_editor(undefined, $.WCPEditorSettings);
    //     console.log(editor);
    // });
})( jQuery, window, document );
