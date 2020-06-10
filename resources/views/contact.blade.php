@extends('layouts.app')

@section('content')

    <section id="contact" class="padding-top-bottom ">
        <div class="container">
            <header class="section-header text-center">
                <h1><strong>Contact</strong></h1>
                <p>Feel Free To Check Me Out!!!</p>
            </header>
            <form action="index.html" method="post" novalidate id="contact-form">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 contact-info cta-message wow fadeInLeft">
                        <address>
                            <strong>Adebayo Peter Olaonipekun</strong><br>
                            30 Walter Siffre, Gbagada<br>
                            Lagos<br>
                            08084810208<br>
                            08189062038<br>
                            pekunmi@live.com<br>
                            smartbayeux@yahoo.com
                        </address>
                    </div>	

                    <div class="col-xs-12 col-sm-12 col-md-8 wow fadeInUp" >
                        <div class="form-group">
                            <label class="control-label" for="contact-name">Name</label>
                            <div class="controls">
                                <input id="contact-name" name="contactName" placeholder="Your name" class="form-control input-lg requiredField" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="contact-mail">Email</label>
                            <div class=" controls">
                                <input id="contact-mail" name="email" placeholder="Your email" class="form-control input-lg requiredField" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="contact-message">Message</label>
                            <div class="controls">
                                <textarea id="contact-message" name="comments" placeholder="Your message" class="form-control input-lg requiredField" rows="5"></textarea>
                            </div>
                        </div>
                        <p>
                            <button name="submit" type="submit" class="btn btn-store btn-block">Send Message</button></p>
                        <input type="hidden" name="submitted" id="submitted3" value="true">
                    </div>
                </div>
            </form>
        </div>
    </section>
    
@endsection