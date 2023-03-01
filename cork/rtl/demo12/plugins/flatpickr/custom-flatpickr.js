// Flatpickr

var f1 = flatpickr(document.getElementById('basicFlatpickr'));
var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    position: '800'
});
var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
    mode: "range",
});
var f4 = flatpickr(document.getElementById('timeFlatpickr'), {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "13:45"
});


var af1 = f1.config.onOpen.push(function(selectedDates, dateStr, instance) {
    // console.log(document.querySelectorAll('.flatpickr-calendar.open')[0]);
    document.querySelectorAll('.flatpickr-calendar.open')[0].style.right = parseInt($('.col-left').css('marginLeft')) + 'px';
    // console.log(parseInt($('.col-left').css('marginLeft')) + 'px')
})
var af2 = f2.config.onOpen.push(function(selectedDates, dateStr, instance) {
    // console.log(document.querySelectorAll('.flatpickr-calendar.open')[0]);
    document.querySelectorAll('.flatpickr-calendar.open')[0].style.right = parseInt($('.col-left').css('marginLeft')) + 'px';
    // console.log(parseInt($('.col-left').css('marginLeft')) + 'px')
})
var af3 = f3.config.onOpen.push(function(selectedDates, dateStr, instance) {
    // console.log(document.querySelectorAll('.flatpickr-calendar.open')[0]);
    document.querySelectorAll('.flatpickr-calendar.open')[0].style.right = parseInt($('.col-left').css('marginLeft')) + 'px';
    // console.log(parseInt($('.col-left').css('marginLeft')) + 'px')
})
var af4 = f4.config.onOpen.push(function(selectedDates, dateStr, instance) {
    // console.log(document.querySelectorAll('.flatpickr-calendar.open')[0]);
    document.querySelectorAll('.flatpickr-calendar.open')[0].style.right = parseInt($('.col-left').css('marginLeft')) + 'px';
    // console.log(parseInt($('.col-left').css('marginLeft')) + 'px')
})