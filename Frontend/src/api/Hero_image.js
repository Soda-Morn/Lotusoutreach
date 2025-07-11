// src/api/post.js
import api from '@/plugins/axios';

// Get all pagContent
export const getImageHero = async () => {
  const response = await api.get('v1/heroImage');
  return response.data;
};

// Get a single PagContent by ID
export const getImageHeroById = async (id) => {
  const response = await api.get(`v1/heroImage/${id}`);
  return response.data;
};
