@extends('home/register')
   @section('content')
                  <div class="row secBg">
                     <div class="large-12 columns">
                        <div class="login-register-content">
                           <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">

                              <div class="clearfix spacer"></div>
                              <div class="col-md-5 social-login">
                                 <div class="social-login" data-equalizer-watch>
                                    <h2 class="title main-head-title">使用第三方账号注册</h2>
                                    <div class="social-login-btn social-facebook">
                                       <a href="{{url('home/mail')}}"><i class="fa fa-facebook"></i>邮箱注册</a>
                                    </div>
                                    <div class="social-login-btn social-twitter">
                                       <a href="{{url('home/phone')}}"><i class="fa fa-twitter"></i>手机注册</a>
                                    </div>
                                    <div class="social-login-btn social-google-plus">
                                       <a href="#"><i class="fa fa-google-plus"></i>login via google plus</a>
                                    </div>
                                    <div class="social-login-btn social-youtube">
                                       <a href="#"><i class="fa fa-youtube"></i>login via YouTube</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="middle-sep">
                                    <i class="fa fa-arrow-left arrow-left"></i>
                                    <span>OR</span>
                                    <i class="fa fa-arrow-right arrow-right"></i>
                                 </div>
                              </div>


                              <div class="col-md-5">
                                @if (session('error'))
                                  <div class="alert alert-danger">
                                      {{ session('error') }}
                                      <script type="text/javascript">
                                          setTimeout(function(){
                                              location.href=location.href;
                                          },2000);
                                      </script>
                                  </div>
                              @endif

                              @if(session('msg'))
                                 <div class="alert alert-success">
                                    {{session('msg')}}
                                    <script type="text/javascript">
                                    setTimeout(function(){
                                       location.href = location.href;
                                    },2000);

                                    </script>
                                    </div>
                              @endif


                                 <div class="register-form">
                                    <h2 class="title main-head-title">邮箱注册</h2>

                                    <form method="post"  action="{{url('home/send')}}">
                                    {{csrf_field()}}
                                       <div class="input-group" >
                                          <span class="fa fa-user login-inputicon"></span>
                                          <input type="email" placeholder="请输入邮箱账号" required style="background: #1AA62B;" name="name">
                                       </div>
                                       <div class="input-group">
                                          <span class="fa fa-lock login-inputicon"></span>
                                          <input type="password" id="password" name="pass" placeholder="请输入6位字符以上密码" required style="background: #1AA62B;">
                                       </div>

                                       <div class="input-group">
                                          <span class="fa fa-lock login-inputicon"></span>
                                          <input type="password" id="password" name="repass" placeholder="请确认密码" required style="background: #1AA62B;">
                                       </div>

                                       <div class="login-btn-box">
                                          <input class="subscribe-btn pull-right" type="submit" name="submit" style="background: #1704BF; font-weight:bold;" value="注 &nbsp;&nbsp;&nbsp;册">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
   @endsection
