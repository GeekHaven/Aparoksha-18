$(document).ready(function(){    
    var contactsLoaded = false;
    $li = $("ul.contact-list li");
    $next = $("div.contacts span.group-control.next");
    $prev = $("div.contacts span.group-control.prev");

    $(window).on("scroll",function(){
        if(contactsLoaded == false){
            if(window.pageYOffset > 2.1 * window.innerHeight){
                $("li.on span.contact-pic img").solidTiles().parent().parent().find("span.contact-details p").hide().delay(1200).promise().done(function(){
                        $(this).show().shuffleLetters();
                    });
                contactsLoaded = true;
            }
        }
    });

    $prev.hide();
    nextContacts = $("ul.contact-list li.on").attr("data-next");
    $next.find("p").text(nextContacts);

    $next.on("click",function(){
        $liToOff = $("ul.contact-list li.on");
        if(!$liToOff.is(":last-child")){
            $liToOff.removeClass("on");
            $liToOff.next().addClass("on");
            
            $prev.show();
            prevContacts = $("ul.contact-list li.on").attr("data-prev");
            $prev.find("p").text(prevContacts);

            nextContacts = $("ul.contact-list li.on").attr("data-next");
            $next.find("p").text(nextContacts);
            
            $liToOff.next().promise().done(function(){
                $(this).find("span.contact-pic img").solidTiles().parent().parent().find("span.contact-details p").hide().delay(1200).promise().done(function(){
                        $(this).show().shuffleLetters();
                    });
            });
        }
        if($liToOff.is(":nth-last-child(2)")){
            $next.hide();
        }        
    });

    $prev.on("click",function(){
        $liToOff = $("ul.contact-list li.on");
        
        if(!$liToOff.is(":first-of-type")){
            $liToOff.removeClass("on");
            if($liToOff.prev().hasClass("group")){
                $liToOff.prev().addClass("on");
                
                $next.show();
                nextContacts = $("ul.contact-list li.on").attr("data-next");
                $next.find("p").text(nextContacts);

                prevContacts = $("ul.contact-list li.on").attr("data-prev");
                $prev.find("p").text(prevContacts);
                
                $liToOff.prev().promise().done(function(){
                    $(this).find("span.contact-pic img").solidTiles().parent().parent().find("span.contact-details p").hide().delay(1200).promise().done(function(){
                            $(this).show().shuffleLetters();
                        });
                });  
            }
        }

        if($liToOff.prev().is(":first-of-type")){
            $prev.hide();
        }        
    });
});
