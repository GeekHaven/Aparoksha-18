
Date.replaceChars = {
    
    shortMonths: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    longMonths: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    shortDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    longDays: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
    
    // Day
    'd': function(_d) { return (_d.getDate() < 10 ? '0' : '') + _d.getDate(); },
    'D': function(_d) { return Date.replaceChars.shortDays[_d.getDay()]; },
    'j': function(_d) { return _d.getDate(); },
    'l': function(_d) { return Date.replaceChars.longDays[_d.getDay()]; },
    'N': function(_d) { return _d.getDay() + 1; },
    'S': function(_d) { return (_d.getDate() % 10 == 1 && _d.getDate() != 11 ? 'st' : (_d.getDate() % 10 == 2 && _d.getDate() != 12 ? 'nd' : (_d.getDate() % 10 == 3 && _d.getDate() != 13 ? 'rd' : 'th'))); },
    'w': function(_d) { return _d.getDay(); },
    'z': function(_d) { var d = new Date(_d.getFullYear(),0,1); return Math.ceil((this - d) / 86400000); }, // Fixed now
    // Week
    'W': function(_d) { var d = new Date(_d.getFullYear(), 0, 1); return Math.ceil((((this - d) / 86400000) + d.getDay() + 1) / 7); }, // Fixed now
    // Month
    'F': function(_d) { return Date.replaceChars.longMonths[_d.getMonth()]; },
    'm': function(_d) { return (_d.getMonth() < 9 ? '0' : '') + (_d.getMonth() + 1); },
    'M': function(_d) { return Date.replaceChars.shortMonths[_d.getMonth()]; },
    'n': function(_d) { return _d.getMonth() + 1; },
    't': function(_d) { var d = new Date(); return new Date(d.getFullYear(), d.getMonth(), 0).getDate() }, // Fixed now, gets #days of date
    // Year
    'L': function(_d) { var year = _d.getFullYear(); return (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)); },                // Fixed now
    'o': function(_d) { var d     = new Date(_d.valueOf());    d.setDate(d.getDate() - ((_d.getDay() + 6) % 7) + 3); return d.getFullYear();}, //Fixed now
    'Y': function(_d) { return _d.getFullYear(); },
    'y': function(_d) { return ('' + _d.getFullYear()).substr(2); },
    // Time
    'a': function(_d) { return _d.getHours() < 12 ? 'am' : 'pm'; },
    'A': function(_d) { return _d.getHours() < 12 ? 'AM' : 'PM'; },
    'B': function(_d) { return Math.floor((((_d.getUTCHours() + 1) % 24) + _d.getUTCMinutes() / 60 + _d.getUTCSeconds() / 3600) * 1000 / 24); }, // Fixed now
    'g': function(_d) { return _d.getHours() % 12 || 12; },
    'G': function(_d) { return _d.getHours(); },
    'h': function(_d) { return ((_d.getHours() % 12 || 12) < 10 ? '0' : '') + (_d.getHours() % 12 || 12); },
    'H': function(_d) { return (_d.getHours() < 10 ? '0' : '') + _d.getHours(); },
    'i': function(_d) { return (_d.getMinutes() < 10 ? '0' : '') + _d.getMinutes(); },
    's': function(_d) { return (_d.getSeconds() < 10 ? '0' : '') + _d.getSeconds(); },
    'u': function(_d) { var m = _d.getMilliseconds(); return (m < 10 ? '00' : (m < 100 ? '0' : '')) + m; },
    // Timezone
    'e': function(_d) { return "Not Yet Supported"; },
    'I': function(_d) { return "Not Yet Supported"; },
    'O': function(_d) { return (-_d.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(_d.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(_d.getTimezoneOffset() / 60)) + '00'; },
    'P': function(_d) { return (-_d.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(_d.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(_d.getTimezoneOffset() / 60)) + ':00'; }, // Fixed now
    'T': function(_d) { var m = _d.getMonth(); _d.setMonth(0); var result = _d.toTimeString().replace(/^.+ \(?([^\)]+)\)?$/, '$1'); _d.setMonth(m); return result;},
    'Z': function(_d) { return -_d.getTimezoneOffset() * 60; },
    // Full Date/Time
    'c': function(_d) { return _d.formatDate("Y-m-d\\TH:i:sP"); }, // Fixed now
    'r': function(_d) { return _d.toString(); },
    'U': function(_d) { return _d.getTime() / 1000; }
};

/**
 * Simulates PHP's date function
 * @see http://jacwright.com/projects/javascript/date_format/
 * @param {string} format
 */
Date.prototype.formatDate = function(format) {
    var returnStr = '';
    var replace = Date.replaceChars;
    for (var i = 0; i < format.length; i++) {
        var curChar = format.charAt(i);
        if (i - 1 >= 0 && format.charAt(i - 1) == "\\") {
            returnStr += curChar;
        }
        else if (replace[curChar]) {
            returnStr += replace[curChar](this);
        } else if (curChar != "\\"){
            returnStr += curChar;
        }
    }
    return returnStr;
};