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
    },
    validateCoupon: function(couponCode){
        var values = {coupon_name: couponCode};
        $.ajax({
            url: '/ajax/validate_coupon',
            data: values,
            type: 'POST',
            success: function(success){
                if(success.length > 0){
                    var couponObj = $.parseJSON(success);
                    // console.log(couponObj.coupon_expired);
                    if(couponObj.coupon_expired === "true"){
                        MODEL.elems.couponError.textContent="Coupon has expired";
                        MODEL.elems.couponError.style.display="block";
                        return false;
                    }else if(couponObj.coupon_disabled === "true"){
                        MODEL.elems.couponError.textContent="Coupon not available";
                        MODEL.elems.couponError.style.display="block";
                        return false;
                    }else if(couponObj.invalid_coupon === "true"){
                        MODEL.elems.couponError.textContent="Invalid coupon";
                        MODEL.elems.couponError.style.display="block";
                        return false;
                    }else{
                        var parsedTotal =  Number(parseFloat(MODEL.elems.orderTotal.value).toFixed(2)), couponAmount, totalMinusCoupon;
                        couponAmount = parseFloat(couponObj.coupon_amount)
                        totalMinusCoupon = parsedTotal - couponAmount;
                        MODEL.elems.orderTotal.value=totalMinusCoupon.toFixed(2);
                        MODEL.elems.couponAmountDisplay.textContent='-$'+ couponAmount.toFixed(2);
                        MODEL.elems.serviceTotal.value=totalMinusCoupon.toFixed(2);
                        MODEL.elems.totalDisplay.textContent='$'+totalMinusCoupon.toFixed(2);
                        if(MODEL.elems.selectedCity.value != ""){
                            APP.events.updateTaxRate();
                        }
                        MODEL.elems.couponCode.remove();
                        MODEL.elems.couponInputDisplay.textContent="Coupon Applied";
                        MODEL.elems.couponApplied.value=couponObj.coupon_name;
                    }
                }
            }
        });
    }

}
