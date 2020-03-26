<!DOCTYPE html>
<html>
  @include('member.layout.headerBaru')
  <!-- Content Wrapper. Contains page content -->
<br>
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-4">
    <div class="box">
      <div class="box-header with-border">
      <i class="fa fa-shopping-basket fa-5x"></i>
<!-- <h2 class="text-center"> What's on Indah Wisata</h2> -->
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
      <div class="box-header with-border">
        <i class="fa fa-shopping-basket fa-10x"></i>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-4">
    <div class="box">
      <div class="box-header with-border">
      <i class="fa fa-shopping-basket fa-5x"></i>
<!-- <h2 class="text-center"> What's on Indah Wisata</h2> -->
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
      <div class="box-header with-border">
        <i class="fa fa-shopping-basket fa-10x"></i>
      </div>
    </div>
  </div>
</div>
        
  <!-- /.content-wrapper -->
@include('member.layout.footer')

<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script>
(function( $ ) {

//Function to animate slider captions 
function doAnimations( elems ) {
  //Cache the animationend event in a variable
  var animEndEv = 'webkitAnimationEnd animationend';
  
  elems.each(function () {
    var $this = $(this),
      $animationType = $this.data('animation');
    $this.addClass($animationType).one(animEndEv, function () {
      $this.removeClass($animationType);
    });
  });
}

//Variables on page load 
var $myCarousel = $('#carousel-example-generic'),
  $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
  
//Initialize carousel 
$myCarousel.carousel();

//Animate captions in first slide on page load 
doAnimations($firstAnimatingElems);

//Pause carousel  
$myCarousel.carousel('pause');


//Other slides to be animated on carousel slide event 
$myCarousel.on('slide.bs.carousel', function (e) {
  var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
  doAnimations($animatingElems);
});  

})(jQuery);
</script>