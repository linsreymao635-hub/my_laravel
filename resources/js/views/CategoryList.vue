<template>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">Categories</h1>
            <router-link to="/categories/create" class="btn btn-info">+ Create Category</router-link>
        </div>

        <div v-if="categoryStore.loading" class="text-center py-4">Loading...</div>
        <div v-else-if="categoryStore.error" class="alert alert-danger">
            {{ categoryStore.error }}
        </div>

        <table v-else class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(category, index) in categoryStore.categories" :key="category.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.description || '-' }}</td>
                    <td>
                        <span :class="category.is_active ? 'badge bg-success' : 'badge bg-secondary'">
                            {{ category.is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <router-link :to="`/categories/${category.id}/edit`" class="text-info me-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </router-link>
                        |
                        <button @click="deleteCategory(category.id)" class="text-danger ms-2">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-if="!categoryStore.loading && categoryStore.categories.length === 0" class="text-center py-4 text-muted">
            No categories found.
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { useCategoryStore } from '../stores/categoryStore';

const categoryStore = useCategoryStore();

const deleteCategory = async (id) => {
    if (confirm('Are you sure you want to delete this category?')) {
        await categoryStore.deleteCategory(id);
    }
};

onMounted(() => {
    categoryStore.fetchCategories();
});
</script>