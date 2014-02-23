// global variables for creating msg
msg = new Array();
var m_id;
var message;

// create image for pick up (fishing net)
var img = document.createElement('img');
img.src = '/img/fishing_net.png';
var div = document.getElementById('test');

// add image to div
img.onload = function() {
  div.appendChild(img);
};

// function for posting the reply
function post_reply()
{
    // variable that stores the reply and the message id
    var formData = {mid: m_id, msg: $('#reply').val()};
    $.ajax({
    
        // post to reply.oho
        url: "/reply.php",
        
        // method of POST
        method: "POST",
        
        // post the variable formData
        data: formData,
        
        // set async to false
        async: false,
        
        // if success, return true
        success: function(data){
        return true;
        },
    
    // if failed, alert the user
    }).fail(function() {
    alert("An error occurred.");
    });
}

// function for printing the message onto a pop-up modal!
function mprint(message){

// replace the last modal with new modal with replaceWith function
$('#pickup').replaceWith("<a id =\"pickup\">\
            <div aria-hidden='true' aria-labelledby='label' class='modal' id='pickup_modal' role='dialog' tabindex='-1'>\
            <div class='modal-dialog'>\
            <div class='modal-content'>\
                <div class='modal-header'>\
                    <h4 class='modal-title' id='label'>Your Message</h4>\
                </div>\
                <div class='modal-body'><p>"+ message +"\
                <form id='form' method='post'>\
                    <fieldset>\
                        <div class='form-group'>\
                            <textarea cols='40' rows='10' id='reply' autofocus class='form-control' name='message' placeholder='Begin writing your reply.' wrap=hard maxlength='750' required></textarea>\
                        </div>\
                        <div class='form-group'>\
                            <button class='btn btn-default' type='submit' onClick= \"post_reply()\">Reply</button>\
                        </div>\
                    </fieldset>\
                </form>\
            </p>\
            </div>\
            <div class='modal-footer'>\
                <button class='btn btn-default' data-dismiss='modal'>Throw back without reply</button>\
            </div>\
        </div>\
    </div>\
</div>\
</a>");
}

// when pickup image clicked, call pickup.php
$('#ocean').on('click','#test', function() {
    $.ajax({
        // get from pickup.php
        url: "/pickup.php",
        
        // method GET
        type: "GET",
        
        // makes sure the brwoser doesn't cache
        cache: false,
        async: false,
        
        // data passed is json
        dataType: "json",
        
        // if successful
        success: function(data) {
        
            // save data as msg
            msg = data;
            
            // save m_id and message itself
            m_id = msg["m_id"];
            message = msg["msg"];
            
            // call function to print message
            mprint(message);       
        },
    }) 
    // if fails, alert user
    .fail(function() {
    alert("Oops! Your net caught no bottles. Perhaps the ocean is empty of unreplied messages currently.");
    });
    
    // makes sure modal shows
    $('#pickup_modal').modal('show');
            
});


// add img2 for throwin (bottle image)
var img2 = document.createElement('img'); //new Image();
img2.src = '/img/Bottle.png';
var div2 = document.getElementById('test2');

// add it to div
img2.onload = function() {
  div2.appendChild(img2);
};

// when throwin image is clicked
$("#test2").click(function() {

    // add throw in modal
        $('#throwin').append("<div aria-hidden='true' aria-labelledby='label' class='modal' id='throwin_modal' role='dialog' tabindex='-1'>\
    <div class='modal-dialog'>\
        <div class='modal-content'>\
            <div class='modal-header'>\
                <h4 class='modal-title' id='label'>Write a message</h4>\
            </div>\
            <div class='modal-body'>\
                <p>\
                    <form id='form' action='throwin.php' method='post'>\
                        <fieldset>\
                            <div class='form-group'>\
                                <textarea cols='40' rows='10' autofocus class='form-control' name='message' placeholder='Begin writing your message.' wrap=hard required maxlength='750'></textarea>\
                            </div>\
                            <div class='form-group'>\
                                <button type='submit' class='btn btn-default' onClick=\"$.post('throwin.php', { message: $('form#form').val() })\">Throw into ocean</button>\
                            </div>\
                        </fieldset>\
                    </form>\
                </p>\
            </div>\
            <div class='modal-footer'>\
                <button class='btn btn-default' data-dismiss='modal'>Return to ocean</button>\
            </div>\
        </div>\
    </div>\
</div>");

    // makes sure throwin modal shows
    $('#throwin_modal').modal('show');
    
});
