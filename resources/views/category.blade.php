@extends('layout')

@section('navbar')
<nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">


        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">IT</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="category.blade.php" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Travel</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="/category">Asia</a>
                        <a class="dropdown-item" href="/category">Europe</a>
                        <a class="dropdown-item" href="/category">Dubai</a>
                        <a class="dropdown-item" href="/category">Africa</a>
                        <a class="dropdown-item" href="/category">South America</a>
                    </div>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/category" id="dropdown05" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                        <a class="dropdown-item" href="/category">IT</a>
                        <a class="dropdown-item" href="/category">Lifestyle</a>
                        <a class="dropdown-item" href="/category">Food</a>
                        <a class="dropdown-item" href="/category">Adventure</a>             <a class="dropdown-item" href="/category">Travel</a>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
@endsection

@section('content')

<section class="site-section pt-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-4">Category:
                    @foreach($categorys as $categ)
                        @if($categ->category_slug == $cat)
                        {{$categ->title}}
                        @endif
                    @endforeach</h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="row mb-5 mt-5">
                    <div class="col-md-12">
                        @foreach($posts as $post)
                        <div class="post-entry-horzontal">
                            <a href="/post/{{$post->post_slug}}">
                                <div class="image element-animate" data-animate-effect="fadeIn"
                                    style="background-image: url(/{{$post->image}});"></div>
                                <span class="text">
                                    <div class="post-meta">
                                        <span class="author mr-2"><img src="/images/person_1.jpg" alt="Colorlib">
                                            Colorlib</span>&bullet;
                                        <span class="mr-2">March 15, 2018 </span> &bullet;
                                        <span class="mr-2">Food</span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                    </div>
                                    <h2>{{$post->title}}</h2>
                                </span>
                            </a>
                        </div>
                    @endforeach
                        <!-- END post -->

                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-12 text-center">
                        {{ $posts->links() }}
                    </div>
                </div>

{{--                <div class="row mt-5">--}}
{{--                    <div class="col-md-12 text-center">--}}
{{--                        <nav aria-label="Page navigation" class="text-center">--}}
{{--                            <ul class="pagination">--}}
{{--                                <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">&gt;</a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </div>--}}



            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="/images/person_2.jpg" alt="Image Placeholder" class="img-fluid">
                        <div class="bio-body">
                            <h2>Craig David</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt
                                repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias
                                minus.</p>
                            <p><a href="#" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach($topposts as $tpost)
                                <li>
                                    <a href="/post/{{$tpost->post_slug}}">
                                        <img src="/{{$tpost->image}}" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4>{{$tpost->title}}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">March 15, 2018 </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach($counts as $key => $value)
                            <li><a href="/category/{{Str::slug($key, '_')}}">{{$key}} <span>({{$value}})</span></a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Freelancing</a></li>
                        <li><a href="#">IT</a></li>
                    </ul>
                </div>              <!-- END sidebar-box -->

            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

@endsection
@section('footer')
    <div class="row mb-5">
        <div class="col-md-4">
            <h3>About Us</h3>
            <p class="mb-4">
                <img src="/images/img_1.jpg" alt="Image placeholder" class="img-fluid">
            </p>

            <p>Lorem ipsum dolor sit amet sa ksal sk sa, consectetur adipisicing elit. Ipsa harum inventore reiciendis. <a href="#">Read More</a></p>
        </div>
        <div class="col-md-6 ml-auto">
            <div class="row">
                <div class="col-md-7">
                    <h3>Latest Post</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <li>
                                <a href="">
                                    <img src="/images/img_6.jpg" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>How to Find the Video Games of Your Youth</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/images/img_3.jpg" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>How to Find the Video Games of Your Youth</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/images/img_4.jpg" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>How to Find the Video Games of Your Youth</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-4">

                    <div class="mb-5">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Courses</a></li>
                            <li><a href="#">Categories</a></li>
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h3>Social</h3>
                        <ul class="list-unstyled footer-social">
                            <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                            <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                            <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                            <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
