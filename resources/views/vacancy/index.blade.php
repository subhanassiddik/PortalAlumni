@extends('layouts.vacancy')

@section('title')
<title>PORTAL ALUMNI</title>
@endsection

@section('content')
		<!-- Flip banner -->
		<a href="1_based copy.html" class="flip-banner parallax" data-background="images/slider-bg-02.jpg"
			data-color="#f91942" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
			<div class="flip-banner-content">
				<h1 class="flip-visible">PORTAL ALUMNI</h1>
				<h2 class="flip-hidden">POLITEKNIK INFORMATIKA NASIONAL MAKASSAR</h2>
			</div>
		</a>
		<!-- Flip banner / End -->

<div class="container">

<!-- Blog Posts -->
<div class="blog-page margin-top-40">
    <div class="row">
        <div class="col-lg-9 col-md-8 padding-right-30">
            
            @foreach($vacancies as $vacancy)
            <!-- Blog Post -->
            <div class="blog-post">

                <!-- Content -->
                <div class="post-content">
                    <h3><a href="pages-blog-post.html">Nam</a></h3>

                    <ul class="post-meta">
                        <li>{{$vacancy->created_at->format("d F, Y")}}</li>
                        <li><a href="#">5 Comments</a></li>
                        <li><a href="#">
                        @foreach($vacancy->tags as $tag)
                            <span class="tag">{{$tag->name}}</span> 
                        @endforeach
                        </a></li>
                    </ul>

                    <p>{{$vacancy->title}}</p>

                    <a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful
                        Review<span>12</span></a>

                    <a href="/vacancies/{{$vacancy->slug}}" class="read-more">Read More<i
                            class="fa fa-angle-right"></i></a>
                </div>

            </div>
            <!-- Blog Post / End -->
            @endforeach

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-bottom-40">
						<nav class="pagination">
							<ul>
                                    <!-- Previous Page Link -->
                                    @if ($vacancies->onFirstPage())
                                        <li><i class="sl sl-icon-arrow-left"></i></li>
                                    @else
                                    <li><a href="{{$vacancies->previousPageUrl()}}"><i class="sl sl-icon-arrow-left"></i></a></li>
                                    @endif

                                    <!-- Next Page Link -->
                                    @if ($vacancies->hasMorePages())
                                    <li><a href="{{$vacancies->nextPageUrl()}}"><i class="sl sl-icon-arrow-right"></i></a></li>
                                    @else
                                    <li><i class="sl sl-icon-arrow-right"></i></li>
                                    @endif

							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

        </div>

        <!-- Blog Posts / End -->


        <!-- Widgets -->
        <div class="col-lg-3 col-md-4">
            <div class="sidebar right">

                <!-- Widget -->
                <div class="widget">
                    <h3 class="margin-top-0 margin-bottom-25">Filter</h3>
                    <div class="search-blog-input">
                    <form action="/" method="GET">
                        <div class="input"><input name="search" class="search-field" type="text"
                                placeholder="Type and hit enter" value="" /></div>
                    </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- Widget / End -->


                <!-- Widget -->
                <div class="widget margin-top-40">

                    <h3>Popular Posts</h3>
                    <ul class="widget-tabs">

                        <!-- Post #1 -->
                        <li>
                            <div class="widget-content">
                                <div class="widget-thumb">
                                    <a href="pages-blog-post.html"><img src="images/blog-widget-03.jpg"
                                            alt=""></a>
                                </div>

                                <div class="widget-text">
                                    <h5><a href="pages-blog-post.html">Hotels for All Budgets </a></h5>
                                    <span>October 26, 2016</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>

                        <!-- Post #2 -->
                        <li>
                            <div class="widget-content">
                                <div class="widget-thumb">
                                    <a href="pages-blog-post.html"><img src="images/blog-widget-02.jpg"
                                            alt=""></a>
                                </div>

                                <div class="widget-text">
                                    <h5><a href="pages-blog-post.html">The 50 Greatest Street Arts In
                                            London</a></h5>
                                    <span>November 9, 2016</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>

                        <!-- Post #3 -->
                        <li>
                            <div class="widget-content">
                                <div class="widget-thumb">
                                    <a href="pages-blog-post.html"><img src="images/blog-widget-01.jpg"
                                            alt=""></a>
                                </div>

                                <div class="widget-text">
                                    <h5><a href="pages-blog-post.html">The Best Cofee Shops In Sydney
                                            Neighborhoods</a></h5>
                                    <span>November 12, 2016</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>

                    </ul>

                </div>
                <!-- Widget / End-->

                <!-- Row -->
                <div class="row with-forms">
                
					<div class="boxed-widget margin-top-40">
                             @foreach($tags as $tag)
						    <a href="/vacancies/filter/{{$tag->name}}"><mark class="color">{{$tag->name}}</mark></a>
                            @endforeach
					</div>
                </div>                <!-- Row / End -->

                <!-- Widget -->
                <div class="widget margin-top-40">
                    <h3 class="margin-bottom-25">Social</h3>
                    <ul class="social-icons rounded">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                    </ul>

                </div>
                <!-- Widget / End-->

                <div class="clearfix"></div>
                <div class="margin-bottom-40"></div>
            </div>
        </div>
    </div>
    <!-- Sidebar / End -->


</div>
</div>

<!-- end content -->
@endsection


