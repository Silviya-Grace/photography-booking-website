
const bookingForm = document.getElementById("bookingForm");
const today = new Date();
const yyyy = today.getFullYear();
const mm = String(today.getMonth() + 1).padStart(2, '0');
const dd = String(today.getDate()).padStart(2, '0');
const minDate = `${yyyy}-${mm}-${dd}`;
document.getElementById("date").setAttribute("min", minDate);

bookingForm.addEventListener("submit", function(event) {
    event.preventDefault();
    const name = document.getElementById("name").value;
    const sessionType = document.getElementById("sessionType").value;
    const date = document.getElementById("date").value;
    sessionStorage.setItem("confirmationMessage", `Thank you, ${name}! Your ${sessionType} session has been booked for ${date}.`);
    window.location.href = "confirmation.html";
});