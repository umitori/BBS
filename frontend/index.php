<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>xx论坛</title>

</head>             
<div class="top">
<div class="text">
      <div class="wenzi"><span style="display:inline-block"><a>首页</a>  ｜  <a>聊天室</a>  ｜  <a>我的主页</a> 

    <form method="post" action="get" >
      <dt>用户名<input type="text" name="username" class="px vm" tabindex="901" style="width:95px;" />
       密 码 <input type="password" name="password" class="px vm" tabindex="902" style="width:95px;" />

       <button type="submit" tabindex="904"><em>登录</em></button>
       <button type="submit" tabindex="904"><em>注册</em></button>
     </dt>
</div></span>
      <input type="hidden" name="quickforward" value="yes" />
      <input type="hidden" name="handlekey" value="ls" />
      
    </form>    
        
</div>
</div>


</body>
</html>




=======
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="data/css/bootstrap.css" rel="stylesheet" />
    <link href="data/css/index.css" rel="stylesheet" />
</head>

<body>
    <div class="header">
        <div class="navbar navbar-expand-md navbar-dark navbar-fixed-top fixed-top">
            <div class="collapse navbar-collapse nav_wrap">
                <ul class="navbar-nav">
                    <li class="nav-item"><a id="nav_index" class="nav-link" style="color:rgb(36, 35, 39)">没起名字论坛</a>
                    </li>
                    <li class="nav-item"><a id="nav_index" class="nav-link" href="/">首页</a></li>
                    <li class="nav-item"><a id="nav_share" class="nav-link" href="/">聊天室</a></li>
                    <li class="nav-item"><a id="nav_question" class="nav-link" href="/">个人主页</a></li>
                    <li class="nav-item"><a id="nav_blog" class="nav-link" href="/">个人中心</a></li>
                    <li class="nav-item">
                        <div id="search_box"><input type="text" id="search" placeholder="搜索您感兴趣的内容"
                                value="搜索您感兴趣的内容" /><i class="icon-search fa fa-search"></i></div>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse nav_wrap justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="/" class="nav-link">登录</a></li>
                    <li class="nav-item"><a href="/" class="nav-link">注册</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="wrap">
        <div class="screen-hd fn-clear">
            <div class="focus-pic">
                <div class="focus-pic-btn">
                    <a href="javascript:;" class="prevBtn"><i></i></a>
                    <a href="javascript:;" class="nextBtn"><i></i></a>
                </div>
                <ul class="focus-pic-img">
                    <li>
                        <div
                            style="width:730px;height:350px;border:none;padding:0px;margin:0px;overflow:hidden;position:relative;">
                            <a href="/" target="_blank"><img
                                    src="http://img2.imgtn.bdimg.com/it/u=347024744,2362982814&fm=26&gp=0.jpg"
                                    style="width:730px;height:350px;border:none;" /></a></div>

                    </li>
                    <li>
                        <div
                            style="width:730px;height:350px;border:none;padding:0px;margin:0px;overflow:hidden;position:relative;">
                            <a href="/" target="_blank"><img
                                    src="http://img2.imgtn.bdimg.com/it/u=347024744,2362982814&fm=26&gp=0.jpg"
                                    style="width:730px;height:350px;border:none;" /></a></div>

                    </li>
                    <li>
                        <div
                            style="width:730px;height:350px;border:none;padding:0px;margin:0px;overflow:hidden;position:relative;">
                            <a href="/" target="_blank"><img
                                    src="http://img2.imgtn.bdimg.com/it/u=347024744,2362982814&fm=26&gp=0.jpg"
                                    style="width:730px;height:350px;border:none;" /></a></div>

                    </li>
                </ul>
            </div>

        </div>
    </div>


    <script src="data/cache/jquery.js"></script>
    <script src="data/cache/slideshow.js"></script>
    <script>
        SlideShow(5000, "#slideContainer", "#slidesImgs", "#slideBar");
        SlideShow(5000, "#slideContainer1", "#slidesImgs1", "#slideBar1");
        SlideShow(5000, "#slideContainer2", "#slidesImgs2", "#slideBar2");
        $(function () {
            $(".user-infor").hover(
                function () {
                    $(this).children("ul").show();
                }, function () {
                    $(this).children("ul").hide();
                });
            $(".hot-site li").each(function () {
                var $this = $(this);
                var $siteDate = $this.find(".site-date")
                var time = $siteDate.html();
                time = time.substring(2);
                $siteDate.html(time);
            });
            $(".clickAD").bind("click", function () {
                var identifier = $(this).attr('name');
                var linkUrl = $(this).attr('href');
                $.post('/', { identifier: identifier, visitUrl: linkUrl });
            });
        })
    </script>




</body>

</html>
>>>>>>> first add
