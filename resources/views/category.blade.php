@extends('layouts.main_layout')

@section('mainContent')


    <div class="clearfix"></div>

    <br>
    <br>
    <div class="title-main">
        <h4>آخرین مطالب {{$category->title}}</h4>
    </div>

    <div class="container-fluid post-container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    @foreach($articles as $art)
                        <article class="post">
                            <div class="thumb">
                                <img src="{{$art->img}}" width="260" height="150">
                            </div>
                            <div class="post-title">
                                <h2><a target="_blank" href="/single/{{$art->title}}"
                                       dideo-checked="true">{{$art->title}}</a>
                                </h2>
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-txt">
                                <h4>
                                    {{$art->content}}
                                </h4>
                            </div>
                            <div class="post-foot-container">
                                <div class="line-border"></div>
                                <div class="p-c-view"><i class="fa fa-eye"></i>
                                    {{$art->created_at}}
                                </div>
                                <div class="p-c-view"><i class="fa fa-comment"></i> نویسنده
                                    : {{$art->user->name}}
                                </div>
                            </div>
                        </article>
                    @endforeach
                    <div class="w-100" style="display: inline-block;direction: initial">
                        <div style="display: flex;justify-content: center;margin-top: 10px">
                            {{$articles->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
