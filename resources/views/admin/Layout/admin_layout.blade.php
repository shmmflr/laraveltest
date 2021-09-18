<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <link rel="stylesheet" href="{{@asset('../css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{@asset('../css/style.css')}}">
    <link rel="stylesheet" href="{{@asset('../css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{@asset('../css/bootstrap-icons.css')}}">
</head>
<body>
<div class="topmenu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <a class="btn btn-primary" href="{{@route('index')}}">نمایش سایت</a>
                <a class="btn btn-danger" href="{{@route('logout')}}">خروج</a>


            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="admin-container">
        <div class="row">
            <div class="col-md-2">
                @include('admin.Layout.admin_sidebar')
            </div>

            <div class="col-md-10">
                @yield('adminContent')
            </div>
        </div>
    </div>
</div>


<script src="{{@asset('../js/jquery-1.11.3.min.js')}}"></script>
<script src="{{@asset('../js/bootstrap.min.js')}}"></script>
<script src="{{@asset('../js/main.js')}}"></script>
<script src="{{@asset('../js/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script>
    $(document).ready(function () {
        $('body').persiaNumber();  // برای کل صفحه
    });

</script>

<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        language: 'fa',
        plugins: 'link',
        menubar: false,
        font_formats: "IRANSansWeb=IRANSansWeb",
        toolbar: "undo redo | fontsizeselect fontselect |copy cut paste | selectall remove |backcolor forecolor| bold italic underline | link image alignleft aligncenter alignright ltr rtl",
        statusbar: false,
        // plugins: 'advlist autolink link image lists charmap print preview',
        paste_auto_cleanup_on_paste: true,
        paste_postprocess: function (pl, o) {
            o.node.innerHTML = o.node.innerHTML.replace(/&nbsp;/ig, " ");
        }
    });
</script>

</body>
</html>
