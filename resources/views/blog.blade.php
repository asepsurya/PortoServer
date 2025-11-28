@extends('layouts.front')
@section('container')
     <section class="blog section-padding">
            <div class="container with-pad">
                <div class="sec-head mb-80">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="d-inline-block">
                                <div class="sub-title-icon d-flex align-items-center">
                                    <span class="icon pe-7s-note"></span>
                                    <h6>My Blogs</h6>
                                </div>
                            </div>
                            <h3>Exploring the <br> World Through Our Blog</h3>
                        </div>
                    </div>
                </div>
                <div class="row lg-marg justify-content-center">
                    <div class="col-lg-7">
                        <div class="md-mb80">
                            <div class="item pb-50 mb-50 bord-thin-bottom">
                                <div class="img">
                                    <img src="assets/imgs/blog/1.jpg" alt="">
                                </div>
                                <div class="cont mt-30">
                                    <span class="date mb-10">20 July 2020</span>
                                    <h4 class="mb-15">
                                        <a href="blog-details.html">12 Tips to Leading an Extraordinary Company</a>
                                    </h4>
                                    <p>So striking at of to welcomed resolved. Northward by described up household
                                        therefore attention. Excellence decisively nay man yet impression for contrasted
                                        remarkably.</p>
                                </div>
                            </div>
                            <div class="item pb-50 mb-50 bord-thin-bottom">
                                <div class="img">
                                    <img src="assets/imgs/blog/2.jpg" alt="">
                                </div>
                                <div class="cont mt-30">
                                    <span class="date mb-10">20 July 2020</span>
                                    <h4 class="mb-15">
                                        <a href="blog-details.html">12 Tips to Leading an Extraordinary Company</a>
                                    </h4>
                                    <p>So striking at of to welcomed resolved. Northward by described up household
                                        therefore attention. Excellence decisively nay man yet impression for contrasted
                                        remarkably.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <img src="assets/imgs/blog/3.jpg" alt="">
                                </div>
                                <div class="cont mt-30">
                                    <span class="date mb-10">20 July 2020</span>
                                    <h4 class="mb-15">
                                        <a href="blog-details.html">12 Tips to Leading an Extraordinary Company</a>
                                    </h4>
                                    <p>So striking at of to welcomed resolved. Northward by described up household
                                        therefore attention. Excellence decisively nay man yet impression for contrasted
                                        remarkably.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="search-box">
                                <input type="text" name="search-post" placeholder="Search">
                                <span class="icon pe-7s-search"></span>
                            </div>
                            <div class="widget catogry">
                                <h6 class="title-widget">Categories</h6>
                                <ul class="rest">
                                    <li>
                                        <span><a href="blogs.html">Business</a></span>
                                        <span class="ml-auto">33</span>
                                    </li>
                                    <li>
                                        <span><a href="blogs.html">Lifestyle</a></span>
                                        <span class="ml-auto">05</span>
                                    </li>
                                    <li>
                                        <span><a href="blogs.html">Creative</a></span>
                                        <span class="ml-auto">28</span>
                                    </li>
                                    <li>
                                        <span><a href="blogs.html">WordPress</a></span>
                                        <span class="ml-auto">17</span>
                                    </li>
                                    <li>
                                        <span><a href="blogs.html">Design</a></span>
                                        <span class="ml-auto">45</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget last-post-thum">
                                <h6 class="title-widget">latest Posts</h6>
                                <div class="item">
                                    <div class="valign">
                                        <div class="img">
                                            <a href="blogs.html"><img src="assets/imgs/blog/t1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <h6><a href="blogs.html">ways to quickly increase traffic to your
                                                website</a></h6>
                                        <span><a href="blogs.html">14 sep 2021</a></span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="valign">
                                        <div class="img">
                                            <a href="blogs.html"><img src="assets/imgs/blog/t2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <h6><a href="blogs.html">breaking the rules: using sqlite to demo
                                                web</a></h6>
                                        <span><a href="blogs.html">14 sep 2021</a></span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="valign">
                                        <div class="img">
                                            <a href="blogs.html"><img src="assets/imgs/blog/t3.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <h6><a href="blogs.html">building better ui designs with layout
                                                grids</a></h6>
                                        <span><a href="blogs-2.html">14 sep 2021</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget tags">
                                <h6 class="title-widget">Tags</h6>
                                <div>
                                    <a href="blogs.html">Creative</a>
                                    <a href="blogs.html">Design</a>
                                    <a href="blogs.html">Dark & Light</a>
                                    <a href="blogs.html">Minimal</a>
                                    <a href="blogs.html">Andrew</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection