function reheight() {
  var contentHeight = $(".content").height();
  var winHeight = $(window).height();

  if (contentHeight < winHeight) {
    $('.box-holder').height(winHeight);
  }
  else {
    $('.box-holder').height(contentHeight+50);
  }

  console.log('reheight');
}

/*$(function() {
    reheight();
});*/