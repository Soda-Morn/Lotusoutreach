// src/api/post.js
import api from '@/plugins/axios';

// Get all pagContent
export const getPageContents = async () => {
  const response = await api.get('v1/page_contents');
  return response.data;
};

// Get a single PagContent by ID
export const getPageContentById = async (id) => {
  const response = await api.get(`v1/page_contents/${id}`);
  return response.data;
};
