// src/api/post.js
import api from '@/plugins/axios';

// Get all pagContent
export const getPageContents = async () => {
  const response = await api.get('/pagecontents');
  return response.data;
};

// Get a single PagContent by ID
export const getPageContentById = async (id) => {
  const response = await api.get(`/pagecontents/${id}`);
  return response.data;
};

// Create a new pageContents
export const createPageContent = async (pageContentData) => {
  const response = await api.post('/pagecontents', pageContentData);
  return response.data;
};

// Update an existing pageContent
export const updatePageContent = async (id, pageContentData) => {
  const response = await api.put(`/pagecontents/${id}`, pageContentData);
  return response.data;
};

// Delete a pageContent
export const deletePageContent = async (id) => {
  const response = await api.delete(`/pagecontents/${id}`);
  return response.data;
};
