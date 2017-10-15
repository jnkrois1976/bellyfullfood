var APP = APP || {},
    DATA = DATA || {},
    MODEL = MODEL || {};

DATA.order = {
    currentSelections: []
};
DATA.cityZipCodes = {
    'Boca Raton': ['33427','33428','33429','33431','33432','33433','33434','33464','33481','33486','33487','33488','33496','33497','33498','33499'],
    'Delray Beach': ['33444','33445','33446','33448','33482','33483','33484'],
    'Coral Springs': ['33065','33067','33071','33073','33075','33076','33077'],
    'Parkland': ['33067','33073','33076']
};

MODEL.elems = {
    mealQty: document.getElementsByClassName('mealQty'),
    addToCartBtn: document.getElementById('addToCartBtn'),
    addToCartForm: document.getElementById('addToCartForm'),
    selections: document.getElementById('selections'),
    pickupDate: document.getElementsByClassName('pickUpDay'),
    monthNav: document.getElementsByClassName('monthNav'),
    calendar: document.getElementById('pickUpDate'),
    pickUpDateStatic: document.getElementById('pickUpDate'),
    rawDate: document.getElementById('rawDate'),
    errorMessage: document.getElementById('errorMessage'),
    deliveryFields: document.getElementsByClassName('deliveryAddress'),
    billingAddress: document.getElementsByClassName('billingAddress'),
    billingField: document.getElementsByClassName(' billingField'),
    selectedCity: document.getElementById('selectedCity'),
    deliveryZip: document.getElementById('deliveryZip'),
    taxRateInput: document.getElementById('taxRate'),
    orderTotal: document.getElementById('orderTotal'),
    serviceTotal: document.getElementById('serviceTotal'),
    taxesTotal: document.getElementById('taxesTotal'),
    taxesDisplay: document.getElementById('taxesDisplay'),
    totalDisplay: document.getElementById('totalDisplay'),
    loading: document.getElementById('loading'),
    mealCount: document.getElementById('mealCount'),
    couponCode: document.getElementById('couponCode'),
    couponAmountDisplay: document.getElementById('couponAmountDisplay'),
    couponInputDisplay: document.getElementById('couponInputDisplay'),
    couponApplied: document.getElementById('couponApplied'),
    couponError: document.getElementById('couponError')
};

