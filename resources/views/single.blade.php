@extends('layouts.main_layout')

@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="post-single">
                    <div class="post-title-single"><h1>{{$article->title}}</h1>
                        <div class="clearfix"></div>
                        <div class="entry-meta">
                            <div class="view">
                                دسته بندی :
                                <ul class="post-categories">
                                    @foreach($article->categories as $cat)
                                        <li><a href="/category/{{$cat->title}}" rel="category tag">
                                                {{$cat->title}}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="view"><i class="fa fa-comment"></i>
                                منتشر شده در :{{$article->created_at}}
                            </div>
                            <div class="view"><i class="fa fa-user"></i><span> نویسنده : {{$article->user->name}}</span>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix"></div>
                    <div class="thumb-single-product"><img src="{{$article->img}}"
                                                           class="attachment-medium size-medium wp-post-image" alt="">
                    </div>

                    <div class="post-txt-single">
                        <p>
                            {{$article->content}}
                        </p>
                    </div>
                </div>

                <div class="box-comment">
                    <h3>نظر خود را در رابطه با این مقاله وارد کنید</h3>
                    <h3>برای ثبت نظر ابتدا باید
                        <a class="btn btn-warning" href="#">وارد شوید</a>
                        یا
                        <a class="btn btn-primary" href="#"> ثبت نام کنید </a>
                        کنید
                    </h3>


                    <div class="comment">
                        <img src="img/user.png">
                        <h5>رضاحیدری</h5>
                        <p>متن کامنت</p>
                    </div>


                    <div class="clearfix"></div>
                    <br>
                    <br>
                    <form action="/comment-post" method="post">
                        <span>متن نظر شما</span>
                        <textarea name="text"></textarea>
                        <input type="hidden" name="article_id" value="">
                        <input type="hidden" name="user_id" value="">
                        <input type="hidden" name="user_name" value="">
                        <input type="submit" class="btn btn-success" value="ثبت نظر">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
