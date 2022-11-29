
<template>
  
  
  <br>
  <label>Seleccionar empresa:</label> 
  <select class="ml-5 px-5 py-2 border-solid border-slate-400 border text-slate-500 rounded"
   v-model="enterprise_id" @change="load_locations">
    <option v-for="item in enterprises" :value="item.id">{{ item.name }}</option>
  </select> 
  <br>

  <label>Seleccionar ubicacion:</label> 
  <select class="ml-5 px-5 py-2 border-solid border-slate-400 border text-slate-500 rounded"
   v-model="location_id" @change="load_sensors">
    <option v-for="item in locations" :value="item.id">{{ item.name }}</option>
  </select> 

  <br>
  <label>Seleccionar sensor:</label>  
  <select class="ml-5 px-5 py-2 border-solid border-slate-400 border text-slate-500 rounded"
   v-model="sensors_id" @change="load_sensordatas">
    <option v-for="item in sensors" :value="item.id">{{ item.name }}</option>
  </select> 

  <br>
  <label>Filtrar por fechas:</label>

  <br>
  <div>
    fecha inicial : <input type="date" v-model="start_date">
  </div>
  <br>
  <div>
    fecha final :   <input type="date" v-model="end_date">
  </div>

  <button class="ml-10 h-9 w-20 mx-auto border bg-cyan-700 rounded-lg " @click="filtrar_fecha">Filtrar</button>


<div class="mt-20 flex flex-col">
  <div class="overflow-x-auto sm:-mx6 lg:-mx8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="border-b">
            <tr>
              <th>#</th>
              <th>Fecha / Hora</th>
              <th>Valor</th>
            </tr>
          </thead>

          <tbody>
            <tr class="border-b table-fixed"  v-for="item in sensordatas">

              <td class="text-center">
                {{ item.id }}
              </td>

              <td class="text-center">
                {{ item.date_time }}
              </td>


              <td class="text-center">
                {{ item.value }}
              </td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<br>


<p>filtered data</p>
<div class="mt-20 flex flex-col">
  <div class="overflow-x-auto sm:-mx6 lg:-mx8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="border-b">
            <tr>
              <th>#</th>
              <th>Fecha / Hora</th>
              <th>Valor</th>
            </tr>
          </thead>

          <tbody>
            <tr class="border-b table-fixed"  v-for="item in date_filtered">

              <td class="text-center">
                {{ item.id }}
              </td>

              <td class="text-center">
                {{ item.date_time }}
              </td>

              <td class="text-center">
                {{ item.value }}
              </td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</template>


<script setup>

  import { ref, onMounted } from 'vue'
  import dayjs from 'dayjs';

  //**Variables */
  const enterprises = ref()
  const enterprise_id = ref()
  
  const locations = ref()
  const location_id = ref()
  
  const sensors = ref()
  const sensors_id = ref()

  const sensordatas = ref()
  const sensordata_id = ref()

  const start_date = ref()
  const end_date   = ref()

  const date_filtered = ref()

    


  onMounted(() => {
    load_enterprises()
    console.log('dayjs',dayjs().format())
  })

  let now = dayjs();

  //cargar empresas
  const load_enterprises = async () => {
    console.log('cargando empresas')

    axios.get('http://127.0.0.1:8000/api/enterprises', {
  })
  .then(function (response) {
    console.log(response.data);
    enterprises.value = response.data
  })
  .catch(function (error) {
    console.log(error);
  })
  }

  //cargar locations
  const load_locations = async () => {
    console.log('cargando locations',enterprise_id.value)

    axios.get(`http://127.0.0.1:8000/api/enterprises/${enterprise_id.value}/locations`,{
      headers: {
        'Content-Type': 'application/json'
    }
      })
    .then(function (response) {
      console.log('locations:', response);
      locations.value = response.data
    })
    .catch(function (error) {
      console.log(error);
    })
  }

  //cargar sensors
  const load_sensors = async () => {
    console.log('cargando sensors',location_id.value)

    axios.get(`http://127.0.0.1:8000/api/locations/${location_id.value}/sensors/`,{
      headers: {
        'Content-Type': 'application/json'
    }
      })
    .then(function (response) {
      console.log('sensors:', response);
      sensors.value = response.data
    })
    .catch(function (error) {
      console.log(error);
    })
  }

    //cargar sensorsdatas
    const load_sensordatas = async () => {
    console.log('cargando sensordatas',sensors_id.value)

    axios.get(`http://127.0.0.1:8000/api/sensors/${sensors_id.value}/data`,{
      headers: {
        'Content-Type': 'application/json'
    }
      })
    .then(function (response) {
      console.log('sensordatas:', response);
      sensordatas.value = response.data
    })
    .catch(function (error) {
      console.log(error);
    })
   }

   //filtro date
    const filtrar_fecha = async () => {
      
    axios.get(`http://127.0.0.1:8000/api/filter_by_date`,{
      params:{
        sensors_id:sensors_id.value,
        start_date:start_date.value,
        end_date:end_date.value
      }
    })
    .then(function (response) {
      console.log('registros',response.data)
      date_filtered.value = response.data
    })
  }

//  const formato_fecha =


</script>


<style scoped>

</style>
