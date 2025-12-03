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
                            <h3>Contact Me for Your Next Project</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="google-map mb-80">
                            <iframe id="gmap_canvas"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.245145499492!2d108.22609677574434!3d-7.326339272051981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f575080018d3f%3A0xf85732efcb2553fd!2sINOPAK%20INSTITUTE!5e0!3m2!1sid!2sid!4v1764737600778!5m2!1sid!2sid;output=embed">
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
                                    <h4>-</h4>
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
                                        <a href="mailto:abc@example.com">asepsurya@scrollwebid.com</a>
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
                                    <h4>Indihiang, Kota Tasikmalaya</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 valign">
                        <div class="full-width">
                           <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
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
@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = new bootstrap.Modal(document.getElementById('successModal'));
        modal.show();
    });
</script>
@endif

        <!-- Modal Success -->
<!-- Modal Success -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" 
             style="background: #0f0f0f; color: #fff; border-radius: 20px;">

            <div class="modal-body text-center py-5">

                <!-- Icon Success -->
                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                     style="
                        width: 80px; 
                        height: 80px; 
                        border-radius: 50%; 
                        background: rgba(0, 255, 150, 0.15);
                     ">
                    <i class="ti ti-check" 
                       style="font-size: 40px; color: #00ff9e;"></i>
                </div>

                <h4 class="fw-bold mb-2" style="font-size: 22px;">
                    Pesan Berhasil Dikirim!
                </h4>

                <p class="text-muted mb-0" style="font-size: 14px;">
                    Terima kasih! Kami sudah menerima pesan Anda.
                </p>

            </div>

        </div>
    </div>
</div>


@endsection