/**
 * Fetch the project list and set it to the project state, only those
 * projects can be listed which has a permisson of the user.
 */
export const fetchProjects = ({ commit }) => {
	return axios.get('/api/projects').then((response) => {
		commit('setProjects', response.data.data);
	});
};
