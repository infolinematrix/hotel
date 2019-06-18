// state
const state = () => ({
    cart: [],
})

// getters
const getters = {

    carts: state => state.cart,
    cart_counter: state => {
        return state.cart.length
    }
}

// mutation
const mutations = {

    append(state, payload) {
        state.cart.push(payload)
    },
    delete(state, payload) {
        state.cart.splice(state.cart.indexOf(payload), 1);
    },
}

// actions
const actions = {

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