export default {

    data() {

        return {

            id: '',

            service: '',

            technitions: [],

            created_at: '',

            finishedAt: '',

            observation: '',

            epi: [],

            history: '',

            originalData: {}

        }

    },

    methods: {

        setOs(os) {

            this.id = os.id;

            this.service = os.tecnica.nome;

            this.technitians = [];

            this.created_at = os.created_at;

            this.finishedAt = os.data_termino;

            this.observation = os.observacao;

            this.originalData = os;

        }

    }

}