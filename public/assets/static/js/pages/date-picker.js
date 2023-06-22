
flatpickr('.flatpickr-birth', {
    minDate: "2002-01",
    maxDate: "2010-12",
    defaultDate: "2004-01-01"
})
flatpickr('.flatpickr-start', {
    defaultDate: "today"
})
flatpickr('.flatpickr-range', {
    dateFormat: "F j, Y", 
    mode: 'range'
})
flatpickr('.flatpickr-range-preloaded', {
    dateFormat: "F j, Y", 
    mode: 'range',
    defaultDate: ["2016-10-10T00:00:00Z", "2016-10-20T00:00:00Z"]
})
flatpickr('.flatpickr-time-picker-24h', {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    inline: true
})