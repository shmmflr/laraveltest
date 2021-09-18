<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{@asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{@asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{@asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{@asset('css/style.css')}}">
    <link rel="stylesheet" href="{{@asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{@asset('css/bootstrap-icons.css')}}">


</head>
<body>
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <img src="img/logo.png" width="160" height="50">
            </div>
            <div class="col-md-6 link">
                @auth()
                    <a href="{{ route('admin') }}" class="btn btn-info">ورود به پنل کاربری</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">خروج</a>
                @else
                    <a href="{{ route('login') }}" class="login">ورود به سایت</a>
                    <a href="{{ route('register') }}" class="sabtnam">ثبت نام کنید</a>
                @endauth


            </div>


            <aside class="menu-bar">
                <nav id="menu_item">
                    <ul class="menu">
                        {{--منوی اولی--}}
                        <?php $parent_cats = \App\Models\Category::where([
                            ['parent', 0], ['status', 'on']
                        ])->get(); ?>
                        @foreach($parent_cats as $menu)
                            <li>
                                <a href="/category/{{$menu->title}}">
                                    {{$menu->title}}
                                </a>
                                {{--منوی دومی--}}
                                <?php $sub_cats = \App\Models\Category::where([
                                    ['parent', '=', $menu->id], ['status', 'on']
                                ])->get(); ?>
                                @if(count($sub_cats)>0)
                                    <ul class="sub-menu">
                                        @foreach($sub_cats as $sub)
                                            <li>
                                                <a href=" /category/{{$sub->title}}"
                                                >{{$sub->title}}</a>
                                                {{--منوی سومی--}}
                                                <?php $sub_cats2 = \App\Models\Category::where([
                                                    ['parent', '=', $sub->id], ['status', 'on']
                                                ])->get(); ?>
                                                <ul class="sub-menu">
                                                    @foreach($sub_cats2 as $sub2)
                                                        <li>
                                                            <a href=" /category/{{$sub2->title}}">
                                                                {{$sub2->title}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </aside>
        </div>
    </div>
</div>
<br>
<br>
@yield('mainContent')
<br>
<br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 box-footer">
                <h5>دسترسی سریع</h5>
                <div class="top-bar">
                    <div class="right-top-bar">
                        <ul>
                            <li id="menu-item-69" class="menu-item"><a title="وبسافت3" href="http://websoft3.com"
                                                                       dideo-checked="true">صفحه اصلی</a></li>
                            <li class="menu-item"><a href="#">درباره ما</a></li>
                            <li class="menu-item"><a href="#">تماس با ما</a></li>
                            <li class="menu-item"><a href="#">پرداخت آنلاین</a></li>
                            <li class="menu-item"><a href="#">حساب کاربری من</a></li>
                            <li class="menu-item"><a href="#">همکاری با ما</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-8 box-footer">
                <h5>درباره وبسافت3</h5>
                <div class="top-bar">
                    <div class="right-top-bar">
                        <div class="textwidget">وبسافت3 فعالیت خود را در تاریخ 1393/10/7 در زمینه تولید فیلم های آموزش
                            طراحی سایت و و وردپرس آغاز کرده.
                            یکی از دغدغه های بیشتر افراد محصل در رشته های مختلف و به خصوص رشته کامپیوتر، ترس از بیکاری و
                            بدست نیاوردن شغل مورد علاقه شان بعد از فارق التحصیلی هست. ما با در نظر گرفتن این موضوع و
                            تلاش برای پوشش دادن این نوع دغدغه ها در حد توان به عنوان یک مرجع آموزشی سعی میکنیم به اهداف
                            شغلی خود دست پیدا کنند.
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-12 copy-right">
                تمامی حقوق و مطالب سایت برای وبسافت3 محفوظ می باشد و کپی برداری از مطالب رایگان باذکر منبع آزاد است.
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>


<script src="{{@asset('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{@asset('js/bootstrap.min.js')}}"></script>
<script src="{{@asset('js/owl.carousel.min.js')}}"></script>
<script src="{{@asset('js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        $('body').persiaNumber();  // برای کل صفحه
    });

</script>

</body>
</html>
