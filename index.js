jQuery(document).ready(function($){
    $("#banner").cycle({ 
        fx: 'fade',
        timeout: 5000,
        speed: 2000,
        pause: 1,
        fit: 1
    });
 $("#grb").cycle({ 
        speed:    3000,
        timeout:  3000,
        shuffle:  {left:-300, top:30},
        clip:     'zoom',
        fx:       'fade',
        before:   function(c,n,o) {$(o.caption).html(o.currFx);},
        caption:  '#caption1',
        next: $("#arrow-right"),
        prev: $("#arrow-left")
    });
    $("#slider").cycle({ 
        speed:    3000,
        timeout:  3000,
        shuffle:  {left:-300, top:30},
        clip:     'zoom',
        fx:       'fade',
        before:   function(c,n,o) {$(o.caption).html(o.currFx);},
        caption:  '#caption1',
        next: $("#slideright"),
        prev: $("#slideleft")
    });
})