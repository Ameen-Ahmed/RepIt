var slideIndex = 0;
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    slides[2].style.display = "none";
    slideIndex = 0;
    slides[slideIndex].style.display = "block";
    setTimeout(function(){partb()}, 3000);

    function partb(){
      slides[0].style.display = "none";
      slideIndex = 1;
      slides[slideIndex].style.display = "block";
      setTimeout(function(){partc()}, 3000);
    }
    function partc(){
      slides[1].style.display = "none";
      slideIndex = 2;
      slides[slideIndex].style.display = "block";
      setTimeout(function(){showSlides()}, 3000);
    }
}
