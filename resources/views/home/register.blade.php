<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="OrcasThemes">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <title>三剑客视频网站注册</title>
      <!-- Bootstrap core CSS -->
      <link href="{{asset('home/css/bootstrap.css')}}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{asset('home/css/screen.css')}}">
      <link rel="stylesheet" href="{{asset('home/css/animation.css')}}">
      <!--[if IE 7]>

      <![endif]-->
      <link rel="stylesheet" href="{{asset('home/css/font-awesome.css')}}">
      <!--[if lt IE 8]>
      <link rel="stylesheet" href="{{asset('home/css/ie.css')}}" type="text/css" media="screen, projection">
      <![endif]-->
      <link href="{{asset('home/css/lity.css')}}" rel="stylesheet">
      <link href="{{asset('home/css/jphtmlp.css')}}" type="text/css" rel="stylesheet" />
   </head>
   <body>
      <!-- LOGIN -->
      <div id="login" class="container-fluid standard-bg">
         <!-- HEADER -->
         <div class="row header-top">
            <div class="col-lg-3 col-md-6 col-sm-5">
               <a class="main-logo" href="#"><img src="{{asset('home/img/main-logo.png')}}" class="main-logo" alt="Muvee Reviews" title="Muvee Reviews"></a>
            </div>
            <div class="col-lg-6 hidden-md text-center hidden-sm hidden-xs">
               <img src="{{asset('home/img/banners/banner-sm.jpg')}}" class="img-responsive" alt="Buy Now">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-7 hidden-xs">
               <div class="right-box">
                  <button type="button" class="access-btn" data-toggle="modal" data-target="#enquirypopup">get free access</button>
               </div>
            </div>
         </div>
         <!-- MENU -->
         <div class="row home-mega-menu ">
            <div class="col-md-12">
               <nav class="navbar navbar-default">
                  <div class="navbar-header">
                     <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
                  <div class="collapse navbar-collapse js-navbar-collapse megabg dropshd ">
                     <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
						<li><a href="single-video.html">Video Post</a></li>
						<li><a href="single-page.html">Single Page - Basic</a></li>
						<li><a href="single-page-with-img.html">Single Page - with Image</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="gallery-video-boxed.html">Gallery</a></li>
						<li><a href="contact.html">Contact</a></li>
                     </ul>
                     <ul class="social">
                        <li class="social-facebook"><a href="#" class="fa fa-facebook social-icons"></a></li>
                        <li class="social-google-plus"><a href="#" class="fa fa-google-plus social-icons"></a></li>
                        <li class="social-twitter"><a href="#" class="fa fa-twitter social-icons"></a></li>
                        <li class="social-youtube"><a href="#" class="fa fa-youtube social-icons"></a></li>
                        <li class="social-rss"><a href="#" class="fa fa-rss social-icons"></a></li>
                     </ul>
                     <div class="search-block">
                        <form>
                           <input type="search" placeholder="Search">
                        </form>
                     </div>
                  </div>
                  <!-- /.nav-collapse -->
               </nav>
            </div>
         </div>
         <!-- LOGIN -->
         <div class="row">
            <div class="container">
               <section class="registration col-lg-12 col-md-12">
                @yield('content')
               </section>
            </div>
            <!-- BOTTOM BANNER -->
            <div id="bottom-banner" class="container text-center">
               <!-- BOTTOM ADVERTISE BOX -->
               <a href="" class="banner-xl">
               <img src="{{asset('home/img/banners/banner-xl.jpg')}}" class="img-responsive" alt="Buy Now Muvee Reviews Bootstrap HTML5 Template" title="Buy Now Muvee Reviews Bootstrap HTML5 Template">
               </a>
            </div>
         </div>
      </div>
      <!-- FOOTER -->
      <div id="footer" class="container-fluid footer-background">
         <div class="container">
            <footer>
               <!-- SECTION FOOTER -->
               <div class="row">
                  <!-- SOCIAL -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <div class="row auto-clear">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-12">
                           <ul class="social">
                              <li class="social-facebook"><a href="#" class="fa fa-facebook social-icons"></a></li>
                              <li class="social-google-plus"><a href="#" class="fa fa-google-plus social-icons"></a></li>
                              <li class="social-twitter"><a href="#" class="fa fa-twitter social-icons"></a></li>
                              <li class="social-youtube"><a href="#" class="fa fa-youtube social-icons"></a></li>
                              <li class="social-rss"><a href="#" class="fa fa-rss social-icons"></a></li>
                           </ul>
                        </div>
                        <div class="col-md-12">
                           <p>Aliquam feugiat turpis quis felis adipiscing, non pulvinar odio lacinia. Aliquam elementum pharetra fringilla. Duis blandit, sapien in semper vehicula, tellus elit gravida odio, ac tincidunt nisl mi at ante. Vivamus tincidunt nunc nibh. Duis blandit, sapien in semper vehicula</p>
                        </div>
                     </div>
                  </div>
                  <!-- TAGS -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <h2 class="title">popular tags</h2>
                     <ul class="footer-tags">
                        <li><a href="#">videos</a></li>
                        <li><a href="#">premium</a></li>
                        <li><a href="#">hair</a></li>
                        <li><a href="#">beauty</a></li>
                        <li><a href="#">ranking</a></li>
                        <li><a href="#">lifestyle</a></li>
                        <li><a href="#">sport</a></li>
                        <li><a href="#">money</a></li>
                        <li><a href="#">comments</a></li>
                     </ul>
                  </div>
                  <!-- POST -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <h2 class="title">PREMIUM inside?</h2>
                     <div class="row auto-clear">
                        <div class="col-lg-6 col-md-6 col-sm-6 post post-medium">
                           <div class="thumbr">
                              <a class="post-thumb" href="" data-lity title="Video Title Goes Here">
                                 <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                 <div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
                                 <img class="img-responsive" src="{{asset('home/img/thumbs/thumb-s.jpg')}}" alt="#">
                              </a>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 post post-medium">
                           <div class="thumbr">
                              <a class="post-thumb" href="" data-lity title="Video Title Goes Here">
                                 <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                 <div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
                                 <img class="img-responsive" src="{{asset('home/img/thumbs/thumb-s2.jpg')}}" alt="#">
                              </a>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 post post-medium">
                           <div class="thumbr">
                              <a class="post-thumb" href="" data-lity title="Video Title Goes Here">
                                 <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                 <div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
                                 <img class="img-responsive" src="{{asset('home/img/thumbs/thumb-s4.jpg')}}" alt="#">
                              </a>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 post post-medium">
                           <div class="thumbr">
                              <a class="post-thumb" href="" data-lity title="Video Title Goes Here">
                                 <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                                 <div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
                                 <img class="img-responsive" src="{{asset('home/img/thumbs/thumb-s3.jpg')}}" alt="#">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- LINKS -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <h2 class="title">most viewed</h2>
                     <ul class="footer-menu-links">
                        <li class="fa fa-chevron-right"><a href="#">About Us</a></li>
                        <li class="fa fa-chevron-right"><a href="#">Categories</a></li>
                        <li class="fa fa-chevron-right"><a href="#">Features</a></li>
                        <li class="fa fa-chevron-right"><a href="#">Pages</a></li>
                        <li class="fa fa-chevron-right"><a href="#">Gallery</a></li>
                     </ul>
                  </div>
               </div>
               <div class="row copyright-bottom text-center">
                  <div class="col-md-12 text-center">
                     <a href="" class="footer-logo" title="Video Magazine Bootstrap HTML5 template">
                     <img src="{{asset('home/img/footer-logo.png')}}" class="img-responsive text-center" alt="Video Magazine Bootstrap HTML5 template">
                     </a>
                     <p>Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://www.aspku.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>

                  </div>
               </div>
            </footer>
         </div>
      </div>
      <!-- JAVA SCRIPT -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="{{asset('home/js/jquery-1.12.1.min.js')}}"></script>
      <script src="{{asset('home/js/jquery-1.8.3.min.js')}}"></script>

      <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
      <script>
         $(".nav .dropdown").hover(function() {
           $(this).find(".dropdown-toggle").dropdown("toggle");
         });
      </script>
      <!-- MODAL -->
      <div id="enquirypopup" class="modal fade in " role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content row">
               <div class="modal-header custom-modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i>free access</h2>
               </div>
               <div class="modal-body">
                  <form name="info_form" class="form-inline" action="#" method="post">
                     <div class="form-group col-sm-12">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                     </div>
                     <div class="form-group col-sm-12">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                     </div>
                     <div class="form-group col-sm-12">
                        <button class="subscribe-btn pull-right" type="submit" title="Subscribe">Subscribe</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>

   <script >

       $('input[name="pass"]').focus(function(){
           //把input后面的span提示删除
           $(this).next('span').remove();
       }).blur(function(){
           // alert(111111111);
           //获取用户输入的用户名
           var v = $(this).val();
           // alert(v);
           // 发送地址
           var url = "{{ url('home/ajax') }}";
           // alert(url);

           $.ajax({
               url:url,
               type:'get',
               async:true,
               data:{name:v},
               //因为返回值为'y'或者'n'的字符串,所以这里类型不能写json
                // dataType:'json',

               success:function(data)
               {

                   if(data=='y'){
                       $('<span style="color:#10F310;font-size:15px;">密码符合要求</span>').insertAfter('input[name="pass"]');
                   }else{
                       $('<span style="color:#F70909;font-size:15px;">密码不能少于6位字符,请重新输入</span>').insertAfter('input[name="pass"]');
                   }
               },
               error:function(){
                   alert('ajax请求失败');
               }
           });


       });
   </script>

      <!-- 判断手机确认密码 -->
    <script type="text/javascript">
    $('input[name = "repass"]').focus(function(){
      $(this).next('span').remove();
    }).blur(function(){
      var dv = $(this).val();
      var v = $('input[name="pass"]').val();
      var url = "{{url('home/confirmajax')}}"

      $.ajax({
          url:url,
          type:'get',
          async:true,
          data:{name:dv,cname:v},

          success:function(data)
          {

              if(data=='y'){
                  $('<span style="color:#10F310;font-size:15px;">密码一致</span>').insertAfter('input[name="repass"]');
              }else{
                  $('<span style="color:#F70909;font-size:15px;">密码不一致,请重新输入</span>').insertAfter('input[name="repass"]');
              }
          },
          error:function(){
              alert('ajax请求失败');
          }

      });
    });
    </script>

   <script >

       $('input[name="phone"]').focus(function(){
           //把input后面的span提示删除
           $(this).next('span').remove();
       }).blur(function(){
           // alert(111111111);
           //获取用户输入的用户名
           var v = $(this).val();
           // alert(v);
           // 发送地址
           var url = "{{ url('home/phoneajax') }}";
           // alert(url);

           $.ajax({
               url:url,
               type:'get',
               async:true,
               data:{name:v},
               //因为返回值为'y'或者'n'的字符串,所以这里类型不能写json
                // dataType:'json',

               success:function(data)
               {

                   if(data=='y'){
                       $('<span style="color:#10F310;font-size:15px;">请点击发送验证码</span>').insertAfter('input[name="phone"]');
                   }else{
                       $('<span style="color:#F70909;font-size:15px;">手机格式错误</span>').insertAfter('input[name="phone"]');
                   }
               },
               error:function(){
                   alert('ajax请求失败');
               }
           });


       });
   </script>

  <script type="text/javascript">
    // 发送验证码之后倒计时
    var enable = true;
    $('#getCode').click(function(event){
      if (enable == false) {
        return;
      }
        //检测手机号是否符合要求
        if($("#phoneNumber").val()==""){
            alert('手机号不能为空');
            return false;
        }
        if($("#phoneNumber").val().match(/^[1][3-8][0-9]{9}$/) == null){

            return false;
        }
         // alert($("#phoneNumber").val());


          var url = "{{url('home/phonecode')}}";
          var val = $('#phoneNumber').val();
          // alert(val);

        $.ajax({
              url:url,
              type:'get',
              async:true,
              data:{name:val},
              // alert(111111111);
            success:function(data){
                if(data){
                    RemainTime();

                    return false;
                }else{
                   alert('获取失败，请更换号码');
                   return false;
                }

            },
            error:function(){
                alert('获取验证码失败，请更换号码或稍后重试');
                return false;
            }
        });
    });
    var iTime = 59;
    var Account;

    function RemainTime(){
        $('#getCode').attr('disabled',true);
        var iSecond,sSecond="",sTime="";
        if (iTime >= 0){
            iSecond = parseInt(iTime%60);
            iMinute = parseInt(iTime/60)
            if (iSecond >= 0){
                if(iMinute>0){
                    sSecond = iMinute + "分" + iSecond + "秒";
                }else{
                    sSecond = iSecond + "秒";
                }
            }
            sTime=sSecond;
            if(iTime==0){
                clearTimeout(Account);
                sTime='获取验证码';
                iTime = 59;
                $('#getCode').attr('disabled',false);
            }else{
                Account = setTimeout("RemainTime()",1000);
                iTime=iTime-1;
            }
        }else{
            sTime='没有倒计时';
        }
        $('#getCode').html(sTime);
    }
  </script>
</html>
