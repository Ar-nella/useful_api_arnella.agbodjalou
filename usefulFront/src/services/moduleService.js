import { api } from './api'

export const moduleModel = {

  activateModule (data) {
    const response = api.post(`/login`, data)
    return response
  },

  deactivateModule (data) {
    const response = api.post(`/register`, data)
    return response
  },

}