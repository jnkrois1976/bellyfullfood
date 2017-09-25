<div id="contact" class="container">
    <div class="row">
        <div class="col">
            <h1 class="pageTitle">Contact Us</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <?php if($email_sent): ?>
                <div class="card text-white bg-success mb-3 w-100">
                    <div class="card-header">We received your message</div>
                    <div class="card-body">
                        <h4 class="card-title">Thank you for reaching out</h4>
                        <p class="card-text">We will address  your questions or concerns as quickly as possible</p>
                    </div>
                </div>
            <?php elseif(!$email_sent): ?>
                <form action="/send_message" method="post">
                    <div class="card mb-3">
                        <div class="card-header">Send us a message</div>
                        <div class="card-body">
                            <div class="col">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input value="Juan Rois" type="text" class="form-control" name="customerName" placeholder="full name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input value="jnkrois@gmail.com" type="email" class="form-control" name="customerEmail" placeholder="name@example.com" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input value="305-496-1989" type="phone" class="form-control" name="customerPhone" placeholder="phone number" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Your message</label>
                                            <textarea name="customerMessage" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-header">
                    Want to talk to us?
                </div>
                <div class="card-body">
                    <h4 class="card-title">Give us a call</h4>
                    <p class="card-text">For more information, please contact Belly Full Foods at 954-501-8457</p>
                </div>
            </div>
        </div>
    </div>
</div>
