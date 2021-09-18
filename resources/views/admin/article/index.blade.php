@extends('admin.Layout.admin_layout')

@section('adminContent')


    <div class="content-panel">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="row">
                                <div class="col-md-8 d-flex">
                                    <form method="get" class="col-12" style="display: contents">
                                        <div class="col-3">
                                            <select name="list_search" class="form-control">
                                                <option value="title"
                                                        @if(!empty($_GET['text_search']) && $_GET['list_search']=="title") selected @endif
                                                >عنوان
                                                </option>
                                                <option value="content"
                                                        @if(!empty($_GET['text_search']) && $_GET['list_search']=='content') selected @endif
                                                >محتوا
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <input placeholder="جستجو..." name="text_search" type="text"
                                                   value="@if(!empty($_GET['text_search'])) {{$_GET['text_search']}} @endif"
                                                   class="form-control">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" class="btn btn-primary w-100"
                                                   value="جستجو">
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-outline-dark" href="{{route('article.create')}}">افزودن مقاله
                                        جدید</a>
                                    <span>  تعداد کل :  {{$count}} </span>
                                </div>


                            </div>
                            <div style="display: block">
                                @if(!empty($_GET['text_search']))
                                    <a class="btn btn-danger" href="{{route('article.index')}}">نمایش تمام
                                        عناصر</a>
                                    {{$search_count}}پیدا شده است
                                @endif
                            </div>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                {{--<th>محتوا</th>--}}
                                <th>دسته بندی</th>
                                <th>عکس</th>
                                <th>نویسنده</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr class="bg-light ">
                                    <td>{{$article->title}}</td>
                                    <td>
                                        @foreach($article->categories as $val)
                                            {{$val->title}},
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{$article->img}}" width="80" height="50"/>
                                    </td>
                                    <td>
                                        {{$article->user->name}}

                                    </td>
                                    <td>
                                        @if($article->status=='publish')
                                            <span class="alert alert-success p-1"
                                                  style="color: #1c7430 ; ">منتشر شده</span>
                                        @else <span class="alert alert-warning  p-1"
                                                    style="color: #cab34e; ">بایگانی</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$article->created_at}}
                                    </td>

                                    <td><a href="{{route('article.edit',$article->title)}}"
                                           class="btn btn-primary btn-xs">

                                            <i class="bi bi-pen"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('article.destroy',$article->title)}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="bi bi-trash2"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div class="w-100" style="display: inline-block;direction: initial">
                            <div style="display: flex;justify-content: center;margin-top: 10px">
                                {{$articles->links()}}
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>


@endsection
