import './bootstrap';
import { createApp } from 'vue';
import Course from './components/Course.vue';
import Student from './components/Student.vue';

const app = createApp({});
app.component('course', Course);
app.component('student', Student);
app.mount('#app');