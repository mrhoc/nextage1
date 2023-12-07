$(document).ready(function(){
  $('#gNavSwitch').on('click',function(){
    $('.gNav-list').toggleClass('active');
  });

  $('.list-news .item .item__inner').matchHeight();
  $('.list-news .item .item__cnt').matchHeight();
});
