<!doctype html>
<html>
  <style type="text/css">
    .rating-stars a {
      display: inline-block;
      width: 64px;
      height: 64px;
      background-repeat: no-repeat;
      background-image: url("img/download.svg");
      outline: none;
    }
    .rating-stars a.hover {
      background-image: url("img/download1.svg");
    }
    .rating-stars a.selected {
      background-image: url("img/download2.svg");
    }
</style>

<body>

  <div class="rating-stars">
    <a href="ratethisfutsal.php?rating=1" data-rating="1"></a>
    <a href="ratethisfutsal.php?rating=2" data-rating="2"></a>
    <a href="ratethisfutsal.php?rating=3" data-rating="3"></a>
    <a href="ratethisfutsal.php?rating=4" data-rating="4"></a>
    <a href="ratethisfutsal.php?rating=5" data-rating="5"></a>
  </div>

<script>
function ready(fn) {
  if(document.readyState != 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}
var selectedRating = 0;
ready(function(){
  function addClass(el, className) {
    if(typeof el.length == "number") {
      Array.prototype.forEach.call(el, function(e,i){ addClass(e, className) });
      return;
    }
    if (el.classList)
      el.classList.add(className);
    else
      el.className += ' ' + className;    
  }
  function removeClass(el, className) {
    if(typeof el.length == "number") {
      Array.prototype.forEach.call(el, function(e,i){ removeClass(e, className) });
      return;
    }
    if (el.classList)
      el.classList.remove(className);
    else if(el.className)
      el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
  }
  var stars = document.querySelectorAll(".rating-stars a");
  Array.prototype.forEach.call(stars, function(el, i){
    el.addEventListener("mouseover", function(evt){
      removeClass(stars, "selected");
      
      var to = parseInt(evt.target.getAttribute("data-rating"));
      Array.prototype.forEach.call(stars, function(star, i) {
        if(parseInt(star.getAttribute("data-rating")) <= to) {
          addClass(star, "hover");
        }
      });
    });
    el.addEventListener("mouseout", function(evt){
      removeClass(evt.target, "hover");
    });
    el.addEventListener("click", function(evt){
      selectedRating = parseInt(evt.target.getAttribute("data-rating"));
      removeClass(stars, "hover");
      Array.prototype.forEach.call(stars, function(star, i) {
        if(parseInt(star.getAttribute("data-rating")) <= selectedRating) {
          addClass(star, "selected");
        }
      });      
      evt.preventDefault();
    });
  });
  document.querySelector(".rating-stars").addEventListener("mouseout", function(evt){
    
    removeClass(stars, "hover");
    if(selectedRating) {
      Array.prototype.forEach.call(stars, function(star, i) {
        if(parseInt(star.getAttribute("data-rating")) <= selectedRating) {
          addClass(star, "selected");
        }
      });      
    }
  });
  
});
</script>
</body>
</html>