APP.events = {
    editInputEvent: function(event){
        event.target.removeAttribute('readonly');
    },
    disableInput: function(event){
        event.target.setAttribute('readonly', '');
    },
    enableSubmit: function(event){
        event.target.form.elements['submit'].removeAttribute('disabled');
    },
    calculateMealsQty: function(event){
        var mealQtyElems = MODEL.elems.mealQty, qtyElemValue = 0, target = event.target, mealSelected;
        DATA.order.currentSelections.forEach(function(item, index, array){
            if(item == target.dataset.mealid){
                mealSelected = true;
            }
        })
        if(parseInt(target.value) > 0 && !mealSelected){
            var newRow = document.createElement('tr'),
                newMealCell = document.createElement('td'),
                newQtyCell = document.createElement('td'),
                newMeal = document.createTextNode(target.dataset.mealname),
                newQty = document.createTextNode(target.value);
            newRow.setAttribute('id', target.dataset.mealid)
            newMealCell.appendChild(newMeal);
            newQtyCell.appendChild(newQty);
            newRow.appendChild(newMealCell);
            newRow.appendChild(newQtyCell);
            DATA.order.currentSelections.push(target.dataset.mealid);
            MODEL.elems.selections.appendChild(newRow);
        }else{
            var targetRow = document.getElementById(target.dataset.mealid);
            if(target.value == 0){
                targetRow.remove();
            }else{
                targetRow.children[1].textContent=target.value;
            }
        }
        for(var i = 0; i < mealQtyElems.length; i++){
            qtyElemValue += parseInt(mealQtyElems[i].value);
            if(qtyElemValue >= 6){
                MODEL.elems.addToCartBtn.removeAttribute('disabled');
                MODEL.elems.mealCount.classList.remove('alert-danger');
                MODEL.elems.mealCount.classList.add('alert-success');
                MODEL.elems.mealCount.textContent="Your order can be placed now.";
            }else if(qtyElemValue < 6){
                var leftToGo = 6 - qtyElemValue;
                var countMessage = "Please select at least "+ leftToGo +" more meals";
                MODEL.elems.addToCartBtn.setAttribute('disabled', '');
                MODEL.elems.mealCount.classList.add('alert');
                MODEL.elems.mealCount.classList.add('alert-danger');
                MODEL.elems.mealCount.textContent=countMessage;
            }
        }
    },
    mealQtyListener: function(){
        var mealQtyElems = MODEL.elems.mealQty, qtyElem;
        for(var i = 0; i < mealQtyElems.length; i++){
            qtyElem = mealQtyElems[i];
            qtyElem.addEventListener('change', this.calculateMealsQty, false);
        }
    },
    definePickupDate: function(event){
        var pickupDateElems = MODEL.elems.pickupDate,
        dayElem = '',
        selectedElem = event.target,
        selectedElemDate = selectedElem.dataset.fulldate,
        getformattedDate = AJAX.calls.fortmatDate(selectedElemDate);
        for(var i = 0; i < pickupDateElems.length; i++){
            dayElem = pickupDateElems[i];
            dayElem.classList.remove('selected');
        }
        selectedElem.classList.add('selected');
        $("#rawDate").val(selectedElemDate);
    },
    pickupDate: function(){
        if(document.querySelector('#pickUpDate')){
            document.querySelector('#pickUpDate').addEventListener('click', function(event){
                if(event.target.classList.contains('pickUpDay')){
                    APP.events.definePickupDate(event);
                }
            }, true);
        }
    },
    generateAjaxCalendar: function(event){
        event.preventDefault();
        var extractDate = event.target.pathname,
            breakDate = extractDate.split('/');
        AJAX.calls.generateCalendar(breakDate[4], breakDate[3]);
    },
    monthNavEvents: function(){
        if(document.querySelector('#pickUpDate')){
            document.querySelector('#pickUpDate').addEventListener('click', function(event) {
                if ( event.target.classList.contains('monthNav') ) {
                    APP.events.generateAjaxCalendar(event);
                }
            }, true);
        }
    },
    addToCart: function(event){
        var dateSet = MODEL.elems.rawDate.value, mealQtyElems = MODEL.elems.mealQty, qtyElem, qtyElemValue, isValid;
        for(var i = 0; i < mealQtyElems.length; i++){
            qtyElem = mealQtyElems[i];
            qtyElemValue = parseInt(qtyElem.value);
            if(qtyElemValue != 0  && qtyElemValue < 2 || qtyElemValue > 10 ){
                isValid = qtyElem.checkValidity();
                if(!isValid){
                    return false;
                }
            }
        }
        if(dateSet.length == 0){
            event.preventDefault();
            MODEL.elems.errorMessage.textContent='Please select a delivery date';
            MODEL.elems.errorMessage.classList.remove('d-none');
            return false;
        }else{
            MODEL.elems.addToCartForm.submit();
        }
    },
    addToCartEvent: function(event){
        if(MODEL.elems.addToCartBtn){
            MODEL.elems.addToCartBtn.addEventListener('click', this.addToCart, false);
        }
    },
    toggleDeliveryFields: function(event){
        var inputState = event.target.checked,  billingField = MODEL.elems. billingField;
        if(inputState){
            MODEL.elems.billingAddress[0].style.display='none';
            MODEL.elems.billingAddress[1].style.display='none';
            MODEL.elems.billingAddress[2].style.display='none';
            for(var i = 0; i < billingField.length; i++){
                billingField[i].removeAttribute('required');
            }
        }else{
            MODEL.elems.billingAddress[0].style.display='flex';
            MODEL.elems.billingAddress[1].style.display='flex';
            MODEL.elems.billingAddress[2].style.display='flex';
            for(var i = 0; i < billingField.length; i++){
                billingField[i].setAttribute('required', '');
            }
        }
    },
    updateTaxRate: function(selectedCity){
        var parsedTotal =  Number(parseFloat(MODEL.elems.orderTotal.value).toFixed(2)), taxes, parsedTaxes, totalWithTax;
        selectedCity = selectedCity || MODEL.elems.selectedCity.value;
        if(selectedCity != ""){
            if(selectedCity == "Boca Raton" || selectedCity == "Delray Beach"){
                taxes = Number(parseFloat(parsedTotal * .07).toFixed(2));
            }else{
                taxes = Number(parseFloat(parsedTotal * .06).toFixed(2));
            }
            totalWithTax = parsedTotal + taxes;
            MODEL.elems.taxesTotal.value=taxes.toFixed(2);
            MODEL.elems.taxesDisplay.textContent='$'+ taxes.toFixed(2);
            MODEL.elems.serviceTotal.value=totalWithTax.toFixed(2);
            MODEL.elems.totalDisplay.textContent='$'+totalWithTax.toFixed(2);
        }
    },
    applyCouponCode: function(){
        AJAX.calls.validateCoupon(MODEL.elems.couponCode.value);
    },
    addCoupon: function(){
        var couponCode = MODEL.elems.couponCode;
        if(couponCode != null){
            couponCode.addEventListener('change', this.applyCouponCode, false);
        }
    },
    updateZipCode: function(event){
        var selectedCity = event.target.value,
            deliveryZipSelect = MODEL.elems.deliveryZip,
            cityZipObj = DATA.cityZipCodes[selectedCity],
            newZipOptElem,
            newZipOptText;
        APP.events.updateTaxRate(selectedCity);
        while (deliveryZipSelect.hasChildNodes()) {
            deliveryZipSelect.removeChild(deliveryZipSelect.lastChild);
        }
        for(var i = 0; i < cityZipObj.length; i++){
            newZipOptText = document.createTextNode(cityZipObj[i]);
            newZipOptElem = document.createElement('option');
            newZipOptElem.setAttribute('value', cityZipObj[i]);
            newZipOptElem.appendChild(newZipOptText);
            deliveryZipSelect.appendChild(newZipOptElem);
        }
    },
    validateFormData: function(event){
        var validateFields = $('[required]').get(), allFieldsComplete = true;
        for(var i = 0; i < validateFields.length; i++){
            var fieldState = validateFields[i].validity.valueMissing;
            var fieldIsValid = validateFields[i].validity.valid;
            if(fieldState && !fieldIsValid){
                allFieldsComplete = false;
                validateFields[i].classList.add('invalid');
                $("#formFailedMsg").fadeIn();
                return allFieldsComplete;
            }
        }
        if(allFieldsComplete){
            $("#formFailedMsg").hide();
            return allFieldsComplete;
        }
    }
};

APP.events.mealQtyListener();
APP.events.pickupDate();
APP.events.monthNavEvents();
APP.events.addToCartEvent();
APP.events.addCoupon();
