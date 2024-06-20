import './bootstrap';
import $ from 'jquery';
import Inputmask from "inputmask";
$(document).ready(function() {
    // Примените маску к полю ввода номера автомобиля
    Inputmask({
        mask: "Z999ZZ99[9]",
        definitions: {
            'Z': {
                validator: "[АВЕКМНОРСТУХавекмнорстух]",
                casing: "upper"
            },
            '9': {
                validator: "[0-9]"
            }
        },
        // placeholder: "А111АА111",
        autoUnmask: true // Это удалит маску при отправке формы
    }).mask("#carNumber");
});
