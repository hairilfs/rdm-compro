$(function(){
    //Init on all pages

    rdm.ready();
    rdm.talk();

    rdm.fullHeight('.fullheight-js');
    rdm.minHeight('.minheight-js');

    rdm.sliderOptions();

    $('a.link-scroll').click(function(e){
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('#landing-instructions').offset().top - $('#header').height()
        }, 500);
    });

    $('a#back-top').click(function(e){
        e.preventDefault();

        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

    $('#burger').click(function(){
        $(this).toggleClass('active');
    });

    if($('#home-about-interaction').length) {
        rdm.aboutInteraction();
    };

    if($('#yt-player').length) {
        rdm.video();
    };

    if($('.has-filtering').length) {
        rdm.projects();
    };

    // if($('body.contact').length){
    //     rdm.contact();
    // }
});

$(window).load(function(){
    rdm.sizing();
});

$(window).resize(function(){
    rdm.ready();

    rdm.fullHeight('.fullheight-js');
    rdm.minHeight('.minheight-js');
});

$(window).scroll(function(){
    var windowScroll    = $(window).scrollTop();
});


//Global function starer()
var rdm = (function(){
    var equalheight = function(container){
        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;
            $(container).each(function() {

            $el = $(this);
            $($el).height('auto')
            topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
            }else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    };

    var ismobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
        },
        any: function () {
            return (ismobile.Android() || ismobile.BlackBerry() || ismobile.iOS() || ismobile.Opera() || ismobile.Windows());
        }
    };

    var ready = function(){
        // $('main').css({
        //     'padding-top': $('#header').height() + 'px'
        // });

        setTimeout(function(){
            $('body').addClass('loaded');
        }, 400);
    }

    var sizing = function(){}

    var fullHeight = function(elem){
        var wh = $(window).height();

        if($(elem).length){
            $(elem).css({
                'height' : wh + 'px'
            });
        }
    };

    var minHeight = function(elem){
        var wh = $(window).height(),
            fh = $('footer').height();

        if($(elem).length){
            $(elem).css({
                'min-height' : (wh - fh) + 'px'
            });
        }
    };

    var sliderOptions = function(){
        var option1 = {
            items              : 1,
            animateOut         : 'fadeOut',

            autoplay           : false,
            autoplayTimeout    : 6000,
            loop               : true,

            dots               : false,
            mouseDrag          : false,
            touchDrag          : false,

            nav                : false,
            // navText: [
            //     '<a class="s_nav prev"><i class="icon-left-open"></i></a>',
            //     '<a class="s_nav next"><i class="icon-right-open"></i></a>'
            // ],

            onInitialized : function(event){
                var item = $('.owl-carousel').find('.item');

                $(item).addClass('loaded');
            }
        };

        if($('#sliderHome').length){
            $('#sliderHome').owlCarousel(option1);
        };
    };

    var aboutInteraction = function(){
        var holder = $('#home-about-interaction'),
            detail = $('#interaction-detail .detail-item'),
            item   = $('#interaction-list ul li a');
        

        console.log(item.length);

        item.each(function(){
            var parentIdx = $(this).parent().index();

            $(this).hover(hoverIn, hoverOut);

            $(this).click(function(e){
                e.preventDefault();

                holder.addClass('is-opened');

                console.log(parentIdx);

                detail.eq(parentIdx).addClass('is-active');
            });

            function hoverIn(){
                detail.eq(parentIdx).addClass('is-hover');
            };

            function hoverOut(){
                detail.eq(parentIdx).removeClass('is-hover');
            };
        });

        $('#close-interaction').click(function(e){
            e.preventDefault();

            holder.removeClass('is-opened');
            detail.removeClass('is-hover is-active');
        })
    };

    var video = function(){
        var player;

        onYouTubeIframeAPIReady = function () {
            player = new YT.Player('player', {
                videoId: 'Oy9nUaoHoJw',  // youtube video id
                playerVars: {
                    'autoplay': 0,
                    'rel': 0,
                    'showinfo': 0,
                    'controls': 0
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        var p = document.getElementById ("player");
        // $(p).hide();

        var t = document.getElementById ("thumb-container");
        $(t).css({
            'background-image' : 'url(http://img.youtube.com/vi/Oy9nUaoHoJw/maxresdefault.jpg)'
        })

        onPlayerStateChange = function (event) {
            if (event.data == YT.PlayerState.ENDED) {
                $('#thumb-container').fadeIn('normal');
            }
        }

        function onPlayerReady(event) {
            var playButton = document.getElementById("start-video");
            playButton.addEventListener("click", function() {
                $("#thumb-container").hide();
                player.playVideo();
            });          
        }

        // Inject YouTube API script
        var tag = document.createElement('script');
        tag.src = "//www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag); 
    };

    var talk = function(){
        var btn      = $('#trigger-talk'),
            template = $('script[data-template="talk-modal"]').html();

        function hideTalkModal(){
            $('.js-slide').addClass('is-leaving');
            $('#talk-modal').removeClass('anim-finish');
            

            setTimeout(function(){
                $('#talk-modal').removeClass('active');
            }, 20);

            setTimeout(function(){
                $('#talk-modal').remove();
                $('html').removeClass('talk-active');
            }, 1200);
        };

        function showTalkModal(){
            $('html').addClass('talk-active');
            $('body').append(template);

            setTimeout(function(){
                $('#talk-modal').addClass('active');
                
                setTimeout(function(){
                    $('#talk-modal').addClass('anim-finish');
                    $('.js-slide').first().addClass('is-active');
                    $('input.form-control').focus();
                }, 600);
            }, 20);
        };

        btn.click(function(e){
            e.preventDefault();

            showTalkModal();

            if($('body').find('#talk-modal').html().length > 0){
                var field = $('.modal-field');

                field.keypress(function(e){
                    if(e.which == 13) {
                        e.preventDefault();
                        console.log('sdsd');
                        nextInput();
                    }
                })

                // next input field
                $('#talk-modal').on('click', '.btn-next', function(e){
                    e.preventDefault();
                    nextInput();
                });

                function nextInput(){
                    var item = $('.js-slide.is-active');
                    item.removeClass('is-active').addClass('is-leaving');
                    item.next().addClass('is-active');

                    // focusing input
                    $('input.form-control').focus();

                    // show dropdown
                    ddShow(field);

                    if($('.modal-field--success').prev().hasClass('is-active')){
                        $('#talk-form').addClass('form-last-input');
                    }

                    if($('.modal-field--success').hasClass('is-active')){
                        $('#talk-form').addClass('form-completed');
                    }
                };

                function ddShow(elem){
                    elem.each(function(){
                        var $this = $(this);

                        if($this.hasClass('is-active') && $(e.target).parents(".custom-dropdown").length == 0){
                            setTimeout(function(){
                                $this.find('.dropdown-toggle').dropdown('toggle');
                                $this.find('.custom-dropdown').addClass('show');
                            }, 1000);

                            dd($this);
                        }
                    });
                };

                function dd(el){
                    el.find('.dropdown-menu .dropdown-item').click(function(e){
                        var input = $(this).parents('.custom-dropdown').find('.dropdown-toggle');

                        e.preventDefault();

                        input.text($(this).text());

                        setTimeout(function(){
                            nextInput();
                        }, 100);
                    });
                };
            }

        });

        $('body').on('click', 'a#close-talk', function(e){
            e.preventDefault();
            hideTalkModal();
        });
    };

    var projects = function(){
        var grid = $('.grid'),
            item = $('.item');

        grid.isotope({
            // options
            itemSelector: '.item',
            layoutMode: 'masonry'
        });
    };

    var contact = function(){
        google.maps.event.addDomListener(window, 'load', contact);

        // map styling here
        var defaultStyle = 
            [
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural.terrain",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#0e0e0e"
                        }
                    ]
                }
            ]

        /* ==================== */

        // map center whole province here
        var province_center = new google.maps.LatLng(-6.082397, 85.457160);

        // locations & name detail
        var locations = [
          [-33.775948, 151.009349],
          [-6.169689, 106.808122],
          ];

        var mapOptions = {
            center: province_center,
            scrollwheel: false,
            styles: defaultStyle,
            zoom: 3,
            // draggable: false,
            disableDefaultUI: true
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        setMarkers(map,locations)


        // set markers coordinate
        function setMarkers(map,locations){
            var marker, i

            for (i = 0; i < locations.length; i++){
                var lat = locations[i][0]
                    long = locations[i][1]

                coordinate = new google.maps.LatLng(lat, long);

                var marker = new google.maps.Marker({  
                    map: map,
                    position: coordinate,
                    icon: 'assets/img/marker.png',
                    optimized: false
                    
                });

                map.setCenter(province_center)
            }
        }

        /* ==================== */

    };

    return{
        equalheight      : equalheight,
        ismobile         : ismobile,

        ready            : ready,
        sizing           : sizing,

        fullHeight       : fullHeight,
        minHeight        : minHeight,
        sliderOptions    : sliderOptions,

        aboutInteraction : aboutInteraction,
        video            : video,
        talk             : talk,
        projects         : projects,
        contact          : contact
    }

})();