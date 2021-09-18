@extends('admin.Layout.admin_layout')

@section('adminContent')


    <div class="content-panel">
        <div class="container-fluid" style="padding: 0">
            <div class="row">

                <div class="col-md-11">
                    <p class="title-form">افزودن مقاله جدید</p>
                    <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">


                                <input class="form-control inputbig" type="text" name="title"
                                       placeholder="عنوان را اینجا وارد کنید">

                                <br>
                                <textarea class="form-control" name="content" id="body" rows="12"></textarea>

                                <br>


                            </div>

                            <div class="col-md-3">

                                <div class="box-widget">
                                    <h5>انتشار : </h5>
                                    <button class="btn btn-primary btn-block" type="submit">
                                        انتشار پست
                                    </button>
                                    <br>
                                    <div class="custom-control custom-switch col-12">
                                        <input type="checkbox" value="publish" class="custom-control-input" id="status"
                                               name="status"
                                               checked="">
                                        <label class="custom-control-label" for="status">انتشار/بایگانی</label>
                                    </div>
                                </div>


                                <div class="box-widget">
                                    <h5>دسته : </h5>

                                    <div class="custom-control custom-checkbox">
                                        @foreach($categories as $category)
                                            <div class="boxcheck">
                                                <input name="cat[]" value="{{$category->id}}" type="checkbox"
                                                       class="custom-control-input" id="{{$category->id}}">
                                                <label class="custom-control-label"
                                                       for="{{$category->id}}">{{$category->title}}</label>
                                                <?php $subCat = \App\Models\Category::where('parent', '=', $category->id)->get() ?>
                                                @if(count($subCat)>0)
                                                    <div class="custom-control custom-checkbox ">
                                                        @foreach($subCat as $cat)
                                                            <div class="boxcheck">
                                                                <i class="bi bi-arrow-return-left"></i>
                                                                <input name="cat[]" value="{{$cat->id}}" type="checkbox"
                                                                       class="custom-control-input" id="{{$cat->id}}">
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
                                                                                       id="{{$cat2->id}}">
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
