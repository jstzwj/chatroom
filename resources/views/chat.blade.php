@extends('main')


@section('css')
<style type="text/css">
  .chat-diplay-box
  {
    float:left;
    height:480px;
    width:100%;
    margin: auto;
    background-color: rgb(235,235,240);
    /*border-radius: 10px;*/
    overflow-x: hidden; /*控制X方向的滚动条*/
    overflow-y:auto;  /*控制Y方向的滚动条*/
    
  }
  .char-separater
  {
    float:left;
    width:100%;
    padding: 1px 20px;
    margin: 20px 0px;
    line-height: 1px;
    font-family: Times;
    border-left: 200px solid #ddd;
    border-right: 200px solid #ddd;
    border-color: rgb(170,170,170);
    text-align: center;
    box-sizing: border-box;
  }
  .chat-time-box
  {
    float:left;
    margin: 5px;
    height:30px;
    width:100%;
    line-height: 30px;
    text-align:center;
    font-family: Times;
    color:rgb(145,145,145);
    box-sizing: border-box;
  }
  .chat-msg-box-left
  {
    float:left;
    width:100%;
    margin:15px;
  }
  .chat-msg-box-right
  {
    float:left;
    width:100%;
    margin:15px;
    
  }
  .chat-avatar-box-left
  {
    position: relative;
    float:left;
    width:40px;
    height: 40px;
    border-radius: 40px;
    border-style: solid;
    border-width: thin;
    overflow:hidden;
    margin-left:30px;
  }
  .chat-avatar-box-right
  {
    position: relative;
    float:right;
    width:40px;
    height: 40px;
    border-radius: 40px;
    border-style: solid;
    border-width: thin;
    overflow:hidden;
    margin-right: 30px;
  }
  .chat-name-text-left
  {
    position: relative;
    float:left;
    margin-top: 0px;
    margin-left: 30px;
  }
  .chat-name-text-right
  {
    position: relative;
    float:right;
    margin-right: 30px;
    text-align: right;
  }
  .chat-name-box-left
  {
    position: relative;
    float:left;
    margin: 5px;
    width: 100%;
  }
  .chat-name-box-right
  {
    position: relative;
    float:right;
    margin: 5px;
    width: 100%;
  }
  .chat-text-box-left
  {
    position: relative;
    float:left;
    padding: 10px;
    border-radius: 10px;
    margin:5px;
    background-color:rgb(255,255,255);
    left: -25px;
    top: 5px;
  }
  .chat-text-box-right
  {
    position: relative;
    float:right;
    padding: 10px;
    border-radius: 10px;
    margin:5px;
    background-color:rgb(255,255,255);
    right: -25px;
    top: 5px;
    background-color: lightskyblue;
  }
  .chat-text-corner-box-left
  {
    position: relative;
    float:left;
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 20px solid rgb(255,255,255);
    transform: translate(-10px,0px) rotateZ(-45deg);
  }
  .chat-text-corner-box-right
  {
    position: relative;
    float:right;
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 20px solid lightskyblue;
    transform: translate(10px,0px) rotateZ(45deg);
  }
  .chat-input-box
  {
    float:left;
    width:100%;
    margin: 0px;
    background-color: rgb(255,255,255);
    /*border-radius: 10px;*/
  }
  .chat-text-input-box
  {
    padding:25px;
    position: relative;
    float:left;
    height:80px;
    width:100%;
    background-color: rgb(255,255,255);
    border-style: solid;
    border-width: thin;
    resize: none;
    border-radius: 10px;
  }
  .chat-button
  {
        box-sizing: border-box;
        background-color: rgb(220,220,220);
        padding: 6px 12px;
        border-style: none;
        border-style: solid;
        border-width: 1px;
        border-radius: 10%;
        cursor: pointer;
  }
  .chat-button-default
  {
    box-sizing: border-box;
    background-color: rgb(250,250,250);
    border-style: solid;
    border-width: 1px;
    border-color: rgb(192,192,192);
  }
  .chat-button-primary
  {
    color: rgb(255,255,255);
    background-color: rgb(66,139,202);
    border-color: rgb(53,126,189);
    box-shadow: inset 0 1px 0 rgba(255,255,255,.15),0 1px 1px rgba(0,0,0,.075);
  }
  .chat-area{
    float: left;
    margin-down:10px;
    width:80%;
  }
  .friend-list{
    float: left;
    width:20%;
  }
  .friend-item{
    float: left;
    width:100%;
    background-color: rgb(235,235,240);
    height: 50px;
    padding:10px;
    cursor: pointer;
  }
  .friend-item:hover{
    background-color: rgb(192,192,192);
  }
  .friend-avatar{
    float: left;
    width:30px;
    height:30px;
    border: solid thin;
    margin: 5px;
  }
  .friend-name{
    float:left;
    position: relative;
    top:10px;
  }
</style>


@stop


@section('js')
<script>
$(document).ready(
function()
{
    $('.chat-diplay-box').scrollTop($('.chat-diplay-box')[0].scrollHeight);
});

</script>
@stop



@section('col')

<div style="margin-top:50px">
 <!--好友列表-->
<div class="friend-list">
  @if(isset($user_list) && count($user_list) > 0)
    @foreach($user_list as $each_user)
     <div class="friend-item">
      <div class="friend-avatar"></div>
      <div class="friend-name">{{$each_user->user_name}}</div>
    </div>
    @endforeach
  @endif
</div>
<div class="chat-area">
<div class="chat-diplay-box">

  <!--分割线-->
  <div class="char-separater">
    以下为10分钟内历史消息
  </div>

  

  <?php $time=""?>
  @if(isset($msg_list) && count($msg_list) > 0)
    @foreach($msg_list as $each_msg)
    <?php
      $len1=strlen($time);
      $len2=strlen($each_msg->chat_time);
      $subtime=substr($time,0,$len1-2);
      $submsgtime=substr($each_msg->chat_time,0,$len2-2);
      if($subtime!= $submsgtime)
      {
        $time=$each_msg->chat_time;
        echo '<div class="chat-time-box">'.$time.'</div>';
      }
    ?>


    @if($user_id===$each_msg->chat_user_id)
    <!--第四个-->
      <div class="chat-msg-box-right">

        <div class="chat-avatar-box-right">
          {{$each_msg->user_avatar}}
        </div>
        <div class="chat-name-text-right">
          <div class="chat-name-box-right">
            {{$each_msg->user_name}}
          </div>

          <div class="chat-text-corner-box-right">
          </div>

          <div class="chat-text-box-right">
            {{$each_msg->chat_msg}}
          </div>
        </div>

      </div>


    @else
    <!--第一个-->
    <div class="chat-msg-box-left">

      <div class="chat-avatar-box-left">
        {{$each_msg->user_avatar}}
      </div>
      <div class="chat-name-text-left">
        <div class="chat-name-box-left">
          {{$each_msg->user_name}}
        </div>

        <div class="chat-text-corner-box-left">
        </div>

        <div class="chat-text-box-left">
          {{$each_msg->chat_msg}}
        </div>
      </div>

    </div>
    @endif
     
    @endforeach
  @endif

</div>


<form class="form-chat" role="form" action="{{url('chat_msg')}}" method="post">
<?php echo method_field('PUT'); ?>
<?php echo csrf_field(); ?>
<div class="chat-input-box">
  <div></div>
  <div>
    <textarea class="chat-text-input-box" name="chat_msg"></textarea>
  </div>
  <div style="float:right;">
    <button type="submit" class="chat-button chat-button-primary">send</button>
  </div>
</div>
</form>

</div>

@stop

