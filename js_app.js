// -------------------------| Menu |---------------------------

// function toggleLanguage() {
//   let currentURL = window.location.href;
//   let newURL;
//   let language;
//   if (currentURL.includes("dk")) {
//     language = "en";
//   } else {
//     language = "dk";
//   }
//   currentURL = currentURL.split("/");

//   if (currentURL[3] == "dk" || currentURL[3] == "en") {
//     newURL = "/" + language;
//     console.log("country in 3rd spot");
//   } else if (currentURL[4] == "dk" || currentURL[4] == "en") {
//     newURL = "/" + currentURL[3] + "/" + language;
//     console.log("country in 4th spot");
//     if (currentURL[5]) {
//       newURL = newURL + "/" + currentURL[5];
//       if (currentURL[6]) {
//         newURL = newURL + "/" + currentURL[6];
//       }
//     }
//   } else {
//     console.log("country?");
//     newURL = "/" + language;
//   }
//   console.log("the new url is: " + newURL);
//   window.location.replace(newURL);

//   //adjusting the height of the search result-box according to language
//   document.querySelector("div#from-results").classList.toggle(".dk-result-height");
//   document.querySelector("div#from-results").classList.toggle(".en-result-height");
// }

function toggleLanguage() {
  let currentURL = window.location.href;
  let newURL;

  if (currentURL.includes("/dk")) {
    newURL = currentURL.replace("/dk", "/en");
  } else if (currentURL.includes("/en")) {
    newURL = currentURL.replace("/en", "/dk");
  } else {
    newURL = "/dk";
  }
  console.log(newURL);
  window.location.replace(newURL);
}

function toggleMenu() {
  if (window.innerWidth < 1030) {
    document.querySelector("#global-nav").classList.toggle("open-mobile-burger");
    document.querySelector("#content-menu-flex").classList.toggle("open-mobile-burger-body");
  } else {
    let text = document.querySelectorAll("#global-nav p");
    for (let i = 0; i < text.length; i++) {
      text[i].classList.toggle("hide-menu-text-desktop");
    }

    document.querySelector("#global-nav").classList.toggle("open-desktop-nav");
    document.querySelector("#content").classList.toggle("content-with-open-nav");
  }
}

// -------------------------| City Search |---------------------------

function select_city_from() {
  let city_name = event.target.querySelector(".cityname").innerText;
  document.querySelector("#from-input").value = city_name;
  hideFromResults();
}

function select_city_to() {
  let city_name = event.target.querySelector(".cityname").innerText;
  document.querySelector("#to-input").value = city_name;
  hideToResults();
}

function showFromResults() {
  const the_input = document.querySelector("#from-input");
  if (the_input.value.length > 0) {
    document.querySelector("#from-results").style.display = "block";
    getCitiesFrom();
  } else {
    document.querySelector("#from-results").style.display = "none";
  }
}

function hideFromResults() {
  setTimeout(() => {
    document.querySelector("#from-results").style.display = "none";
  }, "100");
}

async function getCitiesFrom() {
  let connection = await fetch("/api-get-cities-from.php", {
    method: "POST",
    body: new FormData(document.querySelector("form")),
  });
  let data = await connection.json();
  if (!connection.ok) {
    return;
  }

  let div_city = `<div class="from-city-container" onclick="select_city_from()">
    <div class="from-city">
      <img src="/momondo-clone/#img#" alt="city">
      <div>
        <p><span class="cityname">#cityname#</span>, <span>#country#</span> <span class="airportcode">#airportcode#</span></p>
        <p class="airportname">#airportname#</p>
      </div>
    </div>
    <input type="checkbox">
  </div>`;

  let all_cities = "";

  const the_input = document.querySelector("#from-input").value;

  let maxResults = 4;

  if (data.length < 4) {
    maxResults = data.length;
  }

  for (let i = 0; i < maxResults; i++) {
    let city = data[i];
    let copy_div_city = div_city;
    copy_div_city = copy_div_city.replace("#cityname#", city.city_name);
    copy_div_city = copy_div_city.replace("#country#", city.city_country);
    copy_div_city = copy_div_city.replace("#airportcode#", city.city_airport_abr);
    copy_div_city = copy_div_city.replace("#airportname#", city.city_airport);
    copy_div_city = copy_div_city.replace("#population#", city.city_population);
    copy_div_city = copy_div_city.replace("#img#", "/images/city-search/" + city.city_image);

    all_cities += copy_div_city;
  }
  document.querySelector("#from-results").replaceChildren();
  document.querySelector("#from-results").insertAdjacentHTML("afterbegin", all_cities);
}

