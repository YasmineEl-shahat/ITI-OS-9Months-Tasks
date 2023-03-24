displaymapbtn = document.getElementsByTagName("input")[0];
detailsbtn = document.getElementsByTagName("input")[1];

map = document.getElementsByClassName("map")[0];

displaymapbtn.addEventListener("click", function () {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (e) {
      lat = e.coords.latitude;
      lon = e.coords.longitude;
      var location = new google.maps.LatLng(lat, lon);
      var mapspecs = { zoom: 10, center: location };
      map.style.height = "600px";

      new google.maps.Map(map, mapspecs);
    });
  } else {
    map.innerText = "Update Browser And Try Again";
  }
});

detailsbtn.addEventListener("click", function () {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (e) {
      lat = e.coords.latitude;
      lon = e.coords.longitude;
      acc = e.coords.accuracy;
      t = new Date(e.timestamp);
      //not finish
      map.innerHTML = `
                <div class="details">
                <label style="display:block; margin-top:20px;">latitude</label>
                <input type="text" value="${lat}">

                <label style="display:block; margin-top:20px">longitude</label>
                <input type="text" value="${lon}">

                <label style="display:block; margin-top:20px">accuracy</label>
                <input type="text" value="${acc}">

                <label style="display:block; margin-top:20px">timestamp</label>
                <input type="text" value="${t}">
                </div>
                `;
      map.style.height = "auto";
    });
  } else {
    map.innerText = "Update Browser And Try Again";
  }
});
