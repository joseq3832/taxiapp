<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Añadir un conductor
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <form @submit.prevent="submit">
                        <div class="mt-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                               <div>
                                    <InputLabel for="name" value="Nombre" />
                                    <TextInput id="name" v-model="form.name" :value="driver.name" type="name" class="mt-1 block w-full px-1.5 py-2 border" required />
                                    <InputError class="mt-2" :message="form.errors.name" />
                               </div>
                               <div>
                                   <InputLabel for="lastname" value="Apellido" />
                                   <TextInput id="lastname" v-model="form.lastname" :value="driver.lastname" type="lastname" class="mt-1 block w-full px-1.5 py-2 border"
                                       required />
                                   <InputError class="mt-2" :message="form.errors.lastname" />
                               </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <InputLabel for="id_card" value="Cédula" />
                                    <TextInput id="id_card" v-model="form.id_card" :value="driver.id_card" type="id_card" class="mt-1 block w-full px-1.5 py-2 border"
                                        required />
                                    <InputError class="mt-2" :message="form.errors.id_card" />
                                </div>
                                <div>
                                    <InputLabel for="phone" value="Teléfono" />
                                    <TextInput id="phone" v-model="form.phone" :value="driver.phone" type="phone" class="mt-1 block w-full px-1.5 py-2 border"
                                        required />
                                    <InputError class="mt-2" :message="form.errors.phone" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="block my-4 uppercase font-semibold">Asignar un vehículo:</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-5 gap-4">
                                <div v-for="vehicle in vehicles" :key="vehicle.id" class="relative transition-transform ease-in-out hover:scale-105">
                                    <input type="radio" :id="'vehicle_'+vehicle.id" v-model="form.vehicle" :value="vehicle.id" name="vehicle_id" class="rounded-full absolute top-1 right-1" required/>
                                    <label :for="'vehicle_'+vehicle.id" class="cursor-pointer">
                                        <div class="border border-gray-200 rounded-md p-3">
                                            <img :src="'/images/car.png'" :alt="vehicle.model" class="w-full h-auto object-fill">
                                            <p class="text-center">
                                                {{ vehicle.model }} <br>
                                                {{ vehicle.brand }} <br>
                                                {{ vehicle.year }}
                                            </p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <span>{{ form.vehicle }}</span>
                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Añadir conductor
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    driver: Object,
    vehicles: Object
});

const form = useForm({
    name: '',
    lastname: '',
    id_card: '',
    phone: '',
    vehicle: '',
});

const submit = () => {
    form.post(route('driver.store'), {
        onFinish: () => form.reset('name', 'lastname', 'id_card', 'phone', 'vehicle'),
    });
};

</script>
