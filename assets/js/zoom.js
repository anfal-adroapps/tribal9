    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.querySelectorAll('.myImg');
    var modalImg = document.getElementById("imgx");
    var captionText = document.getElementById("caption");
        
    for (var i=0; i<img.length; i++){
        
        img[i].onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.alt = this.alt;
        captionText.innerHTML = this.alt;
    }
         
    }

    // When the user clicks on <span> (x), close the modal
    modal.onclick = function() {
        imgx.className += " out";
        setTimeout(function() {
           modal.style.display = "none";
           imgx.className = "modal-content";
         }, 400);
        
     }