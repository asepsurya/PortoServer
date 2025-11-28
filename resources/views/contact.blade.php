@extends('layouts.front')
@section('container')
  <section class="contact section-padding">
            <div class="container">
                <div class="sec-head mb-80">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="d-inline-block">
                                <div class="sub-title-icon d-flex align-items-center">
                                    <span class="icon pe-7s-map-marker"></span>
                                    <h6>Contact Us</h6>
                                </div>
                            </div>
                            <h3>Let's Get in Touch!</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="google-map mb-80">
                            <iframe id="gmap_canvas"
                                src="https://maps.google.com/maps?q=hollwood&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-lg-5 valign">
                        <div class="info full-width md-mb80">
                            <div class="item mb-30 d-flex align-items-center">
                                <div class="mr-15">
                                    <span class="icon fz-40 main-color pe-7s-call"></span>
                                </div>
                                <div class="mr-10">
                                    <h6 class="opacity-7">Phone</h6>
                                </div>
                                <div class="ml-auto">
                                    <h4>+1 840 841 25 69</h4>
                                </div>
                            </div>
                            <div class="item mb-30 d-flex align-items-center">
                                <div class="mr-15">
                                    <span class="icon fz-40 main-color pe-7s-mail"></span>
                                </div>
                                <div class="mr-10">
                                    <h6 class="opacity-7">Email</h6>
                                </div>
                                <div class="ml-auto">
                                    <h4>
                                        <a href="mailto:abc@example.com">Andrew@website.com</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="item d-flex align-items-center">
                                <div class="mr-15">
                                    <span class="icon fz-40 main-color pe-7s-map-marker"></span>
                                </div>
                                <div class="mr-10">
                                    <h6 class="opacity-7">Address</h6>
                                </div>
                                <div class="ml-auto">
                                    <h4>Amsterdam, The Netherland</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 valign">
                        <div class="full-width">
                            <form id="contact-form" method="post" action="https://uithemez.com/i/andrew/contact.php">

                                <div class="messages"></div>

                                <div class="controls row">

                                    <div class="col-lg-6">
                                        <div class="form-group mb-30">
                                            <label>Your Name</label>
                                            <input id="form_name" type="text" name="name" required="required">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-30">
                                            <label>Your Email</label>
                                            <input id="form_email" type="email" name="email" required="required">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Your Message</label>
                                            <textarea id="form_message" name="message" required="required"></textarea>
                                        </div>
                                        <div class="mt-30">
                                            <button type="submit">
                                                <span class="text">Send A Message</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection