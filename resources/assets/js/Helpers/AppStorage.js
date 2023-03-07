class AppStorage {
  storeToken(token) {
    localStorage.setItem('token', token)
  }

  storeUser(user) {
    localStorage.setItem('user', user)
  }

  storeStatus(status) {
    localStorage.setItem('status', status)
  }

  store(user, token, status) {
    this.storeUser(user)
    this.storeToken(token)
    this.storeStatus(status)
  }

  clear() {
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    localStorage.removeItem('status')
  }

  getToken() {
    return localStorage.getItem('token')
  }

  getUser() {
    return localStorage.getItem('user')
  }

  getStatusUser() {
    return localStorage.getItem('status')
  }
}

export default AppStorage = new AppStorage();