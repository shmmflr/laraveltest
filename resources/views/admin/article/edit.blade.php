@extends('admin.Layout.admin_layout')

@section('adminContent')


    <div class="content-panel">
        <div class="container-fluid" style="padding: 0">
            <div class="row">

                <div class="col-md-11">
                    <p class="title-form">ویرایش مقاله </p>
                    <form action="{{route('article.update',$article->title)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-9">


                                <input class="form-control inputbig" type="text" name="title"
                                       value="{{$article->title}}">

                                <br>
                                <textarea class="form-control" name="content" id="body"
                                          rows="12">{{$article->content}}</textarea>

                                <br>


                            </div>

                            <div class="col-md-3">

                                <div class="box-widget">
                                    <h5>ذخیره : </h5>
                                    <button class="btn btn-primary btn-block" type="submit">
                                        ذخیره مقاله
                                    </button>
                                    <br>
                                    <div class="custom-control custom-switch col-12">
                                        <input type="checkbox" value="publish" class="custom-control-input" id="status"
                                               name="status"
                                               @if($article->status=='publish') checked @endif>
                                        <label class="custom-control-label" for="status">انتشار/بایگانی</label>
                                    </div>
                                </div>


                                <div class="box-widget">
                                    <h5>دسته : </h5>

                                    <div class="custom-control custom-checkbox">
                                        @foreach($categories as $category)
                                            <div class="boxcheck">
                                                <input name="cat[]" value="{{$category->id}}" type="checkbox"
                                                       class="custom-control-input" id="{{$category->id}}"
                                                       @foreach($article->categories as $catName)
                                                       @if($catName->id == $category->id) checked @endif
                                                    @endforeach
                                                >
                                                <label class="custom-control-label"
                                                       for="{{$category->id}}">{{$category->title}}</label>
                                                <?php $subCat = \App\Models\Category::where('parent', '=', $category->id)->get() ?>
                                                @if(count($subCat)>0)
                                                    <div class="custom-control custom-checkbox ">
                                                        @foreach($subCat as $cat)
                                                            <div class="boxcheck">
                                                                <i class="bi bi-arrow-return-left"></i>
                                                                <input name="cat[]" value="{{$cat->id}}" type="checkbox"
                                                                       class="custom-control-input" id="{{$cat->id}}"
                                                                       @foreach($article->categories as $catName)
                                                                       @if($catName->id == $cat->id) checked @endif
                                                                    @endforeach
                                                                >
                                                                <label class="custom-control-label"
                                                                       for="{{$cat->id}}">{{$cat->title}}</label>
                                                                <?php $subCat2 = \App\Models\Category::where('parent', '=', $cat->id)->get() ?>
                                                                @if(count($subCat2)>0)
                                                                    <div class="custom-control custom-checkbox ">
                                                                        @foreach($subCat2 as $cat2)
                                                                            <div class="boxcheck">
                                                                                <i class="bi bi-arrow-return-left"></i>
                                                                                <i class="bi bi-arrow-return-left"></i>
                                                                                <input name="cat[]"
                                                                                       value="{{$cat2->id}}"
                                                                                       type="checkbox"
                                                                                       class="custom-control-input"
                                                                                       id="{{$cat2->id}}"
                                                                                       @foreach($article->categories as $catName)
                                                                                       @if($catName->id == $cat2->id) checked @endif
                                                                                    @endforeach
                                                                                >
                                                                                <label class="custom-control-label"
                                                                                       for="{{$cat2->id}}">{{$cat2->title}}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>


                                </div>


                                <div class="box-widget">
                                    <h5>تصویر شاخص</h5>
                                    <img src="{{$article->img}}" width="100%" height="100%">
                                    <br>
                                    <hr>
                                    <input type="file" name="img">
                                </div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
