import Vue from 'vue'
import Vuex from 'vuex'
import auth from '../app/auth/vuex'
import issue from '../app/issue/vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	modules: {
		auth: auth,
		issue: issue
	}
})