function showToResults() {
  const the_input = document.querySelector("#to-input");
  if (the_input.value.length > 0) {
    document.querySelector("#to-results").style.display = "block";
    getCitiesTo();
  } else {
    document.querySelector("#to-results").style.display = "none";
  }
}

function hideToResults() {
  setTimeout(() => {
    document.querySelector("#to-results").style.display = "none";
  }, "100");
}

async function getCitiesTo() {
  let connection = await fetch("/api-get-cities-to.php", {
    method: "POST",
    body: new FormData(document.querySelector("form")),
  });
  let data = await connection.json();
  if (!connection.ok) {
    return;
  }

  let div_city = `<div class="to-city-container" onclick="select_city_to()">
    <div class="from-city">
      <img src="/momondo-clone/#img#" alt="city">
      <div>
        <p><span class="cityname">#cityname#</span>, <span>#country#</span> <span class="airportcode">#airportcode#</span></p>
        <p class="airportname">#airportname#</p>
      </div>
    </div>
    <input type="checkbox">
  </div>`;

  let all_cities = "";

  const the_input = document.querySelector("#to-input").value;

  let maxResults = 4;

  if (data.length < 4) {
    maxResults = data.length;
  }

  for (let i = 0; i < maxResults; i++) {
    let city = data[i];

    let copy_div_city = div_city;
    copy_div_city = copy_div_city.replace("#cityname#", city.city_name);
    if (city.state) {
      let state = " " + city.state + ",";
      copy_div_city = copy_div_city.replace("#state#", state);
    } else {
      copy_div_city = copy_div_city.replace("#state#", "");
    }
    copy_div_city = copy_div_city.replace("#cityname#", city.city_name);
    copy_div_city = copy_div_city.replace("#country#", city.city_country);
    copy_div_city = copy_div_city.replace("#airportcode#", city.city_airport_abr);
    copy_div_city = copy_div_city.replace("#airportname#", city.city_airport);
    copy_div_city = copy_div_city.replace("#population#", city.city_population);
    copy_div_city = copy_div_city.replace("#img#", "/images/city-search/" + city.city_image);

    all_cities += copy_div_city;
  }

  // console.log(data);

  document.querySelector("#to-results").replaceChildren();
  document.querySelector("#to-results").insertAdjacentHTML("afterbegin", all_cities);
}

function switchDirection() {
  let currentFrom = document.querySelector("#from-input").value;
  let currentTo = document.querySelector("#to-input").value;

  document.querySelector("#from-input").value = currentTo;
  document.querySelector("#to-input").value = currentFrom;
}

async function validateSearch() {
  console.log("validateSearch()");
  let connection = await fetch("/api-validate-search-query.php", {
    method: "POST",
    body: new FormData(document.querySelector("#frontpage-search")),
  });
  let data = await connection.json();
  if (!connection.ok) {
    console.log(data);
    return;
  }
  searchBridge();
}

async function searchBridge() {
  let currentURL = window.location.href;
  let language;
  if (currentURL.includes("dk")) {
    language = "en";
  } else {
    language = "dk";
  }

  console.log(language);
  let connection = await fetch(`/bridge-submit-search-query.php?language=${language}`, {
    method: "POST",
    body: new FormData(document.querySelector("#frontpage-search")),
  });
  let data = await connection.json();
  if (!connection.ok) {
    console.log(data);
    return;
  }

  console.log(data.info);
  window.location.assign(data.info);
}

// -------------------------| Login, Logout, Sign up |---------------------------

let signinstep = 1;

function nextStep() {
  let qsSearch = "#signin-step" + signinstep;
  document.querySelector(qsSearch).style.display = "none";
  signinstep++;
  qsSearch = "#signin-step" + signinstep;
  document.querySelector(qsSearch).style.display = "block";
}

function previousStep() {
  let qsSearch = "#signin-step" + signinstep;
  document.querySelector(qsSearch).style.display = "none";
  signinstep--;
  qsSearch = "#signin-step" + signinstep;
  document.querySelector(qsSearch).style.display = "block";
}

