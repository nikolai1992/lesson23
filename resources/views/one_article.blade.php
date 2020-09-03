@extends('layouts.app')

@section('content')
    <div class="content blog-content">

        <div class="breadcrumbs">

            <div itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__content">
        <span itemprop="itemListElement" class="breadcrumbs__item" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemtype="http://schema.org/Thing" itemprop="item" href="/">
                <span itemprop="name"><svg class="icon" width="10" height="12" viewBox="0 0 10 12" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd"
      d="M4.69303 0.605324C4.87358 0.464892 5.12642 0.464892 5.30697 0.605324L9.80697 4.10532C9.92876 4.20005 10 4.3457 10 4.5V10C10 10.3978 9.84196 10.7794 9.56066 11.0607C9.27936 11.342 8.89783 11.5 8.5 11.5H1.5C1.10217 11.5 0.720644 11.342 0.43934 11.0607C0.158035 10.7794 0 10.3978 0 10V4.5C0 4.3457 0.0712364 4.20005 0.19303 4.10532L4.69303 0.605324ZM1 4.74454V10C1 10.1326 1.05268 10.2598 1.14645 10.3536C1.24021 10.4473 1.36739 10.5 1.5 10.5H8.5C8.63261 10.5 8.75978 10.4473 8.85355 10.3536C8.94732 10.2598 9 10.1326 9 10V4.74454L5 1.63343L1 4.74454Z"
      fill="#A7A7A7"></path>
<path fill-rule="evenodd" clip-rule="evenodd"
      d="M3 6C3 5.72386 3.22386 5.5 3.5 5.5H6.5C6.77614 5.5 7 5.72386 7 6V11C7 11.2761 6.77614 11.5 6.5 11.5C6.22386 11.5 6 11.2761 6 11V6.5H4V11C4 11.2761 3.77614 11.5 3.5 11.5C3.22386 11.5 3 11.2761 3 11V6Z"
      fill="#A7A7A7"></path>
</svg> Главная</span>
            </a>
            <meta itemprop="position" content="1">
        </span>

                <span class="breadcrumbs__devider">›</span>

                <span itemprop="itemListElement" class="breadcrumbs__item" itemscope=""
                      itemtype="http://schema.org/ListItem">
            <a itemtype="http://schema.org/Thing" href="{{route('blog')}}" itemprop="item">
               <span>Блог</span>
                <meta itemprop="name" content="Блог">
            </a>
            <meta itemprop="position" content="2">
        </span>

                <span class="breadcrumbs__devider">›</span>

                <span itemprop="itemListElement" class="breadcrumbs__item" itemscope=""
                      itemtype="http://schema.org/ListItem">
                    <a itemtype="http://schema.org/Thing" href="#" itemprop="item">
                       <span>{{$article->name}}</span>
                        <meta itemprop="name" content="{{$article->name}}">
                    </a>
                    <meta itemprop="position" content="3">
                </span>
            </div>
        </div>

        <div class="mainbar">
            <div class="article">
                <h1>{{$article->name}}</h1>
                <div class="clr"></div>
                <div class="article-one-img">
                    <img src="{{asset($article->image)}}">
                </div>

                <div class="description-div">{{$article->description}}</div>
                <div class="post-data">
                    <p><span>{{Carbon\Carbon::parse($article->updated_at)->format("d.m.Y")}}</span>
                        <span class="spec"><a href="{{route('blog', $article->id)}}" class="rm">Назад</a></span>
                    </p>
                </div>

            </div>
        </div>
        <div class="clr"></div>
    </div>
@endsection
@section('style')
    <link href="{{asset('/css/blog.css')}}" rel="stylesheet">
@endsection