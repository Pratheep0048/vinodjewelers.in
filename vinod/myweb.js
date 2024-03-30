function scrollToSection(sectionClass) {
    const section = document.querySelector(`.${sectionClass}`);
    if (section) {
      section.scrollIntoView({ behavior: 'smooth' });
    }
  }
  
  function toggleNav() {
    var navLinks = document.getElementById("navLinks");
    if (!navLinks) {
      console.error("Error: navLinks element not found");
      return;
    }
  
    navLinks.classList.toggle("show");
  
    var mainContent = document.getElementById("mainContent");
    if (!mainContent) {
      console.error("Error: mainContent element not found");
      return;
    }
  
    mainContent.style.marginLeft = navLinks.classList.contains("show") ? "250px" : "0";
  }


  // Add the following JavaScript code for the coin button
document.addEventListener("DOMContentLoaded", function () {
  // Add the falling class to initiate the falling animation
  var coinButton = document.getElementById("coinButton");
  coinButton.classList.add("falling");
});

function fixCoinButton() {
  var coinButton = document.getElementById("coinButton");
  coinButton.classList.remove('falling');
  coinButton.style.bottom = '10px'; // Set your desired position from the bottom
}

  
  