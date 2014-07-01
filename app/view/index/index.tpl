<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <title>PPPHP框架</title> 
  <meta name="keywords" content="天瓜网,天瓜,天瓜美文,智慧,青春,励志,正能量,美文,经典语录,人生感悟,唯美文章,励志文章,瓜,tiangua,daygua,daygua.com" /> 
  <meta name="description" content="天瓜网是每日精选出一篇美文的最受欢迎的传播正能量的清新网站，文章句句经典感动，是每日必读必上的网站，每日一美文，胜过十本书。" /> 
  <meta name="author" content="天瓜网|天瓜|每日一美文,胜过十本书" /> 
  <link rel="stylesheet" type="text/css" href="{$smarty.const.WEB}/static/index/css/base.min.css" /> 
  <link rel="stylesheet" type="text/css" href="/static/index/css/com.min.css" /> 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
 </head>
 <body> 
<!--页面开始--> 
  <div class="main-wraper"> 
   <!--头部开始--> {include file='index/lib/header.tpl'} 
   <!--头部结束--> 
   <!--中部--> 
   <div class="main no-log-main"> 
    <!--中部右边开始--> 
    <div class="g-r-n"> 
     <div class="sub-bar"> 
      <p class="hd get_lianbo_hot">阅读排行</p> 
      <dl class="sub-list"> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3256">谁能坚持超过50秒，我请他吃饭!</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3257">你看了必转走的图片</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3275">天瓜独家首发《2048恋爱脱光版》，不玩你就OUT了</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3258">5分钟看完，50年领悟</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3259">看完泪奔，你有资格抱怨吗</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3283">这篇日志和视频曾经感动了上百万人，今天是个特殊的日子，好久没流泪了</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3276">一份没人敢看的中国地图</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3274">你看了必会有接吻的冲动</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3265">一段视频就是一辈子</a> 
       </dt> 
       <dt class="sub-cp dragon"> 
        <a target="_blank" href="http://www.daygua.com/3273">价值5千万的1堂课（不看白不看）</a> 
       </dt> 
      </dl> 
      <p class="ft"><a href="http://www.daygua.com/top">查看更多</a></p> 
     </div> 
    </div> 
    <!--中部右边结束--> 
    <!--中部左边开始--> 
    <div class="main-content"> 
     <div class="article  song"> 
      <ul class="bd article-list doings_list" data-id="" id="doings-list"> 
       <li class="oldday"> 
        <div class="art-desc"> 
         <h3 class="page-oldday"> 往日回顾 </h3> 
        </div> </li> 
        {foreach from=$list item=a}
       <li class="entry"> 
        <div class="art-desc"> 
         <h3 class="art-t"> <b style="font-size:16px;">{$a.time|date_format:"%Y-%m-%d"}</b>&nbsp;&nbsp; 
         <a target="_blank" href="http://www.daygua.com/3277" class="a art-title">{$a.title}</a> 
         </h3> 
        </div> </li>
        {/foreach}
      </ul> 
     </div> 
     <!--分页开始--> 
     <div class="index-page"> 
      <div class="badoo">
        第2页
       <a onfocus="this.blur()" href="http://www.daygua.com/">首页</a>
       <a onfocus="this.blur()" href="http://www.daygua.com/page/1">上一页</a> 
       <a onfocus="this.blur()" href="http://www.daygua.com/page/3">下一页</a> 
      </div> 
     </div> 
     <!--分页结束--> 
    </div> 
    <!--中部左边结束--> 
    <div style="clear:both"></div> 
   </div> 
   <!--中部结束--> 
   <!--底部结束--> {include file='index/lib/footer.tpl'} 
   <!--底部结束--> 
  </div>  
 </body>
</html>