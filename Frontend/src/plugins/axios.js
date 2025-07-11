// src/plugins/axios.js
import axios from "axios";

const api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL || "http://127.0.0.1:8000/api",
  withCredentials: false, // Adjust based on your CORS needs
  timeout: 10000, // 10-second timeout
});

export default api;