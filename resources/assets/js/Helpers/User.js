import Token from './Token'
import AppStorage from './AppStorage';
class User {
  
  login(data) {
    axios.post('/api/auth/login', data)
      .then(res => this.responseAfterLogin(res))
      .catch(error => console.log(error))
  }

  responseAfterLogin(res) {
    const access_token = res.data.access_token
    const user = res.data.user
    const status = res.data.status
    if (Token.isValid(access_token)) {
      AppStorage.store(user, access_token, status)
      window.location = '/'
    }
  }

  hasToken() {
    const storeToken = AppStorage.getToken('')
    if (storeToken) {
      return Token.isValid(storeToken) ? true : false
    }
    return false
  }

  loggedIn() {
    return this.hasToken()
  }

  logout() {
    AppStorage.clear()
    window.location = '/'
  }

  name() {
    if (this.loggedIn()) {
      return AppStorage.getUser()
    }
  }

  status() {
    if (this.loggedIn()) {
      return AppStorage.getStatusUser()
    }
  }

  id() {
    if (this.loggedIn) {
      return AppStorage.id()
    }
  }

  admin() {
    if (this.status == 'A') {
      return true
    }
    return false
  }

}

export default User = new User();