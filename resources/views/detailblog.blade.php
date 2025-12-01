@extends('layouts.front')
@section('container')
<style>
.text {
    line-height: 1.8; /* desktop line height */
    font-size: 16px;
   
}
.text table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1em;
    color: #fff; /* teks putih */
    background-color: #2b2b2b; /* latar gelap */
}
.text th,
.text td {
    border: 1px solid #444; /* garis border lebih soft */
    padding: 8px 12px;
    text-align: left;
}

.text th {
    background-color: #3c3c3c; /* header lebih gelap */
    font-weight: 600;
}

.text tr:nth-child(even) {
    background-color: #343434; /* baris genap sedikit lebih terang */
}

/* Hover efek */
.text tr:hover {
    background-color: #3a3a3a;
}

/* Responsif untuk mobile */
@media (max-width: 768px) {
    .text th,
    .text td {
        padding: 6px 8px;
        font-size: 14px;
    }
}
.text p {
    margin-bottom: 1em;
}

.text ul, 
.text ol {
    padding-left: 1.5em;
    margin-bottom: 1em;
}

.text ul li {
    list-style-type: disc;
    margin-bottom: 0.5em;
}

.text ol li {
    list-style-type: decimal;
    margin-bottom: 0.5em;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .text {
        line-height: 1.6; /* lebih rapat untuk layar kecil */
        font-size: 15px;
    }

    .text ul, 
    .text ol {
        padding-left: 1.2em; /* kurang indentasi untuk mobile */
    }
}

</style>
   <section class="main-post section-padding">
            <div class="container with-pad">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="caption text-center">
                            <div class="gat">
                                 @foreach($project->category() as $category)
                                    <a href="{{ url('/project?category=' . $category->id) }}">
                                        <span >{{ $category->name }}   </span></a>
                                @endforeach
                            </div>
                            <h1 class="fz-55 mt-30">{{ $project->title }}</h1>
                            <p class="sub-title mt-15">6 , August 2022 - By Admin</p>
                        </div>
                        <div class="main-img mb-40 mt-40">
                            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('img/no-signal.avif') }}" alt="" class="radius-5">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="cont">
                          
                            <div class="text">
                                {!! $project->description !!}
                            </div>
                           
                            <div class="info-area flex mt-20 pb-20 pt-20 bord-thin-top bord-thin-bottom">
                                <div>
                                    <div class="tags flex">
                                        <div class="valign">
                                            <span>Tags :</span>
                                        </div>
                                        <div>
                                            <a href="#">Tech</a>
                                            <a href="#">Gavi</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <div class="share-icon flex">
                                        <div class="valign">
                                            <span>Share :</span>
                                        </div>
                                        <div>
                                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="author-area mt-50">
                                <div class="flex">
                                    <div class="author-img mr-30">
                                        <div class="img">
                                            <img src="assets/imgs/blog/author1.jpg" alt="" class="circle-img">
                                        </div>
                                    </div>
                                    <div class="cont valign">
                                        <div class="full-width">
                                            <h6 class="fw-500 mb-10">Chris Smith</h6>
                                            <p>Nulla eleifend, lectus eu gravida facilisis, ipsum metus faucibus
                                                eros,
                                                vitae vulputate nibh libero ac metus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="next-prv-post flex mt-50">
                                <div class="thumb-post bg-img" data-background="assets/imgs/blog/1.jpg">
                                    <a href="blog-details.html">
                                        <span class="fz-12 text-u ls1 main-color mb-15"><i class="pe-7s-angle-left"></i>
                                            Prev Post</span>
                                        <h6 class="fw-500 fz-16">Ways to quickly traffic to <br> your website.
                                        </h6>
                                    </a>
                                </div>
                                <div class="thumb-post ml-auto text-right bg-img"
                                    data-background="assets/imgs/blog/2.jpg">
                                    <a href="blog-details.html">
                                        <span class="fz-12 text-u ls1 main-color mb-15">Next Post <i
                                                class="pe-7s-angle-right"></i></span>
                                        <h6 class="fw-500 fz-16">How to Handle Your Good Employee.</h6>
                                    </a>
                                </div>
                            </div>

                            <div class="comments-post section-padding">
                                <div class="sec-head mb-60">
                                    <h5>comments (2)</h5>
                                </div>
                                <div class="item-box bord-thin-bottom pb-30 mb-30">
                                    <div class="flex">
                                        <div class="user-img mr-30">
                                            <div class="img circle-60 line-height-1">
                                                <img src="assets/imgs/blog/author1.jpg" alt="" class="circle-img">
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <h6 class="mb-10">Megan fox</h6>
                                            <p>Ut elementum turpis lorem, id vulputate risus consequat vitae. Morbi eget
                                                urna imperdiet, pellentesque nulla id, tempus mauris.</p>
                                        </div>
                                    </div>
                                    <div class="replay-butn">
                                        <a href="#0">
                                            <span>Replay</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="item-box replayed">
                                    <div class="flex">
                                        <div class="user-img mr-30">
                                            <div class="img circle-60 line-height-1">
                                                <img src="assets/imgs/blog/author1.jpg" alt="" class="circle-img">
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <h6 class="mb-10">Megan fox</h6>
                                            <p>Ut elementum turpis lorem Morbi eget urna imperdiet, pellentesque nulla
                                                id, tempus mauris.</p>
                                        </div>
                                    </div>
                                    <div class="replay-butn">
                                        <a href="#0">
                                            <span>Replay</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="comments-from">
                                <div class="sec-head mb-60">
                                    <h5>Leave a comment</h5>
                                </div>
                                <form id="contact-form" method="post" action="https://uithemez.com/i/andrew/contact.php">

                                    <div class="messages"></div>

                                    <div class="controls row">

                                        <div class="col-lg-6">
                                            <div class="form-group mb-30">
                                                <input id="form_name" type="text" name="name" placeholder="Name"
                                                    required="required">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-30">
                                                <input id="form_email" type="email" name="email" placeholder="Email"
                                                    required="required">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mb-30">
                                                <textarea id="form_message" name="message" placeholder="Message"
                                                    rows="4" required="required"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center mt-20">
                                            <button type="submit">
                                                <span class="text">Post comment</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection