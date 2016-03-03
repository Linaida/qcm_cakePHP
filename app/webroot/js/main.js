/**
 * Created by Linda on 11/11/2015.
 */
function switch_div( next_div){
    var current_div = $('div.show');
    var questions_reponses= $('#div_questions_reponses.show');
    //console.log(current_div);
if($(questions_reponses)){
    $('.table').addClass('show');
    $('.table').removeClass('hide');
}

    $(current_div).removeClass('show');
    $(current_div).removeClass('active');
    $(current_div).addClass('hide');

    $(next_div).removeClass('hide');
    $(next_div).addClass('show');
    $(next_div).addClass('active');
    $(document).resize()
}

function switch_form(next_div){
    var current_div = $('div.has_form.show');
    $('.table').addClass('hide');
    $('.table').removeClass('show');
    $(current_div).removeClass('show');
    $(current_div).removeClass('active');
    $(current_div).addClass('hide');

    $(next_div).removeClass('hide');
    $(next_div).addClass('show');
    $(next_div).addClass('active');
    $(document).resize()
}
 function modify_question(){
     var div_form_update = $('#form_update_question_reponse');
        div_form_update.removeClass('hide');
        div_form_update.addClass('show');
     var form_update = $('#form_update_question_reponse form');
     //$(form_update)

 }

$(document).ready(function(){
    $('a.supprimer_question').on('click',function(event){
        var confirm = window.confirm("Etes vous sur de vouloir supprimer la question ?");
        if(confirm){

        }else{
            event.preventDefault();
        }

    });

        $( "#QcmDateLimite" ).datepicker({
            showOn: "both",
            buttonImage: "https://www.webchurchconnect.com/admin/images/datepicker.gif",
            buttonImageOnly: true,
            dateFormat: "yy-mm-dd",
            buttonText: "Entrer la date"
        });


});