async function passAlongEmail() {
  const frm = document.querySelector("#checkEmailForm");
  const conn = await fetch("/api-is-email-available.php", {
    method: "POST",
    body: new FormData(frm),
  });
  if (!conn.ok) {
    openSigninForm(frm.email.value);
    return;
  }
  openSignUpForm(frm.email.value);
}

async function checkEmail() {
  console.log('CheckEmail')
  const frm = document.querySelector("#modal form");
  const conn = await fetch("/api-is-email-available.php", {
    method: "POST",
    body: new FormData(frm),
  });
  if (!conn.ok) {
    document.querySelector(".emailStatusMessage").textContent = "Email in use";
    document.querySelector("#checkEmailForm button").textContent = "Continue to log in";
    return;
  }
  document.querySelector(".emailStatusMessage").textContent = "Email available";
  document.querySelector("#checkEmailForm button").textContent = "Continue to sign up";
}

async function checkEmailSignup() {
  const frm = document.querySelector("#modal form");
  const conn = await fetch("/api-is-email-available.php", {
    method: "POST",
    body: new FormData(frm),
  });
  if (!conn.ok) {
    if (document.querySelector("#signupForm #userEmail").classList.contains("validate_error")) {
      console.log("validation error and email in use");
      document.querySelector("#signupForm .emailStatusMessage").style.display = "none";
      return;
    }
    console.log("signup: email in use");
    document.querySelector("#signupForm .emailStatusMessage").textContent = "Email in use";
    document.querySelector("#signupForm .emailStatusMessage").style.display = "block";
    document.querySelector("#signupForm #userEmail").style.background = "rgba(240, 130, 240, 0.2)";
    return;
  } else {
    console.log("signup: email available");
    document.querySelector("#signupForm .emailStatusMessage").style.display = "none";
    document.querySelector("#signupForm #userEmail").style.background = "";
  }
}

async function checkEmailLogin() {
  document.querySelector("#loginForm input#userEmail").style.background = "";
  const frm = document.querySelector("#modal form");
  const conn = await fetch("/api-is-email-available.php", {
    method: "POST",
    body: new FormData(frm),
  });
  if (!conn.ok) {
    console.log("signup: email in use");
    document.querySelector("#loginForm .emailStatusMessage").textContent = "";
    return;
  }
  console.log("signup: email available");
  document.querySelector("#loginForm .emailStatusMessage").style.display = "block";
  document.querySelector("#loginForm .emailStatusMessage").textContent = "Email is not in use";
  document.querySelector("#loginForm input#userEmail").style.background = "rgba(240, 130, 240, 0.2)";
}

