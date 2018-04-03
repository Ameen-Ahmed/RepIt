  var currentModal;
  // Create function outside loop
  function dynamicEvent(num) {
    currentModal = "myModal" + num;
    document.getElementById(currentModal).style.display = "block";

  }


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

for(i = 0; i < span.length; i++){
  // When the user clicks on <span> (x), close the modal
  span[i].onclick = function() {
      document.getElementById(currentModal).style.display = "none";
  }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.id === currentModal) {
        document.getElementById(currentModal).style.display = "none";
    }
}
