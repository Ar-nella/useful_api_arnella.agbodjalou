import { api } from './api'

export const authModel = {

  login(data) {
    const response = api.post(`/login`, data)
    return response
  },

  register(data) {
    const response = api.post(`/register`, data)
    return response
  },

  getUser(data) {
    const response = api.get(`/user`, data)
    return response
  }
}
