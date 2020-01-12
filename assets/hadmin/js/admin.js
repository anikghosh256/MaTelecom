var iUrl = function(event) {
    var imgS = document.getElementById('imgS');
    imgS.src = URL.createObjectURL(event.target.files[0]);
  };

$("#imgIN").change(function() {
	alert('hi');
  iUrl(this);
});