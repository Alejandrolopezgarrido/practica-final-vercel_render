<template>
  <div>
    <h2>Gestión de Cursos</h2>

    <input v-model="filtro" placeholder="Buscar cursos..." class="border p-2 mb-3">

    <ul>
      <li v-for="p in courseFiltrados" :key="p.id">
        {{ p.name }} - {{ p.description }}€ 
        <button @click="editar(p)">Editar</button>
        <button @click="borrar(p.id)">Eliminar</button>
      </li>
    </ul>

    <h3>{{ editando ? 'Editar curso' : 'Nuevo curso' }}</h3>
    <input v-model="form.name" placeholder="Nombre">
    <input v-model="form.description" placeholder="descripcion">
    <button @click="guardar">Guardar</button>
  </div>
</template>

<script>
export default {
  name: 'Course',
  data() {
    return {
      course: [],
      form: { id: null, name: '', email: '', course_id: ''},
      filtro: '',
      editando: false,
      apiBase: 'http://localhost/api/course'
    };
  },
  computed: {
    courseFiltrados() {
      return this.course.filter(p =>
        p.name.toLowerCase().includes(this.filtro.toLowerCase())
      );
    },
  },
  methods: {
    async cargarCourse() {
      try {
        const res = await fetch(this.apiBase,{
          headers: { 'Accept': 'application/json' }
        });
        if (!res.ok) throw new Error('Error al cargar cursos');
        this.course = await res.json();
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
        if (!res.ok) throw new Error('Error al borrar el estudainte');
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