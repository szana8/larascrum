/**
 * Return the list of the issues from the Vuex State
 *
 * @param {Object} state
 */
export const issues = (state) => {
	return state.issues;
};

/**
 * Return the issue object from the Vuex State
 *
 * @param {Object} state
 */
export const issue = (state) => {
	return state.issue;
};

/**
 * Return the replies of the issue object from the Vuex State
 *
 * @param {Object} state
 */
export const replies = (state) => {
	if (state.issue)
		return state.issue.replies;

	return;
};

/**
 * Return the selected issue from the Vuex State
 *
 * @param {Object} state
 */
export const selectedIssue = (state) => {
	return state.selectedIssue;
};

/**
 * Return the opened project id on the sidebar.
 *
 * @param {Object} state
 */
export const selectedProject = (state) => {
	return state.selectedProject;
};

/**
 * Return the opened project id on the sidebar.
 *
 * @param {Object} state
 */
export const selectedPriority = (state) => {
	return state.selectedPriority;
};
