//script to show/hide email
const email = document.querySelector("#email");
const sub = document.querySelector(".sub");
const copyText = document.querySelector("#em1");

email.addEventListener("mouseover", () => {
  sub.style.opacity = "1";
});

email.addEventListener("mouseout", () => {
  sub.style.opacity = "0";
});

copyText.addEventListener("click", copy1);

// add transition to sub class
sub.style.transition = "opacity 0.3s ease-in-out";

//script to copy email
function copy1() {
  const text = document.getElementById("em1").innerHTML;
  navigator.clipboard.writeText(text);
  alert("Text copied!");
}
