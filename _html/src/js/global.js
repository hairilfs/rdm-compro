$(function(){
    //Init on all pages

    rdm.ready();
    rdm.headerMenu();
    rdm.talk();

    rdm.fullHeight('.fullheight-js');
    rdm.minHeight('.minheight-js');

    rdm.sliderOptions();
    rdm.fancybox();

    $('a.link-scroll').click(function(e){
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('#home-about').offset().top - $('#header').height()
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
        particlesJS('particles-js',

            {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#0e0e0e"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 1,
                            "color": "#ffffff"
                        },
                        "polygon": {
                            "nb_sides": 5
                        }
                    },
                    "opacity": {
                        "value": 0,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 5,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": false,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "window",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": false,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            }
        );

        rdm.aboutInteraction();
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

    $('#subscribe-modal').modal('show');
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

        if($('body.company').length){
            $('main').css({
                'padding-top': $('#header').height() + 'px'
            });
        };

        if($('body.project-detail').length){
            $('main #project-name').css({
                'padding-top': $('#header').height() + 'px'
            });
        };

        if($('body.project.ongoing').length){
            $('main #landing-intro').css({
                'padding-top': $('#header').height() + 'px'
            });
        };

        setTimeout(function(){
            $('body').addClass('loaded');
        }, 400);
    }

    var sizing = function(){
        if($(window).width() < 1199){
            $('#project-body .filter-header a').click(function(e){
                $(this).parents('.filter-header').next().slideToggle(200);
            })
        }
    }

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
            margin             : 20,
            animateOut         : 'fadeOut',

            autoplay           : true,
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

        var option2 = {
            items              : 1,

            autoplay           : false,
            autoplayTimeout    : 6000,
            autoplaySpeed      : 800,
            slideSpeed         : 800,
            navSpeed           : 800,
            dotsSpeed          : 800,
            dragEndSpeed       : 800,

            loop               : false,

            dots               : true,
            mouseDrag          : false,
            touchDrag          : false,

            nav                : true,
            navText: [
                '<a class="s_nav prev"><i class="icon-left-open-big"></i></a>',
                '<a class="s_nav next"><i class="icon-right-open-big"></i></a>'
            ],

            onInitialized : function(event){
                var item = $('.owl-carousel').find('.item');

                $(item).addClass('loaded');
            }
        };

        if($('#sliderHome').length){
            $('#sliderHome').owlCarousel(option1);
        };

        if($('#sliderTesti').length){
            $('#sliderTesti').owlCarousel(option2);

            dotcount = 1;
            slidecount = 1;

            $('.owl-dot').each(function() {
                $( this ).addClass( 'dotnumber-' + dotcount);
                $( this ).attr('data-info', dotcount);

                dotcount = dotcount + 1;
            });

            $('.owl-item').not('.cloned').each(function() {
                $( this ).addClass( 'slidenumber-' + slidecount);

                slidecount = slidecount + 1;
            });

            $('.owl-dot').each(function() {
                    
                grab = $(this).data('info');

                slidegrab = $('.slidenumber-'+ grab +' img').attr('src');
                console.log(slidegrab);

                $(this).find('span').css("background-image", "url("+slidegrab+")");  

            });
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

    var fancybox = function(){
        if($('#yt-player').length) {
            var player = $('[data-fancybox="video"]');

            player.fancybox({
                youtube : {
                    controls : 0,
                    showinfo : 0,
                    closeClickOutside : true
                }
            });
        };

        if($('[data-fancybox="project"]').length){
            var item = $('[data-fancybox="project"]');

            item.fancybox({
                buttons: false,
                closeClickOutside : true
            });
        }
    };

    var headerMenu = function(){
        var btn      = $('#burger'),
            template = $('script[data-template="header-menu"]').html();

        function hideTalkModal(){
            $('#header-menu').removeClass('active');

            setTimeout(function(){
                $('#header-menu').remove();
                $('html').removeClass('menu-active');
            }, 600);
        };

        function showTalkModal(){
            $('html').addClass('menu-active');
            $('body').append(template);

            setTimeout(function(){
                $('#header-menu').addClass('active');
            }, 20);
        };

        btn.click(function(e){
            e.preventDefault();
            

            if($('html').hasClass('menu-active')){
                hideTalkModal();
            } else {
                showTalkModal();
            }

            // if($('body').find('#header-menu').html().length > 0){
            //     alert('sdsd');
            //     hideTalkModal();
            // }
        });
    };

    var talk = function(){
        var btn      = $('.btn-trigger-talk'),
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

            if($(document).find('#talk-modal').html().length){
                console.log('talk modal appended');
                var field = $('.modal-field');

                field.keypress(function(e){
                    if(e.which == 13) {
                        e.preventDefault();
                        console.log('enter pressed');

                        nextInput();
                    }
                });

                // next input field
                $('#talk-modal').on('click', '.btn-next', function(e){
                    e.preventDefault();
                    nextInput();
                });

                function nextInput(){
                    var item = $('.js-slide.is-active');
                    var help = $('#input_help').val();
                    var curr_val = item.find('.form-control').length ? item.find('.form-control').val() : help;

                    if (!curr_val.trim()) {
                        return false;
                    }

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
                        // $('#talk-form').addClass('form-completed');

                        $.post(App.baseUrl+'talk', $('#talk-form').serialize() , function(response){
                            if (response.status) {
                                $('#talk-form').addClass('form-completed');
                            } 
                        }, 'json');
                        
                    }
                };

                function ddShow(elem){
                    elem.each(function(e){
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
                        $('#input_help').val($(this).text().trim());

                        setTimeout(function(){
                            nextInput();
                        }, 100);
                    });
                };
            }
        };

        $('body').on('click', '.btn-trigger-talk', function(e){
            e.preventDefault();

            $('#header-menu').removeClass('active');

            setTimeout(function(){
                $('#header-menu').remove();
                $('#burger').removeClass('active');
                $('html').removeClass('menu-active');
            }, 600);

            setTimeout(function(){
                showTalkModal();
            }, 600);

            

        });

        $('body').on('click', 'a#close-talk', function(e){
            e.preventDefault();
            hideTalkModal();
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

        // bind filter button click
        $('.filter-list').on('click', '.filter-js', function(e) {
            e.preventDefault();
            var filterValue = $(this).attr('data-filter');
            var text        = $(this).text();

            grid.isotope({
                filter: filterValue
            });

            if($(window).width() < 1199) {
                $(this).parents('.filter-list').slideUp(200);
                $(this).parents('.filter-list').prev().children().text(text);
            }
        });

        // change is-checked class on buttons
        $('.filter-list').each(function(i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);

            $buttonGroup.on('click', '.filter-js', function() {
                $buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
            });
        });
    };

    var company = function(){
        var textOffsetLeft = $('.intro-text h1').offset().left;

        console.log(textOffsetLeft);

        $('.intro-image.image-offset').css({
            'margin-left': textOffsetLeft + 'px'
        })
    }

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
        var province_center = new google.maps.LatLng(-12.516544, 127.230560);

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
        fancybox         : fancybox,
        headerMenu       : headerMenu,
        talk             : talk,
        projects         : projects,
        company          : company,
        contact          : contact
    }

})();