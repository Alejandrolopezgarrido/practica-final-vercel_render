<template>
  <div>
    <h2>Gestión de Estudiantes</h2>

    <input v-model="filtro" placeholder="Buscar estudiante..." class="border p-2 mb-3">

    <ul>
      <li v-for="p in studentFiltrados" :key="p.id">
        {{ p.name }} - {{ p.email }} - {{ p.course_id }} € 
        <button @click="editar(p)">Editar</button>
        <button @click="borrar(p.id)">Eliminar</button>
      </li>
    </ul>

    <h3>{{ editando ? 'Editar estudiante' : 'Nuevo estudiante' }}</h3>
    <input v-model="form.name" placeholder="Nombre">
    <input v-model="form.email" placeholder="email">
    <input v-model="form.course_id" type="number" placeholder="Curso_id">
    <button @click="guardar">Guardar</button>
  </div>
</template>

<script>
export default {
  name: 'Student',
  data() {
    return {
      student: [],
      form: { id: null, name: '', email: '', course_id: ''},
      filtro: '',
      editando: false,
      apiBase: 'http://localhost/api/student'
    };
  },
  computed: {
    studentFiltrados() {
      return this.student.filter(p =>
        p.name.toLowerCase().includes(this.filtro.toLowerCase())
      );
    },
  },
  methods: {
    async cargarStudent() {
      try {
        const res = await fetch(this.apiBase,{
          headers: { 'Accept': 'application/json' }
        });
        if (!res.ok) throw new Error('Error al cargar estudiantes');
        this.student = await res.json();
      } catch (error) {
        console.error(error);
      }
    },
async guardar() {
      try {
        const options = {
          method: this.editando ? 'PUT' : 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify(this.form)
        };

        const url = this.editando ? `${this.apiBase}/${this.form.id}` : this.apiBase;

        const res = await fetch(url, options);
        if (!res.ok) throw new Error('Error al guardar el curso');

        this.resetForm();
        this.cargarCourse();
      } catch (error) {
        console.error(error);
      }
    },
    editar(prod) {
      this.form = { ...prod };
      this.editando = true;
    },
    async borrar(id) {
      try {
        const res = await fetch(`${this.apiBase}/${id}`, { method: 'DELETE' });
        if (!res.ok) throw new Error('Error al borrar el estudiante');
        this.cargarStudent();
      } catch (error) {
        console.error(error);
      }
    },
    resetForm() {
      this.form = { id: null, name: '', email: '', course_id: '' };
      this.editando = false;
    },
  },
  mounted() {
    this.cargarStudent();
  },
};
</script>