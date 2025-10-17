import axios from "axios";

const baseURL = 'http://localhost:8000/api';

export const api = axios.create({
    baseURL: baseURL,
    withCredentials: true
});

axios.interceptors.request.use(config => {
  config.headers.Authorization = `Bearer ${localStorage.getItem('token')}`
  config.headers["Content-Type"] = 'application/json'
  config.headers.Accept = 'application/json'

  return config
})