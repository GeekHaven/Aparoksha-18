
/**
 * @constructor
 */
SOULWIRE.Stream = function( $context ) {
    
    this.MAX_TWEETS = 20;
    this.MAX_PHOTOS = 10;
    
    this.firstLoad  = true;
    
    this.$flickr    = $("section.flickr", $context);
    this.$github    = $("section.github", $context);
    this.$twitter   = $("section.twitter", $context);
    this.$wordpress = $("section.blog", $context);
    
    this.containers = {
        flickr: null,
        github: null,
        twitter: null,
        wordpress: null
    };
    this.templates  = {
        flickr:         $(".template", this.$flickr),
        github:         $(".template", this.$github),
        twitter:        $(".template", this.$twitter),
        wordpress:  $(".template", this.$wordpress)
    };
    
    this.regex      = {
        link: /http(s)?:\/\/[^\s]+/gi
    };
    
    // Call super constructor
    SOULWIRE.AbstractController.call( this, $context );
};

// Inherit from AbstractController
SOULWIRE.Stream.prototype = new SOULWIRE.AbstractController();
SOULWIRE.Stream.prototype.constructor = SOULWIRE.Stream;
SOULWIRE.Stream.prototype._super = SOULWIRE.AbstractController.prototype;

SOULWIRE.Stream.prototype.init = function() {
    
    // Create templates
    for(var type in this.templates) {
        var template = $(this.templates[type])
        this.containers[type] = template.parent();
        this.templates[type] = template.removeClass("template").remove();
    }
};

SOULWIRE.Stream.prototype.enable = function() {
    
    if( !this.enabled && this.firstLoad ) {
        // Load feeds
        this.$flickr.addClass( "loading" );
        //this.$github.addClass( "loading" );
        this.$twitter.addClass( "loading" );
        this.$wordpress.addClass( "loading" );
    }
    
    // Call super method
    this._super.enable.call( this );
};

SOULWIRE.Stream.prototype.show = function() {
    
    if( this.firstLoad ) {
        
        if(SOULWIRE.Twitter) {
            SOULWIRE.Twitter.getData( $.proxy(this.onTwitterResult, this) );
        }

        if(SOULWIRE.Wordpress) {
            SOULWIRE.Wordpress.getData( $.proxy(this.onWordpressResult, this) );
        }
        
        if(SOULWIRE.Flickr) {
            SOULWIRE.Flickr.getData( $.proxy(this.onFlickrResult, this) );
        }
        
        this.firstLoad = false;
    }
    
    // Call super method
    this._super.show.call( this );
};

SOULWIRE.Stream.prototype.makeLink = function( text ) {
    return text.replace( this.regex.link, function( link ) {
        return '<a href="' + link + '" target="_blank">' + link + '</a>';
    });
};

/**
 * @param {string} text
 * @param {number} length
 */
SOULWIRE.Stream.prototype.truncate = function( text, length ) {
    if(text.length <= length) { return text; }
    return text.substr(0,60).replace(/\s+$/, '') + "&hellip;";
};

SOULWIRE.Stream.prototype.fromASCII = function( ascii ) {
    return ascii.replace(/&#(\d+);/g, function (m, n) {
        return String.fromCharCode(n);
    });
};

SOULWIRE.Stream.prototype.onScroll = function(scroller) {
    var num = scroller.currentIndex + 1;
    scroller.$context.find(".corner").text( num < 10 ? '0' + num : num );
};

/**
 * TWITTER
 */

SOULWIRE.Stream.prototype.onTwitterResult = function( data ) {
    
    // Remove loader
    this.$twitter.removeClass( "loading" );
    
    for( var i = 0, j = 0, n = data.length; i < n; ++i ) {
        
        var item = data[i];
        var content = item['text'];
        var truncated = this.truncate(content, 60);
        
        // Ignore '@' replies
        if( !/^@/.test( content ) ) {
            
            // Activate links
            content = this.makeLink(content);
            truncated = this.makeLink(truncated);
            
            var date    = new Date(item['created_at']);
            var source  = "http://twitter.com/" + item['user']['screen_name'] + "/status/" + item['id'];
            var output  = this.templates.twitter.clone();
            var dateA   = $("<strong>").text( date.formatDate( "d" ) );
            var dateB   = $("<em>").text( date.formatDate( "M" ) );
            /*
            var dateA   = $("<strong>").text( date.formatDate( "d M" ) );
            var dateB   = $("<em>").text( date.formatDate( "h:i" ) );
            */
            var rtC     = item['retweet_count'];
            var RTStr   = rtC < 10 ? '0' + rtC : rtC;
            var RTed    = rtC > 0 ? "Retweeted " + (rtC > 1 ? (rtC + " times") : "once") : null;
            
            content += "<time>" + date.formatDate( "M dS, Y - H:iA" ) + "</time>";
            
            if( RTed ) {
                content += "<span>" + RTed + "</span>";
            }
            
            // Populate template
            output.data("source", item);
            output.find("blockquote").attr("cite", source).html(content);
            output.find("aside mark").html( truncated );
            output.find("aside time").attr("datetime", date).append(dateA).append(dateB);
            
            // Add retweet counter
            if( RTed ) {
                
                var retweets = $("<a>");
                retweets.addClass("retweets");
                retweets.attr("title", RTed);
                retweets.text(RTStr);
                output.find("aside").append( retweets );
                
            }
            
            // Append to container
            this.containers.twitter.append( output );
            
            if(++j >= this.MAX_TWEETS) {
                break;
            }
        }
    }
    
    // Initialise this sections scroll component
    var self = this,
            scroller = new SOULWIRE.Scroller( $(".scroller", this.$twitter) );
            
    scroller.onScroll(function(){
        self.onScroll(scroller);
    });
    
    // Refresh the view after height change
    SOULWIRE.SectionController.focusSection(false);
};

