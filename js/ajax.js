var AJAX = AJAX || {};

AJAX.calls = {

    fortmatDate: function(rawDate){
        var values = {raw_date: rawDate};
        $.ajax({
            url: '/ajax/format_date',
            data: values,
            type: 'POST',
            success: function(success){
                if(success.length > 0){
                    $("#formattedDate").val(success);
                }
            }
        });
    },
    generateCalendar: function(month, year){
        var values = {month_value: month, year_value: year};
        $.ajax({
            url: 'ajax/generate_calendar',
            data: values,
            type: 'POST',
            success: function(success){
                MODEL.elems.calendar.innerHTML=success;
            }
        });
    }

}
