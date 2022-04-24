@extends('frontend.layout.master')
@section('content')

<style>
    .card {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .card-block {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .card-title {
        margin-bottom: 0.75rem;
    }

    .card-subtitle {
        margin-top: -0.375rem;
        margin-bottom: 0;
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .card-link:hover {
        text-decoration: none;
    }

    .card-link + .card-link {
        margin-left: 1.25rem;
    }

    .card > .list-group:first-child .list-group-item:first-child {
        border-top-right-radius: 0.25rem;
        border-top-left-radius: 0.25rem;
    }

    .card > .list-group:last-child .list-group-item:last-child {
        border-bottom-right-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #f7f7f9;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-footer {
        padding: 0.75rem 1.25rem;
        background-color: #f7f7f9;
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-footer:last-child {
        border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
    }

    .card-header-tabs {
        margin-right: -0.625rem;
        margin-bottom: -0.75rem;
        margin-left: -0.625rem;
        border-bottom: 0;
    }

    .card-header-pills {
        margin-right: -0.625rem;
        margin-left: -0.625rem;
    }

    .card-primary {
        background-color: #0275d8;
        border-color: #0275d8;
    }

    .card-primary .card-header,
    .card-primary .card-footer {
        background-color: transparent;
    }

    .card-success {
        background-color: #5cb85c;
        border-color: #5cb85c;
    }

    .card-success .card-header,
    .card-success .card-footer {
        background-color: transparent;
    }

    .card-info {
        background-color: #5bc0de;
        border-color: #5bc0de;
    }

    .card-info .card-header,
    .card-info .card-footer {
        background-color: transparent;
    }

    .card-warning {
        background-color: #f0ad4e;
        border-color: #f0ad4e;
    }

    .card-warning .card-header,
    .card-warning .card-footer {
        background-color: transparent;
    }

    .card-danger {
        background-color: #d9534f;
        border-color: #d9534f;
    }

    .card-danger .card-header,
    .card-danger .card-footer {
        background-color: transparent;
    }

    .card-outline-primary {
        background-color: transparent;
        border-color: #0275d8;
    }

    .card-outline-secondary {
        background-color: transparent;
        border-color: #ccc;
    }

    .card-outline-info {
        background-color: transparent;
        border-color: #5bc0de;
    }

    .card-outline-success {
        background-color: transparent;
        border-color: #5cb85c;
    }

    .card-outline-warning {
        background-color: transparent;
        border-color: #f0ad4e;
    }

    .card-outline-danger {
        background-color: transparent;
        border-color: #d9534f;
    }

    .card-inverse {
        color: rgba(255, 255, 255, 0.65);
    }

    .card-inverse .card-header,
    .card-inverse .card-footer {
        background-color: transparent;
        border-color: rgba(255, 255, 255, 0.2);
    }

    .card-inverse .card-header,
    .card-inverse .card-footer,
    .card-inverse .card-title,
    .card-inverse .card-blockquote {
        color: #fff;
    }

    .card-inverse .card-link,
    .card-inverse .card-text,
    .card-inverse .card-subtitle,
    .card-inverse .card-blockquote .blockquote-footer {
        color: rgba(255, 255, 255, 0.65);
    }

    .card-inverse .card-link:focus, .card-inverse .card-link:hover {
        color: #fff;
    }

    .card-blockquote {
        padding: 0;
        margin-bottom: 0;
        border-left: 0;
    }

    .card-img {
        border-radius: calc(0.25rem - 1px);
    }

    .card-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1.25rem;
    }

    .card-img-top {
        border-top-right-radius: calc(0.25rem - 1px);
        border-top-left-radius: calc(0.25rem - 1px);
    }

    .card-img-bottom {
        border-bottom-right-radius: calc(0.25rem - 1px);
        border-bottom-left-radius: calc(0.25rem - 1px);
    }

    @media (min-width: 576px) {
        .card-deck {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        .card-deck .card {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1 0 0%;
            -ms-flex: 1 0 0%;
            flex: 1 0 0%;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
        .card-deck .card:not(:first-child) {
            margin-left: 15px;
        }
        .card-deck .card:not(:last-child) {
            margin-right: 15px;
        }
    }

    @media (min-width: 576px) {
        .card-group {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        .card-group .card {
            -webkit-box-flex: 1;
            -webkit-flex: 1 0 0%;
            -ms-flex: 1 0 0%;
            flex: 1 0 0%;
        }
        .card-group .card + .card {
            margin-left: 0;
            border-left: 0;
        }
        .card-group .card:first-child {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
        }
        .card-group .card:first-child .card-img-top {
            border-top-right-radius: 0;
        }
        .card-group .card:first-child .card-img-bottom {
            border-bottom-right-radius: 0;
        }
        .card-group .card:last-child {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }
        .card-group .card:last-child .card-img-top {
            border-top-left-radius: 0;
        }
        .card-group .card:last-child .card-img-bottom {
            border-bottom-left-radius: 0;
        }
        .card-group .card:not(:first-child):not(:last-child) {
            border-radius: 0;
        }
        .card-group .card:not(:first-child):not(:last-child) .card-img-top,
        .card-group .card:not(:first-child):not(:last-child) .card-img-bottom {
            border-radius: 0;
        }
    }

    @media (min-width: 576px) {
        .card-columns {
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
            -webkit-column-gap: 1.25rem;
            -moz-column-gap: 1.25rem;
            column-gap: 1.25rem;
        }
        .card-columns .card {
            display: inline-block;
            width: 100%;
            margin-bottom: 0.75rem;
        }
    }
</style>
<div class="container mt-3" style="margin-top: 95px">
<div class="row">
<div class="col-lg-9">
    <figure class="entry-media">
        <div class="owl-item cloned" style="width: 100%;">
            <img src="{{ asset('upload/images/news/'.$news['image']) }}" alt="image desc">
        </div>
    </figure><!-- End .entry-media -->
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
                        @foreach ($news_lists as $news_list)
                            {{-- <figure class="card-head">
                                <a href="{{ route('news.detail',$news_list['id']) }}">
                                    <img src="{{ asset('upload/images/news/'.$news_list['image']) }}" alt="post" width="100%">
                                </a>
                            </figure>
                            <div>
                                <span>{{ $news_list->created_at->format('M d, Y') }}</span>
                                <h4><a href="{{ route('news.detail',$news_list['id']) }}">{{ $news_list->title }}</a></h4>
                            </div> --}}
                            <div class="card">
                                <img src="{{ asset('upload/images/news/'.$news_list['image']) }}" alt="post" width="100%">
                                <div class="card-body">
                                    <span>{{ $news_list->created_at->format('M d, Y') }}</span>
                                <h4><a href="{{ route('news.detail',$news_list['id']) }}">{{ $news_list->title }}</a></h4>
                                </div>
                              </div>
                        @endforeach
                </div><!-- End .widget -->


              
</div><!-- End .sidebar sidebar-shop -->
</aside><!-- End .col-lg-3 -->
</div><!-- End .row -->
</div>

@endsection