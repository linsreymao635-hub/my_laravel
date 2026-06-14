import { defineStore } from 'pinia';
import axios from 'axios';

export const useCategoryStore = defineStore('category', {
    state: () => ({
        categories: [],
        category: null,
        loading: false,
        error: null
    }),

    actions: {
        async fetchCategories() {
            this.loading = true;
            try {
                const response = await axios.get('/api/categories');
                this.categories = response.data.data;
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to fetch categories';
            } finally {
                this.loading = false;
            }
        },

        async fetchCategory(id) {
            this.loading = true;
            try {
                const response = await axios.get(`/api/categories/${id}`);
                this.category = response.data.data;
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to fetch category';
            } finally {
                this.loading = false;
            }
        },

        async createCategory(data) {
            this.loading = true;
            try {
                const response = await axios.post('/api/categories', data);
                this.categories.push(response.data.data);
                return { success: true };
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to create category';
                return { success: false, error: this.error };
            } finally {
                this.loading = false;
            }
        },

        async updateCategory(id, data) {
            this.loading = true;
            try {
                const response = await axios.put(`/api/categories/${id}`, data);
                const index = this.categories.findIndex(c => c.id === id);
                if (index !== -1) {
                    this.categories[index] = response.data.data;
                }
                return { success: true };
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to update category';
                return { success: false, error: this.error };
            } finally {
                this.loading = false;
            }
        },

        async deleteCategory(id) {
            this.loading = true;
            try {
                await axios.delete(`/api/categories/${id}`);
                this.categories = this.categories.filter(c => c.id !== id);
                return { success: true };
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to delete category';
                return { success: false, error: this.error };
            } finally {
                this.loading = false;
            }
        }
    }
});