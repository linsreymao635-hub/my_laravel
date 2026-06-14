<template>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="mb-0">Create Category</h1>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div v-if="error" class="alert alert-danger">
            {{ error }}
        </div>

        <form @submit.prevent="handleSubmit">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
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
                        {{ loading ? 'Creating...' : 'Create' }}
                    </button>
                    <router-link to="/categories" class="btn btn-secondary">Cancel</router-link>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useCategoryStore } from '../stores/categoryStore';

const router = useRouter();
const categoryStore = useCategoryStore();

const form = ref({
    name: '',
    description: '',
    is_active: true
});

const loading = ref(false);
const error = ref('');

const handleSubmit = async () => {
    loading.value = true;
    error.value = '';

    const result = await categoryStore.createCategory({
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