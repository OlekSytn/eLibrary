<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Hapus Buku
        </h1>
      </div>

      <div class="main-content__body">
        <b-card>
          <b-alert variant="danger" show>Yakin buku akan dihapus? Data yang telah dihapus tidak bisa dikembalikan.</b-alert>
          <b-button v-on:click="deleteHandler" size="md" variant="primary">
            Iya, Saya mau hapus.
          </b-button>
          <b-button onclick="self.history.back()" size="md" variant="secondary">
            Batal hapus.
          </b-button>
        </b-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loggedIn: User.loggedIn()
    }
  },
  methods: {
    deleteHandler() {
      axios.delete('/api/book/'+this.$route.params.id).then(res => {
        this.$router.push('/master/buku')
      }).catch(error => console.log(error))
    }
  }
}
</script>

<style>

</style>
