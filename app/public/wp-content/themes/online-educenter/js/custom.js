jQuery(document).ready(function($) { 
    /**
     * Add RTL Class in Body
    */
    
    var brtl = false;
    if ($("body").hasClass('rtl')) {
        brtl = true;
    }

    /**
     * AboutUs Section Accordion
     */
     $( "#edu-accordion" ).accordion({
        heightStyle: "content"
      });

});