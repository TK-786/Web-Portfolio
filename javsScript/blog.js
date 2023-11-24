let clearBtn = document.querySelector("input[type='reset']");
clearBtn.addEventListener("click", clear);

let submitBtn = document.querySelector("input[type='submit']");
submitBtn.addEventListener("click", post);

function post(x) {
  let inputs = [
    //document.querySelectorAll("input"),
    document.querySelector("input[type='text']"),
    document.querySelector("textarea"),
  ];

  let div = document.getElementsByClassName("required");

  let empty = false;
  inputs.forEach(function (input) {
    if (input.value === "") {
      empty = true;

      input.classList.add("invalid");
      div.textContent = "This is required";

      input.addEventListener("focus", function () {
        input.classList.remove("invalid");
      });
    } else {
      input.classList.remove("invalid");
      div.textContent = "";
    }
  });
  if (empty) {
    x.preventDefault();

    //alert("Please fill in all fields."); //change to css
  }
}

function clear(e) {
  let clear = window.confirm("Are you sure?");
  if (!clear) {
    e.preventDefault();
  }
}
