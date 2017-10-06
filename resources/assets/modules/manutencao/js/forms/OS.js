export class OS {

    constructor(service, description, manager, technitians, tech, epis, obs)
    {

        this.codigo = null;

        this.status = null;

        this.solicitacao_id = service;

        this.descricao = description;

        this.gestor_id = manager;

        this.tecnica_id = tech;

        this.tecnicos = technitians;

        this.epis = epis;

        this.observacao = obs;

        this.relatorio = null;

    }

}