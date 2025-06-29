import Swal from "sweetalert2";

const showAlert = (icon, title, text = "") => {
    Swal.fire({
        icon,
        title,
        text,
        confirmButtonText: "OK",
        customClass: {
            confirmButton: "btn btn-primary",
        },
    });
};

const showConfirm = (title, text, onConfirm) => {
    Swal.fire({
        title,
        text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        reverseButtons: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed && typeof onConfirm === "function") {
            onConfirm();
        }
    });
};

export default {
    success: ({ title, text = "" }) => showAlert("success", title, text),
    error: ({ title, text = "" }) => showAlert("error", title, text),
    info: ({ title, text = "" }) => showAlert("info", title, text),
    warning: ({ title, text = "" }) => showAlert("warning", title, text),
    confirm: ({ title, text, onConfirm }) =>
        showConfirm(title, text, onConfirm),
};
