// state
const state = () => ({
    cart: [],
    settings: [],
})

// getters
const getters = {
    settings: state => state.settings,
    carts: state => state.cart,
    cart_counter: state => {
        return state.cart.length
    },
    
}

// mutation
const mutations = {
    set_settings (state, payload) {
        state.settings = payload
    },
    append(state, payload) {
        state.cart.push(payload)
    },
    delete(state, payload) {
        state.cart.splice(state.cart.indexOf(payload), 1);
    },
}

// actions
const actions = {
    updateSettings(context) {

        this.$axios.get("settings").then(response => {
            console.log(response.data)
            context.commit('set_settings', response.data)
        });
        
    },
    addToCart(context, params) {
        context.commit('append', params)
    },

    deleteFromCart(context, params) {
        context.commit('delete', params)
    }
}



export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}