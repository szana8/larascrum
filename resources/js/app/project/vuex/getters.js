/**
 * Return the list of the projects from the Vuex State
 *
 * @param {Object} state
 */
export const projects = (state) => {
	return state.projects;
};

/**
 * Return the opened project id on the sidebar.
 *
 * @param {Object} state
 */
export const project = (state) => {
	return state.project;
};