function openSigninModal() {
  let currentURL = window.location.href;
  let modal;
  if (currentURL.includes("dk")) {
    modal = `
    <div id="transparent-bg" >
          <section id="modal">
         <svg onclick="closeSigninModal()" class="close-icon" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M168.535 168.535a4.998 4.998 0 0 1-7.07 0L100 107.071l-61.464 61.464a5 5 0 1 1-7.071-7.07L92.929 100L31.464 38.536a5 5 0 1 1 7.071-7.071L100 92.929l61.465-61.464a5 5 0 0 1 7.07 7.071L107.071 100l61.464 61.465a4.998 4.998 0 0 1 0 7.07z"></path></svg>
              <div id="signin-step1">
                  <svg class="logo-large-modal" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 38"><defs><linearGradient id="logos806a" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"></stop><stop offset="1" stop-color="#0066ae"></stop></linearGradient><linearGradient id="logos806b" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"></stop><stop offset="1" stop-color="#d1003a"></stop></linearGradient><linearGradient id="logos806c" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"></stop><stop offset="1" stop-color="#f02e00"></stop></linearGradient></defs><path fill="url(#logos806a)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"></path><path fill="url(#logos806b)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"></path><path fill="url(#logos806c)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8zM236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"></path></svg>
                  <div class="centered-image">
                      <img class="" src="/momondo-clone/images/other/magiclinkloginBg.svg" alt="pc">
                  </div>
                  <div>
                      <h2 class="header">Log ind, eller opret en konto</h2>
                      <p>Følg priser, organiser rejseplaner, og få adgang til medlemstilbud med din momondo-konto.</p>
                      <button onclick="nextStep()" id="continue-with-email-btn" type="button">Fortsæt med e-mail</button>
                  </div>
                  <div class="divider"><span class="sep-line"></span><p>or</p><span class="sep-line"></span></div>
                  <div class="external-signup-options">
                      <div class="external-signup-option-btn">Booking.com</div>
                      <div class="external-signup-option-btn">Google</div>
                      <div class="external-signup-option-btn">Facebook</div>
                      <div class="external-signup-option-btn">Apple</div>
                  </div>
                  <p id="conditions-info">Når du bliver medlem, accepterer du vores <span class="ult">vilkår og betingelser</span> samt <span class="ult">privatlivspolitik.</span></p>
              </div>    
  
  
              <div style="display: none" id="signin-step2">
                  <p class="back-btn" onclick="previousStep()">< Tilbage</p>
                  <h2 class="header">Hvad er din e-mailadresse?</h2>
                  <form id="checkEmailForm" method="post" onsubmit="validateModal(passAlongEmail);  return false">
                      <input 
                      onblur="validateModal(checkEmail);" 
                      id="userEmail"
                      type="text"
                      name="email"
                      data-validate-modal="email"
                      >
                      <p class="emailStatusMessage"></p>
                      <button class="btn pink-bg">Fortsæt</button>
                  </form>
              </div>      
          </section> 
      </div>
    `;
  } else {
    modal = `
    <div id="transparent-bg" >
          <section id="modal">
         <svg onclick="closeSigninModal()" class="close-icon" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M168.535 168.535a4.998 4.998 0 0 1-7.07 0L100 107.071l-61.464 61.464a5 5 0 1 1-7.071-7.07L92.929 100L31.464 38.536a5 5 0 1 1 7.071-7.071L100 92.929l61.465-61.464a5 5 0 0 1 7.07 7.071L107.071 100l61.464 61.465a4.998 4.998 0 0 1 0 7.07z"></path></svg>
              <div id="signin-step1">
                  <svg class="logo-large-modal" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 38"><defs><linearGradient id="logos806a" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"></stop><stop offset="1" stop-color="#0066ae"></stop></linearGradient><linearGradient id="logos806b" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"></stop><stop offset="1" stop-color="#d1003a"></stop></linearGradient><linearGradient id="logos806c" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"></stop><stop offset="1" stop-color="#f02e00"></stop></linearGradient></defs><path fill="url(#logos806a)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"></path><path fill="url(#logos806b)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"></path><path fill="url(#logos806c)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8zM236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"></path></svg>
                  <div class="centered-image">
                      <img class="" src="/momondo-clone/images/other/magiclinkloginBg.svg" alt="pc">
                  </div>
                  <div>
                      <h2 class="header">Sign in or create an account</h2>
                      <p>Track prices, organize travel plans and access member-only deals with your momondo account.</p>
                      <button onclick="nextStep()" id="continue-with-email-btn" type="button">Continue with email</button>
                  </div>
                  <div class="divider"><span class="sep-line"></span><p>or</p><span class="sep-line"></span></div>
                  <div class="external-signup-options">
                      <div class="external-signup-option-btn">Booking.com</div>
                      <div class="external-signup-option-btn">Google</div>
                      <div class="external-signup-option-btn">Facebook</div>
                      <div class="external-signup-option-btn">Apple</div>
                  </div>
                  <p id="conditions-info">Når du bliver medlem, accepterer du vores <span class="ult">vilkår og betingelser</span> samt <span class="ult">privatlivspolitik.</span></p>
              </div>    
  
  
              <div style="display: none" id="signin-step2">
                  <p class="back-btn" onclick="previousStep()">< Back</p>
                  <h2 class="header">What's your email address?</h2>
                  <form id="checkEmailForm" method="post" onsubmit="validateModal(passAlongEmail);  return false">
                      <input 
                      onblur="validateModal(checkEmail)" 
                      id="userEmail"
                      type="text"
                      name="email"
                      data-validate-modal="email"
                      >
                      <p class="emailStatusMessage"></p>
                      <button class="btn pink-bg">Continue</button>
                  </form>
              </div>      
          </section> 
      </div>
    `;
  }

  document.querySelector("#content-menu-flex").insertAdjacentHTML("beforebegin", modal);
  signinstep = 1;
  document.querySelector("#signin-step2").style.display = "none";
  document.querySelector("#signin-step1").style.display = "block";
  document.querySelector("#content-menu-flex").style.height = "100vh";
}

function closeSigninModal() {
  document.querySelector("#transparent-bg").remove();
  document.querySelector("#content-menu-flex").style.height = "auto";
}

