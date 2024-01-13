let eDate = document.getElementById("e-date");
eDate.addEventListener("keyup", function (e) {
  let newInput = eDate.value;

  if (e.which !== 8) {
    var numChars = e.target.value.length;
    if (numChars == 2) {
      var thisVal = e.target.value;
      thisVal += "/";
      e.target.value = thisVal;
      console.log(thisVal.length);
    }
  }
});

window.addEventListener("scroll", function () {
  var header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0);
});
