import localforage from 'localforage'
import { isEmpty } from 'lodash'

export const setProjects = (state, projects) => {
	state.projects = projects
}

export const setIssues = (state, issues) => {
	state.issues = issues
}

export const concatIssues = (state, issues) => {
	state.issues.data = state.issues.data.concat(issues.data)
	state.issues.meta = issues.meta
}

export const setIssue = (state, issue) => {
	state.issue = issue
}

export const setIssueReplies = (state, replies) => {
	state.issue.replies = replies
}
