export default class {

    successMessage(message) {
        console.log(message);
        swal({
            title: "Success",
            text: message,
            type: "success",
            cancelButtonText: 'Ok'
        });
    }
    errorMessage(error) {
        console.log(error);

        swal({
            title: "Error",
            text: error,
            type: "error",
            cancelButtonText: 'Ok'
        });
    }
}