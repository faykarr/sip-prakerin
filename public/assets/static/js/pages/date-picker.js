
flatpickr('.flatpickr-birth', {
    minDate: "2002-01",
    maxDate: "2010-12",
    defaultDate: "01-01-2004",
    dateFormat: "d-m-Y",
})
flatpickr('.flatpickr-start', {
    defaultDate: "today",
    dateFormat: "d-m-Y",
})
flatpickr('.flatpickr-time', {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true
})

flatpickr('.flatpickr-no-config', {
    dateFormat: "Y-m-d", 
})
flatpickr('.flatpickr-always-open', {
    inline: true
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
    inline: true,
    time_24hr: true
})