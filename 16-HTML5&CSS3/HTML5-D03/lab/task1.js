var video = document.getElementsByTagName("video")[0];

video.addEventListener("click", function () {
  // video.muted = false;
  video.paused ? video.play() : video.pause();
});

let fullScreen = false;
video.addEventListener("dblclick", function () {
  (fullScreen = !fullScreen)
    ? video.parentNode.requestFullscreen()
    : document.exitFullscreen();
});

var btns = document.getElementsByTagName("input");

var srcs = ["3.mp4", "2.mp4", "3.mp4", "2.mp4", "3.mp4", "2.mp4", "3.mp4"];

for (let i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    video.setAttribute("src", srcs[i]);
  });
}
