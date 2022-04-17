@extends('frontend.layout.master')
@section('content')
<div class="container">
    <figure class="entry-media">
        <div class="owl-item cloned" style="width: 748px;">
            <img src="{{ asset('upload/images/news/'.$news['image']) }}" alt="image desc">
        </div>
    </figure><!-- End .entry-media -->
<div class="row">
<div class="col-lg-9">
            <article class="entry single-entry">
                <div class="entry-body">
                    <div class="entry-meta">
                        <span class="meta-separator">|</span>
                        <a href="#">{{ $news->created_at->format('M d, Y') }}</a>
                        <span class="meta-separator">|</span>
                    
                    </div><!-- End .entry-meta -->

                    <h2 class="entry-title entry-title-big">
                        {{ $news->title }}
                    </h2><!-- End .entry-title -->


                    <div class="entry-content editor-content">
                        <p>
                            {!! $news->description !!}
                        </p>
                    </div><!-- End .entry-content -->

                 
                </div><!-- End .entry-body -->

            </article><!-- End .entry -->



</div><!-- End .col-lg-9 -->

<aside class="col-lg-3">
<div class="sidebar">



                <div class="widget">
                    <h3 class="widget-title">Latest Posts</h3><!-- End .widget-title -->

                    <ul class="posts-list">
                        @foreach ($news_lists as $news_list)
                        <li>
                            <figure>
                                <a href="{{ route('news.detail',$news_list['id']) }}">
                                    <img src="{{ asset('upload/images/news/'.$news_list['image']) }}" alt="post" width="100%">
                                </a>
                            </figure>
                            <div>
                                <span>{{ $news_list->created_at->format('M d, Y') }}</span>
                                <h4><a href="{{ route('news.detail',$news_list['id']) }}">{{ $news_list->title }}</a></h4>
                            </div>
                        </li>
                        @endforeach
                    </ul><!-- End .posts-list -->
                </div><!-- End .widget -->


              
</div><!-- End .sidebar sidebar-shop -->
</aside><!-- End .col-lg-3 -->
</div><!-- End .row -->
</div>

@endsection