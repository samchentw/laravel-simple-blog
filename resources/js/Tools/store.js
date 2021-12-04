
import Vuex from 'vuex'

const store = new Vuex.Store({
    state: {
        count: 0,
        loading: false,
        loadingLabel: '載入中…',
    },
    mutations: {
        setLoading(state, { loading, label = '載入中…' }) {
            state.loading = loading;
            state.loadingLabel = label;
        }
    },
    getters: {},
    actions: {
        openLoading({ commit }, label = '') {
            //example: this.$store.dispatch('openLoading','上傳中…');
            commit('setLoading', { loading: true, label });
        },
        closeLoading({ commit }) {
            //example: this.$store.dispatch('closeLoading');
            commit('setLoading', { loading: false });
        },
    }
});

export default store;