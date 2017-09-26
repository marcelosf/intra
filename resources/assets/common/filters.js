export default {

    /**
     * Formats the service maintenence service status value.
     * @param value
     * @returns {*}
     */
    serviceStatus(value) {

        switch (value) {

            case 'autorizacao':
                return 'autorização';
                break;
            case 'elaboracao':
                return 'elaboração';
                break;
            case 'aguardando_info':
                return 'aguardando informação';
                break;
            case 'aguardando_material':
                return 'aguardando material';
                break;
            default:
                return value;
                break;

        }

    },

    date(value) {

        let regex = /(\d{4})-(\d{2})-(\d{2})\s(\d{2}:\d{2}:\d{2})/;

        return value.replace(regex, '$3\/$2\/$1');

    },

    phone(value) {

        let regex = /.* - ramal USP:/;

        return value.replace(regex, "");

    },

    upFirst(value) {

        let regex = /\b\w/g;

        return value.replace(regex, (letter) => {

            return letter.toUpperCase();

        });

    }

}