function openSignUpForm(email) {
  //clearing the modal
  document.querySelector("#modal").innerHTML = "";

  //Pasting the new content
  let content = `
    <svg onclick="closeSigninModal()" class="close-icon" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M168.535 168.535a4.998 4.998 0 0 1-7.07 0L100 107.071l-61.464 61.464a5 5 0 1 1-7.071-7.07L92.929 100L31.464 38.536a5 5 0 1 1 7.071-7.071L100 92.929l61.465-61.464a5 5 0 0 1 7.07 7.071L107.071 100l61.464 61.465a4.998 4.998 0 0 1 0 7.07z"></path></svg>
    <h2 class="header">Let's get you set up</h2>
    <form id="signupForm" method="post"  onsubmit="validateModal(finishSignup);  return false">

      <label style="width: 100%"> Username: </br>
        <input 
        id="userName"
        type="text"
        data-validate-modal="str"
        data-min= 2
        data-max= 10
        name="user_name"
        placeholder="username"
        onblur="validateModal(fakeCallBack)"
        >
      </label>

      <label style="width: 100%"> Email: </br>
        <input 
        id="userEmail"
        type="text"
        name="email"
        value="${email}"
        data-validate-modal="email"
        placeholder="email"
        onblur="validateModal(checkEmailSignup())"
        >
      </label>
      <p style="display: none" class="emailStatusMessage"></p>

      <label> <div style="display: flex; gap: 1rem">Password: <span class="tooltipcontainer"><span class="tooltip">?</span><p class="tooltiptext">Password must be minimum 8 characters long, contain 1 uppercase letter, 1 lowercase letter, 1 digit and 1 special character</p></span></div>
        <input 
          id="userPassword"
          type="password"
          name="password"
          data-regex="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"
          data-validate-modal="regex"
          placeholder="password"
          onblur="validateModal(fakeCallBack)"
        >
      </label>

      <label> Repeat password: </br>
        <input 
        id="userPasswordRepeat"
        type="password"
        name="repeat_password"
        placeholder="password"
        data-validate-modal="match"
        data-match-name="password"
        onblur="validateModal(fakeCallBack)"
        >
      </label>
      <p class="errorMessage"></p>
      <button class="btn pink-bg">Sign up</button>
    </form>

    `;

  document.querySelector("#modal").innerHTML = content;
}

function openSigninForm(email) {
  //clearing the modal
  document.querySelector("#modal").innerHTML = "";
  // console.log(email);

  //Pasting the new content
  let content = `
  <svg onclick="closeSigninModal()" class="close-icon" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M168.535 168.535a4.998 4.998 0 0 1-7.07 0L100 107.071l-61.464 61.464a5 5 0 1 1-7.071-7.07L92.929 100L31.464 38.536a5 5 0 1 1 7.071-7.071L100 92.929l61.465-61.464a5 5 0 0 1 7.07 7.071L107.071 100l61.464 61.465a4.998 4.998 0 0 1 0 7.07z"></path></svg>
  <h3 class="header">Log in</h3>
  <form id="loginForm" method="post" onsubmit="validateModal(passAlongLoginForm); return false">
    <label> Email: </br>
      <input 
      id="userEmail"
      type="text"
      name="email"
      value="${email}"
      data-validate-modal="email"
      placeholder="email"
      onfocus="clearErrorMessage()"
      onblur="validateModal(checkEmailLogin)"
      >
    </label>  
    <label> Password: </br>
      <input 
      id="userPassword"
      type="password"
      name="password"
      data-validate-modal="password"
      placeholder="password"
      onfocus="clearErrorMessage()"
      onblur="validateModal(checkEmailLogin)"
      >
    </label>  
    <p class="emailStatusMessage"></p>
    <p class="errorMessage" style="display: none">Password and email do not match</p>
    <button class="btn pink-bg">Log in</button>
  </form>
  `;
  document.querySelector("#modal").insertAdjacentHTML("afterbegin", content);
}

function clearErrorMessage() {
  // console.log(event.target.form.id);
  let currentFormID = event.target.form.id;
  document.querySelector(`#${currentFormID} .errorMessage`).style.display = "none";
}

