export const fetchIssues = ({ commit }, { payload }) => {
	return axios.get('api/issues', {params: payload}).then((response) => {
		return Promise.resolve(response.data)
	})
}
