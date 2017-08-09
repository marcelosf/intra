export default {

    loginDialogControll() {

        window.addEventListener("message", this._receiveMessage, false);

    },

    _receiveMessage(event) {

        if (event.origin !== "test") {

            return;

        }

    }

}