<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import DangerButton from '@/Components/DangerButton.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/vue3';
    import {
        onMounted
    } from 'vue';
    import $ from 'jquery';
    import Swal from 'sweetalert2';
    import DataTable from 'datatables.net-dt';

    onMounted(() => {
        const table = $('#dataTable').DataTable({
            searching: false,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    });

const props = defineProps({
    publicaciones: Object,
});



const form = useForm({
    id: ''
});

const deletePublicacion = (id,nombre) => {
    const alerta = Swal.mixin({
        buttonsStyling: true,
    });

    alerta.fire({
        title: '¿Estás seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, borrar!',
        cancelButtonText: 'No, cancelar!',
        customClass: {
            confirmButton: 'px-4 py-2 bg-green-800 text-white border rounder-md font-semibold',
            cancelButton: 'px-4 py-2 bg-red-800 text-white border rounder-md font-semibold',
        },
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('publicaciones.destroy', id));
        }
    });
};


</script>

<template>
    <Head title="Publicacaiones" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Publicacaiones</h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('publicaciones.create')" class="px-4 py-2 bg-gray-800 text-white border rounder-md font-semibold"><i class="fa-solid fa-plus-circle"></i> Crear Publicación</Link>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table id="dataTable" class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-300">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Titulo</th>
                            <th class="px-4 py-4">Contenido</th>
                            <th class="px-4 py-4">Autor</th>
                            <th class="px-4 py-4">Imagen</th>
                            <th class="px-4 py-4">Fecha de publicacion</th>
                            <th class="px-4 py-4"></th>
                            <th class="px-4 py-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pub, i in props.publicaciones" :key="pub.id">
                            <td class="border border-gray-400 px-4 py-4">{{ (pub.id) }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ (pub.titulo) }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ (pub.contenido) }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ (pub.autor) }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ (pub.imagen) }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ (pub.created_at) }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('publicaciones.edit', pub.id)" class="px-4 py-2 bg-gray-800 text-white border rounder-md font-semibold">Editar</Link>
                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="deletePublicacion(pub.id,pub.titulo)" class="px-4 py-2 bg-red-800 text-white border rounder-md font-semibold"><i class="fa-solid fa-trash"></i> Borrar</DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
