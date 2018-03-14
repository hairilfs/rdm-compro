$(function(){
    //Init on all pages

    // $('#hamburger').on('click',function(){
    //     $(this).toggleClass('is-active');
    // });
    ag.fullHeight('.fullheight-js');
    ag.minHeight('.minheight-js');
    

    $('a.link-scroll').click(function(e){
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('#landing-instructions').offset().top - $('#header').height()
        }, 500);
    });

    if($('.modal-tab').length){
        $('a.login').click(function(e){
            e.preventDefault();

            $('#register-modal').modal('hide');
            
            
            setTimeout(function(){
                $('body').addClass('modal-open');
                $('#login-modal').modal('show');
            },500);
        });

        $('a.register').click(function(e){
            e.preventDefault();

            $('#login-modal').modal('hide');
            
            
            setTimeout(function(){
                $('body').addClass('modal-open');
                $('#register-modal').modal('show');
            },500);
        });
    }

    // dicomment karena ini dipanggilnya dari gameplay.blade.php
    // if($('#wheel').length){
    //     ag.wheel();
    // }
});

$(window).load(function(){
    ag.sizing();
    ag.triangle();
});

$(window).resize(function(){
    ag.sizing();
    ag.fullHeight('.fullheight-js');
    ag.minHeight('.minheight-js');
});

$(window).scroll(function(){
    var windowScroll    = $(window).scrollTop();
});


//Global function starer()
var ag = (function(){
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
    }

    var triangle = function(){
        function randomFromTo(from, to){
            return Math.floor(Math.random() * (to - from + 1) + from);
        }

        function moveRandom(obj) {
            /* get container position and size
             * -- access method : cPos.top and cPos.left */
            var cPos = $('#accent').offset();
            var cHeight = $('#accent').height();
            var cWidth = $('#accent').width();
            
            // get box padding (assume all padding have same value)
            var pad = 50;
            
            // get movable box size
            var bHeight = obj.height();
            var bWidth = obj.width();
            
            // set maximum position
            maxY = cPos.top + cHeight - bHeight - pad;
            maxX = cPos.left + cWidth - bWidth - pad;
            
            // set minimum position
            minY = cPos.top;
            minX = cPos.left;
            
            // set new position         
            newY = randomFromTo(minY, maxY);
            newX = randomFromTo(minX, maxX);
            
            obj.animate({
                top: newY,
                left: newX
                }, 10000, function() {
                    moveRandom(obj);
            });

            // obj.animate({
            //     top: newY,
            //     left: newX
            //     }, 1000);
        }

        $('.triangle').each(function() {
            moveRandom($(this));
        });

        setTimeout(function(){
            $('.triangle').addClass('show');
        }, 1000);
    };

    var wheel = function(){
        // function loadJSON(callback) {
        //     var xobj = new XMLHttpRequest();
        //     xobj.overrideMimeType("application/json");
        //     xobj.open('GET', '../../wheel_data.json', true);
        //     xobj.onreadystatechange = function() {
        //         if (xobj.readyState == 4 && xobj.status == "200") {
        //             //Call the anonymous function (callback) passing in the response
        //             callback(xobj.responseText);
        //         }
        //     };
        //     xobj.send(null);
        // }

        //your own function to capture the spin results
        function myResult(e) {
            //e is the result object
            console.log('Spin Count: ' + e.spinCount + ' - ' + 'Win: ' + e.win + ' - ' + 'Message: ' + e.msg);

            if (e.win) {
                $('#win-modal').modal('show')
            } else {
                $('#lost-modal').modal('show')
            }
        }

        //your own function to capture any errors
        function myError(e) {
            //e is error object
            console.log('Spin Count: ' + e.spinCount + ' - ' + 'Message: ' + e.msg);
        }

        function myGameEnd(e) {

            //e is gameResultsArray
            console.log(e);
            TweenMax.delayedCall(5, function() {

                Spin2WinWheel.reset();

            })
        }

        function init() {
            var mySpinBtn = document.querySelector('.spinBtn');
            var myWheel = new Spin2WinWheel();

            // Backend needs, please don't delete this
            $.get(App.baseUrl+'gameplay/prize', function(response) {
                if (response.status) {
                    console.log(1, wheelDataObject)

                    wheelDataObject['colorArray'] = response.colorArray;
                    wheelDataObject['segmentValuesArray'] = response.segmentValuesArray;

                    console.log(2, wheelDataObject)

                    // last init
                    myWheel.init({
                        data: wheelDataObject,
                        onResult: myResult,
                        onGameEnd: myGameEnd,
                        onError: myError,
                        spinTrigger: mySpinBtn
                    });

                }

            }, 'json');

            
        }

        var wheelDataObject = {
            colorArray: [ "#D23427", "#3A8AC9", "#007C78", "#F0921F", "#FDD500", "#28B9A2", "#ED3158", "#84288F"],

            segmentValuesArray : [
                {type: "string", value : "PRIZE^1", win : true, resultText : "YOU WON PRIZE 1!"},
                {type: "string", value : "PRIZE^2", win : true, resultText : "YOU WON PRIZE 2!"},
                {type: "string", value : "PRIZE^3", win : true, resultText : "YOU WON PRIZE 3!"},
                {type: "string", value : "LOSE", win : false, resultText : "YOU WON PRIZE 4!"},
                {type: "string", value : "PRIZE^5", win : true, resultText : "YOU WON PRIZE 5!"},
                {type: "string", value : "LOSE", win : false, resultText : "YOU WON PRIZE 6!"},
                {type: "string", value : "PRIZE^7", win : true, resultText : "YOU WON PRIZE 7!"},
                {type: "string", value : "LOSE", win : false, resultText : "LOSE ALL"}
            ],

              svgWidth: 600,
              svgHeight: 600,
              wheelStrokeColor: "#fff",
              wheelStrokeWidth: 12,
              wheelSize: 500,
              wheelTextOffsetY: 80,
              wheelTextColor: "#EDEDED",  
              wheelTextSize: "1.25em",
              wheelImageOffsetY: 60,
              wheelImageSize: 40,
              centerCircleSize: 180,
              centerCircleStrokeColor: "#151f50",
              centerCircleStrokeWidth: 12,
              centerCircleFillColor: "#151f50",
              segmentStrokeColor: "#fff",
              segmentStrokeWidth: 0,
              centerX: 300,
              centerY: 300,  
              hasShadows: false,
              numSpins: -1,
              spinDestinationArray:[],
              minSpinDuration: 6,
              gameOverText:"THANK YOU FOR PLAYING SPIN2WIN WHEEL. COME AND PLAY AGAIN SOON!",
              invalidSpinText:"INVALID SPIN. PLEASE SPIN AGAIN.",
              introText:"",
              hasSound: false,
              gameId:"9a0232ec06bc431114e2a7f3aea03bbe2164f1aa",
              clickToSpin:false
        }


        //And finally call it
        init();
    }

    return{
        equalheight : equalheight,
        ismobile    : ismobile,
        sizing      : sizing,

        fullHeight  : fullHeight,
        minHeight   : minHeight,
        triangle    : triangle,
        wheel       : wheel
    }

})();