$(function(){
    //Init on all pages
    rdm.fullHeight('.fullheight-js');
    rdm.minHeight('.minheight-js');

    rdm.ready();
    rdm.video();
    

    $('.link-scroll').each(function(){
        $(this).click(function(e){
            e.preventDefault();

            $('html, body').animate({
                scrollTop: ($($.attr(this, 'href')).offset().top - $('#header').height())
            }, 500);

            $('.link-scroll.active').removeClass('active');
            $(this).addClass('active');
        })
    })

    $('a#back-top').click(function(e){
        e.preventDefault();

        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

    $('#burger').click(function(){
        $(this).toggleClass('active');
    })
});

$(window).load(function(){
    rdm.sizing();

    
});

$(window).resize(function(){
    rdm.sizing();
    rdm.fullHeight('.fullheight-js');
    rdm.minHeight('.minheight-js');

    rdm.ready();
});

$(window).scroll(function(){
    var windowScroll    = $(window).scrollTop();

    if(windowScroll > 1){
        $('#header').addClass('scrolled');
    } else {
        $('#header').removeClass('scrolled');
    }
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
        $('main').css({
            'padding-top': $('#header').height() + 'px'
        });

        setTimeout(function(){
            $('body').addClass('loaded');
        }, 100);
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

    var video = function(){
        var player;

        onYouTubeIframeAPIReady = function () {
            player = new YT.Player('player', {
                videoId: 'X0JeAvp_B24',  // youtube video id
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
            'background-image' : 'url(http://img.youtube.com/vi/X0JeAvp_B24/maxresdefault.jpg)'
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
    }

    return {
        equalheight : equalheight,
        ismobile    : ismobile,

        ready       : ready,
        sizing      : sizing,

        fullHeight  : fullHeight,
        minHeight   : minHeight,

        video       : video
    }

})();