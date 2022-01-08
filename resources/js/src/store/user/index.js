import { $themeBreakpoints } from '@themeConfig'
import axios from '@/libs/axios'

export default {
  namespaced: true,
  state: {
    user: null,
  },
  mutations: {
    UPDATE_USER(state, val) {
      state.user = val
    },
  },
  actions: {
    async fetchUser({ commit }) {
      const res = await axios.get('/api/auth/user')

      commit('UPDATE_USER', res.data)
    },
  },
}