async function passAlongLoginForm() {
  // console.log("passAlongLoginForm()");
  //send the email along with fetch post so we can have it prefilled in the next step
  const frm = document.querySelector("#loginForm");
  const conn = await fetch("/api-check-login.php", {
    method: "POST",
    body: new FormData(frm),
  });
  if (!conn.ok) {
    document.querySelector("#loginForm .errorMessage").style.display = "block";
    return;
  }
  document.querySelector("#loginForm .errorMessage").style.display = "none";
  closeSigninModal();
  window.location.reload();
}

async function logout() {
  const conn = await fetch("/api-logout.php");
  if (!conn.ok) {
    return;
  }
  window.location.reload();
}

async function finishSignup() {
  const frm = document.querySelector("#modal form");
  const conn = await fetch("/api-is-email-available.php", {
    method: "POST",
    body: new FormData(frm),
  });
  if (!conn.ok) {
    document.querySelector("#signupForm .emailStatusMessage").textContent = "Email in use";
    document.querySelector("#signupForm .emailStatusMessage").style.display = "block";
    return;
  }
  closeSigninModal();
  Swal.fire({
    icon: "success",
    title: "Check your inbox",
    text: "We just sent a magic link to your email. Click on the link in the email to finish setting up your account.",
    footer: '<a href="">Didnt get an email? Resend email</a>',
  });
}

// -------------------------| Admin Page |---------------------------

async function uploadImage() {
  const frm = document.querySelector("#image-upload-form");
  const conn = await fetch("/api-upload-image.php", {
    method: "POST",
    enctype: "multipart/form-data",
    body: new FormData(frm),
  });
  if (!conn.ok) {
    document.querySelector("#image-upload-message").textContent = "upload failed";
    return;
  }

  document.querySelector("#image-upload-message").textContent = "Successful upload";
  frm.querySelector("#fileToUpload").value = "";
}

async function loadInFlights() {
  document.querySelector("#flights-container").classList.toggle("hide");
  console.log("button");
  document.querySelector("#flightManagementTitle p").classList.toggle("rotate-arrow");
  let connection = await fetch("/api-get-all-flights.php");
  let data = await connection.json();
  if (!connection.ok) {
    console.log(data);
    return;
  }

  let div_flight = `<form onsubmit="return false">
    <div class="flight">
      <button onclick="deleteFlight()">🗑️</button>
      <img src="/momondo-clone/images/city-search/#imgsrc#" alt="#airline# logo">
      <input style="display:none" 
      name="flight_id" 
      value="#flightid#" 
      type="text">
      <div>
        <p>#departuredate#: #departuretime# - #arrivaldate#: #arrivaltime#</p>
        <p>#departurecity# - #arrivalcity#</p>
      </div>
    </div>
  </form>`;

  let all_flights = "";

  for (let i = 0; i < data.length; i++) {
    let flight = data[i];
    let copy_div_flight = div_flight;
    copy_div_flight = copy_div_flight.replace("#departurecity#", flight.departure_city);
    copy_div_flight = copy_div_flight.replace("#arrivalcity#", flight.arrival_city);
    copy_div_flight = copy_div_flight.replace("#departuretime#", flight.departure_time);
    copy_div_flight = copy_div_flight.replace("#arrivaltime#", flight.return_time);
    copy_div_flight = copy_div_flight.replace("#departuredate#", flight.departure_date);
    copy_div_flight = copy_div_flight.replace("#arrivaldate#", flight.return_date);
    copy_div_flight = copy_div_flight.replace("#imgsrc#", flight.airline_logo);
    copy_div_flight = copy_div_flight.replace("#airline#", flight.airline);
    copy_div_flight = copy_div_flight.replace("#flightid#", flight.flight_id);
    all_flights += copy_div_flight;
  }

  document.querySelector("#flights-container").replaceChildren();
  document.querySelector("#flights-container").insertAdjacentHTML("afterbegin", all_flights);
}

async function deleteFlight() {
  const frm = event.target.form;
  console.log(frm);
  const conn = await fetch("/api-delete-flight.php", {
    method: "POST",
    body: new FormData(frm),
  });
  const data = await conn.json();
  if (!conn.ok) {
    console.log(data);
    return;
  }
  console.log(data);
  frm.remove();
}

//----------------------| Other |--------------------------------

function toggleQA() {
  console.log(event);
  event.target.nextElementSibling.classList.toggle("collapsed");
  event.target.lastElementChild.classList.toggle("down");
  event.target.lastElementChild.classList.toggle("up");
}

function fakeCallBack() {
  console.log("x");
}
