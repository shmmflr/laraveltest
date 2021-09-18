@extends('admin.Layout.admin_layout')

@section('adminContent')


    <div class="content-panel">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <a class="btn btn-outline-dark" href="{{route('category.create')}}">افزودن منوی جدید</a>
                            <span>  تعداد کل :  {{$count}} </span>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>فعال / غیرفعال</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parent_menu as $menu)
                                <tr class="bg-info">
                                    <td>{{$menu->title}}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input name="status" type="checkbox" class="custom-control-input"
                                                   @if($menu->status=='on') checked @endif>
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </td>

                                    <td><a href="{{route('category.edit',$menu->title)}}"
                                           class="btn btn-primary btn-xs">

                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('category.destroy',$menu->title)}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="bi bi-trash2-fill"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr class="bg-light">
                                    <?php $sub_cat = \App\Models\Category::where('parent', '=', $menu->id)->get() ?>
                                    @foreach($sub_cat as $sub)
                                        <td>
                                            <i class="bi bi-arrow-return-left"></i>

                                            {{$sub->title}}</td>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input name="status" type="checkbox" class="custom-control-input"
                                                       @if($sub->status=='on') checked @endif>
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </td>

                                        <td><a href="{{route('category.edit',$sub->title)}}"
                                               class="btn btn-primary btn-xs">

                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('category.destroy',$sub->title)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger btn-xs">
                                                    <i class="bi bi-trash2-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                </tr>
                                <tr class="bg-light">
                                    <?php $sub_cat2 = \App\Models\Category::where('parent', '=', $sub->id)->get() ?>
                                    @foreach($sub_cat2 as $sub2)
                                        <td>
                                            <i class="bi bi-arrow-return-left"></i>
                                            <i class="bi bi-arrow-return-left"></i>
                                            {{$sub2->title}}</td>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input name="status" type="checkbox" class="custom-control-input"
                                                       @if($sub2->status=='on') checked @endif>
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </td>



                                        <td><a href="{{route('category.edit',$sub2->title)}}"
                                               class="btn btn-primary btn-xs">

                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('category.destroy',$sub2->title)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger btn-xs">
                                                    <i class="bi bi-trash2-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                </tr>

                            @endforeach
                            @endforeach
                            @endforeach

                            </tbody>

                        </table>
                    </section>
                </div>
            </div>

        </div>
    </div>

@endsection