/**
 * WORDPRESS
 */

SOULWIRE.Stream.prototype.onWordpressResult = function( data ) {
    
    // Remove loader
    this.$wordpress.removeClass( "loading" );
    
    for( var i = 0, n = data.length; i < n; ++i ) {
        
        var item    = data[i];
        var date    = new Date(item['date']);
        var content = $("<div>");
        var output  = this.templates.wordpress.clone();
        var dateA   = $("<strong>").text( date.formatDate( "d" ) );
        var dateB   = $("<em>").text( date.formatDate( "M" ) );
        var title   = $("<h2>").text(item['title']);
        var excerpt = $("<div>").addClass("excerpt").text( this.fromASCII(item['excerpt']) );
        
        content.append(title);
        content.append(excerpt);
        content.append($("<time>").text( date.formatDate( "M dS, Y - H:iA" ) ));
        
        var view = $("<a>").addClass("link").attr("href", item['permalink']).attr("target", "_blank");
        view.html("Read: <strong>" + item['title'] + "</strong>");
        
        content.append( view );
        
        // Populate template
        output.find("blockquote").attr("cite", item['permalink']).html( content.html() );
        output.find("aside mark").html( item['title'] );
        output.find("aside time").attr("datetime", date).append(dateA).append(dateB);
        
        // Append to container
        this.containers.wordpress.append( output );
    }
    
    // Initialise this sections scroll component
    var self = this,
            scroller = new SOULWIRE.Scroller( $(".scroller", this.$wordpress) );
            
    scroller.onScroll(function(){
        self.onScroll(scroller);
    });
    
    // Refresh the view after height change
    SOULWIRE.SectionController.focusSection(false);
};

/**
 * Flickr
 */

SOULWIRE.Stream.prototype.onFlickrResult = function( data ) {
    
    // Remove loader
    this.$flickr.removeClass( "loading" );
    
    var items = data['items'];
    
    for( var i = 0, j = 0, n = items.length; i < n; ++i ) {
        
        var item        = items[i];
        var date        = new Date(item['date_taken']);
        var dateA       = $("<strong>").text( date.formatDate( "d" ) );
        var dateB       = $("<em>").text( date.formatDate( "M" ) );
        /*
        var dateA       = $("<strong>").text( date.formatDate( "d M" ) );
        var dateB       = $("<em>").text( date.formatDate( "h:i" ) );
        */
        var output  = this.templates.flickr.clone();
        var content = $("<div>").addClass('image-container');
        
        content.append($("<img>").attr("src", item['media']['m'].replace(/_m(\.\w+)$/, '_z$1')));
        
        var view = $("<a>").addClass("link").attr("href", item['link']).attr("target", "_blank");
        view.html("<strong>" + item['title'] + "</strong> on Flickr");
        
        var tags = $("<span>").addClass("tags");
        tags.text( "Tagged: " + item['tags'] );
        view.append( tags );
        
        content.append( view );
        
        // Populate template
        output.data("source", item);
        output.find("blockquote").attr("cite", item['link']).html(content);
        output.find("aside mark").html( item['title'] );
        output.find("aside time").attr("datetime", date).append(dateA).append(dateB);
        //content.after( view );
        // Append to container
        this.containers.flickr.append( output );
    }
    
    // Initialise this sections scroll component
    var self = this,
            scroller = new SOULWIRE.Scroller( $(".scroller", this.$flickr) );
            
    scroller.onScroll(function(){
        scroller.$context.find(".caption strong").text( scroller.currentItem.data("source")['title'] );
        scroller.$context.find(".caption em").text( scroller.currentItem.data("source")['tags'] );
    });
    
    // Refresh the view after height change
    SOULWIRE.SectionController.focusSection(false);
};