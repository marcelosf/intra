export class OS {

    constructor (os) {

        this.service = os.descricao;

        this.technitians = [];

        this.created_at = os.data_inicio;

        this.finishedAt = os.data_termino;

        this.observation = os.relatorio;

        this.epi = [];

        this.history = '';

    }

    getService() {

        return this.service;

    }

    setService(service) {

        this.service = service;

    }

    getTechnitians() {

        return technitians;

    }

    setTechnitians(tech) {

        this.technitians = tech;

    }

    getCreatedAt() {

        return this.created_at;

    }

    setCreatedAt(created) {

        this.created_at = created;

    }

    getFineshedAt() {

        return this.finishedAt;

    }

    setFinishedAt(fineshed) {

        this.finishedAt = fineshed;

    }

    getObservation() {

        return this.observation;

    }

    setObservation(obs) {

        this.observation = obs;

    }

    getEpi() {

        return this.epi;

    }

    setEpi(epi) {

        this.epi = epi;

    }

}