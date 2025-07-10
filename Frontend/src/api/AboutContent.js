import apiInstance from '@/Plugin/axios'

const API_URL = '/aboutcontents'

export const getPosts = async () => {
  const res = await apiInstance.get(API_URL)
  return res.data
}

export const createPost = async (data) => {
  const res = await apiInstance.post(API_URL, data)
  return res.data
}

export const updatePost = async (id, data) => {
  const res = await apiInstance.put(`${API_URL}/${id}`, data)
  return res.data
}

export const deletePost = async (id) => {
  const res = await apiInstance.delete(`${API_URL}/${id}`)
  return res.data
}