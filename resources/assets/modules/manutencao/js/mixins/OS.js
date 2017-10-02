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

            history: ''

        }

    },

    methods: {

        setOs(os) {

            this.id = os.id;

            this.service = os.descricao;

            this.technitians = [];

            this.created_at = os.created_at;

            this.finishedAt = os.data_termino;

            this.observation = os.relatorio;

            this.epi = [{text:'óculos', value:'oculos'}];

            this.history = '';

        }

    }

}