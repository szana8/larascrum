import Vue from 'vue'
import Vuex from 'vuex'
import auth from '../app/auth/vuex'
import issue from '../app/issue/vuex'
import project from '../app/project/vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	strict: true,
	modules: {
		auth: auth,
		issue: issue,
		project: project
	}
})
