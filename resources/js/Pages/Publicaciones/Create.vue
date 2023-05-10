<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm } from '@inertiajs/vue3';

const form = useForm({
    titulo: '',
    contenido: '',
    autor: '',
    imagen: '',
});

</script>

<template>
    <Head title="Crear publicacion" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear publicacion</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$event=> form.post(route('publicaciones.store'))" class="mt-6 space-y-6 max-w-xl">
                        <InputLabel for="titulo" value="Titulo"></InputLabel>
                        <TextInput
                            id="titulo"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.titulo"
                            required
                            autofocus
                            autocomplete="titulo"
                        />
                        <InputError class="mt-2" :message="form.errors.titulo"></InputError>
                        <InputLabel for="contenido" value="Contenido"></InputLabel>
                        <TextInput
                            id="contenido"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.contenido"
                            required
                            autofocus
                            autocomplete="contenido"/>
                        <InputError class="mt-2" :message="form.errors.contenido"></InputError>
                        <InputLabel for="autor" value="Autor"></InputLabel>
                        <TextInput
                            id="autor"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.autor"
                            required
                            autofocus
                            autocomplete="autor"/>
                        <InputError class="mt-2" :message="form.errors.autor"></InputError>
                        <InputLabel for="imagen" value="Imagen"></InputLabel>
                        <TextInput
                            id="imagen"
                            type="file"
                            class="mt-1 block w-full"
                            v-model="form.imagen"
                            autofocus
                            autocomplete="imagen"/>
                        <InputError class="mt-2" :message="form.errors.imagen"></InputError>
                        <PrimaryButton class="mt-2" :disabled="form.processing">Crear</PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
