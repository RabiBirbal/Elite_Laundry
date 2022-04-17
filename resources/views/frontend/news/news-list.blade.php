@extends('frontend.layout.master')
@section('content')
<style>
    .w-5{
        display: none;
    }
</style>
        <main class="main">

        <div class="latest-news" style="background: white;">
            <br>
            <div class="container">
                <div class="row">
                    @foreach ($news_list as $news)
                <div class="news-box">
                    <div class="news-img">
                        <img src="{{ asset('upload/images/news/'.$news['image']) }}" alt="">
                    </div>

                    <div class="news-short">
                        <center>
                            <h5 style="color: #06a57a;">
                                {{ $news->title }}
                            </h5>

                        <i class="fa fa-calendar"></i>&nbsp; {{ $news->created_at->format('d M, Y') }}
                        <p>
                            {!! $news->short_description !!}
                        </p>
                        <br>
                        <br>
                        <a href="{{ route('news.detail',$news->id) }}">
                            <button style="background-color: #06a57a;" class="btn btn-secondary">
                                Read More
                            </button>
                        </a>
                        </center>
                    </div>
                </div>
                <br>
                @endforeach
                </div>
                {{ $news_list->links() }} 
        </div>
        

        </main><!-- End .main -->

         @endsection  