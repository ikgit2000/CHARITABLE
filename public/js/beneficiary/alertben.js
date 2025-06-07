function feedback(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal.fire({
        title: "Are you want to give feedback",
        text: "Its a one time feedback",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#395B64",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        dangerMode: true,
    })
        .then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlToRedirect;
            }
        });
}
function checkFormSubmission(event) {
    event.preventDefault(); // Prevent the form from being submitted

    const form = event.target.closest('form'); // Find the closest form element

    swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#395B64",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    })
        .then((result) => {
            if (result.isConfirmed) {
                // Continue with the form submission
                form.submit();
            } else {
                // Stop the form submission
                swal.fire("Cancelled", "Form submission cancelled.", "error");
            }
        });
}

function checkDeleteConfirmation(event) {
    event.preventDefault(); // Prevent the form from being submitted
    const form = event.target.closest('form');

    swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
    })
        .then((result) => {
            if (result.isConfirmed) {
                // Continue with the form submission
                form.submit();
            } else {
                // Stop the form submission
                swal.fire("Cancelled", "Delete action cancelled.", "error");
            }
        });
}
