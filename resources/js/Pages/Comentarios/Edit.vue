<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm } from '@inertiajs/vue3';

const props = defineProps({
    options: {
        type: Object,
    },
    comentarios: {
        type: Object,
    },
});

const form = useForm({
    autor: props.comentarios.autor,
    email: props.comentarios.correo,
    contenido: props.comentarios.contenido,
    publicacion_id: props.comentarios.publicacion_id,
});

</script>

<template>
    <Head title="Editar comentario" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar comentario</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$event=> form.patch(route('comentarios.update',props.comentarios.id))" class="mt-6 space-y-6 max-w-xl">
                        <InputLabel for="email" value="Correo"></InputLabel>
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="email"
                        />
                        <InputError class="mt-2" :message="form.errors.email"></InputError>
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
                        <InputLabel for="publicacion_id" value="Publicacion"></InputLabel>
                        <SelectInput
                            id="publicacion_id"
                            class="mt-1 block w-full"
                            v-model="form.publicacion_id"
                            :options="props.options"
                            required
                            autofocus
                            autocomplete="publicacion_id"/>
                        <PrimaryButton class="mt-2" :disabled="form.processing">Crear</PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
