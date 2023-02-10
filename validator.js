// ##############################
function validate(callback) {
  const form = event.target;
  console.log("validate");
  console.log(form);
  if (form.id == "userEmail") {
    document.querySelector(".emailStatusMessage").textContent = "";
  }

  document.querySelectorAll("[data-validate]", form).forEach(function (element) {
    element.classList.remove("validate_error");
  });

  document.querySelectorAll("[data-validate]", form).forEach(function (element) {
    switch (element.getAttribute("data-validate")) {
      case "str":
        if (element.value.length < parseInt(element.getAttribute("data-min")) || element.value.length > parseInt(element.getAttribute("data-max"))) {
          element.classList.add("validate_error");
        }
        break;
      case "int":
        if (!/^\d+$/.test(element.value) || parseInt(element.value) < parseInt(element.getAttribute("data-min")) || parseInt(element.value) > parseInt(element.getAttribute("data-max"))) {
          element.classList.add("validate_error");
        }
        break;
      case "email":
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(element.value.toLowerCase())) {
          element.classList.add("validate_error");
        }
        break;
      case "regex":
        var regex = new RegExp(element.getAttribute("data-regex"));
        if (!regex.test(element.value)) {
          element.classList.add("validate_error");
        }
        break;
      case "match":
        if (element.value != document.querySelector(`[name='${element.getAttribute("data-match-name")}']`, form).value) {
          element.classList.add("validate_error");
        }
        break;
    }
  });

  if (!document.querySelector(".validate_error", form)) {
    callback();
    return;
  }
}


// ##############################
function validateModal(callback) {
  const form = event.target;
  console.log("validate modal");
  console.log(form);
  if (form.id == "userEmail") {
    document.querySelector(".emailStatusMessage").textContent = "";
  }

  document.querySelectorAll("[data-validate-modal]", form).forEach(function (element) {
    element.classList.remove("validate_error_modal");
  });

  document.querySelectorAll("[data-validate-modal]", form).forEach(function (element) {
    switch (element.getAttribute("data-validate-modal")) {
      case "str":
        if (element.value.length < parseInt(element.getAttribute("data-min")) || element.value.length > parseInt(element.getAttribute("data-max"))) {
          element.classList.add("validate_error_modal");
        }
        break;
      case "int":
        if (!/^\d+$/.test(element.value) || parseInt(element.value) < parseInt(element.getAttribute("data-min")) || parseInt(element.value) > parseInt(element.getAttribute("data-max"))) {
          element.classList.add("validate_error_modal");
        }
        break;
      case "email":
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(element.value.toLowerCase())) {
          element.classList.add("validate_error_modal");
        }
        break;
      case "regex":
        var regex = new RegExp(element.getAttribute("data-regex"));
        if (!regex.test(element.value)) {
          element.classList.add("validate_error_modal");
        }
        break;
      case "match":
        if (element.value != document.querySelector(`[name='${element.getAttribute("data-match-name")}']`, form).value) {
          element.classList.add("validate_error_modal");
        }
        break;
    }
  });

  if (!document.querySelector(".validate_error_modal", form)) {
    callback();
    return;
  }
}
