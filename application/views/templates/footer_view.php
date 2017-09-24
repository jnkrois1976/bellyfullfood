        </main>
        <footer class="footer">
            <div id="disclaimer" class="container">
                <div class="row">
                    <div class="col">
                        <small><em>Belly Full Foods cannot accommodate customers with food allergies of any kind. By signing up for any of Belly Full Foods’ services,
                            you are acknowledging that you have read and understand these terms and conditions for service and that Belly Full Foods is not
                            responsible for any food-related allergic reactions, regardless of severity.
                            Because all of our food is cooked and prepared in a facility and with equipment that handles common food allergens including but
                            not limited to nuts, shellfish, gluten, dairy, eggs, wheat, soy, etc., by placing an order, you are acknowledging that if you have
                            a food allergy of any kind, Belly Full Foods cannot serve you.
                            While we take steps to minimize the risk of cross contamination, we cannot guarantee that any of our products are safe for
                            people with food allergies to consume.
                            Additionally, you acknowledge that consuming raw or undercooked meats, poultry, seafood or eggs may increase your risk of
                            foodborne illness, especially if you have certain medical conditions.<br /><br />
                            For more information regarding this agreement, please contact Belly Full Foods at 954-501-8457
                        </em></small>
                    </div>
                </div>
                <div id="copyWright" class="container">
                    <div class="row">
                        <div class="col">
                            Copywrigth&copy; BellyFullFoods.com 2017
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src="/js/model.js"></script>
        <script type="text/javascript" src="/js/ajax.js"></script>
        <?php if($page_class == 'cart' && $this->config->item('square_enable')): ?>
            <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>
            <script type="text/javascript">
                var sqPaymentForm = new SqPaymentForm({
                    <?php if($this->config->item('square_sandbox') == TRUE): ?>
                        applicationId: 'sandbox-sq0idp-Y4t4qT7gsAFk-76CChKHdQ',
                    <?php elseif($this->config->item('square_sandbox') == FALSE): ?>
                        applicationId: 'sq0idp-Y4t4qT7gsAFk-76CChKHdQ',
                    <?php endif; ?>
                    inputClass: 'sq-input',
                    cardNumber: {
                        elementId: 'sq-card-number',
                        placeholder: "0000 0000 0000 0000"
                    },
                    cvv: {
                        elementId: 'sq-cvv',
                        placeholder: 'CVV'
                    },
                    expirationDate: {
                        elementId: 'sq-expiration-date',
                        placeholder: 'MM/YY'
                    },
                    postalCode: {
                        elementId: 'sq-postal-code',
                        placeholder: 'Postal Code'
                    },
                    inputStyles: [
                        {
                            fontSize: '14px',
                            padding: '3px'
                        },
                        {
                            mediaMaxWidth: '400px',
                            fontSize: '18px',
                        }
                    ],
                    callbacks: {
                        cardNonceResponseReceived: function(errors, nonce, cardData) {
                            if (errors) {
                                var errorDiv = document.getElementById('errors');
                                errorDiv.innerHTML = "";
                                errorDiv.style.display = "block";
                                errors.forEach(function(error) {
                                    var p = document.createElement('p');
                                    p.innerHTML = error.message;
                                    errorDiv.appendChild(p);
                                });
                            } else {
                                var nonceField = document.getElementById('card-nonce');
                                nonceField.value = nonce;
                                var values = {
                                    nonce_value: nonce,
                                    dollar_amount: $("#serviceTotal").val()
                                };
                                $.ajax({
                                    url: '/site/authorize_card',
                                    data: values,
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function(success){
                                        if(success.transaction_id != null){
                                            console.log(success.transaction_id);
                                            console.log(success.transaction_status);
                                            document.getElementById('cartForm').submit();
                                        }else if(success.error_message != null){
                                            $("#errors").text(success.error_message).fadeIn();
                                            return false;
                                        }
                                    }
                                });
                            }
                        },
                        unsupportedBrowserDetected: function() {
                            // Alert the buyer that their browser is not supported
                        }
                    }
                });
                function submitButtonClick() {
                    sqPaymentForm.requestCardNonce();
                }
            </script>
        <?php endif; ?>
    </body>
</html>
