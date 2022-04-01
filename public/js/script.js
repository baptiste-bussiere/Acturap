ScrollReveal().reveal('body');
ScrollReveal().reveal(".news_title ", {
    delay: 300
});
ScrollReveal().reveal("#card_1 ", {
    delay: 100
});
ScrollReveal().reveal("#card_2 ", {
    delay: 200
});
ScrollReveal().reveal("#card_3 ", {
    delay: 300
});
ScrollReveal().reveal("#card_4 ", {
    delay: 400
});
ScrollReveal().reveal("#card_5 ", {
    delay: 500
});
ScrollReveal().reveal("#card_6 ", {
    delay: 600
});
ScrollReveal().reveal("#card_7 ", {
    delay: 700
});
ScrollReveal().reveal("#card_8 ", {
    delay: 800
});
ScrollReveal().reveal("#card_9 ", {
    delay: 900
});
ScrollReveal().reveal("#card_10 ", {
    delay: 1000
});

ScrollReveal().reveal("#artiste_1 ", {
    delay: 100
});
ScrollReveal().reveal("#artiste_2 ", {
    delay: 200
});
ScrollReveal().reveal("#artiste_3 ", {
    delay: 300
});
ScrollReveal().reveal("#artiste_4 ", {
    delay: 400
});
ScrollReveal().reveal("#artiste_5 ", {
    delay: 500
});
ScrollReveal().reveal("#artiste_6 ", {
    delay: 600
});
ScrollReveal().reveal("#artiste_7 ", {
    delay: 700
});
ScrollReveal().reveal("#artiste_8 ", {
    delay: 800
});
ScrollReveal().reveal(".album_1 ", {
    delay: 100
});
ScrollReveal().reveal(".album_2 ", {
    delay: 200
});
ScrollReveal().reveal(".album_3 ", {
    delay: 300
});
ScrollReveal().reveal(".album_4 ", {
    delay: 400
});
ScrollReveal().reveal(".album_5 ", {
    delay: 500
});

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {

    var currentScrollpos = window.pageYOffset;
    if (prevScrollpos > currentScrollpos) {
        document.getElementById("navbar").style.top = "0 ";
    } else {
        document.getElementById("navbar").style.top = "-100px ";
    }

    prevScrollpos = currentScrollpos;

}

$(document).ready(function() {
    $("#second_artiste").hide();
    $('#show_artiste').click(function() {
        $('#second_artiste').slideToggle("slow");
        $("#second_artiste").show();
    });

});

$(document).ready(function() {
    $("#second_news").hide();
    $('#show_news').click(function() {
        $('#second_news').slideToggle("slow");
        $("#second_news").show();
    });

});
$(document).ready(function() {
    $("#second_album").hide();
    $('#show_album').click(function() {
        $('#second_album').slideToggle("slow");
        $("#second_album").show();
    });

});
$("a").on('click', function(event) {

    if (this.hash !== "") {
        event.preventDefault();

        var hash = this.hash;


        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function() {


            window.location.hash = hash;
        });
    }

});


$(document).ready(function() {
    $("#cache").slideUp(300).delay(2000).fadeIn(400);
    $("#button").click(function() {
        $("#cache").hide();

    });

});