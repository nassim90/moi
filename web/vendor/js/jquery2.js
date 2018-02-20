
$(function () {
    var theText = $('#form_title');
    var theOutputText = $('#out_title');
    var theOutputKeyPress = $("#theOutputKeyPress");
    var theOutputKeyDown = $("#theOutputKeyDown");
    var theOutputKeyUp = $("#theOutputKeyUp");
    var theOutputFocusOut = $("#theOutputFocusOut");

    theText.keydown(function (event) {
        keyReport(event, theOutputKeyDown);
    });

    theText.keypress(function (event) {
        keyReport(event, theOutputKeyPress);
    });


    theText.keyup(function (event) {
        keyReport(event, theOutputKeyUp);
    });

    theText.focusout(function (event) {
        theOutputFocusOut.html(".focusout() fired!");
    });

    theText.focus(function (event) {
        theOutputFocusOut.html(".focus() fired!");
    });

    function keyReport(event, output) {
        // catch enter key = submit (Safari on iPhone=10)
        if (event.which == 10 || event.which == 13) {
            event.preventDefault();
        }
        // show event.which
        output.html(event.which + "&nbsp;&nbsp;&nbsp;&nbsp;event.keyCode " + event.keyCode);
        // report invisible keys  
      
        // show field content
        theOutputText.text(theText.val());
    }
});

$(function () {
    var theText = $('#form_url');
    var theOutputText = $('#out_url');
    var theOutputKeyPress = $("#theOutputKeyPress");
    var theOutputKeyDown = $("#theOutputKeyDown");
    var theOutputKeyUp = $("#theOutputKeyUp");
    var theOutputFocusOut = $("#theOutputFocusOut");

    theText.keydown(function (event) {
        keyReport(event, theOutputKeyDown);
    });

    theText.keypress(function (event) {
        keyReport(event, theOutputKeyPress);
    });


    theText.keyup(function (event) {
        keyReport(event, theOutputKeyUp);
    });

    theText.focusout(function (event) {
        theOutputFocusOut.html(".focusout() fired!");
    });

    theText.focus(function (event) {
        theOutputFocusOut.html(".focus() fired!");
    });

    function keyReport(event, output) {
        // catch enter key = submit (Safari on iPhone=10)
        if (event.which == 10 || event.which == 13) {
            event.preventDefault();
        }
        // show event.which
        output.html(event.which + "&nbsp;&nbsp;&nbsp;&nbsp;event.keyCode " + event.keyCode);
        // report invisible keys  
      
        // show field content
        theOutputText.text(theText.val());
    }
});

$(function () {
    var theText = $('#form_description');
    var theOutputText = $('#out_richsnippet');
    var theOutputKeyPress = $("#theOutputKeyPress");
    var theOutputKeyDown = $("#theOutputKeyDown");
    var theOutputKeyUp = $("#theOutputKeyUp");
    var theOutputFocusOut = $("#theOutputFocusOut");

    theText.keydown(function (event) {
        keyReport(event, theOutputKeyDown);
    });

    theText.keypress(function (event) {
        keyReport(event, theOutputKeyPress);
    });


    theText.keyup(function (event) {
        keyReport(event, theOutputKeyUp);
    });

    theText.focusout(function (event) {
        theOutputFocusOut.html(".focusout() fired!");
    });

    theText.focus(function (event) {
        theOutputFocusOut.html(".focus() fired!");
    });

    function keyReport(event, output) {
        // catch enter key = submit (Safari on iPhone=10)
        if (event.which == 10 || event.which == 13) {
            event.preventDefault();
        }
        // show event.which
        output.html(event.which + "&nbsp;&nbsp;&nbsp;&nbsp;event.keyCode " + event.keyCode);
        // report invisible keys  
      
        // show field content
        theOutputText.text(theText.val());
    }
});

