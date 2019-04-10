
function calculatePrice() {
  var dogs = document.getElementById('dogs').value;
  var cats = document.getElementById('cats').value;
  var startDate = document.getElementById('startDate').value;
  var endDate = document.getElementById('endDate').value;

  var d1 = Date.parse(startDate);
  var d2 = Date.parse(endDate);

  var dateDiff = Math.round((d2 - d1) / (1000 * 60 * 60 * 24));

  var cost = (dateDiff * (dogs * 40)) + (dateDiff * (cats * 10));

  if (isNaN(cost)) {
    return document.getElementById("output").innerHTML = "Error";
  } else if (dateDiff < 0) {
    return document.getElementById("output").innerHTML = "Fix Dates";
  } else if (dogs < 0) {
    return document.getElementById("output").innerHTML = "Fix Dogs";
  } else if (cats < 0) {
    return document.getElementById("output").innerHTML = "Fix Cats";
  } else {
    return document.getElementById("output").innerHTML = "$" + cost;
  }

}
