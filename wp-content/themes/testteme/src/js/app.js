import $ from "jQuery";
import Inputmask from "inputmask";

$(function(){
    new Inputmask("+7 (999) 999-99-99").mask($("[type=\"tel\"]"));

    $(".btn_modal").on("click", function(e){
        e.preventDefault();

        $(".modal").addClass("active");
        $(".modal").find(".form_title").text($(this).text());
    });

    $(".form_close").on("click", function(){
        $(".modal").removeClass("active");
    });

    $(".btn_close").on("click", function(){
        $(".result").removeClass("active");
    });
});

document.addEventListener('DOMContentLoaded', () => {
    let orderForms = document.querySelectorAll('.fos');
    orderForms.forEach((form) => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            let subjectText = document.querySelector('.modal').querySelector('.form_title').innerText;

            let formData = new FormData(form);
            formData.append('subject', subjectText);

            fetch('./wp-content/themes/testteme/handler_mail.php', {
                method: 'POST',
                body: formData
            })
            .then((response) => response.json())
            .then((result) => {
                document.querySelector('.modal').classList.remove('active');
                document.querySelector('.result').classList.add('active');
                document.querySelector('.result').querySelector('h2').innerText = result.message;
                document.querySelector('.result').querySelector('p').innerText = result.submessage;
                if(result.status == 'error'){
                    document.querySelector('.result').querySelector('.btn').innerText = 'Повторить';
                }else{
                    document.querySelector('.result').querySelector('.btn').innerText = 'На главную';
                    form.reset();
                    form.querySelector('.btn_fos').classList.add('btn_fos--ok');
                    form.querySelector('.btn_fos').innerText = 'Отправлено';
                    form.querySelector('.btn_fos').setAttribute('disabled', true);
                }
            });
        });
    });
});