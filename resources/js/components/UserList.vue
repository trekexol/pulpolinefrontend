
<template>
  <div>
    <h1 class="text-2xl font-bold">User List </h1>
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.nombre }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      users: []
    };
  },
  mounted() {
    axios.get('/api/users')
      .then(response => {
        this.users = response.data;
      });
  }
};
</script>
