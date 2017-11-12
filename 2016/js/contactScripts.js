function initContactScripts(){

    $li = $("ul.contact-list li");
    $nextCard = $("div.contacts span.group-control.next");
    $prevCard = $("div.contacts span.group-control.prev");
    var audio = document.getElementById("soundclip");
    
    var contactsLoaded = false;
    $("ul.contact-list").css({"opacity": "0"});
    if(contactsLoaded == false){
        $("ul.contact-list").fadeTo(2000,"1");
        $("li.on span.contact-pic img").imageTiles().parent().parent().find("span.contact-details p").hide().delay(1200).promise().done(function(){
            $(this).show().shuffleLetters();
        });
        contactsLoaded = true;
    }


    $("div.contacts span.group-control.next").on("click",function(){
        
        audio.play();
        if($prevCard.hasClass("hide")){
            $prevCard.removeClass("hide");
        }

        $liToOff = $("ul.contact-list li.on");
        if(!$liToOff.is(":last-child")){

            $liToOff.removeClass("on");
            $liToOff.next().addClass("on").promise().done(function(){
                $(this).find("span.contact-pic img").imageTiles().parent().parent().find("span.contact-details p").hide().delay(1200).promise().done(function(){
                        $(this).show().shuffleLetters();
                    });
            });

            if($liToOff.next().attr("data-next") == "" ){
                $nextCard.addClass("hide");
            }
        } 
    });

    $("div.contacts span.group-control.prev").on("click",function(){

        audio.play();
        if($nextCard.hasClass("hide")){
            $nextCard.removeClass("hide");
        }

        $liToOff = $("ul.contact-list li.on");
        if(!$liToOff.is(":first-child")){
            $liToOff.removeClass("on");
            $liToOff.prev().addClass("on").promise().done(function(){
                $(this).find("span.contact-pic img").imageTiles().parent().parent().find("span.contact-details p").hide().delay(1200).promise().done(function(){
                        $(this).show().shuffleLetters();
                    });
            });

            if($liToOff.prev().attr("data-prev") == "" ){
                $prevCard.addClass("hide");
            }
        }  
    });
};