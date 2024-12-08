document.addEventListener("DOMContentLoaded", () => {
    const profileImg = document.querySelector(".profile-img");
    const dropdown = document.querySelector(".dropdown");
    profileImg.addEventListener("click", () => {
        dropdown.classList.toggle("show");
    });
    document.addEventListener("click", (event) => {
        if (!dropdown.contains(event.target) && !profileImg.contains(event.target)) {
            dropdown.classList.remove("show");
        }
    });
});


$(document).ready(function() {
    $('.dropdown-toggle').click(function() {
        $(this).next('.submenu').slideToggle(200);
        $(this).parent().toggleClass('active');
    });
});


function closeAlert() {
    const alertBox = document.getElementById('alertBox');
    if (alertBox) {
        alertBox.style.animation = 'slideOut 0.5s ease-out';
        setTimeout(() => alertBox.remove(), 500);
    }
}
setTimeout(() => {
    closeAlert();
}, 5000);