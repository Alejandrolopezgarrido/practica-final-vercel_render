<script setup>
// Asegúrate de que las mayúsculas coincidan exactamente con tus archivos
import Student from '../resources/js/components/Student.vue'
import Course from '../resources/js/components/Course.vue'
</script>

<template>
  <div class="container">
    <h1>Panel de Administración</h1>
    <hr>
    
    <section>
      <h2>Listado de Estudiantes</h2>
      <Student />
    </section>

    <hr>

    <section>
      <h2>Listado de Cursos</h2>
      <Course />
    </section>
  </div>
</template>

<style scoped>
.container {
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}
h1 { color: #42b883; }
hr { margin: 30px 0; border: 0; border-top: 1px solid #eee; }
/* Aquí estaba el error, debe ser /style */
</style>