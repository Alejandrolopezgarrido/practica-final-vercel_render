<template>
  <div>
    <h2>Gestión de Cursos</h2>

    <input v-model="filtro" placeholder="Buscar cursos..." class="border p-2 mb-3">

    <ul>
      <li v-for="p in courseFiltrados" :key="p.id">
        {{ p.name }} - {{ p.description }}
        <button @click="editar(p)">Editar</button>
        <button @click="borrar(p.id)">Eliminar</button>
      </li>
    </ul>

    <h3>{{ editando ? 'Editar curso' : 'Nuevo curso' }}</h3>
    <input v-model="form.name" placeholder="Nombre">
    <input v-model="form.description" placeholder="descripción">
    <button @click="guardar">Guardar</button>
  </div>
</template>

<script>
// ELIMINADO EL "setup": Ahora Vercel no dará error por el "export default"
export default {
  name: 'Course',
  data() {
    return {
      course: [],
      form: { id: null, name: '', description: ''}, // Limpiado: no necesita email ni course_id
      filtro: '',
      editando: false,
      // URL de Render actualizada para producción
      apiBase: 'https://backend-practica-0bwi.onrender.com/api/course'
    };
  },
  computed: {
    courseFiltrados() {
      return this.course.filter(p =>
        p.name && p.name.toLowerCase().includes(this.filtro.toLowerCase())
      );
    },
  },
  methods: {
    async cargarCourse() {
      try {
        const res = await fetch(this.apiBase, {
          headers: { 'Accept': 'application/json' }
        });
        if (!res.ok) throw new Error('Error al cargar cursos');
        this.course = await res.json();
      } catch (error) {
        console.error("Error en cursos:", error);
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
        
        if (!res.ok) throw new Error('Error al guardar');

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
      if(!confirm('¿Eliminar curso?')) return;
      try {
        const res = await fetch(`${this.apiBase}/${id}`, { method: 'DELETE' });
        if (!res.ok) throw new Error('Error al borrar');
        this.cargarCourse();
      } catch (error) {
        console.error(error);
      }
    },
    resetForm() {
      this.form = { id: null, name: '', description: ''};
      this.editando = false;
    },
  },
  mounted() {
    this.cargarCourse();
  },
};
</script>