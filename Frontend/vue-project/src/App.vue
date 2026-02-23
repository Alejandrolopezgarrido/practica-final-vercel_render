<script setup>
// Importamos tus componentes (ajusta la ruta si es necesario)
import Student from './components/Student.vue' 
import Course from './components/Course.vue'
</script>

<template>
  <div class="container">
    <h1>Panel de Administración</h1>
    <hr>
    
    <h2>Listado de Estudiantes</h2>
    <Student /> <hr>

    <h2>Listado de Cursos</h2>
    <Course /> </div>
</template>

<style scoped>
.container {
  padding: 20px;
  font-family: sans-serif;
}
hr {
  margin: 30px 0;
}
</style>