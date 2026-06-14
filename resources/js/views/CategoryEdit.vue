<template>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="mb-0">Edit Category</h1>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div v-if="categoryStore.loading && !categoryStore.category" class="text-center py-4">Loading...</div>

        <div v-else-if="error" class="alert alert-danger mb-4">
            {{ error }}
        </div>

        <div v-else-if="categoryStore.category">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form @submit.prevent="handleSubmit">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input v-model="form.name" type="text" id="name" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea v-model="form.description" id="description" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input v-model="form.is_active" type="checkbox" id="is_active" class="form-check-input">
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>

                        <button type="submit" :disabled="loading" class="btn btn-primary me-2">
                            {{ loading ? 'Updating...' : 'Update' }}
                        </button>
                        <router-link to="/categories" class="btn btn-secondary">Cancel</router-link>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import { useCategoryStore } from '../stores/categoryStore';

const router = useRouter();
const route = useRoute();
const categoryStore = useCategoryStore();

const form = ref({
    name: '',
    description: '',
    is_active: true
});

const loading = ref(false);
const error = ref('');

onMounted(async () => {
    await categoryStore.fetchCategory(route.params.id);
    if (categoryStore.category) {
        form.value.name = categoryStore.category.name;
        form.value.description = categoryStore.category.description || '';
        form.value.is_active = !!categoryStore.category.is_active;
    }
});

const handleSubmit = async () => {
    loading.value = true;
    error.value = '';

    const result = await categoryStore.updateCategory(route.params.id, {
        name: form.value.name,
        description: form.value.description,
        is_active: form.value.is_active
    });

    if (result.success) {
        router.push('/categories');
    } else {
        error.value = result.error;
    }

    loading.value = false;
};
</script>