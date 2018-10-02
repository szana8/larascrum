import auth from './auth/routes'
import home from './home/routes'
import issue from './issue/routes'
//import errors from './errors/routes'

export default [...home, ...auth, ...issue]
