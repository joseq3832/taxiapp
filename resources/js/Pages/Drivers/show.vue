<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ driver.name }} (conductor)
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10">
                     <div class="grid grid-cols-6">
                        <div class="col-span-2 px-6 border-r">
                            <div class="flex flex-col items-center gap-4 mb-8">
                                <img :src="'/images/driver.png'" :alt="driver.name" class="rounded-full object-cover object-center h-24 w-24 px-auto">
                                <h2 class="text-l font-bold uppercase">{{ driver.name }} {{driver.lastname }}</h2>
                                <span class="flex gap-1.5 justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#AD7D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#AD7D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#AD7D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#AD7D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#AD7D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                </span>
                            </div>
                            <div class="mb-4">
                                <h3 class="font-semibold text-gray-700 uppercase">Contacto del conductor:</h3>
                                <ul class="py-4 space-y-3">
                                    <li class="bg-gray-100 rounded-md py-4 px-2 text-md text-gray-900 font-semibold">
                                        Cédula/DNI: {{ driver.id_card }}
                                    </li>
                                    <li class="bg-gray-100 rounded-md py-4 px-2 text-md text-gray-900 font-semibold">
                                        Teléfono/Whatsapp: {{ driver.phone }}
                                    </li>
                                    <li class="bg-gray-100 rounded-md py-4 px-2 text-md text-gray-900 font-semibold">
                                        Ciudad: Quito - Ecuador
                                    </li>
                                    <li class="bg-gray-100 rounded-md py-4 px-2 text-md text-gray-900 font-semibold">
                                        Email: {{ driver.name }}.{{ driver.id }}@gmail.com
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="block mb-4 font-semibold uppercase">Vehículos asignados:</h3>
                                <div class="grid grid-cols-2 gap-2">
                                    <div v-for="vehicle in driver.vehicles" :key="vehicle.id" class=" border border-gray-200 rounded-md p-3">
                                        <img :src="'/images/car.png'" :alt="vehicle.model" class="w-full h-auto object-fill">
                                        <p class="text-center">
                                            {{ vehicle.model }} <br>
                                            {{ vehicle.brand }} <br>
                                            {{ vehicle.year }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="px-6 rounded-md h-full">
                                <img :src="'/images/map.png'" alt="map" class="w-full h-full object-fill object-right shadow">
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout
    },
    props: {
        driver: Object
    }
}
</script>
