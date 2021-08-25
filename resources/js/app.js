require('./bootstrap');
require('admin-lte');
// https://github.com/vanilla-masker/vanilla-masker
window.VMasker = require('vanilla-masker');
window.Vue = require('vue');
// https://github.com/Pikaday/Pikaday
window.Pikaday = require('pikaday');

// https://github.com/axios/axios
const axios = require('axios');

// https://github.com/jshjohnson/Choices
window.Choices = require('choices.js');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



if (document.querySelectorAll(".date")) {
    VMasker(document.querySelectorAll(".date")).maskPattern("99/99/9999");
}

if (document.querySelectorAll(".month_year")) {
    VMasker(document.querySelectorAll(".month_year")).maskPattern("99/9999");
}

function inputHandler(masks, max, event) {
    let c = event.target;
    let v = c.value.replace(/\D/g, '');
    let m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}
  
let telMask = ['(99) 9999-99999', '(99) 99999-9999'];
let tel = document.querySelectorAll('.phone');
for (let el of tel) {
    VMasker(el).maskPattern(telMask[0]);
    el.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
}

let docMask = ['999.999.999-999', '99.999.999/9999-99'];
let doc = document.querySelectorAll('.documento');
let mask = 0;
for (let documento of doc) {
    if (documento.defaultValue.length == '' || documento.defaultValue.length == 14) {
        mask = 1;
    }
    VMasker(documento).maskPattern(docMask[mask]);
    documento.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);
}

VMasker(document.querySelectorAll('.cep')).maskPattern('99999-999');

VMasker(document.querySelectorAll(".number")).maskNumber();

VMasker(document.querySelectorAll(".money")).maskMoney({
    precision: 2,
    separator: ',',
    delimiter: '.',
    unit: '',
    zeroCents: false
});

var els = document.getElementsByClassName("datepicker");
Array.from(els).forEach((element) => {
    new Pikaday({
        field: element,
        format: 'D/M/YYYY',
        toString(date, format) {  
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            if (parseInt(day, 10) < 10) {
                day = 0 + day.toString();
            }
            if (parseInt(month, 10) < 10) {
                month = 0 + month.toString();
            }
            return `${day}/${month}/${year}`;
        },
        parse(dateString, format) {
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1;
            const year = parseInt(parts[2], 10);
            return new Date(year, month, day);
        },
        i18n: {
            previousMonth : 'Mês Anterior',
            nextMonth     : 'Próximo Mês',
            months        : ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            weekdays      : ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            weekdaysShort : ['Dom','Seg','Ter','Qua','Qui','Sex','Sab']
        }
    });

    
});

const choicesConfig = {
    noResultsText: 'No results',
    noChoicesText: 'No more choices',
    itemSelectText: 'Click to select',
    loadingText: 'Loaging...',
    removeItemButton: false,
};
/*choicesConfig.removeItemButton = true;
if (document.getElementById('languages')) {
    new Choices(document.getElementById('languages'), choicesConfig);
}
if (document.getElementById('roles')) {
    new Choices(document.getElementById('roles'), choicesConfig);
}*/