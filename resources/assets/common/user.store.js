export const user = {

    state: {

        user: {user: false, check: false}

    },

    mutations: {

        user(state, user) {

            state.user.user = user;

        },

        check(state, check) {

            state.user.check = check;

        }

    },


    getters: {

        username(state) {

            return state.user.user ? state.user.user.name : '';

        },

        department(state) {

            let department = '';

            if (state.user.user) {

                let typesObj = JSON.parse(state.user.user.types);

                department = typesObj[0].nomeSetor;

            }

            return department;

        }

    }

};