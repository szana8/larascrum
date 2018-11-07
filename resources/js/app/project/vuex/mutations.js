/**
 * Set the project state based on the givven parameter
 *
 * @param {Object} state		Vuex State
 * @param {Object} projects 	Projects list
 */
export const setProjects = (state, projects) => {
	state.projects = projects;
};

/**
 * Set the selected project id to mark the active project on the list.
 *
 * @param {Object} state	  Vuex State
 * @param {Number} project	Project id
 */
export const setProject = (state, project) => {
	state.project = project;
};
