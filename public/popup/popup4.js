document.addEventListener("DOMContentLoaded", () => {
  const popup = document.getElementById("popup");
  const closeBtn = document.getElementById("close-btn");
  const openPopupBtn = document.getElementById("open-popup-btn");

 window.rechargeNow = function () {
    // alert("Recharge process initiated!");
    window.location.href = walletUrl;
};


  // Function to show the popup
  function showPopup() {
    popup.style.display = "flex";
  }

  // Function to hide the popup
  function hidePopup() {
    popup.style.display = "none";
  }

  // Event listener to close the popup
  closeBtn.addEventListener("click", hidePopup);

  // Event listener to open the popup
  openPopupBtn.addEventListener("click", showPopup);

  // Show the popup on page load
    //   window.onload = function () {
    //     showPopup();
    //   };
});
