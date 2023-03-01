<!-- <template>
    <div>
        <div class="box">
            <div class="text">graph</div>
        </div>
    </div>
  </template>
  <script >
  </script>
  <style scoped>
  .box {
    width: 90vw;
    height: 24vh;
    border: 2px solid black;
    border-radius: 20px;
    margin: 3vh 0 0 0;
    background-color: white;
    color: black;
  }
  </style> -->

  <template>
    <div class="box">
            <div class="text">グラフ</div>
            <Chart
      :size="{ width: 380, height: 220 }"
      :data="data"
      :margin="margin"
      :direction="direction" >
    
      <template #layers>
        <Grid strokeDasharray="2,2" />
        <Line :dataKeys="['name', 'pl']" />
      </template>
    
    </Chart>
        </div>

   </template>

<!-- <script lang="ts">
import { defineComponent, ref } from 'vue'
import { Chart, Grid, Line } from 'vue3-charts'
import { plByMonth } from '@/data'
 
export default defineComponent({
 name: 'LineChart',
 components: { Chart, Grid, Line },
 setup() {
   const data = ref(plByMonth)
   const direction = ref('horizontal')
   const margin = ref({
     left: 0,
     top: 20,
     right: 20,
     bottom: 0
   })
 
   return { data, direction, margin }
 }
})
</script> -->
<script setup>
import { defineComponent, ref } from 'vue'
import { Chart, Grid, Line } from 'vue3-charts'
   const direction = ref('horizontal')
   const margin = ref({
     left: 0,
     top: 20,
     right: 20,
     bottom: 0
   })
   const props = defineProps({
    data: Object,
  })
</script>
<style scoped>
.box {
    width: 90vw;
    height: 28vh;
    border: 2px solid black;
    border-radius: 20px;
    margin: 3vh 0 0 0;
    background-color: white;
    color: black;
    text-align: center;
    font-size: 20px;
  }
</style>
  