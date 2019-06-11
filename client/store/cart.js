// state
const state = () => ({
    cart: [],
})

// getters
const getters = {

    carts: state => state.cart,
}

// mutation
const mutations = {

    append(state, payload) {
        state.cart.push(payload)
    },
}

// actions
const actions = {

    addToCart(context, params) {
        context.commit('append', params)
    },
}



export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}