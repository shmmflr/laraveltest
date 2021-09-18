@extends('admin.Layout.admin_layout')

@section('adminContent')


    <div class="content-panel">
        <div class="container-fluid" style="padding: 0">
            <div class="row">

                <div class="col-md-12">
                    <p class="title-form">ویرایش دسته بندی</p>
                    <form action="{{route('category.update',$category->title)}}" class="my-form" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title">عنوان</label>
                                        <input class="form-control inputbig" type="text" id="title" name="title"
                                               value="{{$category->title}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sort">مرتب سازی</label>
                                        <input class="form-control inputbig" type="text" id="sort" name="sort"
                                               value="{{$category->sort}}">
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="parent">گروه بندی </label>
                                        <select class="form-control" name="parent">
                                            <option disabled="" selected="">گروه بندی</option>
                                            <option value="0"
                                                    @if($category->parent==0) selected @endif
                                            >سرگروه
                                            </option>
                                            @foreach($parent_menu as $item)
                                                <option value="{{$item->id}}"
                                                        @if($category->parent==$item->id) selected @endif
                                                >{{$item->title}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="parent">زیر گروه بندی </label>
                                        <select class="form-control" name="parent">
                                            <option selected="" disabled="">زیر گروه بندی</option>
                                            @foreach($parent_menu as $item)

                                                <?php $sub2 = \App\Models\Category::where('parent', '=', $item->id)->get()?>
                                                @foreach($sub2 as $sub)
                                                    <option value="{{$sub->id}}"
                                                            @if($category->parent==$sub->id) selected @endif
                                                    >{{$sub->title}}</option>

                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br><br>
                                <br>
                                <div class="custom-control custom-switch col-12">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                                           @if($category->status=='on') checked @endif>
                                    <label class="custom-control-label" for="status">فعال/غیر فعال</label>
                                </div>
                                <br>
                                <div class="w-100 d-flex justify-content-end">
                                    <input type="submit" class="btn btn-primary w-25" value="اعمال تغییرات">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
