<template>
  <div class="main-content">
    <div v-if="loggedIn">
        <div class="main-content__top">
          <h1 class="main-content__title">
            Edit Kategori
          </h1>
        </div>

        <div class="main-content__body">
          <b-card class="mr-15">
            <b-form @submit.prevent="onSubmit">
              <b-form-group label="Nama lengkap:" label-for="name">
                <b-form-input id="name"
                              type="text"
                              v-model="form.name"
                              required
                              placeholder="Tuliskan nama lengkap">
                </b-form-input>
                <div class="alert alert-danger mt-5" v-if="errors.name" variant="primary">{{ errors.name[0] }}</div>
              </b-form-group>
              <b-button type="submit" variant="primary">Simpan</b-button>
              <b-button onclick="self.history.back()" type="button" variant="danger">Batal</b-button>
            </b-form>
          </b-card>
        </div>
    </div>
    <div v-else>
      <b-card class="mtr-15">
        <b-alert class="mb-0" show variant="danger">Silahkan login terlebih dahulu!</b-alert>
      </b-card>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loggedIn: User.loggedIn(),
      form: {
        name: ''
      },
      errors: {}
    }
  },
  created() {
    axios.get(`/api/category/${this.$route.params.id}`).then(res => {
      this.form = res.data.data
    }).catch(error => console.log(error))
  },
  methods: {
    onSubmit() {
      axios.patch('/api/category/'+this.$route.params.id, this.form).then(res => {
        this.$router.push('/master/kategori')
      }).catch(error => console.log(error))
    }
  }
}
</script>

<style>

</style>
