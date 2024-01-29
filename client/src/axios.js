import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: 'http://localhost:8000/api',
});

axiosInstance.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('token');
    if (token) {
      config.headers['Authorization'] = `Bearer ${token}`;
    }

    config.headers['Content-Type'] = 'application/json';
    config.headers['Accept'] = 'application/json';

    return config;
  },
  (error) => {
    console.error(error);
    Promise.reject(error);
  }
);

export default axiosInstance;
