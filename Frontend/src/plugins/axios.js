import axios from "axios";

const apiInstance = axios.create({
  baseURL: import.meta.env.VITE_API_URL || "http://localhost:8000/api",
  withCredentials: true, // Important if using Sanctum
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

// ✅ Request Interceptor: Add token from localStorage
apiInstance.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem("token"); // Get token
    if (token) {
      config.headers["Authorization"] = `Bearer ${token}`; // Add to header
    } else {
      delete config.headers["Authorization"]; // Remove if no token
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

// ✅ Response Interceptor: Handle 401 Unauthorized
apiInstance.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response && error.response.status === 401) {
      localStorage.removeItem("token"); // Remove invalid token
      window.location.href = "/login"; // Redirect to login page
    }
    return Promise.reject(error);
  }
);

// ✅ Export axios instance
export default apiInstance;
