
$( document ).ready(function() {

    //$("#submit").prop('disabled',true);
    $("#send").on('click', function(event){
        event.preventDefault();
        let submit = true;
        checkUser( submit );

    })
});