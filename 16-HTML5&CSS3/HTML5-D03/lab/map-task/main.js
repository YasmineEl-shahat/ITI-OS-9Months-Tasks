const indicator = document.getElementById("indicator");
const tabItems = document.getElementById("tabs-items").querySelectorAll("li");
const tabsContainer = document.getElementById("tabs-container");
const secondpage = document.getElementById("second-page");
let activeTab = 0;

function moveIndicator() {
  const { offsetWidth, offsetLeft } = tabItems[activeTab];
  indicator.style.transform = `translateX(${offsetLeft}px) scaleX(${offsetWidth})`;
}

// init indicator
moveIndicator();

tabItems.forEach((item, i) => {
  item.addEventListener("click", function () {
    if (activeTab === i) return;
    tabItems[activeTab].classList.remove("active");
    activeTab = i;
    tabItems[activeTab].classList.add("active");
    moveIndicator();
    tabsContainer.style.transform = `translateX(${activeTab * -100}%)`;
  });
});

// get user location if he accept permision
navigator.geolocation.getCurrentPosition(initMap, () => {
  initMap();
});

function initMap(permission) {
  /* lat/lng for Egypt */
  let lat = 26.8206;
  let lng = 30.8025;
  if (permission) {
    const {
      coords: { latitude, longitude },
    } = permission;
    lat = latitude;
    lng = longitude;
  }

  const position = new google.maps.LatLng(lat || 26.8206, lng || 30.8025);
  const map = new google.maps.Map(document.getElementById("map-container"), {
    zoom: 4,
    center: position,
  });

  if (permission) {
    new google.maps.Marker({
      position,
      map,
      title: "Your Current Position.",
    });

    // prettier-ignore
    const { coords: {latitude, longitude, accuracy}, timestamp } = permission;
    secondpage.innerHTML = `
        <div class="table">
            <div class="table__row">
                <p>Latitude</p>
                <p>${latitude}</p>
            </div>
            <div class="table__row">
                <p>Longitude</p>
                <p>${longitude}</p>
            </div>
            <div class="table__row">
                <p>Accuracy</p>
                <p>${accuracy}</p>
            </div>
            <div class="table__row">
                <p>Timestamp</p>
                <p>${new Date(timestamp)}</p>
            </div>
        </div>
        `;
    return;
  }
  secondpage.innerHTML = `<p>User didn't accept the permission.</p>`;
}
